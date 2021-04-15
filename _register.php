<?php
require_once  "_connection.php";
$msg = "";
if (
  isset($_POST["name"])  &&  isset($_POST["password"])
  && isset($_POST["role"]) && isset($_POST["email"])
  && !empty($_POST["name"])  &&  !empty($_POST["password"])
  && !empty($_POST["role"]) &&  !empty($_POST["email"])
) {

  $name = mysqli_real_escape_string($db_connection, $_POST["name"]);
  $password = mysqli_real_escape_string($db_connection,  $_POST["password"]);
  $role = mysqli_real_escape_string($db_connection,  $_POST["role"]);
  $email = substr(mysqli_real_escape_string($db_connection,  $_POST["email"]), 0, 100);
  $hash = password_hash($password, PASSWORD_DEFAULT);

  $token = bin2hex(random_bytes(15));

  // duplicate email check
  $emailquery = "SELECT * FROM users WHERE email = '$email' ";
  $query = mysqli_query($db_connection, $emailquery);

  $emailcount = mysqli_num_rows($query);

  if ($emailcount > 0) {

    $msg = "Someone has already registered using this email id :)";
    header('location: index.php?msg='.$msg);
    // echo "<script type='text/javascript'>
    // window.setTimeout(function() { alert( 'Someone has already registered using this email !' );
    // window.location = './index.php';},0);
    //   </script>";
  } else {
    $sql_query = "INSERT INTO users (name,password,role,email,token,status) values ('$name','$hash','$role','$email','$token','inactive'); ";
    $result = mysqli_query($db_connection, $sql_query);
    $sql_query = "SELECT LAST_INSERT_ID();";
    $row = mysqli_fetch_array(mysqli_query($db_connection, $sql_query));
    $name = reset($row);

    //email send
    // if ($sql_query) {
    //   $to = $email;
     
    //   $subject = "Email verification (E-library)";
    //   $body = "Hi, $name. Thankyou for registering wiht us 
    //   http://elibrary.test/active.php?token=$token";
    //   $senderemail = "from: dirtyhopper5238@gmail.com";  
      
    // }



    echo "<script type='text/javascript'>
	          window.setTimeout(function() { alert( 'registered successfully!' );
            window.location = './index.php';},0);
	            </script>";
  }
  mysqli_close($db_connection);
}


