<?php 
	if (isset($_GET['id_producto'])&& isset($_GET['action'])) {
		$id_producto = $_GET['id_producto'];

		$action = $_GET['action'];

		if ($action=="edita") {			
			
			include ("header.php");
			include("conexion.php");
			$sql = "select * from productos_betterware WHERE id_producto=".$id_producto;
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
            	$material_producto = $reg['material_producto'];
            	$caracteristica_producto = $reg['caracteristica_producto'];
            	$estilo_producto = $reg['estilo_producto'];
            	$piezas_producto = $reg['piezas_producto'];
            	$uso_producto = $reg['uso_producto'];

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
			                <h3>Productos Betterware</h3>
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
                                   echo '<a  href="conector_linio\post_better.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir a Linio</a>';
                                 } else{
                                    echo '<a  href="conector_linio\subir_imagen_better.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir Imagenes a Linio</a>';
                                    
                                 }
                                 // if ($ml_id==NULL) {
                                 //   echo '<a  href="conector_ml\conect.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir a Mercado Libre</a>';
                                 // } 
                                 ?>
			                    <div class="clearfix"></div>
			                  </div>
			                  <div class="x_content">
			                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="actualiza_producto_better.php" enctype="multipart/form-data">

			                      	<div class="form-group">
				                      	<center>
				                      		<?php echo "<img src='betterware/".$uno."' width='80' height='80' alt=''>"; ?>
				                      		<br>
				                      		<b>Selecciona imagen principal: </b>
		                                    <br>
		                                    <input button class="btn btn-primary waves-effect" name="uno" type="file" accept="image/*">
		                                </center>
		                                <center>
		                                <div class="col-md-6 col-sm-8 col-xs-8">
		                                    <?php echo "<img src='betterware/".$dos."' width='80' height='80' alt=''>"; ?>
		                                    <br>
		                                    <b>Selecciona imagen 2: </b>
		                                    <br>
		                                    <input button class="btn btn-primary waves-effect" name="dos" type="file" accept="image/*">                             
	                                	</div>
	                                    <div class="col-md-6 col-sm-8 col-xs-8">
	                                    	<?php echo "<img src='betterware/".$tres."' width='80' height='80' alt=''>"; ?>
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
				                          <input name="codigo_barras_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $codigo_barras_producto; ?>">
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
				                        	<textarea class="form-control col-md-7 col-xs-12" name="descripcion_producto" cols="30" rows="5" placeholder="Descripción del producto..."><?php echo $descripcion_producto; ?></textarea>
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Color del producto</label>
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
					                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Material principal</label>
					                      <div class="col-md-6 col-sm-6 col-xs-12">
					                        <select class="form-control" name="material_producto" required="required">
					                         	<?php 
					                          	switch ($material_producto) {
				                          		
					                          		case "Acero":
					                          			echo '<option value="Acero" selected>Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado">Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica">Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';

					                          			break;
					                          		
					                          		case "Acero Inoxidable":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable"selected>Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado">Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica">Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';
					                          			break;

					                          		case "Aglomerado":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado" selected>Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica">Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';
					                          			break;

					                          		case "Algodón":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado">Aglomerado</option>';
							                            echo '<option value="Algodón" selected>Algodón</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica">Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';
					                          			break;

					                          		case "Aluminio":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado" >Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio" selected>Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica">Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';
					                          			break;

					                          		case "Barro":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado" >Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio" >Aluminio</option>';
							                            echo '<option value="Barro" selected>Barro</option>';
							                            echo '<option value="Cerámica">Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';
					                          			break;


					                          		case "Cerámica":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado" >Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio" >Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica" selected>Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';
					                          			break;

					                          		case "Cristal":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado" >Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio" >Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica" >Cerámica</option>';
							                            echo '<option value="Cristal" selected>Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';
					                          			break;
					                          		case "Látex":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado" >Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio" >Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica" >Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex" selected>Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';				                          			
					                          			break;
					                          		case "Madera":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado" >Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio" >Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica" >Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera" selected>Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';
					                          			break;
					                          		case "Metal":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado" >Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio" >Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica" >Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal" selected>Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';
					                          			break;
					                          		case "Microfibra":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado" >Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio" >Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica" >Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra" selected>Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';
					                          			break;
					                          		case "Mármol":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado" >Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio" >Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica" >Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol" selected>Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';
					                          			break;
					                          		case "Plástico":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado" >Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio" >Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica" >Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico" selected>Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';
					                          			break;
					                          		case "Poliéster":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado" >Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio" >Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica" >Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster" selected>Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';
					                          			break;
					                          		case "Porcelana":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado" >Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio" >Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica" >Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana" selected>Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';
					                          			break;
					                          		case "Tacto Piel":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado" >Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio" >Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica" >Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel" selected>Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';
					                          			break;
					                          		case "Vidrio":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado" >Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio" >Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica" >Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio" selected>Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';
					                          			break;
					                          		case "Yute":
					                          			echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado" >Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio" >Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica" >Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute" selected>Yute</option>';
					                          			break;
					                          			
					                          		default:
					                          			echo '<option value="" selected>-Selecciona una opción-</option>';
							                            echo '<option value="Acero">Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero Inoxidable</option>';
							                            echo '<option value="Aglomerado">Aglomerado</option>';
							                            echo '<option value="Algodón">Algodón</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Barro">Barro</option>';
							                            echo '<option value="Cerámica">Cerámica</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Látex">Látex</option>';
							                            echo '<option value="Madera">Madera</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Microfibra">Microfibra</option>';
							                            echo '<option value="Mármol">Mármol</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Porcelana">Porcelana</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Vidrio">Vidrio</option>';
							                            echo '<option value="Yute">Yute</option>';
					                          			break;
				                          		}
					                           ?>                       
					                         	  
					                        </select>
					                        </div>
				                        </div>

				                        <div class="form-group">
					                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Caracteristicas del producto</label>
						                    <div class="col-md-6 col-sm-6 col-xs-12">
						                        <select class="form-control" name="caracteristica_producto">
						                         	<?php 
						                          	switch ($caracteristica_producto) {
						                          		
						                          		case "Ajustable":
						                          			echo '<option value="Ajustable" selected>Ajustable</option>';
								                            echo '<option value="Extensible">Extensible</option>';
								                            echo '<option value="Apilable">Apilable</option>';
								                            echo '<option value="Con ruedas">Con ruedas</option>';
								                            echo '<option value="Funda extraíble">Funda extraíble</option>';
								                            echo '<option value="Plegable">Plegable</option>';
								                            echo '<option value="Regulable">Regulable</option>';
								                            echo '<option value="Sensible al Tacto">Sensible al Tacto</option>';
								                            echo '<option value="Sujeto en la pared">Sujeto en la pared</option>';
						                          			break;
						                          		
						                          		case "Extensible":
						                          			echo '<option value="Ajustable" >Ajustable</option>';
								                            echo '<option value="Extensible"selected>Extensible</option>';
								                            echo '<option value="Apilable">Apilable</option>';
								                            echo '<option value="Con ruedas">Con ruedas</option>';
								                            echo '<option value="Funda extraíble">Funda extraíble</option>';
								                            echo '<option value="Plegable">Plegable</option>';
								                            echo '<option value="Regulable">Regulable</option>';
								                            echo '<option value="Sensible al Tacto">Sensible al Tacto</option>';
								                            echo '<option value="Sujeto en la pared">Sujeto en la pared</option>';						                            
						                          			break;

						                          		case "Apilable":
						                          			echo '<option value="Ajustable" >Ajustable</option>';
								                            echo '<option value="Extensible">Extensible</option>';
								                            echo '<option value="Apilable" selected>Apilable</option>';
								                            echo '<option value="Con ruedas">Con ruedas</option>';
								                            echo '<option value="Funda extraíble">Funda extraíble</option>';
								                            echo '<option value="Plegable">Plegable</option>';
								                            echo '<option value="Regulable">Regulable</option>';
								                            echo '<option value="Sensible al Tacto">Sensible al Tacto</option>';
								                            echo '<option value="Sujeto en la pared">Sujeto en la pared</option>';						                            
						                          			break;

						                          		case "Con ruedas":
						                          			echo '<option value="Ajustable" >Ajustable</option>';
								                            echo '<option value="Extensible">Extensible</option>';
								                            echo '<option value="Apilable">Apilable</option>';
								                            echo '<option value="Con ruedas" selected>Con ruedas</option>';
								                            echo '<option value="Funda extraíble">Funda extraíble</option>';
								                            echo '<option value="Plegable">Plegable</option>';
								                            echo '<option value="Regulable">Regulable</option>';
								                            echo '<option value="Sensible al Tacto">Sensible al Tacto</option>';
								                            echo '<option value="Sujeto en la pared">Sujeto en la pared</option>';						                            
						                          			break;

						                          		case "Funda extraíble":
						                          			echo '<option value="Ajustable" >Ajustable</option>';
								                            echo '<option value="Extensible">Extensible</option>';
								                            echo '<option value="Apilable" >Apilable</option>';
								                            echo '<option value="Con ruedas">Con ruedas</option>';
								                            echo '<option value="Funda extraíble" selected>Funda extraíble</option>';
								                            echo '<option value="Plegable">Plegable</option>';
								                            echo '<option value="Regulable">Regulable</option>';
								                            echo '<option value="Sensible al Tacto">Sensible al Tacto</option>';
								                            echo '<option value="Sujeto en la pared">Sujeto en la pared</option>';						                            
						                          			break;

						                          		case "Plegable":
						                          			echo '<option value="Ajustable" >Ajustable</option>';
								                            echo '<option value="Extensible">Extensible</option>';
								                            echo '<option value="Apilable" >Apilable</option>';
								                            echo '<option value="Con ruedas">Con ruedas</option>';
								                            echo '<option value="Funda extraíble" >Funda extraíble</option>';
								                            echo '<option value="Plegable" selected>Plegable</option>';
								                            echo '<option value="Regulable">Regulable</option>';
								                            echo '<option value="Sensible al Tacto">Sensible al Tacto</option>';
								                            echo '<option value="Sujeto en la pared">Sujeto en la pared</option>';						                            
						                          			break;


						                          		case "Regulable":
						                          			echo '<option value="Ajustable" >Ajustable</option>';
								                            echo '<option value="Extensible">Extensible</option>';
								                            echo '<option value="Apilable" >Apilable</option>';
								                            echo '<option value="Con ruedas">Con ruedas</option>';
								                            echo '<option value="Funda extraíble" >Funda extraíble</option>';
								                            echo '<option value="Plegable">Plegable</option>';
								                            echo '<option value="Regulable" selected>Regulable</option>';
								                            echo '<option value="Sensible al Tacto">Sensible al Tacto</option>';
								                            echo '<option value="Sujeto en la pared">Sujeto en la pared</option>';						                            
						                          			break;

						                          		case "Sensible al Tacto":
						                          			echo '<option value="Ajustable" >Ajustable</option>';
								                            echo '<option value="Extensible">Extensible</option>';
								                            echo '<option value="Apilable" >Apilable</option>';
								                            echo '<option value="Con ruedas">Con ruedas</option>';
								                            echo '<option value="Funda extraíble" >Funda extraíble</option>';
								                            echo '<option value="Plegable">Plegable</option>';
								                            echo '<option value="Regulable" >Regulable</option>';
								                            echo '<option value="Sensible al Tacto" selected>Sensible al Tacto</option>';
								                            echo '<option value="Sujeto en la pared">Sujeto en la pared</option>';						                            
						                          			break;
						                          			
						                          		case "Sujeto en la pared":
						                          			echo '<option value="Ajustable" >Ajustable</option>';
								                            echo '<option value="Extensible">Extensible</option>';
								                            echo '<option value="Apilable" >Apilable</option>';
								                            echo '<option value="Con ruedas">Con ruedas</option>';
								                            echo '<option value="Funda extraíble" >Funda extraíble</option>';
								                            echo '<option value="Plegable">Plegable</option>';
								                            echo '<option value="Regulable" >Regulable</option>';
								                            echo '<option value="Sensible al Tacto">Sensible al Tacto</option>';
								                            echo '<option value="Sujeto en la pared" selected>Sujeto en la pared</option>';				                            				                          			
						                          			break;
						                          		

						                          		default:
						                          			echo '<option value="" selected>-Selecciona una opción-</option>';
								                            echo '<option value="Ajustable">Ajustable</option>';
								                            echo '<option value="Extensible">Extensible</option>';
								                            echo '<option value="Apilable">Apilable</option>';
								                            echo '<option value="Con ruedas">Con ruedas</option>';
								                            echo '<option value="Funda extraíble">Funda extraíble</option>';
								                            echo '<option value="Plegable">Plegable</option>';
								                            echo '<option value="Regulable">Regulable</option>';
								                            echo '<option value="Sensible al Tacto">Sensible al Tacto</option>';
								                            echo '<option value="Sujeto en la pared">Sujeto en la pared</option>';
								                            
						                          			break;

						                          	}
						                           ?>                       
						                         	  
						                        </select>
					                        </div>
					                    </div>

					                    <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Estilo del producto</label>
				                      <div class="col-md-6 col-sm-6 col-xs-12">
				                        <select class="form-control" name="estilo_producto" required="required">
				                         	<?php 
				                          		switch ($estilo_producto) {
				                          		
				                          		case "Antiguo":
				                          			echo '<option value="Antiguo" selected>Antiguo</option>';
						                            echo '<option value="Campestre">Campestre</option>';
						                            echo '<option value="Coloquial">Coloquial</option>';
						                            echo '<option value="Contemporáneo">Contemporáneo</option>';
						                            echo '<option value="Glamour">Glamour</option>';
						                            echo '<option value="Moderno">Moderno</option>';
						                            echo '<option value="Retro">Retro</option>';
						                            echo '<option value="Rústico">Rústico</option>';
						                            echo '<option value="Tradicional">Tradicional</option>';
						                            echo '<option value="Vintage">Vintage</option>';

				                          			break;
				                          		
				                          		case "Campestre":
				                          			echo '<option value="Antiguo" >Antiguo</option>';
						                            echo '<option value="Campestre"selected>Campestre</option>';
						                            echo '<option value="Coloquial">Coloquial</option>';
						                            echo '<option value="Contemporáneo">Contemporáneo</option>';
						                            echo '<option value="Glamour">Glamour</option>';
						                            echo '<option value="Moderno">Moderno</option>';
						                            echo '<option value="Retro">Retro</option>';
						                            echo '<option value="Rústico">Rústico</option>';
						                            echo '<option value="Tradicional">Tradicional</option>';
						                            echo '<option value="Vintage">Vintage</option>';
				                          			break;

				                          		case "Coloquial":
				                          			echo '<option value="Antiguo" >Antiguo</option>';
						                            echo '<option value="Campestre">Campestre</option>';
						                            echo '<option value="Coloquial" selected>Coloquial</option>';
						                            echo '<option value="Contemporáneo">Contemporáneo</option>';
						                            echo '<option value="Glamour">Glamour</option>';
						                            echo '<option value="Moderno">Moderno</option>';
						                            echo '<option value="Retro">Retro</option>';
						                            echo '<option value="Rústico">Rústico</option>';
						                            echo '<option value="Tradicional">Tradicional</option>';
						                            echo '<option value="Vintage">Vintage</option>';
				                          			break;

				                          		case "Contemporáneo":
				                          			echo '<option value="Antiguo" >Antiguo</option>';
						                            echo '<option value="Campestre">Campestre</option>';
						                            echo '<option value="Coloquial">Coloquial</option>';
						                            echo '<option value="Contemporáneo" selected>Contemporáneo</option>';
						                            echo '<option value="Glamour">Glamour</option>';
						                            echo '<option value="Moderno">Moderno</option>';
						                            echo '<option value="Retro">Retro</option>';
						                            echo '<option value="Rústico">Rústico</option>';
						                            echo '<option value="Tradicional">Tradicional</option>';
						                            echo '<option value="Vintage">Vintage</option>';
				                          			break;

				                          		case "Glamour":
				                          			echo '<option value="Antiguo" >Antiguo</option>';
						                            echo '<option value="Campestre">Campestre</option>';
						                            echo '<option value="Coloquial" >Coloquial</option>';
						                            echo '<option value="Contemporáneo">Contemporáneo</option>';
						                            echo '<option value="Glamour" selected>Glamour</option>';
						                            echo '<option value="Moderno">Moderno</option>';
						                            echo '<option value="Retro">Retro</option>';
						                            echo '<option value="Rústico">Rústico</option>';
						                            echo '<option value="Tradicional">Tradicional</option>';
						                            echo '<option value="Vintage">Vintage</option>';
				                          			break;

				                          		case "Moderno":
				                          			echo '<option value="Antiguo" >Antiguo</option>';
						                            echo '<option value="Campestre">Campestre</option>';
						                            echo '<option value="Coloquial" >Coloquial</option>';
						                            echo '<option value="Contemporáneo">Contemporáneo</option>';
						                            echo '<option value="Glamour" >Glamour</option>';
						                            echo '<option value="Moderno" selected>Moderno</option>';
						                            echo '<option value="Retro">Retro</option>';
						                            echo '<option value="Rústico">Rústico</option>';
						                            echo '<option value="Tradicional">Tradicional</option>';
						                            echo '<option value="Vintage">Vintage</option>';
				                          			break;


				                          		case "Retro":
				                          			echo '<option value="Antiguo" >Antiguo</option>';
						                            echo '<option value="Campestre">Campestre</option>';
						                            echo '<option value="Coloquial" >Coloquial</option>';
						                            echo '<option value="Contemporáneo">Contemporáneo</option>';
						                            echo '<option value="Glamour" >Glamour</option>';
						                            echo '<option value="Moderno">Moderno</option>';
						                            echo '<option value="Retro" selected>Retro</option>';
						                            echo '<option value="Rústico">Rústico</option>';
						                            echo '<option value="Tradicional">Tradicional</option>';
						                            echo '<option value="Vintage">Vintage</option>';
				                          			break;

				                          		case "Rústico":
				                          			echo '<option value="Antiguo" >Antiguo</option>';
						                            echo '<option value="Campestre">Campestre</option>';
						                            echo '<option value="Coloquial" >Coloquial</option>';
						                            echo '<option value="Contemporáneo">Contemporáneo</option>';
						                            echo '<option value="Glamour" >Glamour</option>';
						                            echo '<option value="Moderno">Moderno</option>';
						                            echo '<option value="Retro" >Retro</option>';
						                            echo '<option value="Rústico" selected>Rústico</option>';
						                            echo '<option value="Tradicional">Tradicional</option>';
						                            echo '<option value="Vintage">Vintage</option>';
				                          			break;
				                          			
				                          		case "Tradicional":
				                          			echo '<option value="Antiguo" >Antiguo</option>';
						                            echo '<option value="Campestre">Campestre</option>';
						                            echo '<option value="Coloquial" >Coloquial</option>';
						                            echo '<option value="Contemporáneo">Contemporáneo</option>';
						                            echo '<option value="Glamour" >Glamour</option>';
						                            echo '<option value="Moderno">Moderno</option>';
						                            echo '<option value="Retro" >Retro</option>';
						                            echo '<option value="Rústico">Rústico</option>';
						                            echo '<option value="Tradicional" selected>Tradicional</option>';
						                            echo '<option value="Vintage">Vintage</option>';				                          			
				                          			break;

				                          		case "Vintage":
				                          			echo '<option value="Antiguo" >Antiguo</option>';
						                            echo '<option value="Campestre">Campestre</option>';
						                            echo '<option value="Coloquial" >Coloquial</option>';
						                            echo '<option value="Contemporáneo">Contemporáneo</option>';
						                            echo '<option value="Glamour" >Glamour</option>';
						                            echo '<option value="Moderno">Moderno</option>';
						                            echo '<option value="Retro" >Retro</option>';
						                            echo '<option value="Rústico">Rústico</option>';
						                            echo '<option value="Tradicional">Tradicional</option>';
						                            echo '<option value="Vintage" selected>Vintage</option>';
				                          			break;
				                          		
				                          			
				                          		default:
				                          			echo '<option value="" selected>-Selecciona una opción-</option>';
						                            echo '<option value="Antiguo">Antiguo</option>';
						                            echo '<option value="Campestre">Campestre</option>';
						                            echo '<option value="Coloquial">Coloquial</option>';
						                            echo '<option value="Contemporáneo">Contemporáneo</option>';
						                            echo '<option value="Glamour">Glamour</option>';
						                            echo '<option value="Moderno">Moderno</option>';
						                            echo '<option value="Retro">Retro</option>';
						                            echo '<option value="Rústico">Rústico</option>';
						                            echo '<option value="Tradicional">Tradicional</option>';
						                            echo '<option value="Vintage">Vintage</option>';
				                          			break;

				                          	}
				                           ?>                       
				                         	  
				                        </select>
				                        </div>
				                       </div>

				                       <div class="form-group">
				                        <label for="piezas_producto" class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad de piezas que contiene <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="piezas_producto" class="form-control col-md-7 col-xs-12" placeholder="Ejemplo: 4, 5 (escribir sólo número)" type="number"  required="required" value="<?php echo $piezas_producto; ?>" >
				                        </div>
				                      </div>

				                      	<div class="form-group">
					                        <label for="uso_producto" class="control-label col-md-3 col-sm-3 col-xs-12">Área de Uso</label>
					                      <div class="col-md-6 col-sm-6 col-xs-12">
					                        <select class="form-control" name="uso_producto" required="required">
					                         	<?php 
					                          	switch ($uso_producto) {
				                          		
					                          		case "Baño":
					                          			echo '<option value="Baño" selected>Baño</option>';
							                            echo '<option value="Cocina">Cocina</option>';
							                            echo '<option value="Comedor">Comedor</option>';
							                            echo '<option value="Enfermería">Enfermería</option>';
							                            echo '<option value="Entrada y Corredor">Entrada y Corredor</option>';
							                            echo '<option value="Estudio">Estudio</option>';
							                            echo '<option value="Exterior">Exterior</option>';
							                            echo '<option value="Guardería">Guardería</option>';
							                            echo '<option value="Habitación">Habitación</option>';
							                            echo '<option value="Cuarto de los Niños">Cuarto de los Niños</option>';
							                            echo '<option value="Jardín">Jardín</option>';
							                            echo '<option value="Playa">Playa</option>';
							                            echo '<option value="Sala">Sala</option>';
							                            echo '<option value="Otros">Otros</option>';

					                          			break;
					                          		
					                          		case "Cocina":
					                          			echo '<option value="Baño" >Baño</option>';
							                            echo '<option value="Cocina"selected>Cocina</option>';
							                            echo '<option value="Comedor">Comedor</option>';
							                            echo '<option value="Enfermería">Enfermería</option>';
							                            echo '<option value="Entrada y Corredor">Entrada y Corredor</option>';
							                            echo '<option value="Estudio">Estudio</option>';
							                            echo '<option value="Exterior">Exterior</option>';
							                            echo '<option value="Guardería">Guardería</option>';
							                            echo '<option value="Habitación">Habitación</option>';
							                            echo '<option value="Cuarto de los Niños">Cuarto de los Niños</option>';
							                            echo '<option value="Jardín">Jardín</option>';
							                            echo '<option value="Playa">Playa</option>';
							                            echo '<option value="Sala">Sala</option>';
							                            echo '<option value="Otros">Otros</option>';
					                          			break;

					                          		case "Comedor":
					                          			echo '<option value="Baño" >Baño</option>';
							                            echo '<option value="Cocina">Cocina</option>';
							                            echo '<option value="Comedor" selected>Comedor</option>';
							                            echo '<option value="Enfermería">Enfermería</option>';
							                            echo '<option value="Entrada y Corredor">Entrada y Corredor</option>';
							                            echo '<option value="Estudio">Estudio</option>';
							                            echo '<option value="Exterior">Exterior</option>';
							                            echo '<option value="Guardería">Guardería</option>';
							                            echo '<option value="Habitación">Habitación</option>';
							                            echo '<option value="Cuarto de los Niños">Cuarto de los Niños</option>';
							                            echo '<option value="Jardín">Jardín</option>';
							                            echo '<option value="Playa">Playa</option>';
							                            echo '<option value="Sala">Sala</option>';
							                            echo '<option value="Otros">Otros</option>';
					                          			break;

					                          		case "Enfermería":
					                          			echo '<option value="Baño" >Baño</option>';
							                            echo '<option value="Cocina">Cocina</option>';
							                            echo '<option value="Comedor">Comedor</option>';
							                            echo '<option value="Enfermería" selected>Enfermería</option>';
							                            echo '<option value="Entrada y Corredor">Entrada y Corredor</option>';
							                            echo '<option value="Estudio">Estudio</option>';
							                            echo '<option value="Exterior">Exterior</option>';
							                            echo '<option value="Guardería">Guardería</option>';
							                            echo '<option value="Habitación">Habitación</option>';
							                            echo '<option value="Cuarto de los Niños">Cuarto de los Niños</option>';
							                            echo '<option value="Jardín">Jardín</option>';
							                            echo '<option value="Playa">Playa</option>';
							                            echo '<option value="Sala">Sala</option>';
							                            echo '<option value="Otros">Otros</option>';
					                          			break;

					                          		case "Entrada y Corredor":
					                          			echo '<option value="Baño" >Baño</option>';
							                            echo '<option value="Cocina">Cocina</option>';
							                            echo '<option value="Comedor" >Comedor</option>';
							                            echo '<option value="Enfermería">Enfermería</option>';
							                            echo '<option value="Entrada y Corredor" selected>Entrada y Corredor</option>';
							                            echo '<option value="Estudio">Estudio</option>';
							                            echo '<option value="Exterior">Exterior</option>';
							                            echo '<option value="Guardería">Guardería</option>';
							                            echo '<option value="Habitación">Habitación</option>';
							                            echo '<option value="Cuarto de los Niños">Cuarto de los Niños</option>';
							                            echo '<option value="Jardín">Jardín</option>';
							                            echo '<option value="Playa">Playa</option>';
							                            echo '<option value="Sala">Sala</option>';
							                            echo '<option value="Otros">Otros</option>';
					                          			break;

					                          		case "Estudio":
					                          			echo '<option value="Baño" >Baño</option>';
							                            echo '<option value="Cocina">Cocina</option>';
							                            echo '<option value="Comedor" >Comedor</option>';
							                            echo '<option value="Enfermería">Enfermería</option>';
							                            echo '<option value="Entrada y Corredor" >Entrada y Corredor</option>';
							                            echo '<option value="Estudio" selected>Estudio</option>';
							                            echo '<option value="Exterior">Exterior</option>';
							                            echo '<option value="Guardería">Guardería</option>';
							                            echo '<option value="Habitación">Habitación</option>';
							                            echo '<option value="Cuarto de los Niños">Cuarto de los Niños</option>';
							                            echo '<option value="Jardín">Jardín</option>';
							                            echo '<option value="Playa">Playa</option>';
							                            echo '<option value="Sala">Sala</option>';
							                            echo '<option value="Otros">Otros</option>';
					                          			break;


					                          		case "Exterior":
					                          			echo '<option value="Baño" >Baño</option>';
							                            echo '<option value="Cocina">Cocina</option>';
							                            echo '<option value="Comedor" >Comedor</option>';
							                            echo '<option value="Enfermería">Enfermería</option>';
							                            echo '<option value="Entrada y Corredor" >Entrada y Corredor</option>';
							                            echo '<option value="Estudio">Estudio</option>';
							                            echo '<option value="Exterior" selected>Exterior</option>';
							                            echo '<option value="Guardería">Guardería</option>';
							                            echo '<option value="Habitación">Habitación</option>';
							                            echo '<option value="Cuarto de los Niños">Cuarto de los Niños</option>';
							                            echo '<option value="Jardín">Jardín</option>';
							                            echo '<option value="Playa">Playa</option>';
							                            echo '<option value="Sala">Sala</option>';
							                            echo '<option value="Otros">Otros</option>';
					                          			break;

					                          		case "Guardería":
					                          			echo '<option value="Baño" >Baño</option>';
							                            echo '<option value="Cocina">Cocina</option>';
							                            echo '<option value="Comedor" >Comedor</option>';
							                            echo '<option value="Enfermería">Enfermería</option>';
							                            echo '<option value="Entrada y Corredor" >Entrada y Corredor</option>';
							                            echo '<option value="Estudio">Estudio</option>';
							                            echo '<option value="Exterior" >Exterior</option>';
							                            echo '<option value="Guardería" selected>Guardería</option>';
							                            echo '<option value="Habitación">Habitación</option>';
							                            echo '<option value="Cuarto de los Niños">Cuarto de los Niños</option>';
							                            echo '<option value="Jardín">Jardín</option>';
							                            echo '<option value="Playa">Playa</option>';
							                            echo '<option value="Sala">Sala</option>';
							                            echo '<option value="Otros">Otros</option>';
					                          			break;
					                          		case "Habitación":
					                          			echo '<option value="Baño" >Baño</option>';
							                            echo '<option value="Cocina">Cocina</option>';
							                            echo '<option value="Comedor" >Comedor</option>';
							                            echo '<option value="Enfermería">Enfermería</option>';
							                            echo '<option value="Entrada y Corredor" >Entrada y Corredor</option>';
							                            echo '<option value="Estudio">Estudio</option>';
							                            echo '<option value="Exterior" >Exterior</option>';
							                            echo '<option value="Guardería">Guardería</option>';
							                            echo '<option value="Habitación" selected>Habitación</option>';
							                            echo '<option value="Cuarto de los Niños">Cuarto de los Niños</option>';
							                            echo '<option value="Jardín">Jardín</option>';
							                            echo '<option value="Playa">Playa</option>';
							                            echo '<option value="Sala">Sala</option>';
							                            echo '<option value="Otros">Otros</option>';				                          			
					                          			break;
					                          		case "Cuarto de los Niños":
					                          			echo '<option value="Baño" >Baño</option>';
							                            echo '<option value="Cocina">Cocina</option>';
							                            echo '<option value="Comedor" >Comedor</option>';
							                            echo '<option value="Enfermería">Enfermería</option>';
							                            echo '<option value="Entrada y Corredor" >Entrada y Corredor</option>';
							                            echo '<option value="Estudio">Estudio</option>';
							                            echo '<option value="Exterior" >Exterior</option>';
							                            echo '<option value="Guardería">Guardería</option>';
							                            echo '<option value="Habitación">Habitación</option>';
							                            echo '<option value="Cuarto de los Niños" selected>Cuarto de los Niños</option>';
							                            echo '<option value="Jardín">Jardín</option>';
							                            echo '<option value="Playa">Playa</option>';
							                            echo '<option value="Sala">Sala</option>';
							                            echo '<option value="Otros">Otros</option>';
					                          			break;
					                          		case "Jardín":
					                          			echo '<option value="Baño" >Baño</option>';
							                            echo '<option value="Cocina">Cocina</option>';
							                            echo '<option value="Comedor" >Comedor</option>';
							                            echo '<option value="Enfermería">Enfermería</option>';
							                            echo '<option value="Entrada y Corredor" >Entrada y Corredor</option>';
							                            echo '<option value="Estudio">Estudio</option>';
							                            echo '<option value="Exterior" >Exterior</option>';
							                            echo '<option value="Guardería">Guardería</option>';
							                            echo '<option value="Habitación">Habitación</option>';
							                            echo '<option value="Cuarto de los Niños">Cuarto de los Niños</option>';
							                            echo '<option value="Jardín" selected>Jardín</option>';
							                            echo '<option value="Playa">Playa</option>';
							                            echo '<option value="Sala">Sala</option>';
							                            echo '<option value="Otros">Otros</option>';
					                          			break;
					                          		case "Playa":
					                          			echo '<option value="Baño" >Baño</option>';
							                            echo '<option value="Cocina">Cocina</option>';
							                            echo '<option value="Comedor" >Comedor</option>';
							                            echo '<option value="Enfermería">Enfermería</option>';
							                            echo '<option value="Entrada y Corredor" >Entrada y Corredor</option>';
							                            echo '<option value="Estudio">Estudio</option>';
							                            echo '<option value="Exterior" >Exterior</option>';
							                            echo '<option value="Guardería">Guardería</option>';
							                            echo '<option value="Habitación">Habitación</option>';
							                            echo '<option value="Cuarto de los Niños">Cuarto de los Niños</option>';
							                            echo '<option value="Jardín">Jardín</option>';
							                            echo '<option value="Playa" selected>Playa</option>';
							                            echo '<option value="Sala">Sala</option>';
							                            echo '<option value="Otros">Otros</option>';
					                          			break;
					                          		case "Sala":
					                          			echo '<option value="Baño" >Baño</option>';
							                            echo '<option value="Cocina">Cocina</option>';
							                            echo '<option value="Comedor" >Comedor</option>';
							                            echo '<option value="Enfermería">Enfermería</option>';
							                            echo '<option value="Entrada y Corredor" >Entrada y Corredor</option>';
							                            echo '<option value="Estudio">Estudio</option>';
							                            echo '<option value="Exterior" >Exterior</option>';
							                            echo '<option value="Guardería">Guardería</option>';
							                            echo '<option value="Habitación">Habitación</option>';
							                            echo '<option value="Cuarto de los Niños">Cuarto de los Niños</option>';
							                            echo '<option value="Jardín">Jardín</option>';
							                            echo '<option value="Playa">Playa</option>';
							                            echo '<option value="Sala" selected>Sala</option>';
							                            echo '<option value="Otros">Otros</option>';
					                          			break;
					                          			
					                          		case "Otros": 
					                          			echo '<option value="Baño" >Baño</option>';
							                            echo '<option value="Cocina">Cocina</option>';
							                            echo '<option value="Comedor" >Comedor</option>';
							                            echo '<option value="Enfermería">Enfermería</option>';
							                            echo '<option value="Entrada y Corredor" >Entrada y Corredor</option>';
							                            echo '<option value="Estudio">Estudio</option>';
							                            echo '<option value="Exterior" >Exterior</option>';
							                            echo '<option value="Guardería">Guardería</option>';
							                            echo '<option value="Habitación">Habitación</option>';
							                            echo '<option value="Cuarto de los Niños">Cuarto de los Niños</option>';
							                            echo '<option value="Jardín">Jardín</option>';
							                            echo '<option value="Playa">Playa</option>';
							                            echo '<option value="Sala">Sala</option>';
							                            echo '<option value="Otros" selected>Otros</option>';
					                          			break;
					                          			
					                          		default:
					                          			echo '<option value="" selected>-Selecciona una opción-</option>';
							                            echo '<option value="Baño">Baño</option>';
							                            echo '<option value="Cocina">Cocina</option>';
							                            echo '<option value="Comedor">Comedor</option>';
							                            echo '<option value="Enfermería">Enfermería</option>';
							                            echo '<option value="Entrada y Corredor">Entrada y Corredor</option>';
							                            echo '<option value="Estudio">Estudio</option>';
							                            echo '<option value="Exterior">Exterior</option>';
							                            echo '<option value="Guardería">Guardería</option>';
							                            echo '<option value="Habitación">Habitación</option>';
							                            echo '<option value="Cuarto de los Niños">Cuarto de los Niños</option>';
							                            echo '<option value="Jardín">Jardín</option>';
							                            echo '<option value="Playa">Playa</option>';
							                            echo '<option value="Sala">Sala</option>';
							                            echo '<option value="Otros">Otros</option>';
					                          			break;
				                          		}
					                           ?>                       
					                         	  
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
				                      <div class="form-group">
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
