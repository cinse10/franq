<?php 
  include("header.php");
  include("conexion.php");
  $kuerito =  "Select * from productos_dankriz";
  $respuesta = mysqli_query($conexion,$kuerito);
  while($productin = mysqli_fetch_array($respuesta)) {
    $inventario_producto= $productin['inventario_producto'];
    $id_producto= $productin['id_producto'];
    $kuerin = "update productos_dankriz set inventario_tmp_producto=".$inventario_producto." where id_producto=".$id_producto;
    mysqli_query($conexion,$kuerin);

  }
 ?> 
 

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Inventario Dankriz</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                <a href="ver_inventario_dankriz.php"  style="float: right;" class="btn btn-warning">Ver Inventario</a>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">                      
                        <div class="form-group">
                          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Selecciona un producto : <span class="required">*</span>
                          

                          </label>
                          <div class="col-md-3 col-sm-3 col-xs-12" onclick="Registrar();">
                            <select class="selectpicker" data-show-subtext="true" data-live-search="true" id="codigo_barras" name="codigo_barras">
                                <option value=""> Selecciona un producto </option>
                                
                                
                                <?php 
                                    include("conexion.php");
                                    $productos = mysqli_query($conexion,"SELECT modelo_ck,talla,color,codigo_barras_producto FROM dankriz" );
                                    while ($producto=mysqli_fetch_array($productos)) {
                                        //$id_producto=$producto["id_dankriz"];
                                        $modelo_producto=$producto["modelo_ck"];
                                        $talla_producto=$producto["talla"];
                                        $color_producto=$producto["color"];
                                        $codigo_barras_producto=$producto["codigo_barras_producto"];

                                        echo '<option value= "'.$codigo_barras_producto.'">'.$modelo_producto.' - '.$talla_producto.' - '.$color_producto.' /  '.$codigo_barras_producto.'</option>';
                                    }
                                ?>
                            </select>
                          
                            
                          </div>
                          <!--<div class="col-md-3 col-sm-3 col-xs-12"><button class="btn btn-primary" onclick="Registrar();">Agregar</button></div>-->
                        </div>
                      <br><br>
                     <!-- <table id="tablita" class="table table-hover table-condensed table-bordered">
                        <thead>
                          <th>ID producto</th>
                          <th>Nombre producto</th>
                          <th>Precio producto</th>
                          <th>Precio final</th>
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
                      <button style="float: right;" class="btn btn-primary" onclick="Registrar();">Subir</button>
                      <div id="ajax"></div>
                                  -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- Modal para seleccionar el cliente -->
        
        <!-- Modal para seleccionar el cliente -->
        

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
  var saldo = 0; 
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
  function valida_empleado(){
    var id_cliente = $("#socio").val();  
    if (id_cliente==21 || id_cliente==68 || id_cliente==79) {
      $("#modalNuevo").modal('hide');
      $("#modalEmpleado").modal('show');     
    }   
  }
  function validaContrasena(){    
    var pw = $("#password").val();  
    $.ajax({
        type: "POST",
        url: "valida_pw.php",
        data: { 'pw': pw},  
        success: function(data){        
          if (data==0) {
            $("#modalEmpleado").modal('hide'); 
            $("#modalNuevo").modal('show');
            console.log(data);
          }else{
            console.log(data);
            cambia_socio(1);
          }
        }
      });

  }
  function Registrar(){
    var codigo_barras = $("#codigo_barras").val();     
    $.ajax({
      type: "POST",
      dataType: 'html',
      url: "guarda_dankriz1.php",
      data: {"codigo_barras":codigo_barras},
      success: function(resp){
       switch(resp){
                    case '0':
                        console.log("No lo pude guardar");
                        swal("No lo pude guardar!", {
                          buttons: false,
                          icon: "error",
                          timer: 2000,
                        });
                        break;
                    case '7':
                        /*console.log("No encontré ese producto");
                        swal("No encontré ese producto!", {
                          buttons: false,
                          icon: "error",
                          timer: 2000,
                        });*/
                        break;
                    default:
                        console.log(resp);
                        swal(resp, {
                          buttons: false,
                          icon: "success",
                          timer: 5000,
                        });
                        break;
                }
      }
      ///////
      /*var codigo= $("#codigo").value;
        document.querySelector("#codigo").value = "";
        document.querySelector("#codigo").focus();
        $.ajax({
            type: "POST",
            dataType: 'html',
            url: "guarda_dankriz.php",
            data: "#codigo="+codigo,
            success: function(resp){                    
                switch(resp){
                    case '0':
                        console.log("No lo pude guardar");
                        swal("No lo pude guardar!", {
                          buttons: false,
                          icon: "error",
                          timer: 2000,
                        });
                        break;
                    case '7':
                        console.log("No encontré ese producto");
                        swal("No encontré ese producto!", {
                          buttons: false,
                          icon: "error",
                          timer: 2000,
                        });
                        break;
                    default:
                        console.log(resp);
                        swal(resp, {
                          buttons: false,
                          icon: "success",
                          timer: 5000,
                        });
                        break;
                }
            }
        });*/

    }); 
    Limpiar();     
  }   
  function traeidempleado() {
    console.log("id de empleado:"+id_de_empleado);
    console.log("Nombre empleado: "+$("#id_nombre_empleado1").text());
  }
  function Cargar(){
    $('#datagrid').load('trae_productos_dankriz.php');    
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
    var final = Math.round(suma-saldo);
     alertify.confirm()
     alertify.confirm('Pago', '¿Método de pago?', 
      function(){ 
        muestra_total(final);
      }
      , function(){ 
        muestra_tarjeta(final);
      }).set('labels', {ok:'Efectivo!', cancel:'Tarjeta!'});
  }

    function muestra_tarjeta(total){
    var pagado=0;
    alertify.prompt("Ventana de cobro!","Total a pagar: $ "+total+"\nIngresa el monto a pagar con Tarjeta: ", "",
            function(evt, value ){
              pagado=value;
              valida_monto(total,pagado);
            },
            function(){
              alertify.error('Cancel');
            })
            ;
  }

  function validaTransaccion(id_transaccion){  
    setTimeout(function() {
      if(id_transaccion===""){
        console.log("vasio");
        muestra_tarjeta(suma);      
      }else{
        Genera_ticketTDD(id_transaccion);
        console.log("no vacio, "+id_transaccion);
      }
    }, 1000);
  }



  function valida_monto(total,pagado){
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
              console.log("entre a valida pago primer if: "+porpagar);
              muestra_tdd(porpagar,pagado);
          }else if(pagado>total){
            var porpagar = pagado-total;
            alertify
              .alert("Gracias por su compra!", function(){
              Genera_ticketTDD(pagado);
              alertify.message('OK');
              });
          }else if(pagado==total){
            alertify
              .alert("Gracias por su compra!", function(){
              Genera_ticketTDD(pagado);
              alertify.message('OK');
              });
          }
        }
      }else{
        muestra_tarjeta(total);
      }
    }, 1000);    
  }

  function muestra_tdd(total,pagado){
    alertify.prompt("Ventana de cobro!","Total a pagar: $ "+total+"\nIngresa pago recibido: ", "",
            function(evt, value ){
              Genera_ticketTDD(pagado);
            },
            function(){
              alertify.error('Cancelado');
            })
            ;
  }


  function Genera_ticketTDD(id_transaccion){
    var FPAGO = id_transaccion;
    $.ajax({
      type: "POST",
      url: "guarda_compra_dankriz.php",
      data: {'array': JSON.stringify(productos), 'id_cliente': cliente,'id_empleado':id_de_empleado,'FPAGO':FPAGO},  
      success: function(data){        
        console.log("el ID del ticket es: "+data);
        creaTicket(data);
      }
    });
  }

  function Genera_ticket(){
    $.ajax({
      type: "POST",
      url: "guarda_compra_dankriz.php",
      data: {'array': JSON.stringify(productos), 'id_cliente': cliente,'id_empleado':id_de_empleado},  
      success: function(data){        
        console.log("el ID del ticket es: "+data);
        creaTicket(data);
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
  function traeSaldo(){
    $.ajax({
        url         :   'traeSaldo.php',
        dataType    :   "html",/* JSON, HTML, SJONP... */
        type        :   "POST", /* POST or GET; Default = GET */
        data: {'id_cliente': cliente, 'marca': 7},  
        success     :   function( response ){
          saldo = response;
          Cobrar();
        }
    });
  }
  function traeDireccion(){
    var accion="direccion";
    var id_configuracion = 12;
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
    var id_configuracion = 12;
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
    var id_configuracion = 12;
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
    var id_configuracion = 12;
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
  var nombre_cliente="# 1 PUBLICO EN GENERAL ";
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
  function cambia_socio(apro){
    var vali = apro;
    var select = document.getElementById("socio"); //El <select>
    var value = select.value; //El valor seleccionado
    var text = select.options[select.selectedIndex].innerText; //El texto de la opción seleccionada
    cliente = value;
    if (cliente==21 || cliente==68 || cliente==79) {
      if (vali==1) {
        nombre_cliente ="# "+value+" "+text;
        $('#cliente').empty();
        $('#cliente').append(nombre_cliente);
      }else{
        valida_empleado();
      }
    }else{
    nombre_cliente ="# "+value+" "+text;
    $('#cliente').empty();
    $('#cliente').append(nombre_cliente);
    }
  };

  function traeCliente(){
    return nombre_cliente;
  }

  function creaTicket(id_ticket){    
    var tfinal = Math.round(sumita - saldo);
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
          myWindow.document.write("<tr><td class='total'>Total: </td><td class='precio centrado total'>$ "+sumita+"</td></tr>");                   
          myWindow.document.write("<tr><td class='total'>Saldo: </td><td class='precio centrado total'>$ "+saldo+"</td></tr>");
          myWindow.document.write("<tr><td class='total'>Total final: </td><td class='precio centrado total'>$ "+tfinal+"</td></tr>");
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
    sumita = (Math.ceil(suma)+Math.floor(suma))/2;
    $('#tdtotal').text("$ "+sumita);
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
    alertify.prompt("Ventana de cobro!","Total a pagar: $ "+total+"\nIngresa pago recibido: ", "",
            function(evt, value ){
              pagado=value;
              console.log("total: "+total);
              console.log("pagado: "+pagado);
              valida_pago(total,pagado);
            },
            function(){
              alertify.error('Cancelado');
            })
            ;
  }

    function valida_pago(total,pagado){
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
              console.log("entre a valida pago primer if: "+porpagar);
              muestra_total(porpagar);
          }else if(pagado>total){
            var porpagar = pagado-total;
            alertify
              .alert("Su cambio: $ "+porpagar, function(){
              Genera_ticket();
              alertify.message('OK');
              });
          }else if(pagado==total){
            alertify
              .alert("Gracias por su compra!", function(){
              Genera_ticket();
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

//buaca items
  
</script>
