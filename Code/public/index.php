<h1>docker sample</h1>

<?php

//echo $_ENV['MYSQL_NAME'];

$urlMongo = "mongodb://172.17.0.2:27017";
$urlMysql = "172.17.0.4:3306";
$urlMysqlTest = "172.17.0.5:3306";

$m = new MongoClient($urlMongo);
$db = $m->comedy;
$collection = $db->cartoons;
$obj = array("title" => "Calvin and Hobbes", "author" => "Bill Watterson");
$collection->insert($obj);
$obj = array("title" => "XKCD", "online" => true);
$collection->insert($obj);
$cursor = $collection->find();

if ($cursor) {
    echo '<h2>MongoDB OK</h2>';
}

$user = "root";
$pass = "secret";
$db = "homestead";

$link = mysql_connect($urlMysql, $user, $pass) or die("dinny connect");
$sdb = mysql_select_db($db, $link) or die("db dinny");
mysql_close($link) or die("dinny end link");
echo '<h2>Mysql OK</h2>';

$user = "root";
$pass = "secret";
$db = "homestead";

$link = mysql_connect($urlMysqlTest, $user, $pass) or die("dinny connect");
$sdb = mysql_select_db($db, $link) or die("db dinny");
mysql_close($link) or die("dinny end link");
echo '<h2>Mysql testting OK</h2>';


/*
TDOO
Setting $_ENV (fka $HTTP_ENV_VARS) with nginx/php-fpm
http://stackoverflow.com/questions/8551592/setting-env-fka-http-env-vars-with-nginx-php-fpm
*/
