@extends('layouts.app')

@section('content')

<div class="col-xs-12 col-md-6">
	<div class="card">
	    <div class="card-header">تعریف بیمه ها و زیرگروه های آن ها</div>

	    <div class="card-body">
	    	<form method="post" action="/home/insurences/new" >
	    		@csrf
		        <div class="form-group">
		        	<label>نام دسته اصلی بیمه</label>
		        	<input type="text" name="name" class="form-control" >
		        </div>
		        <div class="form-group">
		        	<button class="btn btn-md btn-primary">ثبت دسته اصلی</button>
		        </div>
	    	</form>
	    </div>
	</div>
</div>

<div class="col-xs-12 col-md-6">
	<div class="card">
	    <div class="card-header">تعریف بیمه ها و زیرگروه های آن ها</div>

	    <div class="card-body">
	    	<form method="post" action="/home/insurences/type" >
	    		@csrf
		        <div class="form-group">
		        	<label>نام زیر گروه بیمه</label>
		        	<input type="text" name="name" class="form-control" >
		        </div>
		        <div class="form-group">
		        	<label>دسته اصلی بیمه</label>
		        	<select class="form-control" name="insurence_id">
		        		@foreach(App\Insurence::all() as $insurence)
		        			<option value="{{$insurence->id}}">{{$insurence->name}}</option>
		        		@endforeach
		        	</select>
		        </div>
		        <div class="form-group">
		        	<button class="btn btn-md btn-primary">ثبت زیر گروه</button>
		        </div>
	    	</form>
	    </div>
	</div>
</div>
<div class="col-xs-12">
	<div class="card">
	    <div class="card-header">دسته های اصلی</div>

	    <div class="card-body">
	    	<table class="table">
	    		<thead>
	    			<tr>
	    				<th class="text-center">دسته اصلی</th>
	    				<th class="text-center">ابزار ها</th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			@foreach(App\Insurence::all() as $insurence)
		    			<tr>
		    				<td class="text-center" data="{{$insurence->id}}">{{$insurence->name}}</td>
		    				<td class="text-center">
		    					<a href="/home/insurences/delete/{{$insurence->id}}">
		    						<i class="fas fa-trash"></i>
		    					</a>
		    				</td>
		    			</tr>
	    			@endforeach
	    		</tbody>
	    	</table>
	    </div>
	</div>
</div>

<div class="col-xs-12">
	<div class="card">
	    <div class="card-header">بیمه ها و زیر دسته ها</div>

	    <div class="card-body">
	    	<table class="table">
	    		<thead>
	    			<tr>
	    				<th class="text-center">نوع بیمه</th>
	    				<th class="text-center">دسته اصلی</th>
	    				<th class="text-center">ابزار ها</th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			@foreach(App\InsurenceType::all() as $insurence)
	    				<?php 
	    					$main = App\Insurence::find($insurence->insurence_id);
	    				?>
		    			<tr>
		    				<td class="text-center" data="{{$insurence->id}}">{{$insurence->name}}</td>
		    				<td class="text-center" data="{{$main->id}}">{{$main->name}}</td>
		    				<td class="text-center">
		    					<a href="/home/insurences/type/delete/{{$insurence->id}}">
		    						<i class="fas fa-trash"></i>
		    					</a>
		    				</td>
		    			</tr>
	    			@endforeach
	    		</tbody>
	    	</table>
	    </div>
	</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
	$(document).ready( function () {
	    $('.table').DataTable();
	});
</script>
@stop
