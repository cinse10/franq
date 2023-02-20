<?php 
	include("conexion.php");
	$codigo = $_POST['codigo'];

	$kuerin = "Select * from vicky_form where cod_barras_vf='".$codigo."'";
	$res = mysqli_query($conexion,$kuerin);
	$num = mysqli_num_rows($res);
	if ($num==1) {
		while($producto = mysqli_fetch_array($res)){
			$id_biky = $producto['id_biky'];
			$cadena = "Codigo: ".$producto['cod_barras_vf']."\nDescripcion: ".$producto['descripcion_vf']."\nColor: ".$producto['color_vf']."\nTalla: ".$producto['talla_vf'];
			$kuerito = "INSERT INTO `base_vicky`(`id_biky`) VALUES (".$id_biky.")";
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
