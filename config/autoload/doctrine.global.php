<?php

return [
    'doctrine' => [
        'connection' => [
            'orm' => [
                'auto_generate_proxy_classes' => true,
                'proxy_dir' => 'data/cache/Proxy',
                'proxy_namespace' => 'Proxy',
                'underscore_naming_strategy' => true,
            ],
            'orm_default' => [
                'driverClass' => Doctrine\DBAL\Driver\PDOPgSql\Driver::class,
                'host' => 'db',
                'port' => 5432,
                'user' => 'postgres',
                'password' => 'postgres',
                'dbname' => 'desafio_indicacao'
            ],
        ],
    ]
];