@extends('layouts.vertical-menu.master')
@section('css')
@endsection
@section('page-header')
                        <!-- PAGE-HEADER -->
                            <div>
                                <h1 class="page-title">Dashboard</h1>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Hello {{Auth::user()->name}}, Have a Great Day!</li>
                                </ol>
                            </div>
                        <!-- PAGE-HEADER END -->
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-primary img-card box-primary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{$customer}}</h2>
                            <p class="text-white mb-0">Total Customers At Devista</p>
                        </div>
                        <div class="ml-auto"> <i class="fa fa-send-o text-white fs-30 mr-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-secondary img-card box-secondary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">0</h2>
                            <p class="text-white mb-0">Hours Worked In total</p>
                        </div>
                        <div class="ml-auto"> <i class="fa fa-bar-chart text-white fs-30 mr-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card  bg-success img-card box-success-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">0</h2>
                            <p class="text-white mb-0">Target This Month</p>
                        </div>
                        <div class="ml-auto"> <i class="fa fa-dollar text-white fs-30 mr-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card bg-info img-card box-info-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">0 Employees</h2>
                            <p class="text-white mb-0">Cloked in Today</p>
                        </div>
                        <div class="ml-auto"> <i class="fa fa-toggle-on text-white fs-30 mr-2 mt-2"></i> </div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
    </div>


    <!-- ROW-3 OPEN -->
    <div class="row">
        <div class="col-xl-12 col-md-12 col-lg-12"><div class="card">
                <div class="card-header">
                    <h3 class="card-title">Work Activity</h3>
                </div>
                <div class="card-body">
                    <div>
                        <div class="clearfix">
                            <div class="float-left">
                                <div class="h4 number-font mb-0">0</div>
                            </div>
                            <div class="float-right">
                                <small class="text-muted h6">Completed Projects</small>
                            </div>
                        </div>
                        <div class="progress mt-2 h-1">
                            <div class="progress-bar  bg-primary w-75"></div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="clearfix">
                            <div class="float-left">
                                <div class="h4 number-font mb-0">{{$project}}</div>
                            </div>
                            <div class="float-right">
                                <small class="text-muted h6">In Progress </small>
                            </div>
                        </div>
                        <div class="progress mt-2 h-1">
                            <div class="progress-bar  bg-secondary w-75"></div>
                        </div>
                    </div>
                    <div class="mt-5 mb-4">
                        <div class="clearfix">
                            <div class="float-left">
                                <div class="h4 number-font mb-0">0</div>
                            </div>
                            <div class="float-right">
                                <small class="text-muted h6">Upcoming Projects</small>
                            </div>
                        </div>
                        <div class="progress mt-2 h-1">
                            <div class="progress-bar bg-success w-75"></div>
                        </div>
                    </div>
                </div>
                <div>
                    <div id="spark1"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xl-3 col-md-12 col-lg-6">
            <div class="card">
                <div class="card-body text-center">
                    <h6 class=""><span class="text-primary"><i class="fe fe-file-text mr-2 fs-20 text-primary-shadow"></i></span>Total Projects</h6>
                    <h3 class="text-dark counter mt-0 mb-3 number-font">{{$project}}</h3>
                    <div class="progress h-1 mt-0 mb-2">
                        <div class="progress-bar progress-bar-striped bg-primary w-70" role="progressbar"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-12 col-lg-6">
            <div class="card overflow-hidden">
                <div class="card-body text-center">
                    <h6 class=""><span class="text-secondary"><i class="fe fe-users mr-2 fs-20 text-secondary-shadow"></i></span>Total Employees</h6>
                    <h3 class="text-dark counter mt-0 mb-3 number-font">{{$user}}</h3>
                    <div class="progress h-1 mt-0 mb-2">
                        <div class="progress-bar progress-bar-striped  bg-secondary w-50" role="progressbar"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-12 col-lg-6">
            <div class="card overflow-hidden">
                <div class="card-body text-center">
                    <h6 class=""><span class="text-success"><i class="fe fe-award mr-2 fs-20 text-success-shadow"></i></span>Pull Requests</h6>
                    <h3 class="text-dark counter mt-0 mb-3 number-font">0</h3>
                    <div class="progress h-1 mt-0 mb-2">
                        <div class="progress-bar progress-bar-striped  bg-success w-60" role="progressbar"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-12 col-lg-6">
            <div class="card overflow-hidden">
                <div class="card-body text-center">
                    <h6 class=""><span class="text-info"><i class="fe fe-tag mr-2 fs-20 text-info-shadow"></i></span>Total Tasks</h6>
                    <h3 class="text-dark counter mt-0 mb-3 number-font">0</h3>
                    <div class="progress h-1 mt-0 mb-2">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info w-40" role="progressbar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
@section('js')
<script src="{{ URL::asset('assets/plugins/chart/Chart.bundle.js') }}"></script>
<script src="{{ URL::asset('assets/js/index3.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/chart/utils.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/echarts/echarts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/apexcharts/apexcharts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/index1.js') }}"></script>
<script src="{{ URL::asset('assets/js/index5.js') }}"></script>
@endsection




