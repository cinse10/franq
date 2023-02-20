<?php 
	include("conexion.php");
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
	$inventario_producto = $_POST['inventario_producto'];	
	$id_empleado = $_POST['id_empleado'];	
	if (!is_numeric($precio_clave)) {
		echo '<script language="javascript">';
			echo 'alert("El campo precio, solo puede contener números.");';
			echo 'window.location="agrega_productos_terra.php";';
		echo '</script>';
	}else{

		if(!validaRepetidos($codigo_barras_producto)){
			$sql = "INSERT INTO `productos_terra`(`libro_producto`, `lista_producto`, `pagina_producto`, `modelo_producto`, `marca_producto`, `color_producto`, `codigo_barras_producto`, `talla_producto`, `corrida_producto`, `precio_clave`, `precio_contado`, `precio_pagos`,`precio_oferta`, `inventario_inicial_producto`, `inventario_producto`, `inventario_tmp_producto`) VALUES ('".$libro_producto."', '".$lista_producto."', '".$pagina_producto."', '".$modelo_producto."', '".$marca_producto."', '".$color_producto."', '".$codigo_barras_producto."', '".$talla_producto."', '".$corrida_producto."', '".$precio_clave."', '".$precio_contado."', '".$precio_pagos."','0' ,".$inventario_producto.", '".$inventario_producto."', '".$inventario_producto."')";
				if(mysqli_query($conexion,$sql)){
					$mensaje = "El producto ".$modelo_producto." se ha registrado con éxito";
					echo '<script language="javascript">';
						echo 'alert("'.$mensaje.'");';
						echo 'window.location="agrega_productos_terra.php";';
					echo '</script>';
				}else{
					echo '<script language="javascript">';
						echo 'alert("Ocurrió un error al intentar guardar los datos'.$sql.'.");';
						echo 'window.location="agrega_productos_terra.php";';
					echo '</script>';
				}
		}
	}

	//Función que valida que el dato a registrar, no exista uno con nombre muy similar.
	function validaRepetidos($codigo_barras_producto){
		include("conexion.php");
		$sql = "select * from productos_terra where codigo_barras_producto='".$codigo_barras_producto."'";
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