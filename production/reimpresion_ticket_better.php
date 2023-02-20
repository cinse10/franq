<?php 
  include("header.php");
 ?> 
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Consulta de tickets Betterware</h3>
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
                                <th>Total pagado</th>                                
                                <th>Acciones</th>
                              </tr>
                            </thead>                            
                            <tbody>
                              <?php 
                                include("conexion.php");
                                $sql = "SELECT * FROM ((`tickets_betterware` INNER JOIN socios_better ON tickets_betterware.id_cliente = socios_better.id_socio) INNER JOIN empleados ON tickets_betterware.id_empledo=empleados.id_empleado) ORDER BY fecha_ticket DESC";

                                $requi = mysqli_query($conexion,$sql);
                                while ($reg=mysqli_fetch_array($requi)) {
                                  echo "<tr>";
                                    echo "<th>".$reg['id_ticket']."</th>";
                                    echo "<th>".$reg['fecha_ticket']."</th>";
                                    echo "<th>".$reg['nombre_socio']." ".$reg['ap_pat_socio']."</th>";
                                    echo "<th>".$reg['nombre_empleado']." ".$reg['ap_pat_empleado']."</th>";
                                    echo "<th>$ ".$reg['total_ticket']."</th>";
                                    echo "<th><button class='btn btn-default btn-sm' onclick='checaTicket(".$reg["id_ticket"].");'><i class='fa fa-print'></i></button>
                                    ";
                                    $fechita = Date("Y-m-d");
                                    $separar = (explode(" ",$reg['fecha_ticket']));
                                    $fecha = $separar[0];
                                    $hora = $separar[1];


                                    if ($iddelempleadito ==1 && $reg['total_ticket'] !=0 ) {
                                      echo "<button class='btn btn-default btn-sm' onclick='eliminar(".$reg["id_ticket"].");'><i class='fa fa-trash'></i></button>
                                    </th>";
                                    }
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
      url: "trae_ticket_better.php",
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
      url: "trae_ticket_better.php",
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
      url: "elimina_ticket.php",
      data: {'id_ticket': id_ticket, 'marca' : 14},  
      success: function(data){ 
        alert("Venta Eliminada con éxito");
        window.location="reimpresion_ticket_better.php";
      
      }
    });
  }

</script>