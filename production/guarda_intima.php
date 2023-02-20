<?php 
	include("conexion.php");
	$codigo = $_POST['codigo'];

	$kuerin = "Select * from intima where codigo_intima='".$codigo."'";
	$res = mysqli_query($conexion,$kuerin);
	$num = mysqli_num_rows($res);
	if ($num==1) {
		while($producto = mysqli_fetch_array($res)){
			$id_intima = $producto['id_intima'];
			$cadena = "Codigo: ".$producto['codigo_intima']."\nNombre: ".$producto['descripcion_intima'];
			$kuerito = "INSERT INTO `base_intima`(`id_intima`) VALUES (".$id_intima.")";
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