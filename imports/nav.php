<?php
if (isset($_SESSION['user'])) {
    $userName = $_SESSION['user']['nombre'];
    $userAp = $_SESSION['user']['ap_paterno'];
    $userRol = $_SESSION['user']['rol'];
} else {
    header("Location: index.php");
    $_SESSION['accessURL'] = 1;
}
?>





<nav class="navbar  navbar-expand-lg navbar-light" style="background-color: #9a8866;  border-bottom: 5px solid rgb(110,92,24); ">
    <div class="container-fluid">
      <a class="navbar-brand text-light" href="menu.php">SCA
        <?php 
          if($userRol=="ADMIN"){
            echo "|".$userRol;
          }
        ?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
        <span class="navbar-text p-2">
         <?php
          echo $userName." ".$userAp." ";
         ?>
        </span>
        <button type="button" class="btn btn-outline-light"  onclick="window.location.href='cerrarsesion.php'">Cerrar Sesión</button>
      </div>
    </div>
  </nav>