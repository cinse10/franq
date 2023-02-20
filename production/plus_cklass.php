<?php 
	if (isset($_GET['id_producto'])) {
		$id_producto = $_GET['id_producto'];
        
		
			
			include ("header.php");
			include("conexion.php");
			$sql = "select * from productos_cklass WHERE id_producto=".$id_producto;
            $requi = mysqli_query($conexion,$sql);
            while ($reg=mysqli_fetch_array($requi)) {
            	$id_producto = $reg['id_producto'];
               
            	$nombre_producto = $reg['nombre_producto'];
                $modelo_producto = $reg['modelo_producto'];
            	$codigo_barras_producto = $reg['codigo_barras_producto'];
                $talla_producto = $reg ['talla_producto'];
                $precio_contado = $reg['precio_contado'];
                $precio_asociado = $reg['precio_asociado'];
            	//$descripcion_producto = $reg['descripcion_producto'];
            	//$codigo_extra = $reg['codigo_extra'];

            	$color_producto = $reg['color_producto'];
            	$tipo_producto = $reg['tipo_producto'];
            	//$var_producto = $reg['var_producto'];
            	$material_producto = $reg['material_producto'];

            	$descripcion_linio = $reg['descripcion_linio'];
	            $detalles_linio = $reg['detalles_linio'];
	            $altura=$reg['altura'];
	            $anchura=$reg['anchura'];
	            $longitud=$reg['longitud'];
	            $peso=$reg['peso'];
	            $cod_linio=$reg['cod_linio'];
	            $sub_linio=$reg['sub_linio'];
				$ml_id=$reg['ml_id'];
	            $ml_link=$reg['ml_link'];

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
            	
            	       

	            $plus = 1;
        	}
        
    }
