<?php
   include('_connection.php');
   session_start();
   
   if (isset($_SESSION['email'])) {
      header('location: _login.php');
   }
?>