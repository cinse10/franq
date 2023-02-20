<?php 
	include("conexion.php");
	if (isset($_POST['fecha_inicio'])&&isset($_POST['fecha_fin'])) {

		$date_inicio = date_create($_POST['fecha_inicio']);
		$inicio = date_format($date_inicio, 'Y-m-d');

		$date_fin = date_create($_POST['fecha_fin']);
		$fin = date_format($date_fin, 'Y-m-d');
		if ($_POST['id_empleado']==0) {
			$sql = "select * from tickets_marykay INNER JOIN empleados ON tickets_marykay.id_empledo=empleados.id_empleado INNER JOIN socios_mk ON tickets_marykay.id_cliente=socios_mk.id_socio INNER JOIN transacciones_marykay ON tickets_marykay.id_ticket=transacciones_marykay.id_ticket INNER JOIN productos_marykay ON transacciones_marykay.id_producto = productos_marykay.id_producto where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'";	
		}else{
			$sql = "select * from tickets_marykay INNER JOIN empleados ON tickets_marykay.id_empledo=empleados.id_empleado INNER JOIN socios_mk ON tickets_marykay.id_cliente=socios_mk.id_socio INNER JOIN transacciones_marykay ON tickets_marykay.id_ticket=transacciones_marykay.id_ticket INNER JOIN productos_marykay ON transacciones_marykay.id_producto = productos_marykay.id_producto where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59' AND empleados.id_empleado=".$_POST['id_empleado'];	
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
				echo '<table id="tabla_reporte_2" class="table table-striped table-bordered bulk_action dataTable no-footer">
	                            <thead>
	                              <tr>
	                                <th>ID ticket</th>
	                                <th>Cliente</th>
	                                <th>Empleado</th>
	                                <th>Forma de pago</th>
	                                <th>Fecha</th>
	                                <th>Producto</th>
	                                <th>Total</th>
	                              </tr>
	                            </thead>                            
	                            <tbody>';
				
			}
                            
			while ($reporte = mysqli_fetch_array($resp)) {
				$cont++;
				$id_ticket = $reporte['id_ticket'];
				$nombre_empleado = $reporte['nombre_empleado']." ".$reporte['ap_pat_empleado'];
				$nombre_socio = $reporte['nombre_socio']." ".$reporte['ap_pat_socio'];
				$fecha_ticket = $reporte['fecha_ticket'];
				
				$nombre_producto = $reporte['nombre_producto'];
				$costo_producto = $reporte['precio_venta'];
				$total_ticket = $costo_producto;

				$forma_pago = $reporte['forma_pago'];
				if ($forma_pago!="EFECTIVO") {
					$forma_pago="TARJETA";
					$sumaTDD=$sumaTDD+$total_ticket;
				}else{
					$sumaEfe=$sumaEfe+$total_ticket;
				}
				$suma+=$total_ticket;
				if (!isset($_POST['ticket'])) {
					echo "<tr>";
						echo "<th># ";
							echo $id_ticket;
						echo "</th>";
						echo "<th>";
							echo $nombre_socio;
						echo "</th>";
						echo "<th>";
							echo $nombre_empleado;
						echo "</th>";
						echo "<th>";
							echo $forma_pago;
						echo "</th>";
						echo "<th>";
							echo $fecha_ticket;
						echo "</th>";
						echo "<th>";
							echo $nombre_producto;
						echo "</th>";

						echo "<th>";
							echo "$ ".$costo_producto;
						echo "</th>";
					echo "</tr>";					
				}
			}
			if (!isset($_POST['ticket'])) {
				echo "<tr><th></th><th></th><th></th><th></th><th></th><th style='font-weight: bold; font-size:20px;'>Total</th><th style='font-weight: bold; font-size:20px;'>$ ".$suma."</th></tr>";
				echo '</tbody></table>';
			}
		}
		if (isset($_POST['ticket'])) {
				$logo="";
				$nombre="";
				$direccion="";
				$leyenda_inferior="";
				$confi = "select * from configuracion where id_configuracion = 9";
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
 <script type="text/javascript">
 	  $(document).ready( function () {
    $('#tabla_reporte2').DataTable();
} );

 </script>