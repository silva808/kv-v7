
<?php
include ('conect.php');
session_start();
    $a=$_POST["iden"];
    $b=$_POST["pass"];
    

    $sql = "SELECT * FROM users WHERE id_users='$a' AND pass='$b'";
    $resultado = mysqli_query($c, $sql);

    if (mysqli_num_rows($resultado) > 0) {

        $rol=mysqli_fetch_array($resultado);
        $nane=$rol["nombre"];
        $id=$rol["id_rol"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inicio.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>

<body>

    <header>
        <div class="tu_drogeria">
            <div class="parte1" id="parte1">
            <?php
                    
                        ?>
            </div>
        </div>
        <div class="menuu">
            <div class="cont_menuu">
                <div class="logo_farma">
                    
                </div>

                <form action="" method="post" id="buscar">
                    <input type="text" placeholder="Buscador" name="bus">
                    <input type="hidden" name="idrol" value="<?php echo $id;?>">
                    <input type="hidden" name="iduser" value="<?php echo $ll;?>">
                    <button type="button" id="buscad"><span class="material-symbols-outlined">
                            search
                        </span>
                    </button>
                </form>

                <div class="iniciar_sesion" id="iniciar_sesion">
                    <span id="aa" class="material-symbols-outlined">
                        account_circle
                    </span>
                    <?php
                    if($id==0){
                        ?>
                    <p>Iniciar Sesion</p>
                    <?php
                    }elseif($id==1 or $id==2){
                        ?>
                    <p><?php echo "$nane"; ?></p>
                    <?php
                    }
                        ?>
                        
                </div>
                <div class="carritto" id="carrito">
                    <span class="material-symbols-outlined">
                        shopping_cart
                    </span>
                    <p>Tu Carrito</p>
                </div>
            </div>
        </div>
    </header>
    <br>
    <main class="contenedor">
    <?php /*
        if($pt==1){
    ?>
        <video autoplay muted loop id="video-background">
        <source src="../img/vid.mp4" type="video/mp4">
        </video>
        <style>
            #video-background {
                position: fixed;
                right: 0;
                bottom: 0;
                min-width: 100%;
                min-height: 100%;
                z-index: -1;
                }
        </style>
    <?php 
    }*/
    ?>
        <!-----CONTENIDO DE MEDICAMENTOS-->
        <section class="contain_main">
            <div class="dash" id="dash">
                <p>Dashboard</p>
                <?php
                if($id==1 or $id==2){ ?>
                <button type="button" id="abrirhisto" class="abrirhisto">Mis Compras</button>
                <?php
                }?>
                <form class="allpro" id="allpr">
                    <input type="hidden" name="idrol" value="<?php echo $id;?>">
                    <input type="hidden" name="iduser" value="<?php echo $a;?>">
                    <input type="hidden" name="validar" value="<?php /*echo $pt*/;?>">
                    <button type="button" id="all">Todos los productos</button>
                </form>
                <?php
                if($id==1){ ?>
                <button type="button" id="moddificar" class="moddificar">Modificar</button> 
                <?php
                }
                ?>
            </div>

            <div class="contain_productt">
                <nav>
                    <div class="contain_nav">
                        <p>Medicamentos</p>
                        <?php
                        if($id==1){ ?>
                        <button type="button" id="anexar" class="anexar">
                            <span class="material-symbols-outlined">
                                add
                            </span>
                            <p> Add Product</p>
                        </button>
                        <?php
                        } 
                        ?>
                    </div>
                </nav>
                <section id="sect1">
                    
                    <?php      
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
            ?>
                </section>
            </div>
        </section>
        
        <?php
            if($id==1){
        ?>
        <div class="modificar" id="modificar">
            <div class="titcompra">
                <h2>PRODUCTOS</h2>
                <div class="botcerrar">
                    <button type="button" id="elimpr" class="elimpr">
                        <span class="material-symbols-outlined">
                            cancel
                        </span>
                    </button>
                </div>
            </div>
            <br>
            <table>
                <tr>
                    <th class="thmostrar">ID PRODUCTO</th>
                    <th class="thmostrar">PRODUCTO</th>
                    <th class="thmostrar">VALOR</th>
                    <th class="thmostrar">CANTIDAD DISPONIBLE</th>
                    <th class="thmostrar">ELIMINAR</th>
                    <th class="thmostrar">MODIFICAR</th>
                </tr>
            </table>
            <div class="tabel" id="tabel">
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
                        <td class="campo">
                            <?php echo $fill1["id_pr"];?>
                        </td>
                        <td class="campo">
                            <?php echo $fill1["nombre"];?>
                        </td>
                        <td class="campo">
                            <?php echo $fill1["precio"];?>
                        </td>
                        <td class="campo">
                            <?php echo $fill1["cantidad"];?>
                        </td>
                        <td class="campo">
                            <form class="miformm" method="post" data-form="<?php echo $fill1["id_pr"];?>">
                                <input type="hidden" name="delete" value="<?php echo $fill1["id_pr"];?>">
                                <button type="submit" class="but_eliminar">Eliminar</button>
                            </form>
                        </td>
                        <td class="campo">
                            <form class="mimodify" method="post" data-form="<?php echo $fill1["id_pr"];?>">
                                <input type="hidden" name="modify" value="<?php echo $fill1["id_pr"];?>">
                                <button type="submit" id="openmodif" class="openmodif">Modificar</button>
                            </form>
                        </td>
                    </tr>
                    <?php 
                                    }
                                }
                                ?>
                </table>
            </div>
        </div>
        <?php 
            }
        if($id==2 or $id==1){
        ?>
        <div class="historial" id="historial">
            <br>
            <div class="titcompra">
                <h2>Mis Compras</h2>
                <div class="botcerrar">
                    <button type="button" id="cercompras" class="cercompras">
                        <span class="material-symbols-outlined">
                            cancel
                        </span>
                    </button>
                </div>
            </div>
            <br>
            <table>
                <tr>
                    <th>ID FACTURA</th>
                    <th>ID PRODUCTO</th>
                    <th>PRODUCTO</th>
                    <th>VALOR</th>
                    <th>CANTIDAD</th>
                    <th>FECHA</th>
                    <th>DIRECCION</th>
                    <th>TOTAL</th>
                </tr>
                <?php
                    $compras="SELECT * FROM compras WHERE id_cliente=$a";
                    $efectuar=mysqli_query($c,$compras);
                    if($efectuar){
                        while($fill=mysqli_fetch_array($efectuar)){
                            $name=$fill["id_producto"];
                            $devolver="SELECT * FROM producto WHERE id_producto=$name";
                            $ef=mysqli_query($c,$devolver);
                            if($ef){
                                while($efff=mysqli_fetch_array($ef)){
                                    
                            ?>
                <tr class=tr_tr>
                    <td class="campo">
                        <?php echo $fill["id_compra"];?>
                    </td>
                    <td class="campo">
                        <?php echo $fill["id_producto"];?>
                    </td>
                    <td class="campo">
                        <?php echo $efff["nombre"];?>
                    </td>
                    <td class="campo">
                        <?php echo $efff["precio"];?>
                    </td>
                    <td class="campo">
                        <?php echo $fill["cantidad"];?>
                    </td>
                    <td class="campo">
                        <?php echo $fill["fecha"];?>
                    </td>
                    <td class="campo">
                        <?php echo $fill["direccion"];?>
                    </td>
                    <td class="campo">
                        <?php echo $fill["total"];?>
                    </td>
                </tr>
                <?php
                                }
                            }
                        }
                    }
                    ?>
            </table>
        </div>
        <?php
        }
        if($id==1){
        ?>
        <div id="crear" class="crear">
            <form action="crear.php" method="post" id="form" class="form" enctype="multipart/form-data">
                <div class="barra">
                    <p></p>
                    <div class="barboton">
                        <button type="button" id="cerbarra" class="cerbarra">
                            <span class="material-symbols-outlined">
                                cancel
                            </span>
                        </button>
                    </div>
                </div>
                <div class="anadir">
                    <p>AÑADIR MEDICAMENTO</p>
                    <input type="file" name="imate" id="imate" accept="image/*" required>
                    <input type="text" placeholder="Nombre Del Medicamento" name="nombre" id="nombre" required>
                    <input type="number" placeholder="Precio" name="precio" id="precio" required>
                    <input type="number" placeholder="Cantidad A Disponer" name="cantidad" id="cantidad" required>
                    <textarea name="descripcion" id="descripcion" placeholder="Descripcion (maximo 300 caracteres)" cols="60" rows="5"></textarea>
                    
                    <input type="hidden" name="id" value="<?php echo$id;?>">
                    <input type="hidden" name="id_admin" value="<?php echo$a;?>">
                    <button type="button" id="envi" class="envi">Enviar</button>
                </div>
            </form>
        </div>
        <div class="modivalores" id="modivalores">
            <div class="modifventana" id="modifventana">
            </div>
            <div class="modiffvalor">
                <div class="con_bottonmodifvalores">
                    <button type="button" id="botonmodival" class="botonmodival">
                        <span class="material-symbols-outlined">
                            cancel
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <?php
        }
        if($id==0){
        ?>
            <div class="contain_login" id="contain_login">
                
                <form  method="post" class="formlogin" id="formlogin">
                    <div class="form-title">
                        <h1>Iniciar sesion</h1>
                    </div>
                    <div class="form-field">
                        <div class="form-field-input">
                            <input id="email" name="iden" class="js-user" type="text" placeholder="Identificacion">
                            <input type="hidden" name="pase" value="1">
                        </div>
                        <div class="form-field-input">
                            <input id="password"  name="pass" class="js-pass" type="password" placeholder="Contraseña">
                            <a href="">Si se le olvido la contraseña no se preocupe, acuerdese</a>
                        </div>
                        <button type="button" name="enviar" class="primary-btn" id="insesion" >Iniciar sesión</button>
                        <span class="divider">O</span>
                        <a class="secondary-btn" id="envireg">Crear una cuenta</a>
                        <button type="button" id="closelog">Cancelar</button>
                    </div>
                </form>
            </div>
            <div class="contain_registro" id="contain_registro">
                <form  method="post"class="formregistro" id="formregistro">
                    <h2>Registro</h2>
                    <input type="number" placeholder="Identificacion" name="idenn" id="riden">
                    <input type="text" placeholder="Nombre" name="nombree" id="rname">
                    <input type="password" placeholder="Password" name="passs" id="rpass">
                    <input type="number" placeholder="Telefono" name="telefonoo" id="rtel">
                    <button type="button" id="botreg">Crear Cuenta</button>
                </form>
            </div>
        <?php 
            }if($id==1 or $id==2){
        ?>
        <div class="contain_cerrar" id="contain_cerrar">
                <form action="index.php"method="post" class="formclose" id="formclose">
                    <input type="hidden" name="pase" value="2">
                    <input type="hidden" name="id" value="<?php echo $a?>">
                        <button type="submit" id="closesesion" class="botclose">Cerrar sesion</button>
                   
                </form>
                <button type="button" id="cancel_close" class="cancelclose">Cancelar</button>
        </div>
        <?php
            }
        ?>
    <div class="contain_carrito" id="contain_carrito">
        <?php
            if($id==1 or $id==2){ ?>
        <br>
        <div class="titcompra">
            <h2>Carrito</h2>
            <div class="botcerrar1">
                <button type="button" id="cercarrito" class="cercarrito">
                    <span class="material-symbols-outlined">
                        cancel
                    </span>
                </button>
            </div>
        </div>
        <br>
        <div class="tabel_carrito" id="tabel_carrito">
            <table>
            <tr>
                <th>ID PRODUCTO</th>
                <th>NOMBRE</th>
                <th>VALOR</th>
                <th>CANTIDAD</th>
                <th>ElIMINAR</th>
            </tr>
            
            <?php if($id==1 or $id==2){
                $carrito="SELECT * FROM carrito WHERE id_client=$a";
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
                                <input type="number" placeholder="1" data-cantidad="<?php echo $car["id_producto"]."-".$a;?>" class="inputt">
                        </td>
                        <td class="campo">
                        <form class="delete_car" method="post" data-form="<?php echo $car["id_producto"];?>">
                                <input type="hidden" name="deletecar" value="<?php echo $car["id_producto"]."-".$a;?>">
                                <button type="submit" class="but_eliminar">Eliminar</button>
                            </form>
                        </td>

                    </tr>
                    
            <?php
                            }
                        }
                    }
                }
            }

                ?>
                </table>
        </div>
        <form  id="formcar" class="formcar">
                <input type="hidden" name="user" value="<?php echo $a?>">
                <button type="button" id="butcarcompra">comprar</button>
        </form>
        <?php
                }
                
                ?>
    </div>
    <?php /*
    }
    if($pt==1){ */
    ?>
    </div>
        <div class="cont_description" id="cont_description">
        <form class="close_description">
                <button type="button" id="close_des">Cerrar</button>
        </form>
            <div class="contain_product" id="contain_product">
                
                </div>

    </div>
    </main>

    <script>
        const formulario = document.getElementById('form');
        const formmody = document.getElementById('form_validar_mody');
        function validarFormulario() {
            var nombre = document.getElementById("nombre").value;
            var precio = document.getElementById("precio").value;
            var cantidad = document.getElementById("cantidad").value;
            var imagen = document.getElementById("imate").value;
            var des = document.getElementById("descripcion").value;

            if (nombre == "" || precio == "" || cantidad == "" || imagen == "" || des =="") {
                alert("Todos los campos son obligatorios");
                return false;
            }

            return true;
        }

        function enviard() {
            if (validarFormulario()) {
                $.ajax({
                    url: "crear.php",
                    type: "POST",
                    data: new FormData($("#form")[0]),
                    processData: false,
                    contentType: false,
                    success: function (response1) {
                        $("#sect1").html(response1);
                    }
                }); formulario.reset();
            }
        }

        $("#envi").click(function () {

            enviard();
        });/*
        function enviarsess() {
            $.ajax({
                url: "inicio.php",
                type: "POST",
                data: $("#formlogin").serialize(),
                success: function (response1) {
                    $("#parte1").html(response1);
                }
            });
        }

        $("#insesion").click(function () {

            enviarsess();
        });*/
        $("#insesion").click(function() {
            $("#formlogin").submit();
        });
        
        function closesess() {
            $.ajax({
                url: "change.php",
                type: "POST",
                data: $("#formclose").serialize(),
                success: function (respon3) {
                    $("#parte1").html(respon3);
                }
            });
        }

        $("#closesesion").click(function () {

            closesess();
        });/*
        function enviarFormularioo() {
            var form = document.getElementById("formlogin");
            var formData = new FormData(form);

            // Primero envía los datos al primer archivo mediante AJAX
            $.ajax({
                url: "estado.php",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                console.log("Los datos se han enviado a archivo1.php");
                },
                error: function(jqXHR, textStatus, errorThrown) {
                console.log("Error al enviar los datos a archivo1.php");
                }
            });

            // Luego envía los datos al segundo archivo enviando el formulario
            form.action = "inicio.php";
            form.submit();
            }*/
        ////////////////////////////////////////////////////////////////

        function buscar() {
            $.ajax({
                url: "buscador.php",
                type: "POST",
                data: $("#buscar").serialize(),
                success: function (response1) {
                    $("#sect1").html(response1);
                }
            });
        }

        $("#buscad").click(function () {
            buscar();
        });
        $("#buscar").submit(function (event) {
            event.preventDefault();  //evita el comportamiento por defecto de enviar el formulario
            buscar();
        });

        function allp() {
            $.ajax({
                url: "allproductos.php",
                type: "POST",
                data: $("#allpr").serialize(),
                success: function (response1) {
                    $("#sect1").html(response1);
                }
            });
        }

        $("#all").click(function () {
            allp();
        });
        function validarreg() {
            var riden = document.getElementById("riden").value;
            var rname = document.getElementById("rname").value;
            var rpass = document.getElementById("rpass").value;
            var rtel = document.getElementById("rtel").value;

            if (riden == "" || rname== "" || rpass == "" || rtel == "") {
                alert("Todos los campos son obligatorios");
                return false;
            }

            return true;
        }
        function registro() {
            if(validarreg()){
                $.ajax({
                url: "validar_registro.php",
                type: "POST",
                data: $("#formregistro").serialize(),
                success: function (response1) {
                    $("#parte1").html(response1);
                }
            });
            }
        }

        $("#botreg").click(function () {
            registro();
        });
