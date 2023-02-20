<?php 
	include ("credencial.php");
	$disponible=5;
	$item_id= 'MLM809095858';

	$post = array(			   
			   "available_quantity" => $disponible		   
			);
	$post3 = json_encode($post);
	$ch = curl_init("https://api.mercadolibre.com/items/$item_id?access_token=$token");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post3);

		// execute!
		$respuesta = curl_exec($ch);

		// close the connection, release resources used
		curl_close($ch);

		// do anything you want with your response
		var_dump($respuesta);
	
 ?>