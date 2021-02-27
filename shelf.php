<?php  
    require_once  "_connection.php" ;    
    $sql_query = "SELECT  * FROM books";
    $result = mysqli_query($db_connection, $sql_query);
    ?>
    
<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>E-library</title>
</head>

<body>
    <div class="header">
        <div class="container">
            <h1 style="color: rgb(253, 252, 252);text-align: center;margin-bottom: 0%;">HERE IS YOUR COLLECTION</h1>
        </div><br><br>
    </div>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color:gold;">E-Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="shelf.php">BOOK SHELF</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add.php">ADD BOOK</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="lists">
        <div class="row">
            <?php 
                if( mysqli_num_rows($result) > 0 )
                {
                while( $row = mysqli_fetch_assoc($result )) :
                    $author_id = $row['author_id'];
                    $sql_query1 = "SELECT  * FROM author WHERE id= '$author_id'";
                    $result1 = mysqli_query($db_connection, $sql_query1);
                    $author = mysqli_fetch_assoc($result1);
                    $author_name = $author['name'];
                    $sql_query = "SELECT * FROM books ORDER BY created_at DESC ";
            ?>

                <div class="col-md-3 col-sm-2">
                    <div class="card" style="background-color:rgb(202, 68, 27);margin:5%;">
                        <div class="card-block">
                            <a href="<?=$row['book_url'] ?>"><img src="<?=$row['book_cover'] ?>" alt=""
                                    class="img-fluid" style="height:300px; width: 90%; margin: 5%;"></a>
                            <div class="card-title">
                                <h4 style="text-align-last: center; color: white;">
                                    <?=substr( $row['name'],0,20) ?>
                                </h4>
                                <div class="card-text" style="text-align-last: center; color: white;">Written by :
                                    <?= $author_name?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile;
            }
                ?>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>


</body>
</html>