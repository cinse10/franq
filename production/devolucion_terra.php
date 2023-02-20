<?php 
	include("header.php");
	include("conexion.php");
	$id_ticket=$_GET['id_ticket'];
	$sql = "SELECT * FROM ((`tickets_terra` INNER JOIN socios_terra ON tickets_terra.id_cliente = socios_terra.id_socio) INNER JOIN empleados ON tickets_terra.id_empledo=empleados.id_empleado) WHERE id_ticket=".$id_ticket;

    $requi = mysqli_query($conexion,$sql);
    while ($reg=mysqli_fetch_array($requi)) {
    	$fecha= $reg['fecha_ticket'];
    	$id_socio = $reg['id_socio'];
    	$cliente = $reg['nombre_socio']." ".$reg['ap_pat_socio'];
    	$empleado = $reg['nombre_empleado']." ".$reg['ap_pat_empleado'];
    	$total = $reg['total_ticket'];
    	$saldo = $reg['saldo'];
      
    }

?>
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Devolución de Productos Terra</h3>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ticket</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
              	<br>	
              	<div class="form-group">
                    <label for="middle-name" class="control-label col-md-7 col-sm-3 col-xs-12">Fecha Ticket:</label>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <input name="fecha_ticket" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $fecha; ?>" disabled="disabled">
                    </div>
                </div>
                <br>	<br>	<br>	
              	<div class="form-group">
              		<input type="text" name="id_ticket" id="id_ticket" hidden="true" value="<?php echo $id_ticket; ?>">
              		<input type="text" name="id_socio" id="id_socio" hidden="true" value="<?php echo $id_socio; ?>">
              		<input type="text" name="saldo" id="saldo" hidden="true" value="<?php echo $saldo; ?>">
	                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Nombre del cliente <span class="required"></span>
	                </label>
	                <div class="col-md-3 col-sm-6 col-xs-12">
	                  <input type="text" name="nombre_cliente" id="nombre_cliente" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $cliente; ?>" disabled="disabled" >
	                </div>
	               	<div class="form-group">
	                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Empleado<span class="required"></span>
	                    </label>
	                    <div class="col-md-3 col-sm-6 col-xs-12">
	                      <input type="text" name="empleado" id="empleado" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $empleado; ?>" disabled="disabled" >
	                    </div>
	                </div>					                    
	            </div>
	            <br>	<br>	<br>	<br>	
                <div class="x_content">
                  <table id="tabla_tickets" class="table table-striped table-bordered bulk_action">
                    <thead>
                      <tr>
                        <th>Modelo</th>
                        <th>Color</th>
                        <th>Talla</th>
                        <th>Precio</th>
                        <th>Devolucion</th>
                      </tr>
                    </thead>                            
                    <tbody>
                      <?php 
                        include("conexion.php");
                        if (isset($_GET['id_ticket'])) {
            							$id_ticket=$_GET['id_ticket'];
            							$kueri = "SELECT * FROM `transacciones_terra` INNER JOIN productos_terra ON transacciones_terra.id_producto=productos_terra.id_producto WHERE id_ticket=".$id_ticket;
            							$respuesta2=mysqli_query($conexion,$kueri);
            							$renglones = mysqli_num_rows($respuesta2);
            							$suma=0;
            							if($renglones!=0){
            								
            								while($producto = mysqli_fetch_array($respuesta2)){
            									echo "<tr>";
            										echo "<th>".$producto['modelo_producto']."</th>";
                                echo "<th>".$producto['color_producto']."</th>";
                                echo "<th>".$producto['talla_producto']."</th>";
            										$suma+=$producto['precio_venta'];
            										$productillo = $producto['id_producto'];
            										echo "<th>$ ".$producto['precio_venta']."</th>";
            										echo "<th>";
            										if ($producto['precio_venta'] !=0 ) {
            												echo "<button class='btn btn-default btn-sm' onclick='eliminar(".$producto["id_transaccion"].");'><i class='fa fa-trash'></i></button>";
            										}
            											echo "</th>";
            									echo "</tr>";					
            								}
            							}            
                        }
                       ?>                              
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          	<button type="button" class="btn btn-warning" onclick="creaTicket(id_ticket)" >Imprimir Saldo a Favor</button>
        </div>
      </div>
    </div>
  </div>
</div>
		

<?php 
  include("footer.php");
?>

<script type="text/javascript">
function eliminar(id_transaccion) {
	var id_transaccion = id_transaccion;
     alertify.confirm()
     alertify.confirm('Devolución', '¿Desea devolver el producto?', 
      function(){ 
        manda_eliminar(id_transaccion);
      }
      , function(){ 
      }).set('labels', {ok:'Aceptar!', cancel:'Cancelar!'});
  }

   function manda_eliminar(id_transaccion){
	var id_ticket = document.getElementById("id_ticket").value;
    var id_transaccion = id_transaccion;    
    $.ajax({
      type: "POST",
      url: "elimina_producto.php",
      data: {'id_ticket': id_ticket, 'id_transaccion': id_transaccion, 'marca' : 6},  
      success: function(response){ 
        if (response==0) {
            alert("Error al devolver");
        }else{
          alert("Producto devuelto con Éxito");
            location.reload();
        }
      }
    });
  }

  var saldo = document.getElementById("saldo").value;
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
    var id_configuracion = 6;
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
    var id_configuracion = 6;
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
    var id_configuracion = 6;
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
    var id_configuracion = 6;
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

  


  function creaTicket(id_ticket){
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
      myWindow.document.write("<table>");
        myWindow.document.write("<tbody>");
          myWindow.document.write("<tr><td class='total'>SALDO A FAVOR: </td><td class='precio centrado total'>$ "+saldo+"</td></tr>");
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