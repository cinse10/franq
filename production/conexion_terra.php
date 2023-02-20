<?php
	setlocale(LC_ALL,"es_ES");
	$host= "localhost";
	$user = "root";
	$pw ="";
	$db ="mm5";
	$mysqli = new mysqli($host,$user,$pw,$db);
	$conexion_terra = mysqli_connect($host,$user,$pw,$db) or die("Error " . mysqli_error($conexion_terra));
	mysqli_set_charset($conexion_terra,"utf8");
	setlocale(LC_TIME, "es_MX" );
	

	/*
	$conexion_terra = mysqli_connect($host,$user,$pw,$db) or die("Error " . mysqli_error($conexion_terra));
  	$query = "SELECT * FROM tabla" or die("Error in the consult.." . mysqli_error($conexion_terra)); 
  	$resultado = $conexion_terra->query($query);
*/
  
?>