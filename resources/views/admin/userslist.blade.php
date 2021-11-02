@extends('layouts.vertical-menu.master')
@section('css')
	<link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
	<link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
	<!-- PAGE-HEADER -->
	<div>
		<h1 class="page-title">Employees</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Tables</a></li>
			<li class="breadcrumb-item active" aria-current="page">Employees</li>
		</ol>
	</div>
	<!-- PAGE-HEADER END -->
@endsection
@section('content')
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header ">
					<h3 class="card-title ">Employees</h3>
					<div class="card-options">
						<a href="{{ url('/' . $page='register') }}" class="btn btn-md btn-primary " type="button">Add a new Employee</a>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered text-nowrap w-100">

							<thead>
							<tr>
								<th scope="col">Name</th>
								<th scope="col">Position</th>
								<th scope="col">Email</th>
								<th scope="col">Edit Project Details </th>
								<th scope="col">list info</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>Alwan Mazen</td>
								<td>Intern</td>
								<td>Mazen@devista.ro</td>
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

	<!-- ROW-1 OPEN -->

{{--							@foreach($employees as $employee)--}}
{{--								<tr>--}}
{{--									<td>{{$employee->name}}</td>--}}
{{--									<td>{{$employee->position}}</td>--}}
{{--									<td>{{$employee->email}}</td>--}}
{{--									<td class="text-center align-middle">--}}
{{--										<div class="btn-group align-top">--}}
{{--											<a class="btn btn-sm btn-primary badge" href="{{'/employee/'.$employee->id}}" type="button">Edit</a>--}}
{{--											<a class="btn btn-sm btn-primary badge" href="{{ route('delete' ,$employee->id) }}" type="button"><i class="fa fa-trash"></i></a>-
												<a class="btn btn-sm btn-primary badge" href="{{ change to admin }}" type="button">Admin</a>
-}}
{{--										</div>--}}
{{--									</td>--}}
{{--								</tr>--}}
{{--							@endforeach--}}

@endsection
@section('js')
	<script src="{{ URL::asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/datatable/datatable.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
@endsection
