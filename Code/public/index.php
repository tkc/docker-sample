docker sample

<?php

$m = new MongoClient("mongodb://172.17.0.6:27017");
$db = $m->comedy;
$collection = $db->cartoons;
$obj = array("title" => "Calvin and Hobbes", "author" => "Bill Watterson");
$collection->insert($obj);
$obj = array("title" => "XKCD", "online" => true);
$collection->insert($obj);
$cursor = $collection->find();
//foreach ($cursor as $obj) {
//    echo $obj["title"] . "\n";
//}


$url = "172.17.0.4";
$url = "172.17.0.4:3306";
$user = "root";
$pass = "secret";
$db = "homestead";


$link = mysql_connect($url, $user, $pass) or die("dinny connect");
$sdb = mysql_select_db($db, $link) or die("db dinny");
mysql_close($link) or die("dinny end link");


$url = "172.17.0.2:3306";
$user = "root";
$pass = "secret";
$db = "homestead";


$link = mysql_connect($url, $user, $pass) or die("dinny connect");
$sdb = mysql_select_db($db, $link) or die("db dinny");
mysql_close($link) or die("dinny end link");

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

