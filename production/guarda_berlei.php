<?php 
	include("conexion.php");
	$codigo = $_POST['codigo'];

	$kuerin = "Select * from berlei where cod_barras='".$codigo."'";
	$res = mysqli_query($conexion,$kuerin);
	$num = mysqli_num_rows($res);
	if ($num==1) {
		while($producto = mysqli_fetch_array($res)){
			$id_berlei = $producto['id_berlei'];
			$cadena = "Codigo: ".$producto['cod_barras']."\nDescripcion: ".$producto['descripcion']."\nColor: ".$producto['color']."\nTalla: ".$producto['talla'];
			$kuerito = "INSERT INTO `base_berlei`(`id_berlei`) VALUES (".$id_berlei.")";
			if(mysqli_query($conexion,$kuerito)){
				echo $cadena;
			}else{
				echo '0';
			}			
		}
	}
	else{
		
		echo '16';
	
	}
 ?>
