<?php 
  include("header.php");
 ?> 
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="tabladinamica/librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="tabladinamica/librerias/alertifyjs/css/themes/default.css">
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Renovación membresía</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <!-- Smart Wizard -->
                    <div id="wizard2" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">Selecciona socio<br /><small></small></span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr"> Selecciona plan<br /> <small></small></span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">    Confirma datos<br />    <small></small></span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">4</span>
                            <span class="step_descr">    Impresión comprobante <br />    <small></small></span>
                          </a>
                        </li>
                      </ul>
                      <div id="step-1">
                        <form class="form-horizontal form-label-left">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Socio:  <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="selectpicker col-md-8" data-show-subtext="true" data-live-search="true" name="socio" id="socio" autofocus="true">
                                <?php 
                                  include("conexion.php");
                                  $sql = "Select `id_socio`,`nombre_socio`,`ap_pat_socio`,`id_acceso` from socios";
                                  $respuesta = mysqli_query($conexion,$sql);
                                  while($socio = mysqli_fetch_array($respuesta)){

                                    if ($socio['id_socio']==0) {
                                      
                                    }else{
                                      $nombre_socio = $socio['nombre_socio']." ".$socio['ap_pat_socio'];
                                      $id_socio = $socio['id_socio'];
                                      $id_acceso_socio = $socio['id_acceso'];
                                      echo '<option data-subtext="'.$id_acceso_socio.'" value="'.$id_socio.'">'.$nombre_socio.'</option>';
                                    }                         
                                  }
                                 ?>
                              </select> 
                              <br><br><br>
                              <br><br><br>
                              <br><br><br>
                              <br><br><br>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div id="step-2">
                        <h2 class="StepTitle"></h2>
                        <form class="form-horizontal form-label-left">
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Plan:  <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="selectpicker col-md-8" data-show-subtext="true" data-live-search="true" name="plan" id="plan" autofocus="true">   
                                <?php 
                                    $sql2 ="select * from planes";
                                    $respuesta2 = mysqli_query($conexion,$sql2);
                                    while($plan = mysqli_fetch_array($respuesta2)){
                                      $hoy = date("Y-m-d");
                                      $fecha_actual = strtotime($hoy);
                                      $fecha_entrada = strtotime($plan['vigencia_plan']);
                                      if($fecha_actual>$fecha_entrada){

                                      }else{
                                      echo '<option data-precio="'.$plan['costo_plan'].'" data-duracion="'.$plan['duracion_plan'].'" data-subtext="Duracion: '.$plan['duracion_plan'].' días" data-nombre ="'.$plan['nombre_plan'].'" value="'.$plan['id_plan'].'">'.$plan['nombre_plan'].' $ '.$plan['costo_plan'].'</option>';
                                      }
                                    }
                                 ?>
                               </select>
                              <br><br><br>
                              <br><br><br>
                              <br><br><br>
                              <br><br><br>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div id="step-3">
                        <h2 class="StepTitle"></h2>
                        <div id="confirmacion" class="" style="text-align: center; font-size: 20px;"></div>
                      </div>

                    </div>
                    <!-- End SmartWizard Content -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php 
  include("footer.php");
?>

<!-- jQuery Smart Wizard -->
<script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
<script src="tabladinamica/librerias/alertifyjs/alertify.js"></script>
<script src="js/bootstrap-select.min.js"></script>
 <script type="text/javascript">
  /* Multiple Item Picker */
  $('.selectpicker').selectpicker({
    style: 'btn-default'
  });
