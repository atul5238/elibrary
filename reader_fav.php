<?php
require_once  "_checkreaderaccess.php";
require_once  "_connection.php";



$user_id=isset($_SESSION['id']) ? $_SESSION['id']: null;
if(null === $user_id){
    header("location: _logout.php");
}

$has_book_query = "SELECT * FROM has_book WHERE user_id='$user_id'";
$result_book_query = mysqli_query($db_connection, $has_book_query);
$all_has_book = mysqli_fetch_all($result_book_query);

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
</head>

<body>
    <div class="header">
        <div class="container">
            <h1 class="pt-5 pt-md-4 pt-xl-2" style="color: rgb(253, 252, 252);
            text-align: center;margin-bottom: 0%;">FAVOURITES</h1>
        </div><br><br>
    </div>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="color:gold;">E-Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="shelf.php">Book Shelf</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shelf.php">History</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" aria-current="page" data-bs-toggle="dropdown" href="reader.php">
                            <span class="icon d-inline-block"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path>
                                </svg>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="reader.php">Dashboard</a></li>
                            <li><a class="dropdown-item" href="#">Wishlist</a></li>
                            <li><a class="dropdown-item" href="reader_fav.php">Favourites</a></li>
                            <li><a class="dropdown-item" href="#">Change Password</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="_logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
    <div class="full">

    </div>

    <div class="lists">
        <div class="row">
            <?php
            if (count($all_has_book) > 0) {
                foreach ($all_has_book as $has_book) :
                    if ($has_book[2]!=='favourite') {
                        continue;
                    }
                   
                    $book_id = $has_book[1];
                    $sql_query = "SELECT  * FROM books WHERE id = '$book_id'";
                    $result = mysqli_query($db_connection, $sql_query);
                    while ($row = mysqli_fetch_assoc($result)) :
                    $count = $row['count'];
                    $author_name = $row['author_name'];
            ?>

                    <div class="col-md-3 col-sm-2">
                        <div class="card" style="background-color:rgb(202, 68, 27);margin:5%;">
                            <div class="card-block">
                                <a href="<?= $row['book_url'] ?>"><img src="<?= $row['book_cover'] ?>" alt="" class="img-fluid" style="height:300px; width: 90%; margin: 5%;"></a>
                                <div class="card-title">
                                    <h4 style="text-align-last: center; color: white;">
                                        <?= substr($row['name'], 0, 20) ?>
                                    </h4>
                                    <div class="card-text" style="text-align-last: center; color: white;">Written by :
                                        <?= $author_name?>
                                    </div>
                                    <div class="card-text" style="text-align-last: center; color: white;">copies:
                                        <?= $count ?>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endwhile;endforeach;
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
   
    
</body>

</html>