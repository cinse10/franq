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


	
	$nombre_producto = $_POST['nombre_producto'];
	$precio_catalogo = $_POST['precio_catalogo'];
	$precio_compra = $_POST['precio_compra'];
	$codigo_barras_producto = $_POST['codigo_producto'];
	$inventario_producto = $_POST['inventario_producto'];
	$descripcion_producto = $_POST['desc_producto'];
	$color_producto = $_POST['color_producto'];
	$genero_producto = $_POST['genero_producto'];
	$caracteristicas_belleza = $_POST['caracteristicas_belleza'];
	$caracteristicas_salud = $_POST['caracteristicas_salud'];
	$formato_salud = $_POST['formato_salud'];
	$resistencia_producto = $_POST['resistencia_producto'];
	$tipo_piel = $_POST['tipo_piel'];
	$contenido_producto = $_POST['contenido_producto'];

	$categorias = $_POST['categorias'];
	$cat_uno = $_POST['cat_uno'];
	$cat_dos = $_POST['cat_dos'];
	$cat_tres = $_POST['cat_tres'];
    $cat_ml = $_POST['cat_ml'];

    $consistecia_base = $_POST['consistecia_base'];
	$acabado_base = $_POST['acabado_base'];
	$form_iluminador = $_POST['form_iluminador'];
	$form_corrector = $_POST['form_corrector'];
	$tex_corrector = $_POST['tex_corrector'];
	$acabado_rubor = $_POST['acabado_rubor'];
	$formato_desmaquillante = $_POST['formato_desmaquillante'];
	$tip_crema = $_POST['tip_crema'];
	$consistencia_crema = $_POST['consistencia_crema'];
	$tip_piel = $_POST['tip_piel'];
	$form_facial = $_POST['form_facial'];
	$form_ceja = $_POST['form_ceja'];
	$form_ojo = $_POST['form_ojo'];
	$form_labio = $_POST['form_labio'];
	$acabado_labios = $_POST['acabado_labios'];
	$tipo_perfume = $_POST['tipo_perfume'];
	$tipo_esencia = $_POST['tipo_esencia'];
	$hipoalergenica = $_POST['hipoalergenica'];
	$parabeno_free = $_POST['parabeno_free'];
	$prot_solar = $_POST['prot_solar'];
	$derm_test = $_POST['derm_test'];
	$agua_test = $_POST['agua_test'];
	$larga_dur = $_POST['larga_dur'];
	$case_brocha = $_POST['case_brocha'];
	$modelo_producto = $_POST['modelo_producto'];
	$func_mascarilla = $_POST['func_mascarilla'];
	$zona_mascarilla = $_POST['zona_mascarilla'];
	$ing_mascarilla = $_POST['ing_mascarilla'];
	$func_mascarilla = $_POST['func_mascarilla'];
	$zona_mascarilla = $_POST['zona_mascarilla'];
	$ing_mascarilla = $_POST['ing_mascarilla'];
	$no_sombra = $_POST['no_sombra'];
	$no_brocha = $_POST['no_brocha'];
	$pelo_brocha = $_POST['pelo_brocha'];
	$form_limp = $_POST['form_limp'];
	$peso_unidad = $_POST['peso_unidad'];
	$volumen_unidad = $_POST['volumen_unidad'];
	$unit_paq = $_POST['unit_paq'];

	$descripcion_linio = $_POST['descripcion'];
    $detalles_linio = $_POST['detalles'];
    $altura=$_POST['altura'];
    $anchura=$_POST['anchura'];
    $longitud=$_POST['longitud'];
    $peso=$_POST['peso'];

    $sql = "select * from productos_marykay WHERE id_producto=".$id_producto;
            $requi = mysqli_query($conexion,$sql);
            while ($reg=mysqli_fetch_array($requi)) {
            	$codigo_barras_producto = $reg['codigo_producto'];
            	$one = $reg['imagen_uno'];
            	$two = $reg['imagen_dos'];
            	$three = $reg['imagen_tres'];
            }

    $letra_primera = $color_producto[0];
	$letra_ultima = substr($color_producto, -1);
    $cod_linio= $id_producto."-MK-".$codigo_barras_producto;

	if ($_FILES['uno']['tmp_name']!=NULL | $_FILES['dos']['tmp_name']!=NULL | $_FILES['tres']['tmp_name']!=NULL) {
	

		if ($_FILES['uno']['tmp_name']!=NULL ) {
			$nombre_uno = $id_producto."-uno.jpg";
			if ($one != NULL) {
				unlink("marykay/".$nombre_uno);  
			}
			if (move_uploaded_file($guardado_uno, 'marykay/'.$nombre_uno)) {		
				$ban1 =1;
				$ban2=2;
				$ban3=3;
			}else{
				$ban1 =0;
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
				unlink("marykay/".$nombre_dos); 
			}
			if (move_uploaded_file($guardado_dos, 'marykay/'.$nombre_dos)) {		
				$ban1 =1;
				$ban2=2;
				$ban3=3;
			}else{
				$ban2=0;
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
				unlink("marykay/".$nombre_tres);  
			}
			if (move_uploaded_file($guardado_tres, 'marykay/'.$nombre_tres)) {		
				$ban1 =1;
				$ban2=2;
				$ban3=3;
			}else{
				$ban3=0;
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
			$sql2 = "UPDATE `productos_marykay` SET `nombre_producto`='".$nombre_producto."',`precio_catalogo`=".$precio_catalogo." ,`precio_compra`=".$precio_compra.",`codigo_producto`='".$codigo_barras_producto."', `inventario_producto`=".$inventario_producto.", `desc_producto`='".$descripcion_producto."',`color_producto`='".$color_producto."',`contenido_producto`='".$contenido_producto."', `genero_producto`='".$genero_producto."', `caracteristicas_belleza`='".$caracteristicas_belleza."', `caracteristicas_salud`='".$caracteristicas_salud."', `formato_salud`='".$formato_salud."', `resistencia_producto`='".$resistencia_producto."', `resistencia_producto`='".$resistencia_producto."', `tipo_piel`='".$tipo_piel."' , `categorias`=".$categorias." , `cat_uno`='".$cat_uno."' , `cat_dos`='".$cat_dos."' , `cat_tres`='".$cat_tres."',`cat_ml`='".$cat_ml."',`consistecia_base` = '".$consistecia_base."', `acabado_base` = '".$acabado_base."', `form_iluminador` = '".$form_iluminador."', `form_corrector` = '".$form_corrector."', `tex_corrector` = '".$tex_corrector."', `acabado_rubor` = '".$acabado_rubor."', `formato_desmaquillante` = '".$formato_desmaquillante."', `tip_crema` = '".$tip_crema."', `consistencia_crema` = '".$consistencia_crema."', `tip_piel` = '".$tip_piel."', `form_facial` = '".$form_facial."', `form_ceja` = '".$form_ceja."', `form_ojo` = '".$form_ojo."', `form_labio` = '".$form_labio."', `acabado_labios` = '".$acabado_labios."', `tipo_perfume` = '".$tipo_perfume."', `tipo_esencia` = '".$tipo_esencia."', `hipoalergenica` = '".$hipoalergenica."', `parabeno_free` = '".$parabeno_free."', `prot_solar` = '".$prot_solar."', `derm_test` = '".$derm_test."', `agua_test` = '".$agua_test."', `larga_dur` = '".$larga_dur."', `case_brocha` = '".$case_brocha."', `modelo_producto` = '".$modelo_producto."', `func_mascarilla` = '".$func_mascarilla."', `zona_mascarilla` = '".$zona_mascarilla."', `ing_mascarilla` = '".$ing_mascarilla."', `func_mascarilla` = '".$func_mascarilla."', `zona_mascarilla` = '".$zona_mascarilla."', `ing_mascarilla` = '".$ing_mascarilla."', `no_sombra` = '".$no_sombra."', `no_brocha` = '".$no_brocha."', `pelo_brocha` = '".$pelo_brocha."', `form_limp` = '".$form_limp."', `peso_unidad` = '".$peso_unidad."', `volumen_unidad` = '".$volumen_unidad."', `unit_paq` = '".$unit_paq."', `descripcion_linio`='".$descripcion_linio."',`detalles_linio`='".$detalles_linio."',`altura`=".$altura.",`anchura`=".$anchura.",`longitud`=".$longitud.",`peso`=".$peso.",`cod_linio`='".$cod_linio."',`imagen_uno`='".$nombre_uno."',`imagen_dos`='".$nombre_dos."',`imagen_tres`='".$nombre_tres."' WHERE id_producto=".$id_producto;
			if(mysqli_query($conexion,$sql2)){
				echo '<script language="javascript">';
					echo 'alert("Datos actualizados con éxito");';
					echo 'window.location="acciones_mary.php?action=edita&id_producto='.$id_producto.'";';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
					echo 'alert("Ocurrió un error al guardar los datos");';
					echo 'window.history.back();';
				echo '</script>';
			}		
		}



	}else{
		$sql2 = "UPDATE `productos_marykay` SET  `nombre_producto`='".$nombre_producto."',`precio_catalogo`=".$precio_catalogo." ,`precio_compra`=".$precio_compra.",`codigo_producto`='".$codigo_barras_producto."', `inventario_producto`=".$inventario_producto.", `desc_producto`='".$descripcion_producto."',`color_producto`='".$color_producto."',`contenido_producto`='".$contenido_producto."', `genero_producto`='".$genero_producto."', `caracteristicas_belleza`='".$caracteristicas_belleza."', `caracteristicas_salud`='".$caracteristicas_salud."', `formato_salud`='".$formato_salud."', `resistencia_producto`='".$resistencia_producto."', `resistencia_producto`='".$resistencia_producto."', `tipo_piel`='".$tipo_piel."', `categorias`=".$categorias." , `cat_uno`='".$cat_uno."' , `cat_dos`='".$cat_dos."' , `cat_tres`='".$cat_tres."',`cat_ml`='".$cat_ml."', `consistecia_base` = '".$consistecia_base."', `acabado_base` = '".$acabado_base."', `form_iluminador` = '".$form_iluminador."', `form_corrector` = '".$form_corrector."', `tex_corrector` = '".$tex_corrector."', `acabado_rubor` = '".$acabado_rubor."', `formato_desmaquillante` = '".$formato_desmaquillante."', `tip_crema` = '".$tip_crema."', `consistencia_crema` = '".$consistencia_crema."', `tip_piel` = '".$tip_piel."', `form_facial` = '".$form_facial."', `form_ceja` = '".$form_ceja."', `form_ojo` = '".$form_ojo."', `form_labio` = '".$form_labio."', `acabado_labios` = '".$acabado_labios."', `tipo_perfume` = '".$tipo_perfume."', `tipo_esencia` = '".$tipo_esencia."', `hipoalergenica` = '".$hipoalergenica."', `parabeno_free` = '".$parabeno_free."', `prot_solar` = '".$prot_solar."', `derm_test` = '".$derm_test."', `agua_test` = '".$agua_test."', `larga_dur` = '".$larga_dur."', `case_brocha` = '".$case_brocha."', `modelo_producto` = '".$modelo_producto."', `func_mascarilla` = '".$func_mascarilla."', `zona_mascarilla` = '".$zona_mascarilla."', `ing_mascarilla` = '".$ing_mascarilla."', `func_mascarilla` = '".$func_mascarilla."', `zona_mascarilla` = '".$zona_mascarilla."', `ing_mascarilla` = '".$ing_mascarilla."', `no_sombra` = '".$no_sombra."', `no_brocha` = '".$no_brocha."', `pelo_brocha` = '".$pelo_brocha."', `form_limp` = '".$form_limp."', `peso_unidad` = '".$peso_unidad."', `volumen_unidad` = '".$volumen_unidad."', `unit_paq` = '".$unit_paq."', `descripcion_linio`='".$descripcion_linio."',`detalles_linio`='".$detalles_linio."',`altura`=".$altura.",`anchura`=".$anchura.",`longitud`=".$longitud.",`peso`=".$peso.",`cod_linio`='".$cod_linio."' WHERE id_producto=".$id_producto;
		
		if(mysqli_query($conexion,$sql2)){
			echo '<script language="javascript">';
				echo 'alert("Datos actualizados con éxito");';
				echo 'window.location="acciones_mary.php?action=edita&id_producto='.$id_producto.'";';
			echo '</script>';
		}else{
			echo '<script language="javascript">';
				echo 'alert("Ocurrió un error al guardar los datos");';
				echo 'window.history.back();';
			echo '</script>';
		}		
	}



 ?>