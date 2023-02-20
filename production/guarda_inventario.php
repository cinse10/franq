<?php 
	include("conexion.php");
	$codigo = $_POST['codigo'];
	$marca = $_POST['marca'];

	if ($marca == 3) {
		$kuerin = "Select * from productos where codigo_barras_producto='".$codigo."'";
		$res = mysqli_query($conexion,$kuerin);
		$num = mysqli_num_rows($res);
		if ($num==1) {
			while($producto = mysqli_fetch_array($res)){
				$cadena = "Codigo: ".$producto['codigo_barras_producto']."\nNombre: ".$producto['nombre_producto'];
				$kuerin2 = "Select * from inventario_intima where cod_barras='".$codigo."'";
				$res2 = mysqli_query($conexion,$kuerin2);
				$num2 = mysqli_num_rows($res2);
				if ($num2==1) {
					while($producto2 = mysqli_fetch_array($res2)){
						$inventario = $producto2['inventario'] + 1;
						$sql = "UPDATE  `inventario_intima` SET `inventario`= ".$inventario." WHERE cod_barras='".$codigo."'";
						if(mysqli_query($conexion,$sql)){
						echo $cadena;
						}else{
							echo '0';
						}	
					}
				}else{
					$kuerito = "INSERT INTO `inventario_intima`(`cod_barras`, `inventario`) VALUES ('".$codigo."', '1')";
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
	}

	if ($marca == 4) {
		$kuerin = "Select * from vicky_form where cod_barras_vf='".$codigo."'";
		$res = mysqli_query($conexion,$kuerin);
		$num = mysqli_num_rows($res);
		if ($num==1) {
			while($producto = mysqli_fetch_array($res)){
				$id_biky = $producto['id_biky'];
				$cadena = "Codigo: ".$producto['cod_barras_vf']."\nDescripcion: ".$producto['descripcion_vf']."\nColor: ".$producto['color_vf']."\nTalla: ".$producto['talla_vf'];
				$kuerin2 = "Select * from inventario_vicky where cod_barras='".$codigo."'";
				$res2 = mysqli_query($conexion,$kuerin2);
				$num2 = mysqli_num_rows($res2);
				if ($num2==1) {
					while($producto2 = mysqli_fetch_array($res2)){
						$inventario = $producto2['inventario'] + 1;
						$sql = "UPDATE  `inventario_vicky` SET `inventario`= ".$inventario." WHERE cod_barras='".$codigo."'";
						if(mysqli_query($conexion,$sql)){
						echo $cadena;
						}else{
							echo '0';
						}	
					}
				}else{
					$kuerito = "INSERT INTO `inventario_vicky`(`cod_barras`, `inventario`) VALUES ('".$codigo."', '1')";
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
	}
	if ($marca == 5) {
		$kuerin = "Select * from terra where cod_barras='".$codigo."'";
		$res = mysqli_query($conexion,$kuerin);
		$num = mysqli_num_rows($res);
		if ($num==1) {
			while($producto = mysqli_fetch_array($res)){
				$id_terra = $producto['id_terra'];
				$cadena = "Codigo: ".$producto['cod_barras']."\nMarca: ".$producto['marca']."\nColor: ".$producto['color']."\nTalla: ".$producto['talla_cod_barras'];
				$kuerin2 = "Select * from inventario_terra where cod_barras='".$codigo."'";
				$res2 = mysqli_query($conexion,$kuerin2);
				$num2 = mysqli_num_rows($res2);
				if ($num2==1) {
					while($producto2 = mysqli_fetch_array($res2)){
						$inventario = $producto2['inventario'] + 1;
						$sql = "UPDATE  `inventario_terra` SET `inventario`= ".$inventario." WHERE cod_barras='".$codigo."'";
						if(mysqli_query($conexion,$sql)){
						echo $cadena;
						}else{
							echo '0';
						}	
					}
				}else{
					$kuerito = "INSERT INTO `inventario_terra`(`cod_barras`, `inventario`) VALUES ('".$codigo."', '1')";
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
	}
	if ($marca == 6) {
		$kuerin = "Select * from cklass where codigo_barras_producto='".$codigo."'";
		$res = mysqli_query($conexion,$kuerin);
		$num = mysqli_num_rows($res);
		if ($num==1) {
			while($producto = mysqli_fetch_array($res)){
				$id_cklass = $producto['id_cklass'];
				$cadena = "Codigo: ".$producto['codigo_barras_producto']."\nModelo: ".$producto['modelo_ck']."\nColor: ".$producto['color_ck']."\nTalla: ".$producto['talla_ck'];
				$kuerin2 = "Select * from inventario_cklass where cod_barras='".$codigo."'";
				$res2 = mysqli_query($conexion,$kuerin2);
				$num2 = mysqli_num_rows($res2);
				if ($num2==1) {
					while($producto2 = mysqli_fetch_array($res2)){
						$inventario = $producto2['inventario'] + 1;
						$sql = "UPDATE  `inventario_cklass` SET `inventario`= ".$inventario." WHERE cod_barras='".$codigo."'";
						if(mysqli_query($conexion,$sql)){
						echo $cadena;
						}else{
							echo '0';
						}	
					}
				}else{
					$kuerito = "INSERT INTO `inventario_cklass`(`cod_barras`, `inventario`) VALUES ('".$codigo."', '1')";
					if(mysqli_query($conexion,$kuerito)){
						echo $cadena;
					}else{
						echo '0';
					}			
				}

			}
		}
		else{
			$sql = "Select * from productos_cklass where codigo_barras_producto='".$codigo."'";
			$res = mysqli_query($conexion,$sql);
			$num = mysqli_num_rows($res);
			if ($num==1) {
				while($producto = mysqli_fetch_array($res)){
					$cadena = "Codigo: ".$producto['codigo_barras_producto']."\nModelo: ".$producto['modelo_producto']."\nColor: ".$producto['color_producto']."\nTalla: ".$producto['talla_producto'];
					$kuerin2 = "Select * from inventario_cklass where cod_barras='".$codigo."'";
					$res2 = mysqli_query($conexion,$kuerin2);
					$num2 = mysqli_num_rows($res2);
					if ($num2==1) {
						while($producto2 = mysqli_fetch_array($res2)){
							$inventario = $producto2['inventario'] + 1;
							$sql = "UPDATE  `inventario_cklass` SET `inventario`= ".$inventario." WHERE cod_barras='".$codigo."'";
							if(mysqli_query($conexion,$sql)){
							echo $cadena;
							}else{
								echo '0';
							}	
						}
					}else{
						$kuerito = "INSERT INTO `inventario_cklass`(`cod_barras`, `inventario`) VALUES ('".$codigo."', '1')";
						if(mysqli_query($conexion,$kuerito)){
							echo $cadena;
						}else{
							echo '0';
						}			
					}

				}
			}else{
				echo '7';
			}		
		}
	}
	if ($marca == 12) {
		$kuerin = "Select * from chiqui_mundo where codigo_barras_producto='".$codigo."'";
		$res = mysqli_query($conexion,$kuerin);
		$num = mysqli_num_rows($res);
		if ($num==1) {
			while($producto = mysqli_fetch_array($res)){
				$id_chiqui = $producto['id_chiqui'];
				$cadena = "Codigo: ".$producto['codigo_barras_producto']."\nModelo: ".$producto['descripcion']."\nNombre: ".$producto['nombre_producto'];
				$kuerin2 = "Select * from inventario_chiqui where cod_barras='".$codigo."'";
				$res2 = mysqli_query($conexion,$kuerin2);
				$num2 = mysqli_num_rows($res2);
				if ($num2==1) {
					while($producto2 = mysqli_fetch_array($res2)){
						$inventario = $producto2['inventario'] + 1;
						$sql = "UPDATE  `inventario_chiqui` SET `inventario`= ".$inventario." WHERE cod_barras='".$codigo."'";
						if(mysqli_query($conexion,$sql)){
						echo $cadena;
						}else{
							echo '0';
						}	
					}
				}else{
					$kuerito = "INSERT INTO `inventario_chiqui`(`cod_barras`, `inventario`) VALUES ('".$codigo."', '1')";
					if(mysqli_query($conexion,$kuerito)){
						echo $cadena;
					}else{
						echo '0';
					}			
				}

			}
		}
		else{
			$sql = "Select * from productos_chiqui where codigo_barras='".$codigo."'";
			$res = mysqli_query($conexion,$sql);
			$num = mysqli_num_rows($res);
			if ($num==1) {
				while($producto = mysqli_fetch_array($res)){
					$cadena = "Codigo: ".$producto['codigo_barras']."\nModelo: ".$producto['descripcion']."\nNombre: ".$producto['nombre_producto'];
					$kuerin2 = "Select * from inventario_chiqui where cod_barras='".$codigo."'";
					$res2 = mysqli_query($conexion,$kuerin2);
					$num2 = mysqli_num_rows($res2);
					if ($num2==1) {
						while($producto2 = mysqli_fetch_array($res2)){
							$inventario = $producto2['inventario'] + 1;
							$sql = "UPDATE  `inventario_chiqui` SET `inventario`= ".$inventario." WHERE cod_barras='".$codigo."'";
							if(mysqli_query($conexion,$sql)){
							echo $cadena;
							}else{
								echo '0';
							}	
						}
					}else{
						$kuerito = "INSERT INTO `inventario_chiqui`(`cod_barras`, `inventario`) VALUES ('".$codigo."', '1')";
						if(mysqli_query($conexion,$kuerito)){
							echo $cadena;
						}else{
							echo '0';
						}			
					}

				}
			}else{
				echo '7';
			}		
		}
	}

	
 ?>