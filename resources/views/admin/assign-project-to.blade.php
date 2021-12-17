@extends('layouts.vertical-menu.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/single-page/css/main.css')}}" rel="stylesheet">

@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Assign</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Employee's List</a></li>
            <li class="breadcrumb-item"><a href="#">Assign Project To</a></li>
            <li class="breadcrumb-item active text-success" aria-current="page">Projects to assign</li>
        </ol>
    </div>
@endsection
@section('content')
    <div class="page">
        <div class="">
            <!-- CONTAINER OPEN -->
            <div class="container-login100">
                <div class="wrap-login100 p-6">
                    <form class="login100-form validate-form" action=" {{route('assign-employee-project',$user->id)}}" method="POST">
                        @csrf
                        <span class="login100-form-title">
									Assign a New Project
								</span>
                        <div class="wrap-input100 validate-input" >
                            <input class="input100 border-white bg-light" type="text" name="name" value="{{$user->name}}" required readonly>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
										<i class="zmdi zmdi-eye" aria-hidden="true"></i>
									</span>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <select class="input100" type="text" name="project" >
                                <option value="" selected disabled hidden>Choose Your Project</option>
                                @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{$project->name}}</option>
                                @endforeach
                            </select>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
										<i class="zmdi zmdi-card" aria-hidden="true"></i>
									</span>
                        </div>
                        <div class="container-login100-form-btn">
                            <button  class="login100-form-btn btn-purple-gradient">
                                {{ __('Assign') }}
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
    <script src="{{ URL::asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/datatable.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
@endsection
