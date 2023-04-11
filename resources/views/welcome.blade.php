@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    {{-- <form class="d-flex align-items-center mb-3">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control border" id="dash-daterange">
                            <span class="input-group-text bg-blue border-blue text-white">
                                <i class="mdi mdi-calendar-range"></i>
                            </span>
                        </div>
                        <a  target = '_blank' href="javascript: void(0);" class="btn btn-blue btn-sm ms-2">
                            <i class="mdi mdi-autorenew"></i>
                        </a>
                        <a  target = '_blank' href="javascript: void(0);" class="btn btn-blue btn-sm ms-1">
                            <i class="mdi mdi-filter-variant"></i>
                        </a>
                    </form> --}}
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
                                <i class="fe-heart font-22 avatar-title text-primary"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><a  target = '_blank' href="/fees">$ {{getTotalRevenue()}}</a></span></h3>
                                <p class="text-muted mb-1 text-truncate">Total Revenue</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-success border-success border">
                                <i class="icon-people font-22 avatar-title text-success"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><a  target = '_blank' href="/users"> {{getAllUsers()}}</a></span></h3>
                                <p class="text-muted mb-1 text-truncate">Total Users</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-info border-info border">
                                <i class="  icon-user-following  font-22 avatar-title text-info"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><a  target = '_blank' href="/instructors"> {{getAllInstructors()}}</a></span></h3>
                                <p class="text-muted mb-1 text-truncate">Total Instructors</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-warning border-warning border">
                                <i class="icon-graduation font-22 avatar-title text-warning"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1"><span data-plugin="counterup"><a  target = '_blank' href="/students"> {{getAllStudents()}}</a></span></h3>
                                <p class="text-muted mb-1 text-truncate">Total Students</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
    </div>
    <!-- end row-->

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                    </div>

                    <h4 class="header-title mb-0">Total Revenue</h4>

                    <div class="widget-chart text-center" dir="ltr">

                        <div id="total-revenue-students" class="mt-0"  data-colors="#f1556c"></div>

                        <h5 class="text-muted mt-0">Total Fee Collected Today </h5>
                        <h2>${{getFeeCollectedToday()}}</h2>
                        <div class="row mt-3">
                            <div class="col-6">
                                <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                {!!getStudentWeeKlyGrowth()!!}
                            </div>
                            <div class="col-6">
                                <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                                {!!getStudentMonthlyGrowth()!!}
                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end card -->
        </div> <!-- end col-->

        <div class="col-lg-8">
            <div class="card">
                <div class="card-body pb-2">
                    <div class="float-end d-none d-md-inline-block">
                        <div class="btn-group mb-2">
                            <a href="?filter=week"> <button type="button" class="btn btn-xs  {{request()->filter == 'week'  ? 'btn-primary' : 'btn-light'}}">Weekly</button></a>
                            <a href="?filter=month"><button type="button" class="btn btn-xs {{request()->filter == 'month'  ? 'btn-primary' : 'btn-light'}}">Monthly</button></a>
                            <a href="?filter=year"><button type="button" class="btn btn-xs {{request()->filter == 'year' || !request()->filter  ? 'btn-primary' : 'btn-light'}}">Yearly</button></a>
                        </div>
                    </div>

                    <h4 class="header-title mb-3">Student Analytics</h4>

                    <div dir="ltr">
                        <div id="student-analytics" class="mt-4" data-colors="#1abc9c,#4a81d4"></div>
                    </div>
                </div>
            </div> <!-- end card -->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a  target = '_blank' href="index.html#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a  target = '_blank' href="/users" class="dropdown-item">View All</a>
                        </div>
                    </div>

                    <h4 class="header-title mb-3">Recent Users </h4>

                    <div class="table-responsive">
                        <table class="table table-borderless table-hover table-nowrap table-centered m-0">

                            <thead class="table-light">
                                <tr>
                                    <th colspan="2">Profile</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(\Auth::user()->can('view users'))
                                    @foreach(getRecentUsers() as $user)
                                        <tr>
                                            <td style="width: 36px;">
                                                <img src="{{$user->profile_pic}}" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                            </td>

                                            <td>
                                                <h5 class="m-0 fw-normal">{{$user->name}}</h5>
                                                <p class="mb-0 text-muted"><small>Member Since {{$user->created_at->format('Y')}}</small></p>
                                            </td>

                                            <td>
                                                {{ucwords(@$user->roles()->pluck('name')->first())}}
                                            </td>

                                            <td>
                                                {{@$user->email}}
                                            </td>

                                            <td>
                                                {!!(@$user->is_active ? "<span class='badge bg-success'> Active</span>" : "<span class='badge bg-danger'> In-Active</span>")!!}
                                            </td>

                                            <td>
                                                @include('modules.users.action',['user' => $user])
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a  target = '_blank' href="index.html#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a  target = '_blank' href="/students" class="dropdown-item">View All</a>
                        </div>
                    </div>

                    <h4 class="header-title mb-3">Recent Students </h4>

                    <div class="table-responsive">
                        <table class="table table-borderless table-hover table-nowrap table-centered m-0">

                            <thead class="table-light">
                                <tr>
                                    <th colspan="2">Profile</th>
                                    <th>Course</th>
                                    <th>Status</th>
                                    <th>Registration Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(\Auth::user()->can('view students'))
                                    @foreach(getRecentStudents() as $student)
                                        <tr>
                                            <td style="width: 36px;">
                                                <img src="{{$student->user->profile_pic}}" alt="contact-img" title="contact-img" class="rounded-circle avatar-sm" />
                                            </td>

                                            <td>
                                                <h5 class="m-0 fw-normal">{{$student->user->name}}</h5>
                                                <p class="mb-0 text-muted"><small>Member Since {{$student->user->created_at->format('Y')}}</small></p>
                                            </td>
                                            <td>{{@$student->courses_name}}</td>
                                            <td>{{@$student->status}}</td>
                                            <td>{{date('Y-m-d', strtotime(@$student->registration_date))}}</td>
                                            <td>@include('modules.students.action',['student' => $student])</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a  target = '_blank' href="index.html#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a  target = '_blank' href="/schedules" class="dropdown-item">View All</a>
                        </div>
                    </div>

                    <h4 class="header-title mb-3">Upcoming Schedules</h4>

                    <div class="table-responsive">
                        <table class="table table-borderless table-nowrap table-hover table-centered m-0">

                            <thead class="table-light">
                                <tr>
                                    <th>Course</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Instructor</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(\Auth::user()->can('view schedules'))
                                    @foreach(getUpcomingSechedules() as $schedule)
                                    <tr>
                                        <td>{{@$schedule->course->name}}</td>
                                        <td>{{@$schedule->subject->name}}</td>
                                        <td>{{@$schedule->date}}</td>
                                        <td>{{date('h:i A', strtotime(@$schedule->from_time))}}-{{date('h:i A', strtotime(@$schedule->to_time))}}</td>
                                        <td>{{@$schedule->instructor->name}}</td>
                                        <td>@include('modules.schedules.action',['schedule' => $schedule])</td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div> <!-- end .table-responsive-->
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a  target = '_blank' href="index.html#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a  target = '_blank' href="/road-tests" class="dropdown-item">View All</a>
                        </div>
                    </div>

                    <h4 class="header-title mb-3">Upcoming Road Tests</h4>

                    <div class="table-responsive">
                        <table class="table table-borderless table-nowrap table-hover table-centered m-0">

                            <thead class="table-light">
                                <tr>
                                    <th>Student</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(\Auth::user()->can('view road tests'))
                                    @foreach(getUpcomingRoadTests() as $test)
                                    <tr>
                                        <td>{{@$test->student->name}}</td>
                                        <td>{{@$test->date}}</td>
                                        <td>{{@$test->location}}</td>
                                        <td>{!!getStatusBadge(@$test->status)!!}</td>
                                        <td>@include('modules.road-tests.action',['roadTest' => $test])</td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div> <!-- end .table-responsive-->
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
<!-- end row -->
@endsection
@push('scripts')
    <script>
        var colors = ["#f1556c"],
        dataColors = $("#total-revenue-students").data("colors");
        var graphData = "{{getStudentGraph()}}";
		graphData =  JSON.parse(graphData.replace(/&quot;/g,'"'));
        dataColors && (colors = dataColors.split(","));
        var options = { series: [{{getTotalRevenuePercentage()}}], chart: { height: 242, type: "radialBar" }, plotOptions: { radialBar: { hollow: { size: "65%" } } }, colors: colors, labels: ["Revenue"] },
            chart = new ApexCharts(document.querySelector("#total-revenue-students"), options);
        chart.render();
        colors = ["#1abc9c", "#4a81d4"];

        (dataColors = $("#student-analytics").data("colors")) && (colors = dataColors.split(","));
        options = {
            series: [
                { 
                    name: "Student Count", 
                    type: "column", 
                    data: graphData.data 
                },
            ],
            chart: { height: 378, type: "line", offsetY: 10 },
            stroke: { width: [2, 3] },
            plotOptions: { bar: { columnWidth: "50%" } },
            colors: colors,
            dataLabels: { enabled: !0, enabledOnSeries: [1] },
            labels: graphData.categories,
            // xaxis: { type: "datetime" },
            legend: { offsetY: 7 },
            grid: { padding: { bottom: 20 } },
            fill: { type: "gradient", gradient: { shade: "light", type: "horizontal", shadeIntensity: 0.25, gradientToColors: void 0, inverseColors: !0, opacityFrom: 0.75, opacityTo: 0.75, stops: [0, 0, 0] } },
            yaxis: [
                { title: { text: "Total Students" } }
            
            ],
        };
        (chart = new ApexCharts(document.querySelector("#student-analytics"), options)).render(), $("#dash-daterange").flatpickr({ altInput: !0, mode: "range", altFormat: "F j, y", defaultDate: "today" });

    </script>
@endpush