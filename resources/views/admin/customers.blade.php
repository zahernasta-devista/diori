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
			<li class="breadcrumb-item active text-orange" aria-current="page">A List Of Customers!</li>
		</ol>
	</div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <form method="POST" action="{{route('delete-checkbox-customer')}}">
                    <div class="card-header">
                        
                        
                            <a type="button" href="{{ route('add-customers') }}" class="btn btn-sm btn-orange rounded-pill "><i
                                        class="fa fa-plus"></i> Add a New Customer</a>
                            &emsp;
                            <button disabled id="deleteButton" type="submit" class="btn btn-sm btn-orange rounded-pill" onclick="return confirm('Are you sure you want to Delete This Customer')"><i class="fa fa-minus"></i> Delete
                                Customers
                            </button>
                      
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Customers Table</h3>
                        <div class="table-responsive">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{$error}}
                                </div>
                            @endforeach
                            {{ csrf_field() }}
                            <table id="example" class="table table-vcenter table-bordered text-nowrap w-100">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">-</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customers as $customer)
                                    <tr>
                                        <td><input onclick="activeButton()" id="checkbox" type="checkbox" name="checkboxes[]" value="{{$customer->id}}"></td>
                                        <td class="font-italic">{{$customer->name}}</td>
                                        <td class="font-italic">{{$customer->email}}</td>

                                        <td class="text-center">
                                            <a class="btn btn btn-sm btn-purple-gradient"
                                               href="{{route('edit-customer-page',$customer->id)}}" type="button"><i
                                                        class="fa fa-edit"></i>Edit</a>
                                            <a class="btn btn-sm btn-purple-gradient"
                                               href="{{route('customer-projects-page',$customer->id)}}" type="button"><i
                                                        class="fa fa-edit"></i>Detail</a>
                                        </td>
                                    </tr>
                                @endforeach

							</tbody>
						</table>
					</div>
				</div>
						</form>
			</div>
		</div>
	</div>
@endsection
@section('js')
	<script src="{{ URL::asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/datatable/datatable.js') }}"></script>
	<script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
    <script>
        function activeButton() {


            let countChecked = function() {
                let n = $( "input:checked" ).length;
                if (n == 0) jQuery('#deleteButton').prop('disabled', true);
                else jQuery('#deleteButton').prop('disabled', false);
            };
            countChecked();
            $( "#checkbox" ).on( "click", countChecked );
        }

    </script>

@endsection
