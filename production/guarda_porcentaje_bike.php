<?php 
	include("conexion.php");
	if (isset($_POST['ppp']) && isset($_POST['ppd'])) {
		$ppp = $_POST['ppp'];
		$ppd = $_POST['ppd'];
		$ppi = $_POST['ppi'];
		
		$sql = "UPDATE `porcentaje_bike` SET `p_publico`= '".$ppp."',`p_publico_desc`= '".$ppd."',`p_internet`= '".$ppi."' WHERE `id_porcentaje`= 1 ";
		if(mysqli_query($conexion,$sql)){
			echo '<script language="javascript">';
				echo 'alert("Almacenado con éxito.");';
				echo 'window.location="consulta_productos_bike.php";';
			echo '</script>';
		}else{
			echo '<script language="javascript">';
				echo 'alert("Ocurrió un error al intentar guardar los datos.");';
				echo 'window.history.back();";';
			echo '</script>';
		}
	}else{
		echo '<script language="javascript">';
			echo 'alert("Los datos estan vacios.");';
			echo 'window.location="consulta_productos_bike.php";';
		echo '</script>';
	}


 ?>