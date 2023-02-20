<?php 
	include("conexion.php");
	$nombre_plan = $_POST['nombre_plan'];
	$precio_plan = $_POST['precio_plan'];	
	$descripcion_plan = $_POST['descripcion_plan'];	
	$id_empleado = $_POST['id_empleado'];	
	$duracion_plan = $_POST['duracion_plan'];	
	$otra_duracion = $_POST['otra_duracion'];
	$vigencia_plan = $_POST['vigencia_plan'];
	if (!is_numeric($precio_plan)) {
		echo '<script language="javascript">';
			echo 'alert("El campo precio, solo puede contener números enteros.");';
			echo 'window.location="agrega_planes.php";';
		echo '</script>';
	}else{
		if ((int) $precio_plan<=0) {
			echo '<script language="javascript">';
				echo 'alert("El campo precio de plan, tiene que ser mayor a $1.");';
				echo 'window.location="agrega_planes.php";';
			echo '</script>';
		}

		$duracion;
		
		$date = new DateTime($vigencia_plan);
		$fecha_vigencia_plan = date_format($date, 'Y-m-d');
		if ($otra_duracion=="") {
			$duracion=$duracion_plan;
		}else{
			if (is_int((int)$otra_duracion)) {
				$duracion=$otra_duracion;
				if ((int)$otra_duracion<=0){
					echo '<script language="javascript">';
						echo 'alert("El campo otra duración, tiene que ser mayor a 1 día.");';
						echo 'window.location="agrega_planes.php";';
					echo '</script>';
				}
			}else{
				echo '<script language="javascript">';
					echo 'alert("El campo otra duración, solo puede contener números.");';
					echo 'window.location="agrega_planes.php";';
				echo '</script>';
			}
			
		}
		

		if(!validaRepetidos($nombre_plan)){ 
			$sql = "INSERT INTO `planes`(`nombre_plan`, `costo_plan`, `descripcion_plan`, `id_empleado`, `vigencia_plan`, `duracion_plan`) VALUES ('".$nombre_plan."','".$precio_plan."','".$descripcion_plan."',".$id_empleado.",'".$fecha_vigencia_plan."',".$duracion.")";
			if(mysqli_query($conexion,$sql)){
				$mensaje = "El plan ".$nombre_plan." se ha registrado con éxito, con vigencia al ".$vigencia_plan;
				echo '<script language="javascript">';
					echo 'alert("'.$mensaje.'");';
					echo 'window.location="agrega_planes.php";';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
					echo 'alert("Ocurrió un error al intentar guardar los datos.");';
					echo 'window.location="agrega_planes.php";';
				echo '</script>';
			}
		}
	}

	

	//Función que valida que el dato a registrar, no exista uno con nombre muy similar.
	function validaRepetidos($nombre_plan){
		include("conexion.php");
		$sql = "select * from planes where nombre_plan LIKE '%".$nombre_plan."%'";
		$requi = mysqli_query($conexion,$sql);
		$totalFilas=mysqli_num_rows($requi);
	    if($totalFilas>0){
	    	while ($reg=mysqli_fetch_array($requi)) {
	        	$nombre = $reg['nombre_plan'];
	        	$mensaje =  "El plan existe y se llama ".$nombre;
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