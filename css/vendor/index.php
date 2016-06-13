<?php
require_once('C:\wamp\www\esc\app/init.php'); 
require_once('C:\wamp\www\esc\predis-1.1\autoload.php'); 

Predis\Autoloader::register();
$redis = new \Predis\Client();

$inputJSON = file_get_contents('php://input');
$input= json_decode( $inputJSON, TRUE );
		$title = $input['title'];
		$body  = $input['body'];
		
   
  
  
 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $indexed =$es->index([
			'index'=>'data',
			'type'=>'dt',
			'body'=>[
				'title'=>$title,
				'body'=>$body
			]

			

	]);
	$redis = new Predis\Client(array(
    'host' => '127.0.0.1', 
    'port' => 6379, 
));
	$list = "test";
$redis->rpush($list, $body);
	if($indexed) { 
		echo json_encode($indexed);
		}
	
	
	}
	if ($_SERVER['REQUEST_METHOD'] === 'GET')  {
	$redis = new Predis\Client(array(
    'host' => '127.0.0.1', 
    'port' => 6379, 
));
	
$arList = $redis->lrange("test", 0, -1);
echo json_encode($arList);


	}
	
	
	
	?>