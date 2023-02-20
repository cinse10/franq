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
		$sql = "Select * from productos_betterware where id_producto='".$codigo."'";
		//$sql = "select * from productos_betterware";
		$resp = mysqli_query($conexion,$sql);
		if (mysqli_num_rows($resp) > 0){
			while($row = mysqli_fetch_array($resp)) {
				if ($row['inventario_producto']>0) {
					if ($row['inventario_tmp_producto']>0) {
						if ($_POST['id_cliente']==1) {
							
							echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['nombre_producto']."</td>								
									<td class='precio'>$ ".$row['precio_catalogo']."</td>
									<td class='precio'>$ ".$row['precio_catalogo']."</td>									
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
						}elseif($_POST['id_cliente']==3){
							$precio_desc = round(($row['precio_catalogo']*.8135),1,PHP_ROUND_HALF_UP);
							echo "<tr>
									<td>".$row['id_producto']."</td>
									<td>".$row['nombre_producto']."</td>								
									<td class='precio'>$ ".$row['precio_catalogo']."</td>
									<td class='precio'>$ ".$precio_desc."</td>									
									<td><span class='glyphicon glyphicon-trash borrar'/></td>
								 </tr>";
						}else{						
						echo "<tr>
								<td>".$row['id_producto']."</td>
								<td>".$row['nombre_producto']."</td>
								<td class='precio'>$ ".$row['precio_catalogo']."</td>
								<td class='precio'>$ ".$row['precio_compra']."</td>
								<td><span class='glyphicon glyphicon-trash borrar'/></td>
							 </tr>";
						}
						$tmp_inventario = $row['inventario_tmp_producto']-1;
						$kueri = "update productos_betterware set inventario_tmp_producto=".$tmp_inventario." where id_producto=".$row['id_producto'];
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