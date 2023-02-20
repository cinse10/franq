 <?php 
  include("header.php");
  include("conexion.php");
  $kuerito =  "Select * from productos_cklass";
  $respuesta = mysqli_query($conexion,$kuerito);
  while($productin = mysqli_fetch_array($respuesta)) {
    $inventario_producto= $productin['inventario_producto'];
    $id_producto= $productin['id_producto'];
    $kuerin = "update productos_cklass set inventario_tmp_producto=".$inventario_producto." where id_producto=".$id_producto;
    mysqli_query($conexion,$kuerin);

  }
 ?> 

 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Apartado Cklass</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Iniciar venta</h2> 
                    <br><br>
                    <div class="form-group">
                      <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Nombre<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="nombre" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nombre" >
                      </div>
                    </div>  
                    <br><br>   
                    <div class="form-group">
                      <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Telefono<span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="tel" id="tel" required="required" class="form-control col-md-7 col-xs-12" placeholder="Telefono" >
                      </div>
                    </div>                         
                    <button type="button" style="float: right;" class="btn btn-warning" data-toggle="modal" data-target="#modalNuevo" >Seleccionar cliente</button>
                    <br><br><br>
                    <div style="float: right;" id="cliente"></div>
                  </button>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">                      
                        <div class="form-group">
                          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Codigo de barras: <span class="required">*</span>

                          </label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <select class="selectpicker" data-show-subtext="true" data-live-search="true" id="codigo_barras" name="codigo_barras">
                              <option value=""> Selecciona una producto </option>
                              <?php 
                                  include("conexion.php");
                                  $productos = mysqli_query($conexion,"SELECT * FROM `productos_cklass`");
                                    while ($producto=mysqli_fetch_array($productos)) {
                                        $id_producto=$producto["id_producto"];
                                        $modelo_producto=$producto["modelo_producto"];
                                        $talla_producto=$producto["talla_producto"];
                                        $color_producto=$producto["color_producto"];
                                        $codigo_barras_producto=$producto["codigo_barras_producto"];


                                        echo '<option value= "'.$id_producto.'">'.$modelo_producto.' - '.$talla_producto.' - '.$color_producto.' /  '.$codigo_barras_producto.'</option>';
                                    }
                              ?>
                          </select>
                          <br><br><br>
                          </div>
                          <div class="col-md-3 col-sm-3 col-xs-12"><button class="btn btn-primary" onclick="Registrar();">Agregar</button></div>
                        </div>
                      <br><br>
                      <table id="tablita" class="table table-hover table-condensed table-bordered">
                        <thead>
                          <th>ID producto</th>
                          <th>Nombre producto</th>
                          <th>Costo producto</th>
                          <th>Costo producto final</th>
                          <th>Eliminar</th>
                        </thead>
                        <tbody>
                          <div id="respuesta"></div>
                        </tbody>
                        <tfoot>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td><p style="font-weight: bold; font-size:20px;">Total: </p></td>
                          <td id="tdtotal" style="font-weight: bold; font-size:20px;"></td>
                        </tfoot>
                      </table>
                      <button style="float: right;" class="btn btn-primary" onclick="Cobrar();">Cobrar</button>
                      <div id="ajax"></div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- Modal para seleccionar el cliente -->
        <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Selecciona cliente</h4>
              </div>
              <div class="modal-body">
                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="socio" id="socio">
                  
                  <?php 
                    include("conexion.php");
                    $sql = "Select * from socios_cklass";
                    $respuesta = mysqli_query($conexion,$sql);
                    while($socio = mysqli_fetch_array($respuesta)){
                      $nombre_socio = $socio['nombre_socio']." ".$socio['ap_pat_socio'];
                      $id_socio = $socio['id_socio'];
                      $id_acceso_socio = $socio['id_acceso'];
                      echo '<option data-subtext="'.$id_acceso_socio.'" value="'.$id_socio.'">'.$nombre_socio.'</option>';
                    }
                   ?>
                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
                Seleccionar
                </button>                                   
              </div>
            </div>
          </div>
        </div>

<?php 
  include("footer.php");
?>

 <script type="text/javascript">
  /* Multiple Item Picker */
  $('.selectpicker').selectpicker({
    style: 'btn-default'
  });
