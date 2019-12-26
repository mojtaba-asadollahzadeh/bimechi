<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminUserController extends Controller
{
    // return admin index of users
    public function index()
    {
    	$users = User::all();
    	return view('home/users.index')->with([
    		'users' => $users
    	]);
    }

    // function to retrun one user view
    public function one($id)
    {
    	$user = User::find($id);
    	if(!$user){
    		return redirect('/home/users')->with('error','کاربر پیدا نشد !');
    	}

    	return view('home/users.view')->with([
    		'user' => $user
    	]);
    }

    public function status($id)
    {
    	$user = User::find($id);
    	if(!$user){
    		return redirect('/home/users')->with('error','کاربر پیدا نشد !');
    	}

    	if($user->active){
    		$user->active = 0;
    	}else{
    		$user->active = 1;
    	}

    	$user->save();
    	return redirect()->back()->with('success','وضعیت کاربر در سامانه تغییر کرد !');
    }

    // update user info
    public function update(Request $request)
    {

    	$request->validate([
    		'uid' => 'required|integer',
    		'name' => 'required|string|min:10|max:255',
    		'mobile' => 'required|sometimes|string|min:10|max:255',
    		'code' => 'required|sometimes|string|min:2|max:255',
            'phone' => 'required|sometimes|string|min:10|max:255',
            'national_code' => 'required|sometimes|string|min:2|max:255',
            'address' => 'required|sometimes|string|min:2|max:255',
            'birth' => 'required|sometimes|string|min:2|max:255',
    	]);

    	$user = User::find($request->input('uid'));
    	if(!$user){
    		return redirect('/home/users')->with('error','کاربر پیدا نشد !');
    	}
    	$user->name = $request->input('name');
    	$user->phone = $request->input('phone');
    	$user->code = $request->input('code');
        $user->mobile = $request->input('mobile');
        $user->address = $request->input('address');
        $user->national_code = $request->input('national_code');
        $user->birth = $request->input('birth');
    	$user->save();
    	
    	return redirect()->back()->with('success','پروفایل کاربر مورد نظر با موفقیت به روزرسانی شد !');
    }
}
