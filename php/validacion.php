<?php
include ('conect.php');
$pedir=$_POST["pedircant"];
$id_producto=$_POST["idppr"];
$direccion=$_POST["direc"];
$id_user=$_POST["iduser"];
$pedir=intval($pedir);
$id_producto=intval($id_producto);
var_dump($pedir);
var_dump($id_producto);



$sql = "SELECT cantidad,precio FROM inventario WHERE id_pr='$id_producto'";
$resultado = $c->query($sql);
if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $cantidad=$fila["cantidad"];
        $price=$fila["precio"];
        $cantidad=intval($cantidad);
        $price=intval($price);
        var_dump($cantidad);
        echo "<br>";
        if($pedir>$cantidad or $pedir<=0){
            echo " no se puede efectuar una compra";

        }else if($pedir>0 && $pedir<$cantidad){
            $total=$price*$pedir;
            $nuevacant=$cantidad-$pedir;
            echo "Se puede efectuar una compra.....Total:<br>";
            var_dump($total);
            echo"<br><br>";
            var_dump($nuevacant);
            echo"<br><br>";
            var_dump($id_user);
            $consult="UPDATE producto SET cantidad=$nuevacant where id_producto=$id_producto";
            $res=mysqli_query($c,$consult);
            $consult1="UPDATE inventario SET cantidad=$nuevacant where id_pr=$id_producto";
            $res1=mysqli_query($c,$consult1);
            if ($res && $res1){
                echo"siuu";
            }
            $insertt="INSERT INTO compras(id_producto,id_cliente,cantidad,total,fecha,direccion) VALUES ('$id_producto','$id_user','$pedir','$total',NOW(),'$direccion')";
            $fact=mysqli_query($c,$insertt);
            if($fact){
                echo"datos insertados correctamente";
                $id_compra=$c->insert_id;
                $datos="SELECT * FROM compras WHERE id_compra=$id_compra";
                $fett=mysqli_query($c,$datos);
                if($fett->num_rows>0){
                    $dattos=$fett->fetch_assoc();
            ?>
            <div class="fact_title">TU FACTURA</div>
            <div class="fecha">
                <?php
                    echo $dattos["fecha"];
                ?>
            </div>
            <div class="info_product">
            <?php
                    echo $dattos["id_cliente"];
                ?>
            </div>
            <div class="tottal">
            <?php
                    echo $dattos["total"];
                ?>
            </div>
            <?php
                }
            }
        }

    }
?>
