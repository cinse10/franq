<?php
    include("conexion.php"); 
    if (isset($_POST['arr'])) {
        $arre = $_POST['arr'];
        //echo $_POST['fecha_inicio'];
       
        $id = (json_encode($arre));
         // print_r($arre);
        $inicio = '2023-01-07';
        //$inicio = 'fecha_inicio';
        $fin = '2023-01-07';
        //$fin = 'fecha_fin';
       
	}
        //foreach
        //$re = $conexion->query("select * from tickets where id_ticket = ".$arre[0]);
        $re = $conexion->query("select id_ticket, total_ticket, forma_pago, fecha_ticket, nombre_empleado, ap_pat_empleado, nombre_socio, nombre_marca from tickets INNER JOIN empleados ON tickets.id_empledo=empleados.id_empleado INNER JOIN socios ON tickets.id_cliente=socios.id_socio INNER JOIN marcas ON tickets.id_marca=marcas.id_marca where fecha_ticket between'".$inicio." 00:00:00' AND '".$fin." 23:59:59' && id_socio!=137  UNION ALL SELECT apartado_bike.id_ticket, abono, forma_pago, fecha_abono, nombre_empleado, ap_pat_empleado, nombre_cliente, nombre_marca FROM apartado_bike INNER JOIN abonos_bike ON apartado_bike.id_ticket = abonos_bike.id_ticket INNER JOIN empleados ON apartado_bike.id_empledo = empleados.id_empleado INNER JOIN marcas ON apartado_bike.id_marca = marcas.id_marca where fecha_abono between'".$inicio." 00:00:00' AND '".$fin." 23:59:59'");
        while($f=mysqli_fetch_array($re)){
            $id_ticket = $f['id_ticket'];
            $nombre_socio = $f['nombre_socio'];
            $forma_pago = $f['forma_pago'];
            $nombre_marca = $f['nombre_marca'];

             echo "$id_ticket";
                echo "$nombre_socio";
                echo "$forma_pago";
                echo "$nombre_marca";
        }


      


?>         