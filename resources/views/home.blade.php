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
                        <div id="container-stats" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
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
                                            name: 'Form I',
                                            data: [80.0, 60.9, 90.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3]
                                        }, {
                                            name: 'Form II',
                                            data: [-0.2, 10.8, 15.7, 11.3, 17.0, 62.0, 54.8, 54.1, 60.1, 40.1]
                                        }, {
                                            name: 'Form III',
                                            data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0]
                                        }, {
                                            name: 'Form IV',
                                            data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3]
                                        }]
                                    });
                                });
                            })(jQuery);

                            Highcharts.chart('container-stats', {
                                chart: {
                                    type: 'bar'
                                },
                                title: {
                                    text: 'Students Registration'
                                },
                                subtitle: {
                                    text: 'Source: '
                                },
                                xAxis: {
                                    categories: ['Form V', 'Form IV', 'Form III', 'Form II', 'Form I'],
                                    title: {
                                        text: null
                                    }
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: 'Population (millions)',
                                        align: 'high'
                                    },
                                    labels: {
                                        overflow: 'justify'
                                    }
                                },
                                tooltip: {
                                    valueSuffix: ' millions'
                                },
                                plotOptions: {
                                    bar: {
                                        dataLabels: {
                                            enabled: true
                                        }
                                    }
                                },
                                legend: {
                                    layout: 'vertical',
                                    align: 'right',
                                    verticalAlign: 'top',
                                    x: -40,
                                    y: 80,
                                    floating: true,
                                    borderWidth: 1,
                                    backgroundColor:
                                        Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                                    shadow: true
                                },
                                credits: {
                                    enabled: false
                                },
                                series: [{
                                    name: 'Year 2019',
                                    data: [2007, 3001, 6350, 2030, 2000]
                                }, {
                                    name: 'Year 2020',
                                    data: [1330, 1560, 9470, 4080, 6000]
                                }]
                            });
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

