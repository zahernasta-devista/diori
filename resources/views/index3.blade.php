@extends('layouts.vertical-menu.master')
@section('css')
<link href="{{ URL::asset('assets/plugins/morris/morris.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/rating/rating.css')}}" rel="stylesheet">
@endsection
@section('page-header')
						<!-- PAGE-HEADER -->
							<div>
								<h1 class="page-title">Dashboard 03</h1>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard 03</li>
								</ol>
							</div>
						<!-- PAGE-HEADER END -->
@endsection
@section('content')

						<!-- ROW-1 OPEN -->

@endsection
@section('js')
<script src="{{ URL::asset('assets/js/index3.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/chart/Chart.bundle.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/chart/utils.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/morris/raphael-min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/morris/morris.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/rating/jquery.barrating.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/rating/ratings.js') }}"></script>
@endsection
