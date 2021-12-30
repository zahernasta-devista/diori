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
            <li class="breadcrumb-item"><a href="#">Employee's List</a></li>
            <li class="breadcrumb-item active text-orange" aria-current="page">Projects Assigned</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$user->name}}'s assigned Projects</h3>
                    <div class="card-options">
                        <a type="button" href="{{ route('assign-project-page',$user->id) }}" class="btn btn-md btn-orange " ><i class="fa fa-plus"></i> Assign a New Project</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                            <thead>
                            <tr>
                                <th scope="col">Project Name</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{$project->name}}</td>
                                    <td>{{$project->customer->name}}</td>
                                    <td>
                                        <form action="{{ route('unassign-employee-project',[$user->id, $project->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-purple-gradient"><i class="fa fa-close"></i> Unassign</button>
                                        </form>
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
