<?php 
	include("conexion.php");

	$kuerin = "Select * from `base_terra` INNER JOIN terra ON base_terra.id_terra = terra.id_terra";
	$res = mysqli_query($conexion,$kuerin);
	if ($res) {
	    while($producto = mysqli_fetch_array($res)){
	        $cod  = $producto['cod_barras'];
	        $libro_producto = $producto['libro'];
	        $listin = $producto['lista'];
	        $pagina_producto = $producto['pagina'];
	        $modelo_producto = $producto['modelo'];
	        $marca_producto = $producto['marca'];
	        $color_producto = $producto['color'];
	        $talla_producto = $producto['talla_cod_barras'];
	        $corrida_producto = $producto['corrida_MX'];
	        $precio_clave = $producto['clave2_MX'];
	        $precio_contado = $producto['contado_MX'];
	        $precio_pagos = $producto['pagos_MX'];
	        if ($listin == "TERRA") {
	        	$lista_producto = 1;
	        }elseif ($listin == "MULTIMARCA") {
	        	if ($marca_producto == "FLEXI" || $marca_producto == "QUIRELLI") {
	        		$lista_producto = 3;
	        	}else{
	        		$lista_producto = 2;
	        	}
	        }else{
				$lista_producto = 0;
			}
	        
	        $kueri = "Select * from `productos_terra` where codigo_barras_producto = '".$cod."'";
			$respuesta = mysqli_query($conexion,$kueri);
			if (mysqli_num_rows($respuesta) > 0){
				while($productin = mysqli_fetch_array($respuesta)){
					$id_producto = $productin['id_producto'];
					$inventario_total = $productin['inventario_inicial_producto']+1;
			        $inventario_actual = $productin['inventario_producto']+1;
			        $sql = "UPDATE `productos_terra` SET `libro_producto`='".$libro_producto."', `pagina_producto`='".$pagina_producto."', `inventario_inicial_producto`=".$inventario_total.",`inventario_producto`=".$inventario_actual.",`inventario_tmp_producto`=".$inventario_actual.",`precio_clave`='".$precio_clave."',`precio_contado`='".$precio_contado."',`precio_pagos`='".$precio_pagos."' WHERE id_producto =".$id_producto;
		         	if(mysqli_query($conexion,$sql)){
						echo '<script type="text/javascript">
			            console.log("Listones se actualizo.");
			           </script>';
					}	
		      	}
			}else{
				$sql = "INSERT INTO `productos_terra`(`libro_producto`, `lista_producto`, `pagina_producto`, `modelo_producto`, `marca_producto`, `color_producto`, `codigo_barras_producto`, `talla_producto`, `corrida_producto`, `precio_clave`, `precio_contado`, `precio_pagos`, `precio_oferta`, `inventario_inicial_producto`, `inventario_producto`, `inventario_tmp_producto`) VALUES ('".$libro_producto."', ".$lista_producto.", '".$pagina_producto."', '".$modelo_producto."', '".$marca_producto."', '".$color_producto."', '".$cod."', '".$talla_producto."', '".$corrida_producto."', '".$precio_clave."', '".$precio_contado."', '".$precio_pagos."','0',1,'1','1')";
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
	   $delete="TRUNCATE TABLE `base_terra`";
		mysqli_query($conexion,$delete);
		echo '<script language="javascript">';
			echo 'alert("Subido con Éxito.");';
			echo 'window.location="valida_inventario_terra.php";';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
			echo 'alert("Ocurrió un error al intentar agregar los datos.");';
			echo 'window.location="valida_inventario_terra.php";';
		echo '</script>';
	}
 ?>
