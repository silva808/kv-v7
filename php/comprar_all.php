<?php
include ('conect.php');
$a=1;
$user=$_POST["user"];
$consulta=mysqli_query($c,"SELECT * FROM carrito WHERE id_client='$user'");
if($consulta->num_rows > 0){
    while($car= $consulta->fetch_assoc()){
        $a=$a+1;
        $id=$car["id_producto"];
        $consulta1=mysqli_query($c,"SELECT * FROM inventario WHERE id_pr='$id'");
        if($consulta1){
            $ar=mysqli_fetch_array($consulta1);
            $nombre=$ar["nombre"];
            $precio=$ar["precio"];
            $disponible=$ar["cantidad"];
            $consulta2=mysqli_query($c,"SELECT * FROM carrito WHERE id_producto='$id'");
            if($consulta2){
                $con2=mysqli_fetch_array($consulta2);
                $cantidad=$con2["total"];
                if($cantidad>$disponible or $cantidad<=0){
                    echo "<sricpt>alert('no se puede efectuar la compra del producto')</script>";
                }elseif($cantidad>0 && $cantidad<=$disponible){
                    $total=$precio*$cantidad;
                    $insert=mysqli_query($c,"INSERT INTO compras (id_producto,id_cliente,cantidad,total) VALUES ('$id','$user','$cantidad','$total')");
                    if($insert){
                        $newcantidad=$disponible-$cantidad;
                        $consult=mysqli_query($c,"UPDATE inventario SET cantidad=$newcantidad where id_pr=$id");
                        $consult1=mysqli_query($c,"UPDATE producto SET cantidad=$newcantidad where id_producto=$id");
                        if($consult){
                            if($consult1){
                                $delete=mysqli_query($c,"DELETE FROM carrito WHERE id_producto='$id' AND id_client='$user'");
                                if($delete){
                                    echo $a;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
?>
<?php /*
                $carrito="SELECT * FROM carrito WHERE id_client=$a";
                $concar=mysqli_query($c,$carrito);
                if($concar){
                    while($car=mysqli_fetch_array($concar)){  
                        ?>
                    <tr class=tr_tr1>

                        <td class="campo">
                            <?php echo $car["id_producto"];?>
                        </td>
                        <td class="campo">
                            <?php echo $car["id_client"];?>
                        </td>
                        <td class="campo">
                            <?php echo $car["total"];?>
                        </td>
                        <td class="campo">
                                <input type="number" data-cantidad="<?php echo $car["id_producto"];?>" class="inputt">
                        </td>

                    </tr>
            <?php
                            }
                        }
                    
                ?>
        </table>
        <form  id="formcar" class="formcar">
                <input type="hidden" name="user" value="<?php echo $a?>">
                <button type="button" id="butcarcompra">comprar</button>
        </form>*/