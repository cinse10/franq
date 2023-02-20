<?php 
	include("conexion.php");
	$uno = $_FILES['uno']['name'];
	$guardado_uno = $_FILES['uno']['tmp_name'];
	$extension_uno = pathinfo($uno, PATHINFO_EXTENSION);
	
	$dos = $_FILES['dos']['name'];
	$guardado_dos = $_FILES['dos']['tmp_name'];
	$extension_dos = pathinfo($dos, PATHINFO_EXTENSION);

	$tres = $_FILES['tres']['name'];
	$guardado_tres = $_FILES['tres']['tmp_name'];
	$extension_tres = pathinfo($tres, PATHINFO_EXTENSION);

	$id_producto = $_POST['id_producto'];
	$nombre_producto = $_POST['nombre_producto'];
	$rodada_producto = $_POST['rodada_producto'];
	$color_producto = $_POST['color_producto'];
	$precio_compra = $_POST['precio_compra'];
	$precio_publico = $_POST['precio_publico'];
	$precio_publico_desc = $_POST['precio_publico_desc'];
	$inventario_producto = $_POST['inventario_producto'];	
	$codigo_barras_producto = $_POST['codigo_barras_producto'];
	$co_generico = $_POST['co_generico'];
	$co_sat = $_POST['co_sat'];
	$tipo_bike = $_POST['tipo_bike'];
	$modelo_bike = $_POST['modelo_bike'];
	$marca_bike = $_POST['marca_bike'];
	$material_bike = $_POST['material_bike'];
	$edad_bike = $_POST['edad_bike']; 

	$estilo_bike = $_POST['estilo_bike'];
	$tipo_accesorio = $_POST['tipo_accesorio'];
	$tipo_triciclo = $_POST['tipo_triciclo'];
	$genero_bike = $_POST['genero_bike'];
	$velocidades_bike = $_POST['velocidades_bike'];
	$freno_delantero = $_POST['freno_delantero'];
	$freno_trasero = $_POST['freno_trasero'];				
	$montaje_bike = $_POST['montaje_bike'];	
	$pegable_bike = $_POST['pegable_bike'];
	$personaje_bike = $_POST['personaje_bike'];
	$ruedas = $_POST['ruedas'];

	$descripcion_bike = $_POST['descripcion'];
	$detalles_bike = $_POST['detalles'];
	$altura=$_POST['altura'];
    $anchura=$_POST['anchura'];
    $longitud=$_POST['longitud'];
    $peso=$_POST['peso'];   
    
    if ($tipo_bike == 0) {
    	$letra_primera = $color_producto[0];
	    $letra_ultima = substr($color_producto, -1);
	    $cod_linio= $id_producto."-R".$rodada_producto."-C".$letra_primera.$letra_ultima;
    }elseif ($tipo_bike == 1) {
    	$letra_primera = $color_producto[0];
	    $letra_ultima = substr($color_producto, -1);
	    $cod_linio= $id_producto."ACC-C".$letra_primera.$letra_ultima;
    }elseif ($tipo_bike == 2) {
    	$letra_primera = $color_producto[0];
	    $letra_ultima = substr($color_producto, -1);
	    $cod_linio= $id_producto."TRI-C".$letra_primera.$letra_ultima;
    }elseif ($tipo_bike == 3) {
    	$letra_primera = $color_producto[0];
	    $letra_ultima = substr($color_producto, -1);
	    $cod_linio= $id_producto."SCO-C".$letra_primera.$letra_ultima;
    }
    
    if ($tipo_accesorio == 3) {
		$precio_compra = round($precio_compra*1.16);
		$precio_publico = ceil($precio_compra*1.34)*1.16;
		$precio_publico_desc = ceil($precio_compra*1.34)*1.16;
	}


	if ($_FILES['uno']['tmp_name']!=NULL | $_FILES['dos']['tmp_name']!=NULL | $_FILES['tres']['tmp_name']!=NULL) {
		$nombre_uno = $id_producto."-uno.jpg";		
		$nombre_dos = $id_producto."-dos.jpg";
		$nombre_tres = $id_producto."-tres.jpg";	
		unlink("bikes/".$nombre_uno);  
		unlink("bikes/".$nombre_dos); 
		unlink("bikes/".$nombre_tres); 

		$sql = "UPDATE `productos_bike` SET `nombre_producto`='".$nombre_producto."',`rodada_producto`='".$rodada_producto."',`color_producto`='".$color_producto."',`precio_compra`='".$precio_compra."',`precio_publico`=".$precio_publico.",`precio_publico_desc`='".$precio_publico_desc."',`inventario_producto`=".$inventario_producto.",`cod_barras_bike`='".$codigo_barras_producto."',`co_generico`='".$co_generico."',`co_sat`='".$co_sat."',`tipo_bike`=".$tipo_bike.",`imagen_uno`='".$nombre_uno."',`imagen_dos`='".$nombre_dos."',`imagen_tres`='".$nombre_tres."',`modelo_bike`='".$modelo_bike."',`marca_bike`='".$marca_bike."',`material_bike`='".$material_bike."',`edad_bike`='".$edad_bike."',`estilo_bike`='".$estilo_bike."',`tipo_accesorio`='".$tipo_accesorio."',`tipo_triciclo`='".$tipo_triciclo."',`genero_bike`='".$genero_bike."',`velocidades_bike`='".$velocidades_bike."',`freno_delantero`='".$freno_delantero."',`freno_trasero`='".$freno_trasero."',`montaje_bike`='".$montaje_bike."',`pegable_bike`='".$pegable_bike."',`personaje_bike`='".$personaje_bike."',`ruedas`='".$ruedas."',`descripcion_bike`='".$descripcion_bike."',`detalles_bike`='".$detalles_bike."',`altura`='".$altura."',`anchura`='".$anchura."',`longitud`='".$longitud."',`peso`='".$peso."',`cod_linio`='".$cod_linio."' WHERE id_producto=".$id_producto;
		if (move_uploaded_file($guardado_uno, 'bikes/'.$nombre_uno) ) {
			if (move_uploaded_file($guardado_dos, 'bikes/'.$nombre_dos)) {
				if (move_uploaded_file($guardado_tres, 'bikes/'.$nombre_tres)) {
					if(mysqli_query($conexion,$sql)){
						echo '<script language="javascript">';
							echo 'alert("Datos actualizados con éxito");';
							echo 'window.location="consulta_productos_bike.php";';
						echo '</script>';
					}else{
						echo '<script language="javascript">';
							echo 'alert("Ocurrió un error al guardar los datos");';
							echo 'window.history.back();';
						echo '</script>';
					}	
				}else{
					echo '<script language="javascript">';
						echo 'alert("Ocurrió un error al guardar las imagenes (Subir las 3 imagenes)3");';
						echo 'window.history.back();';
					echo '</script>';
				}
			}else{
				echo '<script language="javascript">';
						echo 'alert("Ocurrió un error al guardar las imagenes (Subir las 3 imagenes)2");';
						echo 'window.history.back();';
					echo '</script>';
			}
		}else{
			echo '<script language="javascript">';
						echo 'alert("Ocurrió un error al guardar las imagenes (Subir las 3 imagenes)1");';
						echo 'window.history.back();';
					echo '</script>';
		}

	}else{
		$sql = "UPDATE `productos_bike` SET `nombre_producto`='".$nombre_producto."',`rodada_producto`='".$rodada_producto."',`color_producto`='".$color_producto."',`precio_compra`='".$precio_compra."',`precio_publico`=".$precio_publico.",`precio_publico_desc`='".$precio_publico_desc."',`inventario_producto`=".$inventario_producto.",`cod_barras_bike`='".$codigo_barras_producto."',`co_generico`='".$co_generico."',`co_sat`='".$co_sat."',`tipo_bike`=".$tipo_bike.",`modelo_bike`='".$modelo_bike."',`marca_bike`='".$marca_bike."',`material_bike`='".$material_bike."',`edad_bike`='".$edad_bike."',`estilo_bike`='".$estilo_bike."',`tipo_accesorio`='".$tipo_accesorio."',`tipo_triciclo`='".$tipo_triciclo."',`genero_bike`='".$genero_bike."',`velocidades_bike`='".$velocidades_bike."',`freno_delantero`='".$freno_delantero."',`freno_trasero`='".$freno_trasero."',`montaje_bike`='".$montaje_bike."',`pegable_bike`='".$pegable_bike."',`personaje_bike`='".$personaje_bike."',`ruedas`='".$ruedas."', `descripcion_bike`='".$descripcion_bike."',`detalles_bike`='".$detalles_bike."',`altura`='".$altura."',`anchura`='".$anchura."',`longitud`='".$longitud."',`peso`='".$peso."',`cod_linio`='".$cod_linio."' WHERE id_producto=".$id_producto;
		
		if(mysqli_query($conexion,$sql)){
			echo '<script language="javascript">';
				echo 'alert("Datos actualizados con éxito");';
				echo 'window.location="acciones_bike.php?action=edita&id_producto='.$id_producto.'";';
				//echo 'window.location="consulta_productos_bike.php";';
			echo '</script>';
		}else{
			echo '<script language="javascript">';
				echo 'alert("Ocurrió un error al guardar los datos");';
				echo 'window.history.back();';
			echo '</script>';
		}		
	}

 ?>