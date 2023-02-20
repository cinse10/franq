<?php 
include("conexion.php");
	$sqlun = "SELECT * FROM `productos_bike` WHERE tipo_accesorio=3";
	 $requi = mysqli_query($conexion,$sqlun);
	while ($reg=mysqli_fetch_array($requi)) {
		$id_producto = $reg['id_producto'];
		$p_compra = $reg['precio_compra'];
		$precio_publico = ceil(($reg['precio_compra'] *1.16) * 1.38);

		$sql = "UPDATE `productos_bike` SET `precio_publico`=".$precio_publico.",`precio_publico_desc`='".$precio_publico."' WHERE id_producto=".$id_producto;
		
		if(mysqli_query($conexion,$sql)){
			echo '<script language="javascript">';
				echo 'console.log("Prod");';
			echo '</script>';
		}else{
			echo '<script language="javascript">';
				echo 'alert("Ocurrió un error al guardar los datos");';
				echo 'window.history.back();';
			echo '</script>';
		}	
	}
 ?>