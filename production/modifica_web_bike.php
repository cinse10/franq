<?php 
    if (isset($_GET['id_producto'])) {
        $id_producto = $_GET['id_producto'];

        include ("header.php");
        include("conexion.php");
        $sql = "select * from productos_bike WHERE id_producto=".$id_producto;
        $requi = mysqli_query($conexion,$sql);
        while ($reg=mysqli_fetch_array($requi)) {
            
            $id_producto = $reg['id_producto'];
            $nombre_producto = $reg['nombre_producto'];
            $rodada_producto = $reg['rodada_producto'];
            $color_producto = $reg['color_producto'];
            $descripcion_bike = $reg['descripcion_bike'];
            $detalles_bike = $reg['detalles_bike'];
            $altura=$reg['altura'];
            $anchura=$reg['anchura'];
            $longitud=$reg['longitud'];
            $peso=$reg['peso'];
            $cod_linio=$reg['cod_linio'];
            $sub_linio=$reg['sub_linio'];
        }
        
    }
 ?>
            <!-- page content -->
                    <div class="right_col" role="main">
                      <div class="">
                        <div class="page-title">
                          <div class="title_left">
                            <h3>Productos Bike Store</h3>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row">
                          <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2>Editar página</h2>
                                <!-- <a  href="subir_ml.php?id_producto=<?php echo $id_producto; ?>" style="float: right;" class="btn btn-warning">Subir a ML</a> -->
                                <?php 
                                if ($sub_linio==NULL) {
                                   echo '<a  href="conector_linio\funciones-post.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir a Linio</a>';
                                 } else{
                                    echo '<a  href="conector_linio\subir_imagen.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir Imagenes a Linio</a>';
                                    
                                 }
                                 ?>
                                
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="actualiza_web_bike.php" enctype="multipart/form-data">
                                        <label >Nombre: <?php echo $nombre_producto; ?></label><br>
                                        <label >Rodada: <?php echo $rodada_producto; ?></label><br>
                                        <label >Color: <?php echo $color_producto; ?></label><br><hr>
                                      <div class="form-group">
                                        <label >Descripción</label>
                                        <br>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="id_producto" hidden="true" value="<?php echo $id_producto; ?>">
                                            <textarea id="tinymce" name="descripcion">
                                                <?php echo $descripcion_bike; ?>
                                            </textarea>    
                                        </div>
                                      </div>
                                      <br>
                                       <div class="form-group">
                                        <label>Descripción ML</label>
                                        <br>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea name="detalles" rows="10" cols="50">
                                                <?php echo $detalles_bike; ?>
                                            </textarea>    
                                        </div>
                                      </div>
                                     
                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Altura<span class="required">* </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="altura" name="altura" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $altura; ?>">
                                        </div>
                                      </div>
                                      
                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Anchura<span class="required">* </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="anchura" name="anchura" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $anchura; ?>">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Longitud<span class="required">* </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="longitud" name="longitud" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $longitud; ?>">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Peso<span class="required">* </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="peso" name="peso" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $peso; ?>">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">COD LINIO<span class="required">* </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="cod_linio" name="cod_linio" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $cod_linio; ?>">
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
                    <!-- /page content -->
    


 <?php 
  include("footer.php");
  ?>

<script src="plugins/tinymce/tinymce.js"></script>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = 'plugins/tinymce';
</script>