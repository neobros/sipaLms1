@extends('admin.head')
@section('content')
<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Income Reports</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/reports/incomeReport">Income Report</a></li>
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
                        <h5>Filter and View Income</h5>
                    </div>
                    <div class="card-body">
                        <!-- Date Selection Form -->
                        <form method="GET" action="{{ url('/admin/reports/incomeReport') }}">
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
                                        <th>Total Income</th>
                                        <td>Rs {{ number_format(array_sum($chartData['series'][0]['data']->toArray()), 2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Download Button -->
                        <div class="mt-3">
                            <button class="btn btn-primary" onclick="downloadIncomeReport()">Download Income Report</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.24/jspdf.plugin.autotable.min.js"></script>

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
                text: 'Income (Rs)',
            },
        },
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

    function downloadIncomeReport() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();

        doc.setFontSize(18);
        doc.text("Income Report", 105, 20, null, null, 'center');

        doc.setLineWidth(0.5);
        doc.line(10, 25, 200, 25);

        chart.dataURI().then(function (uri) {
            const chartWidth = document.querySelector("#chart").clientWidth;
            const chartHeight = document.querySelector("#chart").clientHeight;
            const scaleFactor = 180 / chartWidth;
            const imgWidth = 180;
            const imgHeight = chartHeight * scaleFactor;

            doc.addImage(uri.imgURI, 'PNG', 10, 30, imgWidth, imgHeight);

            const table = document.querySelector('table');
            doc.autoTable({ 
                html: table, 
                startY: imgHeight + 40,
                margin: { top: 10 }
            });

            doc.save('income_report.pdf');
        });
    }
</script>
@endsection
