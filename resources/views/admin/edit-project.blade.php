@extends('layouts.vertical-menu.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/single-page/css/main.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Edit Your Projects</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Project's List</a></li>
            <li class="breadcrumb-item active text-orange" aria-current="page">Edit Projects</li>
        </ol>
    </div>

    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <div class="page">
        <div class="">
            <!-- CONTAINER OPEN -->
            <div class="container-login100">
                <div class="wrap-login100 p-6">
                    <form class="login100-form validate-form" action="{{route('edit-project',$project->id)}}" method="POST">
                        @csrf
                        <span class="login100-form-title">
									Edit The Projects
								</span>
                        <div class="wrap-input100 validate-input" >
                            <input class="input100" type="text" name="name" placeholder="Name" value="{{$project->name}}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
										<i class="zmdi zmdi-eye" aria-hidden="true"></i>
									</span>
                        </div>
                        <div class="wrap-input100 validate-input" >
                            <input class="input100" type="text" name="backend" placeholder="backend" value="{{$project->backend}}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
										<i class="zmdi zmdi-receipt" aria-hidden="true"></i>
									</span>
                        </div>
                        <div class="wrap-input100 validate-input" data-validate = "Organization is required">
                            <input class="input100" type="date" name="start_date" placeholder="YYYY-MM-DD" value="{{$project->start_date}}">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
										<i class="zmdi zmdi-view-day" aria-hidden="true"></i>
									</span>
                        </div>
                        <div class="container-login100-form-btn">
                            <button  class="login100-form-btn btn-purple-gradient">
                                {{ __('Submit Changes') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- CONTAINER CLOSED -->
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ URL::asset('assets/plugins/chart/Chart.bundle.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/chart/utils.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/echarts/echarts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/index1.js') }}"></script>
@endsection




