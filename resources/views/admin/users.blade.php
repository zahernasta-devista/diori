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
            <li class="breadcrumb-item"><a href="#">Elements</a></li>
            <li class="breadcrumb-item active text-orange" aria-current="page">A List Of Employees!</li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <form method="POST" action="{{route('delete-checkbox-employee')}}">
                    <div class="card-header">
                       
                            <a type="button" href="{{route('add-user')}}" class="btn btn-sm btn-orange rounded-pill"><i
                                        class="fa fa-plus"></i > Add a new Employee</a>
                            &emsp;
                            <button disabled id="deleteButton" type="submit" class="btn btn-sm btn-orange rounded-pill "
                                    onclick="return confirm('Are you sure you want to delete the selected employee ?')">
                                <i class="fa fa-minus"></i> Delete Employees
                            </button>
                        
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">Your Employees</h3>
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
                                    <th class="wd-15p">-</th>
                                    <th class="wd-15p">Name</th>
                                    <th class="wd-15p">Position</th>
                                    <th class="wd-10p">Email</th>
                                    <th class="wd-10p text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    @if($user->id !== Auth::User()->id)
                                        <tr>
                                            <td><input onclick="activeButton()" type="checkbox" id="checkbox" name="checkboxes[]"
                                                       value="{{$user->id}}"></td>
                                            <td class="font-italic"> {{$user->name}}</td>
                                            <td class="font-italic">{{$user->position}}</td>
                                            <td class="font-italic">{{$user->email}}</td>
                                            <td class="text-center align-middle">
                                                @if($user->getRoleNames()[0] !== "admin")
                                                <a class="btn btn-sm btn-purple-gradient"
                                                   href="{{route('edit-user',$user->id)}}" type="button"><i
                                                            class="fa fa-edit"></i>Edit</a>
                                                <a class="btn btn-sm btn-purple-gradient"
                                                   href="{{route('employee-project-page',$user->id)}}" type="button"><i
                                                            class="fa fa-edit"></i>Assign</a>
                                                <a class="btn btn-sm btn-purple-gradient"
                                                   href="{{route('change-to-admin',$user->id)}}" type="button"
                                                   onclick="return confirm('Are you sure you want to Promote the selected employee ?')"><i
                                                            class="fa fa-dashboard"></i>Set to Admin</a>
                                                @endif
                                                <a class="btn btn-sm btn-purple-gradient"
                                                   href="{{route('employee-detail',$user->id)}}" type="button"><i
                                                            class="fa fa-dashboard"></i>Detail</a>
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