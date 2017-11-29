<?php

/**
 * @param array $params
 *
 * @return PDO
 */
function initPDO(array $params) {
    $connection = new PDO(
        'mysql:host='.$params['host'].';dbname='.$params['dbname'].';port='.$params['port'],
        $params['user'],
        $params['password']
    );

    return $connection;
}

$params = [
    'host' => '127.0.0.1',
    'dbname' => 'php-wb2',
    'user' => 'root',
    'password' => 'root',
    'port' => 8889,
];

$con = initPDO($params);
