<?php
include ('conect.php');

$a=$_POST["idenn"];
$b=$_POST["nombree"];
$cc=$_POST["passs"];
$d=$_POST["telefonoo"];
$e=2;
$insert3="INSERT INTO users (id_users,nombre,pass,telefono,id_rol) VALUES ('$a','$b','$cc','$d','$e')";
$cont=mysqli_query($c,$insert3);
if ($cont) {
    echo "<script>alert('Registro exitoso')</script>";
} else {
    echo "<script>alert('intentalo de nuevo')</script>";
}


?>