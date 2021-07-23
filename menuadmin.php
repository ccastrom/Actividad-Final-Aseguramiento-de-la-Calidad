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
if($userRol!="ADMIN"){
    header("Location: menu.php");
}


require_once('imports/nav.php')
?>


<body style="background-image: url('resources/test.jpg');">

    
        <div class="container">
            <br>
            <div class="d-flex align-items-center justify-content-center">

                <div class="containerB">
                    <a href="listaruser.php">
                        <img src="resources/shadowface.jpg" alt="Avatar" class="image" style="width:100%">
                        <div class="top">
                            <div class="text">GESTOR DE USUARIOS</div>
                        </div>
                        <div class="middle">
                            <img src="resources/user.png" alt="Avatar" class="" style="width:100%">
                        </div>
                        <div class="down">
                            <div class="text">Ingrese aquí para gestionar los usuarios</div>
                        </div>
                    </a>
                </div>
                <div class="containerC">
                    <a href="grafico.php">
                        <img src="resources/data.jpg" alt="Avatar" class="image" style="width:100%">
                        <div class="top">
                            <div class="text">Ver Gráficos</div>
                        </div>
                        <div class="middle">
                            <img src="resources/graph.png" alt="Avatar" class="" style="width:100%">
                        </div>
                        <div class="down">
                            <div class="text">Ingrese aquí para ver gráficos</div>
                        </div>
                    </a>
                </div>
                <div class="containerB">
                    <a href="informe.php">
                        <img src="resources/report.jpg" alt="Avatar" class="image" style="width:100%">
                        <div class="top">
                            <div class="text">Descargar Informe</div>
                        </div>
                        <div class="middle">
                            <img src="resources/reportico.png" alt="Avatar" class="" style="width:100%">
                        </div>
                        <div class="down">
                            <div class="text">Generar Informe de los datos actuales hasta la fecha</div>
                        </div>
                    </a>
                </div>


              
            </div>
        </div>
</body>