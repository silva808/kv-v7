<?php
include ('conect.php');
$a=$_POST["iden"];
$b=$_POST["pass"];
$sql = "SELECT * FROM users WHERE id_users='$a' AND pass='$b'";
$resultado = mysqli_query($c, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $insert=mysqli_query($c,"UPDATE users SET estado='1' WHERE id_users='$a'");
    if ($insert){
        echo "hola";
    }
}
?>