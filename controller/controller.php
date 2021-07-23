<?php

$Servidor="localhost";
$Usuario="root";
$Password="";
$NombreBD="CRUD_armas";

$ConexionBD = mysqli_connect($Servidor,$Usuario,$Password,$NombreBD);
session_start();

if(isset($_POST['btnIniciarSesion'])){
   
    $userRut=$_POST['txtrut'];
    $password=$_POST['txtpass'];
    
    $select="SELECT * FROM usuario WHERE rut='$userRut' && pass='$password';";
    $statement = $ConexionBD->query($select);
    if ($result = $statement->fetch_array()) {
        $_SESSION['user']=$result;
       header("Location: ../menu.php");
       
    }else{
        $_SESSION['loginFailed']=1;
        header("Location:../index.php");
    }
}

 if(isset($_POST['btn_enviar'])){
     $userID=$_POST['txt_id'];
     $nombre=$_POST['txt_nombre'];
     $año=$_POST['txt_año'];
     $stock=$_POST['txt_stock'];
     $accesorio=$_POST['select_accesorio'];
     $fabricante=$_POST['select_fabricante'];
     $estado=$_POST['select_estado'];

     
     $sql="INSERT INTO arma VALUES(NULL,'$nombre','$año','$stock','$accesorio','$estado','$fabricante','$userID');";
     
     $ConexionBD->query($sql);
    if($ConexionBD->affected_rows>=1){
       $_SESSION['success']=1;
        header("Location: ../crear.php");
        
    }else{
        echo mysqli_error($ConexionBD);
    }

 }
 if(isset($_POST['btn_update'])){
    $id=$_POST['txt_id'];
    $nombre=$_POST['txt_nombre'];
    $año=$_POST['txt_año'];
    $stock=$_POST['txt_stock'];//getId
    $accesorio=$_POST['select_accesorio'];//getId
    $estado=$_POST['select_estado'];
    $fabricante=$_POST['select_fabricante'];//getId


   
    
    $sql="UPDATE arma SET nombre_arma='$nombre',anio='$año',stock='$stock',
    id_fk_accesorio='$accesorio',  id_fk_estado='$estado', id_fk_fabricante='$fabricante'
    WHERE id_arma=$id;";
    $ConexionBD->query($sql);
    if($ConexionBD->affected_rows>=1){
        $_SESSION['update']=1;
         header("Location: ../listar.php");
     }else{
         echo mysqli_error($ConexionBD);
     }
    

   
 }
 if(isset($_POST['btn_eliminar'])){
     $id=$_POST['txt_id'];
     $sql="DELETE FROM arma WHERE id_arma='$id';";
     $ConexionBD->query($sql);
     if($ConexionBD->affected_rows>=1){
        $_SESSION['deleted']=1;
         header("Location: ../listar.php");
     }else{
        header("Location: ../listar.php");
     }
 }

 if(isset($_POST['btn_crear_usuario'])){
     $nombre=$_POST['txt_nombre'];
     $apellidoP=$_POST['txt_ap_paterno'];
     $apellidoM=$_POST['txt_ap_materno'];
     $correo=$_POST['txt_correo'];
     $userRut=$_POST['txt_rut'];
     $rol=$_POST['select_rol'];

     $sql="INSERT INTO usuario VALUES(NULL,'$nombre','$apellidoP','$apellidoM','123','$correo','$userRut','$rol')";
     $ConexionBD->query($sql);
     if($ConexionBD->affected_rows>=1){
         $_SESSION['success']=1;
         header("Location: ../crearuser.php");
        }else{
            echo mysqli_error($ConexionBD);
            die();
           header("Location: ../crearuser.php");
        }
 }

 if(isset($_POST['btn_update_user'])){
     $id=$_POST['txt_id'];
     $nombre=$_POST['txt_nombre'];
     $apellidoP=$_POST['txt_ap_pat'];
     $apellidoM=$_POST['txt_ap_mat'];
     $correo=$_POST['txt_correo'];
     $rol=$_POST['select_rol'];

    $sql="UPDATE usuario SET nombre='$nombre',ap_paterno='$apellidoP',
    ap_materno='$apellidoM',correo='$correo',rol='$rol'
    WHERE id=$id";
    $ConexionBD->query($sql);
    if($ConexionBD->affected_rows>=1){
        $_SESSION['update']=1;
        header("Location: ../listaruser.php");
    }else{
        header("Location: ../listaruser.php");
    }

   
 }
 if(isset($_POST['btn_eliminar_user'])){
     $id=$_POST['txt_id_eliminar'];
     $sql="DELETE FROM usuario WHERE id=$id;";
     $ConexionBD->query($sql);
     if($ConexionBD->affected_rows>=1){
        $_SESSION['deleted']=1;
        header("Location: ../listaruser.php");
    }else{
        echo mysqli_error($ConexionBD);
        die();
       header("Location: ../listaruser.php");
    }
 }

 