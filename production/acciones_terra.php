<?php 
	if (isset($_GET['id_producto'])&& isset($_GET['action'])) {
		$id_producto = $_GET['id_producto'];

		$action = $_GET['action'];

		if ($action=="edita") {			
			
			include ("header.php");
			include("conexion.php");
			$sql = "select * from productos_terra WHERE id_producto=".$id_producto;
            $requi = mysqli_query($conexion,$sql);
            while ($reg=mysqli_fetch_array($requi)) {
            	$id_producto = $reg['id_producto'];  
            	$libro_producto = $reg['libro_producto'];
            	$lista_producto = $reg['lista_producto'];
            	$pagina_producto = $reg['pagina_producto'];
            	$modelo_producto = $reg['modelo_producto'];
            	$marca_producto = $reg['marca_producto'];
            	$color_producto = $reg['color_producto'];            	
            	$codigo_barras_producto = $reg['codigo_barras_producto'];
            	$talla_producto = $reg['talla_producto'];
            	$corrida_producto = $reg['corrida_producto'];
            	$precio_clave = $reg['precio_clave'];
            	$precio_contado = $reg['precio_contado'];
            	$precio_pagos = $reg['precio_pagos'];
            	$precio_oferta = $reg['precio_oferta'];
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
			                <h3>Productos Mundo Terra</h3>
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
			                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="actualiza_producto_terra.php">
			                      	<div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código de barras</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                        	<input type="text" name="id_producto" hidden="true" value="<?php echo $id_producto; ?>">
				                          <input name="codigo_barras_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $codigo_barras_producto; ?>">
				                        </div>
				                    </div>				                    
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Libro del producto <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="libro_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $libro_producto; ?>">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Lista del producto <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <div class="form-line">
		                                    <select class="form-control show-tick" name="lista_producto" id="lista_producto">
		                                    	<?php 
                                                switch ($lista_producto) {
                                                    case '1':
                                                        echo '<option value="1" selected>Terra</option>';
                                                        echo '<option value="2">Multimarcas 17%</option>';
                                                        echo '<option value="3">Multimarcas 9%</option>';
                                                        
                                                        break;
                                                    case '2':
                                                        echo '<option value="1">Terra</option>';
                                                        echo '<option value="2" selected>Multimarcas 17%</option>';
                                                        echo '<option value="3">Multimarcas 9%</option>';
                                                        
                                                        break;
                                                    case '3':
                                                        echo '<option value="1">Terra</option>';
                                                        echo '<option value="2">Multimarcas 17%</option>';
                                                        echo '<option value="3" selected>Multimarcas 9%</option>';
                                                        
                                                        break;
                                                    
                                                    default:
                                                        echo '<option value="1">Terra</option>';
                                                        echo '<option value="2">Multimarcas 17%</option>';
                                                        echo '<option value="3">Multimarcas 9%</option>';
                                                       
                                                        break;
                                                }
                                             ?>
		                                        
		                                        
		                                    </select>
		                                  </div>
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Paginas del producto <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="pagina_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name"  value="<?php echo $pagina_producto; ?>">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Modelo del producto <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="modelo_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $modelo_producto; ?>">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Marca del producto <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="marca_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $marca_producto; ?>">
				                        </div>
				                      </div> 
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Color del producto <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="color_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $color_producto; ?>">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Talla del producto <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="talla_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $talla_producto; ?>">
				                        </div>
				                      </div> 
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Corrida del producto <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="corrida_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $corrida_producto; ?>">
				                        </div>
				                      </div> 
				                      <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio Clave<span class="required">*  $</span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input type="text" name="precio_clave" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $precio_clave; ?>">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio Contado<span class="required">*  $</span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input type="text" name="precio_contado" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $precio_contado; ?>">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio Pagos<span class="required">*  $</span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input type="text" name="precio_pagos" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $precio_pagos; ?>">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio Oferta<span class="required">*  $</span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input type="text" name="precio_oferta" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $precio_oferta; ?>">
				                        </div>
				                      </div>
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
