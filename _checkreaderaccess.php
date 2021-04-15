<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: _login.php");

}
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'reader') {
    header("location: 403.php");

}
