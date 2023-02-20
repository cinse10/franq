<?php 
  include("header.php");
 ?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Consulta de tickets Pedidos Betterware</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tickets</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_content">
                          <table id="tabla_tickets" class="table table-striped table-bordered bulk_action">
                            <thead>
                              <tr>
                                <th>Ticket</th>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Empleado</th>
                                <th>Total pedido</th> 
                                <th>Total pagado</th>                                
                                <th>Acciones</th>
                              </tr>
                            </thead>                            
                            <tbody>
                              <?php 
                                include("conexion.php");
                                $sql = "SELECT * FROM `venta_caja` INNER JOIN dist_hijo ON venta_caja.id_dist_hijo = dist_hijo.id_dist_hijo INNER JOIN empleados ON venta_caja.id_empleado = empleados.id_empleado ORDER BY fecha_venta DESC";

                                $requi = mysqli_query($conexion,$sql);
                                while ($reg=mysqli_fetch_array($requi)) {
                                  echo "<tr>";
                                    echo "<th>".$reg['id_venta_caja']."</th>";
                                    echo "<th>".$reg['fecha_venta']."</th>";
                                    echo "<th>".$reg['nombre_dist_hijo']."</th>";
                                    echo "<th>".$reg['nombre_empleado']." ".$reg['ap_pat_empleado']."</th>";
                                    $total_pedido = round($reg['monto_caja'] - $reg['dev_final']);
                                    echo "<th>$ ".$total_pedido."</th>";
                                    echo "<th>$ ".$reg['monto_pagado']."</th>";
                                    echo "<th><button class='btn btn-default btn-sm' onclick='checaTicket(".$reg["id_venta_caja"].");'><i class='fa fa-print'></i></button>";
                                    if ($total_pedido != $reg['monto_pagado'] ) {
                                      echo "<a class='btn btn-default btn-sm' href='ver_cuenta.php?id_socio=".$reg["id_dist_hijo"]."&id_venta=".$reg["id_venta_caja"]."'><i class='fa fa-money'></i></a> &nbsp;";
                                    }
                                    if ($iddelempleadito ==6 && $reg['total_ticket'] !=0  ) {
                                      echo "<button class='btn btn-default btn-sm' onclick='eliminar(".$reg["id_venta_caja"].");'><i class='fa fa-trash'></i></button>
                                      </th>";
                                    }
                                    echo "</th>";
                                  echo "</tr>";
                                }
                               ?>                              
                            </tbody>
                          </table>
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
        
<?php 
  include("footer.php");
?>
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

  function eliminar(id_ticket) {
     alertify.confirm()
     alertify.confirm('Eliminar', '¿Desea eliminar venta?', 
      function(){ 
        manda_eliminar(id_ticket);
      }
      , function(){ 
      }).set('labels', {ok:'Aceptar!', cancel:'Cancelar!'});
  }

   function manda_eliminar(id_ticket){
    var id_ticket = id_ticket;
    
    $.ajax({
      type: "POST",
      url: "elimina_caja.php",
      data: {'id_ticket': id_ticket},  
      success: function(data){ 
        alert("Venta Eliminada con éxito");
        window.location="consulta_cajas.php";
      
      }
    });
  }
</script>