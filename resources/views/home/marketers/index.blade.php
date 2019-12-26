@extends('layouts.app')

@section('content')
<a href="/home/marketers/store" class="btn btn-lg btn-success">افزودن بازاریاب جدید</a>
<div class="card">
    <div class="card-header">بازاریابان شما</div>

    <div class="card-body">
    	<table class="table">
    		<thead>
    			<tr>
    				<th class="text-center">کد بازاریاب</th>
    				<th class="text-center">نوع بیمه گذار</th>
    				<th class="text-center">نام</th>
    				<th class="text-center">نام خانوادگی</th>
    				<th class="text-center">کد ملی</th>
    				<th class="text-center">شماره موبایل</th>
    				<th class="text-center">ابزار ها</th>
    			</tr>
    		</thead>
    		<tbody>
    			@foreach($marketers as $marketer)
	    			<tr>
	    				<td class="text-center">
	    					{{$marketer->id}}
	    				</td>
	    				<td class="text-center">
	    					@if($marketer->type)
	    						<label class="badge badge-primary">حقیقی</label>
	    					@else
	    						<label class="badge badge-info">حقوقی</label>
	    					@endif
	    				</td>
	    				<td class="text-center">
	    					{{$marketer->name}}
	    				</td>
	    				<td class="text-center">
	    					{{$marketer->family}}
	    				</td>
	    				<td class="text-center">
	    					{{$marketer->national_code}}
	    				</td>
	    				<td class="text-center">
	    					{{$marketer->mobile}}
	    				</td>
	    				<td class="text-center">
	    					<a href="/home/marketers/delete/{{$marketer->id}}" class="fas fa-trash"></a>
	    					&nbsp
	    					<a href="/home/marketers/{{$marketer->id}}" class="fas fa-eye"></a>
	    				</td>
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
	    var table = $('.table').DataTable({
	        "language": {
			    "emptyTable":     "داده موجود نیست !",
			    "info":           "نمایش _START_ صفحه _END_ از _TOTAL_ صفحه",
			    "infoEmpty":      "داده ای یافت نشد",
			    "infoFiltered":   "(filtered from _MAX_ total entries)",
			    "infoPostFix":    "",
			    "thousands":      ",",
			    "lengthMenu":     "نمایش _MENU_ داده",
			    "loadingRecords": "در حال بارگیری...",
			    "search":         "جست و جو :",
			    "zeroRecords":    "هیچ داده ای یافت نشد !",
			    "paginate": {
			        "first":      "اولین",
			        "last":       "آخرین",
			        "next":       "بعدی",
			        "previous":   "قبلی"
			    },
	        },
	        destroy: true,
	    });

	});
</script>
@stop
