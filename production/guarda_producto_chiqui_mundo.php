<?php 
	include("conexion.php");
	$nombre_producto = $_POST['nombre_producto'];
	$codigo_producto = $_POST['codigo_producto'];
	$descripcion = $_POST['descripcion'];
	$precio_empleado = $_POST['precio_empleado'];
	$precio_afiliado = $_POST['precio_afiliado'];
	$precio_publico = $_POST['precio_publico'];
	$codigo_barras_producto = $_POST['codigo_barras'];
	//$catalogo_producto = $_POST['catalogo_producto'];
	$combo_id = $_POST['combo_id'];
	$inventario_producto = $_POST['inventario_producto'];	
	$id_empleado = $_POST['id_empleado'];	
	if (!is_numeric($precio_afiliado)) {
		echo '<script language="javascript">';
			echo 'alert("El campo precio, solo puede contener números.");';
			echo 'window.location="agrega_productos_chiqui_mundo.php";';
		echo '</script>';
	}else{

		if(!validaRepetidos($codigo_barras_producto)){ 
			$sql = "INSERT INTO `productos_chiqui`(`nombre_producto`, `codigo_producto`, `descripcion`, `precio_empleado`, `precio_afiliado`, `precio_publico`, `codigo_barras`, `inventario_inicial_producto`, `inventario_producto`, `inventario_tmp_producto`) VALUES ('".$nombre_producto."', '".$codigo_producto."', '".$descripcion."', '".$precio_empleado."', '".$precio_afiliado."', '".$precio_publico."', '".$codigo_barras_producto."', ".$inventario_producto.", '".$inventario_producto."', '".$inventario_producto."')";
				if(mysqli_query($conexion,$sql)){
					$mensaje = "El producto ".$nombre_producto." se ha registrado con éxito";
					echo '<script language="javascript">';
						echo 'alert("'.$mensaje.'");';
						echo 'window.location="agrega_productos_chiqui_mundo.php";';
					echo '</script>';
				}else{
					echo '<script language="javascript">';
						echo 'alert("Ocurrió un error al intentar guardar los datos.");';
						echo 'window.location="agrega_productos_chiqui_mundo.php";';
					echo '</script>';
				}
		}
	}

	//Función que valida que el dato a registrar, no exista uno con nombre muy similar.
	function validaRepetidos($codigo_barras_producto){
		include("conexion.php");
		$sql = "select * from productos_chiqui where codigo_barras_producto='".$codigo_barras_producto."'";
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