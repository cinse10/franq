<?php 
	include("conexion.php");

	$kuerin = "Select * from `base_intima` INNER JOIN intima ON base_intima.id_intima = intima.id_intima";
	$res = mysqli_query($conexion,$kuerin);
	if ($res) {
	    while($producto = mysqli_fetch_array($res)){
	        $cod  = $producto['codigo_intima'];
	        $decripcion = $producto['descripcion_intima'];
	        $precio_pub = $producto['precio_publico'];
	        $precio_afi = $producto['precio_mayoreo'];
	        $cod_barras = $producto['cod_barras'];
	        
	       
	        $kueri = "Select * from `productos` where codigo_barras_producto = '".$cod."'";
			$respuesta = mysqli_query($conexion,$kueri);
			if (mysqli_num_rows($respuesta) > 0){
				while($productin = mysqli_fetch_array($respuesta)){
					$id_producto = $productin['id_producto'];
					$inventario_total = $productin['inventario_inicial_producto']+1;
			        $inventario_actual = $productin['inventario_producto']+1;
			        $sql = "UPDATE `productos` SET `inventario_inicial_producto`=".$inventario_total.",`inventario_producto`=".$inventario_actual.",`inventario_tmp_producto`=".$inventario_actual.",`precio_producto`='".$precio_pub."',`precio_afi_producto`='".$precio_afi."'  WHERE id_producto =".$id_producto;
                           
		         	if(mysqli_query($conexion,$sql)){
						echo '<script type="text/javascript">
			            console.log("Listones.");
			           </script>';
					}	
		      	}
			}else{
				$sql = "INSERT INTO `productos`(`nombre_producto`, `precio_producto`, `precio_afi_producto`, `codigo_barras_producto`,`codigo_sat`, `inventario_inicial_producto`, `inventario_producto`, `inventario_tmp_producto`, `descripcion_producto`, `id_empleado`, `activo`, `codigo_extra`) VALUES ('".$decripcion."', ".$precio_pub.", '".$precio_afi."', '".$cod."',0, 1, 1, 1, '".$decripcion."', 3, 1, '".$cod_barras."')";
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
	   	$delete="TRUNCATE TABLE `base_intima`";
		mysqli_query($conexion,$delete);
		echo '<script language="javascript">';
			echo 'alert("Subido con Éxito.");';
			echo 'window.location="valida_inventario_intima.php";';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
			echo 'alert("Ocurrió un error al intentar agregar los datos.");';
			echo 'window.location="valida_inventario_intima.php";';
		echo '</script>';
	}
 ?>
