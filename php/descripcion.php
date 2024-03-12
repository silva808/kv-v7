<?php
include ('conect.php');

$modificar=$_POST["idpr"];
$a=$_POST["iduser"];
$id=$_POST["idrol"];

$sql1 = "SELECT * FROM inventario WHERE id_pr=$modificar";
$resultado = $c->query($sql1);
if ($resultado->num_rows > 0) {
        while($fila = $resultado->fetch_assoc()) {
?>

<div class="contain_descripcion">
    <div class="parte1_descripcion">
            <div class="img_descripcion">
                <img src="<?php echo $fila['ruta']?>" alt="">
            </div>
            <div class="datos_descripcion">
                <p class="nombre_descripcion">
                    <?php
                        echo $fila['nombre'] 
                    ?>
                </p>
                <p class="cantidad_descripcion">
                    Cantidad Disponible : <?php echo $fila['cantidad']?>
                </p>
                <p class="precio_descripcion">
                    
                    <?php
                        echo "$".$fila['precio']
                    ?>
                </p>
                <div class="anadir_descripcion">
                <form method="post" class="formm" data-form="<?php echo $fila["id_pr"];?>">
                                    <input type="hidden" name="idrol" value="<?php echo $id;?>">
                                    <input type="hidden" name="iduser" value="<?php echo $a;?>">
                                    <input type="hidden" name="idpr" value="<?php echo $fila['id_pr'];?>">
                                    <?php if($id==1 or $id==2){ ?>
                                    <button type="submit" class="butt_description">
                                        Añadir al carrito
                                    </button>
                                    <?php } if($id==0){?>
                                        <button type="button" class="iniciar_sesion1" id="iniciar_sesion2">
                                        Añadir al carrito
                                    </button>
                                        <?php
                                    }
                                        ?>
                                </form>
                </div>
            </div>
    </div>
    <div class="parte2_descripcion">
        <div class="titulo_descripcion">
           <p> DESCRIPCION </p>
        </div>
        <div class="detalles_descripcion">
            <?php
            echo $fila["descripcion"]
            ?>
        </div>
    </div>
</div>
<?php
    }
}
?>
<script src="../js/cpp.js"></script>
<script>
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