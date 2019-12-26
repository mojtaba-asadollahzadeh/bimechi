<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Auth as Auth;

class ClientController extends Controller
{
    public function index()
    {
    	$clients = Client::all();
    	return view('home/clients.index')->with([
    		'clients' => $clients
    	]);
    }

    // return create client view
    public function store()
    {
    	return view('home/clients.store');
    }

    // create a client
    public function create(Request $request)
    {
    	$request->validate([
    		  'type' => 'required|boolean',
			  'gender' => 'required|boolean',
			  'vip' => 'required|sometimes|boolean',
			  'name' => 'required|string|min:3|max:255',
			  'family' => 'required|string|min:3|max:255',
			  'national_code' => 'required|string|min:3|max:13',
			  'mobile' => 'required|string|min:3|max:13',
			  'birth' => 'required|string|min:3|max:25',
			  'home_address' => 'required|string|min:3|max:1024',
			  'work_address' => 'required|string|min:3|max:1024',
			  'home_phone' => 'required|string|min:3|max:13',
			  'work_phone' => 'required|string|min:3|max:13',
			  'work_field' => 'required|string|min:3|max:255',
			  'fax' => 'required|string|min:3|max:13',
			  'archive_code' => 'required|string|min:3|max:255',
			  'text' => 'required|string|min:3|max:512',
			  'economical_code' => 'required|string|min:3|max:255',
    	]);

    	$client = new Client;
    	$client->user_id = Auth::user()->id;
    	$client->type = $request->input('type');
    	$client->gender = $request->input('gender');
    	if($request->input('vip') == 1){
            $client->vip = 1;
        }else{
            $client->vip = 0;
        }
    	$client->name = $request->input('name');
    	$client->family = $request->input('family');
    	$client->national_code = $request->input('national_code');
    	$client->mobile = $request->input('mobile');
    	$client->birth = $request->input('birth');
    	$client->home_address = $request->input('home_address');
    	$client->work_address = $request->input('work_address');
    	$client->home_phone = $request->input('home_phone');
    	$client->work_phone = $request->input('work_phone');
    	$client->fax = $request->input('fax');
    	$client->archive_code = $request->input('archive_code');
    	$client->economical_code = $request->input('economical_code');
    	$client->work_field = $request->input('work_field');
    	$client->text = $request->input('text');;
    	$client->save();
    	return redirect()->back()->with('success','مشتری شما به لیست مشتریان شما افزوده شد !');
    }

    // return a client view
    public function view($id)
    {
    	$client = Client::find($id);
    	if (!$client || $client->user_id != Auth::user()->id) {
    		return redirect('/home/clients')->with('error','مشتری یافت نشد !');
    	}
    	return view('home/clients.view')->with([
    		'client' => $client
    	]);
    }

    public function update(Request $request)
    {
    	$request->validate([
    		  'cid' => 'required|integer',
    		  'type' => 'required|boolean',
			  'gender' => 'required|boolean',
			  'vip' => 'required|sometimes|boolean',
			  'name' => 'required|string|min:3|max:255',
			  'family' => 'required|string|min:3|max:255',
			  'national_code' => 'required|string|min:3|max:13',
			  'mobile' => 'required|string|min:3|max:13',
			  'birth' => 'required|string|min:3|max:25',
			  'home_address' => 'required|string|min:3|max:1024',
			  'work_address' => 'required|string|min:3|max:1024',
			  'home_phone' => 'required|string|min:3|max:13',
			  'work_phone' => 'required|string|min:3|max:13',
			  'work_field' => 'required|string|min:3|max:255',
			  'fax' => 'required|string|min:3|max:13',
			  'archive_code' => 'required|string|min:3|max:255',
			  'text' => 'required|string|min:3|max:512',
			  'economical_code' => 'required|string|min:3|max:255',
    	]);

    	$client = Client::find($request->input('cid'));
    	if (!$client || $client->user_id != Auth::user()->id) {
    		return redirect('/home/clients')->with('error','مشتری یافت نشد !');
    	}

    	$client->type = $request->input('type');
    	$client->gender = $request->input('gender');
    	
    	if($request->input('vip') == 1){
    		$client->vip = 1;
    	}else{
    		$client->vip = 0;
    	}

    	$client->name = $request->input('name');
    	$client->family = $request->input('family');
    	$client->national_code = $request->input('national_code');
    	$client->mobile = $request->input('mobile');
    	$client->birth = $request->input('birth');
    	$client->home_address = $request->input('home_address');
    	$client->work_address = $request->input('work_address');
    	$client->home_phone = $request->input('home_phone');
    	$client->work_phone = $request->input('work_phone');
    	$client->fax = $request->input('fax');
    	$client->archive_code = $request->input('archive_code');
    	$client->economical_code = $request->input('economical_code');
    	$client->work_field = $request->input('work_field');
    	$client->text = $request->input('text');;
    	$client->save();
    	return redirect()->back()->with('success','مشتری شما با موفقیت به روزرسانی شد !');
    }
}
