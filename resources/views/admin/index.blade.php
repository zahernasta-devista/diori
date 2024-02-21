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
                        <p class="text-white mb-0">Total Customers At Diori!</p>
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

    var adminTotalHoursPerProjectChartUrl = "{{ route('admin-total-hours-per-project') }}";

    fetch(adminTotalHoursPerProjectChartUrl)
        .then(response => response.json())
        .then(data => {
            let projectsAndHours = data.projectsAndHours;
            console.log(data);

            let projectLabels = projectsAndHours.map(project => project.name);
            let totalHoursPerProjectData = projectsAndHours.map(project => project.totalHours);

            var ctxBarTotalHoursPerProject = document.getElementById('barChartAllHours').getContext('2d');
            var barChartTotalHoursPerProject = new Chart(ctxBarTotalHoursPerProject, {
                type: 'bar',
                data: {
                    labels: projectLabels,
                    datasets: [{
                        label: 'Total Hours Worked on Each Project For The Current Month',
                        data: totalHoursPerProjectData,
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
            console.error('Error fetching admin total hours per project data:', error);
        });


    function fetchAdminTotalHoursPerprojectData() {
        let adminTotalHoursPerMonthChartUrl = "{{ route('admin-total-hours-per-month') }}";

        return fetch(adminTotalHoursPerMonthChartUrl)
            .then(response => response.json())
            .then(data => data.overallHoursPerMonthData)
            .catch(error => {
                console.error('Error fetching admin total hours per month data:', error);
                return [];
            });
    }

    async function updateAdminTotalHoursPerProjectChart() {
        try {
            let allHoursPerMonthData = await fetchAdminTotalHoursPerMonthData();

            var ctxLineAllHoursPerMonth = document.getElementById('lineChartAllHoursPerMonth').getContext('2d');
            var lineChartAllHoursPerMonth = new Chart(ctxLineAllHoursPerMonth, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    datasets: [{
                        label: 'All Hours on Each Month for All Employees',
                        data: allHoursPerMonthData,
                        backgroundColor: 'rgba(255,165,0,0.5)',
                        borderColor: 'rgba(255,165,0,0.5)',
                        borderWidth: 5
                    }]
                },
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                }
            });
        } catch (error) {
            console.error('Error updating admin total hours per month chart:', error);
        }
    }

    updateAdminTotalHoursPerMonthChart();

    function fetchAdminTotalHoursPerMonthData() {
        let adminTotalHoursPerMonthChartUrl = "{{ route('admin-total-hours-per-month') }}";

        return fetch(adminTotalHoursPerMonthChartUrl)
            .then(response => response.json())
            .then(data => data.overallHoursPerMonthData)
            .catch(error => {
                console.error('Error fetching admin total hours per month data:', error);
                return [];
            });
    }

    async function updateAdminTotalHoursPerMonthChart() {
        try {
            let allHoursPerMonthData = await fetchAdminTotalHoursPerMonthData();

            var ctxLineAllHoursPerMonth = document.getElementById('lineChartAllHoursPerMonth').getContext('2d');
            var lineChartAllHoursPerMonth = new Chart(ctxLineAllHoursPerMonth, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    datasets: [{
                        label: 'All Hours on Each Month for All Employees',
                        data: allHoursPerMonthData,
                        backgroundColor: 'rgba(255,165,0,0.5)',
                        borderColor: 'rgba(255,165,0,0.5)',
                        borderWidth: 5
                    }]
                },
                options: {
                    responsive: false,
                    maintainAspectRatio: false,
                }
            });
        } catch (error) {
            console.error('Error updating admin total hours per month chart:', error);
        }
    }

    updateAdminTotalHoursPerMonthChart();

</script>

@endsection




