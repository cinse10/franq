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
		$sql2 = "Select * from compras_cklass where id_socio = '".$_POST['id_cliente']."'";
      	$respuesta2 = mysqli_query($conexion,$sql2);
      	while($desc = mysqli_fetch_array($respuesta2)){
        	$tipo_desc = $desc['tipo_desc'];
        }
		$codigo = limpiar_variable($_POST['codigo_barras']);
		$sql = "Select * from productos_cklass where id_producto='".$codigo."'";
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
									<td class='precio'>$ ".$row['precio_contado']."</td>
									<td class='precio'>$ ".$row['precio_contado']."</td>									
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
							
						}else{ 
							if ($_POST['id_cliente']==21) {
								$precio_desc = $row['precio_asociado']-($row['precio_asociado']*0.25); 
								echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
									<td class='precio'>$ ".$row['precio_asociado']."</td>
									<td class='precio'>$ ".$precio_desc."</td>
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
							}elseif ($_POST['id_cliente']==276) {
								$precio_desc = $row['precio_oferta']-($row['precio_oferta']*0.25); 
								echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
									<td class='precio'>$ ".$row['precio_oferta']."</td>
									<td class='precio'>$ ".$precio_desc."</td>
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
							}
							elseif ($_POST['id_cliente']==3) {
								echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>					
									<td class='precio'>$ ".$row['precio_contado']."</td>
									<td class='precio'>$ ".$row['precio_asociado']."</td>									
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
							}elseif ($_POST['id_cliente']==68) {
								$precio_desc = $row['precio_asociado']-($row['precio_asociado']*0.33); 
								echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
									<td class='precio'>$ ".$row['precio_asociado']."</td>
									<td class='precio'>$ ".$precio_desc."</td>
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
							}elseif ($_POST['id_cliente']==249) {
								$precio_desc = $row['precio_asociado']-($row['precio_asociado']*0.25); 
								echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
									<td class='precio'>$ ".$row['precio_asociado']."</td>
									<td class='precio'>$ ".$precio_desc."</td>
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
							}
							elseif ($_POST['id_cliente']==79) {
								$precio_desc = $row['precio_asociado']-($row['precio_asociado']*0.37); 
								echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
									<td class='precio'>$ ".$row['precio_asociado']."</td>
									<td class='precio'>$ ".$precio_desc."</td>
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
							}else{
								if ($row['catalogo_producto']!='Multimarcas') {									
									switch ($tipo_desc) {
										case '1':
											echo "<tr>
												<td>".$row['id_producto']."</td>
												<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
												<td class='precio'>$ ".$row['precio_contado']."</td>
												<td class='precio'>$ ".$row['precio_asociado']."</td>
												<td><span class='glyphicon glyphicon-trash borrar'/></td>
											 </tr>";
											break;

										case '2':
											$precio_desc = $row['precio_asociado']-($row['precio_asociado']*0.03);
											echo "<tr>
												<td>".$row['id_producto']."</td>
												<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
												<td class='precio'>$ ".$row['precio_asociado']."</td>
												<td class='precio'>$ ".$precio_desc."</td>
												<td><span class='glyphicon glyphicon-trash borrar'/></td>
											 </tr>";
											break;
										case '3':
											$precio_desc = $row['precio_asociado']-($row['precio_asociado']*0.06);
											echo "<tr>
												<td>".$row['id_producto']."</td>
												<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
												<td class='precio'>$ ".$row['precio_asociado']."</td>
												<td class='precio'>$ ".$precio_desc."</td>
												<td><span class='glyphicon glyphicon-trash borrar'/></td>
											 </tr>";
										break;
										case '4':
											$precio_desc = $row['precio_asociado']-($row['precio_asociado']*0.12);
											echo "<tr>
												<td>".$row['id_producto']."</td>
												<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
												<td class='precio'>$ ".$row['precio_asociado']."</td>
												<td class='precio'>$ ".$precio_desc."</td>
												<td><span class='glyphicon glyphicon-trash borrar'/></td>
											 </tr>";
										break;
										case '5':
											$precio_desc = $row['precio_asociado']-($row['precio_asociado']*0.18);
											echo "<tr>
												<td>".$row['id_producto']."</td>
												<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
												<td class='precio'>$ ".$row['precio_asociado']."</td>
												<td class='precio'>$ ".$precio_desc."</td>
												<td><span class='glyphicon glyphicon-trash borrar'/></td>
											 </tr>";
										break;
										case '6':
											$precio_desc = $row['precio_asociado']-($row['precio_asociado']*0.20);
											echo "<tr>
												<td>".$row['id_producto']."</td>
												<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
												<td class='precio'>$ ".$row['precio_asociado']."</td>
												<td class='precio'>$ ".$precio_desc."</td>
												<td><span class='glyphicon glyphicon-trash borrar'/></td>
											 </tr>";
										break;
										case '7':
											$precio_desc = $row['precio_asociado']-($row['precio_asociado']*0.22);
											echo "<tr>
												<td>".$row['id_producto']."</td>
												<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
												<td class='precio'>$ ".$row['precio_asociado']."</td>
												<td class='precio'>$ ".$precio_desc."</td>
												<td><span class='glyphicon glyphicon-trash borrar'/></td>
											 </tr>";
										break;
										case '8':
											$precio_desc = $row['precio_asociado']-($row['precio_asociado']*0.25);
											echo "<tr>
												<td>".$row['id_producto']."</td>
												<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
												<td class='precio'>$ ".$row['precio_asociado']."</td>
												<td class='precio'>$ ".$precio_desc."</td>
												<td><span class='glyphicon glyphicon-trash borrar'/></td>
											 </tr>";
										break;
										default:
											echo "<tr>
												<td>".$row['id_producto']."</td>
												<td>".$row['descripcion_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
												<td class='precio'>$ ".$row['precio_contado']."</td>
												<td class='precio'>$ ".$row['precio_asociado']."</td>
												<td><span class='glyphicon glyphicon-trash borrar'/></td>
											 </tr>";
											break;
									}
								}else{
									echo "<tr>
										<td>".$row['id_producto']."</td>
										<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>					
										<td class='precio'>$ ".$row['precio_contado']."</td>
										<td class='precio'>$ ".$row['precio_asociado']."</td>									
										<td><span class='glyphicon glyphicon-trash borrar'/></td>
									 </tr>";

								}
							}
							
							
						}			
						$tmp_inventario = $row['inventario_tmp_producto']-1;
						$kueri = "update productos_cklass set inventario_tmp_producto=".$tmp_inventario." where id_producto=".$row['id_producto'];
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
