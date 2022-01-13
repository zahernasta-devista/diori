@extends('layouts.vertical-menu-employee.master-employee')
@section('css')
    <link href="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet"
          media='print'>
    <link href="{{ URL::asset('assets/plugins/single-page/css/main.css') }}" rel="stylesheet">
@endsection

@section('page-header')
    <!-- PAGE-HEADER -->
    <div>
        <h1 class="page-title">Time Sheet</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Hours Clocked</a></li>

            <li class="breadcrumb-item active text-orange" aria-current="page">This Time Sheet Gives More Information
                About Your Work!
            </li>
        </ol>
    </div>
    <!-- PAGE-HEADER END -->
@endsection
@section('content')
    <!-- ROW CLOSED -->
    {{-- NEW ROW --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ Auth::user()->name }}, This is Your Work Sheet!</h3>
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
                    <h5 class="modal-title">Edit or Delete Time Log</h5>
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
                            <input class="text-center input100 border-white bg-light" type="number" id="time" min="1">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100"><i class="mdi mdi-timer" aria-hidden="true">Hours Worked :
                                </i></span>
                        </div>
                        <div class="form-group-addon wrap-input100 validate-input">
                            <textarea class="input100 border-white bg-light" type="text" name="comment" id="comment"
                                      rows="4" cols="50"></textarea>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100"><i class="mdi mdi-comment" aria-hidden="true"></i></span>
                        </div>
                        <input id="id" name="id" type="hidden" class="input-lg"/>
                </div>
                <div class="modal-footer">
                    <button id="editTimeLog" type="button" class="btn btn-primary">Update Time Log</button>
                    <button id="deleteTimeLog" type="button" class="btn btn-danger">Delete Time Log</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
        let url = "{{ route('timesheet-response') }}";
        let editUrl = "{{ route('timesheet-update') }}";
        let deleteUrl = "{{ route('timesheet-delete') }}";
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
                                buttonText: 'Daily'
                            },
                            listWeek: {
                                buttonText: 'Weekly'
                            },
                            month: {
                                buttonText: 'Monthly'
                            }
                        },
                        defaultView: 'listWeek',
                        defaultDate: today,
                        navLinks: false, // can click day/week names to navigate views
                        editable: true,
                        displayEventTime:false,
                        eventLimit: true, // allow "more" link when too many events
                        events: events,
                        eventClick: function (info) {
                            //Verify if the time sum is less than 12 hours
                            //Max value will be the difference between both times
                            let time = (new Date(info.end) - new Date(info.start)) / 1000 / 60 / 60;
                            let maxHours = time + info.availableHours;

                            $('#myModal').modal('show');
                            $("#time").val(time);
                            $("#id").val(info.id);
                            $("#comment").val(info.comment);
                            $("#project").val(info.projectInput);
                            $("#time").attr({'max': maxHours});

                            $("#time").keydown(function () {
                                if (!$(this).val() || (parseInt($(this).val()) <= maxHours && parseInt($(this).val()) >= 1)) {
                                    $(this).data("old", $(this).val());
                                }

                            });
                            $("#time").keyup(function () {
                                if (!$(this).val() || (parseInt($(this).val()) <= maxHours && parseInt($(this).val()) >= 1)) ;
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
                                        if (viewCurrentlyOn === 'listDay') {
                                            $("#total").val(response.hours[0]);
                                        }
                                        if (viewCurrentlyOn === 'listWeek') {
                                            $("#total").val(response.hours[1]);
                                        }
                                        if (viewCurrentlyOn === 'month') {
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
                                        if (viewCurrentlyOn === 'listDay') {
                                            $("#total").val(response.hours[0]);
                                        }
                                        if (viewCurrentlyOn === 'listWeek') {
                                            $("#total").val(response.hours[1]);
                                        }
                                        if (viewCurrentlyOn === 'month') {
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


        document.querySelector('#editTimeLog').addEventListener('click', function (e) {
            e.preventDefault();

            let time = $('#time').val();
            let comment = $('#comment').val();
            let id = $('#id').val();

            $.ajax({
                type: 'POST',
                url: editUrl,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {time: time, id: id, comment: comment},
                success: function (response) {
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }, false);

        document.querySelector('#deleteTimeLog').addEventListener('click', function (e) {
            e.preventDefault();

            let id = $('#id').val();

            $.ajax({
                type: 'POST',
                url: deleteUrl,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {id: id},
                success: function (response) {
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }, false);


        function createCalendarElements(responseData, element, time, date) {

            let availableHours = getAvailableHours(responseData, element);

            if (time.pastDate != null && new Date(time.pastDate) < new Date(element.date)) {
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
            object.title = element.projectName + " • " + element.time + " hours." + " • " + element.comment + ".";
            object.start = element.date + "T" + startHourString + ":00:00";
            object.end = element.date + "T" + endHourString + ":00:00";
            object.projectInput = element.projectName;
            object.availableHours = availableHours;


            return object;

        }

        function generateHourString(hour) {
            return hour < 10 ? "0" + hour : hour;
        }


    </script>
@endsection
