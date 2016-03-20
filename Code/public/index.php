docker sample

<?php

phpinfo();

echo getenv('MYSQL_ENV_MYSQL_USER');

$link = mysql_connect(env('MYSQL_PORT_3306_TCP'), env('MYSQL_ENV_MYSQL_USER'), env('MYSQL_ENV_MYSQL_PASSWORD'));


if (!$link) {
    die('接続失敗です。' . mysql_error());
}


/*
'mysql' => [
    'driver' => 'mysql',
    'host' => env('MYSQL_PORT_3306_TCP_ADDR', 'localhost'),
    'port' => env('MYSQL_PORT_3306_TCP_PORT', '3306'),
    'database' => env('MYSQL_ENV_MYSQL_DATABASE', 'forge'),
    'username' => env('MYSQL_ENV_MYSQL_USER', 'forge'),
    'password' => env('MYSQL_ENV_MYSQL_PASSWORD', ''),
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
    'strict' => false,
    'engine' => null,
],
*/

