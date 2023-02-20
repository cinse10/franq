<?php 
include("conexion.php");
include ("header.php");

  $id_socio=$_GET['id_socio'];
  $id_venta=$_GET['id_venta'];
  $sql = "select * from dist_hijo INNER JOIN dist_padre ON dist_hijo.dist_padre=dist_padre.id_dist_padre where id_dist_hijo=".$id_socio;
  $consulta = mysqli_query($conexion,$sql);
  if(mysqli_num_rows($consulta)>0){
    $socio = mysqli_fetch_array($consulta);
    $nombre_socio     = $socio['nombre_dist_hijo']." ".$socio['ape_p_dist_hijo']." ". $socio['ape_m_dist_hijo']; 
    $cod_distribuidor    = $socio['num_asociado'];
    $whats_socio      = $socio['tel_dist_hijo'];  
    $dist_padre    = $socio['dist_padre']; 
    $nombre_padre     = $socio['nombre_dist_padre']." ".$socio['ape_p_dist_padre']." ".$socio['ape_m_dist_padre']; 
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
                          <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Distribuidor Padre Actual <span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="nombre_padre" required="required"  class="form-control col-md-7 col-xs-12" type="text" name="middle-name" placeholder="Número de asociado" value="<?php echo $nombre_padre; ?>" disabled="disabled">
                          </div>
                        </div>
                        <hr><br>

                        <table class="table table-striped table-bordered bulk_action">
                            <thead>
                              <tr>
                                <th>Ticket</th>
                                <th>Fecha</th>
                                <th>Total pedido</th>
                                <th>Total pagado</th>                                
                                <th>Acciones</th>
                              </tr>
                            </thead>                            
                            <tbody>
                              <?php 
                                include("conexion.php");
                                $sql = "SELECT * FROM `venta_caja` WHERE id_venta_caja=".$id_venta;

                                $requi = mysqli_query($conexion,$sql);
                                while ($reg=mysqli_fetch_array($requi)) {
                                  echo "<tr>";
                                    echo "<th>".$reg['id_venta_caja']."</th>";
                                    echo "<th>".$reg['fecha_venta']."</th>";
                                    // echo "<th>".$reg['nombre_dist_hijo']." ".$reg['ape_p_dist_hijo']." ".$reg['ape_m_dist_hijo']."</th>";
                                    // echo "<th>".$reg['nombre_empleado']." ".$reg['ap_pat_empleado']."</th>";
                                    $total_pedido = round($reg['monto_caja'] - $reg['dev_final'] );
                                    echo "<th>$ ".$total_pedido."</th>";
                                    echo "<th>$ ".$reg['monto_pagado']."</th>";
                                    $por_liq = $total_pedido - $reg['monto_pagado'] ;
                                    $total_abono = $reg['monto_pagado'];
                                    echo "<th><button class='btn btn-default btn-sm' onclick='checaTicket(".$reg["id_venta_caja"].");'><i class='fa fa-print'></i></button>                                    ";
                                    if ($total_pedido != $reg['monto_pagado'] ) {
                                      echo "<button class='btn btn-default btn-sm' data-toggle='modal' data-target='#modalAbonar' ><i class='fa fa-money'></i></button>";
                                    }
                                    echo "</th>";
                                    // $fechita = Date("Y-m-d");
                                    // $separar = (explode(" ",$reg['fecha_ticket']));
                                    // $fecha = $separar[0];
                                    // $hora = $separar[1];


                                    // if ($iddelempleadito ==1 && $reg['total_ticket'] !=0 ) {
                                    //   echo "<button class='btn btn-default btn-sm' onclick='eliminar(".$reg["id_ticket"].");'><i class='fa fa-trash'></i></button>
                                    // </th>";
                                    // }
                                  echo "</tr>";
                                }
                               ?>                              
                            </tbody>
                          </table>
                          <br><br>

                        <h2>Abonos:</h2>
                          <div class="col-md-7 col-sm-7 col-xs-7">
                                <div class="x_panel">
                                  <div class="x_content">
                                      <table id="tabla_abonos" align="center" class="table table-striped table-bordered bulk_action">
                                      <thead>
                                          <tr>
                                            <th>Fecha aplicado</th>
                                            <th>Tipo de Pago</th>
                                            <th>Abono</th>
                                          </tr>
                                        </thead>                            
                                        <tbody>
                                          <?php 
                                            include("conexion.php");
                                            $sql3 = "SELECT * FROM `pagos_caja` WHERE id_venta=".$id_venta;

                                            $requi3 = mysqli_query($conexion,$sql3);
                                            while ($reg=mysqli_fetch_array($requi3)) {
                                              echo "<tr>";
                                                echo "<th>".$reg['fecha_pago']."</th>";
                                                switch ($reg['forma_pago']) {
                                                  case 1:
                                                    $forma_pag = "EFECTIVO";
                                                    break;
                                                  case 2:
                                                    $forma_pag = "TARJETA";
                                                    break;
                                                  case 3:
                                                    $forma_pag = "FRACCIONADO";
                                                    break;
                                                  
                                                }
                                                echo "<th> ".$forma_pag."</th>";
                                                echo "<th>$ ".$reg['monto_pago']."</th>";
                                              echo "</tr>";
                                            }
                                           ?>                       
                                        </tbody>
                                        <tfoot>
                                          <?php
                                          echo "<tr>";
                                                echo "<th></th>";
                                                echo "<th><p style='font-weight: bold; font-size:20px;' align ='right'>Abono: </p></th>";
                                                echo "<th  style='font-weight: bold; font-size:20px;'> $ ".$total_abono."</th>";
                                              echo "</tr>";
                                          ?>                                            
                                        </tfoot>
                                    </table>
                                  </div>
                              </div>
                          </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <center><a href="consulta_cajas.php" class="btn btn-Danger "> Volver </a></center>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- Modal para edicion de datos -->
        <div class="modal fade" id="modalReimpresionTicket" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Ticket</h4>
              </div>
              <div class="modal-body">
                  <div id="ticket"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" onclick="imprimeTicket()" data-dismiss="modal">Imprimir</button>
                
              </div>
            </div>
          </div>
        </div>  

         <!-- Modal para agrega abono -->
        <div class="modal fade" id="modalAbonar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Abonar pago</h4>
              </div>
              <div class="modal-body">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="guarda_abono.php"> 
                  <center>
                    <h5>Falta por liquidar: </h5> <h4>$ <?php echo $por_liq; ?></h4>
                    <br>
                    <label for="apagar" >A abonar : </label>
                    <input name="apagar" required="required" type="number" placeholder="Digita el monto que se abonará"  >
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
                    <input type="text" name="pedido" value="<?php echo $por_liq; ?>" hidden>  
                    <input type="text" name="id_socio" value="<?php echo $_GET['id_socio']; ?>" hidden>    
                    <input type="text" name="id_venta" value="<?php echo $_GET['id_venta']; ?>" hidden>    
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

</script> 

<script type="text/javascript">
  $(document).ready(function() {
    var idticket;
      $('#tabla_tickets').DataTable( {
          "order": [[ 1, "desc" ]]
      } );
  } );
  function checaTicket(id_ticket){
    idticket=id_ticket;
    console.log("ID ticket: "+id_ticket);
    $('#ticket').empty();
    $("#modalReimpresionTicket").modal('show');
     $.ajax({
      type: "POST",
      dataType: 'html',
      url: "trae_ticket_disbetter.php",
      data: "id_ticket="+id_ticket,
      success: function(resp){
        $('#ticket').append(resp);
      }
    });  
  }

  function imprimeTicket(){
    console.log("Voy a imprimir el ticket: "+idticket);
    $.ajax({
      type: "POST",
      dataType: 'html',
      url: "trae_ticket_disbetter.php",
      data: "id_ticket="+idticket,
      success: function(resp){
        var myWindow=window.open('','','width=200,height=100');
        myWindow.document.write("<style type='text/css'>@media print {  @page { margin: 0; }  body { margin: 1cm; }}</style>");
         myWindow.document.write(resp);
         myWindow.document.close();
         myWindow.focus();
         setTimeout(function() {
            myWindow.print();
            myWindow.close();
          }, 100);
      }
    });  
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