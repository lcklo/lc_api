<?php
/**
 * User linchao
 * Date 2016-9-5
 * Time 18:50:00
 */
return array(
    'redis' => 'tcp://192.168.5.1:6379',
    'mysql' => array(
        'fetch' => PDO::FETCH_ASSOC,  //PDO::FETCH_OBJ
        'default' => [
            'driver'    => 'mysql',
            'host'      => '172.16.88.78',
            'database'  => 'user_center',
            'username'  => 'root',
            'password'  => '123456',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],
    ),
);