<?php 
	include("conexion.php");
	$logo="";
	$nombre="";
	$direccion="";
	$leyenda_inferior="";
	$sql = "select * from configuracion where id_configuracion = '10'";
		$resp = mysqli_query($conexion,$sql);
		while($configuracion= mysqli_fetch_array($resp)){
			$logo = $configuracion['logo'];
			$nombre = $configuracion['nombre'];
			$direccion = $configuracion['direccion'];
			$leyenda_inferior = $configuracion['leyenda_inferior'];
		}

	
	if (isset($_POST['id_ticket'])) {
		$id_ticket=$_POST['id_ticket'];
		$sql = "SELECT * FROM `venta_caja` INNER JOIN dist_hijo ON venta_caja.id_dist_hijo = dist_hijo.id_dist_hijo  INNER JOIN empleados ON venta_caja.id_empleado = empleados.id_empleado WHERE id_venta_caja=".$id_ticket;
		$respuesta = mysqli_query($conexion,$sql);
		while($ticket = mysqli_fetch_array($respuesta)){
			$empleado = $ticket['nombre_empleado']." ".$ticket['ap_pat_empleado'];
			$cliente = $ticket['nombre_dist_hijo'];
			echo "<div class='ticket centrado'>";
			echo "<img src='".$logo."' width='150' height='170' style='margin-top: -30;'>";
			echo "<br><br>";
			echo "<style type='text/css'>* {    font-size: 12px;    font-family: 'Times New Roman';}td,th,tr,table {    border-top: 1px solid black;    border-collapse: collapse;}td.producto,th.producto {    width: 115px;    max-width: 115px;}td.precio,th.precio {    width: 75px;    max-width: 75px;    word-break: break-all;}.centrado {    text-align: center;    align-content: center;}.ticket {    width: 200px;    max-width: 200px;}.total{    font-size: 15px;    font-weight: bold;    font-family: 'Times New Roman';}</style>";
			echo $nombre;
			echo "<br><br>";
			$fecha = $ticket['fecha_venta'];
			$date = date_create($fecha);
			echo dameFechaCorta(date_format($date, 'd-m-Y'));
			echo "<br>";
			echo date_format($date, 'h:i A');
			echo "<br><br>";
			echo $direccion;
			echo "<br><br>";
			echo "Ticket: #".$id_ticket;
			echo "<br><br>";
			echo "Cajero: ".$empleado;
			echo "<br><br>";
			echo "Cliente: ".$cliente;
			echo "<br><br>";
			echo "<table><thead><tr><th class='producto'>PRODUCTO</th><th class='precio'>PRECIO</th></tr></thead>";
			echo "<tbody>";			
				echo "<tr>";
					echo "<td>Pedido Betterware</td>";
					echo "<td class='precio centrado'>$ ".$ticket['monto_caja']."</td>";
				echo "</tr>";		
			echo "<tr><td class='total'>Total: </td><td class='precio centrado total'>$ ".$ticket['monto_caja']."</td></tr>";	
			echo "<tr><td class='total'>Devolución: </td><td class='precio centrado total'>$ ".$ticket['dev_final']."</td></tr>";	
			$total_pedido = round($ticket['monto_caja'] - $ticket['dev_final'] );
			echo "<tr><td class='total'>Total Final: </td><td class='precio centrado total'>$ ".$total_pedido."</td></tr>";	
			echo "<tr><td class='total'>Pagado: </td><td class='precio centrado total'>$ ".$ticket['monto_pagado']."</td></tr>";
			if ($total_pedido!=$ticket['monto_pagado']) {
				$por_liq = $total_pedido - $ticket['monto_pagado'];
				echo "<tr><td class='total'>Por Liquidar: </td><td class='precio centrado total'>$ ".$por_liq."</td></tr>";
			}
			echo "</tbody>";
			echo "</table>";
			echo "<br>";
			echo "--------------------------------------------------";
			echo $leyenda_inferior;
			echo "</div>";
		}		
			
	}
	

function dameFechaCorta($fecha){
  		strval($fecha);
  		$date = date_create($fecha);
		$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
		$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	 	//Salida: Vie 24 de Feb del 2012
		return $dias[date_format($date, 'w')].", ".date_format($date, 'd')." de ".$meses[date_format($date, 'n')-1]. " del ".date_format($date, 'Y') ;
  	
  	}
 ?>