<?php

return [

    'fetch' => PDO::FETCH_CLASS,

    'default' => 'sqlite',

    'connections' => [

        'sqlite' => [
            'driver'   => 'sqlite',
            'database' => app_path().'/tests/database/testing.sqlite',
            'prefix'   => '',
        ],
    ],

];