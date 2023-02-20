<?php 
	include("conexion.php");
	$catalogo_producto = $_POST['catalogo_producto'];
	$nombre_producto = $_POST['nombre_producto'];
	$modelo_producto = $_POST['modelo_producto'];
	$precio_producto = $_POST['precio_producto'];
	$id_empleado = $_POST['id_empleado'];	
	

		
	$sql = "INSERT INTO `productos_nice`(`catalogo_producto`, `nombre_producto`, `modelo_producto`, `precio_producto`, `inventario_inicial_producto`, `inventario_producto`) VALUES ('".$catalogo_producto."', '".$nombre_producto."', '".$modelo_producto."', '".$precio_producto."', 0, 0)";
		if(mysqli_query($conexion,$sql)){
			$id_nice = mysqli_insert_id($conexion);
			$kuerito = "INSERT INTO `base_nice`(`id_nice`) VALUES (".$id_nice.")";
			if(mysqli_query($conexion,$kuerito)){
				$mensaje = "El producto ".$nombre_producto." se ha registrado con éxito";
				echo '<script language="javascript">';
					echo 'alert("'.$mensaje.'");';
					echo 'window.location="inventario_nice.php";';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
				echo 'alert("Ocurrió un error al intentar guardar los datos.");';
				echo 'window.location="agrega_productos_nice.php";';
			echo '</script>';
			}			
		}else{
			echo '<script language="javascript">';
				echo 'alert("Ocurrió un error al intentar guardar los datos.");';
				echo 'window.location="agrega_productos_nice.php";';
			echo '</script>';
		}
		
	

	
 ?>