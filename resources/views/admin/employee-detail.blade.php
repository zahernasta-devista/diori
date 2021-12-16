@extends('layouts.vertical-menu.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet" media='print'>
    <link href="{{ URL::asset('assets/plugins/single-page/css/main.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Detail Page Employees</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Hours Clocked For Employees</a></li>
            <li class="breadcrumb-item active" aria-current="page">This Time Sheet Gives More Information
                About {{$users->name}}'s Work!
            </li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6 ">
                    <div class="card">
                        <div class="card-body text-center statistics-info">
                            <div class="counter-icon bg-secondary-gradient mb-0 box-primary-shadow">
                                <i class="fe fe-trending-up text-white"></i>
                            </div>
                            <h3 class="mt-4 mb-1">•{{$users->name}} Worked: </h3>
                            <h2 class="mb-2">{{$timeSum}} Hours</h2>
                            <h6  class="mt-2 mb-1">This Month</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="card">
                        <div class="card-body text-center statistics-info">
                            <div class="counter-icon bg-success mb-0 box-primary-shadow">
                                <i class="fe fe-clock text-white"></i>
                            </div>
                            <h4 class="mt-4 mb-1">{{$users->name}} is Part Of {{$projectCount}} Projects:</h4>
                            <h2 class="mb-2 number-font">
                                @foreach ($projects->slice(0, 3) as $project)
                                    <h6> <strong>•{{ $project['name'] }}</strong></h6>
                                @endforeach
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--NEW ROW--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{$users->name}}'s Work Sheet!</h3>
                </div>
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW CLOSED -->

    <!-- START MODAL -->
    <div id="myModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Details:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-primary">
                                {{ $errors->first() }}
                            </div>
                        @endif
                        <div class="form-group-addon wrap-input100 validate-input">
                            <input class="text-center input100 border-white bg-light" type="text" name="project"
                                   id="project" readonly>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100"><i class="mdi mdi-note-plus" aria-hidden="true">Project
                                    Name:</i></span>
                        </div>
                        <div class="form-group-addon wrap-input100 validate-input">
                            <input class="text-center input100 border-white bg-light" type="number" id="time" min="1" readonly>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100"><i class="mdi mdi-timer" aria-hidden="true">Hours Worked :
                                </i></span>
                        </div>
                        <div class="form-group-addon wrap-input100 validate-input">
                            <textarea class="input100 border-white bg-light" type="text" name="comment" id="comment"
                                      rows="4" cols="50" readonly></textarea>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100"><i class="mdi mdi-comment" aria-hidden="true"></i></span>
                        </div>
                        <input id="id" name="id" type="hidden" class="input-lg" />

                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END MODAL -->
@endsection
@section('js')
    <script src="{{ URL::asset('assets/plugins/fullcalendar/moment.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fullcalendar/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
    <script>
        let url = "{{ route('response-detail',$users->id) }}";

        let csrfToken = "{{ csrf_token() }}";
        $(function(e) {
            "use strict";

            $.ajax({
                type: 'GET',
                url: url,
                success: function(response) {
                    var today = new Date();
                    var dd = today.getDate();
                    var mm = today.getMonth()+1; //January is 0!

                    var yyyy = today.getFullYear();
                    if(dd < 10){
                        dd='0'+dd;
                    }
                    if(mm < 10){
                        mm="0"+mm;
                    }
                    today = yyyy+'-'+mm+'-'+dd;

                    let responseData = response.response;
                    let events = [];
                    let time = {
                        endHour: 9,
                        pastDate: null
                    }

                    responseData.forEach(element => {
                        let object = createCalendarElements(responseData, element, time);

                        events.push(object);

                    });

                    $('#calendar').fullCalendar({
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'listDay,listWeek,month'
                        },
                        views: {
                            listDay: {
                                buttonText: 'Daily'
                            },
                            listWeek: {
                                buttonText: 'Weekly'
                            },
                            month:{
                                buttonText: 'Monthly'
                            }
                        },
                        defaultView: 'listWeek',
                        defaultDate: today,
                        navLinks: false, // can click day/week names to navigate views
                        editable: true,
                        eventLimit: true, // allow "more" link when too many events
                        events: events,
                        eventClick: function(info) {
                            //Verify if the time sum is less than 12 hours
                            //Max value will be the difference between both times
                            let time = (new Date(info.end) - new Date(info.start)) / 1000 / 60 / 60 ;
                            let maxHours = time + info.availableHours;

                            $('#myModal').modal('show');
                            $("#time").val(time);
                            $("#id").val(info.id);
                            $("#comment").val(info.comment);
                            $("#project").val(info.project);
                            $("#time").attr({'max': maxHours});

                            $("#time").keydown(function () {
                                if (!$(this).val() || (parseInt($(this).val()) <= maxHours && parseInt($(this).val()) >= 1))
                                {
                                    $(this).data("old", $(this).val());
                                }

                            });
                            $("#time").keyup(function () {
                                if (!$(this).val() || (parseInt($(this).val()) <= maxHours && parseInt($(this).val()) >= 1)) ;
                                else
                                {
                                    $(this).val($(this).data("old"));
                                }

                            });
                        }
                    });
                }
            });
        });


        document.querySelector('#editTimeLog').addEventListener('click', function(e) {
            e.preventDefault();

            let time = $('#time').val() ;
            let comment = $('#comment').val() ;
            let id = $('#id').val();

            $.ajax({
                type: 'POST',
                url: editUrl,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {time: time, id: id,comment: comment},
                success: function(response) {
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }, false);

        document.querySelector('#deleteTimeLog').addEventListener('click', function(e) {
            e.preventDefault();

            let id = $('#id').val();

            $.ajax({
                type: 'POST',
                url: deleteUrl,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data:{id:id},
                success:function(response){
                    location.reload();
                },
                error: function(error) {
                    console.log(error);
                },
            });
        }, false);


        function createCalendarElements(responseData, element, time, date) {

            let availableHours = getAvailableHours(responseData, element);

            if(time.pastDate != null && new Date(time.pastDate) < new Date(element.date)) {
                time.endHour = 9;
            }

            let startHour = time.endHour;
            //Passed by reference to keep the modifications inside the function
            time.endHour += element.time;

            let startHourString = generateHourString(startHour);
            let endHourString = generateHourString(time.endHour);

            //Passed by reference to keep the modifications inside the function
            time.pastDate = element.date;

            return createCalendarObject(element, startHourString, endHourString, availableHours);
        }

        function getAvailableHours(responseData, element) {
            let availableHours = 12;
            let sameDates = responseData.filter(object => object.date === element.date);
            sameDates.forEach(object => {
                availableHours -= object.time;
            })


            return availableHours;
        }

        function createCalendarObject(element, startHourString, endHourString, availableHours) {
            let object = {};

            object.id = element.id;
            object.comment = element.comment;
            object.title = element.project + " • " + element.time + " hours." + " • " + element.comment + ".";
            object.start = element.date + "T" + startHourString + ":00:00" ;
            object.end = element.date + "T" + endHourString + ":00:00" ;
            object.project = element.project;
            object.availableHours = availableHours;

            return object;

        }

        function generateHourString(hour) {
            return hour < 10 ? "0" + hour : hour;
        }

    </script>
@endsection
