<?php
$user = new Users();
$uid=$_SESSION['uid'];
$readBookss=$user->fetchBooks($uid, 'finish');
require __dir__.'/'.'../../Views/books/books_list.view.php';
?>