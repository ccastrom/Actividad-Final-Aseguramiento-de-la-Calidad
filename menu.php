<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once('imports/head.html')

?>
<?php
if (isset($_SESSION['user'])) {
    $userName = $_SESSION['user']['nombre'];
    $userAp = $_SESSION['user']['ap_paterno'];
    $userRol = $_SESSION['user']['rol'];
} else {
    header("Location: index.php");
    $_SESSION['accessURL'] = 1;
}

require_once('imports/nav.php')
?>


<body style="background-image: url('resources/test.jpg');">

    <?php
    if ($userRol == ("ADMIN")) { ?>
        <div class="container">
            <br>
            <div class="d-flex align-items-center justify-content-center">

                <div class="containerB">
                    <a href="crear.php">
                        <img src="resources/gun.jpg" alt="Avatar" class="image" style="width:100%">
                        <div class="top">
                            <div class="text">CREAR NUEVA ARMA</div>
                        </div>
                        <div class="middle">
                            <img src="resources/addnote_120243.ico" alt="Avatar" class="" style="width:100%">
                        </div>
                        <div class="down">
                            <div class="text">Ingrese aquí para crear un nuevo registro</div>
                        </div>
                    </a>
                </div>
                <div class="containerC">
                    <a href="listar.php">
                        <img src="resources/gun2.jpg" alt="Avatar" class="image" style="width:100%">
                        <div class="top">
                            <div class="text">VER LISTADO DE ARMAS</div>
                        </div>
                        <div class="middle">
                            <img src="resources/magnifier-1_icon-icons.com_56924.ico" alt="Avatar" class="" style="width:100%">
                        </div>
                        <div class="down">
                            <div class="text">Ingrese aquí para ver el listado de armas</div>
                        </div>
                    </a>
                </div>
                <div class="containerB">
                    <a href="menuadmin.php">
                        <img src="resources/helmet.jpg" alt="Avatar" class="image" style="width:100%">
                        <div class="top">
                            <div class="text">Opciones de Administrador</div>
                        </div>
                        <div class="middle">
                            <img src="resources/gear.png" alt="Avatar" class="" style="width:100%">
                        </div>
                        <div class="down">
                            <div class="text">Ingrese aquí para consultar opciones adicionales</div>
                        </div>
                    </a>
                </div>


              
            </div>
        </div>
    <?php } else { ?>
        <div class="container">
            <br>
            <div class="d-flex align-items-center justify-content-center">

                <div class="containerB">
                    <a href="crear.php">
                        <img src="resources/gun.jpg" alt="Avatar" class="image" style="width:100%">
                        <div class="top">
                            <div class="text">CREAR NUEVA ARMA</div>
                        </div>
                        <div class="middle">
                            <img src="resources/addnote_120243.ico" alt="Avatar" class="" style="width:100%">
                        </div>
                        <div class="down">
                            <div class="text">Ingrese aquí para crear un nuevo registro</div>
                        </div>
                    </a>
                </div>
                <div class="containerC">
                    <a href="listar.php">
                        <img src="resources/gun2.jpg" alt="Avatar" class="image" style="width:100%">
                        <div class="top">
                            <div class="text">VER LISTADO DE ARMAS</div>
                        </div>
                        <div class="middle">
                            <img src="resources/magnifier-1_icon-icons.com_56924.ico" alt="Avatar" class="" style="width:100%">
                        </div>
                        <div class="down">
                            <div class="text">Ingrese aquí para ver el listado de armas</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php } ?>




</body>

</html>