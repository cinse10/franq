<?php 
	include("conexion.php");
	$logo="";
	$nombre="";
	$direccion="";
	$leyenda_inferior="";
	$sql = "select * from configuracion where id_configuracion = '2'";
		$resp = mysqli_query($conexion,$sql);
		while($configuracion= mysqli_fetch_array($resp)){
			$logo = $configuracion['logo'];
			$nombre = $configuracion['nombre'];
			$direccion = $configuracion['direccion'];
			$leyenda_inferior = $configuracion['leyenda_inferior'];
		}

	
	if (isset($_POST['id_ticket'])) {
		$id_ticket=$_POST['id_ticket'];
		$sql = "SELECT * FROM ((`tickets_misentir` INNER JOIN socios ON tickets_misentir.id_cliente = socios.id_socio) INNER JOIN empleados ON tickets_misentir.id_empledo=empleados.id_empleado) WHERE id_ticket=".$id_ticket;
		$respuesta = mysqli_query($conexion,$sql);
		while($ticket = mysqli_fetch_array($respuesta)){
			$empleado = $ticket['nombre_empleado']." ".$ticket['ap_pat_empleado'];
			$cliente = $ticket['nombre_socio']." ".$ticket['ap_pat_socio'];
			echo "<div class='ticket centrado'>";
			echo "<img src='".$logo."' width='150' height='170' style='margin-top: -30;'>";
			echo "<br><br>";
			echo "<style type='text/css'>* {    font-size: 12px;    font-family: 'Times New Roman';}td,th,tr,table {    border-top: 1px solid black;    border-collapse: collapse;}td.producto,th.producto {    width: 115px;    max-width: 115px;}td.precio,th.precio {    width: 75px;    max-width: 75px;    word-break: break-all;}.centrado {    text-align: center;    align-content: center;}.ticket {    width: 200px;    max-width: 200px;}.total{    font-size: 15px;    font-weight: bold;    font-family: 'Times New Roman';}</style>";
			echo $nombre;
			echo "<br><br>";
			$fecha = $ticket['fecha_ticket'];
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
			$kueri = "SELECT * FROM `transacciones_misentir` INNER JOIN productos_misentir ON transacciones_misentir.id_producto=productos_misentir.id_producto WHERE id_ticket=".$id_ticket;
			$respuesta2=mysqli_query($conexion,$kueri);
			$renglones = mysqli_num_rows($respuesta2);
			$suma=0;
			if($renglones!=0){
				
				while($producto = mysqli_fetch_array($respuesta2)){
					echo "<tr>";
						echo "<td>".$producto['nombre_producto']."</td>";
						$suma+=$producto['precio_venta'];
						echo "<td class='precio centrado'>$ ".$producto['precio_venta']."</td>";
						
					echo "</tr>";					
				}
				echo "<tr><td class='total'>Total: </td><td class='precio centrado total'>$ ".$suma."</td></tr>";
				echo "</tbody>";
				echo "</table>";
				echo "<br>";
				echo "--------------------------------------------------";
				echo $leyenda_inferior;
				echo "</div>";
			}
		}
	}else if(isset($_POST['nuevo'])){
		$id_ticket=$_POST['ticket'];
		$sql = "SELECT * FROM ((`tickets_misentir` INNER JOIN socios ON tickets_misentir.id_cliente = socios.id_socio) INNER JOIN empleados ON tickets_misentir.id_empledo=empleados.id_empleado) WHERE id_ticket=".$id_ticket;
		$respuesta = mysqli_query($conexion,$sql);
		while($ticket = mysqli_fetch_array($respuesta)){
			$empleado = $ticket['nombre_empleado']." ".$ticket['ap_pat_empleado'];
			$cliente = "# ".$ticket['id_socio']." ".$ticket['nombre_socio']." ".$ticket['ap_pat_socio'];
			$sig_pago = $ticket['pago_sig_socio'];
			$date = date_create($sig_pago);
			$pago_siguiente = date_format($date, 'd-m-Y');;

			echo "<div class='ticket centrado'>";
			echo "<img src='".$logo."' width='150' height='170' style='margin-top: -30;'>";
			echo "<br><br>";
			echo "<style type='text/css'>* {    font-size: 12px;    font-family: 'Times New Roman';}td,th,tr,table {    border-top: 1px solid black;    border-collapse: collapse;}td.producto,th.producto {    width: 115px;    max-width: 115px;}td.precio,th.precio {    width: 75px;    max-width: 75px;    word-break: break-all;}.centrado {    text-align: center;    align-content: center;}.ticket {    width: 200px;    max-width: 200px;}.total{    font-size: 15px;    font-weight: bold;    font-family: 'Times New Roman';}</style>";
			echo $nombre;
			echo "<br><br>";
			$fecha = $ticket['fecha_ticket'];
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
			$kueri = "SELECT * FROM `transacciones_misentir` INNER JOIN productos_misentir ON transacciones_misentir.id_producto=productos_misentir.id_producto WHERE id_ticket=".$id_ticket;
			$respuesta2=mysqli_query($conexion,$kueri);
			$renglones = mysqli_num_rows($respuesta2);
			$suma=0;
			if($renglones!=0){
				
				while($producto = mysqli_fetch_array($respuesta2)){
					$suma+=$producto['precio_venta'];
					echo "<tr>";
						echo "<td>".$producto['nombre_producto']."</td>";
						echo "<td class='precio centrado'>$ ".$producto['precio_venta']."</td>";
					echo "</tr>";
				}
			}else{
				$kueri2 = "SELECT * FROM `transacciones` INNER JOIN planes ON transacciones.id_plan=planes.id_plan WHERE id_ticket=".$id_ticket;
				$respuesta3=mysqli_query($conexion,$kueri2);
				while($plan = mysqli_fetch_array($respuesta3)){
					$suma+=$plan['costo_plan'];
					echo "<tr>";
						echo "<td>".$plan['nombre_plan']."</td>";
						echo "<td class='precio centrado'>$ ".$plan['costo_plan']."</td>";
					echo "</tr>";
				}

			}			
			echo "<tr><td class='total'>Total: </td><td class='precio centrado total'>$ ".$suma."</td></tr>";
			echo "</tbody>";
			echo "</table>";
			echo "<br>";
			echo "--------------------------------------------------";
			echo "<p class='centrado total'>¡Fecha siguiente de pago: <br>".dameFechaCorta($pago_siguiente)."!</p>";
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