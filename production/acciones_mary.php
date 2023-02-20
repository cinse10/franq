<?php 
	if (isset($_GET['id_producto'])&& isset($_GET['action'])) {
		$id_producto = $_GET['id_producto'];

		$action = $_GET['action'];

		if ($action=="edita") {			
			
			include ("header.php");
			include("conexion.php");
			$sql = "select * from productos_marykay WHERE id_producto=".$id_producto;
            $requi = mysqli_query($conexion,$sql);
            while ($reg=mysqli_fetch_array($requi)) {
            	$id_producto = $reg['id_producto'];
            	$nombre_producto = $reg['nombre_producto'];
            	$precio_catalogo = $reg['precio_catalogo'];
            	$precio_compra = $reg['precio_compra'];
            	$codigo_barras_producto = $reg['codigo_producto'];
            	$inventario_producto = $reg['inventario_producto'];
            	$descripcion_producto = $reg['desc_producto'];
            	$color_producto = $reg['color_producto'];
            	$genero_producto = $reg['genero_producto'];
            	$caracteristicas_belleza = $reg['caracteristicas_belleza'];
            	$caracteristicas_salud = $reg['caracteristicas_salud'];
            	$formato_salud = $reg['formato_salud'];
            	$resistencia_producto = $reg['resistencia_producto'];
            	$tipo_piel = $reg['tipo_piel'];
                $contenido_producto = $reg['contenido_producto'];


            	$categorias = $reg['categorias'];
            	$cat_uno = $reg['cat_uno'];
            	$cat_dos = $reg['cat_dos'];
            	$cat_tres = $reg['cat_tres'];
            	$cat_ml = $reg['cat_ml'];

            	$consistecia_base = $reg['consistecia_base'];
				$acabado_base = $reg['acabado_base'];
				$form_iluminador = $reg['form_iluminador'];
				$form_corrector = $reg['form_corrector'];
				$tex_corrector = $reg['tex_corrector'];
				$acabado_rubor = $reg['acabado_rubor'];
				$formato_desmaquillante = $reg['formato_desmaquillante'];
				$tip_crema = $reg['tip_crema'];
				$consistencia_crema = $reg['consistencia_crema'];
				$tip_piel = $reg['tip_piel'];
				$form_facial = $reg['form_facial'];
				$form_ceja = $reg['form_ceja'];
				$form_ojo = $reg['form_ojo'];
				$form_labio = $reg['form_labio'];
				$acabado_labios = $reg['acabado_labios'];
				$tipo_perfume = $reg['tipo_perfume'];
				$tipo_esencia = $reg['tipo_esencia'];
				$hipoalergenica = $reg['hipoalergenica'];
				$parabeno_free = $reg['parabeno_free'];
				$prot_solar = $reg['prot_solar'];
				$derm_test = $reg['derm_test'];
				$agua_test = $reg['agua_test'];
				$larga_dur = $reg['larga_dur'];
				$case_brocha = $reg['case_brocha'];
				$modelo_producto = $reg['modelo_producto'];
				$func_mascarilla = $reg['func_mascarilla'];
				$zona_mascarilla = $reg['zona_mascarilla'];
				$ing_mascarilla = $reg['ing_mascarilla'];
				$func_mascarilla = $reg['func_mascarilla'];
				$zona_mascarilla = $reg['zona_mascarilla'];
				$ing_mascarilla = $reg['ing_mascarilla'];
				$no_sombra = $reg['no_sombra'];
				$no_brocha = $reg['no_brocha'];
				$pelo_brocha = $reg['pelo_brocha'];
				$form_limp = $reg['form_limp'];
				$peso_unidad = $reg['peso_unidad'];
				$volumen_unidad = $reg['volumen_unidad'];
				$unit_paq = $reg['unit_paq'];

            	$descripcion_linio = $reg['descripcion_linio'];
	            $detalles_linio = $reg['detalles_linio'];
	            $altura=$reg['altura'];
	            $anchura=$reg['anchura'];
	            $longitud=$reg['longitud'];
	            $peso=$reg['peso'];
	            $cod_linio=$reg['cod_linio'];
	            $sub_linio=$reg['sub_linio'];
            	if ($reg['imagen_uno'] == NULL) {
                    $uno = "NULL.jpg";  
                }else{
                    $uno = $reg['imagen_uno'];  
                }

                if ($reg['imagen_dos'] == NULL) {
                    $dos = "NULL.jpg";  
                }else{
                    $dos = $reg['imagen_dos'];
                }

                if ($reg['imagen_tres'] == NULL) {
                    $tres = "NULL.jpg";  
                }else{
                    $tres = $reg['imagen_tres'];  
                }
        	}
        }
    }
