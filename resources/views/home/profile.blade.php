@extends('layouts.app')


@section('content')

<div class="card">
    <div class="card-header">پروفایل کاربری</div>

    <div class="card-body">
    	<form method="post" action="/home/profile/update" enctype="multipart/form-data">
    		@csrf
	        <div class="form-group col-xs-12">
	        	<label>نام و نام خانوادگی شما</label>
	        	<input type="text" name="name" class="form-control" 
	        			value="{{Auth::user()->name}}">
	        </div>
	        <div class="form-group col-xs-12 col-md-6">
	        	<label>کد نمایندگی شما</label>
	        	<input type="text" name="code" class="form-control"
	        			value="{{Auth::user()->code}}">
	        </div>
	    	<div class="col-xs-12 col-md-6 form-group">
	    		<label>کد ملی</label>
	    		<input type="text" name="national_code" class="form-control"
	    		value="{{Auth::user()->national_code}}">
	    	</div>
	    	<div class="col-xs-12 col-md-6 form-group">
	    		<label>موبایل</label>
	    		<input type="text" name="mobile" class="form-control"
	    		value="{{Auth::user()->mobile}}">
	    	</div>
	    	<div class="col-xs-12 col-md-6 form-group">
	    		<label>تاریخ تولد</label>
	    		<input type="text" name="birth" class="form-control birth"
	    		value="{{Auth::user()->birth}}" autocomplete="off">
	    	</div>
	    	<div class="col-xs-12 col-md-6 form-group">
	    		<label>آدرس محل کار</label>
	    		<textarea class="form-control" name="address">{{Auth::user()->address}}</textarea>
	    	</div>
	    	<div class="col-xs-12 col-md-6 form-group">
	    		<label>تلفن</label>
	    		<input type="text" name="phone" class="form-control"
	    		value="{{Auth::user()->phone}}">
	    	</div>
	    	<div class="form-group col-xs-12 col-md-6">
	        	<label>تصویر کارت ملی</label>
	        	<input type="file" name="national_card" class="form-control">
	        	@if(Auth::user()->national_card)
	        		<img src="{{Auth::user()->national_card}}" class="img-thumbnail" width="300px;">
	        	@endif
	        </div>
	        <div class="form-group col-xs-12">
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
@section('script')
<script type="text/javascript">
	$(document).ready( function () {
		$(".birth").pDatepicker({
			 initialValue: false,
		    format: 'YYYY/MM/DD',
		});	    
	});
</script>
@stop