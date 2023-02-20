<?php 
	include("conexion.php");
	$id_producto = $_POST['id_producto'];
	$nombre_producto = $_POST['nombre_producto'];
	$desc_producto = $_POST['descripcion'];
	$precio_empleado = $_POST['precio_empleado'];
	$precio_afiliado = $_POST['precio_afiliado'];
	$precio_publico = $_POST['precio_publico'];
	//$precio_credito = $_POST['precio_credito'];
	$codigo_barras_producto = $_POST['codigo_barras_producto'];
	$codigo_producto = $_POST['codigo_producto'];
	//$combo_id = $_POST['combo_id'];
	$inventario_producto = $_POST['inventario_producto'];	


	$sql = "UPDATE `productos_chiqui` SET `nombre_producto`='".$nombre_producto."',`codigo_barras`='".$codigo_barras_producto."',`descripcion`='".$desc_producto."',`precio_empleado`='".$precio_empleado."',`precio_afiliado`='".$precio_afiliado."',`precio_publico`='".$precio_publico."',`inventario_tmp_producto`='".$inventario_producto."',`inventario_producto`=".$inventario_producto." WHERE id_producto=".$id_producto;

	if(mysqli_query($conexion,$sql)){
		echo '<script language="javascript">';
			echo 'alert("Datos actualizados con éxito");';
			echo 'window.location="consulta_productos_chiqui_mundo.php";';
			//echo 'window.location="acciones_chiqui_mundo.php?action=edita&id_producto='.$id_producto.'";';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
			echo 'alert("Datos No actulizados revisa correctamente los datos");';
			echo 'window.location="consulta_productos_chiqui_mundo.php";';
		echo '</script>';
	}

 ?>