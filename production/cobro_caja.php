<?php 
include("conexion.php");
include ("header.php");

  $id_socio=$_GET['id_socio'];
  $sql = "select * from dist_hijo INNER JOIN dist_padre ON dist_hijo.dist_padre=dist_padre.id_dist_padre where id_dist_hijo=".$id_socio;
  $consulta = mysqli_query($conexion,$sql);
  if(mysqli_num_rows($consulta)>0){
    $socio = mysqli_fetch_array($consulta);
    $nombre_socio     = $socio['nombre_dist_hijo']; 
    $cod_distribuidor    = $socio['num_asociado'];
    $whats_socio      = $socio['tel_dist_hijo'];  
    $dist_padre    = $socio['dist_padre']; 
    $nombre_padre     = $socio['nombre_dist_padre']; 
  }

?>
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Asociados</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Ver Asociados</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-4"></div>
                      <div class="form-group">
                          
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="id_socio" value="<?php echo $_GET['id_socio']; ?>" hidden>
                            
                            <div id="info"></div>
                          </div>
                          
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre del Socio <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="nombre_socio" required="required" class="form-control col-md-7 col-xs-12" placeholder="Nombre del socio" value="<?php echo $nombre_socio; ?>" disabled>
                          </div>
                        </div>
                        <br><br>
                         
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">No. de Asociado <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="cod_distribuidor" required="required"  class="form-control col-md-7 col-xs-12" type="text" name="middle-name" placeholder="Número de asociado" value="<?php echo $cod_distribuidor; ?>" disabled="disabled">
                          </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Distribuidor Actual <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="nombre_padre" required="required"  class="form-control col-md-7 col-xs-12" type="text" name="middle-name" placeholder="Número de asociado" value="<?php echo $nombre_padre; ?>" disabled="disabled">
                          </div>
                        </div>
                        <hr><br>
                        <center><button data-toggle="modal" data-target="#modalPedido">Agregar Pedido</button></center>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <center><a href="ventas_cajas.php" class="btn btn-Danger "> Volver </a></center>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->


         <!-- Modal para agrega pedido -->
        <div class="modal fade" id="modalPedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Pedidos Betterware</h4>
              </div>
              <div class="modal-body">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="guarda_pedido.php">
                  <center>
                    <label for="pedido" >Monto Total de Pedido : </label>
                    <input name="pedido" id="pedido" required="required" type="number" placeholder="Digita el costo del pedido a cobrar"  ><br><br>
                    <label for="devolucion" >Monto devolución : </label>
                    <input name="devolucion" id="devolucion" onkeyup='devi();' required="required" type="number" placeholder="Digita el monto a devolver"  ><br><br>
                    <label for="dev_final" >Monto final devolucion : </label>
                    <input name="dev_final" id="dev_final" required="required" type="number" disabled="disabled" ><br><br>
                    <label for="f_pedido" >Monto Final Total de Pedido : </label>
                    <input name="f_pedido" id="f_pedido" required="required" type="number" disabled="disabled" ><br><br>
                    
                    <label for="apagar" >A liquidar : </label>
                    <input name="apagar" required="required" type="number" placeholder="Digita el monto que se dará"  >
                    <br><br>
                    <label for="pedido" >Tipo de pago : </label>
                    <div>
                      <input type="radio" id="efectivo"  onchange="pagoOnChange(this)"
                       name="tip_pago" value="1">
                      <label for="efectivo">Efectivo</label>
                      <br>

                      <input type="radio" id="tarjeta"  onchange="pagoOnChange(this)"
                       name="tip_pago" value="2">
                      <label for="tarjeta">Tarjeta</label>
                      <br>

                      <input type="radio" id="fraccionado"  onchange="pagoOnChange(this)"
                       name="tip_pago" value="3">
                      <label for="fraccionado">Fraccionado</label>
                      <br>
                    </div><br><br>
                    <div  id="montos_fracc">
                      <label for="fracc" >Monto a cobrar en tarjeta : </label>
                      <input name="fracc" type="number" placeholder="Digita monto tarjeta"  ><br><br>
                      <label for="fracc1" >Monto a cobrar en efectivo : </label>
                      <input name="fracc1" type="number" placeholder="Digita monto efectivo"  >
                    </div>
                    <input type="text" name="id_socio" value="<?php echo $_GET['id_socio']; ?>" hidden>    
                    <input type="text" name="id_empleado" hidden="true" value="<?php echo $iddelempleadito; ?>">
                  </center>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" >
                  Agregar
                  </button> 
                </form>                                  
              </div>
            </div>
          </div>
        </div>
<?php 
include ("footer.php");
?>
<script> 
function pulsar(e) { 
  tecla = (document.all) ? e.keyCode :e.which; 
  return (tecla!=13); 
} 

function devi(){
    var precio_compra = document.getElementById('devolucion').value;
    var pedido = document.getElementById('pedido').value;
    document.getElementById("dev_final").value = precio_compra * 0.8135;
    document.getElementById("f_pedido").value = Math.round(pedido-(precio_compra * 0.8135));
      
    }  

function pagoOnChange(sel) {
    if (sel.value=="3"){
         divC = document.getElementById("montos_fracc");
         divC.style.display = "";

        

    }else if (sel.value=="2") {
         divC = document.getElementById("montos_fracc");
         divC.style.display="none";

         

    }else if (sel.value=="1") {
         divC = document.getElementById("montos_fracc");
         divC.style.display="none";

         

    }else{
         divC = document.getElementById("montos_fracc");
         divC.style.display="none";

        
      
    }
}
</script> 