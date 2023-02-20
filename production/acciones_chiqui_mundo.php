<?php 
	if (isset($_GET['id_producto'])&& isset($_GET['action'])) {
		$id_producto = $_GET['id_producto'];

		$action = $_GET['action'];

		if ($action=="edita") {			
			
			include ("header.php");
			include("conexion.php");
			$sql = "select * from productos_chiqui WHERE id_producto=".$id_producto;
            $requi = mysqli_query($conexion,$sql);
            while ($reg=mysqli_fetch_array($requi)) {
            	$id_producto = $reg['id_producto'];            	
            	$nombre_producto = $reg['nombre_producto'];
            	$desc_producto = $reg['descripcion'];          	
            	$precio_empleado = $reg['precio_empleado'];
            	$precio_afiliado = $reg['precio_afiliado'];
            	$precio_publico = $reg['precio_publico'];
            	$codigo_producto = $reg['codigo_producto'];
            	$codigo_barras_producto = $reg['codigo_barras'];
            	$combo_id = $reg['combo_id'];
            	$inventario_producto = $reg['inventario_producto'];
        	}
        }
    }
?>
			<!-- page content -->
			        <div class="right_col" role="main">
			          <div class="">
			            <div class="page-title">
			              <div class="title_left">
			                <h3>Productos Chiqui Mundo</h3>
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
			                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="actualiza_producto_chiqui.php">
			                      	<div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código de barras</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                        	<input type="text" name="id_producto" hidden="true" value="<?php echo $id_producto; ?>">
				                          <input name="codigo_barras_producto" class="form-control col-md-7 col-xs-12" type="text" value="<?php echo $codigo_barras_producto; ?>">
				                        </div>
				                    </div>
				                    <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Modelo del producto <span class="required">*</span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                        	<input type="text" name="id_producto" hidden="true" value="<?php echo $id_producto; ?>">
				                          <input type="text" name="nombre_producto"  class="form-control col-md-7 col-xs-12" value="<?php echo $nombre_producto; ?>" >
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Desc del producto <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="descripcion" class="form-control col-md-7 col-xs-12" type="text"  value="<?php echo $desc_producto; ?>">
				                        </div>
				                      </div>
				                     <!-- <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Talla del producto <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="talla_producto" class="form-control col-md-7 col-xs-12" type="text" value="<?php //echo $talla_producto; ?>">
				                        </div>
				                      </div> -->
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Precio Empleado <span class="required">*  $</span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="precio_empleado" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" required="required" value="<?php echo $precio_empleado; ?>">
				                        </div>
				                      </div> 
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Precio Afiliado <span class="required">*  $</span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="precio_afiliado" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" required="required" value="<?php echo $precio_afiliado; ?>">
				                        </div>
				                      </div> 
				                      <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio Publico<span class="required">*  $</span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input type="text" name="precio_publico" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $precio_publico; ?>">
				                        </div>
				                      </div>
				                      <!--<div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Catálogo producto<span class="required">*  </span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input type="text" name="catalogo_producto"  class="form-control col-md-7 col-xs-12" value="<?php //echo $catalogo_producto; ?>">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Combo ID<span class="required">*  </span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input type="text" name="combo_id"  class="form-control col-md-7 col-xs-12" value="<?php //echo $combo_id; ?>">
				                        </div>
				                      </div>-->
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Inventario inicial <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="inventario_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" required="required" value="<?php echo $inventario_producto; ?>">
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
