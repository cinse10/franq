<?php 
  include("header.php");
  
 ?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left"> 
                <h3>Inventario Mary Kay</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Iniciar inventario</h2>
                    <a href="ver_inventario_mary.php"  style="float: right;" class="btn btn-warning">Ver Inventario</a>
                                       
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">                      
                        <div class="form-group">
                          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Codigo de barras: <span class="required">*</span>

                          </label>
                          <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="text" autofocus="true" id="codigo" class="form-control" name="nombre_categoria" onkeypress="return pulsar(event)">
                                    <label class="form-label">Código de barras</label>
                          
                            
                          </div>
                          <!--<a href="agrega_productos.php"  style="float: right;" class="btn btn-primary">Agregar producto nuevo</a>-->
                                       
                        </div>  
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php 
  include("footer.php");
?>
<script src="sweetalert.min.js"></script>
<script type="text/javascript">
    function pulsar(e) { 
        tecla = (document.all) ? e.keyCode :e.which; 
        if (tecla==13){
            ValidaProducto();
        }
        return (tecla!=13); 
    } 
    function ValidaProducto() {
        var codigo=document.getElementById("codigo").value;
        document.getElementById("codigo").value = "";
        document.getElementById("codigo").focus();
        $.ajax({
            type: "POST",
            dataType: 'html',
            url: "guarda_marykay.php",
            data: "codigo="+codigo,
            success: function(resp){                    
                switch(resp){
                    case '0':
                        console.log("No lo pude guardar");
                        swal("No lo pude guardar!", {
                          buttons: false,
                          icon: "error",
                          timer: 2000,
                        });
                        break;
                    case '7':
                        console.log("No encontré ese producto");
                        swal("No encontré ese producto!", {
                          buttons: false,
                          icon: "error",
                          timer: 2000,
                        });
                        break;
                    default:
                        console.log(resp);
                        swal(resp, {
                          buttons: false,
                          icon: "success",
                          timer: 5000,
                        });
                        break;
                }
            }
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function() { 
        console.log("Inicio");
        document.getElementById("codigo").value = "";
        document.getElementById("codigo").focus();
    }); 
</script>