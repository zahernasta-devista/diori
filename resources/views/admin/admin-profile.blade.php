@extends('layouts.vertical-menu.master')
@section('css')
<link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.skinSimple.css')}}" rel="stylesheet">
@endsection
@section('page-header')
						<!-- PAGE-HEADER -->
							<div>
								<h1 class="page-title">Profile</h1>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Pages</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
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
									<div class="card-body">
										<div class="d-flex mb-3">
											<img alt="User Avatar" class="rounded-circle avatar-lg mr-2" src="{{URL::asset('assets/images/users/10.jpg')}}">
											<div class="ml-auto mt-xl-2 mt-lg-0 ml-lg-2">
												<a href="#" class="btn btn-primary btn-sm mt-1 mb-1"><i class="fe fe-camera mr-1"></i>Profile</a>
											</div>
										</div>
										<div class="form-group">
											<label class="form-label">Current Password</label>
											<input type="password" class="form-control" value="password">
										</div>
										<div class="form-group">
											<label class="form-label">New Password</label>
											<input type="password" class="form-control" value="password">
										</div>
										<div class="form-group">
											<label class="form-label">Confirm Password</label>
											<input type="password" class="form-control" value="password">
										</div>
									</div>
									<div class="card-footer text-right">
										<a href="#" class="btn btn-primary">Update</a>
										<a href="#" class="btn btn-danger">Cancel</a>
									</div>
								</div>
							</div>
							<div class="col-lg-8 col-xl-8 col-md-12 col-sm-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Edit Profile</h3>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="exampleInputname"> Name</label>
													<h6>Mazen</h6>
												</div>
											</div>
											<div class="col-lg-6 col-md-12">
												<div class="form-group">
													<label for="exampleInputname1">Position</label>
													<h6>admin</h6>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for="exampleInputEmail1">Email address</label>
											<h6>alwanmazen@yahoo.com</h6>
										</div>
										<div class="card-footer">
											<a href="#" class="btn btn-success mt-1">Save</a>
											<a href="#" class="btn btn-danger mt-1">Cancel</a>
										</div>

									</div>
								</div>
							</div>
								</div>

						<!-- ROW-1 CLOSED -->

						<!-- ROW-2 OPEN -->
{{--						<div class="row">--}}
{{--							<div class="col-12">--}}
{{--								<div class="card">--}}
{{--									<div class="card-header ">--}}
{{--										<h3 class="card-title ">Projects</h3>--}}
{{--										<div class="card-options">--}}
{{--											<button id="add__new__list" type="button" class="btn btn-md btn-primary " data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus"></i> Add a new Project</button>--}}
{{--										</div>--}}
{{--									</div>--}}
{{--									<div class="table-responsive">--}}
{{--										<table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">--}}
{{--											<thead>--}}
{{--												<tr>--}}
{{--													<th scope="col">ID</th>--}}
{{--													<th scope="col">Project Name</th>--}}
{{--													<th scope="col">Backend</th>--}}
{{--													<th scope="col">Deadline</th>--}}
{{--													<th scope="col">Team Members</th>--}}
{{--													<th scope="col">Edit Project Details </th>--}}
{{--													<th scope="col">list info</th>--}}
{{--												</tr>--}}
{{--											</thead>--}}
{{--											<tbody>--}}
{{--												<tr>--}}
{{--													<td>1</td>--}}
{{--													<td>At vero eos et accusamus et iusto odio</td>--}}
{{--													<td>PHP</td>--}}
{{--													<td>15/11/2018</td>--}}
{{--													<td>15 Members</td>--}}
{{--													<td>--}}
{{--														<a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>--}}
{{--														<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>--}}
{{--													</td>--}}
{{--													<td><a class="btn btn-sm btn-secondary" href="#"><i class="fa fa-info-circle"></i> Details</a> </td>--}}
{{--												</tr>--}}
{{--												<tr>--}}
{{--													<td>2</td>--}}
{{--													<td>voluptatum deleniti atque corrupti quos</td>--}}
{{--													<td>Angular js</td>--}}
{{--													<td>25/11/2018</td>--}}
{{--													<td>12 Members</td>--}}
{{--													<td>--}}
{{--														<a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>--}}
{{--														<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>--}}
{{--													</td>--}}
{{--													<td><a class="btn btn-sm btn-secondary" href="#"><i class="fa fa-info-circle"></i> Details</a> </td>--}}
{{--												</tr>--}}
{{--												<tr>--}}
{{--													<td>3</td>--}}
{{--													<td>dignissimos ducimus qui blanditiis praesentium </td>--}}
{{--													<td>Java</td>--}}
{{--													<td>5/12/2018</td>--}}
{{--													<td>20 Members</td>--}}
{{--													<td>--}}
{{--														<a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>--}}
{{--														<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>--}}
{{--													</td>--}}
{{--													<td><a class="btn btn-sm btn-secondary" href="#"><i class="fa fa-info-circle"></i> Details</a> </td>--}}
{{--												</tr>--}}
{{--												<tr>--}}
{{--													<td>4</td>--}}
{{--													<td>deleniti atque corrupti quos dolores  </td>--}}
{{--													<td>Phython</td>--}}
{{--													<td>14/12/2018</td>--}}
{{--													<td>10 Members</td>--}}
{{--													<td>--}}
{{--														<a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>--}}
{{--														<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>--}}
{{--													</td>--}}
{{--													<td><a class="btn btn-sm btn-secondary" href="#"><i class="fa fa-info-circle"></i> Details</a> </td>--}}
{{--												</tr>--}}
{{--												<tr>--}}
{{--													<td>5</td>--}}
{{--													<td>et quas molestias excepturi sint occaecati</td>--}}
{{--													<td>Phython</td>--}}
{{--													<td>4/12/2018</td>--}}
{{--													<td>17 Members</td>--}}
{{--													<td>--}}
{{--														<a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>--}}
{{--														<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>--}}
{{--													</td>--}}
{{--													<td><a class="btn btn-sm btn-secondary" href="#"><i class="fa fa-info-circle"></i> Details</a> </td>--}}
{{--												</tr>--}}
{{--											</tbody>--}}
{{--										</table>--}}
{{--									</div>--}}
{{--								</div>--}}
{{--							</div>--}}
{{--						</div>--}}
						<!-- ROW-2 CLOSED -->

					</div>
				</div>
				<!--CONTAINER CLOSED -->
			</div>
@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/chart/Chart.bundle.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/chart/utils.js') }}"></script>
@endsection
