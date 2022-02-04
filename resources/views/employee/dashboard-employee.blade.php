@extends('layouts.vertical-menu-employee.master-employee')
@section('css')
    <link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.skinSimple.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active text-orange" aria-current="page">Hello {{ Auth::user()->name }}, Have A Productive Day!
            </li>
            <li class="breadcrumb-item active text-orange" aria-current="page">{{ $date }}</li>

        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-6 ">
            <div class="card bg-purple-gradient img-card box-primary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{ $timeSum }}</h2>
                            <p class="text-white mb-0">Total Hours Worked This Month!</p>
                        </div>
                        <div class="ml-auto"> <i class="fa fa-send-o text-white fs-30 mr-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->

        <div class="col-sm-12 col-md-6 ">
            <div class="card bg-purple-gradient img-card box-primary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{ $weekly }}</h2>
                            <p class="text-white mb-0">Total Hours Worked This Week!</p>
                        </div>
                        <div class="ml-auto"> <i class="fa fa-indent text-white fs-30 mr-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
    </div>
<div class="row">
    <div class="col-sm-12 col-md-12 ">
        <div class="card bg-orange img-card box-primary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">You Have These {{$projectCount}} Projects On The Pipeline:</h2>
                        <p class="text-white mb-0">
                            Just To Name A Few:<br>
                            • @foreach ($projects->slice(0, 3) as $project){{ $project['name'] }} / @endforeach
                        </p>
                    </div>
                    <div class="ml-auto"> <i class="fa fa-address-book text-white fs-30 mr-2 mt-2"></i> </div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
    <div class="col-sm-12 col-md-12 ">
        <div class="card bg-purple-gradient img-card box-secondary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{ $timedaySum }} Hours Clocked in Today</h2>
                        <p class="text-white mb-0"> @foreach ($timelogs as $timelog)
                                • {{ $timelog->project->name }} -> {{ $timelog->time }} Hours
                            @endforeach</p>
                            
                    </div>
                    <div class="ml-auto"> <a   type="button" href="{{route('work-log')}}" class="btn btn-sm btn-orange "><i
                        class="fa fa-plus"></i > </a> </div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
</div>


@endsection
@section('js')
    <script src="{{ URL::asset('assets/js/index2.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/echarts/echarts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/morris/raphael-min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/morris/morris.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>
@endsection
