<?php
 require './MPDF/vendor/autoload.php';
 require './MPDF/plantilla.php';

 session_start();
 if (isset($_SESSION['user'])) {
    $userName = $_SESSION['user']['nombre'];
    $userAp = $_SESSION['user']['ap_paterno'];
    $userRol = $_SESSION['user']['rol'];
} else {
    header("Location: index.php");
    $_SESSION['accessURL'] = 1;
}
 


  
    $datos = array();
    $mysqli= new mysqli("localhost","root","","CRUD_armas");
   $sql=$mysqli->prepare("SELECT arma.id_arma,arma.nombre_arma,arma.anio,arma.stock,fabricante.nombre_fabricante,fabricante.pais,estado.descripcion,accesorio.descripcion_accesorio,usuario.nombre,usuario.id
   FROM arma
   INNER JOIN fabricante ON arma.id_fk_fabricante=fabricante.id
   INNER JOIN estado ON arma.id_fk_estado=estado.id
   INNER JOIN accesorio ON arma.id_fk_accesorio=accesorio.id
   INNER JOIN usuario ON arma.id_fk_usuario=usuario.id
   ORDER BY arma.id_arma;");
   $sql->execute();
   $resultado=$sql->get_result();
   while($row=$resultado->fetch_assoc())$datos[]=$row;
   $mysqli->close();

$mpdf= new \Mpdf\Mpdf([
    
]);

$plantilla= getPlantilla($datos);
$mpdf->WriteHTML($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output();