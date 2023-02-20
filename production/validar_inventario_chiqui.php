<?php 
	include("conexion.php");

	$kuerin = "Select * from `base_chiqui` INNER JOIN chiqui_mundo ON base_chiqui.id_chiqui = chiqui_mundo.id_chiqui";
	$res = mysqli_query($conexion,$kuerin);
	if ($res) {
	    while($producto = mysqli_fetch_array($res)){
	        $cod  = $producto['codigo_barras_producto'];
	        $nombre_producto = $producto['nombre_producto'];
	        $codigo_producto = $producto['codigo_producto'];
	        $descripcion = $producto['descripcion'];
	        $precio_empleado = $producto['precio_empleado'];
	        $precio_afiliado = $producto['precio_afiliado'];
	        $precio_publico = $producto['precio_publico'];
	        $combo_id = $producto['combo_id'];
	       
	        $kueri = "Select * from `productos_chiqui` where codigo_barras = '".$cod."'";
			$respuesta = mysqli_query($conexion,$kueri);
			if (mysqli_num_rows($respuesta) > 0){
				while($productin = mysqli_fetch_array($respuesta)){
					$id_producto = $productin['id_producto'];
					$inventario_total = $productin['inventario_inicial_producto']+1;
			        $inventario_actual = $productin['inventario_producto']+1;
			        $sql = "UPDATE `productos_chiqui` SET `inventario_inicial_producto`=".$inventario_total.",`inventario_producto`=".$inventario_actual.",`inventario_tmp_producto`=".$inventario_actual.",`precio_empleado`='".$precio_empleado."',`precio_afiliado`='".$precio_afiliado."',`precio_publico`='".$precio_publico."' WHERE id_producto =".$id_producto;
		         	if(mysqli_query($conexion,$sql)){
						echo '<script type="text/javascript">
			            console.log("Listones.");
			           </script>';
					}	
		      	}
			}else{ 
				$sql = "INSERT INTO `productos_chiqui`(`nombre_producto`, `codigo_barras`, `descripcion`, `precio_empleado`, `precio_afiliado`, `precio_publico`, `codigo_producto`, `inventario_inicial_producto`, `inventario_producto`, `inventario_tmp_producto`) VALUES ('".$nombre_producto."', '".$cod."', '".$descripcion."', '".$precio_empleado."', '".$precio_afiliado."', '".$precio_publico."', '".$codigo_producto."', 1,1,1)";
	         	if(mysqli_query($conexion,$sql)){
					echo '<script type="text/javascript">
		            console.log("Listones.");
		           </script>';
				}	
				echo '<script type="text/javascript">
	            console.log("Nuevo en Inventario.");
	           </script>';
			}
	    }
	   $delete="TRUNCATE TABLE `base_chiqui`";
		mysqli_query($conexion,$delete);
		echo '<script language="javascript">';
			echo 'alert("Subido con Éxito.");';
			echo 'window.location="valida_inventario_chiqui_mundo.php";';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
			echo 'alert("Ocurrió un error al intentar agregar los datos.");';
			echo 'window.location="valida_inventario_chiqui_mundo.php";';
		echo '</script>';
	}
 ?>
