<?php  
    require_once  "_connection.php" ;        
   	    if( isset($_POST["book_name"])  &&  isset( $_POST["book_cover"] ) 
            && isset( $_POST["book_url"] ) && isset( $_POST["description"] ) &&  isset( $_POST["author_name"] ) 
            && !empty($_POST["book_name"])  &&  !empty( $_POST["book_cover"] ) 
            && !empty( $_POST["book_url"] ) &&  !empty( $_POST["description"] ) &&  !empty( $_POST["author_name"] )  
          )

	    {
       
		        $book_name = mysqli_real_escape_string( $db_connection, $_POST["book_name"] );  
   		      $book_cover = mysqli_real_escape_string( $db_connection,  $_POST["book_cover"] );
            $book_url = mysqli_real_escape_string( $db_connection,  $_POST["book_url"] );
            $description =substr( mysqli_real_escape_string( $db_connection,  $_POST["description"] ),0,100);
            $author_name = mysqli_real_escape_string( $db_connection,  $_POST["author_name"] );
		
		
            $sql_query = "INSERT INTO author (name) values ('$author_name') ";
            $result = mysqli_query($db_connection, $sql_query);
            $sql_query = "SELECT LAST_INSERT_ID();";
            $row = mysqli_fetch_array(mysqli_query($db_connection, $sql_query) );
            $author_id = reset($row);
            $sql_query = "INSERT INTO books (name,book_cover,author_id,book_url,description) values ('$book_name','$book_cover','$author_id','$book_url','$description'); ";
            

            $result = mysqli_query($db_connection, $sql_query);
      
        
            echo "<script type='text/javascript'>
	          window.setTimeout(function() { alert( 'Book added successfully!' );
            window.location = './shelf.php';},0);
	            </script>";
       
		
	    }
	    else
	    {
		    echo "<script type='text/javascript'>
                window.setTimeout(function () {
                alert('Invalid Data Entered, Try Again.!');
                window.location = './add.php';}, 0);
                </script>";
	    }
	        mysqli_close($db_connection);  
?>