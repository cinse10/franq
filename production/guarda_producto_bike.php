 <?php 
	include("conexion.php");
	$uno = $_FILES['uno']['name'];
	$guardado_uno = $_FILES['uno']['tmp_name'];

	$dos = $_FILES['dos']['name'];
	$guardado_dos = $_FILES['dos']['tmp_name'];

	$tres = $_FILES['tres']['name'];
	$guardado_tres = $_FILES['tres']['tmp_name'];

	$nombre_producto = $_POST['nombre_producto'];
	$rodada_producto = $_POST['rodada_producto'];
	$color_producto = $_POST['color_producto'];
	$precio_compra = $_POST['precio_compra'];	
	$precio_publico = $_POST['precio_publico'];	
	$precio_publico_desc = $_POST['precio_publico_desc'];	
	$codigo_barras_producto = $_POST['codigo_barras_producto'];
	$co_gen = $_POST['co_gen'];
	$co_sat = $_POST['co_sat'];
	$tipo_bike = $_POST['tipo_bike'];
	$estilo_bike = $_POST['estilo_bike'];
	$tipo_accesorio = $_POST['tipo_accesorio'];
	$tipo_triciclo = $_POST['tipo_triciclo'];
	$modelo_bike = $_POST['modelo_bike'];
	$genero_bike = $_POST['genero_bike'];
	$velocidades_bike = $_POST['velocidades_bike'];
	$freno_delantero = $_POST['freno_delantero'];
	$freno_trasero = $_POST['freno_trasero'];
	$marca_bike = $_POST['marca_bike'];
	$material_bike = $_POST['material_bike'];
	$montaje_bike = $_POST['montaje_bike'];
	$personaje_bike = $_POST['personaje_bike'];
	$ruedas = $_POST['ruedas'];
	$edad_bike = $_POST['edad_bike'];
	$id_empleado = $_POST['id_empleado'];
	$inventario = $_POST['inventario'];
	$inventarioIn = $_POST['inventario'];
	$inventariotmp = $_POST['inventario'];

	if ($tipo_accesorio == 3) { 
		$precio_compra = round($precio_compra*1.16);
		$precio_publico = ceil($precio_compra*1.34)*1.16;
		$precio_publico_desc = ceil($precio_compra*1.34)*1.16;
	}


	if (!is_numeric($precio_publico)) {
		echo '<script language="javascript">';
			echo 'alert("El campo precio, solo puede contener números.");';
			echo 'window.location="agrega_productos_bike.php";';
		echo '</script>';
	}else{
		if ($_FILES['uno']['tmp_name']!=NULL | $_FILES['dos']['tmp_name']!=NULL | $_FILES['tres']['tmp_name']!=NULL) {
			if (!file_exists('bikes')) {
				mkdir('bikes',0777,true);

				$sql = "INSERT INTO `productos_bike`(`inventario_inicial_producto`, `inventario_producto`, `nombre_producto`, `rodada_producto`, `color_producto`, `precio_compra`, `precio_publico`, `precio_publico_desc`, `cod_barras_bike`, `co_generico`,`co_sat`, `tipo_bike`, `modelo_bike`, `marca_bike`, `material_bike`, `edad_bike`, `estilo_bike`, `tipo_accesorio`, `tipo_triciclo`, `genero_bike`, `velocidades_bike`, `freno_delantero`, `freno_trasero`, `montaje_bike`, `personaje_bike`, `ruedas` ) VALUES ( '".$inventarioIn."','".$inventario."', '".$inventariotmp."','".$nombre_producto."', '".$rodada_producto."', '".$color_producto."', '".$precio_compra."', ".$precio_publico.", '".$precio_publico_desc."', '".$codigo_barras_producto."', '".$co_gen."','".$co_sat."', ".$tipo_bike.", '".$modelo_bike."', '".$marca_bike."', '".$material_bike."', '".$edad_bike."', '".$estilo_bike."', '".$tipo_accesorio."', '".$tipo_triciclo."', '".$genero_bike."', '".$velocidades_bike."', '".$freno_delantero."', '".$freno_trasero."', '".$montaje_bike."', '".$personaje_bike."', '".$ruedas."' )";
					if(mysqli_query($conexion,$sql)){
						$id_bike = mysqli_insert_id($conexion);
						$nombre_uno = $id_bike."-uno.jpg";
						$nombre_dos = $id_bike."-dos.jpg";
						$nombre_tres = $id_bike."-tres.jpg";
						$act = "UPDATE `productos_bike` SET `imagen_uno`='".$nombre_uno."',`imagen_dos`='".$nombre_dos."',`imagen_tres`='".$nombre_tres."' WHERE `id_producto`=".$id_bike;
						if(mysqli_query($conexion,$act)){
							if (file_exists('bikes')) {
								if (move_uploaded_file($guardado_uno, 'bikes/'.$nombre_uno)) {
									if (move_uploaded_file($guardado_dos, 'bikes/'.$nombre_dos)) {
										if (move_uploaded_file($guardado_tres, 'bikes/'.$nombre_tres)) {
											$mensaje = "El producto ".$nombre_producto." se ha registrado con éxito";
												echo '<script language="javascript">';
													echo 'alert("'.$mensaje.'");';
													echo 'window.location="inventario_bike.php";';
												echo '</script>';
											//$kuerito = "INSERT INTO `base_bike`(`id_bike`) VALUES (".$id_bike.")";
											/*if(mysqli_query($conexion,$kuerito)){
												$mensaje = "El producto ".$nombre_producto." se ha registrado con éxito";
												echo '<script language="javascript">';
													echo 'alert("'.$mensaje.'");';
													echo 'window.location="inventario_bike.php";';
												echo '</script>';
											}else{
												echo '<script language="javascript">';
												echo 'alert("Ocurrió un error al intentar guardar los datos.");';
												echo 'window.location="agrega_productos.php";';
											echo '</script>';
											}	*/	
										}else{
											echo "ERROR";									
										}
									}else{
										echo "ERROR";
									}
								}else{
									echo "ERROR";							
								}
							}	
						}else{
							echo '<script language="javascript">';
								echo 'alert("Ocurrió un error al intentar guardar las imagenes.");';
								echo 'window.location="consulta_productos_bike.php";';
							echo '</script>';
						}					
					}else{
						echo '<script language="javascript">';
							echo 'alert("Ocurrió un error al intentar guardar los datos.");';
							echo 'window.location="agrega_productos.php";';
						echo '</script>';
					}
			}else{
				$sql = "INSERT INTO `productos_bike`(`inventario_inicial_producto`, `inventario_producto`,  `inventario_tmp_producto`, `nombre_producto`, `rodada_producto`, `color_producto`, `precio_compra`, `precio_publico`, `precio_publico_desc`, `cod_barras_bike`, `co_generico`,`co_sat`, `tipo_bike`, `modelo_bike`, `marca_bike`, `material_bike`, `edad_bike`, `estilo_bike`, `tipo_accesorio`, `tipo_triciclo`, `genero_bike`, `velocidades_bike`, `freno_delantero`, `freno_trasero`, `montaje_bike`, `personaje_bike`, `ruedas` ) VALUES ( '".$inventarioIn."', '".$inventario."', '".$inventariotmp."', '".$nombre_producto."', '".$rodada_producto."', '".$color_producto."', '".$precio_compra."', ".$precio_publico.", '".$precio_publico_desc."', '".$codigo_barras_producto."', '".$co_gen."','".$co_sat."', ".$tipo_bike.", '".$modelo_bike."', '".$marca_bike."', '".$material_bike."', '".$edad_bike."', '".$estilo_bike."', '".$tipo_accesorio."', '".$tipo_triciclo."', '".$genero_bike."', '".$velocidades_bike."', '".$freno_delantero."', '".$freno_trasero."', '".$montaje_bike."', '".$personaje_bike."', '".$ruedas."' )";
					if(mysqli_query($conexion,$sql)){
						$id_bike = mysqli_insert_id($conexion);
						$nombre_uno = $id_bike."-uno";
						$nombre_dos = $id_bike."-dos";
						$nombre_tres = $id_bike."-tres";
						$act = "UPDATE `productos_bike` SET `imagen_uno`='".$nombre_uno."',`imagen_dos`='".$nombre_dos."',`imagen_tres`='".$nombre_tres."' WHERE `id_producto`=".$id_bike;
						if(mysqli_query($conexion,$act)){
							if (file_exists('bikes')) {
								if (move_uploaded_file($guardado_uno, 'bikes/'.$nombre_uno)) {
									if (move_uploaded_file($guardado_dos, 'bikes/'.$nombre_dos)) {
										if (move_uploaded_file($guardado_tres, 'bikes/'.$nombre_tres)) {
											//$kuerito = "INSERT INTO `base_bike`(`id_bike`) VALUES (".$id_bike.")";
											if(mysqli_query($conexion,$kuerito)){
												$mensaje = "El producto ".$nombre_producto." se ha registrado con éxito";
												echo '<script language="javascript">';
													echo 'alert("'.$mensaje.'");';
													echo 'window.location="inventario_bike.php";';
												echo '</script>';
											}else{
												echo '<script language="javascript">';
												echo 'alert("Ocurrió un error al intentar guardar los datos.");';
												echo 'window.history.back();';
											echo '</script>';
											}		
										}else{
											echo '<script language="javascript">';
												echo 'alert("Ocurrió un error al guardar las imagenes (Subir las 3 imagenes)");';
												echo 'window.history.back();';
											echo '</script>';									
										}
									}else{
										echo '<script language="javascript">';
											echo 'alert("Ocurrió un error al guardar las imagenes (Subir las 3 imagenes)");';
											echo 'window.history.back();';
										echo '</script>';
									}
								}else{
									echo '<script language="javascript">';
										echo 'alert("Ocurrió un error al guardar las imagenes (Subir las 3 imagenes)");';
										echo 'window.history.back();';
									echo '</script>';							
								}
							}	
						}else{
							echo '<script language="javascript">';
								echo 'alert("Ocurrió un error al intentar guardar las imagenes.");';
								echo 'window.history.back();';
							echo '</script>';
						}					
					}else{
						echo '<script language="javascript">';
							echo 'alert("Ocurrió un error al intentar guardar los datos.");';
							echo 'window.history.back();';
						echo '</script>';
					}
			}
		}else{
			$sql = "INSERT INTO `productos_bike`(`inventario_inicial_producto`, `inventario_producto`, `inventario_tmp_producto`, `nombre_producto`, `rodada_producto`, `color_producto`, `precio_compra`, `precio_publico`, `precio_publico_desc`, `cod_barras_bike`, `co_generico`,`co_sat`, `tipo_bike`, `modelo_bike`, `marca_bike`, `material_bike`, `edad_bike`, `estilo_bike`, `tipo_accesorio`, `tipo_triciclo`, `genero_bike`, `velocidades_bike`, `freno_delantero`, `freno_trasero`, `montaje_bike`, `personaje_bike`, `ruedas` ) VALUES ( '".$inventarioIn."', '".$inventario."','".$inventariotmp."', '".$nombre_producto."', '".$rodada_producto."', '".$color_producto."', '".$precio_compra."', ".$precio_publico.", '".$precio_publico_desc."', '".$codigo_barras_producto."', '".$co_gen."','".$co_sat."', ".$tipo_bike.", '".$modelo_bike."', '".$marca_bike."', '".$material_bike."', '".$edad_bike."', '".$estilo_bike."', '".$tipo_accesorio."', '".$tipo_triciclo."', '".$genero_bike."', '".$velocidades_bike."', '".$freno_delantero."', '".$freno_trasero."', '".$montaje_bike."', '".$personaje_bike."', '".$ruedas."' )";
				if(mysqli_query($conexion,$sql)){
					$id_bike = mysqli_insert_id($conexion);
					//$kuerito = "INSERT INTO `base_bike`(`id_bike`) VALUES (".$id_bike.")";
					$mensaje = "El producto ".$nombre_producto." se ha registrado con éxito";
					echo '<script language="javascript">';
						echo 'alert("'.$mensaje.'");';
						echo 'window.location="inventario_bike.php";';
					echo '</script>';
					/*if(mysqli_query($conexion,$kuerito)){
						$mensaje = "El producto ".$nombre_producto." se ha registrado con éxito";
						echo '<script language="javascript">';
							echo 'alert("'.$mensaje.'");';
							echo 'window.location="inventario_bike.php";';
						echo '</script>';
					}else{
						echo '<script language="javascript">';
						echo 'alert("Ocurrió un error al intentar guardar los datos4.");';
						echo 'window.history.back();';
					echo '</script>';
					}	*/		
					
				}else{
					echo '<script language="javascript">';
						echo 'alert("Ocurrió un error al intentar guardar los datos.");';
						echo 'window.history.back();';
					echo '</script>';
				}			
		}		
		
	}

	//Función que valida que el dato a registrar, no exista uno con nombre muy similar.
	function validaRepetidos($nombre_producto){
		include("conexion.php");
		$sql = "select * from productos_bike where nombre_producto LIKE '%".$nombre_producto."%'";
		$requi = mysqli_query($conexion,$sql);
		$totalFilas=mysqli_num_rows($requi);
	    if($totalFilas>0){
	    	while ($reg=mysqli_fetch_array($requi)) {
	        	$nombre = $reg['nombre_producto'];
	        	$mensaje =  "El producto si existe y se llama ".$nombre;
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