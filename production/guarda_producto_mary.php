<?php 
	include("conexion.php");
	$nombre_producto = $_POST['nombre_producto'];
	$codigo_barras_producto = $_POST['codigo_barras_producto'];
	$precio_producto = $_POST['precio_catalogo'];	
	$precio_afi_producto = $_POST['precio_compra'];	
	$inventario_producto = $_POST['inventario_producto'];
	$descripcion_producto = $_POST['descripcion_producto'];	
	$id_empleado = $_POST['id_empleado'];	
	if (!is_numeric($precio_producto)) {
		echo '<script language="javascript">';
			echo 'alert("El campo precio, solo puede contener números.");';
			echo 'window.location="agrega_productos_marykay.php";';
		echo '</script>';
	}else{

		if(!validaRepetidos($codigo_barras_producto)){
			$sql = "INSERT INTO `productos_marykay`(`nombre_producto`, `precio_catalogo`, `precio_compra`, `inventario_tmp_producto`, `inventario_producto`, `desc_producto`, `codigo_producto`) VALUES ('".$nombre_producto."', '".$precio_producto."', '".$precio_afi_producto."', 0, 0, '".$descripcion_producto."',  '".$codigo_barras_producto."')";
				if(mysqli_query($conexion,$sql)){
						$id_marykay = mysqli_insert_id($conexion);
						$kuerito = "INSERT INTO `base_marykay`(`id_marykay`, `inventario_mary`) VALUES (".$id_marykay.", ".$inventario_producto.")";
						if(mysqli_query($conexion,$kuerito)){
							$mensaje = "El producto ".$nombre_producto." se ha registrado con éxito";
							echo '<script language="javascript">';
								echo 'alert("'.$mensaje.'");';
								echo 'window.location="inventario_mary.php";';
							echo '</script>';
						}else{ 
							echo '<script language="javascript">';
							echo 'alert("Ocurrió un error al intentar guardar los datos.");';
							echo 'window.location="agrega_productos_mary.php";';
						echo '</script>';
						}	
					
				}else{
					echo '<script language="javascript">';
						echo 'alert("Ocurrió un error al intentar guardar los datos.");';
						echo 'window.location="agrega_productos_mary.php";';
					echo '</script>';
				}
		}
	}

	//Función que valida que el dato a registrar, no exista uno con nombre muy similar.
	function validaRepetidos($codigo_barras_producto){
		include("conexion.php");
		$sql = "select * from productos_marykay where codigo_producto='".$codigo_barras_producto."'";
		$requi = mysqli_query($conexion,$sql);
		$totalFilas=mysqli_num_rows($requi);
	    if($totalFilas>0){
	    	while ($reg=mysqli_fetch_array($requi)) {
	        	$nombre = $reg['nombre_producto'];
	        	$mensaje =  "El producto se existe y se llama ".$nombre;
	        	echo '<script language="javascript">';
					echo 'alert("'.$mensaje.'");';
					echo 'window.history.back();';
				echo '</script>';	        	
	        	return true;
	        }
	    }else{
	    	return false;
	    }
	}
 ?>