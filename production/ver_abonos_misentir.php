  <?php 
	include ("header.php");
	include("conexion.php");
	if (isset($_GET['id_ticket'])) {
		$id_ticket = $_GET['id_ticket'];
	
		$sql = "SELECT * FROM `apartado_misentir`  INNER JOIN empleados ON apartado_misentir.id_empledo=empleados.id_empleado WHERE id_ticket=".$id_ticket;
        $requi = mysqli_query($conexion,$sql);
        while ($reg=mysqli_fetch_array($requi)) {
        	$id_ticket = $reg['id_ticket'];
        	$nombre_cliente = $reg['nombre_cliente'];
          $telefono_cliente = $reg['telefono_cliente'];
        	$empleado = $reg['nombre_empleado']." ".$reg['ap_pat_empleado'];
        	$total_ticket = $reg['total_ticket'];
        	$fecha_ticket = $reg['fecha_ticket'];
        	$total_abono = $reg['total_abono'];
    	}
        
    }
?>
			<!-- page content -->
			        <div class="right_col" role="main">
			          <div class="">
			            <div class="page-title">
			              <div class="title_left">
			                <h3>Apartado Mi Sentir</h3>
			              </div>
			            </div>
			            <div class="clearfix"></div>
			            <div class="row">
			              <div class="col-md-12 col-sm-12 col-xs-12">
			                <div class="x_panel">
			                  <div class="x_title">
			                    <h2>Ver Apartados</h2>
			                    <div class="clearfix"></div>
			                  </div>
								          <?php
			                    	echo '<h2 align="center">Ticket # '.$id_ticket.' </h2>'
			                    ?>
			                    <br>
			                  <div class="x_content">
			                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" >
			                      	
				                      <div class="form-group">
				                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Nombre del cliente <span class="required"></span>
				                        </label>
				                        <div class="col-md-3 col-sm-6 col-xs-12">
				                        	<input type="text" name="id_ticket" id="id_ticket" hidden="true" value="<?php echo $id_ticket; ?>">
				                          <input type="text" name="nombre_cliente" id="nombre_cliente" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nombre_cliente; ?>" disabled="disabled" >
				                        </div>
					                   	<div class="form-group">
					                        <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Empleado<span class="required"></span>
					                        </label>
					                        <div class="col-md-3 col-sm-6 col-xs-12">
					                          <input type="text" name="empleado" id="empleado" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $empleado; ?>" disabled="disabled" >
					                        </div>
					                    </div>					                    
				                      </div>
                              <div class="form-group">
                                  <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Telefono Cliente<span class="required"></span>
                                  </label>
                                  <div class="col-md-3 col-sm-6 col-xs-12">
                                    <input type="text" name="tel" id="tel" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $telefono_cliente; ?>" disabled="disabled" >
                                  </div>
                              </div>  
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-7 col-sm-3 col-xs-12">Fecha Apartado:</label>
				                        <div class="col-md-3 col-sm-6 col-xs-12">
				                          <input name="fecha_ticket" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $fecha_ticket; ?>" disabled="disabled">
				                        </div>
				                      </div>	
				                        <button aligner ="right" type="button" class="btn btn-warning" onclick="abonar()" data-dismiss="modal">Abonar</button>
				                      <br><br>	
				                      <div class="col-md-12 col-sm-12 col-xs-12">
					                      <div class="x_panel">
					                        <div class="x_content">
					                      	    <table id="tabla_transc" align="center" class="table table-striped table-bordered bulk_action">
							                      	<thead>
						                              <tr>
						                                <th>ID</th>
						                                <th>Producto</th>
						                                <th>Precio</th>
						                              </tr>
						                            </thead>                            
						                            <tbody>
						                              <?php 
						                                include("conexion.php");
						                                $sql2 = "SELECT * FROM `transac_apartado_misentir` INNER JOIN productos_misentir ON transac_apartado_misentir.id_producto=productos_misentir.id_producto WHERE id_ticket=".$id_ticket;

						                                $requi2 = mysqli_query($conexion,$sql2);
						                                while ($reg=mysqli_fetch_array($requi2)) {
						                                  echo "<tr>";
						                                    echo "<th>".$reg['id_producto']."</th>";
						                                    echo "<th>".$reg['nombre_producto']."</th>";
						                                    echo "<th>$ ".$reg['precio_venta']."</th>";
						                                  echo "</tr>";
						                                }
						                               ?>  
						                                                          
						                            </tbody>
						                            <tfoot>
						                            	<?php
						                            	echo "<tr>";
						                                    echo "<th></th>";
						                                    echo "<th><p style='font-weight: bold; font-size:20px;' align ='right'>Total: </p></th>";
						                                    echo "<th  style='font-weight: bold; font-size:20px;'> $ ".$total_ticket."</th>";
						                                  echo "</tr>";
						                                  echo "<tr>";
						                                    echo "<th></th>";
						                                    echo "<th><p style='font-weight: bold; font-size:20px;' align ='right'>Abono: </p></th>";
						                                    echo "<th  style='font-weight: bold; font-size:20px;'> $ ".$total_abono."</th>";
						                                  echo "</tr>";
						                            	?> 
						                            	<?php
						                            	$liquidar = $total_ticket -$total_abono;
						                            	echo "<tr>";
						                                    echo "<th></th>";
						                                    echo "<th><p style='font-weight: bold; font-size:20px;' align ='right'>Por liquidar: </p></th>";
						                                    echo "<th  style='font-weight: bold; font-size:20px;'> $ ".$liquidar."</th>";
						                                  echo "</tr>";
						                            	?>   						                            	
						                            </tfoot>
						                      	</table>
						                      	<input type="number" name="liquidar" id="liquidar" hidden="true" value="<?php echo $liquidar; ?>">
						                      	<input type="number" name="total_ticket" id="total_ticket" hidden="true" value="<?php echo $total_ticket; ?>">
						                      	<input type="number" name="total_abono" id="total_abono" hidden="true" value="<?php echo $total_abono; ?>">
						                      </div>
						                  </div>
						              </div>						              
						              <h2>Abonos:</h2>
						              <div class="col-md-7 col-sm-7 col-xs-7">
					                      <div class="x_panel">
					                        <div class="x_content">
					                      	    <table id="tabla_abonos" align="center" class="table table-striped table-bordered bulk_action">
							                      	<thead>
						                              <tr>
						                                <th>Fecha aplicado</th>
                                            <th>Tipo de Pago</th>
                                            <th>Abono</th>
						                              </tr>
						                            </thead>                            
						                            <tbody>
						                              <?php 
						                                include("conexion.php");
						                                $sql3 = "SELECT * FROM `abonos_misentir` WHERE id_ticket=".$id_ticket;

						                                $requi3 = mysqli_query($conexion,$sql3);
						                                while ($reg=mysqli_fetch_array($requi3)) {
						                                  echo "<tr>";
						                                    echo "<th>".$reg['fecha_abono']."</th>";
                                                echo "<th> ".$reg['forma_pago']."</th>";
                                                echo "<th>$ ".$reg['abono']."</th>";
						                                  echo "</tr>";
						                                }
						                               ?>                       
						                            </tbody>
						                            <tfoot>
						                            	<?php
						                            	echo "<tr>";
                                                echo "<th></th>";
						                                    echo "<th><p style='font-weight: bold; font-size:20px;' align ='right'>Abono: </p></th>";
						                                    echo "<th  style='font-weight: bold; font-size:20px;'> $ ".$total_abono."</th>";
						                                  echo "</tr>";
						                            	?>   						                            	
						                            </tfoot>
						                      	</table>
						                      </div>
						                  </div>
						              </div>
					                </div>
			                    </form>
			                  </div>
			                </div>
			              </div>
			            </div>
			          </div>
			        </div>
			        <!--<button onclick="creaTicket(1,200,500);">Prueba</button>-->
			        <!-- /page content -->
			<?php 
			include ("footer.php");
			?>
