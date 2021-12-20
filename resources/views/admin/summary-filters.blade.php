@extends('layouts.vertical-menu.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')

    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Employees And Timelog</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Hours & Projects</a></li>
            <li class="breadcrumb-item active" aria-current="page">Summary of All The Work for The Selected Month!</li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection


@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="card bg-purple-gradient img-card box-primary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">Total Hours Worked On Selected Project:</h2>
                            <h3 class="text-white mb-0">•{{$sumPerSelectedProject}} Hours</h3>
                        </div>
                        <div class="ml-auto"> <i class="fa fa-pencil text-white fs-30 mr-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="card bg-purple-gradient img-card box-primary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">Overall Hours Worked This Month:</h2>
                            <h3 class="text-white mb-0">
                                •{{$overallSum}} Hours</h3>
                        </div>
                        <div class="ml-auto"> <i class="fa fa-battery text-white fs-30 mr-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <form method="GET" action="{{route('filters')}}">
                    <div class="card-header">
                        <h3 class="card-title">The Overall Summary!</h3>
                        <div class="card-options">
                            <select name="month"  class="btn btn-md btn-purple-gradient rounded-pill"><i class="fa fa-dropbox" required></i>
                                <option  selected disabled hidden>Select The Month</option>
                                <option class="btn btn-purple" value="1">January</option>
                                <option class="btn btn-purple" value="2">February</option>
                                <option class="btn btn-purple" value="3">March</option>
                                <option class="btn btn-purple" value="4">April</option>
                                <option class="btn btn-purple" value="5">May</option>
                                <option class="btn btn-purple" value="6">June</option>
                                <option class="btn btn-purple" value="7">July</option>
                                <option class="btn btn-purple" value="8">August</option>
                                <option class="btn btn-purple" value="9">September</option>
                                <option class="btn btn-purple" value="10">October</option>
                                <option class="btn btn-purple" value="11">November</option>
                                <option class="btn btn-purple" value="12">December</option>
                            </select>
                            &emsp;
                            <select  name="year"  class="btn btn-md btn-purple-gradient rounded-pill"><i class="fa fa-dropbox" ></i>
                                <option value="" selected disabled hidden>Select The Year</option>
                                @foreach(range(2021, date('Y')+20) as $y)
                                    <option value ="{{$y}}" class="btn btn-purple">{{$y}}</option>
                                @endforeach
                            </select>
                            &emsp;
                            <select  name="project"  class="btn btn-md btn-purple-gradient rounded-pill"><i class="fa fa-dropbox" ></i>
                                @foreach($projectsOptions as $project)
                                <option selected disabled hidden>Select The Project</option>
                                    <option class="btn btn-purple" value="{{$project->id}}">{{$project->name}}</option>
                                @endforeach
                            </select>
                            &emsp;
                            <button type="submit" class="btn btn-md btn-purple-gradient rounded-pill">Search</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if($errors->any())
                                <div class="alert alert-primary">
                                    {{$errors->first()}}
                                </div>
                            @endif
{{--                            <div class="alert alert-primary"> The Date selected {{$selectYear}}/{{$selectMonth}}</div>--}}
                            <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th class="wd-15p">Name</th>
                                    <th class="wd-10p">Total Clocked Hours</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($userDetails as $userDetail)
                                    @if($userDetail->user->getRoleNames()[0] !== "admin")
                                        <tr>

                                            <td><h5>{{$userDetail->user->name}}</h5></td>
                                            <td>
                                                <h5>{{$userDetail->hoursWorkedPerMonth}} Hours</h5>
                                                @foreach($userDetail->projects as $key => $value)
                                                    <h6>{{$key}} -> {{$value}}</h6>
                                                @endforeach
                                            </td>
                                            @endif
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
