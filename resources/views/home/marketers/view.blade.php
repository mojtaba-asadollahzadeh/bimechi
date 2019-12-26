@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">بازاریاب {{$marketer->name}} {{$marketer->family}}</div>

    <form method="post" action="/home/marketers/update">
    	@csrf
    	<input type="hidden" name="mid" value="{{$marketer->id}}">
	    <div class="card-body">
	    	<div class="col-xs-12 col-md-4 form-group">
	    		<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="type" id="type_1" value="1" 
				@if($marketer->type)
					checked="checked" 
				@endif
				>
				  <label class="form-check-label" for="type_1">حقیقی</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="type" id="type_0" value="0"
				  @if(!$marketer->type)
						checked="checked" 
					@endif
				>
				  <label class="form-check-label" for="type_0">حقوقی</label>
				</div>
	    	</div>
	    	<div class="col-xs-12 col-md-4 form-group">
	    		<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="gender" id="male" value="1" 
					@if($marketer->gender)
						checked="checked" 
					@endif
				>
				  <label class="form-check-label" for="male">آقا</label>
				</div>
				<div class="form-check form-check-inline">
				  <input class="form-check-input" type="radio" name="gender" id="0" value="0"
				  	@if(!$marketer->gender)
						checked="checked" 
					@endif
				  >
				  <label class="form-check-label" for="0">خانم</label>
				</div>
	    	</div>
	    	<div class="col-xs-12 col-md-4 form-group">
	    		<div class="form-check form-check-inline">
				  <input class="form-check-input" name="vip" type="checkbox" id="vip" value="1" 
				  	@if($marketer->vip)
						checked="checked" 
					@endif
				  >
				  <label class="form-check-label" for="vip">بازاریاب VIP</label>
				</div>
	    	</div>
	    	<div class="col-xs-12 col-md-6 form-group">
	    		<label>نام</label>
	    		<input type="text" name="name" class="form-control" 
	    			value="{{$marketer->name}}">
	    	</div>
	    	<div class="col-xs-12 col-md-6 form-group">
	    		<label>نام خانوادگی</label>
	    		<input type="text" name="family" class="form-control"
	    		value="{{$marketer->family}}">
	    	</div>
	    	<div class="col-xs-12 col-md-4 form-group">
	    		<label>کد ملی</label>
	    		<input type="text" name="national_code" class="form-control"
	    		value="{{$marketer->national_code}}">
	    	</div>
	    	<div class="col-xs-12 col-md-4 form-group">
	    		<label>موبایل</label>
	    		<input type="text" name="mobile" class="form-control"
	    		value="{{$marketer->mobile}}">
	    	</div>
	    	<div class="col-xs-12 col-md-4 form-group">
	    		<label>تاریخ تولد</label>
	    		<input type="text" name="birth" class="form-control birth"
	    		value="{{$marketer->birth}}" autocomplete="off">
	    	</div>
	    	<div class="col-xs-12 col-md-6 form-group">
	    		<label>آدرس منزل</label>
	    		<textarea class="form-control" name="home_address">{{$marketer->home_address}}</textarea>
	    	</div>
	    	<div class="col-xs-12 col-md-6 form-group">
	    		<label>آدرس محل کار</label>
	    		<textarea class="form-control" name="work_address">{{$marketer->work_address}}</textarea>
	    	</div>
	    	<div class="col-xs-12 col-md-6 form-group">
	    		<label>تلفن منزل</label>
	    		<input type="text" name="home_phone" class="form-control"
	    		value="{{$marketer->home_phone}}">
	    	</div>
	    	<div class="col-xs-12 col-md-6 form-group">
	    		<label>تلفن محل کار</label>
	    		<input type="text" name="work_phone" class="form-control"
	    		value="{{$marketer->work_phone}}">
	    	</div>
	    	<div class="col-xs-12 col-md-4 form-group">
	    		<label>فکس</label>
	    		<input type="text" name="fax" class="form-control"
	    		value="{{$marketer->fax}}">
	    	</div>
	    	<div class="col-xs-12 col-md-4 form-group">
	    		<label>کد بایگانی</label>
	    		<input type="text" name="archive_code" class="form-control"
	    		value="{{$marketer->archive_code}}">
	    	</div>
	    	<div class="col-xs-12 col-md-4 form-group">
	    		<label>کد اقتصادی</label>
	    		<input type="text" name="economical_code" class="form-control"
	    		value="{{$marketer->economical_code}}">
	    	</div>
	    	<div class="col-xs-12 col-md-4 form-group">
	    		<label>حوزه کاری</label>
	    		<input type="text" name="work_field" class="form-control"
	    		value="{{$marketer->work_field}}">
	    	</div>
	    	<div class="col-xs-12 col-md-4 form-group">
	    		<label>سایر توضیحات</label>
	    		<textarea class="form-control" name="text">{{$marketer->text}}</textarea>
	    	</div>
	    	<div class="col-xs-12 form-group">
	    		<button class="btn btn-md btn-info">بروزرسانی {{$marketer->name}} {{$marketer->family}}</button>
	    	</div>
	    </div>
	</form>
</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready( function () {
		$(".birth").pDatepicker({
			 initialValue: false،
		    format: 'YYYY/MM/DD',
		});	    
	});
</script>
@stop
