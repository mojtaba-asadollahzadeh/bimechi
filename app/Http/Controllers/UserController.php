<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth as Auth;
use Hash as Hash;

class UserController extends Controller
{
	
	// return register view
	public function registerView()
    {
        // redirect to home at Auth::check
        if(Auth::check()){
            return redirect('/');
        }
    	return view('register');
    }

    // register a user
    public function register(Request $request)
    {
    	// validate the request data
    	$request->validate([
    		'name' => 'required|string|min:3|max:255',
    		'email' => 'required|email|unique:users|',
    		'password' => 'required|confirmed|min:6',
    	]);

    	// create a user
    	$user = new User;
    	$user->name = $request->input('name');
    	$user->email = $request->input('email');
    	// hash user password
    	$user->password = Hash::make($request->input('password'));
    	// create email confirmation link
    	$user->key = md5( rand(0,1000000) );
    	$user->save();

    	return redirect('/login')->with('success','صبت نام شما با موفقیت انجام شد !');
    }

    // return login view
    public function loginView()
    {
        // redirect to home at Auth::check
        if(Auth::check()){
            return redirect('/');
        }
    	return view('login');
    }

    // login a user
    public function login(Request $request)
    {
    	$request->validate([
    		'email' => 'required|email',
    		'password' => 'required|string|min:6'
    	]);
    	// check and login the user
    	if(
    		Auth::attempt([
    			'email' => $request->input('email'),
    			'password' => $request->input('password')
    		],true)
    	){
    		return redirect('/')->with('success','خوش آمدید');
    	}else{
    		return redirect()->back()->with('error','اطلاعات وارد شده نا معتبر است !');
    	}
    }

    // return profile view
    public function profile()
    {
    	return view('home.profile');
    }

    // update profile
    public function update(Request $request)
    {

    	$request->validate([
    		'name' => 'required|string|min:10|max:255',
    		'phone' => 'required|sometimes|string|min:10|max:255',
    		'code' => 'required|sometimes|string|min:2|max:255',
    		'national_card' => 'required|sometimes|file|mimes:jpeg,png,jpg',
    	]);

    	$user = Auth::user();
    	$user->name = $request->input('name');
    	$user->phone = $request->input('phone');
    	$user->code = $request->input('code');
    	if( $request->hasFile('national_card') ){
    		$image = $request->file('national_card');
	        $name = md5( time() ) . '.' . $image->getClientOriginalExtension();
	        $destinationPath = public_path('/files');
	        $image->move($destinationPath, $name);
	        $user->national_card = "/files/". $name;
    	}
    	$user->save();

    	// create notification for admins
    	foreach (fetchAdmins() as $admin) {
    		$message = 'پروفایل کاربری کاربر : '. $user->name .' , به روز رسانی شد.';
    		createNotification($admin->id,$message);	
    	}
    	
    	return redirect()->back()->with('success','پروفایل شما با موفقیت به روزرسانی شد !');
    }

    // update password
        public function password(Request $request)
    {
        $request->validate([
            'old' => 'required|string|min:6',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = Auth::user();

        // check if old password is correct
        if( 
            Hash::check($request->input('old'), $user->password)
        ){

            $user->password = Hash::make($request->input('password'));
            $user->save();
            return redirect()->back()->with('success','رمز عبور شما به روزرسانی شد !');

        }else{
            return redirect()->back()->with('error','رمز عبور قبلی شما اشتباه است !');
        }

    }
}
