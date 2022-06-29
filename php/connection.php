<?php
    function connection(){  
        $host = "localhost";
        $user = "root";
        $password = "fran1234";
        $database = "computadoras";

        $connection = new mysqli($host, $user, $password, $database, 3306);

        if($connection->connect_errno) {
            $connection = "connection_error";
        } 
        
        return $connection;
    }
?>  