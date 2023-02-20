<?php 

echo '¡Hola ' . htmlspecialchars($_COOKIE["empleado_gym"]) . '!';

if($_COOKIE["empleado_gym"]== "Jarely Luna"){
    include("conexion2.php");
    
}elseif($_COOKIE["empleado_gym"]== "Nanauatzin Perez"){
    include("conexion3.php");
}else{
    include("conexion.php");
}


?>
?>