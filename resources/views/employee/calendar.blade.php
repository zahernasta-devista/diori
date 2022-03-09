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
                            <select class="text-right input100 border-white bg-light" type="text" name="project"
                                    id="project">
                                <option value="0">Choose Your Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }} </option>
                                @endforeach
                            </select>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100"><i class="mdi mdi-note-plus" aria-hidden="true">Project
                                    Name:</i></span>
                        </div>
                        <div class="form-group-addon wrap-input100 validate-input">
                            <input class="text-center input100 border-white bg-light" type="number" step="0.5" id="time"
                                   min="1">
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
    <div id="addTimeLogModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add a TimeLog</h5>
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
                            <!--project-->
                            <select class="text-center input100 border-white bg-light" type="text" name="addProject"
                                    id="addProject">
                                <option value="0">Choose Your Project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->name }} </option>
                                @endforeach
                            </select>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100"><i class="mdi mdi-note-plus" aria-hidden="true">Project
                                    Name:</i></span>
                        </div>
                        <div class="form-group-addon wrap-input100 validate-input">
                            <!--date-->
                            <input class="text-center input100 border-white bg-light" type="date" id="addDate"
                                   name="addDate" onchange="checkDateForInput()" readonly>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100"><i class="mdi mdi-calendar" aria-hidden="true">Date:
                                </i></span>
                        </div>
                        <div class="form-group-addon wrap-input100 validate-input">
                            <!--time-->
                            <input class="text-center input100 border-white bg-light" type="number" step="0.5"
                                   id="addTime" name="addTime" min="0" max="12" placeholder="12 hours max">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100"><i class="mdi mdi-timer" aria-hidden="true">Hours Worked :
                                </i></span>
                        </div>

                        <div class="form-group-addon wrap-input100 validate-input">
                            <!--comment-->
                            <textarea class="input100 border-white bg-light" type="text" name="addComment"
                                      id="addComment"
                                      rows="4" cols="50"></textarea>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100"><i class="mdi mdi-comment" aria-hidden="true"></i></span>
                        </div>
                </div>
                <div class="modal-footer">
                    <button id="saveTimeLog" type="button" class="btn btn-orange">Save Time Log</button>
                    <button type="button" class="btn btn-purple-gradient" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END MODAL -->
    <div id="DragAndDrop" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <form class="modal-content">
                <input name="calendarDatePosition" id="calendarDatePosition" type="date" class="input100" hidden>
                <input name="cloneProject" id="cloneProject" type="number" class="input100" hidden>
                <input name="cloneTime" id="cloneTime" type="number" class="input100" hidden>
                <input name="cloneComment" id="cloneComment" type="text" class="input100" hidden>
                <input id="idOfDrop" name="idOfDrop" class="input-lg" hidden>
                <div class="modal-header">
                    <h5 class="modal-title"><strong>Update Date</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <h6>Are You Sure You Want to Drop This Time Log?</h6>
                </div>
                <div class="modal-footer">
                    <button id="updateDate" type="button" class="btn btn-purple-gradient">Save TimeLog</button>
                    <button id="CloneTimeLog" type="button" class="btn btn-orange">Clone TimeLog</button>
                    <button type="button" class="btn btn-purple-gradient" data-dismiss="modal" id="revertToInitial">
                        Close
                    </button>
                </div>
            </form>
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
        let restrictionUrl = "{{ route('worklog-restriction') }}";
        let addUrl = "{{ route('timesheet-add') }}";
        let deleteUrl = "{{ route('timesheet-delete') }}";
        let updateDateUrl = "{{ route('timesheet-date-update') }}";
        let csrfToken = "{{ csrf_token() }}";
        let cloneUrl = "{{ route('timesheet-clone') }}"
        $(function (e) {
            "use strict";

            $.ajax({
                type: 'GET',
                url: url,
                success: function (response) {
                    let FirstValueOfTotal = $("#total").val(response.hours[2]).val();
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
                            left: 'prev,next today CreateTimeLog',
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
                        defaultView: 'month',
                        defaultDate: today,
                        editable: true,
                        displayEventTime: false,
                        firstDay: 1,
                        contentHeight: 700,
                        events: events,
                        dayClick: function (date, resourceObj) {
                            $('#addTimeLogModal').modal('show');
                            let modalDate = $('#addDate').val(date.format()).val();
                            let checkDate = document.getElementById("addDate").value;
                            $(function (e) {
                                "use strict";
                                $.ajax({
                                    type: 'GET',
                                    url: restrictionUrl,
                                    success:
                                        function getData(response) {
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

                                                $("#addTime").attr({
                                                    'max': availableHours,
                                                    'placeholder': availableHours + ' Hours Left',
                                                });

                                            });
                                        }
                                });
                            });
                        },
                        eventDrop: function (info) {
                            $('#DragAndDrop').modal('show');
                            $("#idOfDrop").val(info.id);
                            $("#cloneComment").val(info.comment);
                            $("#cloneProject").val(info.projectId);
                            $("#cloneTime").val(info.time);
                            let currentEvent = info.date;
                            let positionOfDrop = $('#calendarDatePosition').val(info.start.toISOString().substring(0, 10)).val();
                            let checkDate = document.getElementById("calendarDatePosition").value;
                            $(function (e) {
                                "use strict";
                                $.ajax({
                                    type: 'GET',
                                    url: restrictionUrl,
                                    success: function getData(response) {
                                        let responseData = response.timeResponse;
                                        let sameDate = [];
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
                                            sameDate = responseData.filter(object => object.date ===
                                                checkDate);
                                            //end
                                        });
                                        let sum = 0;
                                        let newValidation = responseData.filter(object => object.date === currentEvent);
                                        let sumOfAllEvents = sameDate.forEach(object => sum += object.time, sum += sum + newValidation.find(x => x.id === info.id).time);
                                        console.log(sum);
                                        if (sum > 12) {
                                            location.reload(alert('The sum of total hours shouldnt be over 12'));
                                        }
                                    }
                                });

                            });

                        },
                        eventClick: function (info) {
                            //Verify if the time sum is less than 12 hours
                            //Max value will be the difference between both times
                            let maxHours = info.time + info.availableHours;

                            $('#myModal').modal('show');
                            $("#time").val(info.time);
                            $("#id").val(info.id);
                            $("#comment").val(info.comment);
                            $("#project").val(info.projectId);
                            $("#time").attr({'max': maxHours});

                            $("#time").keydown(function () {
                                if (!$(this).val() || (parseFloat($(this).val()) <= maxHours && parseFloat($(this).val()) >= 1)) {
                                    $(this).data("old", $(this).val());
                                }

                            });
                            $("#time").keyup(function () {
                                if (!$(this).val() || (parseFloat($(this).val()) <= maxHours && parseFloat($(this).val()) >= 1)) ;
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
                                        $("#total").val(response.hours[1]);
                                    }
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


                        },
                        customButtons: {
                            CreateTimeLog: {
                                text: 'Create!',
                                click: function () {
                                    $('#addTimeLogModal').modal('show');
                                    $('#addDate').removeAttr('readonly');
                                    $(function (e) {
                                        "use strict";
                                        $.ajax({
                                            success: function () {
                                            },
                                            error: function (error) {
                                                console.log(error);
                                            }
                                        });
                                    });
                                }
                            }
                        },


                    });

                }
            });
        });

        document.querySelector('#CloneTimeLog').addEventListener('click', function (e) {
            e.preventDefault();
            let cloneProject = $('#cloneProject').val();
            let cloneTime = $('#cloneTime').val();
            let cloneComment = $('#cloneComment').val();
            let calendarDatePosition = $('#calendarDatePosition').val();
            $.ajax({
                type: 'POST',
                headers: {'X-CSRF-TOKEN': csrfToken},
                url: cloneUrl,
                data: {
                    cloneProject: cloneProject,
                    cloneTime: cloneTime,
                    cloneComment: cloneComment,
                    calendarDatePosition: calendarDatePosition
                },
                success: function (response) {
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }, false);

        document.querySelector('#revertToInitial').addEventListener('click', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'get',
                success: function () {
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }, false);

        document.querySelector('#saveTimeLog').addEventListener('click', function (e) {
            e.preventDefault();
            let addProject = $('#addProject').val();
            let addTime = $('#addTime').val();
            let addDate = $('#addDate').val();
            let addComment = $('#addComment').val();
            $.ajax({
                type: 'POST',
                headers: {'X-CSRF-TOKEN': csrfToken},
                url: addUrl,
                data: {addProject: addProject, addTime: addTime, addDate: addDate, addComment: addComment},
                success: function (response) {
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }, false);

        document.querySelector('#editTimeLog').addEventListener('click', function (e) {
            e.preventDefault();

            let time = $('#time').val();
            let comment = $('#comment').val();
            let project = $('#project').val();
            let id = $('#id').val();

            $.ajax({
                type: 'POST',
                url: editUrl,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {time: time, id: id, comment: comment, project: project},
                success: function (response) {
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }, false);

        document.querySelector('#updateDate').addEventListener('click', function (e) {
            e.preventDefault();

            let idOfDrop = $('#idOfDrop').val();
            let calendarDatePosition = $('#calendarDatePosition').val();

            $.ajax({
                type: 'POST',
                url: updateDateUrl,
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {idOfDrop: idOfDrop, calendarDatePosition: calendarDatePosition},
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

            if (time.pastDate != null && responseData.filter(object => object.date === element.date)) {
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
            object.title = element.projectName + " • " + element.time + " hours." + " • " + element.comment;
            object.start = element.date + "T" + startHourString + ":00:00";
            object.end = element.date + "T" + endHourString + ":00:00";
            object.date = element.date;
            object.projectInput = element.projectName;
            object.availableHours = availableHours;
            object.time = element.time;
            object.projectId = element.projectId;

            return object;


        }

        function generateHourString(hour) {
            return hour < 10 ? "0" + hour : hour;
        }

    </script>
    <script>
        function checkDateForInput(e) {
            let checkDate = document.getElementById("addDate").value;
            $(function (e) {
                "use strict";
                $.ajax({
                    type: 'GET',
                    url: restrictionUrl,
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
                            $("#addTime").attr({
                                'max': availableHours,
                                'placeholder': availableHours + ' Hours Left',
                            });
                        });
                    }
                });
            });
        }
    </script>
@endsection
