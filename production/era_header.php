<!-- sidebar menu Linea 323-->

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>
                      <?php 
                        switch ($socios) {
                          case 1:
                            echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">';
                            echo '<li><a href="consulta_socios.php">Consultar</a></li>';
                            echo '</ul></li>';
                            break;
                          case 2:
                            echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                                  <ul class="nav child_menu">';
                            echo '<li><a href="consulta_socios.php">Consultar</a></li>';
                            echo '<li><a href="agrega_socios.php">Agregar</a></li>';
                            echo '</ul></li>';
                            break;
                          default:
                            
                            break;
                        }
                       ?>
                      <!--<li><a href="expediente_digital.php">Expediente Digital</a></li> -->
                  
                      <?php 
                        switch ($caja) {
                          case 1:
                            echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                            echo '<ul class="nav child_menu">';
                            echo '<li><a href="reimpresion_ticket.php">Consultar (Reimpresión)</a></li>';
                            echo '</ul></li>';
                            break;
                          case 2:
                            echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                            echo '<ul class="nav child_menu">';
                            echo '<li><a href="ventas_producto.php">Venta productos</a></li>';
                            echo '<li><a href="reimpresion_ticket.php">Consultar (Reimpresión)</a></li>';
                            echo '</ul></li>';
                            break;
                          default:
                            
                            break;
                        }
                       ?>
                 
                    </ul>
                  </li>                  
                </ul>
              </div>
              <div class="menu_section" id="menu_admin">
                <h3>Administrador</h3>
                <ul class="nav side-menu">
                    
                      <?php 
                        switch ($productos) {
                          case 1:
                            echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';                            
                            echo '<li><a href="consulta_productos.php">Consultar productos</a></li>';
                            echo '</ul></li>';
                            break;
                          case 2:
                            echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                            echo '<li><a href="consulta_productos.php">Consultar productos</a></li>';
                            echo '<li><a href="agrega_productos.php">Agregar Producto</a></li>';
                            echo '</ul></li>';
                          default:
                            
                            break;
                        }
                       ?>
                  
                      <?php 
                        switch ($empleados2) {
                          case 1:
                            echo '<li><a><i class="fa fa-user"></i> Empleados <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                            echo '<li><a href="consulta_empleados.php">Consultar Empleados</a></li>';
                            echo '</ul></li>';
                            break;
                          case 2:
                            echo '<li><a><i class="fa fa-user"></i> Empleados <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                            echo '<li><a href="consulta_empleados.php">Consultar Empleados</a></li>';
                            echo '<li><a href="agrega_empleados.php">Agregar Empleado</a></li>';
                            echo '</ul></li>';
                            
                          default:
                            
                            break;
                        }
                       ?>
                  
                      <?php 
                        switch ($reportes) {
                          case 2:
                            echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                            echo '<li><a href="reporte_pago.php">Reporte de pagos</a></li>';
                            echo '</ul></li>';
                          default:
                            
                            break;
                        }
                       ?>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->