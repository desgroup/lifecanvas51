@extends('layouts.master')

@section('headcontent', '<link rel="stylesheet" href="assets/css/pages/page_search_inner.css">')

@section('content')
@include('layouts.partials.title')

    <div class="row">
        <div class="col-md-3 md-margin-bottom-50">
            Data
        </div>
        <div class="col-md-9 s-results md-margin-bottom-50"><!--=== Map ===-->
            <script type='text/javascript' src='http://www.google.com/jsapi'></script>
            <script type='text/javascript'>google.load('visualization', '1', {'packages': ['geochart']});
                google.setOnLoadCallback(drawVisualization);

                function drawVisualization() {
                    var data = new google.visualization.DataTable();

                    data.addColumn('string', 'Country');
                    data.addColumn('number', 'Value');
                    data.addColumn({type: 'string', role: 'tooltip'});
                    var ivalue = new Array();

                    data.addRows([[{v: 'CA', f: 'Canada'}, 0, 'You live here']]);
                    ivalue['CA'] = 'http://lifecanvas/travel/CA';

                    data.addRows([[{v: 'US', f: 'United States'}, 1, '']]);
                    ivalue['US'] = '';

                    data.addRows([[{v: 'BR', f: 'Brazil'}, 2, '2 visits']]);
                    ivalue['BR'] = '/travel/br';

                    data.addRows([[{v: 'CN', f: 'China'}, 3, '3 cities']]);
                    ivalue['CN'] = '/travel/ch';

                    data.addRows([[{v: 'MX', f: 'Mexico'}, 4, '1 trip']]);
                    ivalue['MX'] = '/travel/MX';

                    var options = {
                        backgroundColor: {fill: '#FFFFFF', stroke: '#FFFFFF', strokeWidth: 0},
                        colorAxis: {
                            minValue: 0,
                            maxValue: 4,
                            colors: ['#72C02C', '#d6a031', '#6699CC', '#6699CC', '#72c02c']
                        },
                        legend: 'none',
                        backgroundColor: {fill: '#FFFFFF', stroke: '#FFFFFF', strokeWidth: 0},
                        datalessRegionColor: '#f5f5f5',
                        displayMode: 'regions',
                        enableRegionInteractivity: 'true',
                        resolution: 'countries',
                        sizeAxis: {minValue: 1, maxValue: 1, minSize: 10, maxSize: 10},
                        region: 'world',
                        keepAspectRatio: true,
                        width: null,
                        height: null,
                        tooltip: {textStyle: {color: '#444444'}, trigger: 'focus', isHtml: false}
                    };
                    var chart = new google.visualization.GeoChart(document.getElementById('visualization'));
                    google.visualization.events.addListener(chart, 'select', function () {
                        var selection = chart.getSelection();
                        if (selection.length == 1) {
                            var selectedRow = selection[0].row;
                            var selectedRegion = data.getValue(selectedRow, 0);
                            if (ivalue[selectedRegion] != '') {
                                window.open(ivalue[selectedRegion]);
                            }
                        }
                    });
                    chart.draw(data, options);
                }
                window.onresize = function (event) {
                    drawVisualization();
                };
            </script>
            <div id='visualization'></div>
        </div>

    </div>
@stop