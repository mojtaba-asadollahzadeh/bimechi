@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">مشتریان شما</div>

    <div class="card-body">
    	<div class="col-xs-12 col-md-4 form-group">
    		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="type" id="type_1" value="1">
			  <label class="form-check-label" for="type_1">مشتری حقیقی</label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="type" id="type_0" value="0">
			  <label class="form-check-label" for="type_0">مشتری حقوقی</label>
			</div>
    	</div>
    	<div class="col-xs-12 col-md-4 form-group">
    		<div class="form-check form-check-inline">
			<input class="form-check-input" type="radio" name="gender" id="male" value="1">
			  <label class="form-check-label" for="male">آقا</label>
			</div>
			<div class="form-check form-check-inline">
			  <input class="form-check-input" type="radio" name="gender" id="0" value="0">
			  <label class="form-check-label" for="0">خانم</label>
			</div>
    	</div>
    	<div class="col-xs-12 col-md-4 form-group">
    		<div class="form-check form-check-inline">
			  <input class="form-check-input" name="vip" type="checkbox" id="vip" value="1">
			  <label class="form-check-label" for="vip">مشتری VIP</label>
			</div>
    	</div>
    	<div class="col-xs-12 col-md-6 form-group">
    		<label>نام</label>
    		<input type="text" name="name" class="form-control">
    	</div>
    	<div class="col-xs-12 col-md-6 form-group">
    		<label>نام خانوادگی</label>
    		<input type="text" name="name" class="form-control">
    	</div>
    	<div class="col-xs-12 col-md-4 form-group">
    		<label>کد ملی</label>
    		<input type="text" name="name" class="form-control">
    	</div>
    	<div class="col-xs-12 col-md-4 form-group">
    		<label>موبایل</label>
    		<input type="text" name="name" class="form-control">
    	</div>
    	<div class="col-xs-12 col-md-4 form-group">
    		<label>تاریخ تولد</label>
    		<input type="text" name="birth" class="form-control">
    	</div>
    	<div class="col-xs-12 col-md-6 form-group">
    		<label>آدرس منزل</label>
    		<textarea class="form-control" name="home_address"></textarea>
    	</div>
    	<div class="col-xs-12 col-md-6 form-group">
    		<label>آدرس محل کار</label>
    		<textarea class="form-control" name="work_address"></textarea>
    	</div>
    	<div class="col-xs-12 col-md-6 form-group">
    		<label>تلفن منزل</label>
    		<input type="text" name="home_phone" class="form-control">
    	</div>
    	<div class="col-xs-12 col-md-6 form-group">
    		<label>تلفن محل کار</label>
    		<input type="text" name="work_phone" class="form-control">
    	</div>
    	<div class="col-xs-12 col-md-4 form-group">
    		<label>فکس</label>
    		<input type="text" name="fax" class="form-control">
    	</div>
    	<div class="col-xs-12 col-md-4 form-group">
    		<label>کد بایگانی</label>
    		<input type="text" name="archive_code" class="form-control">
    	</div>
    	<div class="col-xs-12 col-md-4 form-group">
    		<label>کد اقتصادی</label>
    		<input type="text" name="economical_code" class="form-control">
    	</div>


    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready( function () {
	    
	});
</script>
@stop
