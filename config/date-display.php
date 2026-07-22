<?php

return [
    'default_timezone' => 'UTC',
    'default_format' => 'time_day_month_year_24',
    'formats' => [
        'time_day_month_year_24' => [
            'label' => '18:45:00 03/04/2026',
            'php' => 'H:i:s d/m/Y',
            'moment' => 'HH:mm:ss DD/MM/YYYY',
        ],
        'day_month_year_24' => [
            'label' => '03/04/2026 18:45:00',
            'php' => 'd/m/Y H:i:s',
            'moment' => 'DD/MM/YYYY HH:mm:ss',
        ],
        'month_day_year_12' => [
            'label' => '04/03/2026 06:45:00 PM',
            'php' => 'm/d/Y h:i:s A',
            'moment' => 'MM/DD/YYYY hh:mm:ss A',
        ],
        'year_month_day_24' => [
            'label' => '2026-04-03 18:45:00',
            'php' => 'Y-m-d H:i:s',
            'moment' => 'YYYY-MM-DD HH:mm:ss',
        ],
        'day_short_month_year_24' => [
            'label' => '03 Apr 2026 18:45:00',
            'php' => 'd M Y H:i:s',
            'moment' => 'DD MMM YYYY HH:mm:ss',
        ],
    ],
];