<script type="text/javascript">
	var liquidar = document.getElementById("liquidar").value;
	var total_ticket = document.getElementById("total_ticket").value;
	var total_abono = document.getElementById("total_abono").value;
	var ticket = document.getElementById("id_ticket").value;
	 $(document).ready(function() {
	 	var direccion;
	 	var logo;
	 	var nombre_gym;
	 	var leyenda_inferior;

	 	traeDireccion();
	  	traeLogo();
	  	traeNombreGym();
	  	traeLeyendaInferior();
	  	
	 });

  function pruebaDatos() {
    console.log("direccion: "+direccion);
    console.log("logo: "+logo);
    console.log("nombre_gym: "+nombre_gym);
    console.log("leyenda_inferior: "+leyenda_inferior);
  }
	function abonar() {
     alertify.confirm()
     alertify.confirm('Pago', '¿Método de pago?', 
      function(){ 
        muestra_total(liquidar);
      }
      , function(){
        muestra_tarjeta(liquidar);
      }).set('labels', {ok:'Efectivo!', cancel:'Tarjeta!'});
  }
  function muestra_total(total){
    var pagado=0;
    var mini = total;
    alertify.prompt("Ventana de cobro!","Resta por pagar $"+mini+"\nIngresa pago recibido: ", "",
            function(evt, value ){
              pagado=value;
              console.log("total: "+total);
              console.log("pagado: "+pagado);
              console.log("mini: "+mini);
              valida_pago(total,pagado,mini);
            },
            function(){
              alertify.error('Cancelado');
            })
            ;
  }

  function muestra_tarjeta(total){
    var pagado=0;
    var mini = total;
    alertify.prompt("Ventana de cobro!","Resta por pagar $"+mini+"\nIngresa pago recibido: ", "",
            function(evt, value ){
              pagado=value;
              console.log("total: "+total);
              console.log("pagado: "+pagado);
              console.log("mini: "+mini);
              validaTransaccion(total,pagado,mini);
            },
            function(){
              alertify.error('Cancelado');
            })
            ;
  }


  function validaTransaccion(total,pagado,mini){
     console.log("Entero: "+parseFloat(pagado));
      pagado = parseFloat(pagado);

    setTimeout(function() {
      if(Number.isInteger(pagado)){
        
        if(pagado<0){
            muestra_tarjeta(total);
            console.log("no fue numero");
        }else{
          console.log("fue numero");
          if(total>pagado){      
              var porpagar=total-pagado;
              alertify
              .alert("Resta por Liquidar: $ "+porpagar, function(){
              Genera_ticketTDD(pagado,total);
              alertify.message('OK');
              });
          }else if(pagado>total){
            var porpagar = pagado-total;
            alertify
              .alert("Su cambio: $ "+porpagar, function(){
              Genera_ticketTDD(total,total);
              alertify.message('OK');
              });
          }else if(pagado==total){
            alertify
              .alert("Gracias por su compra!", function(){
              Genera_ticketTDD(pagado,total);
              alertify.message('OK');
              });
          }
        }
      }else{
        muestra_tarjeta(total);
      }
    }, 1000);       

  }
 

  function Genera_ticketTDD(pagado, total){
    var FPAGO = "TARJETA";
    var abono = pagado;
    var total = total;
    var resta = total - abono;
    var abonado = total_ticket - resta;
    var nombre = $("#nombre").val();
    $.ajax({
      type: "POST",
      url: "guarda_abono_misentir.php",
      data: {'id_ticket': ticket, 'abono':abono, 'FPAGO':FPAGO},  
      success: function(data){        
        console.log("el ID del ticket es: "+data);
        console.log("total:"+total);
        console.log("abono: "+abono);
        console.log("resta: "+resta);
        creaTicket(data,abono,resta,abonado);
      }
    });
  }
  
  function valida_pago(total,pagado,mini){
      console.log("Entero: "+parseFloat(pagado));
      pagado = parseFloat(pagado);

    setTimeout(function() {
      if(Number.isInteger(pagado)){
        
        if(pagado<0){
            muestra_total(total);
            console.log("no fue numero");
        }else{
          console.log("fue numero");
          if(total>pagado){      
              var porpagar=total-pagado;
              alertify
              .alert("Resta por Liquidar: $ "+porpagar, function(){
              Genera_ticket(pagado,total);
              alertify.message('OK');
              });
          }else if(pagado>total){
            var porpagar = pagado-total;
            alertify
              .alert("Su cambio: $ "+porpagar, function(){
              Genera_ticket(total,total);
              alertify.message('OK');
              });
          }else if(pagado==total){
            alertify
              .alert("Gracias por su compra!", function(){
              Genera_ticket(pagado,total);
              alertify.message('OK');
              });
          }
        }
      }else{
        muestra_total(total);
      }
    }, 1000);    
  }

  function Genera_ticket(pagado, total){
    var abono = pagado;
    var total = total;
    var resta = total - abono;
    var abonado = total_ticket - resta;
    var nombre = $("#nombre").val();
    console.log("nombre: "+nombre);
    $.ajax({
      type: "POST",
      url: "guarda_abono_misentir.php",
      data: {'id_ticket': ticket, 'abono':abono, },  
      success: function(data){        
        console.log("el ID del ticket es: "+data);
        console.log("total:"+total);
        console.log("abono: "+abono);
        console.log("resta: "+resta);
        creaTicket(data,abono,resta,abonado);
      }
    });
  }


    
  //Generador para el ticket
  function traeFecha(){
    var hoy = new Date();
    var dd = hoy.getDate();
    var mm = hoy.getMonth()+1;
    var yyyy = hoy.getFullYear();
    var hh = hoy.getHours();
    var min = hoy.getMinutes();
    var ss = hoy.getSeconds();
    //hh =addZero(hh);
    //min =addZero(min);
    //ss =addZero(ss);

    //var cad=hh+":"+min+":"+ss; 
    dd=addZero(dd);
    mm=addZero(mm);

    var weekday = new Array(7);
    weekday[0] =  "Domingo";
    weekday[1] = "Lunes";
    weekday[2] = "Martes";
    weekday[3] = "Miércoles";
    weekday[4] = "Jueves";
    weekday[5] = "Viernes";
    weekday[6] = "Sábado";

    var dia = weekday[hoy.getDay()];

    var month = new Array();
    month[0] = "Enero";
    month[1] = "Febrero";
    month[2] = "Marzo";
    month[3] = "Abril";
    month[4] = "Mayo";
    month[5] = "Junio";
    month[6] = "Julio";
    month[7] = "Agosto";
    month[8] = "Septiembre";
    month[9] = "Octubre";
    month[10] = "Noviembre";
    month[11] = "Diciembre";
    var mes = month[hoy.getMonth()];


    var ampm = hh >= 12 ? 'pm' : 'am';
    hh = hh % 12;
    hh = hh ? hh : 12; // the hour '0' should be '12'
    min = min < 10 ? '0'+min : min;
    hh=addZero(hh);
    var strTime = hh + ':' + min + ' ' + ampm;

    return dia+"  "+dd+" de "+mes+" de "+yyyy+"<br>"+strTime;
  }
  function addZero(i) {
    if (i < 10) {
        i = '0' + i;
    }
    return i;
  }

  function separador(){
    return "--------------------------------------------------";
  }
  function traeDireccion(){
    var accion="direccion";
    var id_configuracion = 2;
    var regresa;
    $.ajax({
        url         :   'traeConfiguracion.php',
        dataType    :   "html",/* JSON, HTML, SJONP... */
        type        :   "POST", /* POST or GET; Default = GET */
        data: {'configuracion': accion, 'id_configuracion': id_configuracion},  
        success     :   function( response ){

          regresa = response;
          direccion=response;
        }
    });
  }
  function traeLogo(){
    var accion="logo";
    var id_configuracion = 2;
    var regresa="";
    $.ajax({
        url         :   'traeConfiguracion.php',
        dataType    :   "html",/* JSON, HTML, SJONP... */
        type        :   "POST", /* POST or GET; Default = GET */
        data: {'configuracion': accion, 'id_configuracion': id_configuracion},  
        success     :   function( response ){
          regresa = response;
          logo=response;
        }
    });
  }

  function traeLeyendaInferior(){
    var accion="leyenda_inferior";
    var id_configuracion = 2;
    var regresa="";
    $.ajax({
        url         :   'traeConfiguracion.php',
        dataType    :   "html",/* JSON, HTML, SJONP... */
        type        :   "POST", /* POST or GET; Default = GET */
        data: {'configuracion': accion, 'id_configuracion': id_configuracion},  
        success     :   function( response ){
          regresa = response;
          leyenda_inferior=response;
        }
    });
  }
  function traeNombreGym(){
    var accion="nombre";
    var id_configuracion = 2;
    var regresa="";
    $.ajax({
        url         :   'traeConfiguracion.php',
        dataType    :   "html",/* JSON, HTML, SJONP... */
        type        :   "POST", /* POST or GET; Default = GET */
        data: {'configuracion': accion, 'id_configuracion': id_configuracion},  
        success     :   function( response ){
          regresa = response;
          nombre_gym=response;
        }
    });
  }

  function traeCajero(){
  	var nombre_empleado =  document.getElementById("empleado").value;
    return nombre_empleado;
  }
  

  function traeCliente(){
    var nombre =  document.getElementById("nombre_cliente").value;
    return nombre;
  }

  


  function creaTicket(id_ticket,abono,resta,abonado){
    var myWindow=window.open('','','width=200,height=100');
    myWindow.document.write("<style type='text/css'>* {    font-size: 12px;    font-family: 'Times New Roman';}td,th,tr,table {    border-top: 1px solid black;    border-collapse: collapse;}td.producto,th.producto {    width: 115px;    max-width: 115px;}td.precio,th.precio {    width: 75px;    max-width: 75px;    word-break: break-all;}.centrado {    text-align: center;    align-content: center;}.ticket {    width: 200px;    max-width: 200px;}.total{    font-size: 15px;    font-weight: bold;    font-family: 'Times New Roman';}@media print {  @page { margin: 0; }  body { margin: 1cm; }}</style>");
    myWindow.document.write("<div class='ticket centrado'>");
      // myWindow.document.write("<img src='"+logo+"' width='150' height='170' style='margin-top: -30;'>");
      myWindow.document.write("<p class='centrado'>"+nombre_gym+"</p>");
      myWindow.document.write("<p class='centrado'>"+traeFecha()+"</p>");
      myWindow.document.write("<p class='centrado'>"+direccion+"</p>");
      myWindow.document.write("<p class='centrado'>Ticket: #"+ticket+"</p>");
      myWindow.document.write("<p class='centrado'>Cajero: "+traeCajero()+"</p>");
      myWindow.document.write("<p class='centrado'>Cliente: "+traeCliente()+"</p>");
      myWindow.document.write("<p>"+separador()+"</p>");
      myWindow.document.write("<table><thead><tr><th class='producto'>PRODUCTO</th><th class='precio'>PRECIO</th></tr></thead>");
        myWindow.document.write("<tbody>");
          $('#tabla_transc tbody').find('tr').each(function(i, el){ 
            myWindow.document.write("<tr><td class='producto'>"+$(this).find('th').eq(1).text()+"</td><td class='precio centrado'>"+$(this).find('th').eq(2).text()+"</td></tr>");  
          });
          myWindow.document.write("<tr><td class='total'>Total: </td><td class='precio centrado total'>$ "+total_ticket+"</td></tr>");
          myWindow.document.write("<tr><td class='total'>Total Abono: </td><td class='precio centrado total'>$ "+abonado+"</td></tr>");
          myWindow.document.write("<tr><td class='total'>Por Liquidar: </td><td class='precio centrado total'>$ "+resta+"</td></tr>");
        myWindow.document.write("</tbody>");
      myWindow.document.write("</table>");
      myWindow.document.write("<p>"+separador()+"</p>"); 
    myWindow.document.write("<p class='centrado'>"+leyenda_inferior+"</p>");


    myWindow.document.write("</div>");
    
    myWindow.document.close();
   
    myWindow.focus();
    setTimeout(function() {
      myWindow.print();
      myWindow.close();
    }, 100);
    setTimeout(function() {
      refresca_pagina();  
    }, 1000);
    
  }
  //termina el ticket


  function refresca_pagina(){
    location.reload();
  }

</script>