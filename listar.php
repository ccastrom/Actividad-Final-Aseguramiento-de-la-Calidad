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

?>

<body>
    <?php require_once('controller/database/conexion.php') ?>
    <?php require_once('imports/nav.php') ?>
    <div class="container my-3 p-3 mt-2"  >
        <div class="row"   >
            <div class="col-12 text-center"  >
            <div class="" >
          <div class="card-header text-light" style="background-color: #3D392E  ;"     >
            <h5>Todas las armas</h5>
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
                            <th>Año</th>
                            <th>stock</th>
                            <th>Fabricante</th>
                            <th>Pais</th>
                            <th>Estado</th>
                            <th>Accesorio</th>
                            <th>Autor</th>
                            <th>Acciones</th>
                          
                
                            <th style="width: 100px;"></th>                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($userRol=="Usuario Normal"){
                      $sql = "SELECT arma.id_arma,arma.nombre_arma,arma.anio,arma.stock,fabricante.nombre_fabricante,fabricante.pais,estado.descripcion,accesorio.descripcion_accesorio,usuario.nombre,usuario.id
                      FROM arma
                      INNER JOIN fabricante ON arma.id_fk_fabricante=fabricante.id
                      INNER JOIN estado ON arma.id_fk_estado=estado.id
                      INNER JOIN accesorio ON arma.id_fk_accesorio=accesorio.id
                      INNER JOIN usuario ON arma.id_fk_usuario=usuario.id
                      WHERE usuario.id=$userID ORDER BY arma.id_arma DESC LIMIT 5;";
  
                      $statement = $ConexionBD->query($sql);
  
                      while ($row = $statement->fetch_assoc()) {
                         
                          
  
                      ?>
                          <tr class="text-light">
                              <td><?= $row["id_arma"] ?></td>
                              <td><?= $row["nombre_arma"] ?></td>
                              <td><?= $row["anio"] ?></td>
                              <td><?= $row["stock"] ?></td>
                              <td><?= $row["nombre_fabricante"] ?></td>
                              <td><?= $row["pais"] ?></td>
                              <td><?= $row["descripcion"] ?></td>
                              <td><?= $row["descripcion_accesorio"] ?></td>
                              <td><?= $row["nombre"] ?></td>
                              <td>
                              <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal_editar_arma" data-bs-whatever="<?= $id; ?>">Editar<i class="far fa-edit"></i></button>
                            
                              </td>
                              <td>  <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_eliminar_arma" data-bs-whatever="<?= $id; ?>" >Eliminar<i class="far fa-trash-alt"></i></button></td>
                              
                          </tr>
  
                      <?php } ?>
                    <?php }else{?>
                      <?php
                      $sql = "SELECT arma.id_arma,arma.nombre_arma,arma.anio,arma.stock,fabricante.nombre_fabricante,fabricante.pais,estado.descripcion,accesorio.descripcion_accesorio,usuario.nombre,usuario.id
                      FROM arma
                      INNER JOIN fabricante ON arma.id_fk_fabricante=fabricante.id
                      INNER JOIN estado ON arma.id_fk_estado=estado.id
                      INNER JOIN accesorio ON arma.id_fk_accesorio=accesorio.id
                      INNER JOIN usuario ON arma.id_fk_usuario=usuario.id
                      ORDER BY arma.id_arma DESC LIMIT 5;";

                      $statement = $ConexionBD->query($sql);
                        
                      while ($row = $statement->fetch_assoc()) {
                        
                        
                        ?>
                        <tr class="text-light">
                              <td><?= $row["id_arma"] ?></td>
                              <td><?= $row["nombre_arma"] ?></td>
                              <td><?= $row["anio"] ?></td>
                              <td><?= $row["stock"] ?></td>
                              <td><?= $row["nombre_fabricante"] ?></td>
                              <td><?= $row["pais"] ?></td>
                              <td><?= $row["descripcion"] ?></td>
                              <td><?= $row["descripcion_accesorio"] ?></td>
                              <td><?= $row["nombre"] ?></td>
                              <td>
                              <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal_editar_arma" data-bs-whatever="<?= $id; ?>">Editar<i class="far fa-edit"></i></button>
                            
                              </td>
                              <td>  <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_eliminar_arma" data-bs-whatever="<?= $id; ?>" >Eliminar<i class="far fa-trash-alt"></i></button></td>
                              
                          </tr>
                      
                      <?php } ?>
                    <?php } ?>
   
                   

                    
                    


                    </tbody>
                </table>
              
                
                </div>
                
                </div >
              
          </div>
         
        </div>
        
            </div>
            <br>
            <a href="menu.php" style="background-color: #3D392E;" class="btn text-light ">Volver al menu</a>
        </div>
        
    </div>
    

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.24/sl-1.3.3/datatables.min.css" />
            <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.24/sl-1.3.3/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
                        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
                        crossorigin="anonymous"></script>
                        <script src="tabla.js"></script>                     
</body>

<div class="modal fade" style="opacity: 0.9;" id="modal_editar_arma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#3D392E;">
        <h5 class="modal-title text-light" id="exampleModalLabel">Editar Arma</h5>
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

                                    <h6 style="text-align:left; color: black" class="form-label">Año </h6>
                                    <input type="text" style="background-color:#9a8866;" class="form-control" id="txt_año" name="txt_año">
                                </div>
                                <div class="col-12 col-sm-6 col-md-6">

                                    <h6 style="text-align:left; color: black" class="form-label">Stock </h6>
                                    <input type="text" style="background-color:#9a8866;"   class="form-control" id="txt_stock" name="txt_stock">
                                </div>

                                <div class="col-12 col-sm-6 col-md-6">

                                    <h6 style="text-align:left; color: black" class="form-label">Fabricante </h6>
                                    <select class="form-select" style="background-color:#9a8866;" name="select_fabricante" id="select_fabricante">
                                        <option value="1">Remington Arms</option>
                                        <option value="2">FAMAE</option>
                                        <option value="3">Corporación Kalashnikov</option>
                                    </select>
                                </div>


                                <div class="col-12 col-sm-6 col-md-6">
                                    <h6 style="text-align:left; color: black" class="form-label">Estado </h6>
                                    <select class="form-select" style="background-color:#9a8866;" name="select_estado" id="select_estado">
                                        <option value="1">Nuevo</option>
                                        <option value="2">Usado</option>
                                        <option value="3">Deteriorado</option>
                                        <option value="4">Desarmado</option>
                                    </select>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6">
                                    <h6 style="text-align:left; color: black" class="form-label">Accesorio </h6>
                                    <select class="form-select" style="background-color:#9a8866;" name="select_accesorio" id="select_accesorio">
                                        <option value="1">Si</option>
                                        <option value="2">No</option>
                                      
                                    </select>
                                </div>
                            </div>
                            <br>


                        
      </div>
      <div class="modal-footer" style="background-color:#ccbb9b;">
      <input type="submit" name="btn_update" id="btn_update" value="Modificar"
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
        <h5 class="modal-title text-light" id="exampleModalLabel">Eliminación de arma</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="background-color:#ccbb9b;">
        <form action="controller/controller.php" method=POST>
                <input type="hidden" name="txt_id" id="txt_id_eliminar">
        <h5>¿Desea eliminar el arma seleccionada?</h5>
        <div class="modal-footer" >
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
        <input type="submit" name="btn_eliminar" class="btn btn-primary" value="Eliminar"></input>
      </div>
    </form>
      </div>
     
    </div>
  </div>
</div>
</html>