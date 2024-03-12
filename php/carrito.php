<?php
include ('conect.php');
$a=0;
$idproducto=$_POST["idpr"];
$idcliente=$_POST["iduser"];
$validar=mysqli_query($c,"SELECT * FROM carrito WHERE id_producto='$idproducto' AND id_client='$idcliente'");
if(mysqli_num_rows($validar)>0){
    $a++;
}
    if(mysqli_num_rows($validar)<=0){
    $consulta=mysqli_query($c,"INSERT INTO carrito (id_producto,id_client,total) VALUES ('$idproducto','$idcliente',1)");
    if($consulta){
        echo "<script>alert('añadido correctamente')</script>";
    }
}
if($a!=0){
    echo "<script>alert('ya has añadido este producto al carrito')</script>";
}
        ?>
        <table>
        <tr>
                <th>ID PRODUCTO</th>
                <th>NOMBRE</th>
                <th>VALOR</th>
                <th>CANTIDAD</th>
                <th>ElIMINAR</th>
            </tr>
            <?php
                $carrito="SELECT * FROM carrito WHERE id_client=$idcliente";
                $concar=mysqli_query($c,$carrito);
                if($concar){
                    while($car=mysqli_fetch_array($concar)){  
                        $id_pp=$car["id_producto"];
                        $carrito1=mysqli_query($c,"SELECT * FROM inventario WHERE id_pr='$id_pp'");
                        if($carrito1){
                            while($car1=mysqli_fetch_array($carrito1)){ 
                        
                        ?>
                    <tr class=tr_tr1>

                        <td class="campo">
                            <?php echo $car["id_producto"];?>
                        </td>
                        <td class="campo">
                            <?php echo $car1["nombre"];?>
                        </td>
                        <td class="campo">
                            <?php echo $car1["precio"];?>
                        </td>
                        <td class="campo">
                                <input type="number" placeholder="1" data-cantidad="<?php echo $car["id_producto"]."-".$idcliente;?>" class="inputt">
                        </td>
                        <td class="campo">
                            <form class="delete_car" method="post" data-form="<?php echo $car["id_producto"];?>">
                                <input type="hidden" name="deletecar" value="<?php echo $car["id_producto"]."-".$idcliente;?>">
                                <button type="submit" class="but_eliminar">Eliminar</button>
                            </form>
                        </td>

                    </tr>
                    
                    
            <?php
                            }
                        }
                    }
                }
                        else{
                        echo "<script>alert('no')</script>";
                    }
            
                ?>
                </table>
                <script>
                            $(document).ready(function () {
            // Función que se ejecuta cuando se envía un formulario
            $('.delete_car').submit(function (event) {
                event.preventDefault(); // Prevenir la acción predeterminada del envío del formulario (redireccionamiento)

                var form_id = $(this).data('form'); // Obtener el identificador único del formulario

                $.ajax({
                    url: 'delete_pcar.php', // Ruta a tu script PHP que procesará los datos
                    type: 'POST', // Método HTTP que se utilizará para enviar la solicitud
                    data: $(this).serialize() + '&form_id=' + form_id, // Datos que se enviarán con la solicitud (en este caso, los datos del formulario y el identificador único)
                    success: function (respuesta) {
                        $('#tabel_carrito').html(respuesta); // Actualizar el contenido de la página web con la respuesta del servidor
                    },
                });
            });
        });
                </script>
