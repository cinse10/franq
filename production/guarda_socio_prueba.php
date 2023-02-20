<?php 
include("conexion.php");
$nombre_socio 		= $_POST['nombre_socio'];	
	$ap_pat_socio 		= $_POST['ap_pat_socio'];	
	$ap_mat_socio		= $_POST['ap_mat_socio'];	
	$whats_socio  		= $_POST['whats_socio'];	
	$nacimiento_socio 	= $_POST['nacimiento_socio'];
	$calle_socio 		= $_POST['calle_socio'];
	$colonia_socio 		= $_POST['colonia_socio'];
	$municipio_socio 	= $_POST['municipio_socio'];
	$cp_socio 			= $_POST['cp_socio'];
	$email_socio 		= $_POST['email_socio'];	
	$id_empleado 		= $_POST['id_empleado'];			
	$notas_socio 		= $_POST['notas_socio'];
	$ventas             = 0;	

    $hoy = date("Ymd");
    
    
    if ($_POST['bandera'] == 5) {
        $sql ="INSERT INTO  socios_better(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`codigo`) 
        OUTPUT inserted.nombre_socio, inserted.ap_pat_socio, inserted.ap´_mat_socio,inserted.tel_socio, inserted.whats_socio,inserted.nacimiento_socio,inserted.calle_socio, inserted.colonia_socio, inserted.municipio_socio, inserted.cp_socio, inserted.email_socio, inserted_notas_socio, inserted.fecha_add, inserted.id_empleado, inserted.tipo, inserted.codigo  INTO  totales 
        VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0) ";

        //$sql ="INSERT INTO `socios_better`(`nombre_socio`, `ap_pat_socio`, `ap_mat_socio`, `tel_socio`, `whats_socio`, `nacimiento_socio`, `calle_socio`, `colonia_socio`, `municipio_socio`, `cp_socio`, `email_socio`, `notas_socio`, `fecha_add`, `id_empleado`, `tipo`,`codigo`) VALUES('".$nombre_socio."', '".$ap_pat_socio."', '".$ap_mat_socio."', '".$whats_socio."', '".$whats_socio."', '".$nacimiento_socio."', '".$calle_socio."', '".$colonia_socio."', '".$municipio_socio."', '".$cp_socio."', '".$email_socio."', '".$notas_socio."', '".$hoy."', ".$id_empleado.",0,0)";
        $resul = mysqli_query($conexion,$sql);
        $id = mysqli_insert_id($conexion);
        $codigo = $id.$hoy.'MM';
       
        
        $sql = "UPDATE socios_better set codigo = '$codigo' where id_socio='$id'";
    if(mysqli_query($conexion,$sql)){
        $ultimo_id = mysqli_insert_id($conexion);
        // $mensaje = "El socio ".$nombre_socio." ".$ap_pat_socio." se ha registrado con éxito";
        // $ruta = "window.location='agrega_imagen_socio.php?id=".$ultimo_id."';";
        // echo '<script language="javascript">';
        // 	echo 'alert("'.$mensaje.'");';
        // 	echo $ruta;
        // echo '</script>';
        echo $ultimo_id;
        
    }
    }
?>