<?php 
	include("conexion.php");
	$codigo = $_POST['codigo'];

	$kuerin = "Select * from chiqui_mundo where codigo_barras_producto='".$codigo."'";
	$res = mysqli_query($conexion,$kuerin);
	$num = mysqli_num_rows($res);
	if ($num==1) {
		while($producto = mysqli_fetch_array($res)){
			$id_chiqui = $producto['id_chiqui'];
			$cadena = "Codigo: ".$producto['codigo_barras_producto']."\nNombre: ".$producto['nombre_producto']."\nCodigo: ".$producto['codigo_barras_producto'];
			$kuerito = "INSERT INTO `base_chiqui`(`id_chiqui`) VALUES (".$id_chiqui.")";
			if(mysqli_query($conexion,$kuerito)){
				echo $cadena;
			}else{
				echo '0';
			}			
		}
	}
	else{
		echo '7';
	}
 ?>