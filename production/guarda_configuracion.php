<?php 
	$bandera=0;
	include("conexion.php");
	if (isset($_POST['nombre_gym'])&&isset($_POST['direccion_gym'])&&isset($_POST['leyenda_ticket'])) {
		$target_path = "images/logo.jpg";
		//$target_path = $target_path . basename( $_FILES['myImage']['name']); 
		$ruta = $target_path;


		$skiuel = "select * from configuracion";
		$resp = mysqli_query($conexion,$skiuel);
		$renglones = mysqli_num_rows($resp);
	    $direccion_gym=$_POST['direccion_gym'];
		$direccion_gym=str_replace("\r","<br>",$direccion_gym);

		$leyenda_ticket=$_POST['leyenda_ticket'];
		$costo_acceso = $_POST['costo_acceso'];
		$costo_inscripcion = $_POST['costo_inscripcion'];
		$costo_reactivacion = $_POST['costo_reactivacion'];
		

		$nombre_gym = $_POST['nombre_gym'];
		if ($renglones==0) {
			$leyenda_ticket=str_replace("\r","<br>",$leyenda_ticket);
			if(move_uploaded_file($_FILES['myImage']['tmp_name'], $target_path)) {
			   

				$sql = "INSERT INTO `configuracion`(`logo`, `nombre`, `direccion`, `leyenda_inferior`,`costo_acceso`,`costo_inscripcion`,`costo_reactivacion`) VALUES ('".$ruta."','".$nombre_gym."','".$direccion_gym."','".$leyenda_ticket."',".$costo_acceso.",".$costo_inscripcion.",".$costo_reactivacion.")";
				if(mysqli_query($conexion,$sql)){
					 $bandera=1;
				}else{
					 $bandera=0;
				}	
			}else{
		    	$bandera=0;
			}
		}else{
			if (empty($_FILES['myImage']['name'])) {
				$sql = "UPDATE `configuracion` SET `nombre`='".$nombre_gym."',`direccion`='".$direccion_gym."',`leyenda_inferior`='".$leyenda_ticket."',`costo_acceso`='".$costo_acceso."',`costo_inscripcion`='".$costo_inscripcion."',`costo_reactivacion`='".$costo_reactivacion."'";
				if(mysqli_query($conexion,$sql)){
					 $bandera=1;
				}else{
					 $bandera=0;
				}				
			}else{
				if(move_uploaded_file($_FILES['myImage']['tmp_name'], $target_path)) {
					
				    $direccion_gym=$_POST['direccion_gym'];
					$direccion_gym=str_replace("\r","<br>",$direccion_gym);

					$leyenda_ticket=$_POST['leyenda_ticket'];
					$leyenda_ticket=str_replace("\r","<br>",$leyenda_ticket);

					$nombre_gym = $_POST['nombre_gym'];

					$sql = "UPDATE `configuracion` SET `logo`='".$ruta."',`nombre`='".$nombre_gym."',`direccion`='".$direccion_gym."',`leyenda_inferior`='".$leyenda_ticket."',`costo_acceso`='".$costo_acceso."',`costo_inscripcion`='".$costo_inscripcion."',`costo_reactivacion`='".$costo_reactivacion."'";
					if(mysqli_query($conexion,$sql)){
						$bandera=1;
					}else{
						$bandera=0;
					}	
				}else{
			    	$bandera=0;
				}
				
			}
		}
	}else{
		$bandera=0;
	}

	if($bandera==0){
		echo ' <script type="text/javascript">
			 	alert("Algo falló.");
			 	location.href="configuracion.php";
			 </script>';
	}else{
		echo ' <script type="text/javascript">
			 	alert("Configuración guardada.");
			 	location.href="configuracion.php";
			 </script>';

	}
 ?>
