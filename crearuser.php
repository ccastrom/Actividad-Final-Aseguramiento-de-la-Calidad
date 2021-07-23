<!DOCTYPE html>
<html lang="en">
<title>Inicio</title>
<?php
 session_start();
    require_once('imports/head.html')

    
?>

<body style="background-image: url('resources/test.jpg');">
<?php
if(isset($_SESSION['user'])){
    $userID=$_SESSION['user']['id'];
    $userName=$_SESSION['user']['nombre'];
    $userAp=$_SESSION['user']['ap_paterno'];
    $userRol=$_SESSION['user']['rol'];
  
    
}else{
    header("Location: index.php");
    $_SESSION['accessURL']=1;

}
if($userRol!="ADMIN"){
    header("Location: menu.php");
}


?>
    <?php require_once('imports/nav.php') ?>
    <div class="container my-3 p-3 mt-2">
        <div class="row">
            <div class="col-12 text-center">
              
               
<div class="signupSection2">
  <div class="info">
    <h2>Módulo de creación de usuario</h2>
    <i class="icon ion-ios-ionic-outline" aria-hidden="true"></i>
    <p></p>
    <?php
                if(isset($_SESSION['success'])){
                  if($_SESSION['success']==1){
                    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Usuario registrado correctamente
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
                  }
                }
                unset($_SESSION['success']);
              ?>
  </div>
  <form action="controller/controller.php" method="POST" class="signupForm" name="signupform">
  
    <h2>Ingresar datos</h2>
    <ul class="noBullet">
      <li>
        <label for=""></label>
        <input type="text" class="inputFields" id="txt_nombre" name="txt_nombre" placeholder="Nombre"  value=""/>
      </li>
      <li>
        <label for=""></label>
        <input type="text" class="inputFields" id="txt_ap_paterno" name="txt_ap_paterno" placeholder="Apellido Paterno" value="" />
      </li>
      <li>
        <label for=""></label>
        <input type="text" class="inputFields" id="txt_ap_materno" name="txt_ap_materno" placeholder="Apellido Materno" value="" />
      </li>
      <li>
        <label for=""></label>
        <input type="email" class="inputFields" id="txt_correo" name="txt_correo" placeholder="correo" value="" />
      </li>
      <li>
        <label for=""></label>
        <input type="text" class="inputFields" id="txt_rut" name="txt_rut" placeholder="RUT" value="" />
      </li>
     
     
      <li>
      <p class="" style="margin-left:-42%;text-align: center;margin-bottom:-2%;" >Rol</p>  
      <select class="inputFields" name="select_rol" id="select_rol">
                                        <option value="ADMIN">Administrador</option>
                                        <option value="Usuario Normal">Usuario Normal</option>
                                      
                                    </select>
                                    
      </li>
      
      <li id="center-btn">
        <input type="submit" id="btn_enviar" name="btn_crear_usuario" alt="Join" value="Crear">
      </li>
      
    </ul>
  </form>
</div>
</body>

</html>