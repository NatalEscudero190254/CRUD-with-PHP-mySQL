<?php

connectionToDB();
function connectionToDB(){
    $server = "localhost";
    $user = "root";
    $password = "Natalescudero01";
    $db = "dbexercise";
    
    
    $conectar = mysqli_connect($server, $user, $password, $db) or die ("error en la conexion");
    
    return $conectar;
};





?>