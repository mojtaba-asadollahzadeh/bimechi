@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">مشتریان شما</div>

    <div class="card-body">
    	<table class="table">
    		<thead>
    			<tr>
    				<th class="text-center">کد مشتری</th>
    				<th class="text-center">نوع بیمه گذار</th>
    				<th class="text-center">نام</th>
    				<th class="text-center">نام خانوادگی</th>
    				<th class="text-center">کد ملی</th>
    				<th class="text-center">شماره موبایل</th>
    				<th class="text-center">ابزار ها</th>
    			</tr>
    		</thead>
    		<tbody>
    			@foreach($clients as $client)
	    			<tr>
	    				<td class="text-center">
	    					{{$client->code}}
	    				</td>
	    				<td class="text-center">
	    					{{$client->type}}
	    				</td>
	    				<td class="text-center">
	    					{{$client->name}}
	    				</td>
	    				<td class="text-center">
	    					{{$client->family}}
	    				</td>
	    				<td class="text-center">
	    					{{$client->national_code}}
	    				</td>
	    				<td class="text-center">
	    					{{$client->mobile}}
	    				</td>
	    				<td class="text-center"></td>
	    			</tr>
    			@endforeach
    		</tbody>
    	</table>
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
