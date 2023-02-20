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
	$marca = $_POST['marca'];
	$inventario_producto = $_POST['inventario_producto'];	


	$sql = "UPDATE `productos_importados` SET `modelo_producto`='".$modelo_producto."',`color_producto`='".$color_producto."',`talla_producto`='".$talla_producto."',`precio_clave`='".$precio_asociado."',`precio_afiliado`='".$precio_contado."',`precio_publico`='".$precio_credito."',`codigo_barras_producto`='".$codigo_barras_producto."',`catalogo_producto`='".$catalogo_producto."',`marca`='".$marca."',`inventario_producto`=".$inventario_producto." WHERE id_producto=".$id_producto;

	if(mysqli_query($conexion,$sql)){
		echo '<script language="javascript">';
			echo 'alert("Datos actualizados con éxito");';
			echo 'window.location="consulta_productos_importados.php";';
			//echo 'window.location="acciones_importados.php?action=edita&id_producto='.$id_producto.'";';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
			echo 'alert("Datos No actulizados revisa correctamente los datos");';
			echo 'window.location="consulta_productos_importados.php";';
		echo '</script>';
	}

 ?>