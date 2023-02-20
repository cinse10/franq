<?php
	include("conexion_crm.php");
	echo '<table id="tabla_reporte2" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>ID ticket</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
              </tr>
            </thead>                            
            <tbody>';
		
	if (isset($_POST['fecha_inicio'])&&isset($_POST['fecha_fin'])) {
		

		$date_inicio = date_create($_POST['fecha_inicio']);
		$inicio = date_format($date_inicio, 'Y-m-d');

		$date_fin = date_create($_POST['fecha_fin']);
		$fin = date_format($date_fin, 'Y-m-d');
		if ($_POST['id_empleado']==0) {
                $totalxprod2 = 0;

                $kueri="SELECT comprobante FROM pagos";
                $resp = mysqli_query($conexion,$kueri);
                while($comprobante = mysqli_fetch_array($resp)){
                    $nombre_completo = $comprobante[0];
                    $nombre_separado = explode("-", $nombre_completo);
                    $fecha_doc = $nombre_separado[1]."-".$nombre_separado[2]."-".$nombre_separado[3] ;
                    $fecha_doc = date("Y-m-d", strtotime( $fecha_doc)); 
                    $fecha_inicio = date("Y-m-d", strtotime( $_POST['fecha_inicio'])); 
                    $fecha_fin = date("Y-m-d", strtotime( $_POST['fecha_fin'])); 
                    
                    if ($fecha_inicio <= $fecha_doc) {
                    
                        if ($fecha_fin >= $fecha_doc) {
                            $id_llamada = $nombre_separado[0];
                            $kuer="SELECT * FROM `llamadas` INNER JOIN prod_cotizacion ON prod_cotizacion.id_cotizacion=llamadas.id_cotizacion WHERE llamadas.id_empleado=9 AND llamadas.id_llamada=".$id_llamada;
							$resp2 = mysqli_query($conexion,$kuer);
							while ($reporte = mysqli_fetch_array($resp2)) {
								$cont++;
								$id_ticket = $reporte['id_llamada'];
								$producto = $reporte['nombre_producto'];
								$cantidad = $reporte['cantidad_producto'];
								$costo = round($reporte['costo_producto']*1.16,2);
								$totalxpro = round($reporte['cantidad_producto']*$reporte['costo_producto']*1.16,2);
								
								$totalxprod2 = $totalxprod2+$totalxpro;
								
								
								echo "<tr>";
									echo "<th> ";
										echo $id_ticket;
									echo "</th>";
									echo "<th>";
										echo $producto;
									echo "</th>";
									echo "<th>";
										echo $cantidad;
									echo "</th>";
									echo "<th>";
										echo $costo;
									echo "</th>";
									echo "<th>";
										echo $totalxpro;
									echo "</th>";
									
								echo "</tr>";					
								
							}
                                  
                        }

                            
                    }
                }
                
			
			
		}
		//echo $sql;

		
			echo "<tr><th></th><th></th><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ ".number_format($totalxprod2,2)."</th></tr>";
			echo '</tbody></table>';
			
	}  
	




	//función que regresa una fecha, ejemplo Lunes 10 de Marzo del 2019
	function dameFechaCorta($fecha){
  		strval($fecha);
  		$date = date_create($fecha);
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	 	//Salida: Vie 24 de Feb del 2012
		return $dias[date_format($date, 'w')].", ".date_format($date, 'd')." de ".$meses[date_format($date, 'n')-1]. " del ".date_format($date, 'Y') ;
  	
  	}
	//función que regresa una fecha, ejemplo 10/Mar/2019
  	function dameIntervaloFecha($fecha){
  		strval($fecha);
  		$date = date_create($fecha);
		$meses = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
	 	//Salida: Vie 24 de Feb del 2012
		return date_format($date, 'd')."/".$meses[date_format($date, 'n')-1]. "/".date_format($date, 'Y') ;
  	
  	}

 ?>