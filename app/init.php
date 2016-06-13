<?php
require_once ('C:\wamp\www\esc\css\vendor/autoload.php');

$es=new Elasticsearch\Client([
	'hosts'=>['127.0.0.1:9200']
]);