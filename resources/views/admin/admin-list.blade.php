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
            <li class="breadcrumb-item active text-orange" aria-current="page">A List of All The Admins!</li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                        <form method="POST" action="{{route('delete-checkbox-admin')}}">
                <div class="card-header">
                    <h3 class="card-title">Admins</h3>
                    <div class="card-options">
                        <div class="btn-toolbar">
                            <button disabled id="deleteButton" type="submit" class="btn btn-md btn-orange rounded-pill " onclick="return confirm('Are you sure you want to Delete This Admin?')"><i class="fa fa-minus"></i> Delete
                                Admins
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                            <table id="example" class="table table-vcenter table-bordered text-nowrap w-100">

                                {{ csrf_field() }}
                                <thead class="thead-light">
                                <tr>
                                    <th class="wd-15p">-</th>
                                    <th class="wd-15p">Name</th>
                                    <th class="wd-15p">Position</th>
                                    <th class="wd-10p">Email</th>
                                    <th class="wd-10p text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    @if($user->getRoleNames()[0] !== "employee" && $user->id !== Auth::User()->id)
                                        <tr>
                                            <td><input type="checkbox" id="checkbox" name="checkboxes[]" value="{{$user->id}}"></td>
                                            <td class="font-italic">{{$user->name}}</td>
                                            <td class="font-italic">{{$user->position}}</td>
                                            <td class="font-italic">{{$user->email}}</td>
                                            <td class="text-center align-middle">
                                                <a class="btn btn-sm btn-purple-gradient badge"
                                                   href="{{route('edit-admin',$user->id)}}" type="button"><i
                                                            class="fa fa-edit"></i>Edit</a>
                                                <a class="btn btn-sm btn-purple-gradient badge"
                                                   href="{{route('change-to-employee',$user->id)}}" type="button" onclick="return confirm('Are you sure you want to Demote This Admin?')"><i class="fa fa-edit" ></i>Set to Employee</a>

                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>

                    </div>
                </div>
                        </form>
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
    <script>
        $(document).ready(function () {
            $('#checkbox').click(function () {
                if ($(this).is(':checked')) {
                    $('#deleteButton').removeAttr('disabled');
                }
                if (!$(this).is(':checked')) {
                    $('#deleteButton').attr('disabled','disabled');

                }

            });

        });

    </script>
@endsection
