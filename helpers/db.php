<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ANIVERSARIO";

    try{
    $conn = new PDO("mysql:dbname=$dbname;host=$servername", $username, $password);
    }
    catch(PDOException $e){
        echo "ocorreu um erro ao se conectar no Banco de dados" . $e;
    }
    catch(Exception $e){
        echo "ocorreu um erro generico" . $e;
    }

?>