<?php 
	include("conexion.php");
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
	$id_empleado = $_POST['id_empleado'];	
	if (!is_numeric($precio_asociado)) {
		echo '<script language="javascript">';
			echo 'alert("El campo precio, solo puede contener números.");';
			echo 'window.location="agrega_productos_cklass.php";';
		echo '</script>';
	}else{

		if(!validaRepetidos($codigo_barras_producto)){
			$sql = "INSERT INTO `productos_cklass`(`modelo_producto`, `color_producto`, `talla_producto`, `precio_asociado`, `precio_contado`, `precio_credito`, `precio_oferta` ,`codigo_barras_producto`, `catalogo_producto`, `combo_id`, `inventario_inicial_producto`, `inventario_producto`, `inventario_tmp_producto`,`material_producto`,`tipo_producto`) VALUES ('".$modelo_producto."', '".$color_producto."', '".$talla_producto."', '".$precio_asociado."', '".$precio_contado."', '".$precio_credito."','0','".$codigo_barras_producto."', '".$catalogo_producto."', '".$combo_id."', ".$inventario_producto.", '".$inventario_producto."', '".$inventario_producto."','piel','zapato')";
				if(mysqli_query($conexion,$sql)){
					$mensaje = "El producto ".$modelo_producto." se ha registrado con éxito";
					echo '<script language="javascript">';
						echo 'alert("'.$mensaje.'");';
						echo 'window.location="agrega_productos_cklass.php";';
					echo '</script>';
				}else{
					echo '<script language="javascript">';
						echo 'alert("Ocurrió un error al intentar guardar los datos.");';
						echo 'window.location="agrega_productos_cklass.php";';
					echo '</script>';
				}
		}
	}

	//Función que valida que el dato a registrar, no exista uno con nombre muy similar.
	function validaRepetidos($codigo_barras_producto){
		include("conexion.php");
		$sql = "select * from productos_cklass where codigo_barras_producto='".$codigo_barras_producto."'";
		$requi = mysqli_query($conexion,$sql);
		$totalFilas=mysqli_num_rows($requi);
	    if($totalFilas>0){
	    	while ($reg=mysqli_fetch_array($requi)) {
	        	$nombre = $reg['modelo_producto'];
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