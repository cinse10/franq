<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id=$_POST['id'];
	$horario=$_POST['horario'];
	$lunes=$_POST['lunes'];
	$martes=$_POST['martes'];
	$miercoles=$_POST['miercoles'];
	$jueves=$_POST['jueves'];
	$viernes=$_POST['viernes'];
	$sabado=$_POST['sabado'];
	$domingo=$_POST['domingo'];
	$sql="UPDATE clases set horario='$horario',
								lunes='$lunes',
								martes='$martes',
								miercoles='$miercoles',
								jueves='$jueves',
								viernes='$viernes',
								sabado='$sabado',
								domingo='$domingo'
				where id_clase='$id'";
				
	echo $result=mysqli_query($conexion,$sql);
 ?>
