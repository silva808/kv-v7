<?php
include ('conect.php');
$id_user = $_POST["iduser"];
$id = $_POST["idrol"];
$pt = $_POST["validar"];
$a = mysqli_query($c, "SELECT * FROM inventario");

if (mysqli_num_rows($a) > 0) {
    while ($fila = $a->fetch_assoc()) {
?>
                           <div class="pr">
                        <div class="productos">
                            <div class="imgg">
                                
                            <?php 
                            
                             $add=$fila["ruta"];
                             echo"<img src='$add'>";
                            ?>
                            </div>
                            <div class="descripcion">
                                <div class="cont_name">

                                    <p class="name1">
                                        
                                        <?php
                                        
                                echo $fila["nombre"];
                                ?>
                                    </p>
                                </div>
                                <div class="cont_cantidad">
                                    <p class="cantidad">Cantidad Disponible:</p>
                                    <p class="cantidad1">
                                        a
                                        <?php 
                                echo $fila["cantidad"];
                                ?>
                                    </p>
                                </div>
                                <div class="cont_precio">
                                    
                                    <p class="precio1">
                                    $
                                        <?php 
                                echo $fila["precio"];
                                ?>
                                    </p>
                                </div>

                            </div>
                            <div class="cont_forms">
                                <form method="post" class="formm" data-form="<?php echo $fila["id_pr"];?>">
                                    <input type="hidden" name="idrol" value="<?php echo $id;?>">
                                    <input type="hidden" name="iduser" value="<?php echo $id_user;?>">
                                    <input type="hidden" name="idpr" value="<?php echo $fila['id_pr'];?>">
                                    <?php if($id==1 or $id==2){ ?>
                                    <button type="submit" class="butt ">
                                        Añadir
                                    </button>
                                    <?php }?>
                                </form>
                                <form method="post" class="description" data-form="<?php echo $fila["id_pr"];?>">
                                        <input type="hidden" name="idrol" value="<?php echo $id;?>">
                                        <input type="hidden" name="iduser" value="<?php echo $id_user;?>">
                                        <input type="hidden" name="idpr" value="<?php echo $fila['id_pr'];?>">
                                        <button type="submit" class="opendes" id="o">
                                            Descripcion
                                        </button>
                                    </form>
                            </div>
                        </div>
                    </div>
<?php
    }
}

?>
<script src="../js/desall.js"></script>
<script>

        $(document).ready(function () {
            // Función que se ejecuta cuando se envía un formulario
            $('.description').submit(function (event) {
                event.preventDefault(); // Prevenir la acción predeterminada del envío del formulario (redireccionamiento)

                var form_id = $(this).data('form'); // Obtener el identificador único del formulario

                $.ajax({
                    url: 'descripcion.php', // Ruta a tu script PHP que procesará los datos
                    type: 'POST', // Método HTTP que se utilizará para enviar la solicitud
                    data: $(this).serialize() + '&form_id=' + form_id, // Datos que se enviarán con la solicitud (en este caso, los datos del formulario y el identificador único)
                    success: function (respuesta) {
                        $('#contain_product').html(respuesta); // Actualizar el contenido de la página web con la respuesta del servidor
                    },
                });
            });
        });
        $(document).ready(function () {
            // Función que se ejecuta cuando se envía un formulario
            $('.close_description').submit(function (event) {
                event.preventDefault(); // Prevenir la acción predeterminada del envío del formulario (redireccionamiento)

        

                $.ajax({
                    url: 'nada.php', // Ruta a tu script PHP que procesará los datos
                    type: 'POST', // Método HTTP que se utilizará para enviar la solicitud
                    data: $('.close_description'), // Datos que se enviarán con la solicitud (en este caso, los datos del formulario y el identificador único)
                    success: function(data) {
                    $('#contain_product').html(data);
                    },
                });
            });
        });
        $(document).ready(function () {
            // Función que se ejecuta cuando se envía un formulario
            $('.formm').submit(function (event) {
                event.preventDefault(); // Prevenir la acción predeterminada del envío del formulario (redireccionamiento)

                var form_id = $(this).data('form'); // Obtener el identificador único del formulario

                $.ajax({
                    url: 'carrito.php', // Ruta a tu script PHP que procesará los datos
                    type: 'POST', // Método HTTP que se utilizará para enviar la solicitud
                    data: $(this).serialize() + '&form_id=' + form_id, // Datos que se enviarán con la solicitud (en este caso, los datos del formulario y el identificador único)
                    success: function (respuesta) {
                        $('#tabel_carrito').html(respuesta); // Actualizar el contenido de la página web con la respuesta del servidor
                    },
                });
            });
        });
</script>