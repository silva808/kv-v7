<?php
include ('conect.php');
$modificar=$_POST["modify"];


$sql1 = "SELECT * FROM inventario WHERE id_pr=$modificar";
$resultado = $c->query($sql1);
if ($resultado->num_rows > 0) {
        while($fila = $resultado->fetch_assoc()) {
?>
    
        <div class="modif_pr">
            <div class="modif_productos">
                <div class="modif_imgg">
                    <img src="<?php echo $fila['ruta']?>" alt="">
                </div>
                <form class="modif_descripcion" id="form_validar_mody" enctype="multipart/form-data">
                    <script>
                      const formmody=document.getElementById('form_validar_mody');  
                    </script>
                    <p class="modif_ig">Cambiar_imagen</p>
                    <input type="file" name="imate" id="imate" accept="image/*" >
                    <p class="modif_name">Nombre Atcual:<?php
                    echo $fila["nombre"];
                    ?></p>
                        <input type="text" placeholder="Ingrese Nuevo Nombre" name="nuevoname" id="nuevoname" >
                    <p class="modif_precio">Precio Actual :<?php
                    echo $fila["precio"];
                    ?>
                    </p>
                        <input type="Number" placeholder="Ingrese Nuevo Precio" name="nuevoprecio" id="nuevoprecio">
                    <p class="modif_cantidad">Cantidad Actual:<?php
                    echo $fila["cantidad"];
                    ?></p>
                        <input type="Number" placeholder="Ingrese Nueva Cantidad" name="nuevacantidad" id="nuevacantidad">
                        <input type="hidden" name="identificador" value="<?php echo $fila["id_pr"]?>">
                    <button type="button" class="modifenviar" id="validacionmody">
                        <p>VALIDAR</p>
                    </button>
                </form>
            </div>
        </div>
    
    
<?php
    }
}
?>
<script>

    function validarmod(){
        var nprecio = document.getElementById("nuevoprecio").value;
        var nname = document.getElementById("nuevoname").value;
        var ncanti = document.getElementById("nuevacantidad").value;
        if( nprecio == "" || nname == "" || ncanti == ""){
            alert("todos los campos son obligatorios");
            return false;
        }
            return true;

    }
    function enviarvalidacion(){
                    if(validarmod()){
                    $.ajax({
                        url: "validar_modificacion.php",
                        type: "POST",
                        data: new FormData($("#form_validar_mody")[0]),
                        processData: false,
                        contentType: false,
                        success: function(respo) {
                            alert(respo);
                    }
                    });formmody.reset();
                }
            }
                $("#validacionmody").click(function(){
                    enviarvalidacion();
                });
</script>
<script src="../js/cerrarmodif.js"></script>