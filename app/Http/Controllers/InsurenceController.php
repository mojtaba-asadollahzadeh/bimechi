<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insurence;
use App\InsurenceType;

class InsurenceController extends Controller
{
    // return index view 
    public function index()
    {
    	return view('home.insurences');
    }

    // create a insurence
    public function new(Request $request)
    {
    	$request->validate([
    		'name' => 'required|string|min:3|max:255'
    	]);

    	$insurence = new Insurence;
    	$insurence->name = $request->input('name');
    	$insurence->save();
    	return redirect()->back()->with('success','گروه بیمه ایجاد شد !');
    }

    // create a insurence type
    public function newType(Request $request)
    {
    	$request->validate([
    		'insurence_id' => 'required|integer',
    		'name' => 'required|string|min:3|max:255'
    	]);

    	$insurence = Insurence::find($request->input('insurence_id'));

    	if($insurence == null){
    		return redirect()->back()->with('error','گروه بیمه اصلی یافت نشد !');
    	}

    	$insurenceType = new InsurenceType;
    	$insurenceType->insurence_id = $request->input('insurence_id');
    	$insurenceType->name = $request->input('name');
    	$insurenceType->save();
    	return redirect()->back()->with('success','گروه بیمه ایجاد شد !');
    }

    public function delete($id)
    {
    	$insurence = Insurence::find($id);
    	if($insurence == null){
    		return redirect()->back()->with('error','گروه بیمه اصلی یافت نشد !');
    	}
    	$insurence->delete();
    	return redirect()->back()->with('success','گروه اصلی با موفقیت حذف شد !');
    }

    public function deleteType($id)
    {
    	$insurence = InsurenceType::find($id);
    	if($insurence == null){
    		return redirect()->back()->with('error','گروه بیمه یافت نشد !');
    	}
    	$insurence->delete();
    	return redirect()->back()->with('success','زیر دسته بیمه با موفقیت حذف شد !');
    }    
}
