@extends('layouts.vertical-menu-employee.master-employee')
@section('css')
    <link href="{{ URL::asset('assets/plugins/morris/morris.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/rating/rating.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/single-page/css/main.css') }}" rel="stylesheet">

@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Work log</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Menu</a></li>
            <li class="breadcrumb-item active text-orange" aria-current="page">Clock In Your Working Hours For The Day!</li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <!-- ROW-1 OPEN -->
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
                    <form class="login100-form validate-form" method="POST" action="{{ route('worklog-add') }}">
                        @csrf
                        <span class="login100-form-title">
                            Add Work Log
                        </span>
                        {{-- project --}}
                        <div class="wrap-input100 validate-input" data-validate="Project is required">
                            <select class="input100" type="text" id="mySelect" name="project_id"
                                onchange="getProject(this)">
                                <option>Choose Your Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }} </option>
                                @endforeach
                            </select>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="zmdi zmdi-card" aria-hidden="true"></i>
                            </span>
                        </div>
                        {{-- date --}}
                        <div class="wrap-input100 validate-input" data-validate="date is required">
                            <input placeholder="Date Of Timelog" id="date" class="input100" min="{{ $projects }}"
                                name="date" type="text" onfocus="(this.type='date')" onchange="checkDateForInput(this)">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="zmdi zmdi-view-day" aria-hidden="true"></i>
                            </span>
                        </div>
                        {{-- time --}}
                        <div class="wrap-input100 validate-input">
                            <input class="input100" id="time" min="1" max="12" type="number" name="time"
                                placeholder="12 hours max">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                            </span>
                        </div>
                        {{-- comment --}}
                        <div class="wrap-input100 validate-input">
                            <textarea class="input100" type="text" name="comment" placeholder="Insert a Comment!"
                                rows="4" cols="50"></textarea>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="zmdi zmdi-comment" aria-hidden="true"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn btn-purple-gradient">
                                {{ __('Confirm') }}
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
    <script src="{{ URL::asset('assets/js/index3.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/chart/utils.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/morris/raphael-min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/morris/morris.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/rating/jquery.barrating.js') }}"></script>
    <script>
        function getProject(selectedProject) {
            let projectId = selectedProject.value;

            let url = "{{ route('get-one-project', ':id') }}";
            url = url.replace(':id', projectId);

            $.ajax({
                url: url,
                success: function(result) {
                    let projectStartDate = result.project.start_date;
                    $("#date").attr({

                        "min": projectStartDate,

                    });
                }
            });
        }
    </script>
    <script>
        let url = "{{ route('worklog-restriction') }}";
        $(function(e) {
            "use strict";

            $.ajax({
                type: 'GET',
                url: url,

                success: function(response) {
                    let responseData = response.timeResponse;
                    let events = [];
                    
                    responseData.forEach(element => {
                        let object = {};
                        object.id = element.id;
                        object.time = element.time;
                        object.date = element.date;

                        let sameDate = responseData.filter(object => object.date === element.date);
                        var availableHours = getAvailableHours(responseData, element);


                        
                                $("#time").attr({
                                    'max': availableHours
                                });

                                $("#time").keydown(function() {
                                    if (!$(this).val() || (parseInt($(this).val()) <=
                                            availableHours && parseInt($(this).val()) >= 1)) {
                                        $(this).data("old", $(this).val());
                                    }

                                });
                                $("#time").keyup(function() {
                                    if (!$(this).val() || (parseInt($(this).val()) <=
                                            availableHours && parseInt($(this).val()) >= 1));
                                    else {
                                        $(this).val($(this).data("old"));
                                    }

                                });
                                   
                    });
                }
            });
        });


        function getAvailableHours(responseData, element) {
            let availableHours = 12;
            let sameDates = responseData.filter(object => object.date === element.date);
            sameDates.forEach(object => {
                availableHours -= object.time;
            })
            return availableHours;
        }

        function checkDateForInput(e) {
            let checkDate = document.getElementById("date").value;
            console.log(checkDate,'the function itself');

            return checkDate;
        }

    </script>

@endsection