?>
			<!-- page content -->
			        <div class="right_col" role="main">
			          <div class="">
			            <div class="page-title">
			              <div class="title_left">
			                <h3>Productos Mary Kay</h3>
			              </div>
			            </div>
			            <div class="clearfix"></div>
			            <div class="row">
			              <div class="col-md-12 col-sm-12 col-xs-12">
			                <div class="x_panel">
			                  <div class="x_title">
			                    <h2>Editar producto</h2>
			                    <?php 
                                if ($sub_linio==NULL) {
                                   echo '<a  href="conector_linio\post_mary.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir a Linio</a>';
                                 } else{
                                    echo '<a  href="conector_linio\subir_imagen_mary.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir Imagenes a Linio</a>';
                                    
                                 }
                                 // if ($ml_id==NULL) {
                                 //   echo '<a  href="conector_ml\conect.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir a Mercado Libre</a>';
                                 // } 
                                 ?>
			                    <div class="clearfix"></div>
			                  </div>
			                  <div class="x_content">
			                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="actualiza_producto_mary.php" enctype="multipart/form-data">

			                      	<div class="form-group">
				                      	<center>
				                      		<?php echo "<img src='marykay/".$uno."' width='80' height='80' alt=''>"; ?>
				                      		<br>
				                      		<b>Selecciona imagen principal: </b>
		                                    <br>
		                                    <input button class="btn btn-primary waves-effect" name="uno" type="file" accept="image/*">
		                                </center>
		                                <center>
		                                <div class="col-md-6 col-sm-8 col-xs-8">
		                                    <?php echo "<img src='marykay/".$dos."' width='80' height='80' alt=''>"; ?>
		                                    <br>
		                                    <b>Selecciona imagen 2: </b>
		                                    <br>
		                                    <input button class="btn btn-primary waves-effect" name="dos" type="file" accept="image/*">                             
	                                	</div>
	                                    <div class="col-md-6 col-sm-8 col-xs-8">
	                                    	<?php echo "<img src='marykay/".$tres."' width='80' height='80' alt=''>"; ?>
	                                    	<br>
		                                    <b>Selecciona imagen 3: </b>
		                                    <br>
		                                    <input button class="btn btn-primary waves-effect" name="tres" type="file" accept="image/*">
	                                	</div>
	                                	</center>
	                                </div>
                                	<br><br>


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
				                          <input name="codigo_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $codigo_barras_producto; ?>">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio catalogo del producto<span class="required">*  $</span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input type="text" name="precio_catalogo" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $precio_catalogo; ?>">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio compra del producto<span class="required">*  $</span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input type="text" name="precio_compra" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $precio_compra; ?>">
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
				                        	<textarea class="form-control col-md-7 col-xs-12" name="desc_producto" cols="30" rows="5" placeholder="Descripción del producto..."><?php echo $descripcion_producto; ?></textarea>
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Color</label>
				                      <div class="col-md-6 col-sm-6 col-xs-12">
				                         <select class="form-control" name="color_producto" required="required">
				                         	<?php 
				                          	switch ($color_producto) {
				                          		
				                          		case "AMARILLO":
				                          			echo '<option value="AMARILLO" selected>AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL">AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE">BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE">BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';

				                          			break;
				                          		
				                          		case "AMBAR":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR"selected>AMBAR</option>';
						                            echo '<option value="AZUL">AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE">BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE">BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;

				                          		case "AZUL":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" selected>AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE">BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE">BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;

				                          		case "AZUL MARINO":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL">AZUL</option>';
						                            echo '<option value="AZUL MARINO" selected>AZUL MARINO</option>';
						                            echo '<option value="BEIGE">BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE">BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;

				                          		case "BEIGE":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" selected>BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE">BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;

				                          		case "BLANCO":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO" selected>BLANCO</option>';
						                            echo '<option value="BRONCE">BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;


				                          		case "BRONCE":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" selected>BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;

				                          		case "BURDEO":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO" selected>BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "CELESTE":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE" selected>CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';				                          			
				                          			break;
				                          		case "CORAL":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL" selected>CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "DORADO":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO" selected>DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "FUCSIA":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA" selected>FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "GRIS":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS" selected>GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "MARRÓN":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN" selected>MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "MULTICOLOR":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR" selected>MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "NARANJA":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA" selected>NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "NEGRO":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO" selected>NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "ORO ROSA":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA" selected>ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "PLATA":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA" selected>PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "PÚRPURA":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA" selected>PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "ROJO":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO" selected>ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "ROSA":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA" selected>ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "SALMÓN":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN" selected>SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "TURQUESA":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA" selected>TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "VERDE":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE" selected>VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "VIOLETA":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA" selected>VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;
				                          		case "ÍNDIGO":
				                          			echo '<option value="AMARILLO" >AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL" >AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE" >BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE" >BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO" selected>ÍNDIGO</option>';
				                          			break;


				                          		default:
				                          			echo '<option value="" selected>-Selecciona un color-</option>';
						                            echo '<option value="AMARILLO">AMARILLO</option>';
						                            echo '<option value="AMBAR">AMBAR</option>';
						                            echo '<option value="AZUL">AZUL</option>';
						                            echo '<option value="AZUL MARINO">AZUL MARINO</option>';
						                            echo '<option value="BEIGE">BEIGE</option>';
						                            echo '<option value="BLANCO">BLANCO</option>';
						                            echo '<option value="BRONCE">BRONCE</option>';
						                            echo '<option value="BURDEO">BURDEO</option>';
						                            echo '<option value="CELESTE">CELESTE</option>';
						                            echo '<option value="CORAL">CORAL</option>';
						                            echo '<option value="DORADO">DORADO</option>';
						                            echo '<option value="FUCSIA">FUCSIA</option>';
						                            echo '<option value="GRIS">GRIS</option>';
						                            echo '<option value="MARRÓN">MARRÓN</option>';
						                            echo '<option value="MULTICOLOR">MULTICOLOR</option>';
						                            echo '<option value="NARANJA">NARANJA</option>';
						                            echo '<option value="NEGRO">NEGRO</option>';
						                            echo '<option value="ORO ROSA">ORO ROSA</option>';
						                            echo '<option value="PLATA">PLATA</option>';
						                            echo '<option value="PÚRPURA">PÚRPURA</option>';
						                            echo '<option value="ROJO">ROJO</option>';
						                            echo '<option value="ROSA">ROSA</option>';
						                            echo '<option value="SALMÓN">SALMÓN</option>';
						                            echo '<option value="TURQUESA">TURQUESA</option>';
						                            echo '<option value="VERDE">VERDE</option>';
						                            echo '<option value="VIOLETA">VIOLETA</option>';
						                            echo '<option value="ÍNDIGO">ÍNDIGO</option>';
				                          			break;

				                          	}
				                           ?>                       
				                         	  
				                          </select>
				                       </div>
				                       </div>
				                       <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contenido del producto <span class="required">*</span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input type="text" name="contenido_producto" placeholder="Ejemplo: 1 kg, 100 ml, 50 g (escribe texto y/o número)" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $contenido_producto; ?>" >
				                        </div>
				                      </div>
				                       	<div class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genero_producto">Genero<span class="required">   *  </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         <select class="form-control" name="genero_producto" required="required">
					                         	<?php 
					                          	switch ($genero_producto) {
					                          			                          		
					                          		case "UNISEX":
							                            echo '<option value="UNISEX" selected>Sin Género</option>';
					                          			echo '<option value="MUJER" >MUJER</option>';
					                          			echo '<option value="HOMBRE" >HOMBRE</option>'; 
					                          			break;

					                          		case "MUJER":
							                            echo '<option value="UNISEX">Sin Género</option>';
					                          			echo '<option value="MUJER" selected>MUJER</option>';
					                          			echo '<option value="HOMBRE" >HOMBRE</option>'; 
					                          			break;

					                          		case "HOMBRE":
							                            echo '<option value="UNISEX">Sin Género</option>';
					                          			echo '<option value="MUJER" >MUJER</option>';
					                          			echo '<option value="HOMBRE" selected>HOMBRE</option>'; 
					                          			break;

					                          		default:
					                          			echo '<option value="" selected>Selecciona una opcion</option>';
					                          			echo '<option value="UNISEX">Sin Género</option>';
					                          			echo '<option value="MUJER" >MUJER</option>';
					                          			echo '<option value="HOMBRE" >HOMBRE</option>'; 
					                          			break;

					                          	}
					                           ?>   
					                          </select>
					                        </div>
					                      </div>
					                      <div class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="caracteristicas_belleza">Caracteristicas Belleza<span class="required">   *  </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         <select class="form-control" name="caracteristicas_belleza" required="required">
					                         	<?php 
					                          	switch ($caracteristicas_belleza) {
					                          			                          		
					                          		case "Anti-Edad":
							                            echo '<option value="Anti-Edad" selected>Anti-Edad</option>';
					                          			echo '<option value="Con Bloqueador" >Con Bloqueador</option>';
					                          			echo '<option value="Exfoliante" >Exfoliante</option>';
					                          			echo '<option value="Humectante" >Humectante</option>';  
					                          			echo '<option value="Libre de Aceite" >Libre de Aceite</option>'; 
					                          			echo '<option value="Sin Alcohol" >Sin Alcohol</option>'; 
					                          			break;

					                          		case "Con Bloqueador":
							                            echo '<option value="Anti-Edad">Anti-Edad</option>';
					                          			echo '<option value="Con Bloqueador" selected>Con Bloqueador</option>';
					                          			echo '<option value="Exfoliante" >Exfoliante</option>';
					                          			echo '<option value="Humectante" >Humectante</option>';  
					                          			echo '<option value="Libre de Aceite" >Libre de Aceite</option>'; 
					                          			echo '<option value="Sin Alcohol" >Sin Alcohol</option>'; 
					                          			break;

					                          		case "Exfoliante":
							                            echo '<option value="Anti-Edad">Anti-Edad</option>';
					                          			echo '<option value="Con Bloqueador" >Con Bloqueador</option>';
					                          			echo '<option value="Exfoliante" selected>Exfoliante</option>';
					                          			echo '<option value="Humectante" >Humectante</option>';  
					                          			echo '<option value="Libre de Aceite" >Libre de Aceite</option>'; 
					                          			echo '<option value="Sin Alcohol" >Sin Alcohol</option>'; 
					                          			break;
					                          		case "Humectante":
							                            echo '<option value="Anti-Edad">Anti-Edad</option>';
					                          			echo '<option value="Con Bloqueador" >Con Bloqueador</option>';
					                          			echo '<option value="Exfoliante" >Exfoliante</option>';
					                          			echo '<option value="Humectante" selected>Humectante</option>';  
					                          			echo '<option value="Libre de Aceite" >Libre de Aceite</option>'; 
					                          			echo '<option value="Sin Alcohol" >Sin Alcohol</option>'; 
					                          			break;
					                          		case "Libre de Aceite":
							                            echo '<option value="Anti-Edad">Anti-Edad</option>';
					                          			echo '<option value="Con Bloqueador" >Con Bloqueador</option>';
					                          			echo '<option value="Exfoliante" >Exfoliante</option>';
					                          			echo '<option value="Humectante" >Humectante</option>';  
					                          			echo '<option value="Libre de Aceite" selected>Libre de Aceite</option>'; 
					                          			echo '<option value="Sin Alcohol" >Sin Alcohol</option>'; 
					                          			break;

					                          		case "Sin Alcohol":
							                            echo '<option value="Anti-Edad">Anti-Edad</option>';
					                          			echo '<option value="Con Bloqueador" >Con Bloqueador</option>';
					                          			echo '<option value="Exfoliante">Exfoliante</option>';
					                          			echo '<option value="Humectante" >Humectante</option>';  
					                          			echo '<option value="Libre de Aceite" >Libre de Aceite</option>'; 
					                          			echo '<option value="Sin Alcohol" selected>Sin Alcohol</option>'; 
					                          			break;

					                          		default:
					                          			echo '<option value="" selected>Selecciona una opcion</option>';
					                          			echo '<option value="Anti-Edad">Anti-Edad</option>';
					                          			echo '<option value="Con Bloqueador" >Con Bloqueador</option>';
					                          			echo '<option value="Exfoliante" >Exfoliante</option>'; 
					                          			echo '<option value="Humectante" >Humectante</option>'; 
					                          			echo '<option value="Libre de Aceite" >Libre de Aceite</option>'; 
					                          			echo '<option value="Sin Alcohol" >Sin Alcohol</option>'; 
					                          			break;

					                          	}
					                           ?>   
					                          </select>
					                        </div>
					                      </div>

					                      <div class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="caracteristicas_salud">Caracteristicas Salud<span class="required">   *  </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         <select class="form-control" name="caracteristicas_salud" required="required">
					                         	<?php 
					                          	switch ($caracteristicas_salud) {
					                          			                          		
					                          		case "Aromaterapia":
							                            echo '<option value="Aromaterapia" selected>Aromaterapia</option>';
					                          			echo '<option value="No Probado en Animales" >No Probado en Animales</option>';
					                          			echo '<option value="Homeopático" >Homeopático</option>';
					                          			echo '<option value="Natural" >Natural</option>';  
					                          			echo '<option value="Orgánico" >Orgánico</option>'; 
					                          			echo '<option value="Perfumado" >Perfumado</option>'; 
					                          			echo '<option value="Sin Perfumar" >Sin Perfumar</option>'; 
					                          			echo '<option value="Tamaño Viaje" >Tamaño Viaje</option>'; 
					                          			break;

					                          		case "No Probado en Animales":
							                            echo '<option value="Aromaterapia">Aromaterapia</option>';
					                          			echo '<option value="No Probado en Animales" selected>No Probado en Animales</option>';
					                          			echo '<option value="Homeopático" >Homeopático</option>';
					                          			echo '<option value="Natural" >Natural</option>';  
					                          			echo '<option value="Orgánico" >Orgánico</option>'; 
					                          			echo '<option value="Perfumado" >Perfumado</option>'; 
					                          			echo '<option value="Sin Perfumar" >Sin Perfumar</option>'; 
					                          			echo '<option value="Tamaño Viaje" >Tamaño Viaje</option>'; 
					                          			break;

					                          		case "Homeopático":
							                            echo '<option value="Aromaterapia">Aromaterapia</option>';
					                          			echo '<option value="No Probado en Animales" >No Probado en Animales</option>';
					                          			echo '<option value="Homeopático" selected>Homeopático</option>';
					                          			echo '<option value="Natural" >Natural</option>';  
					                          			echo '<option value="Orgánico" >Orgánico</option>'; 
					                          			echo '<option value="Perfumado" >Perfumado</option>'; 
					                          			echo '<option value="Sin Perfumar" >Sin Perfumar</option>'; 
					                          			echo '<option value="Tamaño Viaje" >Tamaño Viaje</option>'; 
					                          			break;
					                          		case "Natural":
							                            echo '<option value="Aromaterapia">Aromaterapia</option>';
					                          			echo '<option value="No Probado en Animales" >No Probado en Animales</option>';
					                          			echo '<option value="Homeopático" >Homeopático</option>';
					                          			echo '<option value="Natural" selected>Natural</option>';  
					                          			echo '<option value="Orgánico" >Orgánico</option>'; 
					                          			echo '<option value="Perfumado" >Perfumado</option>'; 
					                          			echo '<option value="Sin Perfumar" >Sin Perfumar</option>'; 
					                          			echo '<option value="Tamaño Viaje" >Tamaño Viaje</option>'; 
					                          			break;
					                          		case "Orgánico":
							                            echo '<option value="Aromaterapia">Aromaterapia</option>';
					                          			echo '<option value="No Probado en Animales" >No Probado en Animales</option>';
					                          			echo '<option value="Homeopático" >Homeopático</option>';
					                          			echo '<option value="Natural" >Natural</option>';  
					                          			echo '<option value="Orgánico" selected>Orgánico</option>'; 
					                          			echo '<option value="Perfumado" >Perfumado</option>';
					                          			echo '<option value="Sin Perfumar" >Sin Perfumar</option>'; 
					                          			echo '<option value="Tamaño Viaje" >Tamaño Viaje</option>';  
					                          			break;

					                          		case "Perfumado":
							                            echo '<option value="Aromaterapia">Aromaterapia</option>';
					                          			echo '<option value="No Probado en Animales" >No Probado en Animales</option>';
					                          			echo '<option value="Homeopático">Homeopático</option>';
					                          			echo '<option value="Natural" >Natural</option>';  
					                          			echo '<option value="Orgánico" >Orgánico</option>'; 
					                          			echo '<option value="Perfumado" selected>Perfumado</option>'; 
					                          			echo '<option value="Sin Perfumar" >Sin Perfumar</option>'; 
					                          			echo '<option value="Tamaño Viaje" >Tamaño Viaje</option>'; 
					                          			break;

					                          		case "Sin Perfumar":
							                            echo '<option value="Aromaterapia">Aromaterapia</option>';
					                          			echo '<option value="No Probado en Animales" >No Probado en Animales</option>';
					                          			echo '<option value="Homeopático">Homeopático</option>';
					                          			echo '<option value="Natural" >Natural</option>';  
					                          			echo '<option value="Orgánico" >Orgánico</option>'; 
					                          			echo '<option value="Perfumado" >Perfumado</option>'; 
					                          			echo '<option value="Sin Perfumar" selected>Sin Perfumar</option>'; 
					                          			echo '<option value="Tamaño Viaje" >Tamaño Viaje</option>'; 
					                          			break;

					                          		case "Tamaño Viaje":
							                            echo '<option value="Aromaterapia">Aromaterapia</option>';
					                          			echo '<option value="No Probado en Animales" >No Probado en Animales</option>';
					                          			echo '<option value="Homeopático">Homeopático</option>';
					                          			echo '<option value="Natural" >Natural</option>';  
					                          			echo '<option value="Orgánico" >Orgánico</option>'; 
					                          			echo '<option value="Perfumado" >Perfumado</option>'; 
					                          			echo '<option value="Sin Perfumar" >Sin Perfumar</option>'; 
					                          			echo '<option value="Tamaño Viaje" selected>Tamaño Viaje</option>'; 
					                          			break;

					                          		default:
					                          			echo '<option value="" selected>Selecciona una opcion</option>';
					                          			echo '<option value="Aromaterapia">Aromaterapia</option>';
					                          			echo '<option value="No Probado en Animales" >No Probado en Animales</option>';
					                          			echo '<option value="Homeopático" >Homeopático</option>'; 
					                          			echo '<option value="Natural" >Natural</option>'; 
					                          			echo '<option value="Orgánico" >Orgánico</option>'; 
					                          			echo '<option value="Perfumado" >Perfumado</option>'; 
					                          			echo '<option value="Sin Perfumar" >Sin Perfumar</option>'; 
					                          			echo '<option value="Tamaño Viaje" >Tamaño Viaje</option>'; 
					                          			break;

					                          	}
					                           ?>   
					                          </select>
					                        </div>
					                      </div>

					                  <div class="form-group">
				                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Formato de Salud</label>
				                      <div class="col-md-6 col-sm-6 col-xs-12">
				                         <select class="form-control" name="formato_salud" required="required">
				                         	<?php 
				                          	switch ($formato_salud) {
				                          		
				                          		case "Crema":
				                          			echo '<option value="Crema" selected>Crema</option>';
						                            echo '<option value="Gotas">Gotas</option>';
						                            echo '<option value="Espuma">Espuma</option>';
						                            echo '<option value="Gel">Gel</option>';
						                            echo '<option value="Líquido">Líquido</option>';
						                            echo '<option value="Pomada">Pomada</option>';
						                            echo '<option value="Parches">Parches</option>';
						                            echo '<option value="Polvo">Polvo</option>';
						                            echo '<option value="Sólido">Sólido</option>';
						                            echo '<option value="Sprays">Sprays</option>';
						                            echo '<option value="Barra">Barra</option>';
						                            echo '<option value="Toallitas">Toallitas</option>';
						                            echo '<option value="Sobres">Sobres</option>';

				                          			break;
				                          		
				                          		case "Gotas":
				                          			echo '<option value="Crema" >Crema</option>';
						                            echo '<option value="Gotas"selected>Gotas</option>';
						                            echo '<option value="Espuma">Espuma</option>';
						                            echo '<option value="Gel">Gel</option>';
						                            echo '<option value="Líquido">Líquido</option>';
						                            echo '<option value="Pomada">Pomada</option>';
						                            echo '<option value="Parches">Parches</option>';
						                            echo '<option value="Polvo">Polvo</option>';
						                            echo '<option value="Sólido">Sólido</option>';
						                            echo '<option value="Sprays">Sprays</option>';
						                            echo '<option value="Barra">Barra</option>';
						                            echo '<option value="Toallitas">Toallitas</option>';
						                            echo '<option value="Sobres">Sobres</option>';
				                          			break;

				                          		case "Espuma":
				                          			echo '<option value="Crema" >Crema</option>';
						                            echo '<option value="Gotas">Gotas</option>';
						                            echo '<option value="Espuma" selected>Espuma</option>';
						                            echo '<option value="Gel">Gel</option>';
						                            echo '<option value="Líquido">Líquido</option>';
						                            echo '<option value="Pomada">Pomada</option>';
						                            echo '<option value="Parches">Parches</option>';
						                            echo '<option value="Polvo">Polvo</option>';
						                            echo '<option value="Sólido">Sólido</option>';
						                            echo '<option value="Sprays">Sprays</option>';
						                            echo '<option value="Barra">Barra</option>';
						                            echo '<option value="Toallitas">Toallitas</option>';
						                            echo '<option value="Sobres">Sobres</option>';
				                          			break;

				                          		case "Gel":
				                          			echo '<option value="Crema" >Crema</option>';
						                            echo '<option value="Gotas">Gotas</option>';
						                            echo '<option value="Espuma">Espuma</option>';
						                            echo '<option value="Gel" selected>Gel</option>';
						                            echo '<option value="Líquido">Líquido</option>';
						                            echo '<option value="Pomada">Pomada</option>';
						                            echo '<option value="Parches">Parches</option>';
						                            echo '<option value="Polvo">Polvo</option>';
						                            echo '<option value="Sólido">Sólido</option>';
						                            echo '<option value="Sprays">Sprays</option>';
						                            echo '<option value="Barra">Barra</option>';
						                            echo '<option value="Toallitas">Toallitas</option>';
						                            echo '<option value="Sobres">Sobres</option>';
				                          			break;

				                          		case "Líquido":
				                          			echo '<option value="Crema" >Crema</option>';
						                            echo '<option value="Gotas">Gotas</option>';
						                            echo '<option value="Espuma" >Espuma</option>';
						                            echo '<option value="Gel">Gel</option>';
						                            echo '<option value="Líquido" selected>Líquido</option>';
						                            echo '<option value="Pomada">Pomada</option>';
						                            echo '<option value="Parches">Parches</option>';
						                            echo '<option value="Polvo">Polvo</option>';
						                            echo '<option value="Sólido">Sólido</option>';
						                            echo '<option value="Sprays">Sprays</option>';
						                            echo '<option value="Barra">Barra</option>';
						                            echo '<option value="Toallitas">Toallitas</option>';
						                            echo '<option value="Sobres">Sobres</option>';
				                          			break;

				                          		case "Pomada":
				                          			echo '<option value="Crema" >Crema</option>';
						                            echo '<option value="Gotas">Gotas</option>';
						                            echo '<option value="Espuma" >Espuma</option>';
						                            echo '<option value="Gel">Gel</option>';
						                            echo '<option value="Líquido" >Líquido</option>';
						                            echo '<option value="Pomada" selected>Pomada</option>';
						                            echo '<option value="Parches">Parches</option>';
						                            echo '<option value="Polvo">Polvo</option>';
						                            echo '<option value="Sólido">Sólido</option>';
						                            echo '<option value="Sprays">Sprays</option>';
						                            echo '<option value="Barra">Barra</option>';
						                            echo '<option value="Toallitas">Toallitas</option>';
						                            echo '<option value="Sobres">Sobres</option>';
				                          			break;


				                          		case "Parches":
				                          			echo '<option value="Crema" >Crema</option>';
						                            echo '<option value="Gotas">Gotas</option>';
						                            echo '<option value="Espuma" >Espuma</option>';
						                            echo '<option value="Gel">Gel</option>';
						                            echo '<option value="Líquido" >Líquido</option>';
						                            echo '<option value="Pomada">Pomada</option>';
						                            echo '<option value="Parches" selected>Parches</option>';
						                            echo '<option value="Polvo">Polvo</option>';
						                            echo '<option value="Sólido">Sólido</option>';
						                            echo '<option value="Sprays">Sprays</option>';
						                            echo '<option value="Barra">Barra</option>';
						                            echo '<option value="Toallitas">Toallitas</option>';
						                            echo '<option value="Sobres">Sobres</option>';
				                          			break;

				                          		case "Polvo":
				                          			echo '<option value="Crema" >Crema</option>';
						                            echo '<option value="Gotas">Gotas</option>';
						                            echo '<option value="Espuma" >Espuma</option>';
						                            echo '<option value="Gel">Gel</option>';
						                            echo '<option value="Líquido" >Líquido</option>';
						                            echo '<option value="Pomada">Pomada</option>';
						                            echo '<option value="Parches" >Parches</option>';
						                            echo '<option value="Polvo" selected>Polvo</option>';
						                            echo '<option value="Sólido">Sólido</option>';
						                            echo '<option value="Sprays">Sprays</option>';
						                            echo '<option value="Barra">Barra</option>';
						                            echo '<option value="Toallitas">Toallitas</option>';
						                            echo '<option value="Sobres">Sobres</option>';
				                          			break;
				                          		case "Sólido":
				                          			echo '<option value="Crema" >Crema</option>';
						                            echo '<option value="Gotas">Gotas</option>';
						                            echo '<option value="Espuma" >Espuma</option>';
						                            echo '<option value="Gel">Gel</option>';
						                            echo '<option value="Líquido" >Líquido</option>';
						                            echo '<option value="Pomada">Pomada</option>';
						                            echo '<option value="Parches" >Parches</option>';
						                            echo '<option value="Polvo">Polvo</option>';
						                            echo '<option value="Sólido" selected>Sólido</option>';
						                            echo '<option value="Sprays">Sprays</option>';
						                            echo '<option value="Barra">Barra</option>';
						                            echo '<option value="Toallitas">Toallitas</option>';
						                            echo '<option value="Sobres">Sobres</option>';				                          			
				                          			break;
				                          		case "Sprays":
				                          			echo '<option value="Crema" >Crema</option>';
						                            echo '<option value="Gotas">Gotas</option>';
						                            echo '<option value="Espuma" >Espuma</option>';
						                            echo '<option value="Gel">Gel</option>';
						                            echo '<option value="Líquido" >Líquido</option>';
						                            echo '<option value="Pomada">Pomada</option>';
						                            echo '<option value="Parches" >Parches</option>';
						                            echo '<option value="Polvo">Polvo</option>';
						                            echo '<option value="Sólido">Sólido</option>';
						                            echo '<option value="Sprays" selected>Sprays</option>';
						                            echo '<option value="Barra">Barra</option>';
						                            echo '<option value="Toallitas">Toallitas</option>';
						                            echo '<option value="Sobres">Sobres</option>';
				                          			break;
				                          		case "Barra":
				                          			echo '<option value="Crema" >Crema</option>';
						                            echo '<option value="Gotas">Gotas</option>';
						                            echo '<option value="Espuma" >Espuma</option>';
						                            echo '<option value="Gel">Gel</option>';
						                            echo '<option value="Líquido" >Líquido</option>';
						                            echo '<option value="Pomada">Pomada</option>';
						                            echo '<option value="Parches" >Parches</option>';
						                            echo '<option value="Polvo">Polvo</option>';
						                            echo '<option value="Sólido">Sólido</option>';
						                            echo '<option value="Sprays">Sprays</option>';
						                            echo '<option value="Barra" selected>Barra</option>';
						                            echo '<option value="Toallitas">Toallitas</option>';
						                            echo '<option value="Sobres">Sobres</option>';
				                          			break;
				                          		case "Toallitas":
				                          			echo '<option value="Crema" >Crema</option>';
						                            echo '<option value="Gotas">Gotas</option>';
						                            echo '<option value="Espuma" >Espuma</option>';
						                            echo '<option value="Gel">Gel</option>';
						                            echo '<option value="Líquido" >Líquido</option>';
						                            echo '<option value="Pomada">Pomada</option>';
						                            echo '<option value="Parches" >Parches</option>';
						                            echo '<option value="Polvo">Polvo</option>';
						                            echo '<option value="Sólido">Sólido</option>';
						                            echo '<option value="Sprays">Sprays</option>';
						                            echo '<option value="Barra">Barra</option>';
						                            echo '<option value="Toallitas" selected>Toallitas</option>';
						                            echo '<option value="Sobres">Sobres</option>';
				                          			break;
				                          		case "Sobres":
				                          			echo '<option value="Crema" >Crema</option>';
						                            echo '<option value="Gotas">Gotas</option>';
						                            echo '<option value="Espuma" >Espuma</option>';
						                            echo '<option value="Gel">Gel</option>';
						                            echo '<option value="Líquido" >Líquido</option>';
						                            echo '<option value="Pomada">Pomada</option>';
						                            echo '<option value="Parches" >Parches</option>';
						                            echo '<option value="Polvo">Polvo</option>';
						                            echo '<option value="Sólido">Sólido</option>';
						                            echo '<option value="Sprays">Sprays</option>';
						                            echo '<option value="Barra">Barra</option>';
						                            echo '<option value="Toallitas">Toallitas</option>';
						                            echo '<option value="Sobres" selected>Sobres</option>';
						                           
				                          			break;
				                          		

				                          		default:
				                          			echo '<option value="" selected>-Selecciona un color-</option>';
						                            echo '<option value="Crema">Crema</option>';
						                            echo '<option value="Gotas">Gotas</option>';
						                            echo '<option value="Espuma">Espuma</option>';
						                            echo '<option value="Gel">Gel</option>';
						                            echo '<option value="Líquido">Líquido</option>';
						                            echo '<option value="Pomada">Pomada</option>';
						                            echo '<option value="Parches">Parches</option>';
						                            echo '<option value="Polvo">Polvo</option>';
						                            echo '<option value="Sólido">Sólido</option>';
						                            echo '<option value="Sprays">Sprays</option>';
						                            echo '<option value="Barra">Barra</option>';
						                            echo '<option value="Toallitas">Toallitas</option>';
						                            echo '<option value="Sobres">Sobres</option>';
				                          			break;

				                          	}
				                           ?>                       
				                         	  
				                          </select>
				                       </div>
				                       </div>

				                       <div class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="resistencia_producto">Resistencia al Agua<span class="required">   *  </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         <select class="form-control" name="resistencia_producto" required="required">
					                         	<?php 
					                          	switch ($resistencia_producto) {
					                          			                          		
					                          		

					                          		case "Si":
							                            echo '<option value="Si" selected>Si</option>';
					                          			echo '<option value="No" >No</option>'; 
					                          			break;

					                          		case "No":
							                            echo '<option value="Si" >Si</option>';
					                          			echo '<option value="No" selected>No</option>'; 
					                          			break;

					                          		default:
					                          			echo '<option value="" selected>Selecciona una opcion</option>';
					                          			echo '<option value="Si" >Si</option>';
					                          			echo '<option value="No" >No</option>'; 
					                          			break;

					                          	}
					                           ?>   
					                          </select>
					                        </div>
					                      </div>

					                      <div class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_piel">Tipo de Piel<span class="required">   *  </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         <select class="form-control" name="tipo_piel" required="required">
					                         	<?php 
					                          	switch ($tipo_piel) {
					                          			                          		
					                          		case "Normal":
							                            echo '<option value="Normal" selected>Normal</option>';
					                          			echo '<option value="Seco" >Seco</option>';
					                          			echo '<option value="Graso" >Graso</option>';
					                          			echo '<option value="Mixto" >Mixto</option>';  
					                          			echo '<option value="Sensible" >Sensible</option>'; 
					                          			break;

					                          		case "Seco":
							                            echo '<option value="Normal">Normal</option>';
					                          			echo '<option value="Seco" selected>Seco</option>';
					                          			echo '<option value="Graso" >Graso</option>';
					                          			echo '<option value="Mixto" >Mixto</option>';  
					                          			echo '<option value="Sensible" >Sensible</option>'; 
					                          			break;

					                          		case "Graso":
							                            echo '<option value="Normal">Normal</option>';
					                          			echo '<option value="Seco" >Seco</option>';
					                          			echo '<option value="Graso" selected>Graso</option>';
					                          			echo '<option value="Mixto" >Mixto</option>';  
					                          			echo '<option value="Sensible" >Sensible</option>'; 
					                          			break;
					                          		case "Mixto":
							                            echo '<option value="Normal">Normal</option>';
					                          			echo '<option value="Seco" >Seco</option>';
					                          			echo '<option value="Graso" >Graso</option>';
					                          			echo '<option value="Mixto" selected>Mixto</option>';  
					                          			echo '<option value="Sensible" >Sensible</option>'; 
					                          			break;
					                          		case "Sensible":
							                            echo '<option value="Normal">Normal</option>';
					                          			echo '<option value="Seco" >Seco</option>';
					                          			echo '<option value="Graso" >Graso</option>';
					                          			echo '<option value="Mixto" >Mixto</option>';  
					                          			echo '<option value="Sensible" selected>Sensible</option>'; 
					                          			break;

					                          		default:
					                          			echo '<option value="" selected>Selecciona una opcion</option>';
					                          			echo '<option value="Normal">Normal</option>';
					                          			echo '<option value="Seco" >Seco</option>';
					                          			echo '<option value="Graso" >Graso</option>'; 
					                          			echo '<option value="Mixto" >Mixto</option>'; 
					                          			echo '<option value="Sensible" >Sensible</option>'; 
					                          			break;

					                          	}
					                           ?>   
					                          </select>
					                        </div>
					                      </div>

					                      <div class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categorias">Categoria del producto<span class="required">   *  </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         <select class="form-control" name="categorias"  onchange="pagoOnChange(this)" required="required">
					                         	<?php 
					                          	switch ($categorias) {
					                          			                          		
					                          		case "1":
							                            echo '<option value="1" selected>Artículos de Cuidado Facial</option>';
					                          			echo '<option value="2" >Artículos de Cuidado Corporal</option>';
					                          			echo '<option value="3" >Maquillaje</option>';
					                          			echo '<option value="4" >Perfumes y fragancias de lujo</option>';  
					                          			break;

					                          		case "2":
							                            echo '<option value="1">Artículos de Cuidado Facial</option>';
					                          			echo '<option value="2" selected>Artículos de Cuidado Corporal</option>';
					                          			echo '<option value="3" >Maquillaje</option>';
					                          			echo '<option value="4" >Perfumes y fragancias de lujo</option>';  
					                          			break;

					                          		case "3":
							                            echo '<option value="1">Artículos de Cuidado Facial</option>';
					                          			echo '<option value="2" >Artículos de Cuidado Corporal</option>';
					                          			echo '<option value="3" selected>Maquillaje</option>';
					                          			echo '<option value="4" >Perfumes y fragancias de lujo</option>';  
					                          			break;
					                          		case "4":
							                            echo '<option value="1">Artículos de Cuidado Facial</option>';
					                          			echo '<option value="2" >Artículos de Cuidado Corporal</option>';
					                          			echo '<option value="3" >Maquillaje</option>';
					                          			echo '<option value="4" selected>Perfumes y fragancias de lujo</option>';  
					                          			break;

					                          		default:
					                          			echo '<option value="" selected>Selecciona una opcion</option>';
					                          			echo '<option value="1">Artículos de Cuidado Facial</option>';
					                          			echo '<option value="2" >Artículos de Cuidado Corporal</option>';
					                          			echo '<option value="3" >Maquillaje</option>'; 
					                          			echo '<option value="4" >Perfumes y fragancias de lujo</option>'; 
					                          			break;

					                          	}
					                           ?>   
					                          </select>
					                        </div>
					                      </div>
										<div id="cat_uno" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_uno">Sub-categoria de Artículos de Cuidado Facial<span class="required">   *  </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         <select class="form-control" name="cat_uno" >
					                         	<?php 
					                          	switch ($cat_uno) {
					                          			                          		
					                          		case "18375":
							                            echo '<option value="18375" selected>Cremas faciales</option>';
					                          			echo '<option value="18374" > Sueros</option>';
					                          			echo '<option value="18373" > Artículos para Ojos y Labios</option>';
					                          			echo '<option value="18372" > Tratamientos Faciales</option>';  
					                          			echo '<option value="18369" > Exfoliantes y mascarillas</option>';
					                          			echo '<option value="18368" > Tónicos Faciales</option>';
					                          			echo '<option value="18367" > Limpiadores Faciales</option>';
					                          			echo '<option value="18363" > Desmaquillantes y Accesorios</option>';  
					                          			echo '<option value="18362" > Accesorios de Cuidado Facial</option>';
					                          			echo '<option value="18361" > Sets Cuidado Facial</option>';  
					                          			break;

					                          		case "18374":
							                            echo '<option value="18375" >Cremas faciales</option>';
					                          			echo '<option value="18374" selected> Sueros</option>';
					                          			echo '<option value="18373" > Artículos para Ojos y Labios</option>';
					                          			echo '<option value="18372" > Tratamientos Faciales</option>';  
					                          			echo '<option value="18369" > Exfoliantes y mascarillas</option>';
					                          			echo '<option value="18368" > Tónicos Faciales</option>';
					                          			echo '<option value="18367" > Limpiadores Faciales</option>';
					                          			echo '<option value="18363" > Desmaquillantes y Accesorios</option>';  
					                          			echo '<option value="18362" > Accesorios de Cuidado Facial</option>';
					                          			echo '<option value="18361" > Sets Cuidado Facial</option>';  
					                          			break;

					                          		case "18373":
							                            echo '<option value="18375" >Cremas faciales</option>';
					                          			echo '<option value="18374" > Sueros</option>';
					                          			echo '<option value="18373" selected> Artículos para Ojos y Labios</option>';
					                          			echo '<option value="18372" > Tratamientos Faciales</option>';  
					                          			echo '<option value="18369" > Exfoliantes y mascarillas</option>';
					                          			echo '<option value="18368" > Tónicos Faciales</option>';
					                          			echo '<option value="18367" > Limpiadores Faciales</option>';
					                          			echo '<option value="18363" > Desmaquillantes y Accesorios</option>';  
					                          			echo '<option value="18362" > Accesorios de Cuidado Facial</option>';
					                          			echo '<option value="18361" > Sets Cuidado Facial</option>';  
					                          			break;
					                          		case "18372":
							                            echo '<option value="18375" >Cremas faciales</option>';
					                          			echo '<option value="18374" > Sueros</option>';
					                          			echo '<option value="18373" > Artículos para Ojos y Labios</option>';
					                          			echo '<option value="18372" selected> Tratamientos Faciales</option>';  
					                          			echo '<option value="18369" > Exfoliantes y mascarillas</option>';
					                          			echo '<option value="18368" > Tónicos Faciales</option>';
					                          			echo '<option value="18367" > Limpiadores Faciales</option>';
					                          			echo '<option value="18363" > Desmaquillantes y Accesorios</option>';  
					                          			echo '<option value="18362" > Accesorios de Cuidado Facial</option>';
					                          			echo '<option value="18361" > Sets Cuidado Facial</option>';  
					                          			break;
					                          		case "18369":
							                            echo '<option value="18375" >Cremas faciales</option>';
					                          			echo '<option value="18374" > Sueros</option>';
					                          			echo '<option value="18373" > Artículos para Ojos y Labios</option>';
					                          			echo '<option value="18372" > Tratamientos Faciales</option>';  
					                          			echo '<option value="18369" selected> Exfoliantes y mascarillas</option>';
					                          			echo '<option value="18368" > Tónicos Faciales</option>';
					                          			echo '<option value="18367" > Limpiadores Faciales</option>';
					                          			echo '<option value="18363" > Desmaquillantes y Accesorios</option>';  
					                          			echo '<option value="18362" > Accesorios de Cuidado Facial</option>';
					                          			echo '<option value="18361" > Sets Cuidado Facial</option>';  
					                          			break;
					                          		case "18368":
							                            echo '<option value="18375" >Cremas faciales</option>';
					                          			echo '<option value="18374" > Sueros</option>';
					                          			echo '<option value="18373" > Artículos para Ojos y Labios</option>';
					                          			echo '<option value="18372" > Tratamientos Faciales</option>';  
					                          			echo '<option value="18369" > Exfoliantes y mascarillas</option>';
					                          			echo '<option value="18368" selected> Tónicos Faciales</option>';
					                          			echo '<option value="18367" > Limpiadores Faciales</option>';
					                          			echo '<option value="18363" > Desmaquillantes y Accesorios</option>';  
					                          			echo '<option value="18362" > Accesorios de Cuidado Facial</option>';
					                          			echo '<option value="18361" > Sets Cuidado Facial</option>';  
					                          			break;
					                          		case "18367":
							                            echo '<option value="18375" >Cremas faciales</option>';
					                          			echo '<option value="18374" > Sueros</option>';
					                          			echo '<option value="18373" > Artículos para Ojos y Labios</option>';
					                          			echo '<option value="18372" > Tratamientos Faciales</option>';  
					                          			echo '<option value="18369" > Exfoliantes y mascarillas</option>';
					                          			echo '<option value="18368" > Tónicos Faciales</option>';
					                          			echo '<option value="18367" selected> Limpiadores Faciales</option>';
					                          			echo '<option value="18363" > Desmaquillantes y Accesorios</option>';  
					                          			echo '<option value="18362" > Accesorios de Cuidado Facial</option>';
					                          			echo '<option value="18361" > Sets Cuidado Facial</option>';  
					                          			break;
					                          		case "18363":
							                            echo '<option value="18375" >Cremas faciales</option>';
					                          			echo '<option value="18374" > Sueros</option>';
					                          			echo '<option value="18373" > Artículos para Ojos y Labios</option>';
					                          			echo '<option value="18372" > Tratamientos Faciales</option>';  
					                          			echo '<option value="18369" > Exfoliantes y mascarillas</option>';
					                          			echo '<option value="18368" > Tónicos Faciales</option>';
					                          			echo '<option value="18367" > Limpiadores Faciales</option>';
					                          			echo '<option value="18363" selected> Desmaquillantes y Accesorios</option>';  
					                          			echo '<option value="18362" > Accesorios de Cuidado Facial</option>';
					                          			echo '<option value="18361" > Sets Cuidado Facial</option>';  
					                          			break;
					                          		case "18362":
							                            echo '<option value="18375" >Cremas faciales</option>';
					                          			echo '<option value="18374" > Sueros</option>';
					                          			echo '<option value="18373" > Artículos para Ojos y Labios</option>';
					                          			echo '<option value="18372" > Tratamientos Faciales</option>';  
					                          			echo '<option value="18369" > Exfoliantes y mascarillas</option>';
					                          			echo '<option value="18368" > Tónicos Faciales</option>';
					                          			echo '<option value="18367" > Limpiadores Faciales</option>';
					                          			echo '<option value="18363" > Desmaquillantes y Accesorios</option>';  
					                          			echo '<option value="18362" selected> Accesorios de Cuidado Facial</option>';
					                          			echo '<option value="18361" > Sets Cuidado Facial</option>';  
					                          			break;
					                          		case "18361":
							                            echo '<option value="18375" >Cremas faciales</option>';
					                          			echo '<option value="18374" > Sueros</option>';
					                          			echo '<option value="18373" > Artículos para Ojos y Labios</option>';
					                          			echo '<option value="18372" > Tratamientos Faciales</option>';  
					                          			echo '<option value="18369" > Exfoliantes y mascarillas</option>';
					                          			echo '<option value="18368" > Tónicos Faciales</option>';
					                          			echo '<option value="18367" > Limpiadores Faciales</option>';
					                          			echo '<option value="18363" > Desmaquillantes y Accesorios</option>';  
					                          			echo '<option value="18362" > Accesorios de Cuidado Facial</option>';
					                          			echo '<option value="18361" selected> Sets Cuidado Facial</option>';  
					                          			break;

					                          		

					                          		default:
					                          			echo '<option value="" selected>Selecciona una opcion</option>';
					                          			echo '<option value="18375" >Cremas faciales</option>';
					                          			echo '<option value="18374" > Sueros</option>';
					                          			echo '<option value="18373" > Artículos para Ojos y Labios</option>';
					                          			echo '<option value="18372" > Tratamientos Faciales</option>';  
					                          			echo '<option value="18369" > Exfoliantes y mascarillas</option>';
					                          			echo '<option value="18368" > Tónicos Faciales</option>';
					                          			echo '<option value="18367" > Limpiadores Faciales</option>';
					                          			echo '<option value="18363" > Desmaquillantes y Accesorios</option>';  
					                          			echo '<option value="18362" > Accesorios de Cuidado Facial</option>';
					                          			echo '<option value="18361" > Sets Cuidado Facial</option>';  
					                          			break;

					                          	}
					                           ?>   
					                          </select>
					                        </div>
					                      </div>

										<div id="cat_dos" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_dos">Sub-categoria de Artículos de Cuidado Corporal<span class="required">   *  </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         <select class="form-control" name="cat_dos" >
					                         	<?php 
					                          	switch ($cat_dos) {
					                          			                          		
					                          		case "18359":
							                            echo '<option value="18359" selected>Cremas corporales y tratamientos</option>';
					                          			echo '<option value="18355" > Cuidado de las manos y pies</option>';
					                          			echo '<option value="18350" > Jabones y limpieza personal</option>';
					                          			echo '<option value="18345" > Accesorios de Cuidado Corporal</option>';  
					                          			echo '<option value="18344" > Sets Cuidado Corporal</option>';
					                          			break;

					                          		case "18355":
							                            echo '<option value="18359" selected>Cremas corporales y tratamientos</option>';
					                          			echo '<option value="18355" > Cuidado de las manos y pies</option>';
					                          			echo '<option value="18350" > Jabones y limpieza personal</option>';
					                          			echo '<option value="18345" > Accesorios de Cuidado Corporal</option>';  
					                          			echo '<option value="18344" > Sets Cuidado Corporal</option>';
					                          			break;

					                          		case "18350":
							                            echo '<option value="18359" selected>Cremas corporales y tratamientos</option>';
					                          			echo '<option value="18355" > Cuidado de las manos y pies</option>';
					                          			echo '<option value="18350" > Jabones y limpieza personal</option>';
					                          			echo '<option value="18345" > Accesorios de Cuidado Corporal</option>';  
					                          			echo '<option value="18344" > Sets Cuidado Corporal</option>';
					                          			break;
					                          		case "18345":
							                            echo '<option value="18359" selected>Cremas corporales y tratamientos</option>';
					                          			echo '<option value="18355" > Cuidado de las manos y pies</option>';
					                          			echo '<option value="18350" > Jabones y limpieza personal</option>';
					                          			echo '<option value="18345" > Accesorios de Cuidado Corporal</option>';  
					                          			echo '<option value="18344" > Sets Cuidado Corporal</option>';
					                          			break;
					                          		case "18344":
							                            echo '<option value="18359" selected>Cremas corporales y tratamientos</option>';
					                          			echo '<option value="18355" > Cuidado de las manos y pies</option>';
					                          			echo '<option value="18350" > Jabones y limpieza personal</option>';
					                          			echo '<option value="18345" > Accesorios de Cuidado Corporal</option>';  
					                          			echo '<option value="18344" > Sets Cuidado Corporal</option>';
					                          			break;

					                          		default:
					                          			echo '<option value="" selected>Selecciona una opcion</option>';
					                          			echo '<option value="18359" >Cremas corporales y tratamientos</option>';
					                          			echo '<option value="18355" > Cuidado de las manos y pies</option>';
					                          			echo '<option value="18350" > Jabones y limpieza personal</option>';
					                          			echo '<option value="18345" > Accesorios de Cuidado Corporal</option>';  
					                          			echo '<option value="18344" > Sets Cuidado Corporal</option>';
					                          			break;

					                          	}
					                           ?>   
					                          </select>
					                        </div>
					                      </div>

					                      <div id="cat_tres" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_tres">Sub-categoria de Maquillaje<span class="required">   *  </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         <select class="form-control" name="cat_tres" >
					                         	<?php 
					                          	switch ($cat_tres) {
					                          			                          		
					                          		case "18316":
							                            echo '<option value="18316" selected>Maquillaje para Rostro</option>';
					                          			echo '<option value="18305" > Maquillaje para Ojos y Cejas</option>';
					                          			echo '<option value="18297" > Maquillaje de labios</option>';
					                          			echo '<option value="18286" > Maquillaje para Uñas</option>';  
					                          			echo '<option value="18272" > Brochas, Aplicadores y Accesorios</option>';
					                          			echo '<option value="18271" > Maquillaje Corporal</option>';
					                          			echo '<option value="18270" > Sets de Maquillaje</option>';
					                          			break;

					                          		case "18305":
							                            echo '<option value="18316" >Maquillaje para Rostro</option>';
					                          			echo '<option value="18305" selected> Maquillaje para Ojos y Cejas</option>';
					                          			echo '<option value="18297" > Maquillaje de labios</option>';
					                          			echo '<option value="18286" > Maquillaje para Uñas</option>';  
					                          			echo '<option value="18272" > Brochas, Aplicadores y Accesorios</option>';
					                          			echo '<option value="18271" > Maquillaje Corporal</option>';
					                          			echo '<option value="18270" > Sets de Maquillaje</option>';
					                          			break;

					                          		case "18297":
							                            echo '<option value="18316" >Maquillaje para Rostro</option>';
					                          			echo '<option value="18305" > Maquillaje para Ojos y Cejas</option>';
					                          			echo '<option value="18297" selected> Maquillaje de labios</option>';
					                          			echo '<option value="18286" > Maquillaje para Uñas</option>';  
					                          			echo '<option value="18272" > Brochas, Aplicadores y Accesorios</option>';
					                          			echo '<option value="18271" > Maquillaje Corporal</option>';
					                          			echo '<option value="18270" > Sets de Maquillaje</option>';
					                          			break;
					                          		case "18286":
							                            echo '<option value="18316" >Maquillaje para Rostro</option>';
					                          			echo '<option value="18305" > Maquillaje para Ojos y Cejas</option>';
					                          			echo '<option value="18297" > Maquillaje de labios</option>';
					                          			echo '<option value="18286" selected> Maquillaje para Uñas</option>';  
					                          			echo '<option value="18272" > Brochas, Aplicadores y Accesorios</option>';
					                          			echo '<option value="18271" > Maquillaje Corporal</option>';
					                          			echo '<option value="18270" > Sets de Maquillaje</option>';
					                          			break;
					                          		case "18272":
							                            echo '<option value="18316" >Maquillaje para Rostro</option>';
					                          			echo '<option value="18305" > Maquillaje para Ojos y Cejas</option>';
					                          			echo '<option value="18297" > Maquillaje de labios</option>';
					                          			echo '<option value="18286" > Maquillaje para Uñas</option>';  
					                          			echo '<option value="18272" selected> Brochas, Aplicadores y Accesorios</option>';
					                          			echo '<option value="18271" > Maquillaje Corporal</option>';
					                          			echo '<option value="18270" > Sets de Maquillaje</option>';
					                          			break;
					                          		case "18271":
							                            echo '<option value="18316" >Maquillaje para Rostro</option>';
					                          			echo '<option value="18305" > Maquillaje para Ojos y Cejas</option>';
					                          			echo '<option value="18297" > Maquillaje de labios</option>';
					                          			echo '<option value="18286" > Maquillaje para Uñas</option>';  
					                          			echo '<option value="18272" > Brochas, Aplicadores y Accesorios</option>';
					                          			echo '<option value="18271" selected> Maquillaje Corporal</option>';
					                          			echo '<option value="18270" > Sets de Maquillaje</option>';
					                          			break;
					                          		case "18270":
							                            echo '<option value="18316" >Maquillaje para Rostro</option>';
					                          			echo '<option value="18305" > Maquillaje para Ojos y Cejas</option>';
					                          			echo '<option value="18297" > Maquillaje de labios</option>';
					                          			echo '<option value="18286" > Maquillaje para Uñas</option>';  
					                          			echo '<option value="18272" > Brochas, Aplicadores y Accesorios</option>';
					                          			echo '<option value="18271" > Maquillaje Corporal</option>';
					                          			echo '<option value="18270" selected> Sets de Maquillaje</option>';
					                          			break;
					                          		

					                          		default:
					                          			echo '<option value="" selected>Selecciona una opcion</option>';
					                          			echo '<option value="18316" >Maquillaje para Rostro</option>';
					                          			echo '<option value="18305" > Maquillaje para Ojos y Cejas</option>';
					                          			echo '<option value="18297" > Maquillaje de labios</option>';
					                          			echo '<option value="18286" > Maquillaje para Uñas</option>';  
					                          			echo '<option value="18272" > Brochas, Aplicadores y Accesorios</option>';
					                          			echo '<option value="18271" > Maquillaje Corporal</option>';
					                          			echo '<option value="18270" > Sets de Maquillaje</option>';
					                          			break;


					                          	}
					                           ?>   
					                          </select>
					                        </div>
					                      </div>
					                     <br><br>
					                     <hr>
					                     <h3>Mercado Libre</h3>
					                     <div id="cat_ml" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_ml">Categoría de Mercado libre<span class="required">   *  </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         <select class="form-control" name="cat_ml" onchange="cambioML(this)" >
					                         	<?php 
					                          	switch ($cat_ml) {
					                          			                          		
					                          		case "MLM172337":
							                            echo '<option value="MLM172337" selected>Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;

					                          		case "MLM193880":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" selected> Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;

					                          		case "MLM172360":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" selected> Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;
					                          		case "MLM172335":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" selected> Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;
					                          		case "MLM172336":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" selected> Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;
					                          		case "MLM179203":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" selected> Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;
					                          		case "MLM192034":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" selected> Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;
					                          		case "MLM178755":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" selected> Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;
					                          		case "MLM178705":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" selected> Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;
					                          		case "MLM178708":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" selected> Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;

					                          		case "MLM194745":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" selected> Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;

					                          		case "MLM29901":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" selected> Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;

					                          		case "MLM29903":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" selected> Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;
					                          		case "MLM29907":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" selected> Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;
					                          		case "MLM172338":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" selected> Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;
					                          		case "MLM29883":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" selected> Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;
					                          		case "MLM1271":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" selected> Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;
					                          		case "MLM180964":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" selected> Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;
					                          		case "MLM194489":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" selected> Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;
					                          		case "MLM29900":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" selected> Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;
					                          		case "MLM29903":
							                            echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" selected> Otros Ojos</option>'; 
					                          			break;

					                          		

					                          		default:
					                          			echo '<option value="" selected>Selecciona una opcion</option>';
					                          			echo '<option value="MLM172337" >Bases de Maquillaje</option>';
					                          			echo '<option value="MLM193880" > Polvos</option>';
					                          			echo '<option value="MLM172360" > Iluminadores</option>';
					                          			echo '<option value="MLM172335" > Correctores</option>';  
					                          			echo '<option value="MLM172336" > Rubores</option>';
					                          			echo '<option value="MLM179203" > Desmaquillantes</option>';
					                          			echo '<option value="MLM192034" > Cremas para Manos y Pies</option>';
					                          			echo '<option value="MLM178755" > Cuidado corporal</option>';  
					                          			echo '<option value="MLM178705" > Cuidado Facial</option>';
					                          			echo '<option value="MLM178708" > Mascarillas Faciales</option>';
					                          			echo '<option value="MLM194745" > Delineadores de cejas</option>';
					                          			echo '<option value="MLM29901" > Rímel</option>';
					                          			echo '<option value="MLM29903" > Delineadores para ojos</option>';  
					                          			echo '<option value="MLM29907" > Sombras para ojos</option>';
					                          			echo '<option value="MLM172338" > Delineador para labios</option>';
					                          			echo '<option value="MLM29883" > Labiales</option>';
					                          			echo '<option value="MLM1271" > Perfumes</option>';  
					                          			echo '<option value="MLM180964" > Brochas para maquillaje</option>';
					                          			echo '<option value="MLM194489" > Limpiadores de Brochas</option>';    
					                          			echo '<option value="MLM29900" > Otros Labios</option>';
					                          			echo '<option value="MLM29903" > Otros Ojos</option>'; 
					                          			break;

					                          	}
					                           ?>   
					                          </select>
					                        </div>
					                      </div>
					                      <div class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Modelo del producto <span class="required">*</span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                          <input type="text" name="modelo_producto" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $modelo_producto; ?>" >
					                        </div>
					                      </div>
					                      <div id="cat_base_consistencia" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_base_consistencia">Consistencia bases de maquillaje</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													$selc_3 = '';
													$selc_4 = '';
													$selc_5 = '';
													switch ($consistecia_base) {
														case 'Cremoso':
															$selc_1 = "selected";
															break;
														case 'Loción':
															$selc_2 = "selected";
															break;
														case 'Líquido':
															$selc_3 = "selected";
															break;
														case 'Serum':
															$selc_4 = "selected";
															break;
														case 'Spray':
															$selc_5 = "selected";
															break;
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="consistecia_base" >
													<option value="" <?php echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Cremoso" <?php echo $selc_1; ?>> Cremoso</option>
													<option value="Loción" <?php echo $selc_2; ?>> Loción</option>
													<option value="Líquido" <?php echo $selc_3; ?>> Líquido</option>
													<option value="Serum" <?php echo $selc_4; ?>> Serum</option>
													<option value="Spray" <?php echo $selc_5; ?>> Spray</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="cat_base_aca" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_base_aca">Acabado bases de maquillaje</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php 
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													$selc_3 = '';
													$selc_4 = '';
													switch ($acabado_base) {
														case 'Mate':
															$selc_1 = "selected";
															break;
														case 'Natural':
															$selc_2 = "selected";
															break;
														case 'Radiante':
															$selc_3 = "selected";
															break;
														case 'Satinado':
															$selc_4 = "selected";
															break;
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="acabado_base">
													<option value="" <?php echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Mate" <?php echo $selc_1; ?>> Mate</option>
													<option value="Natural" <?php echo $selc_2; ?>> Natural</option>
													<option value="Radiante" <?php echo $selc_3; ?>> Radiante</option>
													<option value="Satinado" <?php echo $selc_4; ?>> Satinado</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="cat_ilu_form" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_ilu_form">Presentación iluminador</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php 
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													$selc_3 = '';
													switch ($form_iluminador) {
														case 'Barra':
															$selc_1 = "selected";
															break;
														case 'Líquido':
															$selc_2 = "selected";
															break;
														case 'Polvo':
															$selc_3 = "selected";
															break;
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="form_iluminador">
													<option value="" >- Seleccione una opción -</option>
													<option value="Barra" > Barra</option>
													<option value="Líquido" > Líquido</option>
													<option value="Polvo" > Polvo</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="cat_rub_corre" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_rub_corre">Presentación Corrector / Rubor</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php 
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													$selc_3 = '';
													switch ($form_corrector) {
														case 'Lápiz':
															$selc_1 = "selected";
															break;
														case 'Líquido':
															$selc_2 = "selected";
															break;
														case 'Pomo':
															$selc_3 = "selected";
															break;
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="form_corrector" >
													<option value="" <?php echo $selc_def ?>>- Seleccione una opción -</option>
													<option value="Lápiz" <?php echo $selc_1 ?>> Lápiz</option>
													<option value="Líquido" <?php echo $selc_2 ?>> Líquido</option>
													<option value="Pomo" <?php echo $selc_3 ?>> Pomo</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="cat_tex_corre" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_tex_corre">Textura corrector</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php 
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													switch ($tex_corrector) {
														case 'Cremoso':
															$selc_1 = "selected";
															break;
														case 'Líquido':
															$selc_2 = "selected";
															break;
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="tex_corrector" >
													<option value="" <?php echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Cremoso" <?php echo $selc_1; ?>> Cremoso</option>
													<option value="Líquido" <?php echo $selc_2; ?> > Líquido</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="cat_aca_rubor" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_aca_rubor">Acabado Rubor</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php 
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													$selc_3 = '';
													switch ($acabado_rubor) {
														case 'Mate':
															$selc_1 = "selected";
															break;
														case 'Natural':
															$selc_2 = "selected";
															break;
														case 'Satinado':
															$selc_3 = "selected";
															break;
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="acabado_rubor">
													<option value="" <?php echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Mate" <?php echo $selc_1; ?> > Mate</option>
													<option value="Natural" <?php echo $selc_2; ?>> Natural</option>
													<option value="Satinado" <?php echo $selc_3; ?>> Satinado</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="cat_desmaquillante" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_desmaquillante">Presentación desmaquillante</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													$selc_3 = '';
													$selc_4 = '';
													$selc_5 = '';
													$selc_6 = '';
													switch ($formato_desmaquillante) {
														case 'Agua Micelar':
															$selc_1 = "selected";
															break;
														case 'Crema':
															$selc_2 = "selected";
															break;
														case 'Emulsión':
															$selc_3 = "selected";
															break;
														case 'Loción':
															$selc_4 = "selected";
															break;
														case 'Spray':
															$selc_5 = "selected";
															break;
														case 'Toallita':
															$selc_6 = "selected";
															break;
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="formato_desmaquillante">
													<option value="" <?php echo $selc_def ?>>- Seleccione una opción -</option>
													<option value="Agua Micelar" <?php echo $selc_1 ?>> Agua Micelar</option>
													<option value="Crema" <?php echo $selc_2 ?>> Crema</option>
													<option value="Emulsión" <?php echo $selc_3 ?>> Emulsión</option>
													<option value="Loción" <?php echo $selc_4 ?>> Loción</option>
													<option value="Spray" <?php echo $selc_5 ?>> Spray</option>
													<option value="Toallita" <?php echo $selc_6 ?>> Toallita</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="cat_tip_crema" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_tip_crema">Tipo crema</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php 
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													$selc_3 = '';
													switch ($tip_crema) {
														case 'Manos':
															$selc_1 = "selected";
															break;
														case 'Manos y pies':
															$selc_2 = "selected";
															break;
														case 'Pies':
															$selc_3 = "selected";
															break;
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="tip_crema">
													<option value="" <?php echo $selc_def ?>>- Seleccione una opción -</option>
													<option value="Manos" <?php echo $selc_1 ?>> Manos</option>
													<option value="Manos y pies" <?php echo $selc_2 ?>> Manos y pies</option>
													<option value="Pies" <?php echo $selc_3 ?>> Pies</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="cat_cons_crema" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_cons_crema">Consistencia crema</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php 
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													$selc_3 = '';
													switch ($consistencia_crema) {
														case 'Crema en Gel':
															$selc_1 = "selected";
															break;
														case 'Crema Líquida':
															$selc_2 = "selected";
															break;
														case 'Crema sólida':
															$selc_3 = "selected";
															break;
														default: 
															$selc_def = "selected";
															break;
													}
												?>

												<select class="form-control" name="consistencia_crema">
													<option value="" <?php echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Crema en Gel" <?php echo $selc_1; ?>> Crema en Gel</option>
													<option value="Crema Líquida" <?php echo $selc_2; ?>> Crema Líquida</option>
													<option value="Crema sólida" <?php echo $selc_3; ?>> Crema sólida</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="cat_tip_piel" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_tip_piel">Tipo de piel</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													$selc_3 = '';
													$selc_4 = '';
													$selc_5 = '';
													switch ($tip_piel) {
														case 'Seca':
															$selc_1 = "selected";
															break;
														case 'Sensible':
															$selc_2 = "selected";
															break;
														case 'Mixta':
															$selc_3 = "selected";
															break;
														case 'Normal':
															$selc_4 = "selected";
															break;
														case 'Grasa':
															$selc_5 = "selected";
															break;
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="tip_piel">
													<option value="" <?php echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Seca" <?php echo $selc_1; ?>> Seca</option>
													<option value="Sensible" <?php echo $selc_2; ?>> Sensible</option>
													<option value="Mixta" <?php echo $selc_3; ?>> Mixta</option>
													<option value="Normal" <?php echo $selc_4; ?>> Normal</option>
													<option value="Grasa" <?php echo $selc_5; ?>> Grasa</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="masc_func" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Función de mascarrilla<span class="required">* </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                          <input type="text" name="func_mascarilla" class="form-control col-md-7 col-xs-12" value="<?php echo $func_mascarilla; ?>" placeholder="Eje: Anti-Edad, Acne, (Solo una palabra)">
					                        </div>
					                      </div>
					                      <div id="masc_aplic" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Zonas de aplicación<span class="required">* </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                          <input type="text" name="zona_mascarilla" class="form-control col-md-7 col-xs-12" value="<?php echo $zona_mascarilla; ?>" placeholder="Eje: Rostro, zona T, (solo una palabra)">
					                        </div>
					                      </div>
					                      <div id="masc_ingre" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mascarilla elaborada de: <span class="required">* </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                          <input type="text" name="ing_mascarilla" class="form-control col-md-7 col-xs-12" value="<?php echo $ing_mascarilla; ?>" placeholder="Eje: Té verde, carbón activo (palabras clave)">
					                        </div>
					                      </div>
					                      <div id="cat_cf_form" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_cf_form">Presentación Cuidado Facial</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													$selc_3 = '';
													$selc_4 = '';
													switch ($form_facial) {
														case 'Aceite':
															$selc_1 = "selected";
															break;
														case 'Crema':
															$selc_2 = "selected";
															break;
														case 'Loción':
															$selc_3 = "selected";
															break;
														case 'Tónico':
															$selc_4 = "selected";
															break;
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="form_facial">
													<option value="" <?php echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Aceite" <?php echo $selc_1; ?>> Aceite</option>
													<option value="Crema" <?php echo $selc_2; ?>> Crema</option>
													<option value="Loción" <?php echo $selc_3; ?> > Loción</option>
													<option value="Tónico" <?php echo $selc_4; ?>> Tónico</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="cat_del_ceja" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_del_ceja">Presentación delineador de cejas</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													$selc_3 = '';
													switch ($form_ceja) {
														case 'Gel':
															$selc_1 = "selected";
															break;
														case 'Lápiz':
															$selc_2 = "selected";
															break;
														case 'Pomada':
															$selc_3 = "selected";
															break;
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="form_ceja">
													<option value="" <?php echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Gel" <?php echo $selc_1; ?>> Gel</option>
													<option value="Lápiz" <?php echo $selc_2; ?>> Lápiz</option>
													<option value="Pomada" <?php echo $selc_3; ?>> Pomada</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="cat_del_ojo" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_del_ojo">Presentación delineador de ojos</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													$selc_3 = '';
													$selc_4 = '';
													$selc_5 = '';
													$selc_6 = '';
													$selc_7 = '';
													$selc_8 = '';
													switch ($form_ojo) {
														case 'Retráctil':
															$selc_1 = "selected";
															break;
														case 'Fibra':
															$selc_2 = "selected";
															break;
														case 'Lápiz':
															$selc_3 = "selected";
															break;
														case 'Polvo':
															$selc_4 = "selected";
															break;
														case 'Gel':
															$selc_5 = "selected";
															break;
														case 'Crema':
															$selc_6 = "selected";
															break;
														case 'Líquido':
															$selc_7 = "selected";
															break;
														case 'Crayón':
															$selc_8 = "selected";
															break;
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="form_ojo">
													<option value="" <?php echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Retráctil" <?php echo $selc_1; ?>> Retráctil</option>
													<option value="Fibra" <?php echo $selc_2; ?>> Fibra</option>
													<option value="Lápiz" <?php echo $selc_3; ?>> Lápiz</option>
													<option value="Polvo" <?php echo $selc_4; ?>> Polvo</option>
													<option value="Gel" <?php echo $selc_5; ?>> Gel</option>
													<option value="Crema" <?php echo $selc_6; ?>> Crema</option>
													<option value="Líquido" <?php echo $selc_7; ?>> Líquido</option>
													<option value="Crayón" <?php echo $selc_8; ?>> Crayón</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="cat_no_sombra" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Número de sombras<span class="required">* </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                          <input type="number" name="no_sombra" class="form-control col-md-7 col-xs-12" value="<?php echo $no_sombra; ?>" placeholder="Solo número">
					                        </div>
					                      </div>
					                      <div id="cat_del_labio" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_del_labio">Presentación delineador de labios</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													$selc_3 = '';
													switch ($form_labio) {
														case 'Lápiz':
															$selc_1 = "selected";
															break;
														case 'Líquido':
															$selc_2 = "selected";
															break;
														case 'Retráctil':
															$selc_3 = "selected";
															break;
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="form_labio">
													<option value="" <?php echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Lápiz" <?php echo $selc_1; ?>> Lápiz</option>
													<option value="Líquido" <?php echo $selc_2; ?>> Líquido</option>
													<option value="Retráctil" <?php echo $selc_3; ?>> Retráctil</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="cat_aca_labios" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_aca_labios">Acabado labios</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													switch ($acabado_labios) {
														case 'Cremoso':
															$selc_1 = "selected";
															break;
														case 'Mate':
															$selc_2 = "selected";
															break;
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="acabado_labios">
													<option value="" <?php echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Cremoso" <?php echo $selc_1; ?>> Cremoso</option>
													<option value="Mate" <?php echo $selc_2; ?>> Mate</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="cat_tip_perfume" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_tip_perfume">Tipo Perfume</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													switch ($tipo_perfume) {
														case 'Perfume':
															$selc_1 = "selected";
															break;
														case 'Body spray':
															$selc_2 = "selected";
															break;
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="tipo_perfume">
													<option value="" <?php echo $selc_def ?>>- Seleccione una opción -</option>
													<option value="Perfume" <?php echo $selc_1 ?>> Perfume</option>
													<option value="Body spray" <?php echo $selc_2 ?>> Body spray</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="cat_base_con" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_base_con">Tipo esencia</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													$selc_3 = '';
													$selc_4 = '';
													switch ($tipo_esencia) {
														case 'Amaderado':
															$selc_1 = "selected";
															break;
														case 'Cítrico':
															$selc_2 = "selected";
															break;
														case 'Floral':
															$selc_3 = "selected";
															break;
														case 'Frutal':
															$selc_4 = "selected";
															break;
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="tipo_esencia">
													<option value=""  <?php  echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Amaderado" <?php  echo $selc_1; ?>> Amaderado</option>
													<option value="Cítrico" <?php  echo $selc_2; ?>> Cítrico</option>
													<option value="Floral" <?php  echo $selc_3; ?>> Floral</option>
													<option value="Frutal" <?php  echo $selc_4; ?>> Frutal</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="p_hipo" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="p_hipo">¿Es hipoalergenico?</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													switch ($hipoalergenica) {
														case 'Sí':
															$selc_1 = "selected";
															break;
														case 'No':
															$selc_2 = "selected";
															break;
														
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="hipoalergenica">
													<option value=""  <?php  echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Sí" <?php  echo $selc_1; ?>> Sí</option>
													<option value="No" <?php  echo $selc_2; ?>> No</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="lib_para" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lib_para">¿Libre de parabeno?</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													switch ($parabeno_free) {
														case 'Sí':
															$selc_1 = "selected";
															break;
														case 'No':
															$selc_2 = "selected";
															break;
														
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="parabeno_free">
													<option value=""  <?php  echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Sí" <?php  echo $selc_1; ?>> Sí</option>
													<option value="No" <?php  echo $selc_2; ?>> No</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="proct_solar" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="proct_solar">¿Tiene protección solar?</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													switch ($prot_solar) {
														case 'Sí':
															$selc_1 = "selected";
															break;
														case 'No':
															$selc_2 = "selected";
															break;
														
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="prot_solar">
													<option value=""  <?php  echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Sí" <?php  echo $selc_1; ?>> Sí</option>
													<option value="No" <?php  echo $selc_2; ?>> No</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="derma_tester" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="derma_tester">¿Dermatologícamente probado?</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													switch ($derm_test) {
														case 'Sí':
															$selc_1 = "selected";
															break;
														case 'No':
															$selc_2 = "selected";
															break;
														
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="derm_test">
													<option value=""  <?php  echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Sí" <?php  echo $selc_1; ?>> Sí</option>
													<option value="No" <?php  echo $selc_2; ?>> No</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="prueba_agua" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="prueba_agua">¿Es a prueba de agua?</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													switch ($agua_test) {
														case 'Sí':
															$selc_1 = "selected";
															break;
														case 'No':
															$selc_2 = "selected";
															break;
														
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="agua_test">
													<option value=""  <?php  echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Sí" <?php  echo $selc_1; ?>> Sí</option>
													<option value="No" <?php  echo $selc_2; ?>> No</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="duracion" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="duracion">¿Es de larga duración?</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													switch ($larga_dur) {
														case 'Sí':
															$selc_1 = "selected";
															break;
														case 'No':
															$selc_2 = "selected";
															break;
														
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="larga_dur">
													<option value=""  <?php  echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Sí" <?php  echo $selc_1; ?>> Sí</option>
													<option value="No" <?php  echo $selc_2; ?>> No</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="cat_case" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cat_case">¿Incluye estuche?</label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                         	<?php
													$selc_def = ''; 
													$selc_1 = '';
													$selc_2 = '';
													switch ($case_brocha) {
														case 'Sí':
															$selc_1 = "selected";
															break;
														case 'No':
															$selc_2 = "selected";
															break;
														
														default: 
															$selc_def = "selected";
															break;
													}
												?>
												<select class="form-control" name="case_brocha">
													<option value=""  <?php  echo $selc_def; ?>>- Seleccione una opción -</option>
													<option value="Sí" <?php  echo $selc_1; ?>> Sí</option>
													<option value="No" <?php  echo $selc_2; ?>> No</option>
												</select>
					                        </div>
					                      </div>
					                      <div id="cat_no_brocha" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Número de brochas<span class="required">* </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                          <input type="number" name="no_brocha" class="form-control col-md-7 col-xs-12" value="<?php echo $no_brocha; ?>" placeholder="Solo número">
					                        </div>
					                      </div>
					                      <div id="cat_pelo_brocha" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tipo de pelo de brocha<span class="required">* </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                          <input type="text" name="pelo_brocha" class="form-control col-md-7 col-xs-12" value="<?php echo $pelo_brocha; ?>" placeholder="Ejem: Natural, Sintetico , (una palabra)">
					                        </div>
					                      </div>
					                      <div id="form_limpiador" class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Forma del limpiador<span class="required">* </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                          <input type="text" name="form_limp" class="form-control col-md-7 col-xs-12" value="<?php echo $form_limp; ?>" placeholder="Ejem: Líquido, Sólido , (una palabra)">
					                        </div>
					                      </div>
					                      <br>
					                      <div class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Peso por unidad<span class="required">* </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                          <input type="text" name="peso_unidad" class="form-control col-md-7 col-xs-12" value="<?php echo $peso_unidad; ?>" placeholder="Solo número, en gramos (g)">
					                        </div>
					                      </div>
					                      <div class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Volumen por unidad<span class="required">* </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                          <input type="text" name="volumen_unidad" class="form-control col-md-7 col-xs-12" value="<?php echo $volumen_unidad; ?>" placeholder="Solo número, en mililitros (ml)">
					                        </div>
					                      </div>
					                      <div class="form-group">
					                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Unidades por paquete<span class="required">* </span>
					                        </label>
					                        <div class="col-md-6 col-sm-6 col-xs-12">
					                          <input type="text" name="unit_paq" class="form-control col-md-7 col-xs-12" value="<?php echo $unit_paq; ?>" placeholder="Solo número, (piezas)">
					                        </div>
					                      </div>
					                      
					                     <hr>
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
                                      <div class="form-group" align="center">
                                        <h2 >Descripción</h2>
                                        <br>
                                      </div>
				                      <div class="form-group">
                                        <label >Descripción</label>
                                        <br>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="id_producto" hidden="true" value="<?php echo $id_producto; ?>">
                                            <textarea id="tinymce" name="descripcion">
                                                <?php echo $descripcion_linio; ?>
                                            </textarea>    
                                        </div>
                                      </div>
                                      <br>
                                       <div class="form-group">
                                        <label>Puntos importantes</label>
                                        <br>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea id="tinymce" name="detalles">
                                                <?php echo $detalles_linio; ?>
                                            </textarea>    
                                        </div>
                                      </div>
                                     <br><br>
                                     
				                      
				                      
				                     
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
<script type="text/javascript">
	function pagoOnChange(sel) {
		if (sel.value=="1"){
		   divC = document.getElementById("cat_uno");
		   divC.style.display = "";

		   divA = document.getElementById("cat_dos");
		   divA.style.display = "none";

		   divM = document.getElementById("cat_tres");
		   divM.style.display = "none";  

		}else if (sel.value=="2") {
			   divC = document.getElementById("cat_uno");
		   divC.style.display="none";

		   divA = document.getElementById("cat_dos");
		   divA.style.display = "";

		   divM = document.getElementById("cat_tres");
		   divM.style.display = "none";

		}else if (sel.value=="3") {
			   divC = document.getElementById("cat_uno");
		   divC.style.display="none";

		   divA = document.getElementById("cat_dos");
		   divA.style.display = "none";

		   divM = document.getElementById("cat_tres");
		   divM.style.display = "";

		}else{
		   divC = document.getElementById("cat_uno");
		   divC.style.display="none";

		   divA = document.getElementById("cat_dos");
		   divA.style.display = "none";

		   divM = document.getElementById("cat_tres");
		   divM.style.display = "none";

		}
	}
	function cambioML(sel){
		if (sel.value=="MLM172337"){
		 	divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = "none"; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";


		}else if (sel.value=="MLM193880") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = "none"; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";

		}else if (sel.value=="MLM172360") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = ""; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = "none"; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";


		}else if (sel.value=="MLM172335") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = "none"; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";


		}else if (sel.value=="MLM172336") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = ""; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = "none"; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";


		}else if (sel.value=="MLM179203") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = "none"; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";

		}else if (sel.value=="MLM192034") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = "none"; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";


		}else if (sel.value=="MLM178755") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = ""; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = "none"; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";


		}else if (sel.value=="MLM178705") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "";

			divAa = document.getElementById("lib_para");
			divAa.style.display = ""; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = ""; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = "none"; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";


		}else if (sel.value=="MLM178708") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "";

			divK = document.getElementById("masc_func");
			divK.style.display = "";

			divL = document.getElementById("masc_aplic");
			divL.style.display = ""; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = "none"; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";


		}else if (sel.value=="MLM194745") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = ""; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = "none"; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";


		}else if (sel.value=="MLM29901") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = ""; 

			divAe = document.getElementById("duracion");
			divAe.style.display = "none"; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";


		}else if (sel.value=="MLM29907") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = "none"; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";


		}else if (sel.value=="MLM172338") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = ""; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = ""; 

			divAe = document.getElementById("duracion");
			divAe.style.display = ""; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";


		}else if (sel.value=="MLM29883") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = ""; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";


		}else if (sel.value=="MLM1271") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "";

			divU = document.getElementById("cat_base_con");
			divU.style.display = ""; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = "none"; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";


		}else if (sel.value=="MLM180964") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = ""; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = ""; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = "none"; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "";


		}else if (sel.value=="MLM194489") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = ""; 

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = "none"; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";

		}else if (sel.value=="MLM29900") {
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = ""; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";


		}else if (sel.value=="MLM29903") {
			
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = ""; 

			divAe = document.getElementById("duracion");
			divAe.style.display = ""; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";

		}else{
			divA = document.getElementById("cat_base_consistencia");
			divA.style.display = "none";

			divB = document.getElementById("cat_base_aca");
			divB.style.display = "none";

			divC = document.getElementById("cat_ilu_form");
			divC.style.display = "none"; 

			divD = document.getElementById("cat_rub_corre");
			divD.style.display = "none";

			divE = document.getElementById("cat_tex_corre");
			divE.style.display = "none";

			divF = document.getElementById("cat_aca_rubor");
			divF.style.display = "none"; 

			divG = document.getElementById("cat_desmaquillante");
			divG.style.display = "none";

			divH = document.getElementById("cat_tip_crema");
			divH.style.display = "none";

			divI = document.getElementById("cat_cons_crema");
			divI.style.display = "none"; 

			divJ = document.getElementById("cat_tip_piel");
			divJ.style.display = "none";

			divK = document.getElementById("masc_func");
			divK.style.display = "none";

			divL = document.getElementById("masc_aplic");
			divL.style.display = "none"; 

			divM = document.getElementById("masc_ingre");
			divM.style.display = "none";

			divN = document.getElementById("cat_cf_form");
			divN.style.display = "none";

			divO = document.getElementById("cat_del_ceja");
			divO.style.display = "none"; 

			divP = document.getElementById("cat_del_ojo");
			divP.style.display = "none";

			divQ = document.getElementById("cat_no_sombra");
			divQ.style.display = "none";

			divR = document.getElementById("cat_del_labio");
			divR.style.display = "none"; 

			divS = document.getElementById("cat_aca_labios");
			divS.style.display = "none";

			divT = document.getElementById("cat_tip_perfume");
			divT.style.display = "none";

			divU = document.getElementById("cat_base_con");
			divU.style.display = "none"; 

			divV = document.getElementById("cat_no_brocha");
			divV.style.display = "none"; 

			divX = document.getElementById("cat_pelo_brocha");
			divX.style.display = "none"; 

			divY = document.getElementById("form_limpiador");
			divY.style.display = "none";

			divZ = document.getElementById("p_hipo");
			divZ.style.display = "none";

			divAa = document.getElementById("lib_para");
			divAa.style.display = "none"; 

			divAb = document.getElementById("proct_solar");
			divAb.style.display = "none";

			divAc = document.getElementById("derma_tester");
			divAc.style.display = "none"; 

			divAd = document.getElementById("prueba_agua");
			divAd.style.display = "none"; 

			divAe = document.getElementById("duracion");
			divAe.style.display = "none"; 

			divAf = document.getElementById("cat_case");
			divAf.style.display = "none";

		}
		   
	}
</script>