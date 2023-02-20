<?php 
	if (isset($_GET['id_producto'])&& isset($_GET['action'])) {
		$id_producto = $_GET['id_producto'];

		$action = $_GET['action'];

		if ($action=="edita") {			
			
			include ("header.php");
			include("conexion.php");
			$sql = "select * from productos_bike WHERE id_producto=".$id_producto;
            $requi = mysqli_query($conexion,$sql);
            while ($reg=mysqli_fetch_array($requi)) {
            	
            	$id_producto = $reg['id_producto'];
            	$nombre_producto = $reg['nombre_producto'];
            	$rodada_producto = $reg['rodada_producto'];
            	$color_producto = $reg['color_producto'];
            	$precio_compra = $reg['precio_compra'];
            	$precio_publico = $reg['precio_publico'];
            	$precio_publico_desc = $reg['precio_publico_desc'];
            	$inventario_producto = $reg['inventario_producto'];
            	$codigo_barras_producto = $reg['cod_barras_bike'];
            	$co_generico = $reg['co_generico'];
            	$co_sat = $reg['co_sat'];
            	$tipo_bike = $reg['tipo_bike'];
            	$modelo_bike = $reg['modelo_bike'];
				$marca_bike = $reg['marca_bike'];
				$material_bike = $reg['material_bike'];
				$edad_bike = $reg['edad_bike'];
            	$uno = $reg['imagen_uno'];
            	$dos = $reg['imagen_dos'];
            	$tres = $reg['imagen_tres'];            	
				$estilo_bike = $reg['estilo_bike'];
				$tipo_accesorio = $reg['tipo_accesorio'];
				$tipo_triciclo = $reg['tipo_triciclo'];
				$genero_bike = $reg['genero_bike'];
				$velocidades_bike = $reg['velocidades_bike'];
				$freno_delantero = $reg['freno_delantero'];
				$freno_trasero = $reg['freno_trasero'];				
				$montaje_bike = $reg['montaje_bike'];
				$pegable_bike = $reg['pegable_bike'];
				$personaje_bike = $reg['personaje_bike'];
				$ruedas = $reg['ruedas'];

	            $descripcion_bike = $reg['descripcion_bike'];
	            $detalles_bike = $reg['detalles_bike'];
	            $altura=$reg['altura'];
	            $anchura=$reg['anchura'];
	            $longitud=$reg['longitud'];
	            $peso=$reg['peso'];
	            $cod_linio=$reg['cod_linio'];
	            $sub_linio=$reg['sub_linio'];
	            $ml_id=$reg['ml_id'];
	            $ml_link=$reg['ml_link'];
        	}
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
			                    <h2>Editar producto</h2>
			                    <!-- <a  href="modifica_web_bike.php?id_producto=<?php echo $id_producto; ?>" style="float: right;" class="btn btn-warning">Web</a> -->
			                    <?php 
                                if ($sub_linio==NULL) {
                                   echo '<a  href="conector_linio\funciones-post.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir a Linio</a>';
                                 } else{
                                    echo '<a  href="conector_linio\subir_imagen.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir Imagenes a Linio</a>';
                                    echo '<a  href="conector_linio\put_bike.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Actualizar Linio</a>';
                                    
                                 }
                                  if ($ml_id==NULL) {
                                    echo '<a  href="conector_ml\conect.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir a Mercado Libre</a>';
                                  }else{
									echo '<a  href="conector_ml\desc_bike.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir Descripcion Ml</a>';
								  }
								  echo '<a  href="conector_ml\actualiza_bike.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Actulizar  Ml</a>';
                                 ?>
			                    <div class="clearfix"></div>
			                  </div>
			                  <div class="x_content">
			                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="actualiza_producto_bike.php" enctype="multipart/form-data">
			                      	<div class="form-group">
				                      	<center>
				                      		<?php echo "<img src='bikes/".$uno."' width='80' height='80' alt=''>"; ?>
				                      		<br>
				                      		<b>Selecciona imagen principal: </b>
		                                    <br>
		                                    <input button class="btn btn-primary waves-effect" id="browse" name="uno" type="file" accept="image/*" multiple onchange="readImage()">
		                                    <div id="preview"></div>
		                                </center>
		                                <center>
		                                <div class="col-md-6 col-sm-8 col-xs-8">
		                                    <?php echo "<img src='bikes/".$dos."' width='80' height='80' alt=''>"; ?>
		                                    <br>
		                                    <b>Selecciona imagen 2: </b>
		                                    <br>
		                                    <input button class="btn btn-primary waves-effect" id="browseDos" name="dos" type="file" accept="image/*" multiple onchange="readImageDos()">  
		                                    <div id="previewDos"></div>                           
	                                	</div>
	                                    <div class="col-md-6 col-sm-8 col-xs-8">
	                                    	<?php echo "<img src='bikes/".$tres."' width='80' height='80' alt=''>"; ?>
	                                    	<br>
		                                    <b>Selecciona imagen 3: </b>
		                                    <br>
		                                    <input button class="btn btn-primary waves-effect" id="browseTres" name="tres" type="file" accept="image/*" multiple onchange="readImageTres()">
		                                    <div id="previewTres"></div>
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
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Rodada</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="rodada_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $rodada_producto; ?>">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Color</label>
				                        <!-- <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="color_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $color_producto; ?>" placeholder="Solo un color... Ejemplo: AZUL">
				                        </div> -->
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
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio compra del producto<span class="required">*  $</span>
				                        </label> 
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input type="number" onkeyup='precios();' id="precio_compra" name="precio_compra" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $precio_compra; ?>" disabled>
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio público del producto<span class="required">*  $</span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input type="text" id="precio_publico" name="precio_publico" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $precio_publico; ?>" disabled>
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio público con descuento<span class="required">*  $</span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input type="text" id="precio_publico_desc" name="precio_publico_desc" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $precio_publico_desc; ?>" disabled>
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Inventario inicial <span class="required">*  </span></label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="inventario_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" required="required" value="<?php echo $inventario_producto; ?>" disabled>
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código de barras</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="codigo_barras_producto" value="<?php echo $codigo_barras_producto; ?>" class="form-control col-md-7 col-xs-12" type="text">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código generico</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="co_generico" value="<?php echo $co_generico; ?>" class="form-control col-md-7 col-xs-12" type="text">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código SAT</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="co_generico" value="<?php echo $co_sat; ?>" class="form-control col-md-7 col-xs-12" type="text">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_bike">Tipo de producto<span class="required">   *  </span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                         <select class="form-control" name="tipo_bike" onchange="pagoOnChange(this)">
				                          <?php 
				                          	switch ($tipo_bike) {
				                          		
				                          		case 0:
				                          		?>
				                          			<option value="0" selected>Bicicleta</option>
						                            <option value="2">Triciclo</option>
						                            <option value="3">Scooter</option>
						                            <option value="1">Accesorio</option>
				                          		<?php
				                          			break;
				                          		
				                          		case 1:
				                          		?>
				                          			<option value="0">Bicicleta</option>
				                          			<option value="2">Triciclo</option>
						                            <option value="3">Scooter</option>
						                            <option value="1" selected>Accesorio</option>
						                            <?php
				                          			break;

				                          		case 2:
				                          		?>
				                          			<option value="0">Bicicleta</option>
				                          			<option value="2" selected>Triciclo</option>
						                            <option value="3">Scooter</option>
						                            <option value="1">Accesorio</option>
						                            <?php
				                          			break;

				                          		case 3:
				                          		?>
				                          			<option value="0">Bicicleta</option>
				                          			<option value="2">Triciclo</option>
						                            <option value="3" selected>Scooter</option>
						                            <option value="1">Accesorio</option>
						                            <?php
				                          			break;

				                          		default:
				                          		?>
				                          			<option value="0">Bicicleta</option>
						                            <option value="2">Triciclo</option>
						                            <option value="3">Scooter</option>
						                            <option value="1">Accesorio</option>
						                            <?php
				                          			break;
				                          	}
				                           ?>                          
				                          </select>
				                        </div>
				                      </div>
				                      <div id="bicicleta" class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estilo_bike">Tipo de bicicletas<span class="required">   *  </span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                         <select class="form-control" name="estilo_bike">
				                         	<?php 
				                          	switch ($estilo_bike) {
				                          		
				                          		case "BMX":
				                          			echo '<option value="BMX" selected>BMX</option>';
						                            echo '<option value="BMX/Freestyle">BMX/Freestyle</option>';
						                            echo '<option value="Fat bike">Fat bike</option>';
											        echo '<option value="Mountain bike">Mountain bike</option>';
											        echo '<option value="Paseo">Paseo</option>';
											        echo '<option value="Urbana">Urbana</option>    ';
											        echo '<option value="Otros">Otros</option>          ';
				                          			break;
				                          		
				                          		case "BMX/Freestyle":
				                          			echo '<option value="BMX">BMX</option>';
						                            echo '<option value="BMX/Freestyle" selected>BMX/Freestyle</option>';
						                            echo '<option value="Fat bike">Fat bike</option>';
											        echo '<option value="Mountain bike">Mountain bike</option>';
											        echo '<option value="Paseo">Paseo</option>';
											        echo '<option value="Urbana">Urbana</option>    ';
											        echo '<option value="Otros">Otros</option>          ';
				                          			break;

				                          		case "Fat bike":
				                          			echo '<option value="BMX">BMX</option>';
						                            echo '<option value="BMX/Freestyle">BMX/Freestyle</option>';
						                            echo '<option value="Fat bike" selected>Fat bike</option>';
											        echo '<option value="Mountain bike">Mountain bike</option>';
											        echo '<option value="Paseo">Paseo</option>';
											        echo '<option value="Urbana">Urbana</option>    ';
											        echo '<option value="Otros">Otros</option>          ';
				                          			break;

				                          		case "Mountain bike":
				                          			echo '<option value="BMX">BMX</option>';
						                            echo '<option value="BMX/Freestyle">BMX/Freestyle</option>';
						                            echo '<option value="Fat bike">Fat bike</option>';
											        echo '<option value="Mountain bike" selected>Mountain bike</option>';
											        echo '<option value="Paseo">Paseo</option>';
											        echo '<option value="Urbana">Urbana</option>    ';
											        echo '<option value="Otros">Otros</option>          ';
				                          			break;
				                          		case "Paseo":
				                          			echo '<option value="BMX">BMX</option>';
						                            echo '<option value="BMX/Freestyle">BMX/Freestyle</option>';
						                            echo '<option value="Fat bike">Fat bike</option>';
											        echo '<option value="Mountain bike">Mountain bike</option>';
											        echo '<option value="Paseo" selected>Paseo</option>';
											        echo '<option value="Urbana">Urbana</option>    ';
											        echo '<option value="Otros">Otros</option>          ';
				                          			break;
				                          		case "Urbana":
				                          			echo '<option value="BMX">BMX</option>';
						                            echo '<option value="BMX/Freestyle">BMX/Freestyle</option>';
						                            echo '<option value="Fat bike">Fat bike</option>';
											        echo '<option value="Mountain bike">Mountain bike</option>';
											        echo '<option value="Paseo">Paseo</option>';
											        echo '<option value="Urbana" selected>Urbana</option>    ';
											        echo '<option value="Otros">Otros</option>          ';
				                          			break;
				                          		case "Otros":
				                          			echo '<option value="BMX">BMX</option>';
						                            echo '<option value="BMX/Freestyle">BMX/Freestyle</option>';
						                            echo '<option value="Fat bike">Fat bike</option>';
											        echo '<option value="Mountain bike">Mountain bike</option>';
											        echo '<option value="Paseo">Paseo</option>';
											        echo '<option value="Urbana">Urbana</option>    ';
											        echo '<option value="Otros" selected>Otros</option>          ';
				                          			break;

				                          		default:
				                          			echo '<option value="" selected>-Selecciona una opcion-</option>';
						                            echo '<option value="BMX">BMX</option>';
						                            echo '<option value="BMX/Freestyle">BMX/Freestyle</option>';
						                            echo '<option value="Fat bike">Fat bike</option>';
											        echo '<option value="Mountain bike">Mountain bike</option>';
											        echo '<option value="Paseo">Paseo</option>';
											        echo '<option value="Urbana">Urbana</option>    ';
											        echo '<option value="Otros">Otros</option>          ';
				                          			break;

				                          	}
				                           ?>                       
				                         	  
				                          </select>
				                        </div>
				                      </div>
				                      <div id="accesorio" class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_accesorio">Tipo de accesorio<span class="required">   *  </span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                         <select class="form-control" name="tipo_accesorio">
				                         	<?php 
				                          	switch ($tipo_accesorio) {
				                          		
				                          		case 0:
				                          			echo '<option value="0" selected>CASCOS / SEGURIDAD</option>';
						                            echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
						                            echo '<option value="2">CANASTAS</option>';
						                            echo '<option value="3">OTROS</option>';
						                            echo '<option value="4">REFACCIONES</option>';
						                            echo '<option value="5">ASIENTOS</option>';
						                            echo '<option value="6">CABLES</option>';
						                            echo '<option value="7">DIABLOS</option>';
						                            echo '<option value="8">MANUBRIOS</option>';
						                            echo '<option value="9">PEDALES</option>';
						                            echo '<option value="10">PUÑOS</option>';
						                            echo '<option value="11">BALEROS</option>';
						                            echo '<option value="12">CADENAS</option>';
						                            echo '<option value="13">EJES</option>';
						                            echo '<option value="14">HORQUILLAS</option>';
						                            echo '<option value="15">MASAS</option>';
						                            echo '<option value="16">RINES</option>';
						                            echo '<option value="17">CUADROS</option>';
						                            echo '<option value="18">FRENOS</option>';
						                            echo '<option value="19">LLANTAS</option>';
				                          			break;
				                          		
				                          		case 1:
				                          			echo '<option value="0">CASCOS / SEGURIDAD</option>';
						                            echo '<option value="1" selected>RUEDAS DE ENTRENAMIENTO</option>';
				                          			echo '<option value="2">CANASTAS</option>';
				                          			echo '<option value="3">OTROS</option>';
				                          			echo '<option value="4">REFACCIONES</option>';
													echo '<option value="5">ASIENTOS</option>';
													echo '<option value="6">CABLES</option>';
													echo '<option value="7">DIABLOS</option>';
													echo '<option value="8">MANUBRIOS</option>';
													echo '<option value="9">PEDALES</option>';
													echo '<option value="10">PUÑOS</option>';
													echo '<option value="11">BALEROS</option>';
													echo '<option value="12">CADENAS</option>';
													echo '<option value="13">EJES</option>';
													echo '<option value="14">HORQUILLAS</option>';
													echo '<option value="15">MASAS</option>';
													echo '<option value="16">RINES</option>';
													echo '<option value="17">CUADROS</option>';
													echo '<option value="18">FRENOS</option>';
													echo '<option value="19">LLANTAS</option>';
				                          			break;

				                          		case 2:
				                          			echo '<option value="0">CASCOS / SEGURIDAD</option>';
						                            echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
				                          			echo '<option value="2" selected>CANASTAS</option>';
				                          			echo '<option value="3">OTROS</option>';
				                          			echo '<option value="4">REFACCIONES</option>';
													echo '<option value="5">ASIENTOS</option>';
													echo '<option value="6">CABLES</option>';
													echo '<option value="7">DIABLOS</option>';
													echo '<option value="8">MANUBRIOS</option>';
													echo '<option value="9">PEDALES</option>';
													echo '<option value="10">PUÑOS</option>';
													echo '<option value="11">BALEROS</option>';
													echo '<option value="12">CADENAS</option>';
													echo '<option value="13">EJES</option>';
													echo '<option value="14">HORQUILLAS</option>';
													echo '<option value="15">MASAS</option>';
													echo '<option value="16">RINES</option>';
													echo '<option value="17">CUADROS</option>';
													echo '<option value="18">FRENOS</option>';
													echo '<option value="19">LLANTAS</option>';
				                          			break;

				                          		case 3:
				                          			echo '<option value="0">CASCOS / SEGURIDAD</option>';
						                            echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
				                          			echo '<option value="2">CANASTAS</option>';
				                          			echo '<option value="3" selected>OTROS</option>';
				                          			echo '<option value="4">REFACCIONES</option>';
													echo '<option value="5">ASIENTOS</option>';
													echo '<option value="6">CABLES</option>';
													echo '<option value="7">DIABLOS</option>';
													echo '<option value="8">MANUBRIOS</option>';
													echo '<option value="9">PEDALES</option>';
													echo '<option value="10">PUÑOS</option>';
													echo '<option value="11">BALEROS</option>';
													echo '<option value="12">CADENAS</option>';
													echo '<option value="13">EJES</option>';
													echo '<option value="14">HORQUILLAS</option>';
													echo '<option value="15">MASAS</option>';
													echo '<option value="16">RINES</option>';
													echo '<option value="17">CUADROS</option>';
													echo '<option value="18">FRENOS</option>';
													echo '<option value="19">LLANTAS</option>';

				                          			break;
				                          		case 4:
				                          			echo '<option value="0">CASCOS / SEGURIDAD</option>';
						                            echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
				                          			echo '<option value="2">CANASTAS</option>';
				                          			echo '<option value="4"selected>REFACCIONES</option>';
				                          			echo '<option value="3" >OTROS</option>';
													echo '<option value="5">ASIENTOS</option>';
						                            echo '<option value="6">CABLES</option>';
						                            echo '<option value="7">DIABLOS</option>';
						                            echo '<option value="8">MANUBRIOS</option>';
						                            echo '<option value="9">PEDALES</option>';
						                            echo '<option value="10">PUÑOS</option>';
						                            echo '<option value="11">BALEROS</option>';
						                            echo '<option value="12">CADENAS</option>';
						                            echo '<option value="13">EJES</option>';
						                            echo '<option value="14">HORQUILLAS</option>';
						                            echo '<option value="15">MASAS</option>';
						                            echo '<option value="16">RINES</option>';
						                            echo '<option value="17">CUADROS</option>';
						                            echo '<option value="18">FRENOS</option>';
						                            echo '<option value="19">LLANTAS</option>';

				                          			break;
												case 5 :
													echo '<option value="0">CASCOS / SEGURIDAD</option>';
						                            echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
				                          			echo '<option value="2">CANASTAS</option>';
				                          			echo '<option value="4">REFACCIONES</option>';
				                          			echo '<option value="3" >OTROS</option>';
													echo '<option value="5"selected>ASIENTOS</option>';
						                            echo '<option value="6">CABLES</option>';
						                            echo '<option value="7">DIABLOS</option>';
						                            echo '<option value="8">MANUBRIOS</option>';
						                            echo '<option value="9">PEDALES</option>';
						                            echo '<option value="10">PUÑOS</option>';
						                            echo '<option value="11">BALEROS</option>';
						                            echo '<option value="12">CADENAS</option>';
						                            echo '<option value="13">EJES</option>';
						                            echo '<option value="14">HORQUILLAS</option>';
						                            echo '<option value="15">MASAS</option>';
						                            echo '<option value="16">RINES</option>';
						                            echo '<option value="17">CUADROS</option>';
						                            echo '<option value="18">FRENOS</option>';
						                            echo '<option value="19">LLANTAS</option>';	
													break;
												case 6 :
													echo '<option value="0">CASCOS / SEGURIDAD</option>';
													echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
													echo '<option value="2">CANASTAS</option>';
													echo '<option value="4">REFACCIONES</option>';
													echo '<option value="3" >OTROS</option>';
													echo '<option value="5">ASIENTOS</option>';
													echo '<option value="6"selected>CABLES</option>';
													echo '<option value="7">DIABLOS</option>';
													echo '<option value="8">MANUBRIOS</option>';
													echo '<option value="9">PEDALES</option>';
													echo '<option value="10">PUÑOS</option>';
													echo '<option value="11">BALEROS</option>';
													echo '<option value="12">CADENAS</option>';
													echo '<option value="13">EJES</option>';
													echo '<option value="14">HORQUILLAS</option>';
													echo '<option value="15">MASAS</option>';
													echo '<option value="16">RINES</option>';
													echo '<option value="17">CUADROS</option>';
													echo '<option value="18">FRENOS</option>';
													echo '<option value="19">LLANTAS</option>';	
													break;
												case 7 :
														echo '<option value="0">CASCOS / SEGURIDAD</option>';
														echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
														echo '<option value="2">CANASTAS</option>';
														echo '<option value="4">REFACCIONES</option>';
														echo '<option value="3" >OTROS</option>';
														echo '<option value="5">ASIENTOS</option>';
														echo '<option value="6">CABLES</option>';
														echo '<option value="7" selected>DIABLOS</option>';
														echo '<option value="8">MANUBRIOS</option>';
														echo '<option value="9">PEDALES</option>';
														echo '<option value="10">PUÑOS</option>';
														echo '<option value="11">BALEROS</option>';
														echo '<option value="12">CADENAS</option>';
														echo '<option value="13">EJES</option>';
														echo '<option value="14">HORQUILLAS</option>';
														echo '<option value="15">MASAS</option>';
														echo '<option value="16">RINES</option>';
														echo '<option value="17">CUADROS</option>';
														echo '<option value="18">FRENOS</option>';
														echo '<option value="19">LLANTAS</option>';	
												break;
												case 8 :
													echo '<option value="0">CASCOS / SEGURIDAD</option>';
						                            echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
				                          			echo '<option value="2">CANASTAS</option>';
				                          			echo '<option value="4">REFACCIONES</option>';
				                          			echo '<option value="3" >OTROS</option>';
													echo '<option value="5">ASIENTOS</option>';
						                            echo '<option value="6">CABLES</option>';
						                            echo '<option value="7">DIABLOS</option>';
						                            echo '<option value="8" selected>MANUBRIOS</option>';
						                            echo '<option value="9">PEDALES</option>';
						                            echo '<option value="10">PUÑOS</option>';
						                            echo '<option value="11">BALEROS</option>';
						                            echo '<option value="12">CADENAS</option>';
						                            echo '<option value="13">EJES</option>';
						                            echo '<option value="14">HORQUILLAS</option>';
						                            echo '<option value="15">MASAS</option>';
						                            echo '<option value="16">RINES</option>';
						                            echo '<option value="17">CUADROS</option>';
						                            echo '<option value="18">FRENOS</option>';
						                            echo '<option value="19">LLANTAS</option>';	
												break;
												case 9 :
													echo '<option value="0">CASCOS / SEGURIDAD</option>';
						                            echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
				                          			echo '<option value="2">CANASTAS</option>';
				                          			echo '<option value="4">REFACCIONES</option>';
				                          			echo '<option value="3" >OTROS</option>';
													echo '<option value="5">ASIENTOS</option>';
						                            echo '<option value="6">CABLES</option>';
						                            echo '<option value="7">DIABLOS</option>';
						                            echo '<option value="8">MANUBRIOS</option>';
						                            echo '<option value="9" selected>PEDALES</option>';
						                            echo '<option value="10">PUÑOS</option>';
						                            echo '<option value="11">BALEROS</option>';
						                            echo '<option value="12">CADENAS</option>';
						                            echo '<option value="13">EJES</option>';
						                            echo '<option value="14">HORQUILLAS</option>';
						                            echo '<option value="15">MASAS</option>';
						                            echo '<option value="16">RINES</option>';
						                            echo '<option value="17">CUADROS</option>';
						                            echo '<option value="18">FRENOS</option>';
						                            echo '<option value="19">LLANTAS</option>';	
												break;
												case 10 :
														echo '<option value="0">CASCOS / SEGURIDAD</option>';
														echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
														echo '<option value="2">CANASTAS</option>';
														echo '<option value="4">REFACCIONES</option>';
														echo '<option value="3" >OTROS</option>';
														echo '<option value="5">ASIENTOS</option>';
														echo '<option value="6">CABLES</option>';
														echo '<option value="7">DIABLOS</option>';
														echo '<option value="8">MANUBRIOS</option>';
														echo '<option value="9">PEDALES</option>';
														echo '<option value="10" selected>PUÑOS</option>';
														echo '<option value="11">BALEROS</option>';
														echo '<option value="12">CADENAS</option>';
														echo '<option value="13">EJES</option>';
														echo '<option value="14">HORQUILLAS</option>';
														echo '<option value="15">MASAS</option>';
														echo '<option value="16">RINES</option>';
														echo '<option value="17">CUADROS</option>';
														echo '<option value="18">FRENOS</option>';
														echo '<option value="19">LLANTAS</option>';	
												break;
												case 11 :
													echo '<option value="0">CASCOS / SEGURIDAD</option>';
													echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
													echo '<option value="2">CANASTAS</option>';
													echo '<option value="4">REFACCIONES</option>';
													echo '<option value="3" >OTROS</option>';
													echo '<option value="5">ASIENTOS</option>';
													echo '<option value="6">CABLES</option>';
													echo '<option value="7">DIABLOS</option>';
													echo '<option value="8">MANUBRIOS</option>';
													echo '<option value="9">PEDALES</option>';
													echo '<option value="10">PUÑOS</option>';
													echo '<option value="11" selected>BALEROS</option>';
													echo '<option value="12">CADENAS</option>';
													echo '<option value="13">EJES</option>';
													echo '<option value="14">HORQUILLAS</option>';
													echo '<option value="15">MASAS</option>';
													echo '<option value="16">RINES</option>';
													echo '<option value="17">CUADROS</option>';
													echo '<option value="18">FRENOS</option>';
													echo '<option value="19">LLANTAS</option>';	
												break;
												case 12 :
												echo '<option value="0">CASCOS / SEGURIDAD</option>';
												echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
												echo '<option value="2">CANASTAS</option>';
												echo '<option value="4">REFACCIONES</option>';
												echo '<option value="3" >OTROS</option>';
												echo '<option value="5">ASIENTOS</option>';
												echo '<option value="6">CABLES</option>';
												echo '<option value="7">DIABLOS</option>';
												echo '<option value="8">MANUBRIOS</option>';
												echo '<option value="9">PEDALES</option>';
												echo '<option value="10">PUÑOS</option>';
												echo '<option value="11">BALEROS</option>';
												echo '<option value="12" selected>CADENAS</option>';
												echo '<option value="13">EJES</option>';
												echo '<option value="14">HORQUILLAS</option>';
												echo '<option value="15">MASAS</option>';
												echo '<option value="16">RINES</option>';
												echo '<option value="17">CUADROS</option>';
												echo '<option value="18">FRENOS</option>';
												echo '<option value="19">LLANTAS</option>';	
												break;
												case 13 :
												echo '<option value="0">CASCOS / SEGURIDAD</option>';
												echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
												echo '<option value="2">CANASTAS</option>';
												echo '<option value="4">REFACCIONES</option>';
												echo '<option value="3" >OTROS</option>';
												echo '<option value="5">ASIENTOS</option>';
												echo '<option value="6">CABLES</option>';
												echo '<option value="7">DIABLOS</option>';
												echo '<option value="8">MANUBRIOS</option>';
												echo '<option value="9">PEDALES</option>';
												echo '<option value="10">PUÑOS</option>';
												echo '<option value="11">BALEROS</option>';
												echo '<option value="12">CADENAS</option>';
												echo '<option value="13" selected>EJES</option>';
												echo '<option value="14">HORQUILLAS</option>';
												echo '<option value="15">MASAS</option>';
												echo '<option value="16">RINES</option>';
												echo '<option value="17">CUADROS</option>';
												echo '<option value="18">FRENOS</option>';
												echo '<option value="19">LLANTAS</option>';	
												break;
												case 14 :
													echo '<option value="0">CASCOS / SEGURIDAD</option>';
													echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
													echo '<option value="2">CANASTAS</option>';
													echo '<option value="4">REFACCIONES</option>';
													echo '<option value="3" >OTROS</option>';
													echo '<option value="5">ASIENTOS</option>';
													echo '<option value="6">CABLES</option>';
													echo '<option value="7">DIABLOS</option>';
													echo '<option value="8">MANUBRIOS</option>';
													echo '<option value="9">PEDALES</option>';
													echo '<option value="10">PUÑOS</option>';
													echo '<option value="11">BALEROS</option>';
													echo '<option value="12">CADENAS</option>';
													echo '<option value="13">EJES</option>';
													echo '<option value="14"selected>HORQUILLAS</option>';
													echo '<option value="15">MASAS</option>';
													echo '<option value="16">RINES</option>';
													echo '<option value="17">CUADROS</option>';
													echo '<option value="18">FRENOS</option>';
													echo '<option value="19">LLANTAS</option>';	
											break;
											case 15 :
												echo '<option value="0">CASCOS / SEGURIDAD</option>';
												echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
												echo '<option value="2">CANASTAS</option>';
												echo '<option value="4">REFACCIONES</option>';
												echo '<option value="3" >OTROS</option>';
												echo '<option value="5">ASIENTOS</option>';
												echo '<option value="6">CABLES</option>';
												echo '<option value="7">DIABLOS</option>';
												echo '<option value="8">MANUBRIOS</option>';
												echo '<option value="9">PEDALES</option>';
												echo '<option value="10">PUÑOS</option>';
												echo '<option value="11">BALEROS</option>';
												echo '<option value="12">CADENAS</option>';
												echo '<option value="13">EJES</option>';
												echo '<option value="14">HORQUILLAS</option>';
												echo '<option value="15"selected>MASAS</option>';
												echo '<option value="16">RINES</option>';
												echo '<option value="17">CUADROS</option>';
												echo '<option value="18">FRENOS</option>';
												echo '<option value="19">LLANTAS</option>';	
											break;
											case 16 :
												echo '<option value="0">CASCOS / SEGURIDAD</option>';
												echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
												echo '<option value="2">CANASTAS</option>';
												echo '<option value="4">REFACCIONES</option>';
												echo '<option value="3" >OTROS</option>';
												echo '<option value="5">ASIENTOS</option>';
												echo '<option value="6">CABLES</option>';
												echo '<option value="7">DIABLOS</option>';
												echo '<option value="8">MANUBRIOS</option>';
												echo '<option value="9">PEDALES</option>';
												echo '<option value="10">PUÑOS</option>';
												echo '<option value="11">BALEROS</option>';
												echo '<option value="12">CADENAS</option>';
												echo '<option value="13">EJES</option>';
												echo '<option value="14">HORQUILLAS</option>';
												echo '<option value="15">MASAS</option>';
												echo '<option value="16"selected>RINES</option>';
												echo '<option value="17">CUADROS</option>';
												echo '<option value="18">FRENOS</option>';
												echo '<option value="19">LLANTAS</option>';	
											break;
											case 17 :
												echo '<option value="0">CASCOS / SEGURIDAD</option>';
												echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
												echo '<option value="2">CANASTAS</option>';
												echo '<option value="4">REFACCIONES</option>';
												echo '<option value="3" >OTROS</option>';
												echo '<option value="5">ASIENTOS</option>';
												echo '<option value="6">CABLES</option>';
												echo '<option value="7">DIABLOS</option>';
												echo '<option value="8">MANUBRIOS</option>';
												echo '<option value="9">PEDALES</option>';
												echo '<option value="10">PUÑOS</option>';
												echo '<option value="11">BALEROS</option>';
												echo '<option value="12">CADENAS</option>';
												echo '<option value="13">EJES</option>';
												echo '<option value="14">HORQUILLAS</option>';
												echo '<option value="15">MASAS</option>';
												echo '<option value="16">RINES</option>';
												echo '<option value="17"selected>CUADROS</option>';
												echo '<option value="18">FRENOS</option>';
												echo '<option value="19">LLANTAS</option>';	
											break;
											case 18 :
												echo '<option value="0">CASCOS / SEGURIDAD</option>';
												echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
												echo '<option value="2">CANASTAS</option>';
												echo '<option value="4">REFACCIONES</option>';
												echo '<option value="3" >OTROS</option>';
												echo '<option value="5">ASIENTOS</option>';
												echo '<option value="6">CABLES</option>';
												echo '<option value="7">DIABLOS</option>';
												echo '<option value="8">MANUBRIOS</option>';
												echo '<option value="9">PEDALES</option>';
												echo '<option value="10">PUÑOS</option>';
												echo '<option value="11">BALEROS</option>';
												echo '<option value="12">CADENAS</option>';
												echo '<option value="13">EJES</option>';
												echo '<option value="14">HORQUILLAS</option>';
												echo '<option value="15">MASAS</option>';
												echo '<option value="16">RINES</option>';
												echo '<option value="17">CUADROS</option>';
												echo '<option value="18"selected>FRENOS</option>';
												echo '<option value="19">LLANTAS</option>';	
											break;
											case 19 :
												echo '<option value="0">CASCOS / SEGURIDAD</option>';
												echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
												echo '<option value="2">CANASTAS</option>';
												echo '<option value="4">REFACCIONES</option>';
												echo '<option value="3" >OTROS</option>';
												echo '<option value="5">ASIENTOS</option>';
												echo '<option value="6">CABLES</option>';
												echo '<option value="7">DIABLOS</option>';
												echo '<option value="8">MANUBRIOS</option>';
												echo '<option value="9">PEDALES</option>';
												echo '<option value="10">PUÑOS</option>';
												echo '<option value="11">BALEROS</option>';
												echo '<option value="12">CADENAS</option>';
												echo '<option value="13">EJES</option>';
												echo '<option value="14">HORQUILLAS</option>';
												echo '<option value="15">MASAS</option>';
												echo '<option value="16">RINES</option>';
												echo '<option value="17">CUADROS</option>';
												echo '<option value="18">FRENOS</option>';
												echo '<option value="19"selected>LLANTAS</option>';	
											break;

				                          		default:
				                          			echo '<option value="" selected>-Selecciona una opcion-</option>';
				                          			echo '<option value="0">CASCOS / SEGURIDAD</option>';
						                            echo '<option value="1">RUEDAS DE ENTRENAMIENTO</option>';
						                            echo '<option value="2">CANASTAS</option>';
						                            echo '<option value="3">OTROS</option>';
						                            echo '<option value="4">REFACCIONES</option>';
													echo '<option value="5">ASIENTOS</option>';
													echo '<option value="6">CABLES</option>';
													echo '<option value="7">DIABLOS</option>';
													echo '<option value="8">MANUBRIOS</option>';
													echo '<option value="9">PEDALES</option>';
													echo '<option value="10">PUÑOS</option>';
													echo '<option value="11">BALEROS</option>';
													echo '<option value="12">CADENAS</option>';
													echo '<option value="13">EJES</option>';
													echo '<option value="14">HORQUILLAS</option>';
													echo '<option value="15">MASAS</option>';
													echo '<option value="16">RINES</option>';
													echo '<option value="17">CUADROS</option>';
													echo '<option value="18">FRENOS</option>';
													echo '<option value="19"selected>LLANTAS</option>';
				                          			break;

				                          	}
				                           ?>       
				                          </select>
				                        </div>
				                      </div>
				                      <div id="triciclo" class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_triciclo">Tipo de triciclo<span class="required">   *  </span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                         <select class="form-control" name="tipo_triciclo">
				                         	<?php 
				                          	switch ($tipo_triciclo) {
				                          			                          		
				                          		case 1:
						                            echo '<option value="1" selected>Triciclo Manual</option>';
				                          			echo '<option value="2">Triciclo Infantil</option>';
				                          			break;

				                          		case 2:
						                            echo '<option value="1">Triciclo Manual</option>';
				                          			echo '<option value="2" selected>Triciclo Infantil</option>';
				                          			break;

				                          		default:
				                          			echo '<option value="" selected>Selecciona una opcion</option>';
						                            echo '<option value="1">Triciclo Manual</option>';
						                            echo '<option value="2">Triciclo Infantil</option>';
				                          			break;

				                          	}
				                           ?>                       
				                          </select>
				                        </div>
				                      </div>

				                      <div id="genero" class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genero_bike">Genero<span class="required">   *  </span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                         <select class="form-control" name="genero_bike">
				                         	<?php 
				                          	switch ($genero_bike) {
				                          			                          		
				                          		case "UNISEX":
						                            echo '<option value="UNISEX" selected>Sin Género</option>';
				                          			echo '<option value="MUJER" >MUJER</option>';
				                          			echo '<option value="HOMBRE" >HOMBRE</option>';  
				                          			echo '<option value="NIÑA" >NIÑA</option>';
				                          			echo '<option value="NIÑO" >NIÑO</option>'; 
				                          			break;

				                          		case "MUJER":
						                            echo '<option value="UNISEX">Sin Género</option>';
				                          			echo '<option value="MUJER" selected>MUJER</option>';
				                          			echo '<option value="HOMBRE" >HOMBRE</option>'; 
				                          			echo '<option value="NIÑA" >NIÑA</option>';
				                          			echo '<option value="NIÑO" >NIÑO</option>'; 
				                          			break;

				                          		case "HOMBRE":
						                            echo '<option value="UNISEX">Sin Género</option>';
				                          			echo '<option value="MUJER" >MUJER</option>';
				                          			echo '<option value="HOMBRE" selected>HOMBRE</option>'; 
				                          			echo '<option value="NIÑA" >NIÑA</option>';
				                          			echo '<option value="NIÑO" >NIÑO</option>'; 
				                          			break;

				                          		case "NIÑA":
						                            echo '<option value="UNISEX">Sin Género</option>';
				                          			echo '<option value="MUJER" >MUJER</option>';
				                          			echo '<option value="HOMBRE" >HOMBRE</option>'; 
				                          			echo '<option value="NIÑA" selected>NIÑA</option>';
				                          			echo '<option value="NIÑO" >NIÑO</option>'; 
				                          			break;

				                          		case "NIÑO":
						                            echo '<option value="UNISEX">Sin Género</option>';
				                          			echo '<option value="MUJER" >MUJER</option>';
				                          			echo '<option value="HOMBRE" >HOMBRE</option>'; 
				                          			echo '<option value="NIÑA" >NIÑA</option>';
				                          			echo '<option value="NIÑO" selected>NIÑO</option>'; 
				                          			break;

				                          		default:
				                          			echo '<option value="" selected>Selecciona una opcion</option>';
				                          			echo '<option value="UNISEX">Sin Género</option>';
				                          			echo '<option value="MUJER" >MUJER</option>';
				                          			echo '<option value="HOMBRE" >HOMBRE</option>'; 
				                          			echo '<option value="NIÑA" >NIÑA</option>';
				                          			echo '<option value="NIÑO" >NIÑO</option>'; 
				                          			break;

				                          	}
				                           ?>   
				                          </select>
				                        </div>
				                      </div>
				                      <div id="edad" class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edad">Edad<span class="required">   *  </span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                         <select class="form-control" name="edad_bike">
				                              <?php 
					                          	switch ($edad_bike) {
					                          		
					                          		case 0:
					                          			echo '<option value="0" selected>Adultos</option>';
							                            echo '<option value="1">Niños</option>';
					                          			break;
					                          		
					                          		case 1:
					                          			echo '<option value="0">Adultos</option>';
							                            echo '<option value="1" selected>Niños</option>';
					                          			break;

					                          		default:
					                          			echo '<option value="0">Adultos</option>';
							                            echo '<option value="1">Niños</option>';
					                          			break;

					                          		

					                          	}
					                           ?>                       
				                          </select>
				                        </div>
				                      </div>
				                      <div id="velocidades" class="form-group">
				                        <label for="velocidades_bike" class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad de Velocidades</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="velocidades_bike" value="<?php echo $velocidades_bike; ?>" class="form-control col-md-7 col-xs-12" type="text">
				                        </div>
				                      </div>
				                      <div id="freno_del" class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="freno_delantero">Tipo de freno delantero
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                         <select class="form-control" name="freno_delantero">
				                         	<?php 
					                          	switch ($freno_delantero) {
					                          		
					                          		case "Caliper":
							                              echo '<option value="Caliper" selected>Caliper</option>';
							                              echo '<option value="Cantilever" >Cantilever</option>';  
							                              echo '<option value="Disco Hidráulico" >Disco Hidráulico</option>';      
							                              echo '<option value="Disco mecanico" >Disco mecanico</option>'; 
							                              echo '<option value="V-brake" >V-brake</option>';
					                          			break;
					                          		
					                          		case "Cantilever":
							                              echo '<option value="Caliper">Caliper</option>';
							                              echo '<option value="Cantilever" selected>Cantilever</option>';  
							                              echo '<option value="Disco Hidráulico" >Disco Hidráulico</option>';      
							                              echo '<option value="Disco mecanico" >Disco mecanico</option>'; 
							                              echo '<option value="V-brake" >V-brake</option>';
					                          			break;

					                          		case "Disco Hidráulico":
							                              echo '<option value="Caliper">Caliper</option>';
							                              echo '<option value="Cantilever" >Cantilever</option>';  
							                              echo '<option value="Disco Hidráulico" selected>Hidráulico</option>';      
							                              echo '<option value="Disco mecanico" >Disco mecanico</option>'; 
							                              echo '<option value="V-brake" >V-brake</option>';
					                          			break;

					                          		case "Disco mecanico":
							                              echo '<option value="Caliper">Caliper</option>';
							                              echo '<option value="Cantilever" >Cantilever</option>';  
							                              echo '<option value="Disco Hidráulico" >Disco Hidráulico</option>';      
							                              echo '<option value="Disco mecanico" selected>Disco mecanico</option>'; 
							                              echo '<option value="V-brake" >V-brake</option>';
					                          			break;
					                          		case "V-brake":
							                              echo '<option value="Caliper">Caliper</option>';
							                              echo '<option value="Cantilever" >Cantilever</option>';  
							                              echo '<option value="Disco Hidráulico" >Disco Hidráulico</option>';      
							                              echo '<option value="Disco mecanico" >Disco mecanico</option>'; 
							                              echo '<option value="V-brake" selected>V-brake</option>';
					                          			break;

					                          		default:
					                          			echo '<option value="" selected>-Selecciona una opcion-</option>';
							                              echo '<option value="Caliper">Caliper</option>';
							                              echo '<option value="Cantilever" >Cantilever</option>';  
							                              echo '<option value="Disco Hidráulico" >Disco Hidráulico</option>';      
							                              echo '<option value="Disco mecanico" >Disco mecanico</option>'; 
							                              echo '<option value="V-brake" >V-brake</option>'; 
					                          			break;

					                          		

					                          	}
					                        ?>   				                         	         
				                          </select>
				                        </div>
				                      </div>
				                      <div id="freno_tras" class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="freno_trasero">Tipo de freno trasero
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                         <select class="form-control" name="freno_trasero">
				                         	<?php 
					                          	switch ($freno_trasero) {
					                          		
					                          		case "Freno de Disco":
							                              echo '<option value="Freno de Disco" selected>Freno de Disco</option>';
							                              echo '<option value="Maza" >Maza</option>';  
							                              echo '<option value="Tambor" >Tambor</option>'; 
							                              echo '<option value="Hidráulicos" >Hidráulicos</option>';      
							                              echo '<option value="Disco mecanico" >Disco mecanico</option>'; 
							                              echo '<option value="V-brake" >V-brake</option>';
							                              echo '<option value="U-brake" >U-brake</option>';
					                          			break;
					                          		
					                          		case "Maza":
							                              echo '<option value="Freno de Disco">Freno de Disco</option>';
							                              echo '<option value="Maza" selected>Maza</option>';  
							                              echo '<option value="Tambor" >Tambor</option>';  
							                              echo '<option value="Hidráulicos" >Hidráulicos</option>';      
							                              echo '<option value="Disco mecanico" >Disco mecanico</option>'; 
							                              echo '<option value="V-brake" >V-brake</option>';							                              
							                              echo '<option value="U-brake" >U-brake</option>';
					                          			break;

					                          		case "Tambor":
							                              echo '<option value="Freno de Disco">Freno de Disco</option>';
							                              echo '<option value="Maza" >Maza</option>';  
							                              echo '<option value="Tambor" selected>Tambor</option>';  
							                              echo '<option value="Hidráulicos" >Hidráulicos</option>';      
							                              echo '<option value="Disco mecanico" >Disco mecanico</option>'; 
							                              echo '<option value="V-brake" >V-brake</option>';							                              
							                              echo '<option value="U-brake" >U-brake</option>';
					                          			break;

					                          		case "Hidráulicos":
							                              echo '<option value="Freno de Disco">Freno de Disco</option>';
							                              echo '<option value="Maza" >Maza</option>';   
							                              echo '<option value="Tambor" >Tambor</option>'; 
							                              echo '<option value="Hidráulicos" selected>Hidráulicos</option>';      
							                              echo '<option value="Disco mecanico" >Disco mecanico</option>'; 
							                              echo '<option value="V-brake" >V-brake</option>';
							                              echo '<option value="U-brake" >U-brake</option>';
					                          			break;

					                          		case "Disco mecanico":
							                              echo '<option value="Freno de Disco">Freno de Disco</option>';
							                              echo '<option value="Maza" >Maza</option>';   
							                              echo '<option value="Tambor" >Tambor</option>'; 
							                              echo '<option value="Hidráulicos" >Hidráulicos</option>';      
							                              echo '<option value="Disco mecanico" selected>Disco mecanico</option>'; 
							                              echo '<option value="V-brake" >V-brake</option>';
							                              echo '<option value="U-brake" >U-brake</option>';
					                          			break;
					                          		case "V-brake":
							                              echo '<option value="Freno de Disco">Freno de Disco</option>';
							                              echo '<option value="Maza" >Maza</option>';   
							                              echo '<option value="Tambor" >Tambor</option>'; 
							                              echo '<option value="Hidráulicos" >Hidráulicos</option>';      
							                              echo '<option value="Disco mecanico" >Disco mecanico</option>'; 
							                              echo '<option value="V-brake" selected>V-brake</option>';
							                              echo '<option value="U-brake" >U-brake</option>';
					                          			break;
					                          		case "U-brake":
							                              echo '<option value="Freno de Disco">Freno de Disco</option>';
							                              echo '<option value="Maza" >Maza</option>';   
							                              echo '<option value="Tambor" >Tambor</option>'; 
							                              echo '<option value="Hidráulicos" >Hidráulicos</option>';      
							                              echo '<option value="Disco mecanico" >Disco mecanico</option>'; 
							                              echo '<option value="V-brake" >V-brake</option>';
							                              echo '<option value="U-brake" selected>U-brake</option>';
					                          			break;

					                          		default:
					                          			echo '<option value="" selected>-Selecciona una opcion-</option>';
							                              echo '<option value="Freno de Disco">Freno de Disco</option>';
							                              echo '<option value="Maza" >Maza</option>';   
							                              echo '<option value="Tambor" >Tambor</option>'; 
							                              echo '<option value="Hidráulicos" >Hidráulicos</option>';      
							                              echo '<option value="Disco mecanico" >Disco mecanico</option>'; 
							                              echo '<option value="V-brake" >V-brake</option>'; 
							                              echo '<option value="U-brake" >U-brake</option>';
					                          			break;
					                          	}
					                        ?>          
				                          </select>
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Material del producto</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <!--<input name="material_bike" value="<?php //echo $material_bike; ?>" class="form-control col-md-7 col-xs-12" type="text">-->
										  <select class="form-control" name="material_bike">
				                         	<?php 
					                          	switch ($material_bike) {
					                          		
					                          		case "Acero":
					                          			echo '<option value="Acero" selected>Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          		
					                          		case "Acero Inoxidable":
														echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable" selected>Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          		case "Acrílico":
														echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico" selected>Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          		case "Algodón":
														echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón" selected>Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          		case "Aluminio":
														echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio" selected>Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          		case "Cerámica":
														echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica" selected>Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          		case "Cobre":
														echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre" selected>Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          		case "Cristal":
														echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal"selected>Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          		case "Cuero":
														echo '<option value="Acero">Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero" selected>Cuero</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          		case "Metal":
														echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal" selected>Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          		case "Micro Fibra":
														echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal" >Metal</option>';
							                            echo '<option value="Micro Fibra" selected>Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          		case "Nylon":
														echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon"selected>Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          		case "Plástico":
														echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico"selected>Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          		case "Poliéster":
														echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster"selected>Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          		case "Silicona":
														echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona"selected>Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          		case "Sintético":
														echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético"selected>Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          		case "Tacto Piel":
														echo '<option value="Acero" >Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel" selected>Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          		case "Tela":
														echo '<option value="Acero">Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela" selected>Tela</option>';
					                          			break;

					                          		default:
					                          			echo '<option value="" selected>Selecciona una opcion</option>';
					                          			echo '<option value="Acero">Acero</option>';
							                            echo '<option value="Acero Inoxidable">Acero inoxidable</option>';
							                            echo '<option value="Acrílico">Acrilico</option>';
							                            echo '<option value="Algodón">Algodon</option>';
							                            echo '<option value="Aluminio">Aluminio</option>';
							                            echo '<option value="Cerámica">Ceramica</option>';
							                            echo '<option value="Cobre">Cobre</option>';
							                            echo '<option value="Cristal">Cristal</option>';
							                            echo '<option value="Cuero">Cuero</option>';
							                            echo '<option value="Metal">Metal</option>';
							                            echo '<option value="Micro Fibra">Micro Fibra</option>';
							                            echo '<option value="Nylon">Nylon</option>';
							                            echo '<option value="Plástico">Plástico</option>';
							                            echo '<option value="Poliéster">Poliéster</option>';
							                            echo '<option value="Silicona">Silicona</option>';
							                            echo '<option value="Sintético">Sintético</option>';
							                            echo '<option value="Tacto Piel">Tacto Piel</option>';
							                            echo '<option value="Tela">Tela</option>';
					                          			break;
					                          	}
					                           ?> 
				                          </select>
										</div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Marca</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="marca_bike" value="<?php echo $marca_bike; ?>" class="form-control col-md-7 col-xs-12" type="text">
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Modelo</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="modelo_bike" value="<?php echo $modelo_bike; ?>" class="form-control col-md-7 col-xs-12" type="text">
				                        </div>
				                      </div>
				                      <div id="montaje" class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="montaje_bike">Lugar de montaje
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                         <select class="form-control" name="montaje_bike">
				                         	<?php 
					                          	switch ($montaje_bike) {
					                          		
					                          		case "Delantero":
					                          			echo '<option value="Delantero" selected>Delantero</option>';
							                            echo '<option value="Trasero">Trasero</option>';
					                          			break;
					                          		
					                          		case "Trasero":
					                          			echo '<option value="Delantero">Delantero</option>';
							                            echo '<option value="Trasero" selected>Trasero</option>';
					                          			break;

					                          		default:
					                          			echo '<option value="" selected>Selecciona una opcion</option>';
					                          			echo '<option value="Delantero">Delantero</option>';
							                            echo '<option value="Trasero">Trasero</option>';
					                          			break;
					                          	}
					                           ?> 
				                          </select>
				                        </div>
				                      </div>
				                      <div id="personaje" class="form-group">
				                        <label for="personaje_bike" class="control-label col-md-3 col-sm-3 col-xs-12">Personaje</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="personaje_bike" value="<?php echo $personaje_bike; ?>" class="form-control col-md-7 col-xs-12" type="text">
				                        </div>
				                      </div>
				                      <div id="ruedas" class="form-group">
				                        <label for="ruedas" class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad de ruedas</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="ruedas" value="<?php echo $ruedas; ?>" class="form-control col-md-7 col-xs-12" type="text">
				                        </div>
				                      </div>
				                      <div id="pegable" class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pegable_bike">Es pegable
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                         <select class="form-control" name="pegable_bike">
				                         	<?php 
					                          	switch ($montaje_bike) {
					                          		
					                          		case "Delantero":
					                          			echo '<option value="SI" selected>SI</option>';
							                            echo '<option value="NO">NO</option>';
					                          			break;
					                          		
					                          		case "Trasero":
					                          			echo '<option value="SI">SI</option>';
							                            echo '<option value="NO" selected>NO</option>';
					                          			break;

					                          		default:
					                          			echo '<option value="" selected>Selecciona una opcion</option>';
					                          			echo '<option value="SI">SI</option>';
							                            echo '<option value="NO">NO</option>';
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
                                                <?php echo $descripcion_bike; ?>
                                            </textarea>    
                                        </div>
                                      </div>
                                      <br>
                                       <div class="form-group">
                                        <label>Puntos importantes</label>
                                        <br>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea id="tinymce" name="detalles">
                                                <?php echo $detalles_bike; ?>
                                            </textarea>    
                                        </div>
                                      </div>
                                     <br><br>
                                     


				                     
				                      
				                      <div class="ln_solid"></div>
				                      <div class="form-group">
				                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				                          <button type="submit" class="btn btn-success">Actualizar</button>
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
	function precios(){
		precio_publico();
		precio_publico_desc();
	}  

	function precio_publico(){
		var precio_compra = document.getElementById('precio_compra').value;
	    $.ajax({
	        type: "POST",
	        url: "trae_precios.php",
	        data: { 'precio_compra': precio_compra, 'id': 1},  
	        success: function(data){ 
	        	document.getElementById("precio_publico").value = data;
		 		// $("#precio_publico").text(data);    
	        }
	    });
	  }  
	  function precio_publico_desc(){
		var precio_compra = document.getElementById('precio_compra').value;
	    $.ajax({
	        type: "POST",
	        url: "trae_precios.php",
	        data: { 'precio_compra': precio_compra, 'id': 2},  
	        success: function(data){ 
	        	document.getElementById("precio_publico_desc").value = data;
		    }
	    });
	  }

	  function pagoOnChange(sel) {
	      if (sel.value=="0"){
	           divC = document.getElementById("bicicleta");
	           divC.style.display = "";

	           divA = document.getElementById("accesorio");
	           divA.style.display = "none";

	           divM = document.getElementById("montaje");
	           divM.style.display = "none";           

	           divE = document.getElementById("edad");
	           divE.style.display = "";

	           divV = document.getElementById("velocidades");
	           divV.style.display = "";

	           divM = document.getElementById("genero");
	           divM.style.display = "";

	           divFT = document.getElementById("freno_tras");
	           divFT.style.display = "";
	           
	           divFD = document.getElementById("freno_del");
	           divFD.style.display = "";

	           divT = document.getElementById("triciclo");
	           divT.style.display = "none";

	           divP = document.getElementById("personaje");
	           divP.style.display = "none";

	           divP = document.getElementById("pegable");
	           divP.style.display = "none";

	           divR = document.getElementById("ruedas");
	           divR.style.display = "none";

	      }else if (sel.value=="1") {
	      	   divC = document.getElementById("bicicleta");
	           divC.style.display="none";

	           divA = document.getElementById("accesorio");
	           divA.style.display = "";

	           divM = document.getElementById("montaje");
	           divM.style.display = "";

	           divE = document.getElementById("edad");
	           divE.style.display = "none";

	           divV = document.getElementById("velocidades");
	           divV.style.display = "none";

	           divM = document.getElementById("genero");
	           divM.style.display = "none";

	           divFT = document.getElementById("freno_tras");
	           divFT.style.display = "none";

	           divFD = document.getElementById("freno_del");
	           divFD.style.display = "none";

	           divT = document.getElementById("triciclo");
	           divT.style.display = "none";

	           divP = document.getElementById("personaje");
	           divP.style.display = "none";

	           divP = document.getElementById("pegable");
	           divP.style.display = "none";

	           divR = document.getElementById("ruedas");
	           divR.style.display = "none";

	      }else if (sel.value=="2") {
	      	   divC = document.getElementById("bicicleta");
	           divC.style.display="none";

	           divA = document.getElementById("accesorio");
	           divA.style.display = "none";

	           divM = document.getElementById("montaje");
	           divM.style.display = "none";

	           divE = document.getElementById("edad");
	           divE.style.display = "";

	           divV = document.getElementById("velocidades");
	           divV.style.display = "none";

	           divM = document.getElementById("genero");
	           divM.style.display = "";

	           divFT = document.getElementById("freno_tras");
	           divFT.style.display = "none";
	           
	           divFD = document.getElementById("freno_del");
	           divFD.style.display = "none";

	           divT = document.getElementById("triciclo");
	           divT.style.display = "";

	           divP = document.getElementById("personaje");
	           divP.style.display = "";

	           divP = document.getElementById("pegable");
	           divP.style.display = "none";

	           divR = document.getElementById("ruedas");
	           divR.style.display = "none";

	      }else{
	           divC = document.getElementById("bicicleta");
	           divC.style.display="none";

	           divA = document.getElementById("accesorio");
	           divA.style.display = "none";

	           divM = document.getElementById("montaje");
	           divM.style.display = "none";

	           divE = document.getElementById("edad");
	           divE.style.display = "";

	           divV = document.getElementById("velocidades");
	           divV.style.display = "none";

	           divM = document.getElementById("genero");
	           divM.style.display = "";

	           divFT = document.getElementById("freno_tras");
	           divFT.style.display = "none";
	           
	           divFD = document.getElementById("freno_del");
	           divFD.style.display = "none";

	           divT = document.getElementById("triciclo");
	           divT.style.display = "none";

	           divP = document.getElementById("personaje");
	           divP.style.display = "";

	           divP = document.getElementById("pegable");
	           divP.style.display = "";

	           divR = document.getElementById("ruedas");
	           divR.style.display = "";
	        
	      }
	  }


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