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
	<!-- PAGE-HEADER END -->
@endsection
@section('content')
	<!-- ROW-1 OPEN -->
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="card">
				<div class="card-header">
					<h3  class="col-md-12 col-lg-11 card-title">{{$customers->name}}'s  Projects</h3>
					
					
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered text-nowrap w-100">
							<thead>
							<tr>
								<th class="wd-15p">Name</th>
								<th class="wd-15p">Backend</th>
								<th class="wd-10p">Start Date</th>
                                
							</tr>
							</thead>
							<tbody>
							@foreach($projects as $project)
								<tr>
									<td>{{$project->name}}</td>
									<td>{{$project->backend}}</td>
									<td>{{$project->start_date}}</td>
									
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<!-- CONTAINER CLOSED -->
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
