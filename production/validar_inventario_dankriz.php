<?php 
	include("conexion.php");

	$kuerin = "Select * from `base_dankriz` INNER JOIN dankriz ON base_dankriz.id_dankriz = dankriz.id_dankriz";
	$res = mysqli_query($conexion,$kuerin);
	if ($res) {
	    while($producto = mysqli_fetch_array($res)){
	        $cod  = $producto['codigo_barras_producto'];
	        $modelo_producto = $producto['modelo_ck'];
	        $color_producto = $producto['color'];
	        $talla_producto = $producto['talla'];
	        $precio_clave = $producto['precio_clave'];
	        $precio_afiliado = $producto['precio_afiliado'];
	        $precio_publico = $producto['precio_publico'];
	        $catalogo_producto = $producto['catalogo_producto'];
	        $combo_id = $producto['combo_id'];
			$marca = "DANKRIZ";
	        $kueri = "Select * from `productos_dankriz` where codigo_barras_producto = '".$cod."'";
			$respuesta = mysqli_query($conexion,$kueri);
			if (mysqli_num_rows($respuesta) > 0){
				while($productin = mysqli_fetch_array($respuesta)){
					$id_producto = $productin['id_producto'];
					$inventario_total = $productin['inventario_inicial_producto']+1;
			        $inventario_actual = $productin['inventario_producto']+1;
			        $sql = "UPDATE `productos_dankriz` SET `inventario_inicial_producto`=".$inventario_total.",`inventario_producto`=".$inventario_actual.",`inventario_tmp_producto`=".$inventario_actual.",`precio_clave`='".$precio_clave."',`precio_afiliado`='".$precio_afiliado."',`precio_publico`='".$precio_publico."' WHERE id_producto =".$id_producto;
		         	if(mysqli_query($conexion,$sql)){
						echo '<script type="text/javascript">
			            console.log("Listones.");
			           </script>';
					}	
		      	}
			}else{
				$sql = "INSERT INTO `productos_dankriz`(`modelo_producto`, `color_producto`, `talla_producto`, `precio_clave`, `precio_afiliado`, `precio_publico`, `codigo_barras_producto`, `catalogo_producto`, `combo_id`,`marca`, `inventario_inicial_producto`, `inventario_producto`, `inventario_tmp_producto`) VALUES ('".$modelo_producto."', '".$color_producto."', '".$talla_producto."', '".$precio_clave."', '".$precio_afiliado."', '".$precio_publico."', '".$cod."', '".$catalogo_producto."', '".$combo_id."','".$marca."', 1, 1,1)";
	         	if(mysqli_query($conexion,$sql)){
					echo '<script type="text/javascript">
		            console.log("Listones.");
		           </script>';
				}else{
					echo '<script type="text/javascript">
	            console.log("No se guardo.");
	           </script>';
				}	
				
			}
	    }
	   $delete="TRUNCATE TABLE `base_dankriz`";
		mysqli_query($conexion,$delete);
		echo '<script language="javascript">';
			echo 'alert("Subido con Éxito.");';
			echo 'window.location="valida_inventario_dankriz.php";';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
			echo 'alert("Ocurrió un error al intentar agregar los datos.");';
			echo 'window.location="valida_inventario_dankriz.php";';
		echo '</script>';
	}
 ?>
