<?php
include ('conect.php');
$eliminar=$_POST["delete"];
$sql = "DELETE  FROM inventario WHERE id_pr='$eliminar'";
$resultado = mysqli_query($c, $sql);

if ($resultado) {
    ?>
    <table>
    <tr>
            <th class="ocultar">ID PRODUCTO2</th>
            <th class="ocultar">PRODUCTO</th>
            <th class="ocultar">VALOR</th>
            <th class="ocultar">CANTIDAD DISPONIBLE</th>
            <th class="ocultar">ELIMINAR</th>
            <th class="ocultar">MODIFICAR</th>
    </tr>
            <?php
                $compras1="SELECT * FROM inventario";
                $efectuar1=mysqli_query($c,$compras1);
                if($efectuar1){
                    while($fill1=mysqli_fetch_array($efectuar1)){
                        ?>
                        <tr class="tr_tr">
                            <td class="campo"><?php echo $fill1["id_pr"];?></td>
                            <td class="campo"><?php echo $fill1["nombre"];?></td>
                            <td class="campo"><?php echo $fill1["precio"];?></td>
                            <td class="campo"><?php echo $fill1["cantidad"];?></td>
                            <td class="campo"><form class="miformm" data-form="<?php echo $fill1["id_pr"];?>">
                                <input type="hidden" name="delete" value="<?php echo $fill1["id_pr"];?>">
                                <button type="submit" class="but_eliminar">Eliminar</button>
                            </form></td>
                            <td class="campo"><form class="mimodify" method="post" data-form="<?php echo $fill1["id_pr"];?>">
                                <input type="hidden" name="modify" value="<?php echo $fill1["id_pr"];?>">
                                <button type="submit" id="openmodif" class="openmodif">Modificar</button>
                            </form></td>
                        </tr>
                    <?php
                    }
                }
            ?>
    </table>
    <script src="../js/cerrarmodif.js"></script>
    <script>
        $(document).ready(function() {
             // Función que se ejecuta cuando se envía un formulario
            $('.miformm').submit(function(event) {
            event.preventDefault(); // Prevenir la acción predeterminada del envío del formulario (redireccionamiento)

            var form_id = $(this).data('form'); // Obtener el identificador único del formulario

            $.ajax({
                url: 'eliminar.php', // Ruta a tu script PHP que procesará los datos
                type: 'POST', // Método HTTP que se utilizará para enviar la solicitud
                data: $(this).serialize() + '&form_id=' + form_id, // Datos que se enviarán con la solicitud (en este caso, los datos del formulario y el identificador único)
                success: function(respuesta) {
                    $('#tabel').html(respuesta); // Actualizar el contenido de la página web con la respuesta del servidor
                    const ventanamodifnews= document.getElementById('modivalores');
                    const abrirmodifnews = document.querySelectorAll('.openmodif');
            
                    abrirmodifnews.forEach((boton) => {
                        boton.addEventListener('click', () => {
                            ventanamodifnews.classList.add('prueba');
                        });
                    });
                },
            });
        });
    });
    
    $(document).ready(function() {
                // Función que se ejecuta cuando se envía un formulario
         $('.mimodify').submit(function(event) {
            event.preventDefault(); // Prevenir la acción predeterminada del envío del formulario (redireccionamiento)

            var form_id = $(this).data('form'); // Obtener el identificador único del formulario

            $.ajax({
                url: 'modificar.php', // Ruta a tu script PHP que procesará los datos
                type: 'POST', // Método HTTP que se utilizará para enviar la solicitud
                data: $(this).serialize() + '&form_id=' + form_id, // Datos que se enviarán con la solicitud (en este caso, los datos del formulario y el identificador único)
                success: function(respuesta) {


                    $('#modifventana').html(respuesta);  //Actualizar el contenido de la página web con la respuesta del servidor
                },
            });
        });
    });
    </script>
    <?php
}
?>

