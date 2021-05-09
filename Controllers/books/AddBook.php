<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if($_SESSION['type']!='inadmin')
	header("location:/");
$book= new Books();

if(isset($_POST['book_name']) and isset($_POST['author_name']) and isset($_POST['book_description']) and isset($_POST['book_count'])){
	$book_name=mysqli_escape_string($conn,$_POST['book_name']);
	$author_name=mysqli_escape_string($conn,$_POST['author_name']);
	$description=mysqli_escape_string($conn,$_POST['book_description']);
	$count=mysqli_escape_string($conn,$_POST['book_count']);
	
	$t=substr($book_name,0,5);
	$i=substr($description,0,5);
	$title=str_replace(' ','',$t).str_replace(' ', '', $i);
	$destination_path = getcwd().DIRECTORY_SEPARATOR;
	
	$target_dir = $destination_path.'resources/uploads/';   
	$filename=$title.".jpg";      
	$target_file = $target_dir . $filename;
	
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$check = getimagesize($_FILES["book_cover"]["tmp_name"]);
	if(($check == true)&&($_FILES["book_cover"]["size"] < 1048576)&&($imageFileType == "jpg")) {
	
		if (move_uploaded_file($_FILES["book_cover"]["tmp_name"], $target_file)) {
			if($bid=$book->registerBook($book_name,$author_name,$description,$title,$count)){
				
				
				header('location:/login?view=books');
			}
			else
				header('location:/login?view=books');		
		}
		else
			header('location:/login?view=books');
	}
	else
			header('location:/login?books=1');
}
else
header('location:/');
?>
