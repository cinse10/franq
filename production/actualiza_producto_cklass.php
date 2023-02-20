<?php 
	include("conexion.php");
	$id_producto = $_POST['id_producto'];
	$modelo_producto = $_POST['modelo_producto'];
	$color_producto = $_POST['color_producto'];
	$talla_producto = $_POST['talla_producto'];
	$precio_asociado = $_POST['precio_asociado'];
	$precio_contado = $_POST['precio_contado'];
	$precio_credito = $_POST['precio_credito'];
	$precio_oferta = $_POST['precio_oferta'];
	$codigo_barras_producto = $_POST['codigo_barras_producto'];
	$catalogo_producto = $_POST['catalogo_producto'];
	$combo_id = $_POST['combo_id'];
	$inventario_producto = $_POST['inventario_producto'];	


	$sql = "UPDATE `productos_cklass` SET `modelo_producto`='".$modelo_producto."',`color_producto`='".$color_producto."',`talla_producto`='".$talla_producto."',`precio_asociado`='".$precio_asociado."',`precio_contado`='".$precio_contado."',`precio_credito`='".$precio_credito."',`precio_oferta`='".$precio_oferta."',`codigo_barras_producto`='".$codigo_barras_producto."',`catalogo_producto`='".$catalogo_producto."',`combo_id`='".$combo_id."',`inventario_producto`=".$inventario_producto." WHERE id_producto=".$id_producto;

	if(mysqli_query($conexion,$sql)){
		echo '<script language="javascript">';
			echo 'alert("Datos actualizados con éxito");';
			echo 'window.location="consulta_productos_cklass.php";';
			//echo 'window.location="acciones_cklass.php?action=edita&id_producto='.$id_producto.'";';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
			echo 'alert("Datos No actulizados revisa correctamente los datos");';
			echo 'window.location="consulta_productos_cklass.php";';
		echo '</script>';
	}

 ?>