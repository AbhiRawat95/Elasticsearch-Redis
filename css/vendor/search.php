<?php
require_once('C:\wamp\www\esc\app/init.php'); 
if(isset($_REQUEST['q'])){
	$q=$_REQUEST['q'];
	$query=$es->search([
		'body'=> [
			'query'=>[
				'bool'=>[
					'should'=>[
						'match'=>['title'=>$q],
						'match'=> ['body'=>$q]
					]
				]
			]	
		]
	]);
	echo json_encode($query['hits']['hits']);
	}
	// echo'<pre>',echo json_encode($query),'</pre>';
	// die();
	// if($query['hits']['total']>=1){
	// 		$results=$query['hits']['hits'];
	//  	}
	// }
	
?>
