<?php 
	include("conexion.php");
	$pagina = $_POST['pagina'];
	$modelo = $_POST['modelo'];
	$descripcion = $_POST['descripcion'];
	$talla = $_POST['talla'];
	$color = $_POST['color'];	
	$precio_catalogo = $_POST['precio_catalogo'];	
	$precio_afiliado = $_POST['precio_afiliado'];	
	$inventario_producto = $_POST['inventario_producto'];	
	$id_empleado = $_POST['id_empleado'];
	$nombre_ml = $_POST['nombre'];	
	$codigo_barras_producto = $_POST['codigo_barras_producto'];
	if (!is_numeric($precio_catalogo)) {
		echo '<script language="javascript">';
			echo 'alert("El campo precio, solo puede contener números.");';
			echo 'window.location="agrega_productos_berlei.php";';
		echo '</script>';
	}else{

		if(!validaRepetidos($codigo_barras_producto)){
			$sql= "INSERT INTO `berlei`(`cod_barras`, `precio_afiliado`, `precio_catalogo`, `modelo`, `descripcion`, `talla`, `color`) VALUES ('".$codigo_barras_producto."','".$precio_catalogo."','".$precio_afiliado."','".$modelo."','".$descripcion."','".$talla."', '".$color."')";
			$ejucatodo = mysqli_query($conexion,$sql);
			if($ejucatodo == 1){
				$sql = "INSERT INTO `productos_berlei`(`codigo_barras_producto`, `precio_catalogo`, `precio_afiliado`, `modelo`, `descripcion`, `talla`, `color`, `inventario_inicial_producto`, `inventario_producto`,`nombre`) VALUES ('".$codigo_barras_producto."', '".$precio_catalogo."', '".$precio_afiliado."', '".$modelo."', '".$descripcion."', '".$talla."', '".$color."', ".$inventario_producto.", '".$inventario_producto."','')";

			}
			if(mysqli_query($conexion,$sql)){
					
					$mensaje = "El producto ".$descripcion." se ha registrado con éxito";
					echo '<script language="javascript">';
						echo 'alert("'.$mensaje.'");';
						echo 'window.location="agrega_productos_berlei.php";';
					echo '</script>';
				}else{
					echo '<script language="javascript">';
						echo 'alert("Ocurrió un error al intentar guardar los datos.");';
						echo 'window.location="agrega_productos_berlei.php";';
					echo '</script>';
				}
		}
	}

	//Función que valida que el dato a registrar, no exista uno con nombre muy similar.
	function validaRepetidos($codigo_barras_producto){
		include("conexion.php");
		$sql = "select * from productos_berlei where codigo_barras_producto='".$codigo_barras_producto."'";
		$requi = mysqli_query($conexion,$sql);
		$totalFilas=mysqli_num_rows($requi);
	    if($totalFilas>0){
	    	while ($reg=mysqli_fetch_array($requi)) {
	        	$nombre = $reg['descripcion'];
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