<?php 
	include("conexion.php");
	$logo="";
	$nombre="";
	$direccion="";
	$leyenda_inferior="";
	$sql = "select * from configuracion where id_configuracion = '12'";
		$resp = mysqli_query($conexion,$sql);
		while($configuracion= mysqli_fetch_array($resp)){
			$logo = $configuracion['logo'];
			$nombre = $configuracion['nombre'];
			$direccion = $configuracion['direccion'];
			$leyenda_inferior = $configuracion['leyenda_inferior'];
		}

	
	if (isset($_POST['id_ticket'])) {
		$id_ticket=$_POST['id_ticket'];
		$sql = "SELECT * FROM ((`tickets_dankriz` INNER JOIN socios_dankriz ON tickets_dankriz.id_cliente = socios_dankriz.id_socio) INNER JOIN empleados ON tickets_dankriz.id_empledo=empleados.id_empleado) WHERE id_ticket=".$id_ticket;
		$respuesta = mysqli_query($conexion,$sql);
		while($ticket = mysqli_fetch_array($respuesta)){
			$empleado = $ticket['nombre_empleado']." ".$ticket['ap_pat_empleado'];
			$cliente = $ticket['nombre_socio']." ".$ticket['ap_pat_socio'];
			$saldo = $ticket['saldito'];
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
			$kueri = "SELECT * FROM `transacciones_dankriz` INNER JOIN productos_dankriz ON transacciones_dankriz.id_producto=productos_dankriz.id_producto WHERE id_ticket=".$id_ticket;
			$respuesta2=mysqli_query($conexion,$kueri);
			$renglones = mysqli_num_rows($respuesta2);
			$suma=0;
			if($renglones!=0){
				
				while($producto = mysqli_fetch_array($respuesta2)){
					echo "<tr>";
						echo "<td>".$producto['modelo_producto']."-" .$producto['talla_producto']."-".$producto['color_producto']."</td>";
						$suma+=$producto['precio_venta'];
						echo "<td class='precio centrado'>$ ".$producto['precio_venta']."</td>";
					echo "</tr>";					
				}
				$sumin = ((ceil($suma)+floor($suma))/2);
				echo "<tr><td class='total'>Total: </td><td class='precio centrado total'>$ ".$sumin."</td></tr>"; 
				echo "<tr><td class='total'>Saldo: </td><td class='precio centrado total'>$ ".$saldo."</td></tr>";
				$pagado = $sumin - $saldo;
				echo "<tr><td class='total'>Total Pagado: </td><td class='precio centrado total'>$ ".$pagado."</td></tr>";
				echo "</tbody>";
				echo "</table>";
				echo "<br>";
				echo "--------------------------------------------------";
				echo $leyenda_inferior;
				echo "</div>";
			}
			
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