/*
        function carrito() {
            $.ajax({
                url: "carrito.php",
                type: "POST",
                data: $("#formm").serialize(),
                success: function (response12) {
                    $("#dash").html(response12);
                }
            });
        }

        $("#botcar").click(function () {
            alert("aaa");
            carrito();
        });*/

        $(document).ready(function () {
            // Función que se ejecuta cuando se envía un formulario
            $('.miformm').submit(function (event) {
                event.preventDefault(); // Prevenir la acción predeterminada del envío del formulario (redireccionamiento)

                var form_id = $(this).data('form'); // Obtener el identificador único del formulario

                $.ajax({
                    url: 'eliminar.php', // Ruta a tu script PHP que procesará los datos
                    type: 'POST', // Método HTTP que se utilizará para enviar la solicitud
                    data: $(this).serialize() + '&form_id=' + form_id, // Datos que se enviarán con la solicitud (en este caso, los datos del formulario y el identificador único)
                    success: function (respuesta) {
                        $('#tabel').html(respuesta); // Actualizar el contenido de la página web con la respuesta del servidor
                        const ventanamodifnews = document.getElementById('modivalores');
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

        $(document).ready(function () {
            // Función que se ejecuta cuando se envía un formulario
            $('.mimodify').submit(function (event) {
                event.preventDefault(); // Prevenir la acción predeterminada del envío del formulario (redireccionamiento)

                var form_id = $(this).data('form'); // Obtener el identificador único del formulario

                $.ajax({
                    url: 'modificar.php', // Ruta a tu script PHP que procesará los datos
                    type: 'POST', // Método HTTP que se utilizará para enviar la solicitud
                    data: $(this).serialize() + '&form_id=' + form_id, // Datos que se enviarán con la solicitud (en este caso, los datos del formulario y el identificador único)
                    success: function (respuesta) {
                        $('#modifventana').html(respuesta); // Actualizar el contenido de la página web con la respuesta del servidor
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
        /*
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
        });*/


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

/*
        function actualizarContenido() {
            var contenedor = document.getElementById('tabel_carrito');
            
            // Realizar la solicitud AJAX (aquí se usa jQuery para simplificar el ejemplo)
            $.ajax({
                url: 'productos_car.php', // Ruta hacia tu script que proporciona los nuevos datos
                success: function(data) {
                // Actualizar el contenido del contenedor con los nuevos datos recibidos
                contenedor.innerHTML = data;
                }
            });
        }
        setInterval(actualizarContenido, 5000);*/

      
            // Función que se ejecuta cuando se envía un formulario

            $('.inputt').on('change', function () {
                alert("aaaa");
                var in_id = $(this).data('cantidad');
                var can = $(this).val();
                $.ajax({
                    url: 'actualizar.php',
                    type: 'POST',
                    data: {'in_id': in_id, 'can': can},
                    success: function (esta) {
                        console.log(esta);
                    }
                });
            });
    

        function enviarvalidacion() {
            $.ajax({
                url: "validar_modificacion.php",
                type: "POST",
                data: $("#form_validar_mody").serialize(),
                success: function (respo) {
                    alert(respo);
                }
            }); formmody.reset();
        }
        $("#validacionmody").click(function () {

            enviarvalidacion();
        });

        function comprarcar() {
            $.ajax({
                url: "comprar_all.php",
                type: "POST",
                data: $("#formcar").serialize(),
                success: function (response1) {
                    $("#parte1").html(response1);
                }
            });
        }

        $("#butcarcompra").click(function () {
            comprarcar();
        });
        

    </script>
    <script src="../js/opciones1.js"></script>
    <script src="../js/ventana1.js"></script>
    <script src="../js/cerrarmodif.js"></script>
    <script src="../js/cerrarse.js"></script>
    <script src="../js/descripciont.js"></script>
    <?php
    if($id==0){
        ?>
    <script src="../js/iniciar.js"></script>
    <?php
    }
    ?>

    <!---
    <script>
        function enviarcompra(){
                    $.ajax({
                        url: "compra.php",
                        type: "POST",
                        data: $("#but").serialize(),
                        success: function(response1) {
                            $("#admin").html(response1);
                    }
                    });
                }
                $(".e").click(function(){
                    enviarcompra();
                });
    </script>
    ---->
</body>
</html>
<?php
    }else {
        session_destroy();
        header("location: index.php");
    }
    

?>