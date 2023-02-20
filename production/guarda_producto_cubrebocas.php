<?php 
	include("conexion.php");
	
	$nombre = $_POST['nombre'];	
	$descripcion = $_POST['descripcion'];
	$talla = $_POST['talla'];
	$color = $_POST['color'];	
	$precio_catalogo = $_POST['precio_catalogo'];	
	$precio_afiliado = $_POST['precio_afiliado'];	
	$inventario_producto = $_POST['inventario_producto'];	
	$id_empleado = $_POST['id_empleado'];
	$codigo_barras_producto = $_POST['codigo_barras_producto'];
	if (!is_numeric($precio_catalogo)) {
		echo '<script language="javascript">';
			echo 'alert("El campo precio, solo puede contener números.");';
			echo 'window.location="agrega_productos_cubrebocas.php";';
		echo '</script>';
	}else{

		if(!validaRepetidos($codigo_barras_producto)){
			$sql = "INSERT INTO `cubrebocas`(`nombre`,`codigo_barras_producto`, `precio_catalogo`, `precio_afiliado`, `descripcion`, `talla`, `color`, `inventario_inicial_producto`, `inventario_producto`,`inventario_tmp_producto`) VALUES ('".$nombre."','".$codigo_barras_producto."', '".$precio_catalogo."', '".$precio_afiliado."', '".$descripcion."', '".$talla."', '".$color."', ".$inventario_producto.", '".$inventario_producto."','".$inventario_producto."')";
				if(mysqli_query($conexion,$sql)){
					$mensaje = "El producto ".$descripcion." se ha registrado con éxito";
					echo '<script language="javascript">';
						echo 'alert("'.$mensaje.'");';
						echo 'window.location="agrega_productos_cubrebocas.php";';
					echo '</script>';
				}else{
					echo '<script language="javascript">';
						echo 'alert("Ocurrió un error al intentar guardar los datos.");';
						echo 'window.location="agrega_productos_cubrebocas.php";';
					echo '</script>';
				}
		}
	}

	//Función que valida que el dato a registrar, no exista uno con nombre muy similar.
	function validaRepetidos($codigo_barras_producto){
		include("conexion.php");
		$sql = "select * cubrebocas where codigo_barras_producto='".$codigo_barras_producto."'";
		$requi = mysqli_query($conexion,$sql);
		$totalFilas=mysqli_num_rows($requi);
	    if($totalFilas>0){
	    	while ($reg=mysqli_fetch_array($requi)) {
	        	$nombre = $reg['descripcion_vf'];
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