</script>
<script type="text/javascript">
  $('#wizard2').smartWizard({
    transitionEffect: 'fade',
    labelNext:'Siguiente', // label for Next button
    labelPrevious:'Anterior', // label for Previous button
    labelFinish:'Finalizar',  // label for Finish button    
    onLeaveStep:leaveAStepCallback,
    onFinish:onFinishCallback
  }); 
  function leaveAStepCallback(obj, context){
        
      return validateSteps(context.fromStep); // return false to stay on step and true to continue navigation 
    }

    function Genera_ticket(cliente,plan){
      $.ajax({
        type: "POST",
        url: "guarda_compra.php",
        data: {'plan': plan, 'id_cliente': cliente,'id_empleado':id_de_empleado},  
        success: function(data){        
          console.log("el ID del ticket es: "+data);
          creaTicket(data);
        }
      });
    }

    function Genera_ticketTDD(cliente,plan,id_transaccion){
        var FPAGO = id_transaccion;
        $.ajax({
          type: "POST",
          url: "guarda_compra.php",
          data: {'plan': plan, 'id_cliente': cliente,'id_empleado':id_de_empleado,'FPAGO':FPAGO},  
          success: function(data){        
            console.log("el ID del ticket es: "+data);
            creaTicket(data);
          }
        });
      }

    function onFinishCallback(objs, context){
        if(validateAllSteps()){
            $('form').submit();
        }
    }
        var id_plan;
        var id_socio;
        var duracion_plan;
        var text_plan;
        var fecha;
        var dura;
        var nombre_socio;
        var total;
        var nombre_plan;
    // Your Step validation logic
    function validateSteps(stepnumber){
        var isStepValid = true;
      
      
        // validate step 1
        if(stepnumber == 1){
          var select_socio = document.getElementById("socio"), //El <select>
          value_socio = select_socio.value, //El valor seleccionado
          text_socio = select_socio.options[select_socio.selectedIndex].innerText; //El texto de la opción seleccionada
          console.log("Socio: "+text_socio+" valor: "+value_socio);
          id_socio=value_socio;
          nombre_socio=text_socio;
        }if(stepnumber==2){
          var select_plan = document.getElementById("plan"), //El <select>
          value_plan = select_plan.value; //El valor seleccionado
          text_plan = select_plan.options[select_plan.selectedIndex].innerText; //El texto de la opción seleccionada
          dura = select_plan.options[select_plan.selectedIndex].getAttribute('data-duracion');
          nombre_plan = select_plan.options[select_plan.selectedIndex].getAttribute('data-nombre');
          total = parseInt(select_plan.options[select_plan.selectedIndex].getAttribute('data-precio'));
          console.log("plan: "+text_plan+" valor: "+dura);
          id_plan=value_plan;
          var dias_int = parseInt(dura);
          fecha = sumaDias(dias_int);

            $('#confirmacion').empty();
            $('#confirmacion').append("<p>Socio: #"+id_socio+"<br>Nombre: "+nombre_socio+"</p>");                    
            $('#confirmacion').append("<p>Plan: "+text_plan+"<br>Duración: "+dura+" días</p>");
            //$('#confirmacion').append("<p>Fecha siguiente de pago: <h3>"+fecha+"</h3></p>");
            $('#confirmacion').append("<p>Fecha siguiente de pago:<br><input type='text' name='' value='"+fecha+"'></p>");                    
                                    
                           
                       
            $('#confirmacion').append("<br><br><br>");          
        }if(stepnumber==3){
          var mensaje ="¿Son correctos los siguientes datos?\nSocio: "+nombre_socio+"\nPlan: "+text_plan+" Duracion:"+dura+" días\nFecha siguiente de pago: "+fecha;
          console.log(mensaje);
          var r = confirm(mensaje);
          if (r == true) {
            efectivoTarjeta();
          } else {
            console.log("NO acepto");
          }
        }
        // ...      
        return isStepValid;
    }

     function efectivoTarjeta() {
       alertify.confirm()
       alertify.confirm('Pago', '¿Método de pago?', 
        function(){ 
          alertify.success('Ok');
          muestra_total();
        }
        , function(){ 
          muestra_tarjeta();
        }).set('labels', {ok:'Efectivo!', cancel:'Tarjeta!'});
    }

       function muestra_tarjeta(){
        var pagado=0;
        alertify.prompt("Ventana de cobro!","Total a pagar: $ "+total+"\nIngresa el número de transacción: ", "",
                function(evt, value ){
                  pagado=value;
                  validaTransaccion(pagado);
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
            muestra_tarjeta();      
          }else{
            Genera_ticketTDD(id_socio,id_plan,id_transaccion);
            console.log("no vacio, "+id_transaccion);
          }
        }, 1000);
      }

     


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
    function traeDireccion(){
    return "Av Morelos Ote 704 <br>Barrio de la Veracruz<br>Zinacantepec, Estado de México<br>CP:51350";
    }
    function separador(){
      return "--------------------------------------------------";
    }
    function traeLogo(){
      return "images/logo.jpeg";
    }
    var nombre_empleado="";
    $(document).ready(function(){
      var nombrecito = $("#id_nombre_empleado1").text();
      nombre_empleado=nombrecito;

    })
    function traeCajero(){
      return nombre_empleado;
    }
    function muestra_total(){
    var pagado=0;
    alertify.prompt("Ventana de cobro!","Total a pagar: $ "+total+"\nIngresa pago recibido: ", "",
            function(evt, value ){
              pagado=value;
              valida_pago(total,pagado);
            },
            function(){
              alertify.error('Cancelado');
            })
            ;
  }
  function valida_pago(total,pagado){
    console.log("valida pago: Total: "+total+" pagado: "+pagado);
    setTimeout(function() {
      if(total>pagado){      
          var porpagar=total-pagado;
          console.log("entre a valida pago primer if: "+porpagar);
          muestra_total(porpagar);
      }else if(pagado>total){
        var porpagar = pagado-total;
        alertify
          .alert("Su cambio: $ "+porpagar, function(){
           Genera_ticket(id_socio,id_plan);
          alertify.message('OK');
          });
      }else if(pagado==total){
        alertify
          .alert("Gracias por su compra!", function(){
           Genera_ticket(id_socio,id_plan);
          alertify.message('OK');
          });
      }
    }, 1000);
    
  }
  function refresca_pagina(){
    location.reload();
  }
  function traeCliente(){
    return "# "+id_socio+"<br>Nombre: "+nombre_socio;
  }

    function creaTicket(id_ticket){
      var myWindow=window.open('','','width=200,height=100');
      myWindow.document.write("<style type='text/css'>* {    font-size: 12px;    font-family: 'Times New Roman';}td,th,tr,table {    border-top: 1px solid black;    border-collapse: collapse;}td.producto,th.producto {    width: 115px;    max-width: 115px;}td.precio,th.precio {    width: 75px;    max-width: 75px;    word-break: break-all;}.centrado {    text-align: center;    align-content: center;}.ticket {    width: 200px;    max-width: 200px;}.total{    font-size: 15px;    font-weight: bold;    font-family: 'Times New Roman';}@media print {  @page { margin: 0; }  body { margin: 1cm; }}</style>");
      myWindow.document.write("<div class='ticket centrado'>");
        myWindow.document.write("<img src='"+traeLogo()+"' width='150' height='170' style='margin-top: -30;'>");
        myWindow.document.write("<p class='centrado'>"+traeFecha()+"</p>");
        myWindow.document.write("<p class='centrado'>"+traeDireccion()+"</p>");
        myWindow.document.write("<p class='centrado'>Ticket: #"+id_ticket+"</p>");
        myWindow.document.write("<p class='centrado'>Cajero: "+traeCajero()+"</p>");
        myWindow.document.write("<p class='centrado'>Cliente: "+traeCliente()+"</p>");
        myWindow.document.write("<p>"+separador()+"</p>");
        myWindow.document.write("<table><thead><tr><th class='producto'>PRODUCTO</th><th class='precio'>PRECIO</th></tr></thead>");
          myWindow.document.write("<tbody>");
           myWindow.document.write("<tr><td class='producto'>"+nombre_plan+"</td><td class='precio centrado'>$ "+total+"</td></tr>");
            myWindow.document.write("<tr><td class='total'>Total: </td><td class='precio centrado total'>$ "+total+"</td></tr>");
          myWindow.document.write("</tbody>");
        myWindow.document.write("</table>");
        myWindow.document.write("<p>"+separador()+"</p>"); 
        myWindow.document.write("<p class='centrado total'>¡Fecha siguiente de pago: "+fecha+"!</p>");
      myWindow.document.write("<p class='centrado'>¡Gracias por tu compra!</p>");
      myWindow.document.write("<p class='centrado'>Este ticket no es un comprobante fiscal</p>");

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

    function validateAllSteps(){
        var isStepValid = true;
        // all step validation logic     
        return isStepValid;
    } 

   function sumaDias(dias){
    console.log("Días: "+dias);
    var hoy = new Date();
    var entrega = new Date();
    entrega.setDate(hoy.getDate() + dias);

    console.log("Fecha actual: " +      hoy.getDate() + "/" +      (hoy.getMonth()+1) + "/" +      hoy.getFullYear());
    console.log("\nFecha devolución: " +      entrega.getDate() + "/" +      (entrega.getMonth()+1) + "/" +      entrega.getFullYear());
    var weekday = new Array(7);
    weekday[0] =  "Domingo";
    weekday[1] = "Lunes";
    weekday[2] = "Martes";
    weekday[3] = "Miércoles";
    weekday[4] = "Jueves";
    weekday[5] = "Viernes";
    weekday[6] = "Sábado";

    var dia = weekday[entrega.getDay()];

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
    var mes = month[entrega.getMonth()];

    return (dia+" "+entrega.getDate() + " de " +      mes + " del " +      entrega.getFullYear());
   }
</script>