@extends('layouts.vertical-menu-employee.master-employee')
@section('css')
<link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.skinSimple.css')}}" rel="stylesheet">
@endsection
@section('page-header')
						<!-- PAGE-HEADER -->
							<div>
								<h1 class="page-title">Profile</h1>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Update & Credentials</a></li>
									<li class="breadcrumb-item active text-success" aria-current="page">Profile</li>
								</ol>
							</div>
						<!-- PAGE-HEADER END -->
@endsection
@section('content')
						<!-- ROW-1 OPEN -->
						<div class="row">
							<div class="col-lg-4 col-xl-4 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Edit Password</div>
									</div>
									<form method="POST" action="{{route('profile-change-password')}}">
										@csrf
										@foreach ($errors->all() as $error)
											<div class="alert alert-primary">
												{{$errors->first()}}
											</div>
										@endforeach
										<div class="card-body">
											<div class="d-flex mb-3">
												<img alt="User Avatar" class="rounded-circle avatar-lg mr-2" src="{{URL::asset('assets/images/users/10.jpg')}}">
												<div class="ml-auto mt-xl-2 mt-lg-0 ml-lg-2">
													<a href="#" class="btn btn-orange btn-sm mt-1 mb-1"><i class="fe fe-camera mr-1"></i>Profile</a>
												</div>
											</div>
											<div class="form-group">
												<label class="form-label">Current Password</label>
												<input type="password" class="form-control"  name="current_password" id="current_password">
											</div>
											<div class="form-group">
												<label class="form-label">New Password</label>
												<input type="password" class="form-control"  name="new_password" id="new_password">
											</div>
											<div class="form-group">
												<label class="form-label">Confirm Password</label>
												<input type="password" class="form-control" name="new_confirm_password" id="new_confirm_password">
											</div>
										</div>
										<div class="card-footer text-right">
											<button type="submit" class="btn btn-success">Update Password</button>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-8 col-xl-8 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Credentials</h3>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="exampleInputname"> Name</label>
													<h6>{{Auth::user()->name}}</h6>
												</div>
											</div>
											<div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="exampleInputname1">Position</label>
													<h6>{{Auth::user()->position}}</h6>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Email address</label>
											<h6>{{Auth::user()->email}}</h6>
										</div>

									</div>
								</div>
							</div>
								</div>

					</div>
				</div>
				<!--CONTAINER CLOSED -->
			</div>
@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/chart/Chart.bundle.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/chart/utils.js') }}"></script>
@endsection
