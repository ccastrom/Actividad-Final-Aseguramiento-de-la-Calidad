<!DOCTYPE html>
<html lang="en">

<?php
session_start();
require_once('imports/head.html')

?>
<?php
$Servidor="localhost";
$Usuario="root";
$Password="";
$NombreBD="CRUD_armas";

$ConexionBD = mysqli_connect($Servidor,$Usuario,$Password,$NombreBD);

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

<body>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <main class="contairner">

        <div class="row mx-auto my-5">
            <div class="col-12">
                <div class="accordion shadow w-75 mx-auto">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed bg-danger text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Total de armas por fabricante
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body" style="background-color: whitesmoke;">
                                <div class="card shadow text-center w-95 mx-auto" id="tarjeta1">
                                    <!-- <div class="card-header h5 bg-danger text-light">
                                        
                                    </div> -->
                                    <div class="card-body">
                                        <div class="row justify-content-center my-3">
                                            <div class="col-12">
                                                <article class="position-absolute top-1 end-0 px-5">
                                                    <button id="grafico1" name="grafico1" class="btn btn-outline-secondary my-3 px-3 float-right"><i class="fas fa-download"></i> Descargar Imagen</button>
                                                </article>
                                            </div>
                                            <div class="col-6">
                                                <canvas id="myChart" width="200" height="200"></canvas>
                                                <script>
                                                    var ctx = document.getElementById('myChart').getContext('2d');
                                                    var myChart = new Chart(ctx, {
                                                        type: 'bar',
                                                        data: {
                                                            labels: ['Remington Arms', 'FAMAE', 'Corporación Kalashnikov'],
                                                            datasets: [{
                                                                label: '# of Votes',
                                                                data: [
                                                                   
                                                                ],
                                                                backgroundColor: [
                                                                    'rgba(255, 99, 132, 0.2)',
                                                                    'rgba(54, 162, 235, 0.2)',
                                                                    'rgba(255, 206, 86, 0.2)',
                                                                    'rgba(75, 192, 192, 0.2)',
                                                                    'rgba(153, 102, 255, 0.2)',
                                                                    'rgba(255, 159, 64, 0.2)'
                                                                ],
                                                                borderColor: [
                                                                    'rgba(255, 99, 132, 1)',
                                                                    'rgba(54, 162, 235, 1)',
                                                                    'rgba(255, 206, 86, 1)',
                                                                    'rgba(75, 192, 192, 1)',
                                                                    'rgba(153, 102, 255, 1)',
                                                                    'rgba(255, 159, 64, 1)'
                                                                ],
                                                                borderWidth: 1
                                                            }]
                                                        },
                                                        options: {
                                                            scales: {
                                                                y: {
                                                                    beginAtZero: true
                                                                }
                                                            }
                                                        }
                                                    });
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>





</body>

</html>