?>
			<!-- page content -->
			        <div class="right_col" role="main">
			          <div class="">
			            <div class="page-title">
			              <div class="title_left">
			                <h3>Productos Cklass</h3>
			              </div>
			            </div>
			            <div class="clearfix"></div>
			            <div class="row">
			              <div class="col-md-12 col-sm-12 col-xs-12">
			                <div class="x_panel">
			                  <div class="x_title">
			                    <h2>Subir producto a Linio</h2>
			                    <?php 
                                if ($sub_linio==NULL || $sub_linio==0) {
                                   echo '<a  href="conector_linio\post_cklass.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir a Linio</a>';
                                 } else{
                                    echo '<a  href="conector_linio\subir_imagen_cklass.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir Imagenes a Linio</a>';
                                    echo '<a  href="conector_linio\subir_imagen_cklass.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Actualizar Linio</a>';
                                    
                                 }if ($ml_id==NULL) {
                                    echo '<a  href="conector_ml\conectCklass.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir a Mercado Libre</a>';
                                  }else{
									echo '<a  href="conector_ml\descCklass.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Subir Descripcion ML</a>';
								  } 
								  echo '<a  href="conector_ml\actualiza_Cklass.php?id_producto='.$id_producto.'" style="float: right;" class="btn btn-warning">Actualiza ML</a>';
                                 ?>
			                    <div class="clearfix"></div>
			                  </div>
			                  <div class="x_content">
			                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="actualiza_plus_cklass.php" enctype="multipart/form-data">
			                      	<div class="form-group">
				                      	<center>
				                      		<?php echo "<img src='cklass/".$uno."' width='80' height='80' alt=''>"; ?>
				                      		<br>
				                      		<b>Selecciona imagen principal: </b>
		                                    <br>
		                                    <input button class="btn btn-primary waves-effect" name="uno" type="file" accept="image/*">
		                                </center>
		                                <center>
		                                <div class="col-md-6 col-sm-8 col-xs-8">
		                                    <?php echo "<img src='cklass/".$dos."' width='80' height='80' alt=''>"; ?>
		                                    <br>
		                                    <b>Selecciona imagen 2: </b>
		                                    <br>
		                                    <input button class="btn btn-primary waves-effect" name="dos" type="file" accept="image/*">                             
	                                	</div>
	                                    <div class="col-md-6 col-sm-8 col-xs-8">
	                                    	<?php echo "<img src='cklass/".$tres."' width='80' height='80' alt=''>"; ?>
	                                    	<br>
		                                    <b>Selecciona imagen 3: </b>
		                                    <br>
		                                    <input button class="btn btn-primary waves-effect" name="tres" type="file" accept="image/*">
	                                	</div>
	                                	</center>
	                                </div>
                                	<br><br>

				                      <div class="form-group">
				                       <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Talla <span class="required">*</span>
				                        </label>-->
				                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="id_producto" hidden="true" value="<?php echo $id_producto; ?>">
				                        	<input type="text" name="plus" hidden="true" value="<?php echo $plus; ?>">
				                         <!-- <input type="text" name="nombre_producto" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $talla_producto; ?>" disabled>-->
				                        </div>
				                      </div>
				                       <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código de Barras</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="codigo_barras_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $codigo_barras_producto; ?>" disabled>
				                        </div>
				                      </div>
				                       <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Talla</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="talla_producto" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" value="<?php echo $talla_producto; ?>" disabled>
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Modelo</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="codigo_extra" value="<?php echo $modelo_producto; ?>" class="form-control col-md-7 col-xs-12" type="text" disabled>
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Precio Asociado</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="precio_asociado" value="<?php echo $precio_asociado; ?>" class="form-control col-md-7 col-xs-12" type="text" disabled>
				                        </div>
				                      </div>
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Precio Contado</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                          <input name="precio_contado" value="<?php echo $precio_contado; ?>" class="form-control col-md-7 col-xs-12" type="text" disabled>
				                        </div>
				                      </div>
				                      
				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Descripción del producto.</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                        	<textarea class="form-control col-md-7 col-xs-12" name="descripcion_producto" cols="30" rows="5" placeholder="Descripción del producto..." disabled><?php echo $descripcion_producto; ?></textarea>
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

				                      <div id="bicicleta" class="form-group">
				                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estilo_bike">Tipo de producto<span class="required">   *  </span>
				                        </label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                         <select class="form-control" name="tipo_producto" required="required">
				                         	<?php 
				                          	switch ($tipo_producto) {
				                          		
				                          		case "16549":
				                          			echo '<option value="16549" selected>Zapatos mocasines mujer</option>';
						                            echo '<option value="16548">Zapato oxford mujer</option>';
						                            echo '<option value="16547">Tenis casual mujer</option>';
											        echo '<option value="16546">Sandalia Mujer</option>';
											        echo '<option value="16540">Tacon</option>';
											        echo '<option value="16539">Zapato Plataforma</option>';
											        echo '<option value="16533">Botas y botines mujer</option>';
											        echo '<option value="16371">Tenis casuales hombre</option>';
											        echo '<option value="16369">Zapatos oxford hombre</option>';
											        echo '<option value="16364">Botas y botines hombre</option>';
											        echo '<option value="16353">Sandalias hombre</option> ';
											        echo '<option value="14630">Zapatos niño</option> ';
											        echo '<option value="14628">Botas niño</option> ';
											        echo '<option value="14639">Tenis niño</option> ';
											        echo '<option value="14625">Sandalias niño</option> ';
											        echo '<option value="14528">Zapatos niña</option> ';
											        echo '<option value="14531">Tenis niña</option> ';
											        echo '<option value="14529">Sandalias niña</option> ';
				                          			break;
				                          		
				                          		case "16548":
                                                    echo '<option value="16549">Zapatos mocasines mujer</option>';
						                            echo '<option value="16548"selected>Zapatos oxfords mujer</option>';
						                            echo '<option value="16547">Tenis casuales mujer</option>';
											        echo '<option value="16546">Sandalias Mujer</option>';
											        echo '<option value="16540">Tacones</option>';
											        echo '<option value="16539">Plataformas</option>';
											        echo '<option value="16533">Botas y botines mujer</option>';
											        echo '<option value="16371">Tenis casuales hombre</option>';
											        echo '<option value="16369">Zapatos oxford hombre</option>';
											        echo '<option value="16364">Botas y botines hombre</option>';
											        echo '<option value="16353">Sandalias hombre</option> ';
											        echo '<option value="14630">Zapatos niño</option> ';
											        echo '<option value="14628">Botas niño</option> ';
											        echo '<option value="14639">Tenis niño</option> ';
											        echo '<option value="14625">Sandalias niño</option> ';
											        echo '<option value="14528">Zapatos niña</option> ';
											        echo '<option value="14531">Tenis niña</option> ';
											        echo '<option value="14529">Sandalias niña</option> ';
				                          			break;

				                          		case "16547":
                                                    echo '<option value="16549">Zapatos mocasines mujer</option>';
						                            echo '<option value="16548">Zapatos oxfords mujer</option>';
						                            echo '<option value="16547" selected>Tenis casuales mujer</option>';
											        echo '<option value="16546">Sandalias Mujer</option>';
											        echo '<option value="16540">Tacones</option>';
											        echo '<option value="16539">Plataformas</option>';
											        echo '<option value="16533">Botas y botines mujer</option>';
											        echo '<option value="16371">Tenis casuales hombre</option>';
											        echo '<option value="16369">Zapatos oxford hombre</option>';
											        echo '<option value="16364">Botas y botines hombre</option>';
											        echo '<option value="16353">Sandalias hombre</option> ';
											        echo '<option value="14630">Zapatos niño</option> ';
											        echo '<option value="14628">Botas niño</option> ';
											        echo '<option value="14639">Tenis niño</option> ';
											        echo '<option value="14625">Sandalias niño</option> ';
											        echo '<option value="14528">Zapatos niña</option> ';
											        echo '<option value="14531">Tenis niña</option> ';
											        echo '<option value="14529">Sandalias niña</option> ';
				                          			break;

				                          		case "16546":
                                                    echo '<option value="16549">Zapatos mocasines mujer</option>';
						                            echo '<option value="16548">Zapatos oxfords mujer</option>';
						                            echo '<option value="16547">Tenis casuales mujer</option>';
											        echo '<option value="16546"selected>Sandalias Mujer</option>';
											        echo '<option value="16540">Tacones</option>';
											        echo '<option value="16539">Plataformas</option>';
											        echo '<option value="16533">Botas y botines mujer</option>';
											        echo '<option value="16371">Tenis casuales hombre</option>';
											        echo '<option value="16369">Zapatos oxford hombre</option>';
											        echo '<option value="16364">Botas y botines hombre</option>';
											        echo '<option value="16353">Sandalias hombre</option> ';
											        echo '<option value="14630">Zapatos niño</option> ';
											        echo '<option value="14628">Botas niño</option> ';
											        echo '<option value="14639">Tenis niño</option> ';
											        echo '<option value="14625">Sandalias niño</option> ';
											        echo '<option value="14528">Zapatos niña</option> ';
											        echo '<option value="14531">Tenis niña</option> ';
											        echo '<option value="14529">Sandalias niña</option> ';
				                          			break;
				                          		case "16540":
                                                    echo '<option value="16549">Zapatos mocasines mujer</option>';
						                            echo '<option value="16548">Zapatos oxfords mujer</option>';
						                            echo '<option value="16547">Tenis casuales mujer</option>';
											        echo '<option value="16546">Sandalias Mujer</option>';
											        echo '<option value="16540"selected>Tacones</option>';
											        echo '<option value="16539">Plataformas</option>';
											        echo '<option value="16533">Botas y botines mujer</option>';
											        echo '<option value="16371">Tenis casuales hombre</option>';
											        echo '<option value="16369">Zapatos oxford hombre</option>';
											        echo '<option value="16364">Botas y botines hombre</option>';
											        echo '<option value="16353">Sandalias hombre</option> ';
											        echo '<option value="14630">Zapatos niño</option> ';
											        echo '<option value="14628">Botas niño</option> ';
											        echo '<option value="14639">Tenis niño</option> ';
											        echo '<option value="14625">Sandalias niño</option> ';
											        echo '<option value="14528">Zapatos niña</option> ';
											        echo '<option value="14531">Tenis niña</option> ';
											        echo '<option value="14529">Sandalias niña</option> ';
				                          			break;
				                          		case "16539":
                                                    echo '<option value="16549">Zapatos mocasines mujer</option>';
						                            echo '<option value="16548">Zapatos oxfords mujer</option>';
						                            echo '<option value="16547">Tenis casuales mujer</option>';
											        echo '<option value="16546">Sandalias Mujer</option>';
											        echo '<option value="16540">Tacones</option>';
											        echo '<option value="16539"selected>Plataformas</option>';
											        echo '<option value="16533">Botas y botines mujer</option>';
											        echo '<option value="16371">Tenis casuales hombre</option>';
											        echo '<option value="16369">Zapatos oxford hombre</option>';
											        echo '<option value="16364">Botas y botines hombre</option>';
											        echo '<option value="16353">Sandalias hombre</option> ';
											        echo '<option value="14630">Zapatos niño</option> ';
											        echo '<option value="14628">Botas niño</option> ';
											        echo '<option value="14639">Tenis niño</option> ';
											        echo '<option value="14625">Sandalias niño</option> ';
											        echo '<option value="14528">Zapatos niña</option> ';
											        echo '<option value="14531">Tenis niña</option> ';
											        echo '<option value="14529">Sandalias niña</option> ';
				                          			break;
				                          		case "16533":
                                                    echo '<option value="16549">Zapatos mocasines mujer</option>';
						                            echo '<option value="16548">Zapatos oxfords mujer</option>';
						                            echo '<option value="16547">Tenis casuales mujer</option>';
											        echo '<option value="16546">Sandalias Mujer</option>';
											        echo '<option value="16540">Tacones</option>';
											        echo '<option value="16539">Plataformas</option>';
											        echo '<option value="16533"selected>Botas y botines mujer</option>';
											        echo '<option value="16371">Tenis casuales hombre</option>';
											        echo '<option value="16369">Zapatos oxford hombre</option>';
											        echo '<option value="16364">Botas y botines hombre</option>';
											        echo '<option value="16353">Sandalias hombre</option> ';
											        echo '<option value="14630">Zapatos niño</option> ';
											        echo '<option value="14628">Botas niño</option> ';
											        echo '<option value="14639">Tenis niño</option> ';
											        echo '<option value="14625">Sandalias niño</option> ';
											        echo '<option value="14528">Zapatos niña</option> ';
											        echo '<option value="14531">Tenis niña</option> ';
											        echo '<option value="14529">Sandalias niña</option> ';
				                          			break;
				                          		case "16371":
                                                    echo '<option value="16549">Zapatos mocasines mujer</option>';
						                            echo '<option value="16548">Zapatos oxfords mujer</option>';
						                            echo '<option value="16547">Tenis casuales mujer</option>';
											        echo '<option value="16546">Sandalias Mujer</option>';
											        echo '<option value="16540">Tacones</option>';
											        echo '<option value="16539">Plataformas</option>';
											        echo '<option value="16533">Botas y botines mujer</option>';
											        echo '<option value="16371"selected>Tenis casuales hombre</option>';
											        echo '<option value="16369">Zapatos oxford hombre</option>';
											        echo '<option value="16364">Botas y botines hombre</option>';
											        echo '<option value="16353">Sandalias hombre</option> ';
											        echo '<option value="14630">Zapatos niño</option> ';
											        echo '<option value="14628">Botas niño</option> ';
											        echo '<option value="14639">Tenis niño</option> ';
											        echo '<option value="14625">Sandalias niño</option> ';
											        echo '<option value="14528">Zapatos niña</option> ';
											        echo '<option value="14531">Tenis niña</option> ';
											        echo '<option value="14529">Sandalias niña</option> ';
				                          			break;
				                          		case "16369":
                                                    echo '<option value="16549">Zapatos mocasines mujer</option>';
						                            echo '<option value="16548">Zapatos oxfords mujer</option>';
						                            echo '<option value="16547">Tenis casuales mujer</option>';
											        echo '<option value="16546">Sandalias Mujer</option>';
											        echo '<option value="16540">Tacones</option>';
											        echo '<option value="16539">Plataformas</option>';
											        echo '<option value="16533">Botas y botines mujer</option>';
											        echo '<option value="16371">Tenis casuales hombre</option>';
											        echo '<option value="16369"selected>Zapatos oxford hombre</option>';
											        echo '<option value="16364">Botas y botines hombre</option>';
											        echo '<option value="16353">Sandalias hombre</option> ';
											        echo '<option value="14630">Zapatos niño</option> ';
											        echo '<option value="14628">Botas niño</option> ';
											        echo '<option value="14639">Tenis niño</option> ';
											        echo '<option value="14625">Sandalias niño</option> ';
											        echo '<option value="14528">Zapatos niña</option> ';
											        echo '<option value="14531">Tenis niña</option> ';
											        echo '<option value="14529">Sandalias niña</option> ';
				                          			break;
				                          		case "16364":
                                                    echo '<option value="16549">Zapatos mocasines mujer</option>';
						                            echo '<option value="16548">Zapatos oxfords mujer</option>';
						                            echo '<option value="16547">Tenis casuales mujer</option>';
											        echo '<option value="16546">Sandalias Mujer</option>';
											        echo '<option value="16540">Tacones</option>';
											        echo '<option value="16539">Plataformas</option>';
											        echo '<option value="16533">Botas y botines mujer</option>';
											        echo '<option value="16371">Tenis casuales hombre</option>';
											        echo '<option value="16369">Zapatos oxford hombre</option>';
											        echo '<option value="16364"selected>Botas y botines hombre</option>';
											        echo '<option value="16353">Sandalias hombre</option> ';
											        echo '<option value="14630">Zapatos niño</option> ';
											        echo '<option value="14628">Botas niño</option> ';
											        echo '<option value="14639">Tenis niño</option> ';
											        echo '<option value="14625">Sandalias niño</option> ';
											        echo '<option value="14528">Zapatos niña</option> ';
											        echo '<option value="14531">Tenis niña</option> ';
											        echo '<option value="14529">Sandalias niña</option> ';
				                          			break;
				                          		case "16353":
                                                    echo '<option value="16549">Zapatos mocasines mujer</option>';
						                            echo '<option value="16548">Zapatos oxfords mujer</option>';
						                            echo '<option value="16547">Tenis casuales mujer</option>';
											        echo '<option value="16546">Sandalias Mujer</option>';
											        echo '<option value="16540">Tacones</option>';
											        echo '<option value="16539">Plataformas</option>';
											        echo '<option value="16533">Botas y botines mujer</option>';
											        echo '<option value="16371">Tenis casuales hombre</option>';
											        echo '<option value="16369">Zapatos oxford hombre</option>';
											        echo '<option value="16364">Botas y botines hombre</option>';
											        echo '<option value="16353"selected>Sandalias hombre</option> ';
											        echo '<option value="14630">Zapatos niño</option> ';
											        echo '<option value="14628">Botas niño</option> ';
											        echo '<option value="14639">Tenis niño</option> ';
											        echo '<option value="14625">Sandalias niño</option> ';
											        echo '<option value="14528">Zapatos niña</option> ';
											        echo '<option value="14531">Tenis niña</option> ';
											        echo '<option value="14529">Sandalias niña</option> ';
				                          			break;
				                          		case "14630":
                                                    echo '<option value="16549">Zapatos mocasines mujer</option>';
						                            echo '<option value="16548">Zapatos oxfords mujer</option>';
						                            echo '<option value="16547">Tenis casuales mujer</option>';
											        echo '<option value="16546">Sandalias Mujer</option>';
											        echo '<option value="16540">Tacones</option>';
											        echo '<option value="16539">Plataformas</option>';
											        echo '<option value="16533">Botas y botines mujer</option>';
											        echo '<option value="16371">Tenis casuales hombre</option>';
											        echo '<option value="16369">Zapatos oxford hombre</option>';
											        echo '<option value="16364">Botas y botines hombre</option>';
											        echo '<option value="16353">Sandalias hombre</option> ';
											        echo '<option value="14630" selected>Zapatos niño</option> ';
											        echo '<option value="14628">Botas niño</option> ';
											        echo '<option value="14639">Tenis niño</option> ';
											        echo '<option value="14625">Sandalias niño</option> ';
											        echo '<option value="14528">Zapatos niña</option> ';
											        echo '<option value="14531">Tenis niña</option> ';
											        echo '<option value="14529">Sandalias niña</option> ';
				                          			break;
				                          		case "14628":
                                                    echo '<option value="16549">Zapatos mocasines mujer</option>';
						                            echo '<option value="16548">Zapatos oxfords mujer</option>';
						                            echo '<option value="16547">Tenis casuales mujer</option>';
											        echo '<option value="16546">Sandalias Mujer</option>';
											        echo '<option value="16540">Tacones</option>';
											        echo '<option value="16539">Plataformas</option>';
											        echo '<option value="16533">Botas y botines mujer</option>';
											        echo '<option value="16371">Tenis casuales hombre</option>';
											        echo '<option value="16369">Zapatos oxford hombre</option>';
											        echo '<option value="16364">Botas y botines hombre</option>';
											        echo '<option value="16353">Sandalias hombre</option> ';
											        echo '<option value="14630">Zapatos niño</option> ';
											        echo '<option value="14628"selected>Botas niño</option> ';
											        echo '<option value="14639">Tenis niño</option> ';
											        echo '<option value="14625">Sandalias niño</option> ';
											        echo '<option value="14528">Zapatos niña</option> ';
											        echo '<option value="14531">Tenis niña</option> ';
											        echo '<option value="14529">Sandalias niña</option> ';
				                          			break;
				                          		case "14639":
                                                    echo '<option value="16549">Zapatos mocasines mujer</option>';
						                            echo '<option value="16548">Zapatos oxfords mujer</option>';
						                            echo '<option value="16547">Tenis casuales mujer</option>';
											        echo '<option value="16546">Sandalias Mujer</option>';
											        echo '<option value="16540">Tacones</option>';
											        echo '<option value="16539">Plataformas</option>';
											        echo '<option value="16533">Botas y botines mujer</option>';
											        echo '<option value="16371">Tenis casuales hombre</option>';
											        echo '<option value="16369">Zapatos oxford hombre</option>';
											        echo '<option value="16364">Botas y botines hombre</option>';
											        echo '<option value="16353">Sandalias hombre</option> ';
											        echo '<option value="14630">Zapatos niño</option> ';
											        echo '<option value="14628">Botas niño</option> ';
											        echo '<option value="14639"selected>Tenis niño</option> ';
											        echo '<option value="14625">Sandalias niño</option> ';
											        echo '<option value="14528">Zapatos niña</option> ';
											        echo '<option value="14531">Tenis niña</option> ';
											        echo '<option value="14529">Sandalias niña</option> ';
				                          			break;
				                          		case "14625":
                                                    echo '<option value="16549">Zapatos mocasines mujer</option>';
						                            echo '<option value="16548">Zapatos oxfords mujer</option>';
						                            echo '<option value="16547">Tenis casuales mujer</option>';
											        echo '<option value="16546">Sandalias Mujer</option>';
											        echo '<option value="16540">Tacones</option>';
											        echo '<option value="16539">Plataformas</option>';
											        echo '<option value="16533">Botas y botines mujer</option>';
											        echo '<option value="16371">Tenis casuales hombre</option>';
											        echo '<option value="16369">Zapatos oxford hombre</option>';
											        echo '<option value="16364">Botas y botines hombre</option>';
											        echo '<option value="16353">Sandalias hombre</option> ';
											        echo '<option value="14630">Zapatos niño</option> ';
											        echo '<option value="14628">Botas niño</option> ';
											        echo '<option value="14639">Tenis niño</option> ';
											        echo '<option value="14625"selected>Sandalias niño</option> ';
											        echo '<option value="14528">Zapatos niña</option> ';
											        echo '<option value="14531">Tenis niña</option> ';
											        echo '<option value="14529">Sandalias niña</option> ';
				                          			break;
				                          		case "14528":
                                                    echo '<option value="16549">Zapatos mocasines mujer</option>';
						                            echo '<option value="16548">Zapatos oxfords mujer</option>';
						                            echo '<option value="16547">Tenis casuales mujer</option>';
											        echo '<option value="16546">Sandalias Mujer</option>';
											        echo '<option value="16540">Tacones</option>';
											        echo '<option value="16539">Plataformas</option>';
											        echo '<option value="16533">Botas y botines mujer</option>';
											        echo '<option value="16371">Tenis casuales hombre</option>';
											        echo '<option value="16369">Zapatos oxford hombre</option>';
											        echo '<option value="16364">Botas y botines hombre</option>';
											        echo '<option value="16353">Sandalias hombre</option> ';
											        echo '<option value="14630">Zapatos niño</option> ';
											        echo '<option value="14628">Botas niño</option> ';
											        echo '<option value="14639">Tenis niño</option> ';
											        echo '<option value="14625">Sandalias niño</option> ';
											        echo '<option value="14528"selected>Zapatos niña</option> ';
											        echo '<option value="14531">Tenis niña</option> ';
											        echo '<option value="14529">Sandalias niña</option> ';
				                          			break;
				                          		case "14531":
                                                    echo '<option value="16549">Zapatos mocasines mujer</option>';
						                            echo '<option value="16548">Zapatos oxfords mujer</option>';
						                            echo '<option value="16547">Tenis casuales mujer</option>';
											        echo '<option value="16546">Sandalias Mujer</option>';
											        echo '<option value="16540">Tacones</option>';
											        echo '<option value="16539">Plataformas</option>';
											        echo '<option value="16533">Botas y botines mujer</option>';
											        echo '<option value="16371">Tenis casuales hombre</option>';
											        echo '<option value="16369">Zapatos oxford hombre</option>';
											        echo '<option value="16364">Botas y botines hombre</option>';
											        echo '<option value="16353">Sandalias hombre</option> ';
											        echo '<option value="14630">Zapatos niño</option> ';
											        echo '<option value="14628">Botas niño</option> ';
											        echo '<option value="14639">Tenis niño</option> ';
											        echo '<option value="14625">Sandalias niño</option> ';
											        echo '<option value="14528">Zapatos niña</option> ';
											        echo '<option value="14531"selected>Tenis niña</option> ';
											        echo '<option value="14529">Sandalias niña</option> ';
				                          			break;
				                          		case "14529":
                                                    echo '<option value="16549">Zapatos mocasines mujer</option>';
						                            echo '<option value="16548">Zapatos oxfords mujer</option>';
						                            echo '<option value="16547">Tenis casuales mujer</option>';
											        echo '<option value="16546">Sandalias Mujer</option>';
											        echo '<option value="16540">Tacones</option>';
											        echo '<option value="16539">Plataformas</option>';
											        echo '<option value="16533">Botas y botines mujer</option>';
											        echo '<option value="16371">Tenis casuales hombre</option>';
											        echo '<option value="16369">Zapatos oxford hombre</option>';
											        echo '<option value="16364">Botas y botines hombre</option>';
											        echo '<option value="16353">Sandalias hombre</option> ';
											        echo '<option value="14630">Zapatos niño</option> ';
											        echo '<option value="14628">Botas niño</option> ';
											        echo '<option value="14639">Tenis niño</option> ';
											        echo '<option value="14625">Sandalias niño</option> ';
											        echo '<option value="14528">Zapatos niña</option> ';
											        echo '<option value="14531">Tenis niña</option> ';
											        echo '<option value="14529"selected>Sandalias niña</option> ';
				                          			break;

				                          		default:
                                                  echo '<option value="16549" selected>Zapatos mocasines mujer</option>';
                                                  echo '<option value="16548">Zapatos oxfords mujer</option>';
                                                  echo '<option value="16547">Tenis casuales mujer</option>';
                                                  echo '<option value="16546">Sandalias Mujer</option>';
                                                  echo '<option value="16540">Tacones</option>';
                                                  echo '<option value="16539">Plataformas</option>';
                                                  echo '<option value="16533">Botas y botines mujer</option>';
                                                  echo '<option value="16371">Tenis casuales hombre</option>';
                                                  echo '<option value="16369">Zapatos oxford hombre</option>';
                                                  echo '<option value="16364">Botas y botines hombre</option>';
                                                  echo '<option value="16353">Sandalias hombre</option> ';
                                                  echo '<option value="14630">Zapatos niño</option> ';
                                                  echo '<option value="14628">Botas niño</option> ';
                                                  echo '<option value="14639">Tenis niño</option> ';
                                                  echo '<option value="14625">Sandalias niño</option> ';
                                                  echo '<option value="14528">Zapatos niña</option> ';
                                                  echo '<option value="14531">Tenis niña</option> ';
                                                  echo '<option value="14529">Sandalias niña</option> ';
				                          			break;

				                          	}
				                           ?>                       
				                         	  
				                          </select>
				                        </div>
				                      </div>

				        

				                      <div class="form-group">
				                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Material Principal</label>
				                        <div class="col-md-6 col-sm-6 col-xs-12">
				                         <select class="form-control" name="material_producto" required="required">
				                         	<?php 
				                          	switch ($material_producto) {
				                          		
				                          		case "PLÁSTICO":
				                          			echo '<option value="PLÁSTICO" selected>PLASTICO</option>';
						                            echo '<option value="SINTETICO">SINTETICO</option>';
						                            echo '<option value="TELA">TELA</option>';
						                            echo '<option value="TACTO PIEL">TACTO PIEL</option>';
						                            //echo '<option value="FLANEL">FLANEL</option>';
													//echo '<option value="BORREGA" selected>BORREGA</option>';
				                          			break;
				                          		
				                          		case "SINTETICO":
				                          			echo '<option value="PLÁSTICO">PLASTICO</option>';
						                            echo '<option value="SINTETICO" selected>SINTETICO</option>';
						                            echo '<option value="TELA">TELA</option>';
						                            echo '<option value="TACTO PIEL">TACTO PIEL</option>';
						                            //echo '<option value="FLANEL">FLANEL</option>';
													//echo '<option value="BORREGA" selected>BORREGA</option>';
				                          			break;

				                          		case "TELA":
				                          			echo '<option value="PLÁSTICO">PLASTICO</option>';
						                            echo '<option value="SINTETICO" >SINTETICO</option>';
						                            echo '<option value="TELA" selected>TELA</option>';
						                            echo '<option value="TACTO PIEL">TACTO PIEL</option>';
						                            //echo '<option value="FLANEL">FLANEL</option>';
													//echo '<option value="BORREGA" selected>BORREGA</option>';
				                          			break;

				                          		case "TACTO PIEL":
				                          			echo '<option value="PLÁSTICO">PLASTICO</option>';
						                            echo '<option value="SINTETICO" >SINTETICO</option>';
						                            echo '<option value="TELA">TELA</option>';
						                            echo '<option value="TACTO PIEL" selected>TACTO PIEL</option>';
						                            //echo '<option value="FLANEL" selected>FLANEL</option>';
													//echo '<option value="BORREGA" selected>BORREGA</option>';
				                          			break;

				                          		
													  
				                          		
				                          		

				                          		default:
				                          			echo '<option value="" selected>-Selecciona una opcion-</option>';
						                            echo '<option value="PLASTICO">PLASTICO</option>';
						                            echo '<option value="SINTETICO">SINTETICO</option>';
						                            echo '<option value="TELA">TELA</option>';
						                            echo '<option value="TACTO PIEL">TACTO PIEL</option>';
						                           // echo '<option value="FLANEL">FLANEL</option>';
						                            //echo '<option value="BORREGA">BORREGA</option>';
				                          			break;

				                          	}
				                           ?>                       
				                         	  
				                          </select>
				                        </div>
				                      </div>

				                      <div class="form-group" align="center">
                                        <h2 >Información de Paquete</h2>
                                      </div>
                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Altura<span class="required">* </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="altura" name="altura" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $altura; ?>" placeholder="Solo número, en cm">
                                        </div>
                                      </div>
                                      
                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Anchura<span class="required">* </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="anchura" name="anchura" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $anchura; ?>" placeholder="Solo número, en cm">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Longitud<span class="required">* </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="longitud" name="longitud" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $longitud; ?>" placeholder="Solo número, en cm">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Peso<span class="required">* </span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="text" id="peso" name="peso" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $peso; ?>" placeholder="Solo número, en kg">
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
                                            <textarea id="tinymce" name="descripcion_linio">
                                                <?php echo $descripcion_linio; ?>
                                            </textarea>    
                                        </div>
                                      </div>
                                      <br>
                                       <div class="form-group">
                                        <label>Puntos importantes</label>
                                        <br>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <textarea id="tinymce" name="detalles_linio">
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
