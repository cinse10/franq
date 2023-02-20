<?php 
	include("conexion.php");
	$id_producto = $_POST['id_producto'];
	$nombre_producto = $_POST['nombre_producto'];
	$precio_producto = $_POST['precio_producto'];
	$precio_afi_producto = $_POST['precio_afi_producto'];
	$codigo_barras_producto = $_POST['codigo_barras_producto'];
	$inventario_producto = $_POST['inventario_producto'];
	$descripcion_producto = $_POST['descripcion_producto'];
	$status = $_POST['status'];


	$sql = "UPDATE `productos_misentir` SET `nombre_producto`='".$nombre_producto."',`precio_producto`='".$precio_producto."',`precio_afi_producto`='".$precio_afi_producto."',`codigo_barras_producto`='".$codigo_barras_producto."',`inventario_producto`=".$inventario_producto.",`descripcion_producto`='".$descripcion_producto."',`activo`=".$status." WHERE id_producto=".$id_producto;

	if(mysqli_query($conexion,$sql)){
		echo '<script language="javascript">';
			echo 'alert("Datos actualizados con éxito");';
			//echo 'window.location="consulta_productos_misentir.php";';
			echo 'window.location="acciones_misentir.php?action=edita&id_producto='.$id_producto.'";';
		echo '</script>';
	}

 ?>