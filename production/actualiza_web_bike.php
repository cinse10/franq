<?php 
	include("conexion.php");
	$id_producto = $_POST['id_producto'];
	$descripcion_bike = $_POST['descripcion'];
	$detalles_bike = $_POST['detalles'];
	$altura=$_POST['altura'];
    $anchura=$_POST['anchura'];
    $longitud=$_POST['longitud'];
    $peso=$_POST['peso'];   
    $cod_linio=$_POST['cod_linio'];

	$sql = "UPDATE `productos_bike` SET `descripcion_bike`='".$descripcion_bike."',`detalles_bike`='".$detalles_bike."',`altura`='".$altura."',`anchura`='".$anchura."',`longitud`='".$longitud."',`peso`='".$peso."',`cod_linio`='".$cod_linio."' WHERE id_producto=".$id_producto;
	if(mysqli_query($conexion,$sql)){
		echo '<script language="javascript">';
			echo 'alert("Datos actualizados con éxito");';
			echo 'window.location="consulta_productos_bike.php";';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
			echo 'alert("Ocurrió un error al guardar los datos");';
			echo 'window.history.back();';
		echo '</script>';
	}
 ?> 