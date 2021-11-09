@extends('layouts.vertical-menu.master')
@section('css')
@endsection
@section('page-header')
                        <!-- PAGE-HEADER -->
                            <div>
                                <h1 class="page-title">Vertical Menu</h1>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard 01</li>
                                </ol>
                            </div>
                        <!-- PAGE-HEADER END -->
@endsection
@section('content')
						<!-- ROW-1 -->

@endsection
@section('js')

        <!-- Internal Js -->
        <script src="{{ URL::asset('assets/js/index1.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/chart/Chart.bundle.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/chart/utils.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/apexcharts/apexcharts.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/echarts/echarts.js') }}"></script>

@endsection




