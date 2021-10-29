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
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered text-nowrap w-100">
							<thead>
							<tr>
								<th class="wd-15p">Project name</th>
								<th class="wd-15p">Customer</th>
								<th class="wd-10p">Start date</th>
								<th class="text-center">Actions</th>
							</tr>
							</thead>
							<tbody>
{{--							@foreach($projects as $project)--}}
{{--								<tr>--}}
{{--									<td>{{$project->name}}</td>--}}
{{--									<td>{{$project->customer}}</td>--}}
{{--									<td>{{$project->startdate}}</td>--}}
{{--									<td class="text-center align-middle">--}}
{{--										<div class="btn-group align-top">--}}
{{--											<a class="btn btn-sm btn-primary badge" href="{{'/project/'.$project->id}}" type="button">Edit</a>--}}
{{--											<a class="btn btn-sm btn-primary badge" href="{{ route('deleteProject',$project->id) }}" type="button"><i class="fa fa-trash"></i></a>--}}
{{--										</div>--}}
{{--									</td>--}}
{{--								</tr>--}}
{{--							@endforeach--}}
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
