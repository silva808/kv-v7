<?php
include ('conect.php');
$nom = $_FILES["imate"]["name"];
$ruta_provisional = $_FILES["imate"]["tmp_name"];
$carpeta = "D:/Xampp/htdocs/test/VentaMd1/img/";
$rute="../img/";
$a=$_POST["nuevoname"];
$b=$_POST["nuevoprecio"];
$k=$_POST["nuevacantidad"];
$e=$_POST["identificador"];
$e=intval($e);
$b=intval($b);
$k=intval($k);


if($nom==""){
    $consult="UPDATE inventario SET nombre='$a',precio=$b,cantidad=$k where id_pr=$e";
    $consult1="UPDATE producto SET nombre='$a',precio=$b,cantidad=$k where id_producto=$e";
    $ejecut=mysqli_query($c,$consult);  
    $ejecut1=mysqli_query($c,$consult1);
    if($ejecut){
            if($ejecut1){
            echo " Datos Actualizados Correctamente";
        }
    }
}else{
    $es_imagen = getimagesize($ruta_provisional);
    if($es_imagen !== false) {
        // Mover el archivo de la ubicación temporal a la carpeta destino
        $ruta_final = $carpeta . $nom;
        move_uploaded_file($ruta_provisional, $ruta_final);
        $ruta_valida=$rute.$nom;
    }
    $consult="UPDATE inventario SET ruta='$ruta_valida', nombre='$a',precio=$b,cantidad=$k where id_pr=$e";
    $consult1="UPDATE producto SET ruta='$ruta_valida', nombre='$a',precio=$b,cantidad=$k where id_producto=$e";
    $ejecut=mysqli_query($c,$consult);  
    $ejecut1=mysqli_query($c,$consult1);
    if($ejecut){
            if($ejecut1){
            echo " Datos Actualizados Correctamente";
            }
        }
    }

?>