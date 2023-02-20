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
		$codigo = limpiar_variable($_POST['codigo_barras']);
		$sql = "Select * from productos_bike where id_producto='".$codigo."'";
		//$sql = "select * from productos";
		$resp = mysqli_query($conexion,$sql);
		if (mysqli_num_rows($resp) > 0){
			while($row = mysqli_fetch_array($resp)) {
				if ($row['inventario_producto']>0) {
					if ($row['inventario_tmp_producto']>0) {		
						if ($_POST['id_cliente']==1) {
							echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['nombre_producto'].'-'.$row['rodada_producto'].'-'.$row['color_producto']."</td>
									<td class='precio'>$ ".$row['precio_publico']."</td>	
									<td class='precio'>$ ".$row['precio_publico']."</td>								
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
							
						}elseif ($_POST['id_cliente']==249) {
							$precio_empleado = round($row['precio_compra']+($row['precio_compra']*0.16)); 
							echo "<tr>
								<td>".$row['id_producto']."</td>
								<td>".$row['nombre_producto'].'-'.$row['rodada_producto'].'-'.$row['color_producto']."</td>
								<td class='precio'>$ ".$row['precio_publico']."</td>
								<td class='precio'>$ ".$precio_empleado."</td>
								<td><span class='glyphicon glyphicon-trash borrar'/></td>
							 </tr>";
						
						}elseif ($_POST['id_cliente']==410) {
							if ($row['tipo_accesorio']==3) {
								$precio_may = ceil(($row['precio_compra']+($row['precio_compra']*0.16)) * 1.15); 
								echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['nombre_producto'].'-'.$row['rodada_producto'].'-'.$row['color_producto']."</td>
									<td class='precio'>$ ".$row['precio_publico']."</td>
									<td class='precio'>$ ".$precio_may."</td>
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
							}else{
								echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['nombre_producto'].'-'.$row['rodada_producto'].'-'.$row['color_producto']."</td>
									<td class='precio'>$ ".$row['precio_publico']."</td>
									<td class='precio'>$ ".$row['precio_publico_desc']."</td>
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
								 
							}
						}elseif ($_POST['id_cliente']==411) {
							if ($row['precio_catalogo']!=NULL) { 
								echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['nombre_producto'].'-'.$row['rodada_producto'].'-'.$row['color_producto']."</td>
									<td class='precio'>$ ".$row['precio_publico']."</td>
									<td class='precio'>$ ".$row['precio_catalogo']."</td>
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
							}else{
								echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['nombre_producto'].'-'.$row['rodada_producto'].'-'.$row['color_producto']."</td>
									<td class='precio'>$ ".$row['precio_publico']."</td>
									<td class='precio'>$ ".$row['precio_publico_desc']."</td>
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
							}
						}
						elseif ($_POST['id_cliente'] == 703) {
							$precio_taller_Ref = ceil(($row['precio_compra'])*1.20*1.16); 
								echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['nombre_producto'].'-'.$row['rodada_producto'].'-'.$row['color_producto']."</td>
									<td class='precio'>$ ".$row['precio_publico']."</td>
									<td class='precio'>$ ".$precio_taller_Ref."</td>
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>"; 
							/*if ($row['tipo_bike']==1) { 
								$precio_taller_Ref = ceil(($row['precio_compra']*1.18)); 
								echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['nombre_producto'].'-'.$row['rodada_producto'].'-'.$row['color_producto']."</td>
									<td class='precio'>$ ".$row['precio_publico']."</td>
									<td class='precio'>$ ".$precio_taller_Ref."</td>
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
							}elseif($row['tipo_bike']== 0){
								$precio_taller_bici = ceil(($row['precio_compra']*1.18)); 
								echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['nombre_producto'].'-'.$row['rodada_producto'].'-'.$row['color_producto']."</td>
									<td class='precio'>$ ".$row['precio_publico']."</td>
									<td class='precio'>$ ".$precio_taller_bici."</td>
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
							}
							else{
								echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['nombre_producto'].'-'.$row['rodada_producto'].'-'.$row['color_producto']."</td>
									<td class='precio'>$ ".$row['precio_publico']."</td>
									<td class='precio'>$ ".$row['precio_publico_desc']."</td>
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
							}*/
						}
						else{
							echo "<tr>
								<td>".$row['id_producto']."</td>
								<td>".$row['nombre_producto'].'-'.$row['rodada_producto'].'-'.$row['color_producto']."</td>
								<td class='precio'>$ ".$row['precio_publico']."</td>
								<td class='precio'>$ ".$row['precio_publico_desc']."</td>
								<td><span class='glyphicon glyphicon-trash borrar'/></td>
							 </tr>";
						}			
						$tmp_inventario = $row['inventario_tmp_producto']-1;
						$kueri = "update productos_bike set inventario_tmp_producto=".$tmp_inventario." where id_producto=".$row['id_producto'];
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