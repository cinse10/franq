<?php 
	include("conexion.php");
	$id_producto = $_POST['id_producto'];
	$libro_producto = $_POST['libro_producto'];
	$lista_producto = $_POST['lista_producto'];
	$pagina_producto = $_POST['pagina_producto'];
	$modelo_producto = $_POST['modelo_producto'];
	$marca_producto = $_POST['marca_producto'];
	$color_producto = $_POST['color_producto'];	
	$codigo_barras_producto = $_POST['codigo_barras_producto'];
	$talla_producto = $_POST['talla_producto'];
	$corrida_producto = $_POST['corrida_producto'];
	$precio_clave = $_POST['precio_clave'];
	$precio_contado = $_POST['precio_contado'];	
	$precio_pagos = $_POST['precio_pagos'];	
	$precio_oferta = $_POST['precio_oferta'];	
	$inventario_producto = $_POST['inventario_producto'];	

	$sql = "UPDATE `productos_terra` SET `libro_producto`='".$libro_producto."',`lista_producto`=".$lista_producto.",`pagina_producto`='".$pagina_producto."',`modelo_producto`='".$modelo_producto."',`marca_producto`='".$marca_producto."',`color_producto`='".$color_producto."',`codigo_barras_producto`='".$codigo_barras_producto."',`talla_producto`='".$talla_producto."',`corrida_producto`='".$corrida_producto."',`precio_clave`='".$precio_clave."',`precio_contado`='".$precio_contado."',`precio_pagos`='".$precio_pagos."',`precio_oferta`='".$precio_oferta."',`inventario_producto`=".$inventario_producto." WHERE id_producto=".$id_producto;

	if(mysqli_query($conexion,$sql)){
		echo '<script language="javascript">';
			echo 'alert("Datos actualizados con éxito");';
			echo 'window.location="consulta_productos_terra.php" ;';
			//echo 'window.location="acciones_terra.php?action=edita&id_producto='.$id_producto.'";';
		echo '</script>';
	}

 ?>