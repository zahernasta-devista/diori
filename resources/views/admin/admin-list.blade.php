@extends('layouts.vertical-menu.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')

    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Admins</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">A List of All The Admins!</li>
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
                    <h3  class="card-title">Admins</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                            <thead>
                            <tr>
                                <th class="wd-15p">Name</th>
                                <th class="wd-15p">Position</th>
                                <th class="wd-10p">Email</th>
                                <th class="wd-10p text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                @if($user->getRoleNames()[0] !== "employee")
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->position}}</td>
                                        <td>{{$user->email}}</td>
                                        <td class="text-center align-middle">
                                            <a class="btn btn-sm btn-primary badge" href="{{route('edit-admin',$user->id)}}" type="button"><i class="fa fa-edit"></i>Edit</a>
                                            <a class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('delete-admin' ,$user->id) }}" type="button"><i class="fa fa-trash"></i>Delete</a>
                                        </td>
                                    </tr>
                                @endif
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