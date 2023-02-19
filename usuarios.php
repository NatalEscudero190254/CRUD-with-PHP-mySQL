<?php
    include("connection.php");
    $connection = connectionToDB();


    $sql = "SELECT * FROM usuarios";
    $query = mysqli_query($connection, $sql);

    $row = mysqli_fetch_array($query);

    
    $sql2 = "SELECT `SEXO`, count(1) as CANTIDAD FROM `usuarios`
    group by `SEXO`;";
    

    $query2 = mysqli_query($connection, $sql2);

    $row2 = mysqli_fetch_array($query2, MYSQLI_ASSOC);

   
    // no se porque solo me trae la cantidad de hombres cuando en mySQL workbench me trae ambos divididos por sexo
    // echo "<pre>";
    // print_r($row2);
    // die();
    




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>
    <title>CRUD</title>
</head>
<body>
    <div class="container text-center">
        <div class="row">
        
            <div class="col-3">
            
                <h1>Ingrese Datos</h1>
                <form action="add.php" method="POST">

                    <input type="text" class="form-control mb-3" name="ID" placeholder="ID">
                    <input type="text" class="form-control mb-3" name="NOMBRE" placeholder="nombre completo">
                    <input type="text" class="form-control mb-3" name="EDAD" placeholder="edad">
                    <input type="text" class="form-control mb-3" name="SEXO" placeholder="sexo">
                    <input type="text" class="form-control mb-3" name="ROLID" placeholder="RolID">

                    <input type="submit" class="btn btn-primary">
                </form>
               
            </div>
            <div class="col-6">
                    <table class="table">
                        <thead class="table-succes table-stripped">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Rol ID</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($row=mysqli_fetch_array($query)){
                            ?>
                                <tr>
                                    <th><?php echo $row["ID"]?></th>
                                    <th><?php echo $row["NOMBRE"]?></th>
                                    <th><?php echo $row["EDAD"]?></th>
                                    <th><?php echo $row["SEXO"]?></th>
                                    <th><?php echo $row["ROLID"]?></th>

                                    <th><a href="updateForm.php?ID=<?php echo $row["ID"] ?>" class="btn btn-info">Editar</a></th>
                                    <th><a href="delete.php?ID=<?php echo $row["ID"] ?>" class="btn btn-danger">Eliminar</a></th>

                                    
                                </tr>
                                
                                <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                
                
                <div id="chart" class="col-3">
                <h1>Tabla Dividida por SEXO</h1>
                </div>
                
                
            </div>
            
            
    </div>
    <script>
        
            
            let options = {
            series: [<?php echo $row2['CANTIDAD']?>, 6],
            chart: {
            width: 380,
            type: 'pie',
            },
            labels: ['HOMBRES', 'MUJERES'],
            responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                width: 200
                },
                legend: {
                position: 'bottom'
                }
            }
            }]
            };
            const chart = new ApexCharts(document.getElementById("chart"), options);
            chart.render();
           
            
        </script>
    
</body>
</html>