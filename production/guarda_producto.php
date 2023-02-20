<?php 
	include("conexion.php");
	$nombre_producto = $_POST['nombre_producto'];
	$precio_producto = $_POST['precio_producto'];	
	$precio_afi_producto = $_POST['precio_afi_producto'];	
	$descripcion_producto = $_POST['descripcion_producto'];	
	$id_empleado = $_POST['id_empleado'];	
	$codigo_barras_producto = $_POST['codigo_barras_producto'];
	$codigo_extra = $_POST['codigo_extra'];
	if (!is_numeric($precio_producto)) {
		echo '<script language="javascript">';
			echo 'alert("El campo precio, solo puede contener números.");';
			echo 'window.location="agrega_productos.php";';
		echo '</script>';
	}else{

		if(!validaRepetidos($codigo_barras_producto)){
		
				$sql = "INSERT INTO `productos`(`nombre_producto`, `precio_producto`, `precio_afi_producto`, `inventario_inicial_producto`, `inventario_producto`, `descripcion_producto`, `id_empleado`, `codigo_barras_producto`, `codigo_extra`,`codigo_sat`) VALUES ('".$nombre_producto."', '".$precio_producto."', '".$precio_afi_producto."', 0, 0, '".$descripcion_producto."', ".$id_empleado.", '".$codigo_barras_producto."', '".$codigo_extra."','0')";
			
				if(mysqli_query($conexion,$sql)){
					$sqlint = "INSERT INTO `intima`(`descripcion_intima`, `precio_publico`, `precio_mayoreo`, `codigo_intima`, `cod_barras`) VALUES ('".$nombre_producto."', '".$precio_producto."', '".$precio_afi_producto."', '".$codigo_barras_producto."', '".$codigo_extra."')";
					
						if(mysqli_query($conexion,$sqlint)){
							$mensaje = "El producto ".$nombre_producto." se ha registrado con éxito";
							echo '<script language="javascript">';
								echo 'alert("'.$mensaje.'");';
								echo 'window.location="inventario_intima.php";';
							echo '</script>';
						}else{
							echo '<script language="javascript">';
							echo 'alert("Ocurrió un error al intentar guardar los datos.");';
							echo 'window.location="agrega_productos.php";';
						echo '</script>';
						}	
					}else{
					echo '<script language="javascript">';
						echo 'alert("Ocurrió un error al intentar guardar los datos intima.");';
						echo 'window.location="agrega_productos.php";';
					echo '</script>';
					}
					
				
		}
	}

	//Función que valida que el dato a registrar, no exista uno con nombre muy similar.
	function validaRepetidos($codigo_barras_producto){
		include("conexion.php");
		$sql = "select * from productos where codigo_barras_producto='".$codigo_barras_producto."'";
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