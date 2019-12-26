@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
@stop


@section('content')
<div class="card">
    <div class="card-header">
    	<b>آمار کلی کاربر</b>
    </div>

	<div class="card-body">
		<canvas id="report"></canvas>
	</div>
</div>
<div class="card">
    <div class="card-header">
    	اطالاعات کاربری <b style="font-size: 18px;">{{$user->name}}</b>
    </div>

	    <div class="card-body">
	    	<a href="/home/users/{{$user->id}}/status"
	    			class="btn btn-md 
	    				@if($user->active)
			    			btn-success
			    		@else
			    			btn-danger
			    		@endif
	    			" 
	    		>
	    		@if($user->active)
	    			غیر فعال سازی کاربر
	    		@else
	    			 فعال سازی کاربر
	    		@endif
	    	</a>
	    	<a href="{{$user->national_card}}" class="btn btn-md btn-info" target="_blank">مشاهده تصویر کارت ملی</a>
	    	<hr>
	    	<form method="post" action="/home/users/update">
	    		@csrf
	    		<input type="hidden" name="uid" value="{{$user->id}}">
		        <div class="form-group col-xs-12">
		        	<label>نام و نام خانوادگی شما</label>
		        	<input type="text" name="name" class="form-control" 
		        			value="{{$user->name}}">
		        </div>
		        <div class="form-group col-xs-12 col-md-6">
		        	<label>کد نمایندگی شما</label>
		        	<input type="text" name="code" class="form-control"
		        			value="{{$user->code}}">
		        </div>
		    	<div class="col-xs-12 col-md-6 form-group">
		    		<label>کد ملی</label>
		    		<input type="text" name="national_code" class="form-control"
		    		value="{{$user->national_code}}">
		    	</div>
		    	<div class="col-xs-12 col-md-6 form-group">
		    		<label>موبایل</label>
		    		<input type="text" name="mobile" class="form-control"
		    		value="{{$user->mobile}}">
		    	</div>
		    	<div class="col-xs-12 col-md-6 form-group">
		    		<label>تاریخ تولد</label>
		    		<input type="text" name="birth" class="form-control birth"
		    		value="{{$user->birth}}">
		    	</div>
		    	<div class="col-xs-12 col-md-6 form-group">
		    		<label>آدرس محل کار</label>
		    		<textarea class="form-control" name="address">{{$user->address}}</textarea>
		    	</div>
		    	<div class="col-xs-12 col-md-6 form-group">
		    		<label>تلفن</label>
		    		<input type="text" name="phone" class="form-control"
		    		value="{{$user->phone}}">
		    	</div>
		        <div class="form-group col-xs-12">
		        	<button class="btn btn-md btn-primary">ثبت اطلاعات</button>
		        </div>
	    	</form>
	    </div>
</div>
<div class="card">
    <div class="card-header">
    	<b>اطالاعات خرید ها</b>
    </div>

	<div class="card-body">
	</div>
</div>
@endsection

@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
		$(".birth").pDatepicker({
			 initialValue: false,
		    format: 'YYYY/MM/DD',
		});	    
	});
	new Chart(document.getElementById("report"), {
  type: 'line',
  data: {
    labels: [
    	'فروردین','اردیبهشت','خرداد',
    	'تیر','مرداد','شهریور',
    	'مهر','آبان','آذر',
    	'دی','بهمن','اسفند'
    ],
    datasets: [{ 
        data: [
        	86,114,106,
        	106,107,111,
        	133,221,783,
        	133,221,783,
        ],
        label: "تعداد مشتریان",
        borderColor: "#3e95cd",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'آمار مشتریان شما و تعداد آن ها'
    }
  }
});
</script>
@stop
