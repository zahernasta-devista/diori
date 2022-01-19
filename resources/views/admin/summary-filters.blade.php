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
            <li class="breadcrumb-item active text-orange" aria-current="page">Summary of All The Work for The Selected
                Month!
            </li>
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
                            <h3 class="mb-0 number-font">Total Hours Worked On Selected Project:</h3>
                            <h3 class="text-white mb-0">•{{$sumPerSelectedProject}} Hours</h3>
                            <p class="text-muted text-white text-right text-sm"><small>•For All Employees</small></p>
                        </div>
                        <div class="ml-auto"><i class="fa fa-pencil text-white fs-30 mr-2 mt-2"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div class="card bg-purple-gradient img-card box-primary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h3 class="mb-0 number-font">Overall Hours Worked This Month:</h3>
                            <h3 class="text-white mb-0">
                                •{{$overallSum}} Hours</h3>
                            <p class="text-muted text-white text-right text-sm"><small>•For All Employees</small></p>

                        </div>
                        <div class="ml-auto"><i class="fa fa-battery text-white fs-30 mr-2 mt-2"></i></div>
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


                        <select name="month" class="btn btn-sm btn-purple-gradient rounded-pill"><i
                                    class="fa fa-dropbox" required></i>
                            <option selected disabled hidden>Select The Month</option>
                            <option class="btn btn-purple" value="1" @if(request()->month =='1') selected @endif>
                                January
                            </option>
                            <option class="btn btn-purple" value="2" @if(request()->month =='2') selected @endif>
                                February
                            </option>
                            <option class="btn btn-purple" value="3" @if(request()->month =='3') selected @endif>March
                            </option>
                            <option class="btn btn-purple" value="4" @if(request()->month =='4') selected @endif>April
                            </option>
                            <option class="btn btn-purple" value="5" @if(request()->month =='5') selected @endif>May
                            </option>
                            <option class="btn btn-purple" value="6" @if(request()->month =='6') selected @endif>June
                            </option>
                            <option class="btn btn-purple" value="7" @if(request()->month =='7') selected @endif >July
                            </option>
                            <option class="btn btn-purple" value="8" @if(request()->month =='8') selected @endif>
                                August
                            </option>
                            <option class="btn btn-purple" value="9" @if(request()->month =='9') selected @endif>
                                September
                            </option>
                            <option class="btn btn-purple" value="10" @if(request()->month =='10') selected @endif>
                                October
                            </option>
                            <option class="btn btn-purple" value="11" @if(request()->month =='11') selected @endif>
                                November
                            </option>
                            <option class="btn btn-purple" value="12" @if(request()->month =='12') selected @endif>
                                December
                            </option>
                        </select>
                        &nbsp;
                        <select name="year" class="btn btn-sm btn-purple-gradient rounded-pill"><i
                                    class="fa fa-dropbox"></i>
                            <option value="" selected disabled hidden>Select The Year</option>
                            @foreach(range(2021, date('Y')+20) as $y)
                                <option value="{{$y}}" class="btn btn-purple"
                                        @if(request()->year ==$y) selected @endif>{{$y}}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        @php
                            use Carbon\Carbon;
                                $currentMonth = Carbon::now()->format('m');
                                $currentYear = Carbon::now()->format('Y');
                        @endphp
                        <select name="project" class="btn btn-sm btn-purple-gradient rounded-pill"><i
                                    class="fa fa-dropbox"></i>
                            <option selected disabled hidden>Select The Project</option>
                            <option class="btn btn-purple" selected value="">All Projects</option>
                            @foreach($projectsOptions as $project)

                                <option class="btn btn-purple" value="{{$project->id}}"
                                        @if(request()->project ==$project->id) selected @endif>{{$project->name}}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <select name="user" class="btn btn-sm btn-purple-gradient rounded-pill"><i
                                    class="fa fa-dropbox"></i>
                            <option selected disabled hidden>Select The Employee</option>
                            <option class="btn btn-purple" selected value="">All Employees</option>
                            @foreach($usersOptions as $user)
                                @if($user->getRoleNames()[0] !== "admin")
                                <option class="btn btn-purple" value="{{$user->id}}"
                                        @if(request()->user ==$user->id) selected @endif>{{$user->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        &nbsp;
                        <button type="submit" class="btn btn-sm btn-purple-gradient rounded-pill"><i
                                    class="fa fa-search" aria-hidden="true"></i></button>


                    </div>

                    <div class="card-body">
                        <h3 class="card-title">The Overall Summary!</h3>
                        <div class="table-responsive">
                            @if($errors->any())
                                <div class="alert alert-primary">
                                    {{$errors->first()}}
                                </div>
                            @endif
                            {{--table head--}}
                            <table id="example" class="table table-vcenter table-bordered text-nowrap w-100">
                                <thead class="thead-light">
                                <tr>
                                    <th class="wd-15p font-italic">Name</th>
                                    <th class="wd-10p font-italic">Total Clocked Hours</th>
                                </tr>
                                </thead>
                                {{--table body--}}
                                <tbody>
                                @foreach($userDetails as $userDetail)
                                    @if($userDetail->user->getRoleNames()[0] !== "admin")
                                        <tr>

                                            <td class="font-italic"><h5>• {{$userDetail->user->name}}</h5></td>
                                            <td class="font-italic">
                                                <h5> • {{$userDetail->hoursWorkedPerMonth}} Hours</h5>
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
                        <a class="btn btn-md btn-purple-gradient rounded-pill"
                           href="{{ route('export', ['month' => $selectedMonth, 'year' => $selectedYear,'project'=>$selectedProject,'user'=>$selectedEmployee]) }}">Export </a>
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
