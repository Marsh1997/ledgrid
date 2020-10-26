<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $panel01 = $_POST['panel01'];
    $panel02 = $_POST['panel02'];
    $panel03 = $_POST['panel03'];


    $host = "localhost"; 
    $port = 4444;
    $data = strval( $panel01."&".$panel02."&".$panel03 );
    $result = "";

    if ( ($socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) === FALSE ) {
        $result = socket_strerror(socket_last_error());
    }
    else 
    {
        if ( ($result = socket_connect($socket, $host, $port)) === FALSE ) {
            $result = "Attempted to connect to '$host' on port '$port' and get an error of: ".socket_strerror(socket_last_error($socket));
        }
        else {
            socket_write($socket, $data."\r\n", strlen($data."\r\n"));
            $result = "Attempted to connect to '$host' on port '$port'. It was sucessfull. Message sent!";
        }
        socket_close($socket);      
    }
}
?>