<?php 
	include("conexion.php");
	$codigo = $_POST['codigo'];

	$kuerin = "Select * from productos_marykay where codigo_producto='".$codigo."'";
	$res = mysqli_query($conexion,$kuerin);
	$num = mysqli_num_rows($res);
	if ($num==1) {
		while($producto = mysqli_fetch_array($res)){
			$id_marykay = $producto['id_producto'];
			$cadena = "Codigo: ".$producto['codigo_producto']."\nNombre: ".$producto['nombre_producto'];
			$sqli = "Select * from base_marykay where id_marykay='".$id_marykay."'";
			$reng = mysqli_query($conexion,$sqli);
			$unm = mysqli_num_rows($reng);
			if ($unm==1) {
				while($produc = mysqli_fetch_array($reng)){
					$inventario = $produc['inventario_mary']+1;					
					$kuerito = "UPDATE `base_marykay` SET `inventario_mary`=".$inventario." WHERE id_marykay=".$id_marykay;
					if(mysqli_query($conexion,$kuerito)){
						echo $cadena;
					}else{
						echo '0';
					}	
				}
			}else{
				$kuerito = "INSERT INTO `base_marykay`(`id_marykay`) VALUES (".$id_marykay.")";
				if(mysqli_query($conexion,$kuerito)){
					echo $cadena;
				}else{
					echo '0';
				}	
			}		
		}
	} 
	else{
		echo '7';
	}
 ?>


			