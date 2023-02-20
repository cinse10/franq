<?php 
include ("header.php");

?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Productos Cubrebocas</h3>
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
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="guarda_producto_cubrebocas.php">
                      	<div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Código de barras</label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input name="codigo_barras_producto" onkeypress="return pulsar2(event)" class="form-control col-md-7 col-xs-12" type="text">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="text" name="nombre" required="required" class="form-control col-md-7 col-xs-12">
	                        </div>
	                      </div>
	                     <!-- <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Modelo del producto <span class="required">*</span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="text" name="modelo_vf" required="required" class="form-control col-md-7 col-xs-12" placeholder="Modelo del producto">
	                        </div>
	                      </div>-->
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripción del producto <span class="required">*</span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="text" name="descripcion" required="required" class="form-control col-md-7 col-xs-12" >
	                        </div>
	                      </div>
	                       <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Talla<span class="required">*</span></label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input name="talla" onkeypress="return pulsar(event)" class="form-control col-md-7 col-xs-12" type="text">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Color<span class="required">*</span></label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input name="color" onkeypress="return pulsar(event)" class="form-control col-md-7 col-xs-12" type="text">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio Catálogo del producto<span class="required">*  $</span>
	                        </label> 
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="number" onkeypress="return pulsar(event)" name="precio_catalogo" required="required" class="form-control col-md-7 col-xs-12">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Precio Afiliado del producto<span class="required">*  $</span>
	                        </label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input type="number" onkeypress="return pulsar(event)" name="precio_afiliado" required="required" class="form-control col-md-7 col-xs-12">
	                        </div>
	                      </div>
	                      <div class="form-group">
	                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Inventario inicial <span class="required">*  </span></label>
	                        <div class="col-md-6 col-sm-6 col-xs-12">
	                          <input name="inventario_producto" onkeypress="return pulsar(event)" class="form-control col-md-7 col-xs-12" type="number" required="required">
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
	
</script>