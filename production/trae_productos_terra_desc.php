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
							if ($_POST['id_cliente']==30) {
								$precio_desc = round($row['precio_clave']-($row['precio_clave']*0.32),1,PHP_ROUND_HALF_UP);
								echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
									<td class='precio'>$ ".$row['precio_clave']."</td>
									<td class='precio'>$ ".$precio_desc."</td>
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
							}else{	
								if ($_POST['id_cliente']==3) {	
									echo "<tr>
											<td>".$row['id_producto']."</td>
											<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
											<td class='precio'>$ ".$row['precio_pagos']."</td>
											<td class='precio'>$ ".$row['precio_clave']."</td>
											<td><span class='glyphicon glyphicon-trash borrar'/></td>
										 </tr>";
								}elseif ($_POST['id_cliente']==67) {	
									if ($row['marca_producto']=="MUNDO TERRA") {
										$precio_desc = ceil($row['precio_clave']-($row['precio_clave']*0.10));
										echo "<tr>
											<td>".$row['id_producto']."</td>
											<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
											<td class='precio'>$ ".$row['precio_clave']."</td>
											<td class='precio'>$ ".$precio_desc."</td>
											<td><span class='glyphicon glyphicon-trash borrar'/></td>
										 </tr>";										
									}elseif ($row['marca_producto']=="FLEXI" || $row['marca_producto']=="QUIRELLI") {
										$precio_desc = ceil($row['precio_clave']-($row['precio_clave']*0.15));
										echo "<tr>
											<td>".$row['id_producto']."</td>
											<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
											<td class='precio'>$ ".$row['precio_clave']."</td>
											<td class='precio'>$ ".$precio_desc."</td>
											<td><span class='glyphicon glyphicon-trash borrar'/></td>
										 </tr>";										
									}else{
										if($row['precio_oferta'] !="" || $row['precio_oferta'] !="0" ){
											echo "<tr>
											<td>".$row['id_producto']."</td>
											<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
											<td class='precio'>$ ".$row['precio_clave']."</td>
											<td class='precio'>$ ".$row['precio_oferta']."</td>		
											<td><span class='glyphicon glyphicon-trash borrar'/></td>
										 </tr>";	
										}else{
										$precio_desc = ceil($row['precio_clave']-($row['precio_clave']*0.20));
										echo "<tr>
											<td>".$row['id_producto']."</td>
											<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
											<td class='precio'>$ ".$row['precio_clave']."</td>
											<td class='precio'>$ ".$precio_desc."</td>
											<td><span class='glyphicon glyphicon-trash borrar'/></td>
										 </tr>";
										}										
									}
									
								}else{
									//ES REGALO
									if($row['precio_oferta'] == "1" ){
										echo "<tr>
										<td>".$row['id_producto']."</td>
										<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
										<td class='precio'>$ ".$row['precio_clave']."</td>
										<td class='precio'>$ ".$row['precio_oferta']."</td>		
										<td><span class='glyphicon glyphicon-trash borrar'/></td>
									 </tr>";	
									}elseif($row['precio_oferta'] != 0  ){
										$precio_desc = round($row['precio_oferta']-($row['precio_oferta']*0.15),1,PHP_ROUND_HALF_UP);
									echo "<tr>
										<td>".$row['id_producto']."</td>
										<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
										<td class='precio'>$ ".$row['precio_oferta']."</td>
										<td class='precio'>$ ".$precio_desc."</td>
										<td><span class='glyphicon glyphicon-trash borrar'/></td>
									 </tr>";
									}
									elseif($row['precio_oferta'] == 0){
									$precio_desc = round($row['precio_clave']-($row['precio_clave']*0.15),1,PHP_ROUND_HALF_UP);
									echo "<tr>
										<td>".$row['id_producto']."</td>
										<td>".$row['modelo_producto'].'-'.$row['talla_producto'].'-'.$row['color_producto']."</td>
										<td class='precio'>$ ".$row['precio_clave']."</td>
										<td class='precio'>$ ".$precio_desc."</td>
										<td><span class='glyphicon glyphicon-trash borrar'/></td>
									 </tr>";
									}
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