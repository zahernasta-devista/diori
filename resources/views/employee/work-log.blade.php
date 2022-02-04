@extends('layouts.vertical-menu-employee.master-employee')
@section('css')
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
                                onchange="getProject(this)" >
                                <option value="0">Choose Your Project</option>
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
                            <input  id="date" class="input100" min="{{ $projects }}"
                                name="date" type="date" onchange="checkDateForInput(this)"  value='<?php echo date('Y-m-d');?>' onkeyup='saveValue(this);' >
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="zmdi zmdi-view-day" aria-hidden="true"></i>
                            </span>
                        </div>
                        {{-- time --}}
                        <div class="wrap-input100 validate-input">
                            <input class="input100" id="time" min="0" max="12" type="number" name="time"
                                placeholder="12 hours max" onkeyup='saveValue(this);'>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                            </span>
                        </div>
                        {{-- comment --}}
                        <div class="wrap-input100 validate-input">
                            <textarea class="input100" id="comment" type="text" name="comment" placeholder="Insert a Comment!"
                                rows="4" cols="50" onkeyup='saveValue(this);'></textarea>
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

        function getAvailableHours(responseData, element) {
            let availableHours = 12;
            let sameDates = responseData.filter(object => object.date === element.date);
            sameDates.forEach(object => {
                availableHours -= object.time;
            })
            return availableHours;
        }

        //add today's date in the date input
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!

        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = "0" + mm;
        }
        today = yyyy + '-' + mm + '-' + dd;
        //end

        let selectedDateForToday = $("#date").val(today).val();
        
        console.log(selectedDateForToday);

        if (selectedDateForToday === today) {
                this.checkDateForInput();
        }

        function checkDateForInput(e) {

            let checkDate = document.getElementById("date").value;
            console.log(checkDate, 'is the date selected');



            $(function(e) {
                "use strict";

                $.ajax({
                    type: 'GET',
                    url: url,

                    success: function getData(response) {

                        let responseData = response.timeResponse;
                        let events = [];

                        responseData.forEach(element => {
                            let object = {};
                            object.id = element.id;
                            object.time = element.time;
                            object.date = element.date;

                            //getting available horus left
                            let availableHours = 12;
                            let sameDates = responseData.filter(object => object.date ===
                                checkDate);
                            sameDates.forEach(object => {
                                availableHours -= object.time;
                            });
                            //end 

                            //checking in the data base if there are any similar dates
                            let sameDate = responseData.filter(object => object.date ===
                                checkDate);
                                //end




                            $("#time").attr({
                                'max': availableHours,
                                'placeholder' : availableHours +  ' Hours Left',
                            });

                            $("#time").keydown(function() {
                                if (!$(this).val() || (parseInt($(this).val()) <=
                                        availableHours && parseInt($(this).val()) >= 1
                                        )) {
                                    $(this).data("old", $(this).val());
                                }

                            });
                            $("#time").keyup(function() {
                                if (!$(this).val() || (parseInt($(this).val()) <=
                                        availableHours && parseInt($(this).val()) >= 1))
                                ;
                                else {
                                    $(this).val($(this).data("old"));
                                }

                            });

                        });
                    }
                });
            });
        }
    </script>
    <script type="text/javascript">
        document.getElementById("time").value = getSavedValue("time");
        document.getElementById("comment").value = getSavedValue("comment");

        //Save the value function - save it to localStorage as (ID, VALUE)
        function saveValue(e){
            var id = e.id;  // get the sender's id to save it .
            var val = e.value; // get the value.
            localStorage.setItem(id, val);// Every time user writing something, the localStorage's value will override .
        }

        //get the saved value function - return the value of "v" from localStorage.
        function getSavedValue  (v){
            if (!localStorage.getItem(v)) {
                return "";// You can change this to your defualt value.
            }
            return localStorage.getItem(v);
        }
</script>
<script>
    $(function() {
    $('#mySelect').change(function() {
        localStorage.setItem('todoData', this.value);
    });
    if(localStorage.getItem('todoData')){
        $('#mySelect').val(localStorage.getItem('todoData'));
    }
});
</script>
@endsection
