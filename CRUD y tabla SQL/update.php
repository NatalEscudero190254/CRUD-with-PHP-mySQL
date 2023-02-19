<?php
    include("connection.php");
    $connection = connectionToDB();

    $ID = $_POST["ID"];
    $NOMBRE = $_POST["NOMBRE"];
    $EDAD = $_POST["EDAD"];
    $SEXO = $_POST["SEXO"];
    $ROLID = $_POST["ROLID"];

    $sql = "UPDATE usuarios SET ID='$ID', NOMBRE='$NOMBRE', EDAD='$EDAD', SEXO='$SEXO', ROLID='$ROLID'";
    $query = mysqli_query($connection, $sql);

    if($query){
        Header("Location: usuarios.php");
    }else{

    };



?>