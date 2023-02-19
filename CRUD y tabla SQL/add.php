<?php
    include("connection.php");
    $connection = connectionToDB();


    $ID = $_POST["ID"];
    $NOMBRE = $_POST["NOMBRE"];
    $EDAD = $_POST["EDAD"];
    $SEXO = $_POST["SEXO"];
    $ROLID = $_POST["ROLID"];


    $sql = "INSERT INTO usuarios VALUES('$ID','$NOMBRE', '$EDAD', '$SEXO', '$ROLID')";
    $query = mysqli_query($connection, $sql);


    if($query){
        Header("location: usuarios.php");
    }else{

    };



?>