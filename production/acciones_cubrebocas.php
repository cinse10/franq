<?php 
	if (isset($_GET['id_producto'])&& isset($_GET['action'])) {
		$id_producto = $_GET['id_producto'];

		$action = $_GET['action'];

		if ($action=="edita") {			
			
			include ("header.php");
			include("conexion.php");
			$sql = "select * from cubrebocas WHERE id_producto=".$id_producto;
            $requi = mysqli_query($conexion,$sql);
            while ($reg=mysqli_fetch_array($requi)) {
            	$id_producto = $reg['id_producto'];   
				$nombre = $reg['nombre'];         	
            	//$pagina_vf = $reg['pagina_vf'];
            	//$modelo_vf = $reg['modelo_vf'];
            	$descripcion = $reg['descripcion'];            	
            	$talla = $reg['talla'];
            	$color = $reg['color'];
            	$precio_catalogo = $reg['precio_catalogo'];
            	$precio_afiliado = $reg['precio_afiliado'];
            	$codigo_barras_producto = $reg['codigo_barras_producto'];
            	$inventario_producto = $reg['inventario_producto'];
				$tipo_producto = $reg['tipo_producto'];
				
				
        	}
        }
    }
?>
			<!-- page content -->
			        <div class="right_col" role="main">
			          <div class="">
			            <div class="page-title">
			              <div class="title_left">
			                <h3>Cubrebocas</h3>
			              </div>
			            </div>
			            <div class="clearfix"></div>
			            <div class="row">
			              <div class="col-md-12 col-sm-12 col-xs-12">
			                <div class="x_panel">
			                  <div class="x_title">
			                    <h2>Editar producto</h2>
								<?php 
                                /*if ($sub_linio==NULL) {
                                   echo '<a  href="conector_linio\post_vicky.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir a Linio</a>';
                                 } else{
                                    echo '<a  href="conector_linio\subir_imagen_vicky.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir Imagenes a Linio</a>';
                                    
                                 }
                                  if ($ml_id==NULL) {
                                    echo '<a  href="conector_ml\conectVikiForm.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir a Mercado Libre</a>';
                                  }else{
									echo '<a  href="conector_ml\desc_vicky.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir Descripcion Ml</a>';
								  } 
								  echo '<a  href="conector_ml\actualiza_VikiForm.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Actulizar Ml</a>';
                                 */
                                  ?>
			                    <div class="clearfix"></div>
			                  </div>
			                  <div class="x_content">
			                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="actualiza_producto_cubrebocas.php" enctype="multipart/form-data">
								  
                                	<br><br>
									<div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Nombre <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="nombre" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" required="required" value="<?php echo $nombre; ?>">
				                        </div>
				                      </div> 
									<div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código de barras</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                        	<input type="text" name="id_producto" hidden="true" value="<?php echo $id_producto; ?>">
				                          <input name="codigo_barras_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $codigo_barras_producto; ?>">
				                        </div>
				                    </div>
				                   <!-- <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Págs. del producto <span class="required">*</span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                        	<input type="text" name="id_producto" hidden="true" value="<?php echo $id_producto; ?>">
				                          <input type="text" name="pagina_vf" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $pagina_vf; ?>" >
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Modelo del producto <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="modelo_vf" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" required="required" value="<?php echo $modelo_vf; ?>">
				                        </div>
				                      </div>-->
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción del producto <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="descripcion" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" required="required" value="<?php echo $descripcion; ?>">
				                        </div>
				                      </div> 
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Talla del producto <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="talla" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" required="required" value="<?php echo $talla; ?>">
				                        </div>
				                      </div> 
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Color del producto <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="color" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" required="required" value="<?php echo $color; ?>">
				                        </div>
				                      </div> 
				                      <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio Catálogo del producto<span class="required">*  $</span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input type="text" name="precio_catalogo" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $precio_catalogo; ?>">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio Afiliado del producto<span class="required">*  $</span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input type="text" name="precio_afiliado" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $precio_afiliado; ?>">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Inventario inicial <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="inventario_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" required="required" value="<?php echo $inventario_producto; ?>">
				                        </div>
				                      </div>
									  <!--<div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Tipo Producto <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
										<select class="form-control" name="tipo_producto" required="required">
				                         	                      
				                         	  
				                          </select>
				                        </div>
				                      </div>
									  <br><br>
									  <div class="form-group" align="center">
                                        <h2 >Información de Paquete</h2>
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
                                          <input type="text" id="cod_linio" name="cod_linio" class="form-control col-md-7 col-xs-12" value="<?php echo $cod_linio; ?>" disabled>
                                        </div>
                                      </div>
                                      <?php 
                                      	if ($ml_id!=NULL) {
                                      		?>
                                      		<div class="form-group">
		                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Cod. ML<span class="required">* </span>
		                                        </label>
		                                        <div class="col-md-6 col-sm-6 col-xs-12">
		                                          <input type="text" id="ml_id" name="ml_id" class="form-control col-md-7 col-xs-12" value="<?php echo $ml_id; ?>" disabled>
		                                        </div>
		                                    </div>
		                                    <div class="form-group">
		                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">LINK ML<span class="required">* </span>
		                                        </label>
		                                        <div class="col-md-6 col-sm-6 col-xs-12">
		                                          <input type="text" id="link_id" name="link_id" class="form-control col-md-7 col-xs-12" value="<?php echo $ml_link; ?>" disabled>
		                                        </div>
		                                    </div>
                                      		<?php  
                                      	}
                                       ?>

									  <br><br>
									  <div class="form-group">
                                        <h2 class="text-center">Descripción</h2>
                                        <br>
                                      </div>
									  <div class="form-group aligncenter">
                                        <div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-3 col-sm-offset-2">
											<label>Descripción</label>
											<br>
                                            <input type="text" name="id_producto" hidden="true" value="<?php echo $id_producto; ?>">
                                            <textarea id="tinymce" name="descripcion">
                                                <?php echo $descripcion_linio; ?>
                                            </textarea>    
                                        </div>
                                      </div>
                                      <br>
                                       <div class="form-group">
                                        <div class="col-md-6 col-sm-8 col-xs-12 col-md-offset-3 col-sm-offset-2">
											<label>Puntos importantes</label>
											<br>
                                            <textarea id="tinymce" name="detalles">
                                                <?php echo $detalles_linio; ?>
                                            </textarea>    
                                        </div>
                                      </div>
                                     <br><br>
                                    -->
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

