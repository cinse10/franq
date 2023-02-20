<?php 
  include("header.php");
 ?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Consulta de tickets</h3>
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
                    <ul class="nav nav-pills nav-justified" role="tablist">
                      <li class="active"><a href="#ventas" aria-controls="home" role="tab" data-toggle="tab">Por Liquidar</a></li>
                      <li><a href="#consignaciones" aria-controls="home" role="tab" data-toggle="tab">Liquidado</a></li>
                    </ul>
                    <div class="tab-content">

                      <div role="tabpanel" class="tab-pane active" id="ventas">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel" >
                            <div class="x_content">
                              <table id="tabla_tickets" class="table table-striped table-bordered bulk_action">
                                <thead>
                                  <tr>
                                    <th>Ticket</th>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Empleado</th>
                                    <th>Abonado</th>
                                    <th>Total Compra</th>
                                    <th>Por liquidar</th>                                
                                    <th>Acciones</th>
                                  </tr>
                                </thead>                            
                                <tbody>
                                  <?php 
                                    include("conexion.php");
                                    $sql = "SELECT * FROM `apartado_intima` INNER JOIN empleados ON apartado_intima.id_empledo=empleados.id_empleado ORDER BY fecha_ticket DESC";

                                    $requi = mysqli_query($conexion,$sql);
                                    while ($reg=mysqli_fetch_array($requi)) {
                                      $resta = $reg['total_ticket'] - $reg['total_abono'];
                                      if ($resta!=0) {
                                        
                                        echo "<tr>";
                                        echo "<th>".$reg['id_ticket']."</th>";
                                        echo "<th>".$reg['fecha_ticket']."</th>";
                                        echo "<th>".$reg['nombre_cliente']."</th>";
                                        echo "<th>".$reg['nombre_empleado']." ".$reg['ap_pat_empleado']."</th>";
                                        echo "<th>$ ".$reg['total_abono']."</th>";
                                        echo "<th>$ ".$reg['total_ticket']."</th>";
                                        echo "<th>$ ".$resta."</th>";
                                        echo "<th><button class='btn btn-default btn-sm' onclick='checaTicket(".$reg["id_ticket"].");'><i class='fa fa-print'></i></button> 
                                          <a  href='ver_abonos_intima.php?id_ticket=".$reg["id_ticket"]."' class='btn btn-default btn-sm'><i class='fa fa-paste'></i></a>&nbsp
                                          <button class='btn btn-default btn-sm' onclick='eliminar(".$reg["id_ticket"].");'><i class='fa fa-trash'></i></button>
                                        </th>";
                                      echo "</tr>";
                                      }
                                    }
                                   ?>                              
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane" id="consignaciones">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <div class="x_panel" >
                            <div class="x_content">
                              <table id="tabla_tickets" class="table table-striped table-bordered bulk_action">
                                <thead>
                                  <tr>
                                    <th>Ticket</th>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Empleado</th>
                                    <th>Abonado</th>
                                    <th>Total Compra</th>                               
                                    <th>Acciones</th>
                                  </tr>
                                </thead>                            
                                <tbody>
                                  <?php 
                                    include("conexion.php");
                                    $sql = "SELECT * FROM `apartado_intima` INNER JOIN empleados ON apartado_intima.id_empledo=empleados.id_empleado ORDER BY fecha_ticket DESC";

                                    $requi = mysqli_query($conexion,$sql);
                                    while ($reg=mysqli_fetch_array($requi)) {
                                      $resta = $reg['total_ticket'] - $reg['total_abono'];
                                      if ($resta==0) {
                                        echo "<tr>";
                                        echo "<th>".$reg['id_ticket']."</th>";
                                        echo "<th>".$reg['fecha_ticket']."</th>";
                                        echo "<th>".$reg['nombre_cliente']."</th>";
                                        echo "<th>".$reg['nombre_empleado']." ".$reg['ap_pat_empleado']."</th>";
                                        echo "<th>$ ".$reg['total_abono']."</th>";
                                        echo "<th>$ ".$reg['total_ticket']."</th>";
                                        echo "<th><button class='btn btn-default btn-sm' onclick='checaTicket(".$reg["id_ticket"].");'><i class='fa fa-print'></i></button> 
                                          <a  href='ver_abonos_intima2.php?id_ticket=".$reg["id_ticket"]."' class='btn btn-default btn-sm'><i class='fa fa-paste'></i></a>&nbsp
                                            
                                        </th>";
                                      echo "</tr>";
                                      }
                                      
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
      url: "trae_apartado.php",
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
      url: "trae_apartado.php",
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
     alertify.confirm('Eliminar', '¿Desea eliminar apartado? ' + id_ticket, 
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
      url: "elimina_apartado.php",
      data: {'id_ticket': id_ticket, 'marca' : 3},  
      success: function(data){ 
        alert("Apartado Eliminado con éxito");
        window.location="reimpresion_apartado.php";
       
      }
    });
  }

</script>