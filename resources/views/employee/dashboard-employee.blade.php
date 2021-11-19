@extends('layouts.vertical-menu-employee.master-employee')
@section('css')
<link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.skinSimple.css')}}" rel="stylesheet">
@endsection
@section('page-header')
						<!-- PAGE-HEADER -->
							<div>
								<h1 class="page-title">Dashboard</h1>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Hello {{Auth::user()->name}}, Have A Productive Day!</li>
									<li class="breadcrumb-item active" aria-current="page">{{$date}}</li>

								</ol>
							</div>
						<!-- PAGE-HEADER END -->
@endsection
@section('content')

	<div class="row">
		<div class="col-lg-12">

			<div class="row">
				<div class="col-lg-6 ">
					<div class="card">
						<div class="card-body text-center statistics-info">
							<div class="counter-icon bg-primary mb-0 box-primary-shadow">
								<i class="fe fe-trending-up text-white"></i>
							</div>
							<h6 class="mt-4 mb-1">You Worked </h6>
							<h2 class="mb-2 number-font">80</h2>
							<h5 class="text-muted">Hours This month</h5>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="card">
						<div class="card-body text-center statistics-info">
							<div class="counter-icon bg-green mb-0 box-secondary-shadow">
								<i class="fe fe-clock text-white"></i>
							</div>
							<h6 class="mt-4 mb-1">Work Log For The Day</h6>
							<h2 class="mb-4 mb-5">Clocked In 8 hours on Diori</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
			<div class="card overflow-hidden bg-white work-progress">
				<div class="card-header">
					<h3 class="card-title">Projects</h3>

				</div>
				<div class="card-body">
					<h4 class="mb-5"> •You Are Part Of {{$projectCount}} Projects</h4>
					<span><strong><u>Just to Name a Few:</u></strong> </span><br>

					@foreach ($projects->slice(0, 3) as $project)
						<h6>• {{ $project['name'] }}</h6>
					@endforeach
					<div class="chart-wrapper">
					</div>
				</div>
				<div class="card-header">
					<h3 class="card-title">Notes/To Do List:</h3><br>
				</div>
					<div class="card-body">
					<textarea  name="todolist" rows="4" cols="50"></textarea>
					</div>
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xl-8">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Total Hours Worked</h3>
				</div>
				<div class="card-body">
					<h5 ><u>Summary(temporary just for the model):</u></h5>
					<h6 class="text-muted">Graph per 10 days, 3 times a month,how many hours worked on each day</h6>

					<div class="row mt-6">
						<canvas id="deals" class="chart-dropshadow-success"></canvas>
					</div>
				</div>
			</div>
		</div><!-- COL END -->
	</div>
@endsection
@section('js')
<script src="{{ URL::asset('assets/js/index2.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/chart/Chart.bundle.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/chart/utils.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/echarts/echarts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/morris/raphael-min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/morris/morris.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>
@endsection
