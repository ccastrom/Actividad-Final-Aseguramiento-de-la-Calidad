<!DOCTYPE html>
<html lang="en">
<?php
 session_start();
    require_once('imports/head.html')
    
?>
<title>Document</title>
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

<body>
    <?php require_once('controller/database/conexion.php') ?>
    <?php require_once('imports/nav.php') ?>
   
    <div class="container my-3 p-3 mt-2"  >
    <a href="crearuser.php" style="background-color: #3D392E ;" class="btn text-light  ">Crear Usuario</a>
  
        <div class="row" >
            
            <div class="col-12 text-center"  >
            <br>
            <div class="" >
          <div class="card-header text-light" style="background-color: #3D392E  ;"     >
            <h5>Todos los usuarios</h5>
          </div>
          
          <div class="card-body" style="background-color: #9a8866;opacity: 1;">
          <div class="row mx-auto">
              
          <div class="col-12 my-3">
              <?php
                if(isset($_SESSION['update'])){
                    if($_SESSION['update']==1){
                        echo'          <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h6>Valores editados con exito</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    }
                }
                unset($_SESSION['update']);

                if(isset($_SESSION['deleted'])){
                    if($_SESSION['deleted']==1){
                        echo'          <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h6>Arma eliminada del sistema</h6>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                    }
                }
                unset($_SESSION['deleted']);
              ?>

</div>
          <table id="table_armas" class="table content-table table-hover table-striped" style="width:100%;background-color:#756649 ;">
                    <thead>
                        <tr class=" text-light" style="background-color: #3D392E  ;">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido P</th>
                            <th>Apellido M</th>
                            <th>Correo</th>
                            <th>RUT</th>
                            <th>Rol</th>
                            <th>Acciones</th>
                          
                
                            <th style="width: 100px;"></th>                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                      $sql = "SELECT * FROM usuario WHERE id !=$userID  LIMIT 5;";
  
                      $statement = $ConexionBD->query($sql);
                     
  
                      while ($row = $statement->fetch_assoc()) {
                      ?>
                          <tr class="text-light">
                              <td><?= $row["id"] ?></td>
                              <td><?= $row["nombre"] ?></td>
                              <td><?= $row["ap_paterno"] ?></td>
                              <td><?= $row["ap_materno"] ?></td>
                              <td><?= $row["correo"] ?></td>
                              <td><?= $row["rut"] ?></td>
                              <td><?= $row["rol"] ?></td>
                              <td>
                              <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal_editar_arma" data-bs-whatever="<?= $id; ?>">Editar<i class="far fa-edit"></i></button>
                            
                              </td>
                              <td>  <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_eliminar_arma" data-bs-whatever="<?= $id; ?>" >Eliminar<i class="far fa-trash-alt"></i></button></td>
                              
                          </tr>
  
                      <?php } ?>
                  
                    </tbody>
                </table>
              
                
                </div>
                
                </div >
              
          </div>
          
        </div>
        
            </div>
            <br>
            <a href="menuadmin.php" style="background-color: #3D392E ;" class="btn text-light ">Volver al menu</a>
        </div>
    </div>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/sl-1.3.3/datatables.min.css" />
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/sl-1.3.3/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
                        crossorigin="anonymous"></script>
                        <script src="tabla_usuarios.js"></script>                     
</body>

<div class="modal fade" style="opacity: 0.9;" id="modal_editar_arma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#3D392E;">
        <h5 class="modal-title text-light" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="background-color:#ccbb9b;">
      <form action="controller/controller.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6">
                                <input type="hidden" class="form-control" id="txt_id" name="txt_id">
                                    <h6 style="text-align:left; color: black"  class="form-label">Nombre</h6>
                                    <input type="text" class="form-control" style="background-color:#9a8866;" id="txt_nombre" name="txt_nombre">

                                </div>
                                <div class="col-12 col-sm-6 col-md-6">

                                    <h6 style="text-align:left; color: black" class="form-label">Apellido P </h6>
                                    <input type="text" style="background-color:#9a8866;" class="form-control" id="txt_ap_pat" name="txt_ap_pat">
                                </div>
                                <div class="col-12 col-sm-6 col-md-6">

                                    <h6 style="text-align:left; color: black" class="form-label">Apellido M </h6>
                                    <input type="text" style="background-color:#9a8866;"   class="form-control" id="txt_ap_mat" name="txt_ap_mat">
                                </div>

                                <div class="col-12 col-sm-6 col-md-6">

                                    <h6 style="text-align:left; color: black" class="form-label">Correo </h6>
                                    <input type="text" style="background-color:#9a8866;"   class="form-control" id="txt_correo" name="txt_correo">
                                </div>


                                <div class="col-12 col-sm-6 col-md-6">
                                    <h6 style="text-align:left; color: black" class="form-label">Rol </h6>
                                    <select class="form-select" style="background-color:#9a8866;" name="select_rol" id="select_rol">
                                        <option value="ADMIN">ADMIN</option>
                                        <option value="Usuario Normal">Usuario Normal</option>
                                      
                                    </select>
                                </div>
                              
                            </div>
                            <br>


                        
      </div>
      <div class="modal-footer" style="background-color:#ccbb9b;">
      <input type="submit" name="btn_update_user" id="btn_update_user" value="Modificar"
        class="btn btn-primary">
      </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" style="opacity: 0.9;" id="modal_eliminar_arma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#3D392E;">
        <h5 class="modal-title text-light" id="exampleModalLabel">Eliminación de usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="background-color:#ccbb9b;">
        <form action="controller/controller.php" method=POST>
                <input type="hidden" name="txt_id_eliminar" id="txt_id_eliminar">
        <h5>¿Desea eliminar al usuario seleccionado?</h5>
        <div class="modal-footer" >
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
        <input type="submit" name="btn_eliminar_user" class="btn btn-primary" value="Eliminar"></input>
      </div>
    </form>
      </div>
     
    </div>
  </div>
</div>
</html>