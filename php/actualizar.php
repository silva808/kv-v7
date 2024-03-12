<?php
include ('conect.php');
$id=$_POST["in_id"];
$can=$_POST["can"];

$ids=explode('-',$id);
$id_producto=$ids[0];
$id_cliente=$ids[1];
$actualizar=mysqli_query($c,"UPDATE carrito SET total='$can' WHERE id_producto='$id' AND id_client='$id_cliente'");
if($actualizar){

}else{
    echo "nooo";
}
?>