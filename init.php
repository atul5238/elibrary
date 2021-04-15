<?php 
session_start();

// check if the user is already logged in
if(isset($_SESSION['email']))
{
    header("location: dashboard.php");
    exit;
}