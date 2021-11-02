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
		<div class="col-12">
			<div class="card">
				<div class="card-header ">
					<h3 class="card-title ">Projects</h3>
					<div class="card-options">
						<a href="{{ url('/' . $page='addProject') }}" class="btn btn-md btn-primary " type="button">Add a new Project</a>

					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered text-nowrap w-100">

						<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Project Name</th>
							<th scope="col">Backend</th>
							<th scope="col">start date</th>
							<th scope="col">Edit Project Details </th>
							<th scope="col">list info</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>1</td>
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
{{--							@foreach($projects as $project)--}}
{{--								<tr>--}}
{{--									<td>{{$project->name}}</td>--}}
{{--									<td>{{$project->customer->name}}</td>--}}
{{--									<td>{{$project->startdate}}</td>--}}
{{--									<td class="text-center align-middle">--}}
{{--										<div class="btn-group align-top">--}}
{{--											<a class="btn btn-sm btn-primary badge" href="{{'/project/'.$project->id}}" type="button">Edit</a>--}}
{{--											<a class="btn btn-sm btn-primary badge" href="{{ route('deleteProject',$project->id) }}" type="button"><i class="fa fa-trash"></i></a>--}}
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

