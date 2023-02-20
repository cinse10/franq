<?php 

	require_once "conexion.php";
	$conexion=conexion();
	$horario=$_POST['horario'];
	$lunes=$_POST['lunes'];
	$martes=$_POST['martes'];
	$miercoles=$_POST['miercoles'];
	$jueves=$_POST['jueves'];
	$viernes=$_POST['viernes'];
	$sabado=$_POST['sabado'];
	$domingo=$_POST['domingo'];

	$sql="INSERT into clases (horario,lunes,martes,miercoles,jueves,viernes,sabado,domingo)
								values ('$horario','$lunes','$martes','$miercoles','$jueves','$viernes','$sabado','$domingo')";
	echo $result=mysqli_query($conexion,$sql);

 ?>