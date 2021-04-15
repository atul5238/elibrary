<?php
//This script will handle login

session_start();

// check if the user is already logged in
if(isset($_SESSION['email']))
{
    header("location: dashboard.php");
    exit;
}
require_once "_connection.php";

$email = $password = "";


// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['email'])) || empty(trim($_POST['password'])))
    {   echo "<script type='text/javascript'>
        window.setTimeout(function () {
        alert('Please enter email + password!');
        window.location = './index.php';}, 0);
        </script>";    
    }

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $sql = "SELECT id, email, password, role FROM users WHERE email = ?";
    $stmt = mysqli_prepare($db_connection, $sql);
    $param_email = $email;
    mysqli_stmt_bind_param($stmt, "s", $param_email);
   
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $f_id, $f_email, $f_password, $f_role);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $f_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["email"] = $email;
                            $_SESSION["id"] = $f_id;
                            $_SESSION["loggedin"] = true;
                            $_SESSION["role"] = $f_role;

                            if ($f_role=="admin") {
                                header("location: dashboard.php");
                            }
                            else{
                                header("location: reader.php");
                            }
                            //Redirect user to welcome page
                            
                        }
                    }

                }

    }
}
echo "<script type='text/javascript'>
        window.setTimeout(function () {
        alert('Invalid data!');
        window.location = './index.php';}, 0);
        </script>"; 