</script>
<script type="text/javascript">

  var cliente = 0;
  var productos=[];
  var nombre_gym="";
  var direccion="";
  var leyenda_inferior="";
  var logo="";
  $(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
    alertify.warning("Producto eliminado.");
    Suma();
  });
  window.onload = function () {
    Cargar(); 
    Suma();   
  }
  function validar(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
      Registrar();
    }else{
    }
  }
  function Registrar(){
    var codigo_barras = $("#codigo_barras").val();      
    $.ajax({
      type: "POST",
      dataType: 'html',
      url: "trae_productos_cklass.php",
      data: {"codigo_barras":codigo_barras, 'id_cliente': cliente},
      success: function(resp){
        $('#tablita').append(resp);
        Limpiar();
        Cargar();
        Suma();
      }
    });      
  }   
  function traeidempleado() {
    console.log("id de empleado:"+id_de_empleado);
    console.log("Nombre empleado: "+$("#id_nombre_empleado1").text());
  }
  function Cargar(){
    $('#datagrid').load('trae_productos_cklass.php');    
  }
  function Limpiar(){
    $("#codigo_barras").val("");
  }
  function AgregaArreglo(id_producto){
    productos.push(id_producto);    
  }
  function Cobrar(){
    productos.length=0;    
    $('#tablita tbody').find('tr').each(function(i, el){ 
      AgregaArreglo(parseInt($(this).find('td').eq(0).text()));
    });
    if (productos.length==0) {
      alertify.warning("Carrito vacío.");
    }else{
      efectivoTarjeta();
    }
  }

  function efectivoTarjeta() {
     alertify.confirm()
     alertify.confirm('Pago', '¿Método de pago?', 
      function(){ 
        muestra_total(suma);
      }
      , function(){ 
        muestra_tarjeta(suma);
      }).set('labels', {ok:'Efectivo!', cancel:'Tarjeta!'});
  }

    function muestra_tarjeta(total){
    var pagado=0;
    var mini = total - (total*0.75);
    alertify.prompt("Ventana de cobro!","Total a pagar: $ "+total+"\nLo minimo a pagar : $ "+mini+"\nIngresa pago recibido: ", "",
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
              Genera_ticketTDD(0,0);
              alertify.message('OK');
              });
          }else if(pagado==total){
            alertify
              .alert("Gracias por su compra!", function(){
              Genera_ticketTDD(0,0);
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
    var nombre = $("#nombre").val();
    var tel = $("#tel").val();
    $.ajax({
      type: "POST",
      url: "guarda_apartado_cklass.php",
      data: {'array': JSON.stringify(productos), 'id_cliente': cliente,'id_empleado':id_de_empleado,'abono':abono, 'nombre':nombre, 'tel':tel, 'FPAGO':FPAGO},  
      success: function(data){        
        console.log("el ID del ticket es: "+data);
        console.log("abono: "+abono);
        console.log("resta: "+resta);
        creaTicket(data,abono,resta);
      }
    });
  }

  function Genera_ticket(pagado, total){
    var abono = pagado;
    var total = total;
    var resta = total - abono;
    var nombre = $("#nombre").val();
    var tel = $("#tel").val();
    // console.log("nombre: "+nombre);
    $.ajax({
      type: "POST",
      url: "guarda_apartado_cklass.php",
      data: {'array': JSON.stringify(productos), 'id_cliente': cliente,'id_empleado':id_de_empleado, 'abono':abono, 'nombre':nombre, 'tel':tel},  
      success: function(data){        
        console.log("el ID del ticket es: "+data);
        console.log("abono: "+abono);
        console.log("resta: "+resta);
        creaTicket(data,abono,resta);
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
  function pruebaDatos() {
    console.log("direccion: "+direccion);
    console.log("logo: "+logo);
    console.log("nombre_gym: "+nombre_gym);
    console.log("leyenda_inferior: "+leyenda_inferior);
  }
  function separador(){
    return "--------------------------------------------------";
  }
  function traeDireccion(){
    var accion="direccion";
    var id_configuracion = 7;
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
    var id_configuracion = 7;
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
    var id_configuracion = 7;
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
    var id_configuracion = 7;
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
    return nombre_empleado;
  }
  var nombre_cliente="# 1 PUBLICO EN GENERAL";
  var nombre_empleado="";
  var cliente=1;
  $(document).ready(function(){
    var nombrecito = $("#id_nombre_empleado1").text();
    traeDireccion();
    traeLogo();
    traeLeyendaInferior();
    traeNombreGym();
    $('#cliente').append(nombre_cliente);
    nombre_empleado=nombrecito;
    console.log("nombrecito: "+nombre_empleado);

    $('#guardarnuevo').click(function(){
      var select = document.getElementById("socio"); //El <select>
      var value = select.value; //El valor seleccionado
      var text = select.options[select.selectedIndex].innerText; //El texto de la opción seleccionada
      cliente = value;
      nombre_cliente ="# "+value+" "+text;
      $('#cliente').empty();
      $('#cliente').append(nombre_cliente);
    });
  })

  function traeCliente(){
    var nombre = $("#nombre").val();
    return nombre;
  }

  function creaTicket(id_ticket,abono,resta){
    var myWindow=window.open('','','width=200,height=100');
    myWindow.document.write("<style type='text/css'>* {    font-size: 12px;    font-family: 'Times New Roman';}td,th,tr,table {    border-top: 1px solid black;    border-collapse: collapse;}td.producto,th.producto {    width: 115px;    max-width: 115px;}td.precio,th.precio {    width: 75px;    max-width: 75px;    word-break: break-all;}.centrado {    text-align: center;    align-content: center;}.ticket {    width: 200px;    max-width: 200px;}.total{    font-size: 15px;    font-weight: bold;    font-family: 'Times New Roman';}@media print {  @page { margin: 0; }  body { margin: 1cm; }}</style>");
    myWindow.document.write("<div class='ticket centrado'>");
      myWindow.document.write("<img src='"+logo+"' width='150' height='170' style='margin-top: -30;'>");
      myWindow.document.write("<p class='centrado'>"+nombre_gym+"</p>");
      myWindow.document.write("<p class='centrado'>"+traeFecha()+"</p>");
      myWindow.document.write("<p class='centrado'>"+direccion+"</p>");
      myWindow.document.write("<p class='centrado'>Ticket: #"+id_ticket+"</p>");
      myWindow.document.write("<p class='centrado'>Cajero: "+traeCajero()+"</p>");
      myWindow.document.write("<p class='centrado'>Cliente: "+traeCliente()+"</p>");
      myWindow.document.write("<p>"+separador()+"</p>");
      myWindow.document.write("<table><thead><tr><th class='producto'>PRODUCTO</th><th class='precio'>PRECIO</th></tr></thead>");
        myWindow.document.write("<tbody>");
          $('#tablita tbody').find('tr').each(function(i, el){ 
            myWindow.document.write("<tr><td class='producto'>"+$(this).find('td').eq(1).text()+"</td><td class='precio centrado'>"+$(this).find('td').eq(3).text()+"</td></tr>");  
          });
          myWindow.document.write("<tr><td class='total'>Total: </td><td class='precio centrado total'>$ "+suma+"</td></tr>");
          myWindow.document.write("<tr><td class='total'>Anticipo: </td><td class='precio centrado total'>$ "+abono+"</td></tr>");
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
   var suma = 0;
    var val;
  function Suma(){  
    suma=0; 
    $('#tablita tbody').find('tr').each(function(i, el){ 
    val = $(this).find('td').eq(3).text();

    suma += parseFloat(val.replace("$ ",""));
    });
    $('#tdtotal').text("$ "+suma);
  }
 
  // function valida_pago(total,pagado){
  //   setTimeout(function() {
  //     if(total>pagado){      
  //         var porpagar=total-pagado;
  //         muestra_total(porpagar);
  //     }else if(pagado>total){
  //       var porpagar = pagado-total;
  //       alertify
  //         .alert("Ventana de cobro!","Su cambio: $ "+porpagar, function(){
  //         Genera_ticket();
  //         alertify.message('OK');
  //         });
  //     }else if(pagado==total){
  //       alertify
  //         .alert("Ventana de cobro!","Gracias por su compra!", function(){
  //         Genera_ticket();
  //         alertify.message('OK');
  //         });
  //     }
  //   }, 1000);
    
  // }

   function muestra_total(total){
    var pagado=0;
    var mini = total - (total*0.75);
    alertify.prompt("Ventana de cobro!","Total a pagar: $ "+total+"\nLo minimo a pagar : $ "+mini+"\nIngresa pago recibido: ", "",
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
              Genera_ticket(0,0);
              alertify.message('OK');
              });
          }else if(pagado==total){
            alertify
              .alert("Gracias por su compra!", function(){
              Genera_ticket(0,0);
              alertify.message('OK');
              });
          }
        }
      }else{
        muestra_total(total);
      }
    }, 1000);    
  }


  function refresca_pagina(){
    location.reload();
  }
</script>
