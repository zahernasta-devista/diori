@extends('layouts.vertical-menu.master')
@section('css')
@endsection
@section('page-header')
<!-- PAGE-HEADER -->
<div>
    <h1 class="page-title">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Main</a></li>
        <li class="breadcrumb-item active text-orange" aria-current="page">Hello {{Auth::user()->name}}, Have a Great
            Day!
        </li>
    </ol>
</div>
<!-- PAGE-HEADER END -->
@endsection
@section('content')

<div class="row">
    <div class="col-sm-12 col-md-4 ">
        <div class="card bg-purple-gradient img-card box-primary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{$customer}}</h2>
                        <p class="text-white mb-0">Total Customers At Devista!</p>
                    </div>
                    <div class="ml-auto"><i class="fa fa-send-o text-white fs-30 mr-2 mt-2"></i></div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
    <div class="col-sm-12 col-md-4">
        <div class="card bg-purple-gradient img-card box-secondary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{$totalHoursWorkedForDashboard}}</h2>
                        <p class="text-white mb-0">Hours Worked This Month!</p>
                    </div>
                    <div class="ml-auto"><i class="fa fa-bar-chart text-white fs-30 mr-2 mt-2"></i></div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
    <div class="col-sm-12 col-md-4">
        <div class="card bg-purple-gradient img-card box-secondary-shadow">
            <div class="card-body">
                <div class="d-flex">
                    <div class="text-white">
                        <h2 class="mb-0 number-font">{{$weekly}}</h2>
                        <p class="text-white mb-0">Hours Worked This Week!</p>
                    </div>
                    <div class="ml-auto"><i class="fa fa-address-book-o text-white fs-30 mr-2 mt-2"></i></div>
                </div>
            </div>
        </div>
    </div><!-- COL END -->
</div>


<!-- ROW-3 OPEN -->


<div class="row">
    <div class="col-md-12 col-lg-6">
        <div class="card">
            <div class="card-body text-center">
                <h4 class=""><span class="text-orange"><i
                                class="fe fe-file-text mr-2 fs-20 text-orange-shadow"></i></span>Total Projects</h4>
                <h3 class="text-dark counter mt-0 mb-3 number-font">{{$project}}</h3>
                <div class="progress h-1 mt-0 mb-2">
                    <div class="progress-bar progress-bar-striped bg-orange w-100" role="progressbar"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6">
        <div class="card overflow-hidden">
            <div class="card-body text-center">
                <h4 class=""><span class="text-orange"><i class="fe fe-users mr-2 fs-20 text-orange-shadow"></i></span>Total
                    Employees</h4>
                <h3 class="text-dark counter mt-0 mb-3 number-font">{{$user}}</h3>
                <div class="progress h-1 mt-0 mb-2">
                    <div class="progress-bar progress-bar-striped  bg-orange w-100" role="progressbar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <canvas id="lineChartAllHoursPerMonth" width="500" height="500"></canvas>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <canvas id="barChartAllHours" width="500" height="500"></canvas>
            </div>
        </div>
    </div>
</div>


@endsection
@section('js')
<script src="{{ URL::asset('assets/js/index3.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/chart/utils.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/echarts/echarts.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/apexcharts/apexcharts.js') }}"></script>
<script src="{{ URL::asset('assets/js/index1.js') }}"></script>
<script src="{{ URL::asset('assets/js/index5.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var totalHoursPerProjectData = [150, 120, 200, 180]; // Update with actual data

    // Sample Data for All Hours on Each Month for All Employees (Line Chart)
    var allHoursPerMonthData = [400, 500, 650, 700, 550, 600, 450, 800, 700, 550, 600, 750];

    // Bar Chart - Total Hours Worked on Each Project
    var ctxBarTotalHoursPerProject = document.getElementById('barChartAllHours').getContext('2d');
    var barChartTotalHoursPerProject = new Chart(ctxBarTotalHoursPerProject, {
        type: 'bar',
        data: {
            labels: ['Project 1', 'Project 2', 'Project 3', 'Project 4'], // Update project labels
            datasets: [{
                label: 'Total Hours Worked on Each Project For The Current Month',
                data: totalHoursPerProjectData,
                backgroundColor: ['rgba(138,43,226,0.5)'],
                borderColor: ['rgba(138,43,226,0.5)'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false, // Ensure both charts have the same size
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Line Chart - All Hours on Each Month for All Employees
    var ctxLineAllHoursPerMonth = document.getElementById('lineChartAllHoursPerMonth').getContext('2d');
    var lineChartAllHoursPerMonth = new Chart(ctxLineAllHoursPerMonth, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'], // Update month labels
            datasets: [{
                label: 'All Hours on Each Month for All Employees',
                data: allHoursPerMonthData,
                backgroundColor: 'rgba(255,165,0,0.5)',
                borderColor: 'rgba(255,165,0,0.5)',
                borderWidth: 5
            }]
        },
        options: {
            responsive: false, // Ensure both charts have the same size
            maintainAspectRatio: false,
        }
    });
</script>

@endsection




