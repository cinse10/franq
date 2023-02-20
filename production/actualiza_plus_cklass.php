<?php 
	include("conexion.php");

	$id_producto = $_POST['id_producto'];

	$uno = $_FILES['uno']['name'];
	$guardado_uno = $_FILES['uno']['tmp_name'];
	$extension_uno = pathinfo($uno, PATHINFO_EXTENSION);

	$dos = $_FILES['dos']['name'];
	$guardado_dos = $_FILES['dos']['tmp_name'];
	$extension_dos = pathinfo($dos, PATHINFO_EXTENSION);

	$tres = $_FILES['tres']['name'];
	$guardado_tres = $_FILES['tres']['tmp_name'];
	$extension_tres = pathinfo($tres, PATHINFO_EXTENSION);

	$color_producto = $_POST['color_producto'];
	$tipo_producto = $_POST['tipo_producto'];
	//$var_producto = $_POST['var_producto'];
	$material_producto = $_POST['material_producto'];

	$descripcion_linio = $_POST['descripcion_linio'];
    $detalles_linio = $_POST['detalles_linio'];
    $altura=$_POST['altura'];
    $anchura=$_POST['anchura'];
    $longitud=$_POST['longitud'];
    $peso=$_POST['peso'];

    $sql = "select * from productos_cklass WHERE id_producto=".$id_producto;
            $requi = mysqli_query($conexion,$sql);
            while ($reg=mysqli_fetch_array($requi)) {
            	$codigo_barras_producto = $reg['codigo_barras_producto'];
                var_dump($codigo_barras_producto);
            	$one = $reg['imagen_uno'];
            	$two = $reg['imagen_dos'];
            	$three = $reg['imagen_tres'];
            }

    $letra_primera = $color_producto[0];
	$letra_ultima = substr($color_producto, -1);
    $cod_linio= $codigo_barras_producto."-".$letra_primera.$letra_ultima;

	if ($_FILES['uno']['tmp_name']!=NULL | $_FILES['dos']['tmp_name']!=NULL | $_FILES['tres']['tmp_name']!=NULL) {
	

		if ($_FILES['uno']['tmp_name']!=NULL ) {
			$nombre_uno = $id_producto."-uno.jpg";
			if ($one != NULL) {
				unlink("cklass/".$nombre_uno);  
			}
			if (move_uploaded_file($guardado_uno, 'cklass/'.$nombre_uno)) {		
				$ban1 =1;
				$ban2=2;
				$ban3=3;
			}else{
				$ban1 =1;
				echo '<script language="javascript">';
					echo 'alert("Ocurrió un error al guardar las imagenes (Subir las 3 imagenes)1");';
					echo 'window.history.back();';
				echo '</script>';
			}
		}else{
			if ($one !=NULL) {
				$nombre_uno = $id_producto."-uno.jpg";
			}else{
				$nombre_uno = '';
			}
		}
		if ($_FILES['dos']['tmp_name']!=NULL ) {
			$nombre_dos = $id_producto."-dos.jpg";
			if ($two != NULL) {
				unlink("cklass/".$nombre_dos); 
			}
			if (move_uploaded_file($guardado_dos, 'cklass/'.$nombre_dos)) {		
				$ban1 =1;
				$ban2=2;
				$ban3=3;
			}else{
				$ban2=2;
				echo '<script language="javascript">';
					echo 'alert("Ocurrió un error al guardar las imagenes (Subir las 3 imagenes)2");';
					echo 'window.history.back();';
				echo '</script>';
			} 
		}else{
			if ($two !=NULL) {
				$nombre_dos = $id_producto."-dos.jpg";
			}else{
				$nombre_dos = '';
			}
		}
		if ($_FILES['tres']['tmp_name']!=NULL ) {
			$nombre_tres = $id_producto."-tres.jpg";
			if ($three != NULL) {
				unlink("cklass/".$nombre_tres);  
			}
			if (move_uploaded_file($guardado_tres, 'cklass/'.$nombre_tres)) {		
				$ban1 =1;
				$ban2=2;
				$ban3=3;
			}else{
				$ban3=3;
				echo '<script language="javascript">';
					echo 'alert("Ocurrió un error al guardar las imagenes (Subir las 3 imagenes)3");';
					echo 'window.history.back();';
				echo '</script>';
			} 
		}else{
			if ($three !=NULL) {
				$nombre_tres = $id_producto."-tres.jpg";
			}else{
				$nombre_tres= '';
			}
		}

		if ($ban1 !=0 && $ban2!=0 && $ban3!=0) {
			$sql2 = "UPDATE `productos_cklass` SET `color_producto`='".$color_producto."',`tipo_producto`='".$tipo_producto."',`material_producto`='".$material_producto."',`descripcion_linio`='".$descripcion_linio."',`detalles_linio`='".$detalles_linio."',`altura`=".$altura.",`anchura`=".$anchura.",`longitud`=".$longitud.",`peso`=".$peso.",`cod_linio`='".$cod_linio."',`imagen_uno`='".$nombre_uno."',`imagen_dos`='".$nombre_dos."',`imagen_tres`='".$nombre_tres."' WHERE id_producto=".$id_producto;
			if(mysqli_query($conexion,$sql2)){
				echo '<script language="javascript">';
					echo 'alert("Datos actualizados con éxito");';
					echo 'window.location="plus_cklass.php?id_producto='.$id_producto.'";';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
					echo 'alert("Ocurrió un error al guardar los datos2");';
					echo 'window.history.back();';
                    
				echo '</script>';
			}		
		}







	}else{
		$sql2 = "UPDATE `productos_cklass` SET `color_producto`='".$color_producto."',`tipo_producto`='".$tipo_producto."',`material_producto`='".$material_producto."',`descripcion_linio`='".$descripcion_linio."',`detalles_linio`='".$detalles_linio."',`altura`=".$altura.",`anchura`=".$anchura.",`longitud`=".$longitud.",`peso`=".$peso.",`cod_linio`='".$cod_linio."' WHERE id_producto=".$id_producto;

		if(mysqli_query($conexion,$sql2)){
			echo '<script language="javascript">';
				echo 'alert("Datos actualizados con éxito");';
				echo 'window.location="plus_cklass.php?id_producto='.$id_producto.'";';
			echo '</script>';
		}else{
			echo '<script language="javascript">';
				echo 'alert("Ocurrió un error al guardar los datosss");';
				echo 'window.history.back();';
			echo '</script>';
		}		
	}



 ?>