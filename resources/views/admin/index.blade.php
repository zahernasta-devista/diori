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
                            <p class="text-white mb-0">Total Target This Month At Devista</p>
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
        <div class="col-md-12 col-lg-6">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class=""><span class="text-primary"><i class="fe fe-file-text mr-2 fs-20 text-primary-shadow"></i></span>Total Projects</h4>
                    <h3 class="text-dark counter mt-0 mb-3 number-font">{{$project}}</h3>
                    <div class="progress h-1 mt-0 mb-2">
                        <div class="progress-bar progress-bar-striped bg-primary w-100" role="progressbar"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="card overflow-hidden">
                <div class="card-body text-center">
                    <h4 class=""><span class="text-secondary"><i class="fe fe-users mr-2 fs-20 text-secondary-shadow"></i></span>Total Employees</h4>
                    <h3 class="text-dark counter mt-0 mb-3 number-font">{{$user}}</h3>
                    <div class="progress h-1 mt-0 mb-2">
                        <div class="progress-bar progress-bar-striped  bg-secondary w-100" role="progressbar"></div>
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




