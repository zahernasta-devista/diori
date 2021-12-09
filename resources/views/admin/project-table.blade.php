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
                <form method="POST" action="{{route('delete-checkbox-project')}}">
                    <div class="card-header">
                        <h3 class="card-title">Project Table</h3>
                        <div class="card-options">
                            <a type="button" href="{{ route('add-project-page') }}" class="btn btn-md btn-primary "><i
                                        class="fa fa-plus"></i> Add a New Project</a>
                                        &emsp;
                                        <button type="submit" class="btn btn-md btn-danger " onclick="return confirm('Are you sure you want to delete the selected project ?')"><i class="fa fa-minus"></i> Delete
                                            Projects
                                        </button>


                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            {{ csrf_field() }}
                            <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th scope="col">-</th>
                                    <th scope="col">Project Name</th>
                                    <th scope="col">Technology </th>
                                    <th scope="col">start date</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($projects as $project)
                                    <tr>

                                        <td><input type="checkbox" name="checkboxes[]" value="{{$project->id}}"></td>
                                        <td>{{$project->name}}</td>
                                        <td>{{$project->backend}}</td>
                                        <td>{{$project->start_date}}</td>
                                        <td>{{$project->customer->name}}</td>
                                        <td class="text-center">
                                            <a class="btn btn btn-sm btn-success"
                                               href="{{route('edit-project',$project->id)}}" type="button"><i
                                                        class="fa fa-edit"></i>Edit</a>
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
@endsection
