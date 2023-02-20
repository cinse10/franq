<?php
	setlocale(LC_ALL,"es_ES");
	$host= "localhost";
	$user = "JarelyLuna";
	$pw ="multimarcas";
	$db ="franq";
	$mysqli = new mysqli($host,$user,$pw,$db);
	$conexion = mysqli_connect($host,$user,$pw,$db) or die("Error " . mysqli_error($conexion));
	mysqli_set_charset($conexion,"utf8");
	setlocale(LC_TIME, "es_MX" );
	

	/*
	$conexion = mysqli_connect($host,$user,$pw,$db) or die("Error " . mysqli_error($conexion));
  	$query = "SELECT * FROM tabla" or die("Error in the consult.." . mysqli_error($conexion)); 
  	$resultado = $conexion->query($query);
*/
  
?>