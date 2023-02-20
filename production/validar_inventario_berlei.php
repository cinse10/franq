<?php 
	include("conexion.php");

	$kuerin = "Select * from `base_berlei` INNER JOIN berlei ON base_berlei.id_berlei = berlei.id_berlei";
	$res = mysqli_query($conexion,$kuerin);
	if ($res) {
	    while($producto = mysqli_fetch_array($res)){
	        $cod  = $producto['cod_barras'];
			$nombre_ml = $producto['nombre'];
	        $precio_catalogo = $producto['precio_catalogo'];
	        $precio_afiliado = $producto['precio_afiliado'];
	        $modelo = $producto['modelo'];
	        $descripcion = $producto['descripcion'];
	        $talla = $producto['talla'];
	        $color = $producto['color'];
	        $kueri = "Select * from `productos_berlei` where codigo_barras_producto = '".$cod."'";
			$respuesta = mysqli_query($conexion,$kueri);
			if (mysqli_num_rows($respuesta) > 0){
				while($productin = mysqli_fetch_array($respuesta)){
					$id_producto = $productin['id_producto'];
					$inventario_total = $productin['inventario_inicial_producto']+1;
			        $inventario_actual = $productin['inventario_producto']+1;
			        $sql = "UPDATE `productos_berlei` SET `inventario_inicial_producto`=".$inventario_total.",`inventario_producto`=".$inventario_actual.",`inventario_tmp_producto`=".$inventario_actual.",`precio_catalogo`='".$precio_catalogo."',`precio_afiliado`='".$precio_afiliado."' WHERE id_producto =".$id_producto;
		         	if(mysqli_query($conexion,$sql)){
						echo '<script type="text/javascript">
			            console.log("Listones.");
			           </script>';
					}	
		      	}
			}else{
				$sql = "INSERT INTO `productos_berlei`(`nombre`,`codigo_barras_producto`, `precio_afiliado`, `precio_catalogo`, `modelo`, `descripcion`, `talla`, `color`, `inventario_inicial_producto`, `inventario_producto`, `inventario_tmp_producto`,`tipo_producto`,`descripcion_linio`,`detalles_linio`,`altura`,`anchura`,`longitud`,`peso`,`cod_linio`,`sub_linio`,`imagen_uno`,`imagen_dos`,`imagen_tres`,`ml_id`,`ml_link`) VALUES ('BERLEI','".$cod."', '".$precio_afiliado."', '".$precio_catalogo."', '".$modelo."', '".$descripcion."', '".$talla."', '".$color."',1, 1, 1,'NULL','NULL','NULL',1,1,1,1,'NULL',1,'NULL','NULL','NULL','NULL','NULL')";
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
	    $delete="TRUNCATE TABLE `base_berlei`";
		mysqli_query($conexion,$delete);
		echo '<script language="javascript">';
			echo 'alert("Subido con Éxito.");';
			echo 'window.location="valida_inventario_berlei.php";';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
			echo 'alert("Ocurrió un error al intentar agregar los datos.");';
			echo 'window.location="valida_inventario_berlei.php";';
		echo '</script>';
	}
 ?>
