<?php 
	include("conexion.php");
	$id_producto = $_POST['id_producto'];
	$nombre_producto = $_POST['nombre'];
	$precio_producto = $_POST['precio_catalogo'];
	$precio_afi_producto = $_POST['precio_afiliado'];
	$codigo_barras_producto = $_POST['codigo_barras_producto'];
	$inventario_producto = $_POST['inventario_producto'];
	$descripcion_producto = $_POST['descripcion'];
	$talla = $_POST['talla'];


	$sql = "UPDATE `cubrebocas` SET `nombre`='".$nombre_producto."',`precio_catalogo`='".$precio_producto."',`precio_afiliado`='".$precio_afi_producto."',`codigo_barras_producto`='".$codigo_barras_producto."',`inventario_producto`=".$inventario_producto.",`inventario_tmp_producto`=".$inventario_producto.",`descripcion`='".$descripcion_producto."',`talla`=".$talla." WHERE id_producto=".$id_producto;

	if(mysqli_query($conexion,$sql)){
		echo '<script language="javascript">';
			echo 'alert("Datos actualizados con éxito");';
			echo 'window.location="consulta_productos_cubrebocas.php";';
		echo '</script>';
	}else{
        echo '<script language="javascript">';
			echo 'alert("Datos actualizados con éxito");';
			echo 'window.location="consulta_productos_cubrebocas.php";';
		echo '</script>';
    }

 ?>