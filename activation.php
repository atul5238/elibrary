<?php
    session_start();
    require_once  "_connection.php";

    if(isset($_GET['token']))
    {
      
        $token = $_GET['token'];
        $updatequery = "UPDATE users set status='active' WHERE token='$token' ";
        $query = mysqli_query($db_connection,$updatequery);

    }

    if ($query) {
        if(isset($_SESSION['msg'])){
            $_SESSION['msg']="Account Verified Successfully :)";
            header("location:index.php");
        }else{
            $_SESSION['msg']="You're logged out";
            header("location:index.php");
        }
    }
    else{
        $_SESSION['msg']="Account not verified";
        
    }
?>