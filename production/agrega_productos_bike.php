<?php 
include ("header.php");
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
                    <h2>Agregar productos</h2>
                    <div class="clearfix"></div>
                  </div> 
                  <div class="x_content">
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="guarda_producto_bike.php" enctype="multipart/form-data">
                      		<div class="form-group">
		                      	<center>
		                      		<b>Selecciona imagen principal: </b>
                                    <br>
                                    <input button class="btn btn-primary waves-effect" name="uno" type="file" accept="image/*">
                                </center>
                                <br>
                                <center>
                                <div class="col-md-6 col-sm-8 col-xs-8">
                                    <b>Selecciona imagen 2: </b>
                                    <br>
                                    <input button class="btn btn-primary waves-effect" name="dos" type="file" accept="image/*">                             
                            	</div>
                                <div class="col-md-6 col-sm-8 col-xs-8">
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
	                          <input type="text" name="nombre_producto" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nombre del producto">
	                        </div>
	                      </div>
	                       <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Rodada<span class="required">*</span></label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input name="rodada_producto" onkeypress="return pulsar(event)" class="form-control col-md-7 col-xs-12" type="text">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Color<span class="required">*</span></label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <select class="form-control" name="color_producto">
	                          	<option value="">- Selecciona un color -</option>
	                         	<option value="AMARILLO">AMARILLO</option>
								<option value="AMBAR">AMBAR</option>
								<option value="AZUL">AZUL</option>
								<option value="AZUL MARINO">AZUL MARINO</option>
								<option value="BEIGE">BEIGE</option>
								<option value="BLANCO">BLANCO</option>
								<option value="BRONCE">BRONCE</option>
								<option value="BURDEO">BURDEO</option>
								<option value="CELESTE">CELESTE</option>
								<option value="CORAL">CORAL</option>
								<option value="DORADO">DORADO</option>
								<option value="FUCSIA">FUCSIA</option>
								<option value="GRIS">GRIS</option>
								<option value="MARRÓN">MARRÓN</option>
								<option value="MULTICOLOR">MULTICOLOR</option>
								<option value="NARANJA">NARANJA</option>
								<option value="NEGRO">NEGRO</option>
								<option value="ORO ROSA">ORO ROSA</option>
								<option value="PLATA">PLATA</option>
								<option value="PÚRPURA">PÚRPURA</option>
								<option value="ROJO">ROJO</option>
								<option value="ROSA">ROSA</option>
								<option value="SALMÓN">SALMÓN</option>
								<option value="TURQUESA">TURQUESA</option>
								<option value="VERDE">VERDE</option>
								<option value="VIOLETA">VIOLETA</option>
								<option value="ÍNDIGO">ÍNDIGO</option>
	                          </select>
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio compra del producto<span class="required">*  $</span>
	                        </label> 
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="number" onkeyup='precios();' id="precio_compra" name="precio_compra" required="required" class="form-control col-md-7 col-xs-12">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio público del producto<span class="required">*  $</span>
	                        </label> 
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="number" onkeypress="return pulsar(event)" id="precio_publico" name="precio_publico" required="required" class="form-control col-md-7 col-xs-12">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio público con descuento<span class="required">*  $</span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="number" onkeypress="return pulsar(event)" id="precio_publico_desc" name="precio_publico_desc" required="required" class="form-control col-md-7 col-xs-12">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código de barras</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input name="codigo_barras_producto" onkeypress="return pulsar2(event)" class="form-control col-md-7 col-xs-12" type="text">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código Generico</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input name="co_gen" onkeypress="return pulsar2(event)" class="form-control col-md-7 col-xs-12" type="text">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código SAT</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input name="co_sat" onkeypress="return pulsar2(event)" class="form-control col-md-7 col-xs-12" type="text">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_bike">Tipo de producto<span class="required">   *  </span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                         <select class="form-control" name="tipo_bike" onchange="pagoOnChange(this)">
	                         	  <option value="">- Selecciona un tipo -</option>
	                              <option value="0">Bicicleta</option>
	                              <option value="2">Triciclo</option>
	                              <option value="3">Scooter</option>
						          <option value="1">Accesorio</option>              
	                          </select>
	                        </div>
	                      </div>
	                      <div id="bicicleta" class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estilo_bike">Tipo de bicicletas<span class="required">   *  </span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                         <select class="form-control" name="estilo_bike">
	                         	<option value="">- Selecciona una opcion -</option>
	                              <option value="BMX">BMX</option>;
	                              <option value="BMX/Freestyle">BMX/Freestyle</option>
	                              <option value="Fat bike">Fat bike</option>
						          <option value="Mountain bike">Mountain bike</option>
						          <option value="Paseo">Paseo</option>  
						          <option value="Urbana">Urbana</option>   
						          <option value="Otros">Otros</option>          
	                          </select>
	                        </div>
	                      </div>
	                      <div id="accesorio" class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_accesorio">Tipo de accesorio<span class="required">   *  </span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                         <select class="form-control" name="tipo_accesorio">
	                         	<option value="" selected>-Selecciona una opcion-</option>
								<option value="0">CASCOS</option>
								<option value="1">RUEDAS DE ENTRENAMIENTO</option>
								<option value="2">CANASTAS</option>    
								<option value="3">OTROS</option>           
								<option value="4">REFACCIONES</option>           
								<option value="5">ASIENTOS</option>           
								<option value="6">CABLES</option>           
								<option value="7">DIABLOS</option>           
								<option value="8">MANUBRIOS</option>           
								<option value="9">PEDALES</option>           
								<option value="10">PUÑOS</option>           
								<option value="11">BALEROS</option>           
								<option value="12">CADENAS</option>           
								<option value="13">EJES</option>           
								<option value="14">HORQUILLAS</option>           
								<option value="15">MASAS</option>           
								<option value="16">RINES</option>           
								<option value="17">CUADROS</option>           
								<option value="18">FRENOS</option>           
								<option value="19">LLANTAS</option>           
	                          </select>
	                        </div>
	                      </div>
	                      <div id="triciclo" class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_triciclo">Tipo de triciclo<span class="required">   *  </span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                         <select class="form-control" name="tipo_triciclo">
	                         	<option value="">-Selecciona una opcion -</option>
						          <option value="1">Triciclo Manual</option>               
	                              <option value="2">Triciclo Infantil</option>
	                          </select>
	                        </div>
	                      </div>

	                      <div id="genero" class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="genero_bike">Genero<span class="required">   *  </span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                         <select class="form-control" name="genero_bike">
	                         	<option value="">- Selecciona una opcion -</option>
	                              <option value="UNISEX">Sin Género</option>
	                              <option value="MUJER" >MUJER</option>
	                      		 <option value="HOMBRE" >HOMBRE</option> 
	                      		 <option value="NIÑA" >NIÑA</option>
	                      		 <option value="NIÑO" >NIÑO</option>      
	                      		        
	                          </select>
	                        </div>
	                      </div>
	                      <div id ="edad" class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edad_bike">Edad<span class="required">   *  </span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                         <select class="form-control" name="edad_bike">}
	                         	<option value="">- Selecciona una opcion -</option>
	                              <option value="0">Adultos</option>
	                              <option value="1" >Niños</option>             
	                          </select>
	                        </div>
	                      </div>
	                      <div id="velocidades" class="form-group">
	                        <label for="velocidades_bike" class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad de Velocidades</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input name="velocidades_bike" onkeypress="return pulsar(event)" class="form-control col-md-7 col-xs-12" type="text">
	                        </div>
	                      </div>
	                      <div id="freno_del" class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="freno_delantero">Tipo de freno delantero
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                         <select class="form-control" name="freno_delantero">
	                         	<option value="">- Selecciona una opcion -</option>
	                              <option value="Caliper">Caliper</option>
	                              <option value="Cantilever" >Cantilever</option>  
	                              <option value="Disco hidraulico" >Disco hidraulico</option>      
	                              <option value="Disco mecanico" >Disco mecanico</option> 
	                              <option value="V-brakes" >V-brakes</option>        
	                          </select>
	                        </div>
	                      </div>
	                      <div id="freno_tras" class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="freno_trasero">Tipo de freno trasero
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                         <select class="form-control" name="freno_trasero">
	                         	<option value="">- Selecciona una opcion -</option>
	                              <option value="Freno de Disco">Freno de Disco</option>
	                              <option value="Maza" >Maza</option>
	                              <option value="Tambor" >Tambor</option>
	                              <option value="Hidráulicos" >Hidráulicos</option>   
	                              <option value="Disco mecanico" >Disco mecanico</option>
	                              <option value="V-brake" >V-brake</option>
	                              <option value="U-brake" >U-brake</option>  
	                          </select>
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Material de articulo</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                         <!-- <input name="material_bike" onkeypress="return pulsar(event)" class="form-control col-md-7 col-xs-12" type="text">-->
							 <select class="form-control" name="material_bike">
								 <option value="">- Selecciona una opcion -</option>
								 <option value="Acero">Acero</option>
								 <option value="Acero Inoxidable">Acero Inoxidable</option>
								 <option value="Acrílico">Acrílico</option>
								 <option value="Algodón">Algodón</option>
								 <option value="Aluminio">Aluminio</option>
								 <option value="Cerámica">Cerámica</option>
								 <option value="Cobre">Cobre</option>
								 <option value="Cristal">Cristal</option>
								 <option value="Cuero">Cuero</option>
								 <option value="Metal">Metal</option>
								 <option value="Micro Fibra">Micro Fibra</option>
								 <option value="Nylon">Nylon</option>
								 <option value="Plástico">Plástico</option>
								 <option value="Poliéster">Poliéster</option>
								 <option value="Silicona">Silicona</option>
								 <option value="Sintético">Sintético</option>
								 <option value="Tacto Piel">Tacto Piel</option>
								 <option value="Tela">Tela</option>
				                         	
				                          </select>
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Marca</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input name="marca_bike" onkeypress="return pulsar(event)" class="form-control col-md-7 col-xs-12" type="text">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Modelo</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input name="modelo_bike" onkeypress="return pulsar(event)" class="form-control col-md-7 col-xs-12" type="text">
	                        </div>
	                      </div>
	                      <div id="montaje" class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="montaje_bike">Lugar de montaje
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                         <select class="form-control" name="montaje_bike">}
	                         	<option value="">- Selecciona una opcion -</option>
	                              <option value="Delantero">Delantero</option>
	                              <option value="Trasero" >Trasero</option>             
	                          </select>
	                        </div>
	                      </div>
	                      <div id="personaje" class="form-group">
	                        <label for="personaje_bike" class="control-label col-md-3 col-sm-3 col-xs-12">Personaje</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input name="personaje_bike" onkeypress="return pulsar(event)" class="form-control col-md-7 col-xs-12" type="text">
	                        </div>
	                      </div>
	                      <div id="ruedas" class="form-group">
	                        <label for="ruedas" class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad de ruedas</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input name="ruedas" onkeypress="return pulsar(event)" class="form-control col-md-7 col-xs-12" type="text">
	                        </div>
	                      </div>
	                      <div id="inventario" class="form-group">
	                        <label for="invetario" class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad de Producto (Stock)</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input name="inventario" onkeypress="return pulsar(event)" class="form-control col-md-7 col-xs-12" type="text">
	                        </div>
	                      </div>

	                      
	                     <input type="text" id="id_empleado" name="id_empleado" value="<?php echo $iddelempleadito; ?>" hidden>
	                      <div class="ln_solid"></div>
	                      <div class="form-group">
	                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							  <button class="btn btn-primary" type="reset">Limpiar</button>
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
  <?php 
    if ($productos==0 || $productos==1) {
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
	function pulsar(e) { 
	  tecla = (document.all) ? e.keyCode :e.which; 
	  return (tecla!=101&&tecla!=43&&tecla!=45); 
	} 
	function pulsar2(e) { 
	  tecla = (document.all) ? e.keyCode :e.which; 
	  return (tecla!=13); 
	}
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
           divFT.style.display = "";
           
           divFD = document.getElementById("freno_del");
           divFD.style.display = "";

           divT = document.getElementById("triciclo");
           divT.style.display = "";

           divP = document.getElementById("personaje");
           divP.style.display = "";

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

           divR = document.getElementById("ruedas");
           divR.style.display = "";
          
		   
      }
}
</script>