<?php 
include ("header.php");
?>
<link rel="stylesheet" type="text/css" href="tabladinamica/librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="tabladinamica/librerias/alertifyjs/css/themes/default.css">
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Socios Mary Kay</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Agregar Socios</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <form id="agrega_socio" data-parsley-validate class="form-horizontal form-label-left" method="POST"  autocomplete="off">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del Socio <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nombre_socio" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nombre del socio" >
                          </div>
                        </div>
                         <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Paterno <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="ap_pat_socio" required="required"  class="form-control col-md-7 col-xs-12" type="text" name="middle-name" placeholder="Apellido paterno" onkeypress="return pulsar(event)">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Materno <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="ap_mat_socio" required="required"  class="form-control col-md-7 col-xs-12" type="text" name="middle-name" placeholder="Apellido materno" onkeypress="return pulsar(event)">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telefono <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="whats_socio"  required="required" class="form-control col-md-7 col-xs-12" type="number" name="middle-name" placeholder="Whatsapp" onkeypress="return pulsar2(event)">
                          </div>
                        </div> 
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de Nacimiento</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                              <div class="input-group date" >
                                  <input type="date" class="form-control" id="nacimiento_socio" name="nacimiento_socio"  required="required">
                                  <span class="input-group-addon">
                                     <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>
                            </div>                        
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >Calle <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="calle_socio" required="required" class="form-control col-md-7 col-xs-12" placeholder="Calle" onkeypress="return pulsar(event)">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >Colonia <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="colonia_socio" required="required" class="form-control col-md-7 col-xs-12" placeholder="Colonia" onkeypress="return pulsar(event)">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >Municipio <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="municipio_socio" required="required" class="form-control col-md-7 col-xs-12" placeholder="Municipio" onkeypress="return pulsar(event)">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >Codigo Postal <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="cp_socio" required="required" class="form-control col-md-7 col-xs-12" placeholder="Codigo Postal" onkeypress="return pulsar(event)">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="email_socio" required="required" class="form-control col-md-7 col-xs-12" type="text"  placeholder="email" onkeypress="return pulsar(event)">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >Codigo de Lealtad <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="codigo_lealtad" required="required" class="form-control col-md-7 col-xs-12" placeholder="Codigo de Lealtad" onkeypress="return pulsar(event)">
                          </div>
                        </div>
                         <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Notas: </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12" id="notas_socio" placeholder="Notas del socio" onkeypress="return pulsar(event)"></textarea>
                          </div>
                        </div>
                        <div class="ln_solid"></div>
                    </form>
                    <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            
                            <button onclick="validar_correo(document.getElementById('email_socio').value)" class="btn btn-success">Enviar</button>
                          </div>
                        </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php 
include ("footer.php");

?>
  <?php 
    if ($socios==0 || $socios==1) {
      echo '<script type="text/javascript">
        swal("No tienes acceso a esta página", {
              buttons: false,
              icon: "warning",
              timer: 1000,
            });
            setTimeout(function(){
              window.location.href = "index.php";
              }, 700);
      </script>';      
    }
  ?>
<script type="text/javascript">
  function pulsar(e) { 
    tecla = (document.all) ? e.keyCode :e.which; 
    if(tecla==13){
      document.getElementById("nombre_socio").focus();
    }
    return (tecla!=13); 
  } 
  function pulsar2(e) { 
    tecla = (document.all) ? e.keyCode :e.which; 
    return (tecla!=101&&tecla!=43&&tecla!=45); 
  } 

  function validar_email( email ) 
  {
      var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      return regex.test(email) ? true : false;
  }
  function validar_correo(email){
    var tel = document.getElementById('whats_socio').value;
    if(tel.length!=10){
       alertify.error('Escribe correctamente el teléfono');
     }else{
        if( validar_email( email ) ){
            enviaFormulario();
        }
        else{
          if(email!=""){
            alertify.error('Escribe correctamente el email');
          }else{
            enviaFormulario();
          }
        }
     }
  }

</script>
<script> 


  function enviaFormulario(ke){
     //$("#agrega_socio").submit(); 
    var nombre_socio=document.getElementById("nombre_socio").value;
    var ap_pat_socio=document.getElementById("ap_pat_socio").value;
    var ap_mat_socio=document.getElementById("ap_mat_socio").value;
    var whats_socio=document.getElementById("whats_socio").value;
    var nacimiento_socio=document.getElementById("nacimiento_socio").value;
    var calle_socio=document.getElementById("calle_socio").value;
    var colonia_socio=document.getElementById("colonia_socio").value;
    var municipio_socio=document.getElementById("municipio_socio").value;
    var cp_socio=document.getElementById("cp_socio").value;
    var email_socio=document.getElementById("email_socio").value;
    var codigo_lealtad=document.getElementById("codigo_lealtad").value;
    var id_empleado=id_de_empleado;
    console.log("el id de empleado es: "+ id_de_empleado);
    var notas_socio=document.getElementById("notas_socio").value;


    $.ajax({
      type: "POST",
      url: "guarda_socio.php",
      data: {'nombre_socio': nombre_socio,'ap_pat_socio': ap_pat_socio,'ap_mat_socio': ap_mat_socio,'whats_socio': whats_socio, 
      'nacimiento_socio': nacimiento_socio, 'calle_socio': calle_socio, 'colonia_socio': colonia_socio, 
      'municipio_socio': municipio_socio, 'cp_socio': cp_socio, 'email_socio': email_socio,'codigo_lealtad': codigo_lealtad, 'id_empleado': id_de_empleado,
      'notas_socio': notas_socio, 'bandera': 4},  
      success: function(data){    
      // console.log(data);   
        if(data==0){
          alertify.error('Ocurrió un error, valida los datos.');
        }else{
          alertify.success('Almacenados con exito');
        }
      
      }
    });    
  }

  

  
</script> 


<script src="tabladinamica/librerias/alertifyjs/alertify.js"></script>