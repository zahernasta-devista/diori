@extends('layouts.vertical-menu-employee.master-employee')
@section('css')
<link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/ion.rangeSlider/css/ion.rangeSlider.skinSimple.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.print.min.css') }}" rel="stylesheet"
      media='print'>
<link href="{{ URL::asset('assets/plugins/single-page/css/main.css') }}" rel="stylesheet">
@endsection
@section('page-header')
<!-- PAGE-HEADER -->
<div>
    <h1 class="page-title">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active text-orange" aria-current="page">Hello {{ Auth::user()->name }}, Have A
            Productive Day!
        </li>
        <li class="breadcrumb-item active text-orange" aria-current="page">{{ $date }}</li>

    </ol>
</div>
<!-- PAGE-HEADER END -->
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12 col-md-6 ">
        <div class="card bg-purple-gradient img-card box-primary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{ $timeSum }}</h2>
                        <p class="text-white mb-0">Total Hours Worked This Month!</p>
                    </div>
                    <div class="ml-auto"><i class="fa fa-send-o text-white fs-30 mr-2 mt-2"></i></div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->

    <div class="col-sm-12 col-md-6 ">
        <div class="card bg-purple-gradient img-card box-primary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{ $weekly }}</h2>
                        <p class="text-white mb-0">Total Hours Worked This Week!</p>
                    </div>
                    <div class="ml-auto"><i class="fa fa-indent text-white fs-30 mr-2 mt-2"></i></div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
</div>
<div class="row">
    <div class="col-sm-12 col-md-12 ">
        <div class="card bg-orange img-card box-primary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">You Have These {{$projectCount}} Projects On The Pipeline:</h2>
                        <p class="text-white mb-0">
                            Just To Name A Few:<br>
                            • @foreach ($projects->slice(0, 3) as $project){{ $project['name'] }} / @endforeach
                        </p>
                    </div>
                    <div class="ml-auto"><i class="fa fa-address-book text-white fs-30 mr-2 mt-2"></i></div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
    <div class="col-sm-12 col-md-12 ">
        <div class="card bg-purple-gradient img-card box-secondary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{ $timedaySum }} Hours Clocked in Today</h2>
                        <p class="text-white mb-0"> @foreach ($timelogs as $timelog)
                            • {{ $timelog->project->name }} -> {{ $timelog->time }} Hours
                            @endforeach</p>

                    </div>
                    <div class="ml-auto">
                        <button id="openModal" onclick="openModal()" class="btn btn-sm btn-orange "><i
                                    class="fa fa-plus">Add TimeLog</i></button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <canvas id="doughnutChart" width="500" height="500"></canvas>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <canvas id="barChart" width="500" height="500"></canvas>
            </div>
        </div>
    </div>
</div>
{{--    MODAL--}}
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
                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                            @endforeach
                        </select>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100"><i class="mdi mdi-note-plus" aria-hidden="true">Project
                                    Name:</i></span>
                    </div>
                    <div class="form-group-addon wrap-input100 validate-input">
                        <!--date-->
                        <input class="text-center input100 border-white bg-light" type="date" id="addDate"
                               name="addDate" onchange="checkDateForInput()">
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
            <div id="projectChart" style="height: 300px;"></div>
        </div>
    </div>
</div>
<!-- END MODAL -->

@endsection
@section('js')
<script src="{{ URL::asset('assets/js/index2.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/echarts/echarts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/morris/raphael-min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/morris/morris.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/peitychart/jquery.peity.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/peitychart/peitychart.init.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    let employeeHoursPerProjectChartUrl = "{{ route('hours-per-project') }}";

    fetch(employeeHoursPerProjectChartUrl)
        .then(response => response.json())
        .then(data => {
            let projectsHours = data.projects.projectHours;
            let projectNames = data.projects.projectName;

            var ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
            var lineChart = new Chart(ctxDoughnut, {
                type: 'line',
                data: {
                    labels: projectNames,
                    datasets: [{
                        label: 'Hours Per Project',
                        data: projectsHours,
                        backgroundColor: ['rgba(255,165,0,0.5)'],
                        borderColor: ['rgba(255,165,0,0.5)'],
                        borderWidth: 5
                    }]
                },
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                }
            });
        })
        .catch(error => {
            console.error('Error fetching projects data:', error);
        });

    let employeeHoursPerMonthChartUrl = "{{ route('hours-per-month') }}";

    fetch(employeeHoursPerMonthChartUrl)
        .then(response => response.json())
        .then(data => {
            let overallHoursPerMonthData = data.overallHoursPerMonthData;
            console.log(data);

            var ctxBar = document.getElementById('barChart').getContext('2d');
            var barChart = new Chart(ctxBar, {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    datasets: [{
                        label: 'Overall Hours Per Month',
                        data: overallHoursPerMonthData,
                        backgroundColor: ['rgba(138,43,226,0.5)'],
                        borderColor: ['rgba(138,43,226,0.5)'],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => {
            console.error('Error fetching overall hours per month data:', error);
        });

</script>


<script>
    let addUrl = "{{ route('timesheet-add') }}";
    let csrfToken = "{{ csrf_token() }}";
    let restrictionUrl = "{{ route('worklog-restriction') }}";

    function openModal() {
        $('#addTimeLogModal').modal('show');
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
    }

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
