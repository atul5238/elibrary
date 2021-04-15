<?php require("session.php"); 
include ("header.php");
?>


<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="new.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>E-library</title>
    <script>
        $(document).ready(function() {
            $("#login").click(function() {
                $("#login-form").removeClass('d-none');
                $("#register-form").addClass('d-none');
            });
            $("#register").click(function() {
                $("#login-form").addClass('d-none');
                $("#register-form").removeClass('d-none');
            });
        });
    </script>
</head>

<body>

    <div class="form">
        <div class="toggle">
            <button class="btn btn-success" id="login">&nbsp;Login&nbsp;</button>
            <button class="btn btn-primary" id="register">Register</button>
        </div>

        <form id="login-form" action="/_login.php" method="POST" enctype="multipart/form-data">
            <h3 class="pt-5 pt-md-4 pt-xl-2">Login here to access your dashboard!</h3>
            <div class="mb-3">
                <label id="t1" class="form-label">Email address</label><span class="required">*</span>
                <input name="email" type="email" class="form-control" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label id="t1" class="form-label">Password</label><span class="required">*</span>
                <input name="password" type="password" class="form-control" required>
            </div>
            <div class="text-center d-flex justify-content-between">
                <button type="submit" class="btn btn-success flex-grow-1" type="button">Submit</button>
                &nbsp;&nbsp;
                <button type="reset" class="btn btn-primary flex-grow-1" type="button">Reset</button>
            </div>
            <h6>forgot password?<a href="forgot.php">
                    click here</h6></a>

            
        </form>

        <form class="d-none" id="register-form" action="/_register.php" method="POST" enctype="multipart/form-data">
            <h3 class="pt-5 pt-md-4 pt-xl-2">Register as a new reader!</h3>
            <div class="mb-3">
                <label id="t1" class="form-label">Name</label><span class="required">*</span>
                <input name="name" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <label id="t1" class="form-label">Email address</label><span class="required">*</span>
                <input name="email" type="email" class="form-control" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label id="t1" class="form-label">Password</label><span class="required">*</span>
                <input name="password" type="password" class="form-control" required>
            </div>
            <input name="role" value="reader" type="hidden">
            <div class="text-center d-flex justify-content-between">
                <button type="submit" class="btn btn-success flex-grow-1" type="button">Submit</button>
                &nbsp;&nbsp;
                <button type="reset" class="btn btn-primary flex-grow-1" type="button">Reset</button>
            </div>
        </form>
        <?php 
        echo $_GET['msg']??'';
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>