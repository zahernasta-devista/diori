@extends('layouts.vertical-menu.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')

    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Employees</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Hours & Projects</a></li>
            <li class="breadcrumb-item active" aria-current="page">Summary of All The Work for The Current Month!</li>

        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection


@section('content')
    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <form method="GET" action="{{route('filter-by-month')}}">
                    <div class="card-header">
                        <h3 class="card-title">The Monthly Summary!
                        </h3>
                        <div class="card-options">
{{--                            <select name="month"  class="btn btn-md btn-purple-gradient rounded-pill"><i class="fa fa-dropbox" required></i>--}}
{{--                                <option value="" selected disabled hidden>Select The Month</option>--}}
{{--                                <option class="btn btn-purple" value="1">January</option>--}}
{{--                                <option class="btn btn-purple" value="2">February</option>--}}
{{--                                <option class="btn btn-purple" value="3">March</option>--}}
{{--                                <option class="btn btn-purple" value="4">April</option>--}}
{{--                                <option class="btn btn-purple" value="5">May</option>--}}
{{--                                <option class="btn btn-purple" value="6">June</option>--}}
{{--                                <option class="btn btn-purple" value="7">July</option>--}}
{{--                                <option class="btn btn-purple" value="8">August</option>--}}
{{--                                <option class="btn btn-purple" value="9">September</option>--}}
{{--                                <option class="btn btn-purple" value="10">October</option>--}}
{{--                                <option class="btn btn-purple" value="11">November</option>--}}
{{--                                <option class="btn btn-purple" value="12">December</option>--}}
{{--                            </select>--}}
{{--                            <select  name="year"  class="btn btn-md btn-purple-gradient rounded-pill"><i class="fa fa-dropbox" ></i>--}}
{{--                                <option value="" selected disabled hidden>Select The Year</option>--}}
{{--                                @foreach(range(2021, date('Y')+15) as $y)--}}
{{--                                    <option value ="{{$y}}" class="btn btn-purple">{{$y}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <button type="submit" class="btn btn-md btn-purple-gradient rounded-pill">Search</button>--}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
{{--                            @if($errors->any())--}}
{{--                                <div class="alert alert-danger">--}}
{{--                                    {{$errors->first()}}--}}
{{--                                </div>--}}
{{--                            @endif--}}
                            <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                <thead>
                                <tr>
                                    <th class="wd-15p">Name</th>
                                    <th class="wd-10p">Total Clocked Hours</th>
                                    <th class="wd-10p">Projects & Hours</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($userDetails as $userDetail)
                                    @if($userDetail->user->getRoleNames()[0] !== "admin")
                                        <tr>

                                            <td>{{$userDetail->user->name}}</td>
                                            <td>{{$userDetail->hoursWorkedPerMonth}} Hours</td>
                                            <td>
                                                @foreach($userDetail->projects as $key => $value)
                                                    <h6>•{{$key}} -> {{$value}}</h6>
                                                @endforeach
                                            </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ URL::asset('assets/plugins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/datatable.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js') }}"></script>
@endsection
