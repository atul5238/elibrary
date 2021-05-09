<?php
$user = new Users();
$uid=$_SESSION['uid'];
$readBookss=$user->fetchBooks($uid, 'history_read');
require __dir__.'/'.'../../Views/books/books_list_history.view.php';
?>