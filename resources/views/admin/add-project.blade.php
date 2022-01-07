@extends('layouts.vertical-menu.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/single-page/css/main.css')}}" rel="stylesheet">
@endsection

@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Add a New Project</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Project's List</a></li>
            <li class="breadcrumb-item active text-orange" aria-current="page">Add Projects</li>
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="login100-form validate-form" action="{{route('add-project')}}" method="POST">
                        @csrf
                        <span class="login100-form-title">
									New Project
								</span>
                        <div class="wrap-input100 validate-input" >
                            <input class="input100" type="text" name="name" placeholder="Project Name" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
										<i class="zmdi zmdi-eye" aria-hidden="true"></i>
									</span>
                        </div>
                        <div class="wrap-input100 validate-input" >
                            <input class="input100" type="text" name="backend" placeholder="Technology" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
										<i class="zmdi zmdi-directions-run" aria-hidden="true"></i>
									</span>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <select class="input100" type="text" name="customer" placeholder="Customer">
                                <option value="" selected disabled hidden>Choose Your Customer</option>
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @endforeach
                            </select>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
										<i class="zmdi zmdi-card" aria-hidden="true"></i>
									</span>
                        </div>
                        <div class="wrap-input100 validate-input" >
                            <input placeholder="Start Date" class="input100"  name="start_date" onfocus="(this.type='date')" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
										<i class="zmdi zmdi-view-day" aria-hidden="true"></i>
									</span>
                        </div>
                        <div class="container-login100-form-btn">
                            <button  class="login100-form-btn btn-purple-gradient">
                                {{ __('Add a New Project') }}
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




