<?php

require_once('.\predis-1.1\autoload.php'); 

Predis\Autoloader::register();




$redis = new Predis\Client(array(
    'host' => '127.0.0.1', 
    'port' => 6379, 
));


$list = "test";
$redis->rpush($list, "entry1");
$redis->rpush($list, "entry2");
$redis->rpush($list, "entry3");

echo "output " . $redis->llen($list) . "<br>";

$arList = $redis->lrange($list, 0, -1);
echo "<pre>";
print_r($arList);
echo "</pre>";






?>

