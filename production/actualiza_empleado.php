<?php 
	include("conexion.php");
	if (isset($_POST['id_empleado'])) {
		$id_empleado = $_POST['id_empleado'];
		$nombre_empleado = $_POST['nombre_empleado'];
		$apellidoPat_empleado = $_POST['apellidoPat_empleado'];	
		$apellidoMat_empleado = $_POST['apellidoMat_empleado'];	
		$telefono_empleado = $_POST['telefono_empleado'];	
		$id_tarjeta_empleado = $_POST['id_tarjeta_empleado'];	
		$status = $_POST['status'];	

		if (isset($_POST['modificar_socio'])) {
				$socio=2;
			}else{
				if (isset($_POST['consultar_socio'])) {
					$socio=1;
				}else{
					$socio=0;
				}
			}

			if (isset($_POST['modificar_caja'])) {
				$caja=2;
			}else{
				if (isset($_POST['consultar_caja'])) {
					$caja=1;
				}else{
					$caja=0;
				}
			}

			if (isset($_POST['modificar_producto'])) {
				$producto=2;
			}else{
				if (isset($_POST['consultar_producto'])) {
					$producto=1;
				}else{
					$producto=0;
				}
			}

			if (isset($_POST['modificar_empleado'])) {
				$empleado=2;
			}else{
				if (isset($_POST['consultar_empleado'])) {
					$empleado=1;
				}else{
					$empleado=0;
				}
			}

			if (isset($_POST['consultar_reporte'])) {
				$reporte = 2;
			}else{
				$reporte=0;
			}

			if (isset($_POST['configuracion'])) {
				$configuracion = 2;
			}else{
				$configuracion=0;
			}

		if(!validaRepetidos($id_tarjeta_empleado,$id_empleado)){ 

			$sql ="UPDATE `empleados` SET `nombre_empleado`='".$nombre_empleado."',`ap_pat_empleado`='".$apellidoPat_empleado."',`ap_mat_empleado`='".$apellidoMat_empleado."',`tel_empleado`='".$telefono_empleado."',`id_acceso_empleado`='".$id_tarjeta_empleado."',`activo`='".$status."',`socios`='".$socio."',`caja`='".$caja."',`productos`='".$producto."',`empleados`='".$empleado."',`reportes`='".$reporte."',`configuracion`='".$configuracion."' WHERE id_empleado = ".$id_empleado;
				if(mysqli_query($conexion,$sql)){
					$mensaje = "El empleado ".$nombre_empleado." ".$apellidoPat_empleado." se ha actualizado con éxito";
					echo '<script language="javascript">';
						echo 'alert("'.$mensaje.'");';
						echo 'window.location="consulta_empleados.php";';
					echo '</script>';
				}else{
					echo '<script language="javascript">';
						echo 'alert("Ocurrió un error al intentar guardar los datos.");';
						echo 'window.location="consulta_empleados.php";';
					echo '</script>';
				}
		}
	}
	

	//Función que valida que el dato a registrar, no exista uno con nombre muy similar.
	function validaRepetidos($id_tarjeta_empleado,$id_empleado){
		include("conexion.php");
		$sql = "select * from empleados where id_acceso_empleado =  '".$id_tarjeta_empleado."'";
		$requi = mysqli_query($conexion,$sql);
		$totalFilas=mysqli_num_rows($requi);
	    if($totalFilas>0){
	    	while ($reg=mysqli_fetch_array($requi)) {
	    		if ($reg['id_empleado']==$id_empleado) {
	    			return false;
	    		}else{
		        	$nombre = $reg['nombre_empleado']." ".$reg['ap_pat_empleado'];
		        	$mensaje =  "La tarjeta está registrada a nombre de ".$nombre;
		        	echo '<script language="javascript">';
						echo 'alert("'.$mensaje.'");';
						echo 'window.history.back();';
					echo '</script>';	        	
		        	return true;
		        }
	        }
	    }else{
	    	return false;
	    }
	}
 ?>