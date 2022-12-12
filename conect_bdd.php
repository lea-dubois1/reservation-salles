<?php 

    session_start();

    $db_username = 'root';
    $db_password = '';
    $db_name = 'reservationsalles';
    $db_host = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('Could not connect to database');
?>