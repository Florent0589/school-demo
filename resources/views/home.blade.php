@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

{{--                        <script src="http://code.highcharts.com/highcharts.js"></script>--}}
{{--                        <script src="http://code.highcharts.com/modules/exporting.js"></script>--}}

                        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

                        <script>
                            (function($)
                            {
                                $(function () {
                                    $('#container').highcharts({
                                        title: {
                                            text: 'Campuses Pass Rate',
                                            x: -20 //center
                                        },
                                        subtitle: {
                                            text: 'Source: us.us.com',
                                            x: -20
                                        },
                                        xAxis: {
                                            categories: ['2010', '2011', '2012', '2013', '2014', '2015',
                                                '2016', '2017', '2018', '2019']
                                        },
                                        yAxis: {
                                            title: {
                                                text: 'Pass Rate (%)'
                                            },
                                            plotLines: [{
                                                value: 0,
                                                width: 1,
                                                color: '#808080'
                                            }]
                                        },
                                        tooltip: {
                                            valueSuffix: '%'
                                        },
                                        legend: {
                                            layout: 'vertical',
                                            align: 'right',
                                            verticalAlign: 'middle',
                                            borderWidth: 0
                                        },
                                        series: [{
                                            name: 'Nhlangano',
                                            data: [80.0, 60.9, 90.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3]
                                        }, {
                                            name: 'Mbabane',
                                            data: [-0.2, 10.8, 15.7, 11.3, 17.0, 62.0, 54.8, 54.1, 60.1, 40.1]
                                        }, {
                                            name: 'Manazini',
                                            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0]
                                        }, {
                                            name: 'Big Bend',
                                            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3]
                                        }]
                                    });
                                });
                            })(jQuery);
                        </script>
                        <div class="row">
                            <br><hr>
                            <div class="col-4">
                                <div class="card-header" id="container1"><i class="fa fa-users"></i> Students {{ $students }}</div>
                            </div>
                            <div class="col-4">
                                <div class="card-header"><i class="fa fa-users"></i> Tutors {{ $tutors }}</div>
                            </div>
                            <div class="col-4">
                                <div class="card-header"><i class="fa fa-users"></i> Parents {{ $guardian }}</div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    (function($)
    {
        $(function () {
            $('#container1').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Browser market shares in January, 2018'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Chrome',
                y: 61.41,
                sliced: true,
                selected: true
            }, {
                name: 'Internet Explorer',
                y: 11.84
            }, {
                name: 'Firefox',
                y: 10.85
            }, {
                name: 'Edge',
                y: 4.67
            }, {
                name: 'Safari',
                y: 4.18
            }, {
                name: 'Other',
                y: 7.05
            }]
        }]
        });
    });
    })(jQuery);
</script>
