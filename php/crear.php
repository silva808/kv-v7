<?php
include ('conect.php');
$nom = $_FILES["imate"]["name"];
$tipo = $_FILES["imate"]["type"];
$ruta_provisional = $_FILES["imate"]["tmp_name"];
$size = $_FILES["imate"]["size"];
$carpeta = "/home/c1601882/public_html/kevin/VentaV7/img/";
$rute="../img/";

$id_admin=$_POST["id_admin"];
$nombre=$_POST["nombre"];
$precio=$_POST["precio"];
$cantidad=$_POST["cantidad"];
$id=$_POST["id"];
$descripcion=$_POST["descripcion"];
$precio=intval($precio);
$cantidad=intval($cantidad);

$consultg=mysqli_query($c,"SELECT * FROM inventario WHERE nombre='$nombre'");
if($consultg){
    if($consultg->num_rows>0){
        echo "<script>alert('Ya existe un producto con este nombre')</script>";
    }else{

    
    /*
    while($valid=mysqli_fetch_array($consultg)){
        $validarname=$valid['nombre'];
        if($validarname==$nombre){
            echo "<script>alert('Ya existe un producto con este nombre')</script>";
        }*/
    



    // Verificar que el archivo subido es una imagen
$es_imagen = getimagesize($ruta_provisional);
if($es_imagen !== false) {
    // Mover el archivo de la ubicación temporal a la carpeta destino
    $ruta_final = $carpeta . $nom;
    move_uploaded_file($ruta_provisional, $ruta_final);
    $ruta_valida=$rute.$nom;

}


$insert="INSERT INTO producto (rut,ruta,nombre,precio,cantidad,descripcion,id_admin) VALUES ('$ruta_final','$ruta_valida','$nombre','$precio','$cantidad','$descripcion','$id_admin')";
$arty=mysqli_query($c,$insert);
if ($arty) {
    $id_inventario=$c->insert_id;
    $insert1="INSERT INTO inventario (id_pr,rut,ruta,nombre,precio,cantidad,descripcion) VALUES ('$id_inventario','$ruta_final','$ruta_valida','$nombre','$precio','$cantidad','$descripcion')";    
    if ($c->query($insert1) === TRUE) { 
        echo "<script>alert('Datos insertados correctamente')</script>";
    }       
} else {
    echo "Error al insertar los datos: " . $conn->error;
}
}


$sql1 = "SELECT * FROM inventario";
$resultado = $c->query($sql1);
if ($resultado->num_rows > 0) {
        while($fila = $resultado->fetch_assoc()) {
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
                                    <input type="hidden" name="iduser" value="<?php echo $a;?>">
                                    <input type="hidden" name="idpr" value="<?php echo $fila['id_pr'];?>">
                                    <?php if($id==1 or $id==2){ ?>
                                    <button type="submit" class="butt ">
                                        Añadir
                                    </button>
                                    <?php }?>
                                </form>
                                <form method="post" class="description" data-form="<?php echo $fila["id_pr"];?>">
                                        <input type="hidden" name="idrol" value="<?php echo $id;?>">
                                        <input type="hidden" name="iduser" value="<?php echo $a;?>">
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
        }
    

?>
<script src="../js/descripciont.js"></script>
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
</script>