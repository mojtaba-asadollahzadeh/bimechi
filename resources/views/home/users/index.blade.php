@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">کاربران سایت شما</div>

    <div class="card-body">
    	<table class="table">
    		<thead>
    			<tr>
    				<th class="text-center">ماک کاربر</th>
    				<th class="text-center">وضعیت کاربر</th>
    				<th class="text-center">تاریخ ثبت نام</th>
    				<th class="text-center">تاریخ آخرین فعالیت</th>
    				<th class="text-center">آپلود مدارک ؟</th>
    				<th class="text-center">ابزار ها</th>
    			</tr>
    		</thead>
    		<tbody>
    			@foreach($users as $user)
    				<?php 
    					Verta::setStringformat('Y/n/j H:i:s');
    				?>
	    			<tr>
	    				<td class="text-center">
	    					{{$user->name}}
	    				</td>
	    				<td class="text-center">
	    					@if($user->active)
	    						<label class="badge badge-success">فعال</label>
	    					@else
	    						<label class="badge badge-danger">غیر فعال</label>
	    					@endif
	    				</td>
	    				<td class="text-center">
	    					<span style="float: left;direction: ltr;">
	    						{{new Verta($user->created_at)}}
	    					</span>
	    				</td>
	    				<td class="text-center">
	    					<span style="float: left;direction: ltr;">
	    						{{new Verta($user->updated_at)}}
	    					</span>
	    				</td>
	    				<td class="text-center">
	    					@if($user->national_card)
	    						<label class="badge badge-success">فعال</label>
	    					@else
	    						<label class="badge badge-danger">غیر فعال</label>
	    					@endif
	    				</td>
	    				<td class="text-center">
	    					<a href="/home/users/delete/{{$user->id}}" class="fas fa-trash"></a>
	    					&nbsp
	    					<a href="/home/users/{{$user->id}}" class="fas fa-eye"></a>
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
