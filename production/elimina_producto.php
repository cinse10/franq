<?php 
	include("conexion.php");
		
	if (isset($_POST['id_ticket'])) {
		$id_ticket=$_POST['id_ticket'];
		$marca = $_POST['marca'];
		$id_transaccion = $_POST['id_transaccion'];
		if ($marca ==1) {
			$kueri = "SELECT * FROM `transacciones_cklass`  INNER JOIN productos_cklass ON transacciones_cklass.id_producto=productos_cklass.id_producto  WHERE id_transaccion=".$id_transaccion;
			if (mysqli_query($conexion,$kueri)){
				$respuesta2=mysqli_query($conexion,$kueri);
				while($producto = mysqli_fetch_array($respuesta2)){
					$precio = $producto['precio_venta'];
					$id_producto = $producto['id_producto']; 				
					$inventario = $producto['inventario_procklass'] + 1;	
					$sql2 ="UPDATE `productos_cklass` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
					mysqli_query($conexion,$sql2);
				}
				$kueri2 = "SELECT * FROM `tickets_cklass`  INNER JOIN socios_cklass ON tickets_cklass.id_cliente=socios_cklass.id_socio  WHERE id_ticket=".$id_ticket;
				if (mysqli_query($conexion,$kueri2)){
					$respuesta=mysqli_query($conexion,$kueri2);
					while($pro = mysqli_fetch_array($respuesta)){
						$saldo = $pro['saldo'];
						$id_socio = $pro['id_socio'];
						$sfinal = $saldo + $precio;
						$sql4 = "UPDATE `socios_cklass` SET `saldo`='".$sfinal."' WHERE id_socio=".$id_socio;
						mysqli_query($conexion,$sql4);
					}
				}
				
				$sql3 = "UPDATE `transacciones_cklass` SET `precio_venta`='0' WHERE id_transaccion=".$id_transaccion;
				if(mysqli_query($conexion,$sql3)){
						echo $id_ticket;
					}
					else{
						echo 0;
					}		
				// $sql8 = "SELECT * FROM `tickets_cklass` WHERE id_ticket=".$id_ticket;
				// $resp = mysqli_query($conexion,$sql8);
				// while($prod = mysqli_fetch_array($resp)){
				// 	$total_ticket = $prod ['total_ticket'];
				// 	$total_final = $total_ticket - $precio;
				// 	$sql = "UPDATE `tickets_cklass` SET `total_ticket`='".$total_final."'  WHERE id_ticket=".$id_ticket;
				// 	if(mysqli_query($conexion,$sql)){
				// 		echo $id_ticket;
				// 	}
				// 	else{
				// 		echo 0;
				// 	}							
				// }
			}else{
				echo 0;
			}	
		}
		if ($marca ==2) {
			$kueri = "SELECT * FROM `transacciones_cklass_promo`  INNER JOIN productos_cklass ON transacciones_cklass_promo.id_producto=productos_cklass.id_producto  WHERE id_transaccion=".$id_transaccion;
			if (mysqli_query($conexion,$kueri)){
				$respuesta2=mysqli_query($conexion,$kueri);
				while($producto = mysqli_fetch_array($respuesta2)){
					$precio = $producto['precio_venta'];
					$id_producto = $producto['id_producto']; 				
					$inventario = $producto['inventario_procklass'] + 1;	
					$sql2 ="UPDATE `productos_cklass` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
					mysqli_query($conexion,$sql2);
				}
				$kueri2 = "SELECT * FROM `tickets_cklass_promo`  INNER JOIN socios_cklass ON tickets_cklass_promo.id_cliente=socios_cklass.id_socio  WHERE id_ticket=".$id_ticket;
				if (mysqli_query($conexion,$kueri2)){
					$respuesta=mysqli_query($conexion,$kueri2);
					while($pro = mysqli_fetch_array($respuesta)){
						$saldo = $pro['saldo'];
						$id_socio = $pro['id_socio'];
						$sfinal = $saldo + $precio;
						$sql4 = "UPDATE `socios_cklass` SET `saldo`='".$sfinal."' WHERE id_socio=".$id_socio;
						mysqli_query($conexion,$sql4);
					}
				}
				
				$sql3 = "UPDATE `transacciones_cklass_promo` SET `precio_venta`='0' WHERE id_transaccion=".$id_transaccion;
				if(mysqli_query($conexion,$sql3)){
					echo $id_ticket;
				}
				else{
					echo 0;
				}
				// $sql8 = "SELECT * FROM `tickets_cklass_promo` WHERE id_ticket=".$id_ticket;
				// $resp = mysqli_query($conexion,$sql8);
				// while($prod = mysqli_fetch_array($resp)){
				// 	$total_ticket = $prod ['total_ticket'];
				// 	$total_final = $total_ticket - $precio;
				// 	$sql = "UPDATE `tickets_cklass_promo` SET `total_ticket`='".$total_final."'  WHERE id_ticket=".$id_ticket;
				// 	if(mysqli_query($conexion,$sql)){
				// 		echo $id_ticket;
				// 	}
				// 	else{
				// 		echo 0;
				// 	}							
				// }
			}else{
				echo 0;
			}	
		}
		if ($marca ==3) {
			$kueri = "SELECT * FROM `transacciones_cklass_op`  INNER JOIN productos_cklass ON transacciones_cklass_op.id_producto=productos_cklass.id_producto  WHERE id_transaccion=".$id_transaccion;
			if (mysqli_query($conexion,$kueri)){
				$respuesta2=mysqli_query($conexion,$kueri);
				while($producto = mysqli_fetch_array($respuesta2)){
					$precio = $producto['precio_venta'];
					$id_producto = $producto['id_producto']; 				
					$inventario = $producto['inventario_procklass'] + 1;	
					$sql2 ="UPDATE `productos_cklass` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
					mysqli_query($conexion,$sql2);
				}
				$kueri2 = "SELECT * FROM `tickets_cklass_op`  INNER JOIN socios_cklass ON tickets_cklass_op.id_cliente=socios_cklass.id_socio  WHERE id_ticket=".$id_ticket;
				if (mysqli_query($conexion,$kueri2)){
					$respuesta=mysqli_query($conexion,$kueri2);
					while($pro = mysqli_fetch_array($respuesta)){
						$saldo = $pro['saldo'];
						$id_socio = $pro['id_socio'];
						$sfinal = $saldo + $precio;
						$sql4 = "UPDATE `socios_cklass` SET `saldo`='".$sfinal."' WHERE id_socio=".$id_socio;
						mysqli_query($conexion,$sql4);
					}
				}
				
				$sql3 = "UPDATE `transacciones_cklass_op` SET `precio_venta`='0' WHERE id_transaccion=".$id_transaccion;
				if(mysqli_query($conexion,$sql3)){
					echo $id_ticket;
				}
				else{
					echo 0;
				}
				// $sql8 = "SELECT * FROM `tickets_cklass_op` WHERE id_ticket=".$id_ticket;
				// $resp = mysqli_query($conexion,$sql8);
				// while($prod = mysqli_fetch_array($resp)){
				// 	$total_ticket = $prod ['total_ticket'];
				// 	$total_final = $total_ticket - $precio;
				// 	$sql = "UPDATE `tickets_cklass_op` SET `total_ticket`='".$total_final."'  WHERE id_ticket=".$id_ticket;
				// 	if(mysqli_query($conexion,$sql)){
				// 		echo $id_ticket;
				// 	}
				// 	else{
				// 		echo 0;
				// 	}							
				// }
			}else{
				echo 0;
			}	
		}

		if ($marca ==4) {
			$kueri = "SELECT * FROM `transacciones_vicky`  INNER JOIN productos_vicky ON transacciones_vicky.id_producto=productos_vicky.id_producto  WHERE id_transaccion=".$id_transaccion;
			if (mysqli_query($conexion,$kueri)){
				$respuesta2=mysqli_query($conexion,$kueri);
				while($producto = mysqli_fetch_array($respuesta2)){
					$precio = $producto['precio_venta'];
					$id_producto = $producto['id_producto']; 				
					$inventario = $producto['inventario_producto'] + 1;	
					$sql2 ="UPDATE `productos_vicky` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
					mysqli_query($conexion,$sql2);
				}
				$kueri2 = "SELECT * FROM `tickets_vicky`  INNER JOIN socios_vicky ON tickets_vicky.id_cliente=socios_vicky.id_socio  WHERE id_ticket=".$id_ticket;
				if (mysqli_query($conexion,$kueri2)){
					$respuesta=mysqli_query($conexion,$kueri2);
					while($pro = mysqli_fetch_array($respuesta)){
						$saldo = $pro['saldo'];
						$id_socio = $pro['id_socio'];
						$sfinal = $saldo + $precio;
						$sql4 = "UPDATE `socios_vicky` SET `saldo`='".$sfinal."' WHERE id_socio=".$id_socio;
						mysqli_query($conexion,$sql4);
					}
				}
				
				$sql3 = "UPDATE `transacciones_vicky` SET `precio_venta`='0' WHERE id_transaccion=".$id_transaccion;
				if(mysqli_query($conexion,$sql3)){
					echo $id_ticket;
				}
				else{
					echo 0;
				}
				// $sql8 = "SELECT * FROM `tickets_vicky` WHERE id_ticket=".$id_ticket;
				// $resp = mysqli_query($conexion,$sql8);
				// while($prod = mysqli_fetch_array($resp)){
				// 	$total_ticket = $prod ['total_ticket'];
				// 	$total_final = $total_ticket - $precio;
				// 	$sql = "UPDATE `tickets_vicky` SET `total_ticket`='".$total_final."'  WHERE id_ticket=".$id_ticket;
				// 	if(mysqli_query($conexion,$sql)){
				// 		echo $id_ticket;
				// 	}
				// 	else{
				// 		echo 0;
				// 	}							
				// }
			}else{
				echo 0;
			}	
		}			
		if ($marca ==5) {
			$kueri = "SELECT * FROM `transacciones_desc_vicky`  INNER JOIN productos_vicky ON transacciones_desc_vicky.id_producto=productos_vicky.id_producto  WHERE id_transaccion=".$id_transaccion;
			if (mysqli_query($conexion,$kueri)){
				$respuesta2=mysqli_query($conexion,$kueri);
				while($producto = mysqli_fetch_array($respuesta2)){
					$precio = $producto['precio_venta'];
					$id_producto = $producto['id_producto']; 				
					$inventario = $producto['inventario_producto'] + 1;	
					$sql2 ="UPDATE `productos_vicky` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
					mysqli_query($conexion,$sql2);
				}
				$kueri2 = "SELECT * FROM `tickets_desc_vicky`  INNER JOIN socios_vicky ON tickets_desc_vicky.id_cliente=socios_vicky.id_socio  WHERE id_ticket=".$id_ticket;
				if (mysqli_query($conexion,$kueri2)){
					$respuesta=mysqli_query($conexion,$kueri2);
					while($pro = mysqli_fetch_array($respuesta)){
						$saldo = $pro['saldo'];
						$id_socio = $pro['id_socio'];
						$sfinal = $saldo + $precio;
						$sql4 = "UPDATE `socios_vicky` SET `saldo`='".$sfinal."' WHERE id_socio=".$id_socio;
						mysqli_query($conexion,$sql4);
					}
				}
				
				$sql3 = "UPDATE `transacciones_desc_vicky` SET `precio_venta`='0' WHERE id_transaccion=".$id_transaccion;
				if(mysqli_query($conexion,$sql3)){
					echo $id_ticket;
				}
				else{
					echo 0;
				}
				// $sql8 = "SELECT * FROM `tickets_desc_vicky` WHERE id_ticket=".$id_ticket;
				// $resp = mysqli_query($conexion,$sql8);
				// while($prod = mysqli_fetch_array($resp)){
				// 	$total_ticket = $prod ['total_ticket'];
				// 	$total_final = $total_ticket - $precio;
				// 	$sql = "UPDATE `tickets_desc_vicky` SET `total_ticket`='".$total_final."'  WHERE id_ticket=".$id_ticket;
				// 	if(mysqli_query($conexion,$sql)){
				// 		echo $id_ticket;
				// 	}
				// 	else{
				// 		echo 0;
				// 	}							
				// }
			}else{
				echo 0;
			}		
		}
		if ($marca ==6) {
			$kueri = "SELECT * FROM `transacciones_terra`  INNER JOIN productos_terra ON transacciones_terra.id_producto=productos_terra.id_producto  WHERE id_transaccion=".$id_transaccion;
			if (mysqli_query($conexion,$kueri)){
				$respuesta2=mysqli_query($conexion,$kueri);
				while($producto = mysqli_fetch_array($respuesta2)){
					$precio = $producto['precio_venta'];
					$id_producto = $producto['id_producto']; 				
					$inventario = $producto['inventario_producto'] + 1;	
					$sql2 ="UPDATE `productos_terra` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
					mysqli_query($conexion,$sql2);
				}
				$kueri2 = "SELECT * FROM `tickets_terra`  INNER JOIN socios_terra ON tickets_terra.id_cliente=socios_terra.id_socio  WHERE id_ticket=".$id_ticket;
				if (mysqli_query($conexion,$kueri2)){
					$respuesta=mysqli_query($conexion,$kueri2);
					while($pro = mysqli_fetch_array($respuesta)){
						$saldo = $pro['saldo'];
						$id_socio = $pro['id_socio'];
						$sfinal = $saldo + $precio;
						$sql4 = "UPDATE `socios_terra` SET `saldo`='".$sfinal."' WHERE id_socio=".$id_socio;
						mysqli_query($conexion,$sql4);
					}
				}
				
				$sql3 = "UPDATE `transacciones_terra` SET `precio_venta`='0' WHERE id_transaccion=".$id_transaccion;
				if(mysqli_query($conexion,$sql3)){
					echo $id_ticket;
				}
				else{
					echo 0;
				}
				// $sql8 = "SELECT * FROM `tickets_terra` WHERE id_ticket=".$id_ticket;
				// $resp = mysqli_query($conexion,$sql8);
				// while($prod = mysqli_fetch_array($resp)){
				// 	$total_ticket = $prod ['total_ticket'];
				// 	$total_final = $total_ticket - $precio;
				// 	$sql = "UPDATE `tickets_terra` SET `total_ticket`='".$total_final."'  WHERE id_ticket=".$id_ticket;
				// 	if(mysqli_query($conexion,$sql)){
				// 		echo $id_ticket;
				// 	}
				// 	else{
				// 		echo 0;
				// 	}							
				// }
			}else{
				echo 0;
			}				
		}
		if ($marca ==7) {
			$kueri = "SELECT * FROM `transacciones_terra_desc`  INNER JOIN productos_terra ON transacciones_terra_desc.id_producto=productos_terra.id_producto  WHERE id_transaccion=".$id_transaccion;
			if (mysqli_query($conexion,$kueri)){
				$respuesta2=mysqli_query($conexion,$kueri);
				while($producto = mysqli_fetch_array($respuesta2)){
					$precio = $producto['precio_venta'];
					$id_producto = $producto['id_producto']; 				
					$inventario = $producto['inventario_producto'] + 1;	
					$sql2 ="UPDATE `productos_terra` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
					mysqli_query($conexion,$sql2);
				}
				$kueri2 = "SELECT * FROM `tickets_terra_desc`  INNER JOIN socios_terra ON tickets_terra_desc.id_cliente=socios_terra.id_socio  WHERE id_ticket=".$id_ticket;
				if (mysqli_query($conexion,$kueri2)){
					$respuesta=mysqli_query($conexion,$kueri2);
					while($pro = mysqli_fetch_array($respuesta)){
						$saldo = $pro['saldo'];
						$id_socio = $pro['id_socio'];
						$sfinal = $saldo + $precio;
						$sql4 = "UPDATE `socios_terra` SET `saldo`='".$sfinal."' WHERE id_socio=".$id_socio;
						mysqli_query($conexion,$sql4);
					}
				}
				
				$sql3 = "UPDATE `transacciones_terra_desc` SET `precio_venta`='0' WHERE id_transaccion=".$id_transaccion;
				if(mysqli_query($conexion,$sql3)){
					echo $id_ticket;
				}
				else{
					echo 0;
				}
				// $sql8 = "SELECT * FROM `tickets_terra_desc` WHERE id_ticket=".$id_ticket;
				// $resp = mysqli_query($conexion,$sql8);
				// while($prod = mysqli_fetch_array($resp)){
				// 	$total_ticket = $prod ['total_ticket'];
				// 	$total_final = $total_ticket - $precio;
				// 	$sql = "UPDATE `tickets_terra_desc` SET `total_ticket`='".$total_final."'  WHERE id_ticket=".$id_ticket;
				// 	if(mysqli_query($conexion,$sql)){
				// 		echo $id_ticket;
				// 	}
				// 	else{
				// 		echo 0;
				// 	}							
				// }
			}else{
				echo 0;
			}				
		}
		if ($marca ==8) {
			$kueri = "SELECT * FROM `transacciones_intima`  INNER JOIN productos ON transacciones_intima.id_producto=productos.id_producto  WHERE id_transaccion=".$id_transaccion;
			if (mysqli_query($conexion,$kueri)){
				$respuesta2=mysqli_query($conexion,$kueri);
				while($producto = mysqli_fetch_array($respuesta2)){
					$precio = $producto['precio_venta'];
					$id_producto = $producto['id_producto']; 				
					$inventario = $producto['inventario_producto'] + 1;	
					$sql2 ="UPDATE `productos` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
					mysqli_query($conexion,$sql2);
				}
				$kueri2 = "SELECT * FROM `tickets_intima`  INNER JOIN socios ON tickets_intima.id_cliente=socios.id_socio  WHERE id_ticket=".$id_ticket;
				if (mysqli_query($conexion,$kueri2)){
					$respuesta=mysqli_query($conexion,$kueri2);
					while($pro = mysqli_fetch_array($respuesta)){
						$saldo = $pro['saldo'];
						$id_socio = $pro['id_socio'];
						$sfinal = $saldo + $precio;
						$sql4 = "UPDATE `socios` SET `saldo`='".$sfinal."' WHERE id_socio=".$id_socio;
						mysqli_query($conexion,$sql4);
					}
				}
				
				$sql3 = "UPDATE `transacciones_intima` SET `precio_venta`='0' WHERE id_transaccion=".$id_transaccion;
				if(mysqli_query($conexion,$sql3)){
					echo $id_ticket;
				}
				else{
					echo 0;
				}
				// $sql8 = "SELECT * FROM `tickets_terra` WHERE id_ticket=".$id_ticket;
				// $resp = mysqli_query($conexion,$sql8);
				// while($prod = mysqli_fetch_array($resp)){
				// 	$total_ticket = $prod ['total_ticket'];
				// 	$total_final = $total_ticket - $precio;
				// 	$sql = "UPDATE `tickets_terra` SET `total_ticket`='".$total_final."'  WHERE id_ticket=".$id_ticket;
				// 	if(mysqli_query($conexion,$sql)){
				// 		echo $id_ticket;
				// 	}
				// 	else{
				// 		echo 0;
				// 	}							
				// }
			}else{
				echo 0;
			}				
		}
		if ($marca ==9) {
			$kueri = "SELECT * FROM `transacciones_intima_bf`  INNER JOIN productos ON transacciones_intima_bf.id_producto=productos.id_producto  WHERE id_transaccion=".$id_transaccion;
			if (mysqli_query($conexion,$kueri)){
				$respuesta2=mysqli_query($conexion,$kueri);
				while($producto = mysqli_fetch_array($respuesta2)){
					$precio = $producto['precio_venta'];
					$id_producto = $producto['id_producto']; 				
					$inventario = $producto['inventario_producto'] + 1;	
					$sql2 ="UPDATE `productos` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
					mysqli_query($conexion,$sql2);
				}
				$kueri2 = "SELECT * FROM `tickets_intima_bf`  INNER JOIN socios ON tickets_intima_bf.id_cliente=socios.id_socio  WHERE id_ticket=".$id_ticket;
				if (mysqli_query($conexion,$kueri2)){
					$respuesta=mysqli_query($conexion,$kueri2);
					while($pro = mysqli_fetch_array($respuesta)){
						$saldo = $pro['saldo'];
						$id_socio = $pro['id_socio'];
						$sfinal = $saldo + $precio;
						$sql4 = "UPDATE `socios` SET `saldo`='".$sfinal."' WHERE id_socio=".$id_socio;
						mysqli_query($conexion,$sql4);
					}
				}
				
				$sql3 = "UPDATE `transacciones_intima_bf` SET `precio_venta`='0' WHERE id_transaccion=".$id_transaccion;
				if(mysqli_query($conexion,$sql3)){
					echo $id_ticket;
				}
				else{
					echo 0;
				}
				// $sql8 = "SELECT * FROM `tickets_terra` WHERE id_ticket=".$id_ticket;
				// $resp = mysqli_query($conexion,$sql8);
				// while($prod = mysqli_fetch_array($resp)){
				// 	$total_ticket = $prod ['total_ticket'];
				// 	$total_final = $total_ticket - $precio;
				// 	$sql = "UPDATE `tickets_terra` SET `total_ticket`='".$total_final."'  WHERE id_ticket=".$id_ticket;
				// 	if(mysqli_query($conexion,$sql)){
				// 		echo $id_ticket;
				// 	}
				// 	else{
				// 		echo 0;
				// 	}							
				// }
			}else{
				echo 0;
			}				
		}
		if ($marca ==12) {
			$kueri = "SELECT * FROM `transacciones_chiqui`  INNER JOIN productos_chiqui ON transacciones_chiqui.id_producto=productos_chiqui.id_producto  WHERE id_transaccion=".$id_transaccion;
			if (mysqli_query($conexion,$kueri)){
				$respuesta2=mysqli_query($conexion,$kueri);
				while($producto = mysqli_fetch_array($respuesta2)){
					$precio = $producto['precio_venta'];
					$id_producto = $producto['id_producto']; 				
					$inventario = $producto['inventario_producto'] + 1;	
					$sql2 ="UPDATE `productos_chiqui` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
					mysqli_query($conexion,$sql2);
				}
				$kueri2 = "SELECT * FROM `tickets_chiqui`  INNER JOIN socios_chiqui ON tickets_chiqui.id_cliente=socios_chiqui.id_socio  WHERE id_ticket=".$id_ticket;
				if (mysqli_query($conexion,$kueri2)){
					$respuesta=mysqli_query($conexion,$kueri2);
					while($pro = mysqli_fetch_array($respuesta)){
						$saldo = $pro['saldo'];
						$id_socio = $pro['id_socio'];
						$sfinal = $saldo + $precio;
						$sql4 = "UPDATE `socios_chiqui` SET `saldo`='".$sfinal."' WHERE id_socio=".$id_socio;
						mysqli_query($conexion,$sql4);
					}
				}
				
				$sql3 = "UPDATE `transacciones_chiqui` SET `precio_venta`='0' WHERE id_transaccion=".$id_transaccion;
				if(mysqli_query($conexion,$sql3)){
					echo $id_ticket;
				}
				else{
					echo 0;
				}
				// $sql8 = "SELECT * FROM `tickets_terra` WHERE id_ticket=".$id_ticket;
				// $resp = mysqli_query($conexion,$sql8);
				// while($prod = mysqli_fetch_array($resp)){
				// 	$total_ticket = $prod ['total_ticket'];
				// 	$total_final = $total_ticket - $precio;
				// 	$sql = "UPDATE `tickets_terra` SET `total_ticket`='".$total_final."'  WHERE id_ticket=".$id_ticket;
				// 	if(mysqli_query($conexion,$sql)){
				// 		echo $id_ticket;
				// 	}
				// 	else{
				// 		echo 0;
				// 	}							
				// }
			}else{
				echo 0;
			}				
		}
		if ($marca == 11) {
			$kueri = "SELECT * FROM `transacciones_dankriz`  INNER JOIN productos_dankriz ON transacciones_dankriz.id_producto=productos_dankriz.id_producto  WHERE id_transaccion=".$id_transaccion;
			if (mysqli_query($conexion,$kueri)){
				$respuesta2=mysqli_query($conexion,$kueri);
				while($producto = mysqli_fetch_array($respuesta2)){
					$precio = $producto['precio_venta'];
					$id_producto = $producto['id_producto']; 				
					$inventario = $producto['inventario_producto'] + 1;	
					$sql2 ="UPDATE `productos_dankriz` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
					mysqli_query($conexion,$sql2);
				}
				$kueri2 = "SELECT * FROM `tickets_dankriz`  INNER JOIN socios_dankriz ON tickets_dankriz.id_cliente=socios_dankriz.id_socio  WHERE id_ticket=".$id_ticket;
				if (mysqli_query($conexion,$kueri2)){
					$respuesta=mysqli_query($conexion,$kueri2);
					while($pro = mysqli_fetch_array($respuesta)){
						$saldo = $pro['saldo'];
						$id_socio = $pro['id_socio'];
						$sfinal = $saldo + $precio;
						$sql4 = "UPDATE `socios_dankriz` SET `saldo`='".$sfinal."' WHERE id_socio=".$id_socio;
						mysqli_query($conexion,$sql4);
					}
				}
				
				$sql3 = "UPDATE `transacciones_dankriz` SET `precio_venta`='0' WHERE id_transaccion=".$id_transaccion;
				if(mysqli_query($conexion,$sql3)){
					echo $id_ticket;
				}
				else{
					echo 0;
				}
				// $sql8 = "SELECT * FROM `tickets_terra` WHERE id_ticket=".$id_ticket;
				// $resp = mysqli_query($conexion,$sql8);
				// while($prod = mysqli_fetch_array($resp)){
				// 	$total_ticket = $prod ['total_ticket'];
				// 	$total_final = $total_ticket - $precio;
				// 	$sql = "UPDATE `tickets_terra` SET `total_ticket`='".$total_final."'  WHERE id_ticket=".$id_ticket;
				// 	if(mysqli_query($conexion,$sql)){
				// 		echo $id_ticket;
				// 	}
				// 	else{
				// 		echo 0;
				// 	}							
				// }
			}else{
				echo 0;
			}				
		}

		if ($marca == 13) {
			$kueri = "SELECT * FROM `transacciones_importados`  INNER JOIN productos_importados ON transacciones_importados.id_producto=productos_importados.id_producto  WHERE id_transaccion=".$id_transaccion;
			if (mysqli_query($conexion,$kueri)){
				$respuesta2=mysqli_query($conexion,$kueri);
				while($producto = mysqli_fetch_array($respuesta2)){
					$precio = $producto['precio_venta'];
					$id_producto = $producto['id_producto']; 				
					$inventario = $producto['inventario_producto'] + 1;	
					$sql2 ="UPDATE `productos_importados` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
					mysqli_query($conexion,$sql2);
				}
				$kueri2 = "SELECT * FROM `tickets_impotados`  INNER JOIN socios_dankriz ON tickets_importados.id_cliente=socios_dankriz.id_socio  WHERE id_ticket=".$id_ticket;
				if (mysqli_query($conexion,$kueri2)){
					$respuesta=mysqli_query($conexion,$kueri2);
					while($pro = mysqli_fetch_array($respuesta)){
						$saldo = $pro['saldo'];
						$id_socio = $pro['id_socio'];
						$sfinal = $saldo + $precio;
						$sql4 = "UPDATE `socios_dankriz` SET `saldo`='".$sfinal."' WHERE id_socio=".$id_socio;
						mysqli_query($conexion,$sql4);
					}
				}
				
				$sql3 = "UPDATE `transacciones_importados` SET `precio_venta`='0' WHERE id_transaccion=".$id_transaccion;
				if(mysqli_query($conexion,$sql3)){
					echo $id_ticket;
				}
				else{
					echo 0;
				}
				// $sql8 = "SELECT * FROM `tickets_terra` WHERE id_ticket=".$id_ticket;
				// $resp = mysqli_query($conexion,$sql8);
				// while($prod = mysqli_fetch_array($resp)){
				// 	$total_ticket = $prod ['total_ticket'];
				// 	$total_final = $total_ticket - $precio;
				// 	$sql = "UPDATE `tickets_terra` SET `total_ticket`='".$total_final."'  WHERE id_ticket=".$id_ticket;
				// 	if(mysqli_query($conexion,$sql)){
				// 		echo $id_ticket;
				// 	}
				// 	else{
				// 		echo 0;
				// 	}							
				// }
			}else{
				echo 0;
			}				
		}	if ($marca == 15) {
			$kueri = "SELECT * FROM `transacciones_berlei`  INNER JOIN productos_berlei ON transacciones_berlei.id_producto=productos_importados.id_producto  WHERE id_transaccion=".$id_transaccion;
			if (mysqli_query($conexion,$kueri)){
				$respuesta2=mysqli_query($conexion,$kueri);
				while($producto = mysqli_fetch_array($respuesta2)){
					$precio = $producto['precio_venta'];
					$id_producto = $producto['id_producto']; 				
					$inventario = $producto['inventario_producto'] + 1;	
					$sql2 ="UPDATE `productos_berlei` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
					mysqli_query($conexion,$sql2);
				}
				$kueri2 = "SELECT * FROM `tickets_berlei`  INNER JOIN socios_berlei ON tickets_importados.id_cliente=socios_berlei.id_socio  WHERE id_ticket=".$id_ticket;
				if (mysqli_query($conexion,$kueri2)){
					$respuesta=mysqli_query($conexion,$kueri2);
					while($pro = mysqli_fetch_array($respuesta)){
						$saldo = $pro['saldo'];
						$id_socio = $pro['id_socio'];
						$sfinal = $saldo + $precio;
						$sql4 = "UPDATE `socios_berñei` SET `saldo`='".$sfinal."' WHERE id_socio=".$id_socio;
						mysqli_query($conexion,$sql4);
					}
				}
				
				$sql3 = "UPDATE `transacciones_berlei` SET `precio_venta`='0' WHERE id_transaccion=".$id_transaccion;
				if(mysqli_query($conexion,$sql3)){
					echo $id_ticket;
				}
				else{
					echo 0;
				}
				// $sql8 = "SELECT * FROM `tickets_terra` WHERE id_ticket=".$id_ticket;
				// $resp = mysqli_query($conexion,$sql8);
				// while($prod = mysqli_fetch_array($resp)){
				// 	$total_ticket = $prod ['total_ticket'];
				// 	$total_final = $total_ticket - $precio;
				// 	$sql = "UPDATE `tickets_terra` SET `total_ticket`='".$total_final."'  WHERE id_ticket=".$id_ticket;
				// 	if(mysqli_query($conexion,$sql)){
				// 		echo $id_ticket;
				// 	}
				// 	else{
				// 		echo 0;
				// 	}							
				// }
			}else{
				echo 0;
			}
			if ($marca == 16) {
				$kueri = "SELECT * FROM `transacciones`  INNER JOIN productos_bike ON transacciones.id_producto=productos_importados.id_producto  WHERE id_transaccion=".$id_transaccion;
				if (mysqli_query($conexion,$kueri)){
					$respuesta2=mysqli_query($conexion,$kueri);
					while($producto = mysqli_fetch_array($respuesta2)){
						$precio = $producto['precio_venta'];
						$id_producto = $producto['id_producto']; 				
						$inventario = $producto['inventario_producto'] + 1;	
						$sql2 ="UPDATE `productos_bike` SET `inventario_producto`= ".$inventario." ,`inventario_tmp_producto`= ".$inventario."  WHERE id_producto=".$id_producto;
						mysqli_query($conexion,$sql2);
					}
					$kueri2 = "SELECT * FROM `tickets`  INNER JOIN socios ON tickets.id_cliente=socios.id_socio  WHERE id_ticket=".$id_ticket;
					if (mysqli_query($conexion,$kueri2)){
						$respuesta=mysqli_query($conexion,$kueri2);
						while($pro = mysqli_fetch_array($respuesta)){
							$saldo = $pro['saldo'];
							$id_socio = $pro['id_socio'];
							$sfinal = $saldo + $precio;
							$sql4 = "UPDATE `socios` SET `saldo`='".$sfinal."' WHERE id_socio=".$id_socio;
							mysqli_query($conexion,$sql4);
						}
					}
					
					$sql3 = "UPDATE `transacciones` SET `precio_venta`='0' WHERE id_transaccion=".$id_transaccion;
					if(mysqli_query($conexion,$sql3)){
						echo $id_ticket;
					}
					else{
						echo 0;
					}
					// $sql8 = "SELECT * FROM `tickets_terra` WHERE id_ticket=".$id_ticket;
					// $resp = mysqli_query($conexion,$sql8);
					// while($prod = mysqli_fetch_array($resp)){
					// 	$total_ticket = $prod ['total_ticket'];
					// 	$total_final = $total_ticket - $precio;
					// 	$sql = "UPDATE `tickets_terra` SET `total_ticket`='".$total_final."'  WHERE id_ticket=".$id_ticket;
					// 	if(mysqli_query($conexion,$sql)){
					// 		echo $id_ticket;
					// 	}
					// 	else{
					// 		echo 0;
					// 	}							
					// }
				}else{
					echo 0;
				}				
			}				
		}
	}
?>