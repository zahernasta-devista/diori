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
            <li class="breadcrumb-item active" aria-current="page">Hello {{ Auth::user()->name }}, Have A Productive Day!
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $date }}</li>

        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')

    <div class="row">
        <div class="col-lg-12">

            <div class="row">
                <div class="col-lg-6 ">
                    <div class="card">
                        <div class="card-body text-center statistics-info">
                            <div class="counter-icon bg-primary mb-0 box-primary-shadow">
                                <i class="fe fe-trending-up text-white"></i>
                            </div>
                            <h6 class="mt-4 mb-1">You Worked </h6>

                            <h2> {{ $timeSum }}</h2>

                            <h5 class="text-muted">Hours This month</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body text-center statistics-info">
                            <div class="counter-icon bg-green mb-0 box-secondary-shadow">
                                <i class="fe fe-clock text-white"></i>
                            </div>
                            <h6 class="mt-4 mb-1">Work Log For The Day</h6>
                            <h2 class="mb-4 mb-5">{{ $timedaySum }}</h2>
                            <div>
                                @foreach ($timelogs as $timelog)
									• {{ $timelog->project->name }} -> {{ $timelog->time }} Hours
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ URL::asset('assets/js/index2.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/chart/Chart.bundle.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/chart/utils.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/echarts/echarts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/morris/raphael-min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/morris/morris.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>
@endsection
