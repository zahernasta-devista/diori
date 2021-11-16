@extends('layouts.vertical-menu.master')
@section('css')
	<link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
	<link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
	<!-- PAGE-HEADER -->
	<div>
		<h1 class="page-title">Customers</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Tables</a></li>
			<li class="breadcrumb-item active" aria-current="page">Customers</li>
		</ol>
	</div>
@endsection
@section('content')
	<div class="row">
		<div class="col-md-12 col-lg-12">
			<div class="card">
				<div class="card-header">
					<h3 class="card-title">Customers Table</h3>
						<div class="card-options">

							<a type="button" href="{{ route('add-customers') }}" class="btn btn-md btn-primary " ><i class="fa fa-plus"></i>Customers</a>

						</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered text-nowrap w-100">
							<thead>
							<tr>
								<th scope="col">Name</th>
								<th scope="col">Email</th>
								<th scope="col" class="text-center">Actions </th>
							</tr>
							</thead>
							<tbody>
							@foreach($customers as $customer)
							<tr>
								<td>{{$customer->name}}</td>
								<td>{{$customer->email}}</td>

                                <td class="text-center">
                                    <a class="btn btn btn-sm btn-primary" href="{{route('edit-customer-page',$customer->id)}}" type="button"><i class="fa fa-edit"></i>Edit</a>
									<a class="btn btn-sm btn-danger" href="{{route('delete-customers',$customer->id)}}"><i class="fa fa-trash"></i> Delete</a>
								</td>
							</tr>
							@endforeach

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
