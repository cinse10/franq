<?php 
	include("conexion.php");
	$pagina_vf = $_POST['pagina_vf'];
	$modelo_vf = $_POST['modelo_vf'];
	$descripcion_vf = $_POST['descripcion_vf'];
	$talla_vf = $_POST['talla_vf'];
	$color_vf = $_POST['color_vf'];	
	$precio_catalogo = $_POST['precio_catalogo'];	
	$precio_afiliado = $_POST['precio_afiliado'];	
	$inventario_producto = $_POST['inventario_producto'];	
	$id_empleado = $_POST['id_empleado'];
	$nombre_ml = $_POST['nombre'];	
	$codigo_barras_producto = $_POST['codigo_barras_producto'];
	if (!is_numeric($precio_catalogo)) {
		echo '<script language="javascript">';
			echo 'alert("El campo precio, solo puede contener números.");';
			echo 'window.location="agrega_productos_vicky.php";';
		echo '</script>';
	}else{

		if(!validaRepetidos($codigo_barras_producto)){
			$sql= "INSERT INTO `vicky_form`(`cod_barras_vf`, `pagina_vf`, `pvp1_vf`, `pvp4_vf`, `modelo_vf`, `descripcion_vf`, `talla_vf`, `color_vf`) VALUES ('".$codigo_barras_producto."','".$pagina_vf."','".$precio_catalogo."','".$precio_afiliado."','".$modelo_vf."','".$descripcion_vf."','".$talla_vf."', '".$color_vf."')";
			$ejucatodo = mysqli_query($conexion,$sql);
			if($ejucatodo == 1){
				$sql = "INSERT INTO `productos_vicky`(`codigo_barras_producto`,`codigo_sat`, `pagina_vf`, `precio_catalogo`, `precio_afiliado`, `modelo_vf`, `descripcion_vf`, `talla_vf`, `color_vf`, `inventario_inicial_producto`, `inventario_producto`,`nombre`) VALUES ('".$codigo_barras_producto."', '0', '".$pagina_vf."', '".$precio_catalogo."', '".$precio_afiliado."', '".$modelo_vf."', '".$descripcion_vf."', '".$talla_vf."', '".$color_vf."', ".$inventario_producto.", '".$inventario_producto."','')";

			}
			if(mysqli_query($conexion,$sql)){
					
					$mensaje = "El producto ".$descripcion_vf." se ha registrado con éxito";
					echo '<script language="javascript">';
						echo 'alert("'.$mensaje.'");';
						echo 'window.location="agrega_productos_vicky.php";';
					echo '</script>';
				}else{
					echo '<script language="javascript">';
						echo 'alert("Ocurrió un error al intentar guardar los datos.");';
						echo 'window.location="agrega_productos_vicky.php";';
					echo '</script>';
				}
		}
	}

	//Función que valida que el dato a registrar, no exista uno con nombre muy similar.
	function validaRepetidos($codigo_barras_producto){
		include("conexion.php");
		$sql = "select * from productos_vicky where codigo_barras_producto='".$codigo_barras_producto."'";
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