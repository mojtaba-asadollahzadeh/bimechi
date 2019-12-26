@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">پروفایل کاربری</div>

    <div class="card-body">
    	<form method="post" action="/home/profile/update" enctype="multipart/form-data">
    		@csrf
	        <div class="form-group">
	        	<label>نام و نام خانوادگی شما</label>
	        	<input type="text" name="name" class="form-control" 
	        			value="{{Auth::user()->name}}">
	        </div>
	        <div class="form-group">
	        	<label>کد نمایندگی شما</label>
	        	<input type="text" name="code" class="form-control"
	        			value="{{Auth::user()->code}}">
	        </div>
	        <div class="form-group">
	        	<label>شماره تماس شما شما</label>
	        	<input type="text" name="phone" class="form-control" 
	        			value="{{Auth::user()->phone}}">
	        </div>
	        <div class="form-group">
	        	<label>تصویر کارت ملی</label>
	        	<input type="file" name="national_card" class="form-control">
	        	@if(Auth::user()->national_card)
	        		<img src="{{Auth::user()->national_card}}" class="img-thumbnail" width="300px;">
	        	@endif
	        </div>
	        <div class="form-group">
	        	<button class="btn btn-md btn-primary">ثبت اطلاعات</button>
	        </div>
    	</form>
    </div>
</div>

<div class="card">
    <div class="card-header">تغییر رمز عبور</div>

    <div class="card-body">
    	<form method="post" action="/home/profile/password">
    		@csrf
    		<div class="form-group">
	        	<label>رمز عبور قبلی</label>
	        	<input type="password" name="old" class="form-control">
	        </div>
	        <div class="form-group">
	        	<label>رمز عبور جدید</label>
	        	<input type="password" name="password" class="form-control">
	        </div>
	        <div class="form-group">
	        	<label>تکرار رمز عبور جدید</label>
	        	<input type="password" name="password_confirmation" class="form-control">
	        </div>
    		<div class="form-group">
	        	<button class="btn btn-md btn-warning">تغییر رمز عبور</button>
	        </div>
    	</form>
    </div>
</div>

@endsection
