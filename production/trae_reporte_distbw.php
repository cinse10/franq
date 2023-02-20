<?php 
	include("conexion.php");
	if (isset($_POST['fecha_inicio'])&&isset($_POST['fecha_fin'])) {

		$date_inicio = date_create($_POST['fecha_inicio']);
		$inicio = date_format($date_inicio, 'Y-m-d');

		$date_fin = date_create($_POST['fecha_fin']);
		$fin = date_format($date_fin, 'Y-m-d');
		$usuario = $_POST['tipo_usuario'];
		if ($_POST['id_empleado']==0) {
			switch ($_POST['tipo_usuario']) {
				case 1:
					$sql = "SELECT nombre_dist_padre, SUM(fracc_tarjeta) AS mon_tarjeta, SUM(fracc_efectivo) AS mon_efectivo, SUM(monto_pago) AS mon_total FROM `venta_caja` INNER JOIN dist_hijo ON venta_caja.id_dist_hijo = dist_hijo.id_dist_hijo INNER JOIN dist_padre ON dist_hijo.dist_padre = dist_padre.id_dist_padre INNER JOIN pagos_caja ON venta_caja.id_venta_caja=pagos_caja.id_venta  where dist_hijo.tipo_asociado = 'RUTA' AND fecha_venta between'".$inicio." 00:00:00' AND '".$fin." 23:59:59' GROUP BY dist_padre.id_dist_padre";
					break;
				case 2:
					$sql = "SELECT nombre_dist_padre, SUM(fracc_tarjeta) AS mon_tarjeta, SUM(fracc_efectivo) AS mon_efectivo, SUM(monto_pago) AS mon_total FROM `venta_caja` INNER JOIN dist_hijo ON venta_caja.id_dist_hijo = dist_hijo.id_dist_hijo INNER JOIN dist_padre ON dist_hijo.dist_padre = dist_padre.id_dist_padre INNER JOIN pagos_caja ON venta_caja.id_venta_caja=pagos_caja.id_venta  where dist_hijo.tipo_asociado = 'TIENDA' AND fecha_venta between'".$inicio." 00:00:00' AND '".$fin." 23:59:59' GROUP BY dist_padre.id_dist_padre";
					break;
				
				default:
					$sql = "SELECT nombre_dist_padre, SUM(fracc_tarjeta) AS mon_tarjeta, SUM(fracc_efectivo) AS mon_efectivo, SUM(monto_pago) AS mon_total FROM `venta_caja` INNER JOIN dist_hijo ON venta_caja.id_dist_hijo = dist_hijo.id_dist_hijo INNER JOIN dist_padre ON dist_hijo.dist_padre = dist_padre.id_dist_padre INNER JOIN pagos_caja ON venta_caja.id_venta_caja=pagos_caja.id_venta  where fecha_venta between'".$inicio." 00:00:00' AND '".$fin." 23:59:59' GROUP BY dist_padre.id_dist_padre";
					break;
			}
				
		}else{
			$sql = "SELECT nombre_dist_padre, SUM(fracc_tarjeta) AS mon_tarjeta, SUM(fracc_efectivo) AS mon_efectivo, SUM(monto_pago) AS mon_total FROM `venta_caja` INNER JOIN dist_hijo ON venta_caja.id_dist_hijo = dist_hijo.id_dist_hijo INNER JOIN dist_padre ON dist_hijo.dist_padre = dist_padre.id_dist_padre INNER JOIN pagos_caja ON venta_caja.id_venta_caja=pagos_caja.id_venta where fecha_venta between'".$inicio." 00:00:00' AND '".$fin." 23:59:59' AND empleados.id_empleado=".$_POST['id_empleado']." GROUP BY dist_padre.id_dist_padre";	
		}
		
		$resp = mysqli_query($conexion,$sql);
		$num = mysqli_num_rows($resp);
		if ($num==0) {
			echo 0;
		}else{
			$cont=0;
			$suma=0;
			$sumaEfe=0;
			$sumaTDD=0;
			if (!isset($_POST['ticket'])) {
				echo '<table id="tabla_reporte" class="table table-striped table-bordered bulk_action">
	                            <thead>
	                              <tr>
	                                <th>Distribuidor padre</th>
	                                <th>Monto Tarjeta</th>
	                                <th>Monto Efectivo</th>
	                                <th>Monto Total</th>
	                              </tr>
	                            </thead>                            
	                            <tbody>';
				
			}
                            
			while ($reporte = mysqli_fetch_array($resp)) {
				
				$nombre_dis = $reporte['nombre_dist_padre'];
				$mon_tarjeta = $reporte['mon_tarjeta'];
				$mon_efectivo = $reporte['mon_efectivo'];

				$mon_total = $reporte['mon_total'];

				$suma+=$mon_total;
				$sumaTDD+=$mon_tarjeta;
				$sumaEfe+=$mon_efectivo;
				if (!isset($_POST['ticket'])) {
					echo "<tr>";
						echo "<th>";
							echo $nombre_dis;
						echo "</th>";
						echo "<th>";
							echo $mon_tarjeta;
						echo "</th>";
						echo "<th>";
							echo $mon_efectivo;
						echo "</th>";
						echo "<th>";
							echo $mon_total;
						echo "</th>";
					echo "</tr>";					
				}
			}
			if (!isset($_POST['ticket'])) {
				echo "<tr><th></th><th></th><th></th><th></th></tr>";
				echo "<tr><th></th><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ ".$suma."</th></tr>";
				echo "<tr><th></th><th></th><th style='font-weight: bold; font-size:20px;'>Total Efectivo</th><th style='font-weight: bold; font-size:20px;'>$ ".$sumaEfe."</th></tr>";
				echo "<tr><th></th><th></th><th style='font-weight: bold; font-size:20px;'>Total Tarjeta</th><th style='font-weight: bold; font-size:20px;'>$ ".$sumaTDD."</th></tr>";
				echo '</tbody></table>';
			}
		}
		if (isset($_POST['ticket'])) {
				$logo="";
				$nombre="";
				$direccion="";
				$leyenda_inferior="";
				$confi = "select * from configuracion";
					$resp_confi = mysqli_query($conexion,$confi);
					while($configuracion= mysqli_fetch_array($resp_confi)){
						$logo = $configuracion['logo'];
						$nombre = $configuracion['nombre'];
						$direccion = $configuracion['direccion'];
						$leyenda_inferior = $configuracion['leyenda_inferior'];
					}
					$fecha_ini = dameIntervaloFecha($inicio);
					$fecha_fin = dameIntervaloFecha($fin);
			echo "<div class='ticket centrado'>";
			echo "<img src='".$logo."' width='150' height='170' style='margin-top: -30;'>";
			echo "<br><br>";
			echo "<style type='text/css'>* {    font-size: 12px;    font-family: 'Times New Roman';}td,th,tr,table {    border-top: 1px solid black;    border-collapse: collapse;}td.producto,th.producto {    width: 115px;    max-width: 115px;}td.precio,th.precio {    width: 75px;    max-width: 75px;    word-break: break-all;}.centrado {    text-align: center;    align-content: center;}.ticket {    width: 200px;    max-width: 200px;}.total{    font-size: 15px;    font-weight: bold;    font-family: 'Times New Roman';}</style>";
			echo $nombre;
			echo "<br><br>";
			
			$date = date('d-m-Y');
			echo dameFechaCorta($date);

			echo "<br>";
			echo date('h:i A');
			echo "<br><br>";
			echo $direccion;
			echo "<br><br>";

				echo "<h4>Reporte de pagos</h4><br>";
				echo 'Del: '.$fecha_ini;
				echo "<br>";
				echo ' a: '.$fecha_fin;
				echo "<br><hr>";
				echo "<table><thead><tr><th class='producto'>Forma de pago</th><th class='precio'>Total: </th></tr></thead>";
				echo '<tbody>';
		        echo '<tr>
		        	<th>Efectivo</th>
		        	<th class="precio centrado">$ '.$sumaEfe.'</th>
		        	</tr>
		        	<tr>
		        	<th>Tarjeta</th>
		        	<th class="precio centrado">$ '.$sumaTDD.'</th>
		        	</tr>
		        	<tr>
		        	<th>Total:</th>';
		        	$totalito = $sumaTDD+$sumaEfe;
		        	echo '<th class="precio centrado total">$ '.$totalito.'</th>
		        </tr>';
		        echo '</tbody></table>';
		    echo "<br>";
			echo "</div>";
		}
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