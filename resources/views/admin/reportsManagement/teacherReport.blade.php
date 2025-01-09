@extends('admin.head')
@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Teacher Reports</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/reports/teacherReport">Teacher Report</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Combined Card for Date Selection and Chart -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Filter and View Teacher Registrations</h5>
                    </div>
                    <div class="card-body">
                        <!-- Date Selection Form -->
                        <form method="GET" action="{{ url('/admin/reports/teacherReport') }}">
                            <div class="form-row align-items-end">
                                <div class="form-group col-md-5">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" class="form-control" name="start_date" id="start_date" value="{{ $startDate }}">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="end_date">End Date</label>
                                    <input type="date" class="form-control" name="end_date" id="end_date" value="{{ $endDate }}">
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-primary btn-block">Filter</button>
                                </div>
                            </div>
                        </form>

                        <!-- Chart Section -->
                        <div id="chart" class="mt-4"></div>

                        <!-- Summary Table -->
                        <div class="mt-4">
                            <h5>Summary</h5>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Selected Date Range</th>
                                        <td>{{ $startDate }} to {{ $endDate }}</td>
                                    </tr>
                                    <tr>
                                        <th>Total Teachers Registered</th>
                                        <td>{{ array_sum($chartData['series'][0]['data']->toArray()) }}</td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    var chartData = @json($chartData);

    var options = {
        series: chartData.series,
        chart: {
            type: 'bar',
            height: 350,
        },
        plotOptions: {
            bar: {
                columnWidth: '80%',
            },
        },
        xaxis: {
            categories: chartData.categories, 
            labels: {
                rotate: -45,
            },
        },
        yaxis: {
            title: {
                text: 'Teacher Registrations',
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
@endsection
