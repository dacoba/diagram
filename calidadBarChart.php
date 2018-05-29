<?php

$data = unserialize($_POST['data']);

$data_json = json_encode($data);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/nv.d3.css" rel="stylesheet" type="text/css">
    <script src="js/d3.min.js" charset="utf-8"></script>
    <script src="js/nv.d3.js"></script>

    <style>
        text {
            font: 12px sans-serif;
        }
        svg {
            display: block;
        }
        html, body, #chart1, svg {
            margin: 0 auto;
            padding: 0 auto;
            height: 100%;
            width: 99%;
        }
        * {
            font-size: 30px !important;
        }
    </style>
</head>
<body>

<div id="chart1">
    <svg></svg>
</div>

<script>
    var datom = [
        {
            values: [{x:0, y:5}, {x:100, y:5}],
            key: 'No Certificado',
            color: '#E74C3C'
        },
        {
            values: [{x:0, y:7.5}, {x:100, y:7.5}],
            key: 'Registrado',
            color: '#2980B9'
        },
        {
            values: [{x:0, y:10}, {x:100, y:10}],
            key: 'Certificado',
            color: '#27AE60'
        }
    ];

    historicalBarChart = [<?php echo $data_json; ?>];

    nv.addGraph(function() {
        var chart = nv.models.lineChart();
            chart.legend.updateState(false)
            chart.showXAxis(false)
            chart.showYAxis(false)
            chart.yDomain([0,12])

            d3.select('#chart1 svg')
                .datum(datom)
                .transition().duration(500)
                .call(chart)
            ;

        var chart = nv.models.discreteBarChart()
            .x(function(d) { return d.label })
            .y(function(d) { return d.value })
            .yDomain([0,12])
            .staggerLabels(true)
            //.staggerLabels(historicalBarChart[0].values.length > 8)
            .showValues(true)
            .duration(250)
            ;

        d3.select('#chart1 svg')
            .datum(historicalBarChart)
            .call(chart);

        nv.utils.windowResize(chart.update);
        return chart;
    });


</script>
</body>
</html>