<script>
	 window.URL = window.URL || window.webkitURL;
		var elBrowse = document.getElementById("browse"),
		  elPreview = document.getElementById("preview"),
		  useBlob = false && window.URL; // Set to `true` to use Blob instead of Data-URL

		// 2.
		function readImage() {

		  // Creauna nueva instancia de FileReader 
		  // https://developer.mozilla.org/en/docs/Web/API/FileReader
		  var reader = new FileReader();
		  var file = document.getElementById('browse').files[0];
		  reader.readAsDataURL(file);

		  // Una vez ya ha sido leído:
		  reader.addEventListener("load", function() {

		    // En este punto `reader.result` contiene Base64 Data-URL
		    // y podriamos mostrar inmediatamente la imagen usando
		    // `elPreview.insertAdjacentHTML("beforeend", "<img src='"+ reader.result +"'>");`
		    // Pero buscamos el ancho y el alto de la imagen en px
		    // Como el archivo Objeto no contiene el tamaño de la imagen
		    // Necesitamos crear una nueva imagen y asignar su src asi que
		    // cuando la image este cargada podemos calcular el alto y ancho de esta
		    var image = new Image();
		    image.src = reader.result;
		    image.addEventListener("load", function() {

		      // Concatenatar nuestro HTML image info 
		      var imageInfo = image.width + '×' + // Obtener el ancho de nuestra imagen
		        image.height + ' ';

		      // Finally append our created image and the HTML info string to our `#preview` 
		      //elPreview.appendChild(this);
		      if (image.width > 2000 || image.height > 2000) {
		      	elPreview.insertAdjacentHTML("beforeend", '<br>Favor de verificar el tamaño de la imagen: ' + imageInfo + '<br>');
		      }

		    });
		  });

		}


		var elBrowseDos = document.getElementById("browseDos"),
		  elPreviewDos = document.getElementById("previewDos"),
		  useBlob = false && window.URL; // Set to `true` to use Blob instead of Data-URL

		function readImageDos() {

		  // Creauna nueva instancia de FileReader 
		  // https://developer.mozilla.org/en/docs/Web/API/FileReader
		  var readerDos = new FileReader();
		  var fileDos = document.getElementById('browseDos').files[0];
		  readerDos.readAsDataURL(file);

		  // Una vez ya ha sido leído:
		  readerDos.addEventListener("load", function() {

		    // En este punto `reader.result` contiene Base64 Data-URL
		    // y podriamos mostrar inmediatamente la imagen usando
		    // `elPreview.insertAdjacentHTML("beforeend", "<img src='"+ reader.result +"'>");`
		    // Pero buscamos el ancho y el alto de la imagen en px
		    // Como el archivo Objeto no contiene el tamaño de la imagen
		    // Necesitamos crear una nueva imagen y asignar su src asi que
		    // cuando la image este cargada podemos calcular el alto y ancho de esta
		    var image = new Image();
		    image.src = reader.result;
		    image.addEventListener("load", function() {

		      // Concatenatar nuestro HTML image info 
		      var imageInfo = image.width + '×' + // Obtener el ancho de nuestra imagen
		        image.height + ' ';

		      // Finally append our created image and the HTML info string to our `#preview` 
		      //elPreview.appendChild(this);
		      if (image.width > 2000 || image.height > 2000) {
		      	elPreviewDos.insertAdjacentHTML("beforeend", '<br>Favor de verificar el tamaño de la imagen: ' + imageInfo + '<br>');
		      }

		    });
		  });

		}

		var elBrowseTres = document.getElementById("browseTres"),
		  elPreviewTres = document.getElementById("previewTres"),
		  useBlob = false && window.URL; // Set to `true` to use Blob instead of Data-URL

		function readImageTres() {

		  // Creauna nueva instancia de FileReader 
		  // https://developer.mozilla.org/en/docs/Web/API/FileReader
		  var readerTres = new FileReader();
		  var fileTres = document.getElementById('browseTres').files[0];
		  readerTres.readAsDataURL(file);

		  // Una vez ya ha sido leído:
		  reader.addEventListener("load", function() {

		    // En este punto `reader.result` contiene Base64 Data-URL
		    // y podriamos mostrar inmediatamente la imagen usando
		    // `elPreview.insertAdjacentHTML("beforeend", "<img src='"+ reader.result +"'>");`
		    // Pero buscamos el ancho y el alto de la imagen en px
		    // Como el archivo Objeto no contiene el tamaño de la imagen
		    // Necesitamos crear una nueva imagen y asignar su src asi que
		    // cuando la image este cargada podemos calcular el alto y ancho de esta
		    var image = new Image();
		    image.src = reader.result;
		    image.addEventListener("load", function() {

		      // Concatenatar nuestro HTML image info 
		      var imageInfo = image.width + '×' + // Obtener el ancho de nuestra imagen
		        image.height + ' ';

		      // Finally append our created image and the HTML info string to our `#preview` 
		      //elPreview.appendChild(this);
		      if (image.width > 2000 || image.height > 2000) {
		      	elPreviewTres.insertAdjacentHTML("beforeend", '<br>Favor de verificar el tamaño de la imagen: ' + imageInfo + '<br>');
		      }

		    });
		  });

		}
</script>