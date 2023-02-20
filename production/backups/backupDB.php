<?php
    $host = "localhost";
    $nombre = "franq";
    $user = "perla_cuesta";
    $pass = "c1ns3P3rl4";
  
    $fecha = date('Ymd_His');

    $nombre_sql = $nombre . '_' .$fecha.'.sql';
    $dump = "mysqldump -h$host -u$user -p$pass $nombre > $nombre_sql";

    exec($dump);
    $zip = new ZipArchive();

    $nombre_zip = $nombre.'_'.$fecha.'.zip';

    if ($zip->open($nombre_zip, ZipArchive::CREATE) === true) {
        $zip->addFile($nombre_sql);
        $zip->close();
        unlink($nombre_sql);
       
    }



?>