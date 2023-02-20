<?php 
	if (isset($_GET['id_producto'])&& isset($_GET['action'])) {
		$id_producto = $_GET['id_producto'];

		$action = $_GET['action'];

		if ($action=="edita") {			
			
			include ("header.php");
			include("conexion.php");
			$sql = "select * from productos_misentir WHERE id_producto=".$id_producto;
            $requi = mysqli_query($conexion,$sql);
            while ($reg=mysqli_fetch_array($requi)) {
            	$id_producto = $reg['id_producto'];
            	$nombre_producto = $reg['nombre_producto'];
            	$precio_producto = $reg['precio_producto'];
            	$precio_afi_producto = $reg['precio_afi_producto'];
            	$codigo_barras_producto = $reg['codigo_barras_producto'];
            	$inventario_producto = $reg['inventario_producto'];
            	$descripcion_producto = $reg['descripcion_producto'];
            	$activo = $reg['activo'];
        	}
        }
    }
?>
			<!-- page content -->
			        <div class="right_col" role="main">
			          <div class="">
			            <div class="page-title">
			              <div class="title_left">
			                <h3>Productos Mi sentir</h3>
			              </div>
			            </div>
			            <div class="clearfix"></div>
			            <div class="row">
			              <div class="col-md-12 col-sm-12 col-xs-12">
			                <div class="x_panel">
			                  <div class="x_title">
			                    <h2>Editar producto</h2>
			                    <div class="clearfix"></div>
			                  </div>
			                  <div class="x_content">
			                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="actualiza_producto_misentir.php">
				                      <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del producto <span class="required">*</span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                        	<input type="text" name="id_producto" hidden="true" value="<?php echo $id_producto; ?>">
				                          <input type="text" name="nombre_producto" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nombre_producto; ?>" >
				                        </div>
				                      </div>
				                       <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código de barras</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="codigo_barras_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $codigo_barras_producto; ?>">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio del producto<span class="required">*  $</span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input type="text" name="precio_producto" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $precio_producto; ?>">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio afiliados del producto<span class="required">*  $</span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input type="text" name="precio_afi_producto" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $precio_afi_producto; ?>">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Inventario inicial <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="inventario_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" required="required" value="<?php echo $inventario_producto; ?>">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción del producto.</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                        	<textarea class="form-control col-md-7 col-xs-12" name="descripcion_producto" cols="30" rows="5" placeholder="Descripción del producto..."><?php echo $descripcion_producto; ?></textarea>
				                        </div>
				                      </div>
				                      
				                      <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Estatus<span class="required">   *  </span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                         <select class="form-control" name="status">
				                          <?php 
				                          	switch ($activo) {
				                          		
				                          		case 0:
				                          			echo '<option value="0" selected>Desactivado</option>';
						                            echo '<option value="1">Activado</option>';
				                          			break;
				                          		
				                          		case 1:
				                          			echo '<option value="0">Desactivado</option>';
						                            echo '<option value="1" selected>Activado</option>';
				                          			break;
				                          	}
				                           ?>                          
				                          </select>
				                        </div>
				                      </div>
				                     
				                      <div class="ln_solid"></div>
				                      <div class="form-group">
				                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				                          <button type="submit" class="btn btn-success">Enviar</button>
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
			include ("footer.php");
			?>
