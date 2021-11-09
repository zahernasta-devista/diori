@extends('layouts.vertical-menu.master')
@section('css')
	<link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
	<link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
	<!-- PAGE-HEADER -->
	<div>
		<h1 class="page-title">Projects</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Tables</a></li>
			<li class="breadcrumb-item active" aria-current="page">Projects</li>
		</ol>
	</div>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Project Table</h3>
						<div class="card-options">
							<a type="button" href="{{ url('/' . $page='addProject') }}" class="btn btn-md btn-primary " ><i class="fa fa-plus"></i> Add a new Project</a>
						</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered text-nowrap w-100">
							<thead>
							<tr>
								<th scope="col">Project Name</th>
								<th scope="col">Backend</th>
								<th scope="col">start date</th>
								<th scope="col">Edit Project Details </th>
								<th scope="col">list info</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>Diori Work Log</td>
								<td>Laravel</td>
								<td>17/10/2021</td>
								<td>
									<a class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>
									<a class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>
								</td>
								<td><a class="btn btn-sm btn-secondary" href="#"><i class="fa fa-info-circle"></i> Details</a> </td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script src="{{ URL::asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/datatable/datatable.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
@endsection
