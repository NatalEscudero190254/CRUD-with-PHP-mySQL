<?php
    include("connection.php");
    $connection = connectionToDB();

    $ID = $_GET["ID"];


    $sql = "SELECT * FROM usuarios WHERE ID='$ID'";
    $query = mysqli_query($connection, $sql);


    $row = mysqli_fetch_array($query);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Update Form</title>
</head>
<body>
    <div class="container mt-5">
        <form action="update.php" method="POST">
            
            <input type="hidden" class="form-control mb-3" name="ID" value="<?php echo $row['ID']?>">
            <input type="text" class="form-control mb-3" name="NOMBRE" placeholder="Nombre" value="<?php echo $row['NOMBRE']?>">
            <input type="text" class="form-control mb-3" name="EDAD" placeholder="Edad" value="<?php echo $row['EDAD']?>">
            <input type="text" class="form-control mb-3" name="SEXO" placeholder="Sexo" value="<?php echo $row['SEXO']?>">
            <input type="text" class="form-control mb-3" name="ROLID" placeholder="RolID" value="<?php echo $row['ROLID']?>">
            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">

            



        </form>

    </div>
</body>
</html>