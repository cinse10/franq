<?php  
//Valida que exista una petición de tipo POST, recopila datos y realiza una
//consulta a BD para validar que el empleado acceda
	if (isset($_POST['id_acceso'])) {
		include("conexion.php");
		$id_acceso = $_POST['id_acceso'];
		$user = $_POST['user'];
		$kueri = "SELECT * FROM empleados WHERE usuario_empleado='".$user."' AND id_acceso_empleado='".$id_acceso."'";
		$resp = mysqli_query($conexion,$kueri);
		@$num = mysqli_num_rows($resp);
		if ($num==1) {
			while($empleado = mysqli_fetch_array($resp)){
				if($empleado['activo']!=0){
					session_start();

					$nombre = $empleado['nombre_empleado']." ".$empleado['ap_pat_empleado'];
					$id_empleado = $empleado['id_empleado'];
					$_SESSION["id_empleado"]=$empleado['id_empleado'];
					$_SESSION["nombre_empleado"]=$nombre;
					echo $id_empleado."|".$nombre;
				}else{
					echo 0;
				}
			}			
		}else{
			echo 0;
		}
	}else{
		echo 0;
	}
	 
	

 ?>


	
