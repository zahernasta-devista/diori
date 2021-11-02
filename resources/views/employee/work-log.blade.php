@extends('layouts.vertical-menu-employee.master-employee')
@section('css')
<link href="{{ URL::asset('assets/plugins/morris/morris.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/rating/rating.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/single-page/css/main.css')}}" rel="stylesheet">

@endsection
@section('page-header')
						<!-- PAGE-HEADER -->
							<div>
								<h1 class="page-title">Work log</h1>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Work Log</li>
								</ol>
							</div>
						<!-- PAGE-HEADER END -->
@endsection
@section('content')

						<!-- ROW-1 OPEN -->
						<div class="page">
							<div class="">
								<!-- CONTAINER OPEN -->
								<div class="container-login100">
									<div class="wrap-login100 p-6">
										<form class="login100-form validate-form" action="" method="POST">
											@csrf
											<span class="login100-form-title">
										Add Work Log
								</span>
											<div class="wrap-input100 validate-input" >
												<input class="input100" type="number" name="Hours" placeholder="12 hours max" min="1" max="12">
												<span class="focus-input100"></span>
												<span class="symbol-input100">
										<i class="zmdi zmdi-eye" aria-hidden="true"></i>
									</span>
											</div>
											<div class="wrap-input100 validate-input" data-validate = "Project is required">
												<select class="input100" type="text" name="project" >
												<option value="select">Select a Project</option>
													<option value="dwl">Devista Work Log</option>
													<option value="b&b">B&B</option>
													<option value="Gave">Gave Universet</option>
												</select>
												<span class="focus-input100"></span>
												<span class="symbol-input100">
										<i class="zmdi zmdi-card" aria-hidden="true"></i>
									</span>
											</div>
											<div class="wrap-input100 validate-input" data-validate = "date is required">
												<input class="input100" type="date" name="date" >
												<span class="focus-input100"></span>
												<span class="symbol-input100">
										<i class="zmdi zmdi-view-day" aria-hidden="true"></i>
									</span>
											</div>
											<div class="container-login100-form-btn">
												<button  class="login100-form-btn btn-primary">
													{{ __('Begin') }}
												</button>
											</div>
										</form>
									</div>
								</div>
								<!-- CONTAINER CLOSED -->
							</div>
						</div>
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