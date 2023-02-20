<?php 
	include("conexion.php");
	$id_empleado = $_POST['id_empleado'];
	$password = $_POST['password1'];
	$password2 = $_POST['password2'];
	if ($password == $password2) {
		$sql = "UPDATE `empleados` SET `id_acceso_empleado`='".$password."' WHERE id_empleado=".$id_empleado;
		if(mysqli_query($conexion,$sql)){
			echo '<script language="javascript">';
				$mensaje = $password.'-'.$password2;	
				echo 'alert("Contraseña actualizada con éxito");';
				echo 'window.location="index.php";';
			echo '</script>';
		}else{
			echo '<script language="javascript">';	
				echo 'alert("Ocurrió un error al actualizar contraseña.");';
				echo 'window.history.back();';
			echo '</script>';
		}
	}else{
		echo '<script language="javascript">';	
			echo 'alert("Las contraseñas no coinciden.");';
			echo 'window.location="index.php";';
		echo '</script>';
	}
 ?>