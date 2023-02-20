<?php 
  include("header.php");
  
 ?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Inventario Dankriz</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Iniciar inventario</h2>
                    <a href="ver_inventario_cklass.php"  style="float: right;" class="btn btn-warning">Ver Inventario</a>
                                       
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">                      
                        <div class="form-group">
                          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Codigo de barras: <span class="required">*</span>

                          </label>
                          <!--<div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="text" autofocus="true" id="caja_busqueda" class="form-control" name="caja_busqueda" onclick=Registrar();>
                                    <label class="form-label">Código de barras</label>
                                    

                            
                                    <a id="datos"></a>

                            </div>
                          </div> -->
                          <div class="col-md-3 col-sm-3 col-xs-12" onclick="Registrar();">
                            <select class="selectpicker" data-show-subtext="true" data-live-search="true" id="caja_busqueda" name="caja_busqueda">
                                <option value=""> Selecciona un producto </option> 
                                <option id="datos"> </option> 
                              </select>
                              <a id="datos"></a>
                          </div>
                          
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
  /* Multiple Item Picker */
  $('.selectpicker').selectpicker({
    style: 'btn-default'
  });
</script>
<script type="text/javascript">
    function pulsar(e) { 
        tecla = (document.all) ? e.keyCode :e.which; 
        if (tecla==13){
            ValidaProducto();
        }
        return (tecla!=13); 
    } 
    function ValidaProducto() {
        var codigo=document.getElementById("caja_busqueda").value;
        document.getElementById("caja_busqueda").value = "";
        document.getElementById("codigo_busqueda").focus();
        $.ajax({
            type: "POST",
            dataType: 'html',
            url: "guarda_dankriz.php",
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
    $(buscar_datos());
    function buscar_datos(consulta) {
      $.ajax({
        url: 'buscar.php',
        type: 'POST',
        dataType: 'html',
        data:{consulta:consulta}
      })
      .done(function(respuesta){
        $("#datos").html(respuesta);
      })
      .fail(function(){
        console.log("error");
      })
    }
    $(document).on('keyup','#caja_busqueda',function(){
      var valor = $(this).val();
      if(valor != ""){
        buscar_datos(valor);
      }else{
        buscar_datos();
      }
    });

    function Registrar(){
    var codigo_barras = $("#codigo_barras").val();     
    $.ajax({
      type: "POST",
      dataType: 'html',
      url: "guarda_dankriz1.php",
      data: {"codigo_barras":codigo_barras},
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
                        /*console.log("No encontré ese producto");
                        swal("No encontré ese producto!", {
                          buttons: false,
                          icon: "error",
                          timer: 2000,
                        });*/
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
      ///////
      /*var codigo= $("#codigo").value;
        document.querySelector("#codigo").value = "";
        document.querySelector("#codigo").focus();
        $.ajax({
            type: "POST",
            dataType: 'html',
            url: "guarda_dankriz.php",
            data: "#codigo="+codigo,
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
        });*/

    }); 
    Limpiar();     
  }   
</script>
<script type="text/javascript">
    $(document).ready(function() { 
        console.log("Inicio");
        document.getElementById("codigo").value = "";
        document.getElementById("codigo").focus();
    }); 
</script>