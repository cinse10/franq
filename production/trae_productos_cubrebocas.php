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
		$sql2 = "Select * from compras_cubrebocas where id_socio = '".$_POST['id_cliente']."'";
      	$respuesta2 = mysqli_query($conexion,$sql2);
      	while($desc = mysqli_fetch_array($respuesta2)){
        	$tipo_desc = $desc['tipo_desc'];
        }
		$codigo = limpiar_variable($_POST['codigo_barras']);
		$sql = "Select * from cubrebocas where codigo_barras_producto='".$codigo."' or nombre='".$codigo."'";
		//$sql = "select * from productos";
		$resp = mysqli_query($conexion,$sql);
		if (mysqli_num_rows($resp) > 0){
			while($row = mysqli_fetch_array($resp)) {
				if ($row['inventario_producto']>0) {
					if ($row['inventario_tmp_producto']>0) {		
						if ($_POST['id_cliente']==1 ) {
							echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['descripcion'].'-'.$row['talla_'].'-'.$row['color']."</td>								
									<td class='precio'>$ ".$row['precio_catalogo']."</td>
									<td class='precio'>$ ".$row['precio_catalogo']."</td>									
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
							
						}else{ 
							if ($_POST['id_cliente']==102 ) {
								$precio_desc = $row['precio_afiliado']-($row['precio_afiliado']*0.285);
									echo "<tr>
										<td>".$row['id_producto']."</td>
										<td>".$row['descripcion_vf'].'-'.$row['talla_vf'].'-'.$row['color_vf']."</td>
										<td class='precio'>$ ".$row['precio_afiliado']."</td>
										<td class='precio'>$ ".number_format($precio_desc,2)."</td>
										<td><span class='glyphicon glyphicon-trash borrar'/></td>
									 </tr>";
							}else{
								switch ($tipo_desc) {
								case '1':
									echo "<tr>
										<td>".$row['id_producto']."</td>
										<td>".$row['descripcion_vf'].'-'.$row['talla_vf'].'-'.$row['color_vf']."</td>
										<td class='precio'>$ ".$row['precio_catalogo']."</td>
										<td class='precio'>$ ".$row['precio_afiliado']."</td>
										<td><span class='glyphicon glyphicon-trash borrar'/></td>
									 </tr>";
									break;

								case '2':
									$precio_desc = $row['precio_afiliado']-($row['precio_afiliado']*0.05);
									echo "<tr>
										<td>".$row['id_producto']."</td>
										<td>".$row['descripcion_vf'].'-'.$row['talla_vf'].'-'.$row['color_vf']."</td>
										<td class='precio'>$ ".$row['precio_afiliado']."</td>
										<td class='precio'>$ ".number_format($precio_desc,2)."</td>
										<td><span class='glyphicon glyphicon-trash borrar'/></td>
									 </tr>";
									break;
								case '3':
									$precio_desc = $row['precio_afiliado']-($row['precio_afiliado']*0.10);
									echo "<tr>
										<td>".$row['id_producto']."</td>
										<td>".$row['descripcion_vf'].'-'.$row['talla_vf'].'-'.$row['color_vf']."</td>
										<td class='precio'>$ ".$row['precio_afiliado']."</td>
										<td class='precio'>$ ".number_format($precio_desc,2)."</td>
										<td><span class='glyphicon glyphicon-trash borrar'/></td>
									 </tr>";
								break;

								
								default:
									echo "<tr>
										<td>".$row['id_producto']."</td>
										<td>".$row['descripcion'].'-'.$row['talla'].'-'.$row['color']."</td>
										<td class='precio'>$ ".$row['precio_afiliado']."</td>
										<td class='precio'>$ ".$row['precio_afiliado']."</td>
										<td><span class='glyphicon glyphicon-trash borrar'/></td>
									 </tr>";
									break;
							}
							}
							
							
							
						}			
						$tmp_inventario = $row['inventario_tmp_producto']-1;
						$kueri = "update cubrebocas set inventario_tmp_producto=".$tmp_inventario." where id_producto=".$row['id_producto'];
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