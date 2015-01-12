<?php

return [

    'fetch' => PDO::FETCH_CLASS,

    'default' => 'mysql',

    'connections' => [

        'mysql' => [
            'driver'   => 'mysql',
            'database' => 'laravel_sample_test',
            'prefix'   => '',
        ],
    ],

];