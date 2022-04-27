@extends('layouts.vertical-menu.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet"
          media='print'>
    <link href="{{ URL::asset('assets/plugins/single-page/css/main.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Detail Page Employees</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Hours Clocked For Employees</a></li>
            <li class="breadcrumb-item active text-orange" aria-current="page">This Time Sheet Gives More Information
                About {{$users->name}}'s Work!

            </li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="card bg-purple-gradient img-card box-primary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{$users->name}}'s Clocking</h2>
                            <p class="text-white mb-0">The User Worked:<br> •{{$timeSum}} Hours Worked So Far This Month!</p>
                        </div>
                        <div class="ml-auto"><i class="fa fa-send-o text-white fs-30 mr-2 mt-2"></i></div>
                    </div>
                </div>
            </div>
        </div><!-- COL END -->
        <div class="col-sm-12 col-md-4 ">
            <a href="/employee/projects/{{$users->id}}">
            <div class="card bg-purple-gradient img-card box-secondary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h2 class="mb-0 number-font">{{ $users->name }} is Part Of {{ $projectCount }} Projects:
                            </h2>
                            <p class="text-white mb-0">
                                Just To Name A Few:<br>
                                • @foreach ($projects->slice(0, 3) as $project){{ $project['name'] }} / @endforeach
                            </p>
                        </div>
                        <div class="ml-auto"><i class="fa fa-bar-chart text-white fs-30 mr-2 mt-2"></i></div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="card bg-purple-gradient img-card box-primary-shadow">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="text-white">
                            <h3 class="mb-0 number-font">Holidays {{$users->name}} took this year:</h3>
                            <h3></h3><!--for design purpose-->
                            <h3 class="text-white mb-0">•{{$holidaysTaken}} Days</h3>
                        </div>
                        <div class="ml-auto"><i class="fa fa-pencil text-white fs-30 mr-2 mt-2"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- COL END -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Work Sheet!</h3>
                    <input id="datePicker" class="text-center input100 border-white bg-light" type="date"
                           name="datePicker" readonly hidden>
                </div>
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
                <div class="form-group-addon wrap-input100 validate-input">
                    <input class="text-center input100 border-white bg-light" type="text" name="total" id="total"
                           readonly>
                    <span class="focus-input100"></span>

                    <span class="symbol-input100"><i class="mdi mdi-note-plus" aria-hidden="true">
                                Total :</i></span>
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
                            <input class="text-right input100 border-white bg-light" type="text" name="project"
                                   id="project" readonly>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100"><i class="mdi mdi-note-plus" aria-hidden="true">Project
                                    Name:</i></span>
                        </div>
                        <div class="form-group-addon wrap-input100 validate-input">
                            <input class="text-center input100 border-white bg-light" type="number" id="time" min="1"
                                   readonly>
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
                        <input id="id" name="id" type="hidden" class="input-lg"/>
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
        let url = "{{ route('response-detail', $users->id) }}";

        let csrfToken = "{{ csrf_token() }}";
        $(function (e) {
            "use strict";

            $.ajax({
                type: 'GET',
                url: url,
                success: function (response) {
                    let FirstValueOfTotal = $("#total").val(response.hours[1]).val();
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

                    let pickedDate = $('#datePicker').val();

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
                                buttonText: 'Daily',
                            },
                            listWeek: {
                                buttonText: 'Weekly'
                            },
                            month: {
                                buttonText: 'Monthly'
                            }
                        },
                        defaultView: 'month',
                        defaultDate: today,
                        navLinks: false, // can click day/week names to navigate views
                        editable: true,
                        displayEventTime:false,
                        eventColor: '#FFFFFF',
                        firstDay:1,
                        eventLimit: true, // allow "more" link when too many events
                        events: events,
                        eventRender: function (event, element) {
                            console.log(event);
                            if (event.project === 'Holidays') {
                                element.css('background-color', '#ffa500');
                            } else {
                                element.css('background-color', '#8A2BE2');

                            }
                        },
                        eventClick: function (info) {
                            //Verify if the time sum is less than 12 hours
                            //Max value will be the difference between both times
                            let maxHours = info.time + info.availableHours;

                            $('#myModal').modal('show');
                            $("#time").val(info.time);
                            $("#id").val(info.id);
                            $("#comment").val(info.comment);
                            $("#project").val(info.project);
                            $("#time").attr({
                                'max': maxHours
                            });

                            $("#time").keydown(function () {
                                if (!$(this).val() || (parseInt($(this).val()) <=
                                    maxHours && parseInt($(this).val()) >= 1)) {
                                    $(this).data("old", $(this).val());
                                }

                            });
                            $("#time").keyup(function () {
                                if (!$(this).val() || (parseInt($(this).val()) <=
                                    maxHours && parseInt($(this).val()) >= 1)) ;
                                else {
                                    $(this).val($(this).data("old"));
                                }

                            });
                        },
                        viewRender: function (view) {
                            let currentDate = view.intervalStart;
                            let changeFormat = JSON.stringify(currentDate);
                            changeFormat = changeFormat.slice(1, 11);

                            pickedDate = $('#datePicker').val(changeFormat).val();

                            let viewCurrentlyOn = view.name;
                            // next
                            document.getElementsByClassName('fc-next-button fc-button fc-state-default fc-corner-right')[0].onclick = function () {
                                pickedDate = $('#datePicker').val();
                                $.ajax({
                                    type: 'GET',
                                    data: {
                                        datePicker: pickedDate
                                    },
                                    url: url,
                                    success: function (response, view) {
                                        if ( viewCurrentlyOn === 'listDay' ) {
                                            $("#total").val(response.hours[0]);
                                        }
                                        if ( viewCurrentlyOn === 'listWeek' ) {
                                            $("#total").val(response.hours[1]);
                                        }
                                        if ( viewCurrentlyOn=== 'month' ) {
                                            $("#total").val(response.hours[2]);
                                        }
                                    }
                                })
                            };

                            // prev
                            document.getElementsByClassName('fc-prev-button fc-button fc-state-default fc-corner-left')[0].onclick = function () {
                                pickedDate = $('#datePicker').val();
                                $.ajax({
                                    type: 'GET',
                                    data: {
                                        datePicker: pickedDate
                                    },
                                    url: url,
                                    success: function (response, view) {
                                        if ( viewCurrentlyOn === 'listDay' ) {
                                            $("#total").val(response.hours[0]);
                                        }
                                        if ( viewCurrentlyOn === 'listWeek' ) {
                                            $("#total").val(response.hours[1]);
                                        }
                                        if ( viewCurrentlyOn=== 'month' ) {
                                            $("#total").val(response.hours[2]);
                                        }
                                    }
                                })
                            };
                            //daily
                            document.getElementsByClassName('fc-listDay-button fc-button fc-state-default fc-corner-left')[0].onclick = function () {
                                pickedDate = $('#datePicker').val();
                                $.ajax({
                                    type: 'GET',
                                    data: {
                                        datePicker: pickedDate
                                    },
                                    url: url,
                                    success: function (response, view) {
                                            $("#total").val(response.hours[0]);
                                    }
                                })
                            };
                            //weekly
                            document.getElementsByClassName('fc-listWeek-button fc-button fc-state-default')[0].onclick = function () {
                                pickedDate = $('#datePicker').val();
                                $.ajax({
                                    type: 'GET',
                                    data: {
                                        datePicker: pickedDate
                                    },
                                    url: url,
                                    success: function (response, view) {
                                            $("#total").val(response.hours[1]);}
                                })
                            };
                            //monthly
                            document.getElementsByClassName('fc-month-button fc-button fc-state-default fc-corner-right')[0].onclick = function () {
                                pickedDate = $('#datePicker').val();
                                $.ajax({
                                    type: 'GET',
                                    data: {
                                        datePicker: pickedDate
                                    },
                                    url: url,
                                    success: function (response, view) {
                                            $("#total").val(response.hours[2]);
                                    }
                                })
                            };
                            //today button
                            document.getElementsByClassName('fc-today-button fc-button fc-state-default fc-corner-left fc-corner-right')[0].onclick = function () {
                                pickedDate = $('#datePicker').val();
                                $.ajax({
                                    type: 'GET',
                                    data: {
                                        datePicker: pickedDate
                                    },
                                    url: url,
                                    success: function (response, view) {
                                            if ( viewCurrentlyOn === 'listDay' ) {
                                                $("#total").val(response.hours[0]);
                                            }
                                            if ( viewCurrentlyOn === 'listWeek' ) {
                                                $("#total").val(response.hours[1]);
                                            }
                                            if ( viewCurrentlyOn=== 'month' ) {
                                                $("#total").val(response.hours[2]);
                                            }
                                        }
                                })
                            };



                        },
                    });
                }
            });

        });


        function createCalendarElements(responseData, element, time, date) {

            let availableHours = getAvailableHours(responseData, element);

            if (time.pastDate != null &&  responseData.filter(object => object.date === element.date)) {
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
            object.start = element.date + "T" + startHourString + ":00:00";
            object.end = element.date + "T" + endHourString + ":00:00";
            object.project = element.project;
            object.availableHours = availableHours;
            object.time = element.time;

            return object;

        }

        function generateHourString(hour) {
            return hour < 10 ? "0" + hour : hour;
        }
    </script>


@endsection
