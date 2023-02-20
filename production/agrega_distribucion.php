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
                <h3>Distribuidor</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Agregar distribuidor</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <form id="agrega_socio" data-parsley-validate class="form-horizontal form-label-left" method="POST"  autocomplete="off">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del distribuidor <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nombre_socio" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nombre del distribuidor" >
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >Codigo de distribuidor <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="cod_distribuidor" required="required" class="form-control col-md-7 col-xs-12" placeholder="Codigo de Distribuidor" onkeypress="return pulsar(event)">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telefono <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="whats_socio"  required="required" class="form-control col-md-7 col-xs-12" type="number" name="middle-name" placeholder="Whatsapp" onkeypress="return pulsar2(event)">
                          </div>
                        </div> 
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" >Domicilio <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="calle_socio" required="required" class="form-control col-md-7 col-xs-12" placeholder="Calle" onkeypress="return pulsar(event)">
                          </div>
                        </div>
      
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="email_socio" required="required" class="form-control col-md-7 col-xs-12" type="text"  placeholder="email" onkeypress="return pulsar(event)">
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
    var cod_distribuidor=document.getElementById("cod_distribuidor").value;
    var whats_socio=document.getElementById("whats_socio").value;
    var calle_socio=document.getElementById("calle_socio").value;
    var email_socio=document.getElementById("email_socio").value;
    var id_empleado=id_de_empleado;
    console.log("el id de empleado es: "+ id_de_empleado);


    $.ajax({
      type: "POST",
      url: "guarda_distribuidor.php",
      data: {'nombre_socio': nombre_socio, 'whats_socio': whats_socio, 
      'calle_socio': calle_socio, 
      'email_socio': email_socio, 'id_empleado': id_de_empleado,
      'cod_distribuidor': cod_distribuidor, 'bandera': 1},  
      success: function(data){    
      // console.log(data);   
        if(data==0){
          alertify.error('Ocurrió un error, valida los datos.');
        }else if(data=="r"){
          alertify.error('Ocurrió un error, usuario repetido.');
        }else{
          alertify.success('Almacenados con exito');
        }
      
      }
    });    
  }

  

  
</script> 




<script src="tabladinamica/librerias/alertifyjs/alertify.js"></script>