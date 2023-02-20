<?php 
	$vacio="";
	/*$ch = curl_init('https://api.mercadolibre.com/oauth/token?grant_type=client_credentials&client_id=1881466303470941&client_secret=Pxiyp0KjQv5GpHKNGNJ7XqKiVSBvBIx5');*/
	//elbueno
	$ch = curl_init('https://api.mercadolibre.com/oauth/token?grant_type=client_credentials&client_id=4480670235306932&client_secret=F8y4mVPKfu6erOub0z4jq83PVPAaXZt0');
	//pruebas
	/*$ch = curl_init('https://api.mercadolibre.com/oauth/token?grant_type=client_credentials&client_id=6567433161961268&client_secret=BtLE8hPuzIBQdZMUvOtQsoDyx4osR5pO');*/


		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $vacio);

		// execute!
		$response = curl_exec($ch);

		// close the connection, release resources used
		curl_close($ch);

		// do anything you want with your response
		// var_dump($response);

		$arreglo = json_decode($response);
		$a = (array)$arreglo;
		
		$token = $a['access_token'];
		//var_dump($token);
 
 ?>
