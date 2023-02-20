<?php 
	$vacio="";
	$ch = curl_init('https://api.mercadolibre.com/oauth/token?grant_type=client_credentials&client_id=2552404268405514&client_secret=g37Nf01mzqGmTSOf8unbkmwxsjeI1OTd');
	//$ch = curl_init('https://api.mercadolibre.com/oauth/token?grant_type=client_credentials&client_id=7717042427180616&client_secret=tIF6bT4OwD3Ba4sod7vpVa7j2PvY7Uej');
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
		var_dump($token);
 
 ?>
