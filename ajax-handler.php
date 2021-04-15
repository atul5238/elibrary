<?php 
require_once  "_connection.php";
if ( ! isset($_GET['val']))  {
    echo false;
    exit;
}
$json = str_replace('&quot;', '"', $_GET['val']);
$val = json_decode($json, true);
$book_id=$val['book_id'];
$user_id=$val['user_id'];
$name=$val['name'];
$value=$val['value'];
$sql_query = "DELETE FROM has_book WHERE book_id='$book_id' AND user_id='$user_id' AND type='$name'";
$result = mysqli_query($db_connection, $sql_query);
if (false!==$value) {
    $sql_query = "INSERT INTO has_book (book_id, user_id, type) VALUES( '$book_id', '$user_id', '$name')";
    $result = mysqli_query($db_connection, $sql_query);
}