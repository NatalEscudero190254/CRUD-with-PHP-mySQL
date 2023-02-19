<?php
    include("connection.php");
    $connection = connectionToDB();



    $ID = $_GET["ID"];


    $sql = "DELETE FROM usuarios WHERE ID = '$ID'";

    $query = mysqli_query($connection, $sql);

    if($query){
        Header ("Location: usuarios.php");
    }else{

    };



?>