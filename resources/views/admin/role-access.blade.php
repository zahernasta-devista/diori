@extends('layouts.vertical-menu.master3')
@section('css')
    <link href="{{ URL::asset('assets/plugins/single-page/css/main.css')}}" rel="stylesheet">
@endsection
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{URL::asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
        </div>
        <div class="page">
            <div class="">
                <!-- CONTAINER OPEN -->
                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                            <span class="login100-form-title">
									Choose Role
								</span>
                            <div class="wrap-input100 validate-input" >
                                <a href="{{route('dashboard-admin')}}">
                                    <div class="card bg-purple-gradient img-card box-secondary-shadow">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="text-white">
                                                    <h4 class="mb-0 number-font">Admin's Access</h4>
                                                </div>
                                                <div class="ml-auto"> <i class="fa fa-user-o text-white fs-30 mr-2 mt-2"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="wrap-input100 validate-input" >
                                <a href="{{route('dashboard-employee')}}">
                                    <div class="card bg-purple-gradient img-card box-primary-shadow">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <div class="text-white">
                                                    <h4 class="mb-0 number-font">Employee's Access ‎</h4>
                                                </div>
                                                <div class="ml-auto"> <i class="fa fa-user text-white fs-30 mr-2 mt-2"></i> </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->
@endsection
@section('js')
@endsection

