<?php 
  include("header.php");
 ?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Configuración</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <div class="clearfix"></div>
                          </div>
                          <div class="x_content">
                            <?php 
                              include("conexion.php");
                              $esekuele = "select * from configuracion where id_configuracion=".$iddelempleadito;
                              $respuesta = mysqli_query($conexion,$esekuele);
                              $renglones = mysqli_num_rows($respuesta);
                              if ($renglones==0) {
                                $img = "";
                                $nombre_gym = "";
                                $direccion = "";
                                $leyenda_inferior = "";
                                $costo_acceso ="";
                                $costo_inscripcion ="";
                                $costo_reactivacion ="";
                              }else{
                                $config = mysqli_fetch_array($respuesta);
                                $img = $config['logo'];
                                $nombre_gym = $config['nombre'];
                                $nombre_gym=str_replace("<br>"," ",$nombre_gym);
                                $direccion = $config['direccion'];
                                $direccion=str_replace("<br>"," ",$direccion);
                                $leyenda_inferior = $config['leyenda_inferior'];
                              }
                              
                             ?>
                            <br>
                            <form id="demo-form2" enctype="multipart/form-data" method="POST" class="form-horizontal form-label-left" novalidate="" action="guarda_configuracion.php">
                              <div class="col-md-4"></div>
                              <div class="col-md-55">
                                <div class="thumbnail">
                                  <div class="view view-first">
                                    <img style="width: 100%; display: block; align-content: center;" src="<?php echo $img; ?>" alt="image">                           <div class="mask no-caption" style=" height: 200px; width: 240px;">
                                        <div class="tools tools-bottom">
                                        </div>
                                      </div>
                                  </div>
                                </div>
                              </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo: <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="file" name="myImage" accept="image/jpg,image/jpeg">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre de la Franquicia: <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" name="nombre_gym" required="required" class="form-control col-md-7 col-xs-12" value=" <?php echo $nombre_gym; ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Dirección: <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <textarea class="form-control col-md-7 col-xs-12" rows="5" id="direccion_gym" name="direccion_gym" required="required"><?php echo $direccion; ?></textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Leyenda inferior ticket: <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                  <textarea class="form-control col-md-7 col-xs-12" rows="5" id="leyenda_ticket" name="leyenda_ticket" required="required"><?php echo $leyenda_inferior; ?></textarea>
                                </div>
                              </div>
                              <div class="ln_solid"></div>
                              <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                  <button type="submit" class="btn btn-success">Guardar</button>
                                </div>
                              </div>
                            </form>
                          </div>
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
  include("footer.php");
  if ($configuracion==0) {
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
  function pulsar2(e) { 
    tecla = (document.all) ? e.keyCode :e.which; 
    return (tecla!=101&&tecla!=43&&tecla!=45); 
  } 
</script>