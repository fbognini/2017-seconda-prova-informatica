<?php

    // altervista
    $databaseHost = 'localhost';
    $databaseName = 'my_francescobognini';
    $databaseUsername = '';
    $databasePassword = '';
	
    // server2go
    /*
    $databaseHost = 'localhost';
    $databaseName = 'carpooling';
    $databaseUsername = 'root';
    $databasePassword = '';
    */
    
    $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
?>