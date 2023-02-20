<?php 
	include("conexion.php");
	$id_producto = $_POST['id_producto'];
	$modelo_producto = $_POST['modelo_producto'];
	$color_producto = $_POST['color_producto'];
	$talla_producto = $_POST['talla_producto'];

	$precio_asociado = $_POST['precio_asociado'];
	$precio_contado = $_POST['precio_contado'];
	$precio_credito = $_POST['precio_credito'];

	$codigo_barras_producto = $_POST['codigo_barras_producto'];
	$catalogo_producto = $_POST['catalogo_producto'];
	$combo_id = $_POST['combo_id'];
	$inventario_producto = $_POST['inventario_producto'];	


	$sql = "UPDATE `productos_dankriz` SET `modelo_producto`='".$modelo_producto."',`color_producto`='".$color_producto."',`talla_producto`='".$talla_producto."',`precio_clave`= '".$precio_asociado."',`precio_afiliado`='".$precio_contado."',`precio_publico`='".$precio_credito."',`codigo_barras_producto`='".$codigo_barras_producto."',`catalogo_producto`='".$catalogo_producto."',`combo_id`='".$combo_id."',`inventario_producto`=".$inventario_producto." WHERE id_producto=".$id_producto;

	if(mysqli_query($conexion,$sql)){
		echo '<script language="javascript">';
			echo 'alert("Datos actualizados con éxito");';
			echo 'window.location="consulta_productos_dankriz.php";';
			//echo 'window.location="acciones_dankriz.php?action=edita&id_producto='.$id_producto.'";';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
			echo 'alert("Datos No actulizados revisa correctamente los datos");';
			echo 'window.location="consulta_productos_dankriz.php";';
		echo '</script>';
	}

 ?>