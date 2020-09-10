<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class UserChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->container = 'charts::chartjs.container';
        $this->script = 'charts::chartjs.script';

        return $this->options([
            'maintainAspectRatio' => false,
            'title' => [
                'display'=> true,
                'text'=>'This\'s temperature',
            ],
            'scales' => [
	            'yAxes' => [
	                'display' => true,
	                'stacked' => true,
	                'ticks' => [
	                    'beginAtZero'=> true,
                        // 'barPercentage'=>0.1,
	                    'min' => 20,
	                    'max' => 60
	                ],
	            ],
	        ],
        ]);
    }
}
