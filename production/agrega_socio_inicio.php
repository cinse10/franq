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
                <h3>Socios</h3>
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
                      <form  data-parsley-validate class="form-horizontal form-label-left" method="POST" action="guarda_socio_inicio.php"  autocomplete="off">
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tarjeta<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="tarjeta_socio" id="tarjeta_socio" required="required" class="form-control col-md-7 col-xs-12" placeholder="Aproxima tarjeta" autofocus="true" onkeypress="return pulsar(event)">
                            <div id="info"></div>
                          </div>
                          
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del Socio <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="nombre_socio" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nombre del socio">
                          </div>
                        </div>
                         <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Paterno <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="ap_pat_socio" required="required"  class="form-control col-md-7 col-xs-12" type="text" placeholder="Apellido paterno" onkeypress="return pulsar(event)">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Apellido Materno <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="ap_mat_socio" required="required"  class="form-control col-md-7 col-xs-12" type="text" placeholder="Apellido materno" onkeypress="return pulsar(event)">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Telefono (Whatsapp) <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="whats_socio"  required="required" class="form-control col-md-7 col-xs-12" type="number" placeholder="Whatsapp" onkeypress="return pulsar2(event)">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Email <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="email_socio" required="required" class="form-control col-md-7 col-xs-12" type="text"  placeholder="email" onkeypress="return pulsar(event)">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Fecha de corte <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="id_empleado" value="<?php echo $iddelempleadito ?>" hidden="true">
                            <input type="text" name="id_sucursal" value="1" hidden="true">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <div class="input-group date" id="myDatepicker4">
                                    <input type="text" class="form-control" id="fechita" name="fecha_corte" readonly="readonly" required="required">
                                    <span class="input-group-addon">
                                       <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                              </div>                        
                            </div>
                          </div>
                        </div>
                         <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Notas o locker: </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea class="form-control col-md-7 col-xs-12" name="notas_socio" placeholder="Notas del socio" onkeypress="return pulsar(event)"></textarea>
                          </div>
                        </div>
                        <div class="ln_solid"></div>
                        <button type="submit" class="btn btn-success">Enviar</button>
                    </form>                    
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
</script>
<script>
  $(document).ready(function() { 
   console.log("id_de_empleado "+ id_de_empleado);
    document.getElementById("tarjeta_socio").focus();  
      $('#tarjeta_socio').blur(function(){
          var cedula = $(this).val();   
          if(cedula!=""){
             var dataString = 'tarjeta_socio='+cedula;
            $.ajax({
                type: "POST",
                url: "valida_tarjeta.php",
                data: dataString,
                success: function(data) {
                    $('#info').fadeIn(30).html(data);
                    if (data==0) {
                      $('#info').fadeIn(30).html('<span class="label label-danger">NO DISPONIBLE</span>');
                       document.getElementById("tarjeta_socio").focus();
                    }if(data==1){
                      $('#info').fadeIn(30).html('<span class="label label-success">DISPONIBLE</span>');
                    }
                }
            });

          }else{
            console.log("vacío");
            $('#info').fadeIn(30).html('');
          }
         
      });              
  });    
</script>
<script>
    $('#myDatepicker4').datetimepicker({
      format: 'DD-MM-YYYY',
        ignoreReadonly: true,
        allowInputToggle: true,
        minDate: new Date()
    });
    //al estar listo el documento, vamos a agregar 30 días
     $(document).ready(function(){
      var fecha = new Date();
    var dias = 30; // Número de días a agregar
    fecha.setDate(fecha.getDate() + dias);
    console.log(fecha);
    
    $('#fechita').val(traeHoy(fecha));
    console.info(fecha);
    })
    function pulsar(e) { 
    tecla = (document.all) ? e.keyCode :e.which; 
    return (tecla!=101&&tecla!=43&&tecla!=45); 
  } 
  function traeHoy(fechita){
      var hoy = fechita;
      var dd = hoy.getDate();
      var mm = hoy.getMonth()+1;
      var yyyy = hoy.getFullYear();
      var hh = hoy.getHours();
      var min = hoy.getMinutes();
      var ss = hoy.getSeconds();

      dd=addZero(dd);
      mm=addZero(mm);

      return dd+"-"+mm+"-"+yyyy;
    }
    //Agrega ceros a la fecha ingresada
    function addZero(i) {
      if (i < 10) {
          i = '0' + i;
      }
      return i;
    } 
</script>
<script src="tabladinamica/librerias/alertifyjs/alertify.js"></script>