@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
@stop


@section('content')
<div class="card">
    <div class="card-header">
    	<b>آمار کلی نرخ بیمه گذاری</b>
    </div>

	<div class="card-body">
		<canvas id="report"></canvas>
	</div>
</div>

<div class="card">
    <div class="card-header">داشبورد</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        You are logged in!
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script type="text/javascript">
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