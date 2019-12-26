<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marketer;
use Auth as Auth;

class MarketerController extends Controller
{
    public function index()
    {
    	$marketers = Marketer::all();
    	return view('home/marketers.index')->with([
    		'marketers' => $marketers
    	]);
    }

    // return create marketer view
    public function store()
    {
    	return view('home/marketers.store');
    }

    // create a marketer
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

    	$marketer = new Marketer;
    	$marketer->user_id = Auth::user()->id;
    	$marketer->type = $request->input('type');
    	$marketer->gender = $request->input('gender');
    	if($request->input('vip') == 1){
    		$marketer->vip = 1;
    	}else{
    		$marketer->vip = 0;
    	}
    	$marketer->name = $request->input('name');
    	$marketer->family = $request->input('family');
    	$marketer->national_code = $request->input('national_code');
    	$marketer->mobile = $request->input('mobile');
    	$marketer->birth = $request->input('birth');
    	$marketer->home_address = $request->input('home_address');
    	$marketer->work_address = $request->input('work_address');
    	$marketer->home_phone = $request->input('home_phone');
    	$marketer->work_phone = $request->input('work_phone');
    	$marketer->fax = $request->input('fax');
    	$marketer->archive_code = $request->input('archive_code');
    	$marketer->economical_code = $request->input('economical_code');
    	$marketer->work_field = $request->input('work_field');
    	$marketer->text = $request->input('text');;
    	$marketer->save();
    	return redirect()->back()->with('success','بازاریاب شما به لیست بازاریابان شما افزوده شد !');
    }

    // return a marketer view
    public function view($id)
    {
    	$marketer = Marketer::find($id);
    	if (!$marketer || $marketer->user_id != Auth::user()->id) {
    		return redirect('/home/marketers')->with('error','بازاریاب یافت نشد !');
    	}
    	return view('home/marketers.view')->with([
    		'marketer' => $marketer
    	]);
    }

    public function update(Request $request)
    {
    	$request->validate([
    		  'mid' => 'required|integer',
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

    	$marketer = Marketer::find($request->input('mid'));
    	if (!$marketer || $marketer->user_id != Auth::user()->id) {
    		return redirect('/home/marketers')->with('error','بازاریاب یافت نشد !');
    	}

    	$marketer->type = $request->input('type');
    	$marketer->gender = $request->input('gender');
    	
    	if($request->input('vip') == 1){
    		$marketer->vip = 1;
    	}else{
    		$marketer->vip = 0;
    	}

    	$marketer->name = $request->input('name');
    	$marketer->family = $request->input('family');
    	$marketer->national_code = $request->input('national_code');
    	$marketer->mobile = $request->input('mobile');
    	$marketer->birth = $request->input('birth');
    	$marketer->home_address = $request->input('home_address');
    	$marketer->work_address = $request->input('work_address');
    	$marketer->home_phone = $request->input('home_phone');
    	$marketer->work_phone = $request->input('work_phone');
    	$marketer->fax = $request->input('fax');
    	$marketer->archive_code = $request->input('archive_code');
    	$marketer->economical_code = $request->input('economical_code');
    	$marketer->work_field = $request->input('work_field');
    	$marketer->text = $request->input('text');;
    	$marketer->save();
    	return redirect()->back()->with('success','بازاریاب شما با موفقیت به روزرسانی شد !');
    }
}
