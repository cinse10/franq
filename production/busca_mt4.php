<?php 
    include("header.php");
    $fecha_inicio= $_POST['fecha_inicio'];
    $fecha_fin= $_POST['fecha_fin'];
?>

 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Reporte ventas MT4</h3>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>
                        Reporte De Ventas de 
                        <?php
                        echo $fecha_inicio;
                        echo " a ";
                        echo $fecha_fin;
                        ?>
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="body">
                    <div class="table-responsive" id="tblData">
                        <table class="table table-bordered table-striped table-hover" id="tablita" >
                            <thead>
                                <tr>
                                    <th>Ticket</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total x Producto</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php 
                                    include("conexion_crm.php");
                                    $totalxprod2 = 0;

                                    $kueri="SELECT comprobante FROM pagos";
                                    $resp = mysqli_query($conexion,$kueri);
                                    while($comprobante = mysqli_fetch_array($resp)){
                                        $nombre_completo = $comprobante[0];
                                        $nombre_separado = explode("-", $nombre_completo);
                                        $fecha_doc = $nombre_separado[1]."-".$nombre_separado[2]."-".$nombre_separado[3] ;
                                        $fecha_doc = date("Y-m-d", strtotime( $fecha_doc)); 
                                        $fecha_inicio = date("Y-m-d", strtotime( $fecha_inicio)); 
                                        $fecha_fin = date("Y-m-d", strtotime( $fecha_fin)); 
                                        
                                        if ($fecha_inicio <= $fecha_doc) {
                                        
                                            if ($fecha_fin >= $fecha_doc) {
                                                $id_llamada = $nombre_separado[0];
                                                $kuer="SELECT * FROM `llamadas` INNER JOIN prod_cotizacion ON prod_cotizacion.id_cotizacion=llamadas.id_cotizacion WHERE llamadas.id_empleado=9 AND llamadas.id_llamada=".$id_llamada;
                                                $resp2 = mysqli_query($conexion,$kuer);
                                                while($comprobante2 = mysqli_fetch_array($resp2)){
                                                    echo "<tr>";
                                                        echo "<td>".$comprobante2['id_llamada']."</td>";
                                                        echo "<td>".$comprobante2['nombre_producto']."</td>";
                                                        echo "<td>".$comprobante2['cantidad_producto']."</td>";
                                                        echo "<td>".$comprobante2['costo_producto']."</td>";
                                                        $totalxprod = $comprobante2['cantidad_producto']*$comprobante2['costo_producto'];
                                                        echo "<td>".$totalxprod."</td>";
                                                    echo "</tr>";
                                                    $totalxprod2 = $totalxprod2+$totalxprod;
                                                }

                                                
                                            }
                                        }
                                    }
                                    echo "<tr>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                    echo "</tr>";
                                     echo "<tr>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                        echo "<td>TOTAL: </td>";
                                        echo "<td>".$totalxprod2."</td>";
                                    echo "</tr>";
                                ?>
                                
                                   
                               
                            </tbody>
                        </table>
                    </div>
                    </div> 
                    <button onclick="exportTableToExcel('tblData')">Excel</button>                 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php 
    include("footer.php");
?>

<script type="text/javascript">

    function exportTableToExcel(tblData, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tblData);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'reporte.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>
