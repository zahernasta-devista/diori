@extends('layouts.vertical-menu.master2')
@section('css')
    <link href="{{ URL::asset('assets/plugins/single-page/css/main.css')}}" rel="stylesheet">
@endsection
@section('content')
    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">
        <!-- PAGE -->
        <div class="page">
            <div class="">
                <!-- CONTAINER OPEN -->
                <div class="container-login100">
                    <div class="row">
                        <div class="col col-login mx-auto">
                            <form class="card shadow-none" action="{{ route('password.email') }}" method="post">
                                @csrf
                                <div class="card-body p-6">
                                    <h3 class="text-center card-title">Forgot password</h3>
                                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                                        <input class="input100" type="text" name="email" placeholder="Email">
                                        <span class="focus-input100"></span>
                                        <span class="symbol-input100">
													<i class="zmdi zmdi-email" aria-hidden="true"></i>
												</span>
                                    </div>
                                    <div class="form-footer">
                                        <button  class="btn btn-primary btn-block">Send</button>
                                    </div>
                                    <div class="text-center text-muted mt-3 ">
                                        Forget it, <a href="login">send me back</a> to the sign in screen.
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!--END PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

@endsection
@section('js')
@endsection
