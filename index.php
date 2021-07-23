<!DOCTYPE html>
<html lang="en">
<?php
    require_once('imports/head.html')

    
?>

<body style="background-image: url('resources/test.jpg');">
    <main class="container my-3 p-3 mt-2" >
    <div class="signupSection3">
  <div class="info">
    <h2>SCA</h2>
    <i class="icon ion-ios-ionic-outline" aria-hidden="true"></i>
    <p></p>
    <?php
                session_start();
                if(isset($_SESSION['loginFailed'])){
                    if($_SESSION['loginFailed']==1){
                      echo '<div class="alert alert-danger" role="alert">
                      Usuario o contraseña no validos
                       </div>';
                    }
                    session_unset();
                }
                 
                
                  if(isset($_SESSION['accessURL'])){
                      if($_SESSION['accessURL']==1){
                          echo '<div class="alert alert-warning" role="alert">
                         Debe introducir sus credenciales de acceso.
                          </div>';
                          
                      }
                      session_unset();
                  }


        ?>
  </div>
  <form action="controller/controller.php" method="POST" class="signupForm" name="signupform">
  
    <h2>Inicio de Sesión</h2>
    <ul class="noBullet">
      
      <li>
        <label for=""></label>
        <input type="text" class="inputFields" id="txtrut" name="txtrut" placeholder="RUT" value="" />
      </li>
      <li>
        <label for=""></label>
        <input type="password" class="inputFields" id="txtpass" name="txtpass" placeholder="Contraseña" value="" />
      </li>
     
      
      <li id="center-btn">
        <input type="submit" id="btn_enviar" name="btnIniciarSesion" alt="Join" value="Iniciar Sesión">
      </li>
      
    </ul>
  </form>
</div>

           
            


    </main>
       
</body>
    
</body>
</html>