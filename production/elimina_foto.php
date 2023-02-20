<?php
include("conexion.php");
	if (isset($_POST['imagen_socio'])) {
	 	if ($_POST['imagen_socio']=="") {
		echo '<script language="javascript">';
			echo 'window.history.back();';
		echo '</script>';
		}else{
			if(unlink($_POST['imagen_socio'])){
				echo '<script language="javascript">';
					echo 'window.history.back();';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
					echo 'window.history.back();';
				echo '</script>';
			}
		}
	} 
	if (isset($_GET['imagen_socio'])) {
		if ($_GET['imagen_socio']=="") {
		echo '<script language="javascript">';
			echo 'window.history.back();';
		echo '</script>';
		}else{
			mysqli_query($conexion,"update socios set imagen_socio='' WHERE id_socio=".$_GET['id_socio']);
			if(unlink($_GET['imagen_socio'])){				
				echo '<script language="javascript">';
					echo 'window.history.back();';
				echo '</script>';
			}else{
				echo '<script language="javascript">';
					echo 'window.history.back();';
				echo '</script>';
			}
		}
	}
	
 ?>