@extends('layouts.vertical-menu-employee.master-employee')
@section('css')
    <link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.skinSimple.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">History</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active text-orange" aria-current="page">Hello {{ Auth::user()->name }}, This is
                Your History!
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
                            <h3 class="mb-0 number-font">Holidays you took this year:</h3>
                            <h3 class="text-white mb-0">•{{$holidaysTaken}} Days</h3>
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
                        </div>
                        <div class="ml-auto"><i class="fa fa-battery text-white fs-30 mr-2 mt-2"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <form method="GET">
                    <div class="card-header">
                        <select id="dropdown" name="month" class="btn btn-sm btn-purple-gradient rounded-pill"><i
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
                        <select id="dropdown" name="year" class="btn btn-sm btn-purple-gradient rounded-pill "><i
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
                        <select id="dropdown" name="project" class="btn btn-sm btn-purple-gradient  rounded-pill"><i
                                    class="fa fa-dropbox"></i>
                            <option selected disabled hidden>Select The Project</option>
                            <option class="btn btn-purple" selected value="">Projects</option>
                            @foreach($projectsOptions as $project)

                                <option class="btn btn-purple" value="{{$project->id}}"
                                        @if(request()->project ==$project->id) selected @endif>{{$project->name}}</option>
                            @endforeach
                        </select>
                        &nbsp;
                        <input value="{{Auth::user()->id}}" type="hidden"  id="dropdown" name="user" class="btn btn-sm btn-purple-gradient rounded-pill ">
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

                                                                <tr>

                                                                    <td class="font-italic"><h5>• {{$userDetail->user->name}}</h5></td>
                                                                    <td class="font-italic">
                                                                        <h5> • {{$userDetail->hoursWorkedPerMonth}} Hours</h5>
                                                                        @foreach($userDetail->projects as $key => $value)
                                                                            <h6>{{$key}} -> {{$value}}</h6>
                                                                        @endforeach
                                                                    </td>
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
