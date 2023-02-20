<?php 
include ("header.php");

?>
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
                    <div class=" col-md-3 col-sm-3 col-xs-12"></div> 
                    <div class="class=col-md-6 col-sm-6 col-xs-12">
                        <style>
                          @media only screen and (max-width: 250px) {
                            video {
                              max-width: 100%;
                            }
                          }
                        </style>
                        <h3>Selecciona un dispositivo</h3>                        
                      <div>
                        <select name="listaDeDispositivos" id="listaDeDispositivos"></select>
                        <button id="boton">Tomar foto</button>
                        <p id="estado"></p>                          
                      </div>
                      <div>
                        <video muted="muted" id="video" style="width: 250px; height: 250px;" class="form-control"></video>
                        <canvas id="canvas" style="display: none;"></canvas>
                      </div>
                    </div>
                    <div class=" col-md-3 col-sm-3 col-xs-12"></div>
                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                    <h3 style="text-align: center;"></h3>
                      <form data-parsley-validate class="form-horizontal form-label-left" method="POST" id="Formulario_img" action="#" autocomplete="off">
                         <?php 
                            include("conexion.php");
                            $id_socio =  $_GET['id'];
                            $sql = "Select * from socios WHERE id_socio=".$id_socio;
                            $respuesta = mysqli_query($conexion,$sql);
                            $socios = mysqli_fetch_array($respuesta);
                            echo "<h3 style='text-align: center;'>";
                            echo $nombre = $socios['nombre_socio']." ".$socios['ap_pat_socio']." ".$socios['ap_mat_socio'];
                            echo "</h3>";
                          ?>
                          
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Imagen Socio: <span class="required">*</span>
                          </label>                         
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="id_socio" hidden="true" value="<?php  echo $_GET['id'];?>">
                            <input type="text" name="nombre_socio" hidden="true" value="<?php  echo $nombre;?>">
                            <input type="text" name="imagen_socio" readonly="true" id="tarjeta_socio" required="required" class="form-control col-md-7 col-xs-12" placeholder="Aquí aparecerá la ruta de la imagen cuando la captures"><br><br>
                            <div id="info"></div>
                          </div>                          
                        </div>
                    </form>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" onclick="EnviaBorrar();">Reiniciar</button>
                            <button class="btn btn-success" onclick="validaSubmit();">Guardar</button>
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
  function validaSubmit() {
    var img = document.getElementById("tarjeta_socio").value;

    if(img!=""){
      $("#Formulario_img").attr("action", "guarda_foto.php");
      document.getElementById('Formulario_img').submit();
    }else{
      alertify.error("No hay imagen");
    }
  }
  function  EnviaBorrar(){
    var img = document.getElementById("tarjeta_socio").value;

    if(img!=""){
      $("#Formulario_img").attr("action", "elimina_foto.php");
      document.getElementById('Formulario_img').submit();

    }
  }
</script>
<script src="script.js"></script>