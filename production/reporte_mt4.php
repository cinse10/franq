<?php 
    include("header.php");
    $hoy = date("Y-m-d");
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
                    <h2>Reportes</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form id="form_validation" method="POST" novalidate="novalidate" action="busca_mt4.php" wtx-context="F60AA3ED-2E67-4FD2-A232-D95BC36D7736">
                        <div class="form-group ">
                            <div class="form-line">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha Inicio:  <span class="required">*</span>
                                    </label>
                                <?php 
                                echo '<input type="date"  name="fecha_inicio" required="true" aria-required="true" value="'.$hoy.'" max="'.$hoy.'">';
                                 ?>
                            </div>
                        </div><br><br><br>
                        <div class="form-group ">
                            <div class="form-line">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Fecha Fin:  <span class="required">*</span>
                                    </label>
                                
                                <?php 
                                echo '<input type="date" name="fecha_fin" required="true" aria-required="true" value="'.$hoy.'" max="'.$hoy.'">';
                                 ?>
                                
                            </div>
                        </div><br><br>
                        <button class="btn btn-primary waves-effect" type="submit">Buscar</button>
                    </form>                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
	
<?php 
    include("footer.php");
?>