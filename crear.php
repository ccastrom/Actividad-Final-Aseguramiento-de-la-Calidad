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

?>
    <?php require_once('imports/nav.php') ?>
    <div class="container my-3 p-3 mt-2">
        <div class="row">
            <div class="col-12 text-center">
              
               
<div class="signupSection">
  <div class="info">
    <h2>Módulo de creación de armas</h2>
    <i class="icon ion-ios-ionic-outline" aria-hidden="true"></i>
    <p></p>
    <?php
                if(isset($_SESSION['success'])){
                  if($_SESSION['success']==1){
                    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Arma registrada correctamente
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
        <input type="hidden" class="inputFields" id="txt_id" name="txt_id" value="<?=$userID?>"/>
      </li>
      <li>
        <label for=""></label>
        <input type="text" class="inputFields" id="txt_nombre" name="txt_nombre" placeholder="nombre"  value=""/>
      </li>
      <li>
        <label for=""></label>
        <input type="text" class="inputFields" id="txt_año" name="txt_año" placeholder="Año" value="" />
      </li>
      <li>
        <label for=""></label>
        <input type="text" class="inputFields" id="txt_stock" name="txt_stock" placeholder="Stock" value="" />
      </li>
     
      <li>
      <p class="" style="margin-left:-32%;text-align: center;margin-bottom:-2%;" >Fabricante</p>  
      <select class="inputFields" name="select_fabricante" id="select_fabricante">
                                        <option value="1">Remington Arms</option>
                                        <option value="2">FAMAE</option>
                                        <option value="3">Corporación Kalashnikov</option>
                                    </select>
                                    
      </li>
      <p class="" style="margin-left:-36%;text-align: center;margin-bottom:-2%;" >Estado</p>  
      <li>
      <select class="inputFields" name="select_estado" id="select_estado">
                                        <option value="1">Nuevo</option>
                                        <option value="2">Usado</option>
                                        <option value="3">Deteriorado</option>
                                        <option value="4">Desarmado</option>
                                    </select>
      </li>
      <p class="" style="margin-left:-32%;text-align: center;margin-bottom:-2%;" >Accesorio</p>  
      <li>
      <select class="inputFields" name="select_accesorio" id="select_accesorio">
                                        <option value="1">Si</option>
                                        <option value="2">No</option>
                                      
                                    </select>
      </li>
      <li id="center-btn">
        <input type="submit" id="btn_enviar" name="btn_enviar" alt="Join" value="Crear">
      </li>
      
    </ul>
  </form>
</div>
</body>

</html>