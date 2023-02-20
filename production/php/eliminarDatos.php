
<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id=$_POST['id'];

	$sql="DELETE from clases where id_clase='$id'";
	echo $result=mysqli_query($conexion,$sql);
 ?>