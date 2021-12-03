@extends('layouts.vertical-menu.master')
@section('css')
	<link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
	<link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
	<link href="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet" media='print'>
    <link href="{{ URL::asset('assets/plugins/single-page/css/main.css') }}" rel="stylesheet">
@endsection
@section('page-header')
					
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
							<h2 class="mb-2 number-font">{{$timeSum}}</h2>
							<h5 class="text-muted">Hours This month</h5>
						</div>
					</div>
				</div>
                <div class="col-lg-6 ">
					<div class="card">
						<div class="card-body text-center statistics-info">
							<div class="counter-icon bg-primary mb-0 box-primary-shadow">
								<i class="fe fe-trending-up text-white"></i>
							</div>
							<h6 class="mt-4 mb-1">is Part Of {{$projectCount}} Projects</h6>
							<h2 class="mb-2 number-font">
                            @foreach ($projects->slice(0, 3) as $project)
                                <h6> {{ $project['name'] }}</h6>
                            @endforeach</h2>
						</div>
					</div>
				</div>  
             </div>
		</div>
   </div>

	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
			
		</div>
		
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
