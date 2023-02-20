<?php 
	$item = "MLM764560771";
	$vacio="";
	$ch = curl_init("https://api.mercadolibre.com/items/$item");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $vacio);

		// execute!
		$response = curl_exec($ch);

		// close the connection, release resources used
		curl_close($ch);

		// do anything you want with your response
		var_dump($response);

		$arreglo = json_decode($response);
		$a = (array)$arreglo;
		
		$inicial = $a['initial_quantity'];
		$vendido = $a['sold_quantity'];

		$stock =$inicial-$vendido;
		echo "<hr>";
		echo $stock;
 ?>