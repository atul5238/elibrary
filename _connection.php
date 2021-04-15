<?php 
    $db_hostname = 'elibrary.test';
    $db_username = 'root';  
    $db_password = '';  
    $db_name = 'elibrary_db';
    $db_connection = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
    if( ! $db_connection )  
    {  	
       die('Could not connect: ' . $mysqli_error);  
    }
?>