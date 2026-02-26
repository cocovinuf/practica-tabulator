<header>
    <div class="container-fluid">
        <div class="row align-items-center">
            
            <div class="col-xl-11">
                <h1 class="m-1 bg-success p-5">
                  Administrador/a: <?php echo $_SESSION["nombre"]; ?>
                </h1>
            </div>

            <div class="col-xl-1 text-end">
                <a href="../vistas/home_admin.php">
                    <img src="../imagenes/logo.png"
                        alt="logo de la escuela"
                        class="img-fluid "
                        style="max-width: 150px;">
                </a>
            </div>
         </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <form method="POST">
                <input type="submit" name="btn_solicitud_cambiar_contrasena" value="Quiero cambiar mi contraseña" class="col-xl-2 btn btn-secondary m-3" > <br><br>
            </form>
            <?php
                include "../controlador/controlador_cambiar_contrasena.php"
            ?>
            <a class="col-xl-2 btn btn-danger m-3" href="../controlador/controlador_cerrar_sesion.php" value="Cerrar Sesion">Cerrar Sesion</a>
        </div>
    </div>


</header>
