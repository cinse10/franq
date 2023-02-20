<?php 
/*
include("conexion.php");

if(!isset($_POST['consulta'])) exit('No se recibio el valor');

function search() {
    include("conexion.php");
    $search = $mysqli->real_escape_string($_POST['consulta']);
    $query = mysqli_query($conexion,"SELECT * from dankriz where modelo_ck LIKE '%$search%'");
    $res = $mysqli->query($query);

    while($row = $res->fetch_array(MYSQLI_ASSOC)){
        echo "<a href=''>$row[modelo_ck]</a>";
        

    }
}
    search();*/

include("conexion.php");
    $salida = "";
    $query = "";

    if (isset($_POST['consulta'])) {
        $q = $mysqli->real_escape_string($_POST['consulta']);
        $query = "SELECT modelo_ck, marca, color, talla, codigo_barras_producto FROM dankriz WHERE modelo_ck LIKE '%".$q."%'";
    }
    $resultado = $mysqli->query($query);

    
    if ($resultado->num_rows >0) {
        
        
        $salida.="<table class='tabla_datos'>
    
                <tbody>";
        while ($fila = $resultado->fetch_assoc()){
            /*$salida.="<tr id ='registra'> 
                    <td> ".$fila['modelo_ck']." </td>
                    <td>".$fila['marca']."</td>
                    <td>".$fila['color']."</td>
                    <td>".$fila['talla']."</td>
                     <div onclick='Registrar();'>".$fila['codigo_barras_producto']."</div>
                    </tr>"; */
                    echo '<option value= "'.$fila['codigo_barras_producto'].'">'.$fila['modelo_ck'].' </option>';
        }
        $salida.="</tbody> </table>";
    }else{
        $salida.="No hay datos";
    }
    echo $salida;

?>

 <script>
     
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

    }); 
    Limpiar();     
  } 
</script>