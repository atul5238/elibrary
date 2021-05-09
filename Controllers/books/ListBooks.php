<?php
$book = new Books();
$q = '';
$books_sorting = 'latest';
if(isset($_SESSION['fetchBooks'])){
	$bookIds=$_SESSION['fetchBooks'];
}
else
	$bookIds=NULL;
$limit=isset($_SESSION['limit'])?$_SESSION['limit']:10;
$limit=(isset($_POST['limit']))?mysqli_escape_string($conn,$_POST['limit']):$limit;
$offset=(isset($_GET['offset']))?mysqli_escape_string($conn,$_GET['offset']):0;
$total=mysqli_num_rows($book->fetchBooks());
if(isset($bookIds)){
	$rows=$book->fetchBooks();
} else  {
	if(isset($_GET['books-sorting'])) {
		$books_sorting = $_GET['books-sorting'];
	}
	if(isset($_GET['q']) && !empty($_GET['q']) ) {
		$q = $_GET['q'];
	}
	$rows=$book->fetchBooksLimit($limit,$offset, $books_sorting, $q);
}
$_SESSION['limit']=$limit;
$limit=($limit>$total)?$total:$limit;
require __dir__.'/'.'../../Views/books/books_card.view.php';
?>