# Highcharts
Widget wrapper for Highcharts JS library


# How to install

composer require saddinamo/highcharts:dev-master

To update JS files use the link below:
https://www.highcharts.com/download/

Highcharts ***.zip link



# How to use

Usage example. In Yii2 view:

use saddinamo\highcharts\HighCharts;

$series = [
    [
        'name'=>'Packed',
        'data' => [
            (int)$order['quantity_hist']
        ],
        // 'pointPadding' => 0.25,
        // 'pointPlacement' => 0,
        'pointWidth' => 25,
        'color' => 'rgba(0,112,192,1)',
        'dataLabels' => [
            'align' => 'right',
        ],
    ],
    [
        'name'=>'Plan',
        'data' => [
            (int)$order['quantity_planned']
        ],
        // 'pointPadding' => 0.1,
        // 'pointPlacement' => 0,
        'color' => 'rgba(0,176,80,.5)',
        'pointWidth' => 40,
    ],
];

echo HighCharts::widget([
    'ChartOptions' => [
        'chart' => [
            'type' => 'bar',
            'height' => '35vw',
            'backgroundColor' => 'none',
            'spacing' => [0,0,0,0],
        ],
        'legend' => [
            'enabled' => false,
        ],
        'title' => [
            'text' => NULL,
        ],
        'exporting' => [
            'enabled' => false,
        ],
        'credits' => [
            'enabled'=>false,
        ],
        'plotOptions' => [
            'bar' => [
                'dataLabels' => [
                    'enabled' => true,
                    'format' => '{series.name}<br>{point.y}',
                    'color' => 'black',
                    // 'overflow' => 'allow',
                    // 'crop' => false,
                    // 'verticalAlign' => 'bottom',
                ],
                'grouping' => false,
            ],
        ],
        'xAxis' => [
            'labels' => [],
            'tickLength' => 0,
        ],
        'yAxis' => [
            'visible' => false,
            'title' => ['text'=>NULL],
        ],
        'tooltip' => [
            'enabled' => false,
            'shared' => true,
        ],
        'series' => $series,
    ],
]);


