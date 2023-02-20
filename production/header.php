<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Franquicias | </title>
    <style type="text/css">
      input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

input[type=number] { -moz-appearance:textfield; }
    </style>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

     <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="tabladinamica/librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="tabladinamica/librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
  </head>
  <?php 
    include("conexion.php");
      session_start();
      $iddelempleadito = $_SESSION['id_empleado'];
      $sql = "select * from empleados where id_empleado=".$iddelempleadito;
      $resultado = mysqli_query($conexion,$sql);
      while($permiso = mysqli_fetch_array($resultado)){
        $socios = $permiso['socios'];
        $caja = $permiso['caja'];       
        $productos = $permiso['productos'];
        $empleados2 = $permiso['empleados'];
        $reportes = $permiso['reportes'];
        $configuracion = $permiso['configuracion'];
        $devoluciones = $permiso['devoluciones'];

        $bikestore = $permiso['bikestore'];
        $rockbross = $permiso['rockbross'];
        $misentir = $permiso['misentir'];
        $intima = $permiso['intima'];
        $vickyform = $permiso['vickyform'];
        $cubrebocas = $permiso['cubrebocas'];
        $terra = $permiso['terra'];
        $cklass = $permiso['cklass'];
        $nice = $permiso['nice'];
        $betterware = $permiso['betterware'];
        $marykay = $permiso['marykay'];
        $dankriz = $permiso['dankriz_shoes'];
        $chiqui_mundo = $permiso['chiqui_mundo'];
        $distribucion = $permiso['distribucion'];
        $berlei = $permiso['berlei'];
      }
  ?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col ">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;  display: none;">
             <a href="index.php" class="site_title"><span> 
              <?php 
                include("conexion.php");
                $sql = "select * from configuracion where id_configuracion=".$iddelempleadito;
                $resp = mysqli_query($conexion,$sql);
                while($configuracion= mysqli_fetch_array($resp)){                  
                  echo $nombre = $configuracion['nombre'];
                }
                

              ?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/mm5.png" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bienvenid@,</span>
                <div id="iddeempleado"></div>
                <h2><div id="id_nombre_empleado1"></div></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            <?php 
              include("conexion.php");
              echo '<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">';
              echo'<div class="menu_section">';
              echo '<ul class="nav side-menu">';
              echo'<li><a href="index.php"><i class="fa fa-home"></i> Inicio</a></li>';
              if ($misentir == 1) {
                echo '<li><a><i class="fa fa-newspaper-o"></i> Mi Sentir<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
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
                      echo '<li><a href="ventas_producto_misentir.php">Venta productos</a></li>';
                      echo '<li><a href="reimpresion_ticket_misentir.php">Consultar (Reimpresión)</a></li>';
                      echo '<li><a href="apartado_producto_misentir.php">Apartado productos</a></li>';                    
                      echo '<li><a href="reimpresion_apartado_misentir.php">Consultar Apartados (Reimpresión)</a></li>';
                      echo '</ul></li>';
                      break;
                    default:
                      
                      break;
                  }
                  switch ($productos) {
                    case 1:
                      echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">';                            
                      echo '<li><a href="consulta_productos_misentir.php">Consultar productos</a></li>';
                      echo '</ul></li>';
                      break;
                    case 2:
                      echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">';
                      //echo '<li><a href="agrega_productos_misentir.php">Agregar Producto</a></li>';
                      echo '<li><a href="consulta_productos_misentir.php">Consultar productos</a></li>';
                      echo '<li><a href="sinstock_misentir.php">Sin stock Producto</a></li>';
                      echo '<li><a href="inventario_misentir.php">Subir Inventario</a></li>';
                        if ($reportes==2) {
                          echo '<li><a href="valida_inventario_misentir.php">Aprobar Inventario</a></li>';
                        }
                      echo '</ul></li>';
                    default:
                      
                      break;
                    }
                    switch ($reportes) {
                      case 2:
                        echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">';
                        //echo '<li><a href="reporte_pago_misentir.php">Reporte de Ventas Generales MiSentir</a></li>';
                        echo '<li><a href="reporte_productos_misentir.php">Reporte de Ventas </a></li>';
                        echo '</ul></li>';
                      default:
                      
                      break;
                    }
                  echo '</ul></li>';
              }
            
              if ($bikestore == 1) {
                echo '<li><a><i class="fa fa-newspaper-o"></i> Bike Store<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                  switch ($caja) {
                    case 1:
                      echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                      echo '<ul class="nav child_menu">';
                      echo '<li><a href="reimpresion_ticket_bike.php">Consultar (Reimpresión)</a></li>';
                      echo '</ul></li>';
                      break;
                    case 2:
                      echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                      echo '<ul class="nav child_menu">';
                      echo '<li><a href="ventas_producto_bike.php">Venta productos</a></li>';
                      //echo '<li><a href="ventas_producto_bikeBF.php">Venta Oferta(BF)</a></li>';
                      echo '<li><a href="reimpresion_ticket_bike.php">Consultar (Reimpresión)</a></li>';
                      //echo '<li><a href="reimpresion_ticket_bikeBF.php">Consultar (Reimpresión Ofertas)</a></li>';
                      echo '<li><a href="apartado_producto_bike.php">Apartado productos</a></li>';                    
                    echo '<li><a href="reimpresion_apartado_bike.php">Consultar Apartados (Reimpresión)</a></li>';
                      echo '</ul></li>';
                      break;
                    default:
                      
                      break;
                  }
                  switch ($productos) {
                    case 1:
                      echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">';                            
                      echo '<li><a href="consulta_productos_bike.php">Consultar productos</a></li>';
                      echo '</ul></li>';
                      break;
                    case 2:
                      echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">';
                      //echo '<li><a href="agrega_productos_bike.php">Agregar Producto</a></li>';
                      echo '<li><a href="consulta_productos_bike.php">Consultar productos</a></li>';
                      echo '<li><a href="sinstock_bike.php">Sin stock Producto</a></li>';
                      echo '<li><a href="inventario_bike.php">Subir Inventario</a></li>';
                        if ($reportes==2) {
                          echo '<li><a href="valida_inventario_bike.php">Aprobar Inventario</a></li>';
                        }
                      echo '</ul></li>';
                    default:
                      
                      break;
                  }
                  switch ($reportes) {
                  case 2:
                    echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    //echo '<li><a href="reporte_pago.php">Reporte de Ventas Generales Bike</a></li>';
                    echo '<li><a href="reporte_productos.php">Reporte de Ventas </a></li>';
                    echo '<li><a href="reporte_apartados_bike.php">Reporte de Apartados </a></li>';
                    echo '</ul></li>';
                  default:
                  
                  break;
                }
                  echo '</ul></li>';
              } 
              if ($rockbross == 1) {
                echo '<li><a><i class="fa fa-newspaper-o"></i> RockBross<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                  switch ($caja) {
                    case 1:
                      echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                      echo '<ul class="nav child_menu">';
                      echo '<li><a href="#">Consultar (Reimpresión)</a></li>';
                      echo '</ul></li>';
                      break;
                    case 2:
                      echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                      echo '<ul class="nav child_menu">';
                      echo '<li><a href="#">Venta productos</a></li>';
                      echo '<li><a href="#">Consultar (Reimpresión)</a></li>';
                      //echo '<li><a href="apartado_producto_bike.php">Apartado productos</a></li>';                    
                      //echo '<li><a href="reimpresion_apartado_bike.php">Consultar Apartados (Reimpresión)</a></li>';
                      echo '</ul></li>';
                      break;
                    default:
                      
                      break;
                  }
                  switch ($productos) {
                    case 1:
                      echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">';                            
                      echo '<li><a href="consulta_productos_bike.php">Consultar productos</a></li>';
                      echo '</ul></li>';
                      break;
                    case 2:
                      echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">';
                      //echo '<li><a href="agrega_productos_bike.php">Agregar Producto</a></li>';
                      echo '<li><a href="consulta_productos_bike.php">Consultar productos</a></li>';
                      echo '<li><a href="sinstock_bike.php">Sin stock Producto</a></li>';
                      echo '<li><a href="inventario_bike.php">Subir Inventario</a></li>';
                        if ($reportes==2) {
                          echo '<li><a href="valida_inventario_bike.php">Aprobar Inventario</a></li>';
                        }
                      echo '</ul></li>';
                    default:
                      
                      break;
                  }
                  switch ($reportes) {
                  case 2:
                    echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    //echo '<li><a href="reporte_pago.php">Reporte de Ventas Generales Bike</a></li>';
                    echo '<li><a href="reporte_productos.php">Reporte de Ventas </a></li>';
                    echo '<li><a href="reporte_apartados_bike.php">Reporte de Apartados </a></li>';
                    echo '</ul></li>';
                  default:
                  
                  break;
                }
                  echo '</ul></li>';
              } 


              if ($intima == 1) {
                echo '<li><a><i class="fa fa-newspaper-o"></i> Intima Hogar<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
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
                    echo '<li><a href="agrega_socios.php">Agregar</a></li>';
                    echo '<li><a href="consulta_socios.php">Consultar</a></li>';
                    echo '</ul></li>';
                    break;
                  default:
                    
                    break;
                }
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
                    echo '<li><a href="ventas_producto_bf.php">Venta productos Mayorista</a></li>';
                    echo '<li><a href="reimpresion_ticket_bf.php">Consultar Venta Mayorista</a></li>';
                    echo '<li><a href="apartado_producto.php">Apartado productos</a></li>';                    
                    echo '<li><a href="reimpresion_apartado.php">Consultar Apartados (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  default:
                    
                    break;
                }
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
                      echo '<li><a href="sinstock_intima.php">Sin stock Producto</a></li>';
                      echo '<li><a href="inventario_intima.php">Subir Inventario</a></li>';
                        if ($reportes==2) {
                          echo '<li><a href="valida_inventario_intima.php">Aprobar Inventario</a></li>';
                          echo '<li><a href="agrega_productos.php">Agregar Producto</a></li>';
                        }
                       
                        echo '</ul></li>';
                      default:
                        
                        break;
                }
                switch ($reportes) {
                  case 2:
                    echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    //echo '<li><a href="reporte_pago_intima.php">Reporte de Ventas Generales Intima</a></li>';
                    echo '<li><a href="reporte_productos_intima.php">Reporte de Ventas </a></li>';
                    echo '</ul></li>';
                  default:
                  
                  break;
                }
                echo '</ul></li>';
              }

              if ($vickyform == 1) {
                echo '<li><a><i class="fa fa-newspaper-o"></i>Vicky Form<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                switch ($socios) {
                    case 1:
                      echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">';
                      echo '<li><a href="consulta_socios_vicky.php">Consultar</a></li>';
                      echo '</ul></li>';
                      break;
                    case 2:
                      echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">';
                      echo '<li><a href="agrega_socios_vicky.php">Agregar</a></li>';
                      echo '<li><a href="consulta_socios_vicky.php">Consultar</a></li>';
                      echo '</ul></li>';
                      break;
                    default:
                      
                      break;
                }
                switch ($caja) {
                  case 1:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="reimpresion_ticket_vicky.php">Consultar (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  case 2:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="ventas_producto_vicky.php">Venta productos</a></li>';
                    //echo '<li><a href="ventas_producto_vicky_cubrebocas.php">Venta Cubrebobocas</a></li>';
                    echo '<li><a href="ventas_of_vicky.php">Venta oferta</a></li>';

                    echo '<li><a href="reimpresion_ticket_vicky.php">Consultar (Reimpresión)</a></li>';
                    //echo '<li><a href="ventas_desc_vicky.php">Venta productos -20%</a></li>';
                    echo '<li><a href="reimpresion_desc_vicky.php">Consultar Ofertas (Reimpresión)</a></li>';
                    echo '<li><a href="apartado_producto_vicky.php">Apartado productos</a></li>';                    
                    echo '<li><a href="reimpresion_apartado_vicky.php">Consultar Apartados (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  default:
                    
                    break;
                }
                switch ($productos) {
                      case 1:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';  
                        echo '<li><a href="consulta_productos_vicky.php">Consultar productos</a></li>';
                        echo '<li><a href="consulta_productos_of_vicky.php">Consultar Oferta</a></li>';
                        echo '</ul></li>';
                        break;
                      case 2:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                        echo '<li><a href="consulta_productos_vicky.php">Consultar productos </a></li>';
                        echo '<li><a href="consulta_productos_of_vicky.php">Consultar productos Oferta </a></li>';
                        echo '<li><a href="sinstock_vicky.php">Sin stock Producto</a></li>';
                        echo '<li><a href="inventario_vicky.php">Subir Inventario</a></li>';
                        if ($reportes==2) {
                          echo '<li><a href="valida_inventario_vicky.php">Aprobar Inventario</a></li>';
                         echo '<li><a href="agrega_productos_vicky.php">Agregar Producto</a></li>';
                        }
                       
                        echo '</ul></li>';
                      default:
                        
                        break;
                }
                // echo '<li><a><i class="fa fa-pencil fa-fw"></i> Pedidos <span class="fa fa-chevron-down"></span></a>
                // <ul class="nav child_menu">';
                // echo '<li><a href="pedido_vicky.php">Toma Pedido</a></li>';
                // echo '<li><a href="sinstock_vicky.php">Ver Pedido</a></li>';            
                // echo '</ul></li>';
            //CUBREBOCAS
              /*  switch ($productos) {
                  case 1:
                    echo '<li><a><i class="fa fa-list-alt"></i> Cubrebocas <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">';  
                    echo '<li><a href="consulta_productos_vicky.php">Consultar productos</a></li>';
                    echo '<li><a href="consulta_productos_of_vicky.php">Consultar Oferta</a></li>';
                    echo '</ul></li>';
                    break;
                  case 2:
                    echo '<li><a><i class="fa fa-heartbeat"></i> Cubrebocas <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">';
                    echo '<li><a href="ventas_producto_vicky_cubrebocas.php">Venta Cubrebocas </a></li>';
                    echo '<li><a href="consulta_productos_cubrebocas.php">Consultar productos cubrebocas </a></li>';
                    echo '<li><a href="reimpresion_ticket_cubrebocas.php">Reimpresion</a></li>';
                    //echo '<li><a href="inventario_vicky.php">Subir Inventario</a></li>';
                    if ($reportes==2) {
                     // echo '<li><a href="valida_inventario_vicky.php">Aprobar Inventario</a></li>';
                     //echo '<li><a href="agrega_productos_vicky.php">Agregar Producto</a></li>';
                    }
                   
                    echo '</ul></li>';
                  default:
                    
                    break;
            }
                switch ($reportes) {
                  case 2:
                    echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    //echo '<li><a href="reporte_pago_vicky.php">Reporte de Ventas Generales Vicky Form</a></li>';
                    echo '<li><a href="reporte_productos_vicky.php">Reporte de Ventas </a></li>';
                    echo '<li><a href="reporte_productos_of_vicky.php">Reporte de Ventas Ofertas </a></li>';
                    echo '</ul></li>';
                  default:
                  
                  break;
                }*/
                echo '</ul></li>';
              }
              //Berlei
              if ($berlei == 1) {
                echo '<li><a><i class="fa fa-newspaper-o"></i>Berlei<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                switch ($socios) {
                    case 1:
                      echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">';
                      echo '<li><a href="consulta_socios_berlei.php">Consultar</a></li>';
                      echo '</ul></li>';
                      break;
                    case 2:
                      echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">';
                      echo '<li><a href="agrega_socios_berlei.php">Agregar</a></li>';
                      echo '<li><a href="consulta_socios_berlei.php">Consultar</a></li>';
                      echo '</ul></li>';
                      break;
                    default:
                      
                      break;
                }
                switch ($caja) {
                  case 1:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="reimpresion_ticket_berlei.php">Consultar (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  case 2:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="ventas_producto_berlei.php">Venta productos</a></li>';
                    echo '<li><a href="reimpresion_ticket_berlei.php">Consultar (Reimpresión)</a></li>';
                    echo '<li><a href="apartado_producto_berlei.php">Apartado productos</a></li>';                    
                    echo '<li><a href="reimpresion_apartado_berlei.php">Consultar Apartados (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  default:
                    
                    break;
                }
                switch ($productos) {
                      case 1:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';  
                        echo '<li><a href="consulta_productos_berlei.php">Consultar productos</a></li>';
                        echo '</ul></li>';
                        break;
                      case 2:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                        echo '<li><a href="consulta_productos_berlei.php">Consultar productos </a></li>';                      
                        echo '<li><a href="sinstock_berlei.php">Sin stock Producto</a></li>';
                        echo '<li><a href="inventario_berlei.php">Subir Inventario</a></li>';
                        if ($reportes==2) {
                          echo '<li><a href="valida_inventario_berlei.php">Aprobar Inventario</a></li>';
                         echo '<li><a href="agrega_productos_berlei.php">Agregar Producto</a></li>';
                        }
                       
                        echo '</ul></li>';
                      default:
                        
                        break;
                }
                
            
                echo '</ul></li>';
              }
              //CUBREBOCAS
              if ($cubrebocas == 1) {
                echo '<li><a><i class="fa fa-heartbeat"></i>Cubrebocas<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                /*switch ($socios) {
                    case 1:
                      echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">';
                      echo '<li><a href="consulta_socios_vicky.php">Consultar</a></li>';
                      echo '</ul></li>';
                      break;
                    case 2:
                      echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">';
                      echo '<li><a href="agrega_socios_vicky.php">Agregar</a></li>';
                      echo '<li><a href="consulta_socios_vicky.php">Consultar</a></li>';
                      echo '</ul></li>';
                      break;
                    default:
                      
                      break;
                }*/
                switch ($caja) {
                  case 1:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="reimpresion_ticket_cubrebocas.php">Consultar (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  case 2:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="ventas_producto_cubrebocas.php">Venta productos</a></li>';
                    //echo '<li><a href="ventas_producto_vicky_cubrebocas.php">Venta Cubrebobocas</a></li>';
                    echo '<li><a href="reimpresion_ticket_cubrebocas.php">Consultar (Reimpresión)</a></li>';
                    //echo '<li><a href="ventas_desc_vicky.php">Venta productos -20%</a></li>';
                    echo '</ul></li>';
                    break;
                  default:
                    
                    break;
                }
                switch ($productos) {
                      case 1:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';  
                        echo '<li><a href="consulta_productos_cubrebocas.php">Consultar productos</a></li>';
                        //echo '<li><a href="consulta_productos_of_vicky.php">Consultar Oferta</a></li>';
                        echo '</ul></li>';
                        break;
                      case 2:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                        echo '<li><a href="consulta_productos_cubrebocas.php">Consultar productos </a></li>';
                        
                        if ($reportes==2) {
                          //echo '<li><a href="valida_inventario_vicky.php">Aprobar Inventario</a></li>';
                         echo '<li><a href="agrega_productos_cubrebocas.php">Agregar Producto</a></li>';
                        }
                       
                        echo '</ul></li>';
                      default:
                        
                        break;
                }
                // echo '<li><a><i class="fa fa-pencil fa-fw"></i> Pedidos <span class="fa fa-chevron-down"></span></a>
                // <ul class="nav child_menu">';
                // echo '<li><a href="pedido_vicky.php">Toma Pedido</a></li>';
                // echo '<li><a href="sinstock_vicky.php">Ver Pedido</a></li>';            
                // echo '</ul></li>';
            //CUBREBOCAS
               
                switch ($reportes) {
                  case 2:
                    echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    //echo '<li><a href="reporte_pago_vicky.php">Reporte de Ventas Generales Vicky Form</a></li>';
                    echo '<li><a href="reporte_cubrebocas.php">Reporte de Ventas </a></li>';
                   
                    echo '</ul></li>';
                  default:
                  
                  break;
                }
                echo '</ul></li>';
              }
              //TERRA
              if ($terra == 1) {
                echo '<li><a><i class="fa fa-newspaper-o"></i>Mundo Terra<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                switch ($socios) {
                    case 1:
                      echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">';
                      echo '<li><a href="consulta_socios_terra.php">Consultar</a></li>';
                      echo '</ul></li>';
                      break;
                    case 2:
                      echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">';
                      echo '<li><a href="agrega_socios_terra.php">Agregar</a></li>';
                      echo '<li><a href="consulta_socios_terra.php">Consultar</a></li>';
                      echo '</ul></li>';
                      break;
                    default:
                    
                    break;
                }
                switch ($caja) {
                  case 1:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="reimpresion_ticket_terra.php">Consultar (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  case 2:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="ventas_producto_terra.php">Venta productos</a></li>';
                    echo '<li><a href="reimpresion_ticket_terra.php">Consultar (Reimpresión)</a></li>';
                    echo '<li><a href="ventas_producto_terra_desc.php">Venta Ofertas </a></li>';
                    echo '<li><a href="reimpresion_ticket_terra_desc.php">Consultar Ofertas </a></li>';
                    //echo '<li><a href="apartado_producto_terra.php">Apartado productos</a></li>';                    
                    //echo '<li><a href="reimpresion_apartado_terra.php">Consultar Apartados (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  default:
                    
                    break;
                }
                switch ($productos) {
                      case 1:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';  
                        echo '<li><a href="consulta_productos_terra.php">Consultar productos</a></li>';
                        echo '</ul></li>';
                        break;
                      case 2:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                        echo '<li><a href="consulta_productos_terra.php">Consultar productos</a></li>';
                        echo '<li><a href="sinstock_terra.php">Sin stock Producto</a></li>';
                        echo '<li><a href="inventario_terra.php">Subir Inventario</a></li>';
                        if ($reportes==2) {
                          echo '<li><a href="valida_inventario_terra.php">Aprobar Inventario</a></li>';
                          echo '<li><a href="agrega_productos_terra.php">Agregar Producto</a></li>';
                        }
                       
                        echo '</ul></li>';
                      default:
                        
                        break;
                }
                switch ($reportes) {
                  case 2:
                    echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    //echo '<li><a href="reporte_pago_terra.php">Reporte de Ventas General Terra</a></li>';
                    echo '<li><a href="reporte_productos_terra.php">Reporte de Ventas </a></li>';
                    echo '<li><a href="consulta_saldos_terra.php">Reporte Saldos a Favor </a></li>';
                    echo '<li><a href="consulta_devoluciones_terra.php">Reporte Devoluciones </a></li>';
                    echo '</ul></li>';
                  default:
                  
                  break;
                }
                switch ($devoluciones) {
                  case 1:
                    echo '<li><a><i class="fa fa-undo"></i> Devoluciones<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    //echo '<li><a href="reporte_pago_terra.php">Reporte de Ventas General Terra</a></li>';
                    echo '<li><a href="devoluciones_producto_terra.php">Devoluciones de Mercancia </a></li>';
                    
                    echo '</ul></li>';
                  default:
                  
                  break;
                }

                echo '</ul></li>';
              }

              if ($cklass == 1) {
                echo '<li><a><i class="fa fa-newspaper-o"></i>Cklass<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                switch ($socios) {
                    case 1:
                      echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">';
                      echo '<li><a href="consulta_socios_cklass.php">Consultar</a></li>';
                      echo '</ul></li>';
                      break;
                    case 2:
                      echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">';
                      echo '<li><a href="agrega_socios_cklass.php">Agregar</a></li>';
                      echo '<li><a href="consulta_socios_cklass.php">Consultar</a></li>';
                      echo '</ul></li>';
                      break;
                    default:
                    
                    break;
                }
                switch ($caja) {
                  case 1:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="reimpresion_ticket_cklass.php">Consultar (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  case 2:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="ventas_producto_cklass.php">Venta productos</a></li>';
                    echo '<li><a href="reimpresion_ticket_cklass.php">Consultar (Reimpresión)</a></li>';
                    echo '<li><a href="ventas_producto_cklass_op.php">Venta Ofertas </a></li>';
                    echo '<li><a href="reimpresion_ticket_cklass_op.php">Consultar Ofertas </a></li>';
                    //echo '<li><a href="ventas_promo_cklass.php">Venta promociones</a></li>';
                    //echo '<li><a href="reimpresion_ticket_cklass_promo.php">Consultar Promo 3*2 (Reimpresión)</a></li>';

                    //echo '<li><a href="apartado_producto_cklass.php">Apartado productos</a></li>';                    
                    //echo '<li><a href="reimpresion_apartado_cklass.php">Consultar Apartados (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  default:
                    
                    break;
                }
                switch ($productos) {
                      case 1:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';  
                        echo '<li><a href="consulta_productos_cklass.php">Consultar productos</a></li>';
                        echo '</ul></li>';
                        break;
                      case 2:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                        echo '<li><a href="consulta_productos_cklass.php">Consultar productos</a></li>';
                        echo '<li><a href="sinstock_cklass.php">Sin stock Producto</a></li>';
                        echo '<li><a href="inventario_cklass.php">Subir Inventario</a></li>';
                        if ($reportes==2) {
                          echo '<li><a href="valida_inventario_cklass.php">Aprobar Inventario</a></li>';
                          echo '<li><a href="agrega_productos_cklass.php">Agregar Producto</a></li>';
                        }
                       
                        echo '</ul></li>';
                      default:
                        
                        break;
                }
                switch ($reportes) {
                  case 2:
                    echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    //echo '<li><a href="reporte_pago_cklass.php">Reporte de Ventas Generales Cklass</a></li>';
                    echo '<li><a href="reporte_productos_cklass.php">Reporte Ventas </a></li>';
                    echo '<li><a href="consulta_saldos_cklass.php">Reporte Saldos a Favor </a></li>';
                    echo '<li><a href="consulta_devoluciones_cklass.php">Reporte Devoluciones </a></li>';
                    echo '</ul></li>';
                  default:
                  
                  break;
                }
                switch ($devoluciones) {
                  case 1:
                    echo '<li><a><i class="fa fa-undo"></i> Devoluciones<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    //echo '<li><a href="reporte_pago_terra.php">Reporte de Ventas General Terra</a></li>';
                    echo '<li><a href="devoluciones_producto_cklass.php">Devoluciones de Mercancia </a></li>';
                    
                    echo '</ul></li>';
                  default:
                  
                  break;
                }

                echo '</ul></li>';
              }

              if ($dankriz == 1) {
                echo '<li><a><i class="fa fa-newspaper-o"></i>Dankriz Shoes<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                switch ($socios) {
                    case 1:
                      echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">';
                      echo '<li><a href="consulta_socios_dankriz.php">Consultar</a></li>';
                      echo '</ul></li>';
                      break;
                    case 2:
                      echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">';
                      echo '<li><a href="agrega_socios_dankriz.php">Agregar</a></li>';
                      echo '<li><a href="consulta_socios_dankriz.php">Consultar</a></li>';
                      echo '</ul></li>';
                      break;
                    default:
                    
                    break;
                }
                switch ($caja) {
                  case 1:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="reimpresion_ticket_dankriz.php">Consultar (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  case 2:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas DS<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="ventas_producto_dankriz.php">Venta productos</a></li>';
                    echo '<li><a href="reimpresion_ticket_dankriz.php">Consultar (Reimpresión)</a></li>';
                    //echo '<li><a href="ventas_producto_dankriz_op.php">Venta Ofertas </a></li>';
                   // echo '<li><a href="reimpresion_ticket_dankriz_op.php">Consultar Ofertas </a></li>';
                    //echo '<li><a href="apartado_producto_terra.php">Apartado productos</a></li>';                    
                    //echo '<li><a href="reimpresion_apartado_terra.php">Consultar Apartados (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  default:
                    
                    break;
                }
                //Ventas Importados
                switch ($caja) {
                  case 1:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas Importados<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="reimpresion_ticket_importado.php">Consultar Importados (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  case 2:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas Importados<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="ventas_producto_importado.php">Venta Importados</a></li>';
                    echo '<li><a href="reimpresion_ticket_importado.php">Consultar  Importados(Reimpresión)</a></li>';
                    //echo '<li><a href="ventas_producto_dankriz_op.php">Venta Ofertas </a></li>';
                   // echo '<li><a href="reimpresion_ticket_dankriz_op.php">Consultar Ofertas </a></li>';
                    //echo '<li><a href="apartado_producto_terra.php">Apartado productos</a></li>';                    
                    //echo '<li><a href="reimpresion_apartado_terra.php">Consultar Apartados (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  default:
                    
                    break;
                }
                switch ($productos) {
                      case 1:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';  
                        echo '<li><a href="consulta_productos_dankriz.php">Consultar productos</a></li>';
                        echo '</ul></li>';
                        break;
                      case 2:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                        echo '<li><a href="consulta_productos_dankriz.php">Consultar productos</a></li>';
                        echo '<li><a href="sinstock_dankriz.php">Sin stock Producto</a></li>';
                        echo '<li><a href="inventario_dankriz1.php">Subir Inventario</a></li>';
                        if ($reportes==2) {
                          echo '<li><a href="valida_inventario_dankriz.php">Aprobar Inventario</a></li>';
                          echo '<li><a href="agrega_productos_dankriz.php">Agregar Producto</a></li>';
                        }
                       
                        echo '</ul></li>';
                      default:
                        
                        break;
                }
                //IMPORTADOS
                switch ($productos) {
                  case 1:
                    echo '<li><a><i class="fa fa-list-alt"></i>Importados <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">';  
                    echo '<li><a href="consulta_productos_importados.php">Consultar productos</a></li>';
                    echo '</ul></li>';
                    break;
                  case 2:
                    echo '<li><a><i class="fa fa-list-alt"></i> Importados <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">';
                    echo '<li><a href="consulta_productos_importados.php">Consultar productos Importados</a></li>';
                    echo '<li><a href="sinstock_importados.php">Sin stock Producto Importado</a></li>';
                    echo '<li><a href="inventario_importados.php">Subir Inventario Importado</a></li>';
                    if ($reportes==2) {
                      echo '<li><a href="valida_inventario_importados.php">Aprobar Inventario Importado</a></li>';
                      echo '<li><a href="agrega_productos_importados.php">Agregar Producto Importado</a></li>';
                    }
                   
                    echo '</ul></li>';
                  default:
                    
                    break;
            }
                switch ($reportes) {
                  case 2:
                    echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    //echo '<li><a href="reporte_pago_terra.php">Reporte de Ventas General Terra</a></li>';
                    echo '<li><a href="reporte_productos_dankriz.php">Reporte de Ventas </a></li>';
                    //echo '<li><a href="consulta_saldos_dankriz.php">Reporte Saldos a Favor </a></li>';
                    echo '<li><a href="consulta_devoluciones_dankriz.php">Reporte Devoluciones </a></li>';
                    echo '</ul></li>';
                  default:
                  
                  break;
                }
                switch ($devoluciones) {
                  case 1:
                    echo '<li><a><i class="fa fa-undo"></i> Devoluciones<span class="fa fa-chevron-down"></span></a>
                     <ul class="nav child_menu">';
                    //echo '<li><a href="reporte_pago_terra.php">Reporte de Ventas General Terra</a></li>';
                    echo '<li><a href="devoluciones_producto_dankriz.php">Devoluciones de Mercancia </a></li>';
                    echo '<li><a href="consulta_devoluciones_dankriz.php">Reporte Devoluciones </a></li>';
                    
                    echo '</ul></li>';
                  default:
                  
                  break;
                }

                echo '</ul></li>';
              }

              if ($chiqui_mundo == 1) {
                echo '<li><a><i class="fa fa-newspaper-o"></i>Chiqui Mundo<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                switch ($socios) {
                    case 1:
                      echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">';
                      echo '<li><a href="consulta_socios_chiqui_mundo.php">Consultar</a></li>';
                      echo '</ul></li>';
                      break;
                    case 2:
                      echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">';
                      echo '<li><a href="agrega_socios_chiqui_mundo.php">Agregar</a></li>';
                      echo '<li><a href="consulta_socios_chiqui_mundo.php">Consultar</a></li>';
                      echo '</ul></li>';
                      break;
                    default:
                    
                    break;
                }
                switch ($caja) {
                  case 1:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="reimpresion_ticket_chiqui_mundo.php">Consultar (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  case 2:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="ventas_producto_chiqui_mundo.php">Venta productos</a></li>';
                    echo '<li><a href="reimpresion_ticket_chiqui_mundo.php">Consultar (Reimpresión)</a></li>';
                   // echo '<li><a href="ventas_producto_chiqui_mundo_op.php">Venta Ofertas </a></li>';
                   // echo '<li><a href="reimpresion_ticket_chiqui_mundo_op.php">Consultar Ofertas </a></li>';
                    //echo '<li><a href="apartado_producto_terra.php">Apartado productos</a></li>';                    
                    //echo '<li><a href="reimpresion_apartado_terra.php">Consultar Apartados (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  default:
                    
                    break;
                }
                switch ($productos) {
                      case 1:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';  
                        echo '<li><a href="consulta_productos_chiqui_mundo.php">Consultar productos</a></li>';
                        echo '</ul></li>';
                        break;
                      case 2:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                        echo '<li><a href="consulta_productos_chiqui_mundo.php">Consultar productos</a></li>';
                        echo '<li><a href="sinstock_chiqui_mundo.php">Sin stock Producto</a></li>';
                        echo '<li><a href="inventario_chiqui_mundo.php">Subir Inventario</a></li>';
                        if ($reportes==2) {
                          echo '<li><a href="valida_inventario_chiqui_mundo.php">Aprobar Inventario</a></li>';
                          echo '<li><a href="agrega_productos_chiqui_mundo.php">Agregar Producto</a></li>';
                        }
                       
                        echo '</ul></li>';
                      default:
                        
                        break;
                }
                switch ($reportes) {
                  case 2:
                    echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    //echo '<li><a href="reporte_pago_terra.php">Reporte de Ventas General Terra</a></li>';
                    echo '<li><a href="reporte_productos_chiqui_mundo.php">Reporte de Ventas </a></li>';
                    echo '<li><a href="consulta_saldos_chiqui_mundo.php">Reporte Saldos a Favor </a></li>';
                    echo '<li><a href="consulta_devoluciones_chiqui_mundo.php">Reporte Devoluciones </a></li>';
                    echo '</ul></li>';
                  default:
                  
                  break;
                }
                switch ($devoluciones) {
                  case 1:
                    echo '<li><a><i class="fa fa-undo"></i> Devoluciones<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    //echo '<li><a href="reporte_pago_terra.php">Reporte de Ventas General Terra</a></li>';
                    echo '<li><a href="devoluciones_producto_chiqui_mundo.php">Devoluciones de Mercancia </a></li>';
                    
                    echo '</ul></li>';
                  default:
                  
                  break;
                }

                echo '</ul></li>';
              }

              if ($nice == 1) {
                echo '<li><a><i class="fa fa-newspaper-o"></i>Nice<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                switch ($socios) {
                    case 1:
                      echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">';
                      echo '<li><a href="consulta_socios_nice.php">Consultar</a></li>';
                      echo '</ul></li>';
                      break;
                    case 2:
                      echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">';
                      echo '<li><a href="agrega_socios_nice.php">Agregar</a></li>';
                      echo '<li><a href="consulta_socios_nice.php">Consultar</a></li>';
                      echo '</ul></li>';
                      break;
                    default:
                    
                    break;
                }
                switch ($caja) {
                  case 1:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="reimpresion_ticket_nice.php">Consultar (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  case 2:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="ventas_producto_nice.php">Venta productos</a></li>';
                    echo '<li><a href="reimpresion_ticket_nice.php">Consultar (Reimpresión)</a></li>';
                    echo '<li><a href="apartado_producto_nice.php">Apartado productos</a></li>';                    
                    echo '<li><a href="reimpresion_apartado_nice.php">Consultar Apartados (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  default:
                    
                    break;
                }
                switch ($productos) {
                      case 1:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';  
                        echo '<li><a href="consulta_productos_nice.php">Consultar productos</a></li>';
                        echo '</ul></li>';
                        break;
                      case 2:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                      //    echo '<li><a href="agrega_productos_nice.php">Agregar Producto</a></li>';
                        echo '<li><a href="consulta_productos_nice.php">Consultar productos</a></li>';
                        echo '<li><a href="sinstock_nice.php">Sin stock Producto</a></li>';
                        echo '<li><a href="inventario_nice.php">Subir Inventario</a></li>';
                        if ($reportes==2) {
                          echo '<li><a href="valida_inventario_nice.php">Aprobar Inventario</a></li>';
                        }
                       
                        echo '</ul></li>';
                      default:
                        
                        break;
                }
                switch ($reportes) {
                  case 2:
                    echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                   // echo '<li><a href="reporte_pago_nice.php">Reporte de Ventas General</a></li>';
                    echo '<li><a href="reporte_productos_nice.php">Reporte de Ventas </a></li>';
                    echo '</ul></li>';
                  default:
                  
                  break;
                }
                echo '</ul></li>';
                
              }

              if ($betterware == 1) {
                echo '<li><a><i class="fa fa-newspaper-o"></i> Betterware<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                  switch ($socios) {
                  case 1:
                    echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">';
                    echo '<li><a href="consulta_socios_better.php">Consultar</a></li>';
                    echo '</ul></li>';
                    break;
                  case 2:
                    echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">';
                    echo '<li><a href="agrega_socios_betterware.php">Agregar</a></li>';
                    echo '<li><a href="consulta_socios_better.php">Consultar</a></li>';
                    echo '</ul></li>';
                    break;
                  default:
                    
                    break;
                }
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
                    echo '<li><a href="ventas_producto_better.php">Venta productos</a></li>';
                    echo '<li><a href="reimpresion_ticket_better.php">Consultar (Reimpresión)</a></li>';
                    // echo '<li><a href="apartado_producto.php">Apartado productos</a></li>';                    
                    // echo '<li><a href="reimpresion_apartado.php">Consultar Apartados (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  default:
                    
                    break;
                }
                switch ($productos) {
                      case 1:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';  
                        echo '<li><a href="consulta_productos_better.php">Consultar productos</a></li>';
                        echo '</ul></li>';
                        break;
                      case 2:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">';
                              echo '<li><a href="consulta_productos_better.php">Consultar productos</a></li>';
                              echo '<li><a href="inventario_better.php">Subir Inventario</a></li>';
                              if ($reportes==2) {
                                echo '<li><a href="valida_inventario_better.php">Aprobar Inventario</a></li>';
                                echo '<li><a href="agrega_productos_better.php">Agregar Producto</a></li>';
                              }
                             
                              echo '</ul></li>';
                      default:
                        
                        break;
                }
                switch ($reportes) {
                  case 2:
                    echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    //echo '<li><a href="reporte_pago_intima.php">Reporte de Ventas Generales Intima</a></li>';
                    echo '<li><a href="reporte_productos_better.php">Reporte de Ventas </a></li>';
                    echo '</ul></li>';
                  default:
                  
                  break;
                }
                echo '</ul></li>';
              }

              if ($marykay == 1) {
                echo '<li><a><i class="fa fa-newspaper-o"></i> MaryKay<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                  switch ($socios) {
                  case 1:
                    /*echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">';
                    echo '<li><a href="consulta_socios_mk.php">Consultar</a></li>';
                    echo '</ul></li>';*/
                    break;
                  case 2:
                   /*echo '<li><a><i class="fa fa-users"></i>Afiliaciones <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">';
                    echo '<li><a href="agrega_socios_mk.php">Agregar</a></li>';
                    echo '<li><a href="consulta_socios_mk.php">Consultar</a></li>';
                    echo '</ul></li>';*/
                    break;
                  default:
                    
                    break;
                }
                switch ($caja) {
                  case 1:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="reimpresion_ticket_mary.php">Consultar (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  case 2:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="ventas_producto_mary.php">Venta productos</a></li>';
                    echo '<li><a href="reimpresion_ticket_mary.php">Consultar (Reimpresión)</a></li>';
                    // echo '<li><a href="apartado_producto.php">Apartado productos</a></li>';                    
                    // echo '<li><a href="reimpresion_apartado.php">Consultar Apartados (Reimpresión)</a></li>';
                    echo '</ul></li>';
                    break;
                  default:
                    
                    break;
                }
                switch ($productos) {
                      case 1:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';  
                        echo '<li><a href="consulta_productos_mary.php">Consultar productos</a></li>';
                        echo '</ul></li>';
                        break;
                      case 2:
                        echo '<li><a><i class="fa fa-list-alt"></i> Productos <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                        echo '<li><a href="consulta_productos_mary.php">Consultar productos</a></li>';
                      echo '<li><a href="inventario_mary.php">Subir Inventario</a></li>';
                        if ($reportes==2) {
                          echo '<li><a href="valida_inventario_mary.php">Aprobar Inventario</a></li>';
                          echo '<li><a href="agrega_productos_mary.php">Agregar Producto</a></li>';
                        }
                       
                        echo '</ul></li>';
                      default:
                        
                        break;
                }
                switch ($reportes) {
                  case 2:
                    echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    //echo '<li><a href="reporte_pago_intima.php">Reporte de Ventas Generales Intima</a></li>';
                    echo '<li><a href="reporte_productos_mary.php">Reporte de Ventas </a></li>';
                    echo '</ul></li>';
                  default:
                  
                  break;
                }
                echo '</ul></li>';
              }

              if ($distribucion == 1) {
                echo '<li><a><i class="fa fa-newspaper-o"></i> Distribuciones BW<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">';
                  switch ($socios) {
                  case 1:
                    echo '<li><a><i class="fa fa-users"></i>Distribuidores <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">';
                    echo '<li><a href="consulta_distribuciones.php">Consultar Distribuciones</a></li>';
                    echo '</ul></li>';
                    break;
                  case 2:
                    echo '<li><a><i class="fa fa-users"></i>Distribuidores <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">';
                    echo '<li><a href="agrega_distribucion.php">Agregar Distribuidor</a></li>';
                    echo '<li><a href="agrega_asociado.php">Agregar Asociados</a></li>';
                    echo '<li><a href="consulta_distribuciones.php">Consultar Distribuciones</a></li>';
                    echo '</ul></li>';
                    break;
                  default:
                    
                    break;
                }
                switch ($caja) {
                  case 1:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="consulta_cajas.php">Consulta venta caja</a></li>';
                    echo '</ul></li>';
                    break;
                  case 2:
                    echo '<li><a><i class="fa fa-credit-card"></i>Ventas<span class="fa fa-chevron-down"></span></a>';
                    echo '<ul class="nav child_menu">';
                    echo '<li><a href="ventas_cajas.php">Venta caja</a></li>';
                    echo '<li><a href="consulta_cajas.php">Consulta venta caja</a></li>';
                    echo '</ul></li>';
                    break;
                  default:
                    
                    break;
                }
                switch ($reportes) {
                  case 2:
                    echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    //echo '<li><a href="reporte_pago_intima.php">Reporte de Ventas Generales Intima</a></li>';
                    echo '<li><a href="reporte_distbw.php">Reporte de Ventas </a></li>';
                    echo '<li><a href="reporte_pagos_distbw.php">Reporte de Ventas Detallado </a></li>';
                    echo '<li><a href="reporte_fondo_distbw.php">Reporte de Fondos</a></li>';
                    echo '<li><a href="reporte_fondodet_distbw.php">Reporte de Fondos Detallado</a></li>';
                    echo '</ul></li>';
                  default:
                  
                  break;
                }
                echo '</ul></li>';
              }
              
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
              if ($reportes==2) {
                echo '<li><a><i class="fa fa-list-alt"></i> Hacer Inventarios<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    echo '<li><a href="h_inventario_intima.php">Inventario Intima</a></li>';
                    echo '<li><a href="h_inventario_vicky.php">Inventario Vicky Form</a></li>';
                    echo '<li><a href="h_inventario_terra.php">Inventario Mundo Terra</a></li>';
                    echo '<li><a href="h_inventario_cklass.php">Inventario Cklass</a></li>';
                    echo '<li><a href="h_inventario_better.php">Inventario Betterware</a></li>';
                    echo '<li><a href="h_inventario_nice.php">Inventario Nice </a></li>';
                    echo '<li><a href="h_inventario_dankriz.php">Inventario Dankriz </a></li>';
                    echo '<li><a href="h_inventario_chiqui_mundo.php">Inventario Chiqui Mundo </a></li>';
                echo '</ul></li>';
              }
              if ($iddelempleadito == 4) {
                    echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes de Ventas<span class="fa fa-chevron-down"></span></a><ul class="nav child_menu">';
                      echo '<li><a href="reporte_pago_terra.php">Reporte Mundo Terra</a></li>';
                      echo '<li><a href="reporte_pago_cklass.php">Reporte Cklass</a></li>';                  
                      echo '<li><a href="reporte_pago_dankriz.php">Reporte Drankriz</a></li>';
                     echo '<li><a href="reporte_pago_importados.php">Reporte Importados</a></li>';
                     echo '<li><a href="reporte_pago_vicky.php">Reporte Vicky</a></li>';
                     echo '<li><a href="reporte_cubrebocas.php">Reporte Cubrebocass </a></li>';
                     echo '<li><a href="reporte_pago_berlei.php">Reporte Berlei </a></li>';
                     
                    //echo '<li><a href="reporte_pago.php">Reporte de Ventas Generales Bike</a></li>';
                    
                    
                      //echo '<li><a href="reporte_pago_marykey.php">Reporte MaryKey</a></li>';
                    echo '</ul></li>';
              }if ($iddelempleadito == 2 || $iddelempleadito == 11) {
               
                echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    //echo '<li><a href="reporte_pago.php">Reporte de Ventas Generales Bike</a></li>';
                    echo '<li><a href="reporte_productos.php">Reporte de Ventas </a></li>';
                    echo '<li><a href="reporte_apartados_bike.php">Reporte de Apartados </a></li>';
                    echo '</ul></li>';
              }
              if ($iddelempleadito == 3) {
                echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes de Ventas<span class="fa fa-chevron-down"></span></a><ul class="nav child_menu">';
                  echo '<li><a href="reporte_pago_intima.php">Reporte Intima</a></li>';
                  echo '<li><a href="reporte_pago_better.php">Reporte Betterware</a></li>';
                  echo '<li><a href="reporte_pago_chuiqui_mundo.php">Reporte Chiqui Mundo</a></li>';
                                   
                echo '</ul></li>';
                
              }
              if ($iddelempleadito == 7) {
                echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes de Ventas<span class="fa fa-chevron-down"></span></a><ul class="nav child_menu">';
                  echo '<li><a href="reporte_pago_vicky.php">Reporte Vicky</a></li>';
                  echo '<li><a href="reporte_pago_chuiqui_mundo.php">Reporte Chiquimundo</a></li>';                  
                  echo '<li><a href="reporte_pago_marykey.php">Reporte Marykey</a></li>';
                echo '</ul></li>';
              }
              switch ($reportes) {
                  case 2:
                    echo '<li><a><i class="fa fa-newspaper-o"></i> Reportes Totales<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">';
                    echo '<li><a href="reporte_tiendas.php">Reporte de Ventas Tiendas</a></li>';
                    echo '<li><a href="reporte_pago_total.php">Reporte de Ventas Tiendas Detallado</a></li>';
                     echo '<li><a href="reporte_facturado.php">Reporte de Ventas Facturado</a></li>';
                    // echo '<li><a href="reporte_apartado_total.php">Reporte de Apartados Tiendas</a></li>';
                    echo '<li><a href="reporte_ventas_mt4.php">Reporte de Ventas MT4</a></li>';
                    echo '<li><a href="reporte_pago_bonos.php">Reporte de Ventas (Bonos)</a></li>';
                    
                    //echo '<li><a href="reporte_pago_misentir.php">Reporte de Ventas Generales MiSentir</a></li>';
                    //echo '<li><a href="reporte_pago.php">Reporte de Ventas Generales Bike Store</a></li>';
                    //echo '<li><a href="reporte_pago_intima.php">Reporte de Ventas Generales Intima Hogar</a></li>';
                    //echo '<li><a href="reporte_pago_vicky.php">Reporte de Ventas Generales Vicky Form</a></li>';
                    //echo '<li><a href="reporte_pago_terra.php">Reporte de Ventas General Mundo Terra</a></li>';
                    //echo '<li><a href="reporte_pago_cklass.php">Reporte de Ventas Generales Cklass</a></li>';
                    echo '</ul></li>';
                    echo '<li><a href ="bitacora.php"><i class="fa fa-history"></i> Bitacora de Eventos</a>'; 

                  default:
                  
                  break;
                  
                  }
                 // if ($iddelempleadito == 1 || $iddelempleadito == 5) {
                 //  echo '<li><a href="validar_ventas_empleado.php">Validación ventas a empleados</a></li>';
                 // }

              

              echo '</ul>';
              echo '</div>';
              echo '</div>';      
            ?>
            
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <?php 
                if ($configuracion==3) {
                  echo '<a data-toggle="tooltip" data-placement="top" title="Configuración" href="configuracion.php">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                  </a>';
                }else{
                  echo '<a data-toggle="tooltip" data-placement="top">
                <span class="glyphicon glyphicon-none" aria-hidden="true"></span>
              </a>';
                }
               ?>
              
              <a data-toggle="tooltip" data-placement="top">
                <span class="glyphicon glyphicon-none" aria-hidden="true"></span>
              </a>
               <a data-toggle="tooltip" data-placement="top" title="Cambiar Contraseña" href="#"><button data-toggle="modal" data-target="#modalNuevo1" >
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span></button>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Cerrar sesión" href="#" onclick="eliminaCookie(),kill();">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <?php 
        include("modal_login.php");
         ?>

          <!-- Modal para cambiar contraseña -->
        <div class="modal fade" id="modalNuevo1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Cambiar contraseña</h4>
              </div>
              <div class="modal-body">
                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="cambiar_contraseña.php">
                  <center>
                    <label  for="password">Ingresa la nueva Contraseña</label>                
                    <input type="password" name="password1" id="password1">
                    <label  for="password">Confirma Contraseña</label>                
                    <input type="password" name="password2" id="password2">
                    <input type="text" name="id_empleado" hidden="true" value="<?php echo $iddelempleadito; ?>">
                  </center>
              </div>
              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" >
                  Actualizar
                  </button> 
                </form>                                  
              </div>
            </div>
          </div>
        </div>

        <script>
        function kill() {
          document.cookie = "empleado_gym=; max-age=0";
        }
        </script>