<?php 
	function limpiar_variable($texto){
		return preg_replace('/[^a-zA-Z0-9\_]/', '', $texto);
	}

	include("conexion.php");
	if ($_POST['codigo_barras']=="") {
		echo '<script type="text/javascript">
                    console.log("Llegó vacío.");
                    alertify.error("Producto no encontrado.");
                  </script>';
	}else{
		$sql2 = "Select * from compras_terra where id_socio = '".$_POST['id_cliente']."'";
      	$respuesta2 = mysqli_query($conexion,$sql2);
      	while($desc = mysqli_fetch_array($respuesta2)){
        	$tipo_desc = $desc['tipo_desc'];
        }
		$codigo = limpiar_variable($_POST['codigo_barras']);
		$sql = "Select * from productos_terra where id_producto='".$codigo."'";
		//$sql = "select * from productos";
		$resp = mysqli_query($conexion,$sql);
		if (mysqli_num_rows($resp) > 0){
			while($row = mysqli_fetch_array($resp)) {
				if ($row['inventario_producto']>0) {
					if ($row['inventario_tmp_producto']>0) {		
						if ($_POST['id_cliente']==1 ) {
							echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>								
									<td class='precio'>$ ".$row['precio_pagos']."</td>
									<td class='precio'>$ ".$row['precio_pagos']."</td>									
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
							
						}else{ 
							if ($row['lista_producto']=='1') {
								if ($_POST['id_cliente']==30) {
									$precio_desc = round($row['precio_clave']-($row['precio_clave']*0.25),1,PHP_ROUND_HALF_UP);
										echo "<tr>
											<td>".$row['id_producto']."</td>
											<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
											<td class='precio'>$ ".$row['precio_clave']."</td>
											<td class='precio'>$ ".$precio_desc."</td>
											<td><span class='glyphicon glyphicon-trash borrar'/></td>
										 </tr>";
								}else{									
									switch ($tipo_desc) {
										case '1':
											echo "<tr>
												<td>".$row['id_producto']."</td>
												<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
												<td class='precio'>$ ".$row['precio_pagos']."</td>
												<td class='precio'>$ ".$row['precio_clave']."</td>
												<td><span class='glyphicon glyphicon-trash borrar'/></td>
											 </tr>";
											break;

										case '2':
											$precio_desc = round($row['precio_clave']-($row['precio_clave']*0.04),1,PHP_ROUND_HALF_UP);
											echo "<tr>
												<td>".$row['id_producto']."</td>
												<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
												<td class='precio'>$ ".$row['precio_clave']."</td>
												<td class='precio'>$ ".$precio_desc."</td>
												<td><span class='glyphicon glyphicon-trash borrar'/></td>
											 </tr>";
											break;
										case '3':
											$precio_desc = round($row['precio_clave']-($row['precio_clave']*0.07),1,PHP_ROUND_HALF_UP);
											echo "<tr>
												<td>".$row['id_producto']."</td>
												<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
												<td class='precio'>$ ".$row['precio_clave']."</td>
												<td class='precio'>$ ".$precio_desc."</td>
												<td><span class='glyphicon glyphicon-trash borrar'/></td>
											 </tr>";
										break;
										case '4':
											$precio_desc = round($row['precio_clave']-($row['precio_clave']*0.13),1,PHP_ROUND_HALF_UP);
											echo "<tr>
												<td>".$row['id_producto']."</td>
												<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
												<td class='precio'>$ ".$row['precio_clave']."</td>
												<td class='precio'>$ ".$precio_desc."</td>
												<td><span class='glyphicon glyphicon-trash borrar'/></td>
											 </tr>";
										break;
										case '5':
											$precio_desc = round($row['precio_clave']-($row['precio_clave']*0.18),1,PHP_ROUND_HALF_UP);
											echo "<tr>
												<td>".$row['id_producto']."</td>
												<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
												<td class='precio'>$ ".$row['precio_clave']."</td>
												<td class='precio'>$ ".$precio_desc."</td>
												<td><span class='glyphicon glyphicon-trash borrar'/></td>
											 </tr>";
										break;
										default:
											echo "<tr>
												<td>".$row['id_producto']."</td>
												<td>".$row['descripcion_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
												<td class='precio'>$ ".$row['precio_pagos']."</td>
												<td class='precio'>$ ".$row['precio_clave']."</td>
												<td><span class='glyphicon glyphicon-trash borrar'/></td>
											 </tr>";
											break;
									}
								}
							}elseif ($row['lista_producto']=='2') { //17%
								if ($_POST['id_cliente']==30) {
									$precio_desc = round($row['precio_pagos']-($row['precio_pagos']*0.34),1,PHP_ROUND_HALF_UP);
										echo "<tr>
											<td>".$row['id_producto']."</td>
											<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
											<td class='precio'>$ ".$row['precio_pagos']."</td>
											<td class='precio'>$ ".$precio_desc."</td>
											<td><span class='glyphicon glyphicon-trash borrar'/></td>
										 </tr>";
								}elseif ($_POST['id_cliente']==3) {
									$precio_desc = round($row['precio_pagos']-($row['precio_pagos']*0.08),1,PHP_ROUND_HALF_UP);
										echo "<tr>
											<td>".$row['id_producto']."</td>
											<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
											<td class='precio'>$ ".$row['precio_pagos']."</td>
											<td class='precio'>$ ".$precio_desc."</td>
											<td><span class='glyphicon glyphicon-trash borrar'/></td>
										 </tr>";
								}else{
									$precio_desc = round($row['precio_pagos']-($row['precio_pagos']*0.17),1,PHP_ROUND_HALF_UP);
										echo "<tr>
											<td>".$row['id_producto']."</td>
											<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
											<td class='precio'>$ ".$row['precio_pagos']."</td>
											<td class='precio'>$ ".$precio_desc."</td>
											<td><span class='glyphicon glyphicon-trash borrar'/></td>
										 </tr>";
								}
								
							}else{ //9%
								if ($_POST['id_cliente']==30) {
									$precio_desc = round($row['precio_pagos']-($row['precio_pagos']*0.18),1,PHP_ROUND_HALF_UP);
										echo "<tr>
											<td>".$row['id_producto']."</td>
											<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
											<td class='precio'>$ ".$row['precio_pagos']."</td>
											<td class='precio'>$ ".$precio_desc."</td>
											<td><span class='glyphicon glyphicon-trash borrar'/></td>
										 </tr>";
								}elseif ($_POST['id_cliente']==3) {
									$precio_desc = round($row['precio_pagos']-($row['precio_pagos']*0.04),1,PHP_ROUND_HALF_UP);
										echo "<tr>
											<td>".$row['id_producto']."</td>
											<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
											<td class='precio'>$ ".$row['precio_pagos']."</td>
											<td class='precio'>$ ".$precio_desc."</td>
											<td><span class='glyphicon glyphicon-trash borrar'/></td>
										 </tr>";
								}else{
									$precio_desc = round($row['precio_pagos']-($row['precio_pagos']*0.09),1,PHP_ROUND_HALF_UP);
										echo "<tr>
											<td>".$row['id_producto']."</td>
											<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
											<td class='precio'>$ ".$row['precio_pagos']."</td>
											<td class='precio'>$ ".$precio_desc."</td>
											<td><span class='glyphicon glyphicon-trash borrar'/></td>
										 </tr>";
								}
							}
							
							
						}			
						$tmp_inventario = $row['inventario_tmp_producto']-1;
						$kueri = "update productos_terra set inventario_tmp_producto=".$tmp_inventario." where id_producto=".$row['id_producto'];
						mysqli_query($conexion,$kueri);
					}else{
						echo '<script type="text/javascript">
	                    console.log("No hay producto wey");
	                    alertify.error("No hay en inventario.");
	                  </script>';
					}	
				}else{
					echo '<script type="text/javascript">
                    console.log("No hay producto wey");
                    alertify.error("No hay en inventario.");
                  </script>';
				}				
			}
		}else{
			echo '<script type="text/javascript">
            console.log("Codigo no encontrado.");
            alertify.error("Producto no encontrado.");
          </script>';
		}
	}
 ?>