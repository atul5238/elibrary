<?php
require_once  "_checkadminaccess.php";
require_once  "_connection.php";
$sql_query = "SELECT  * FROM books";
$result = mysqli_query($db_connection, $sql_query);


$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
if (null === $user_id) {
    header("location: 403.php"); 
}

$has_book_query = "SELECT * FROM has_book WHERE user_id='$user_id'";
$result_book_query = mysqli_query($db_connection, $has_book_query);
$all_has_book = mysqli_fetch_all($result_book_query);
function check_if_present($haystack, $book_id, $name)
{
    foreach ($haystack as $element) {
        if ($element[1] == $book_id && $element[2] == $name) {
            return true;
        }
    }
    return false;
}
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
            text-align: center;margin-bottom: 0%;">YOUR BOOK SHELF</h1>
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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="admin_shelf.php">Book Shelf</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add.php">Add Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Create Admin</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="dashboard.php">
                            <span class="icon d-inline-block"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="users-cog" class="svg-inline--fa fa-users-cog fa-w-20" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                    <path fill="currentColor" d="M610.5 341.3c2.6-14.1 2.6-28.5 0-42.6l25.8-14.9c3-1.7 4.3-5.2 3.3-8.5-6.7-21.6-18.2-41.2-33.2-57.4-2.3-2.5-6-3.1-9-1.4l-25.8 14.9c-10.9-9.3-23.4-16.5-36.9-21.3v-29.8c0-3.4-2.4-6.4-5.7-7.1-22.3-5-45-4.8-66.2 0-3.3.7-5.7 3.7-5.7 7.1v29.8c-13.5 4.8-26 12-36.9 21.3l-25.8-14.9c-2.9-1.7-6.7-1.1-9 1.4-15 16.2-26.5 35.8-33.2 57.4-1 3.3.4 6.8 3.3 8.5l25.8 14.9c-2.6 14.1-2.6 28.5 0 42.6l-25.8 14.9c-3 1.7-4.3 5.2-3.3 8.5 6.7 21.6 18.2 41.1 33.2 57.4 2.3 2.5 6 3.1 9 1.4l25.8-14.9c10.9 9.3 23.4 16.5 36.9 21.3v29.8c0 3.4 2.4 6.4 5.7 7.1 22.3 5 45 4.8 66.2 0 3.3-.7 5.7-3.7 5.7-7.1v-29.8c13.5-4.8 26-12 36.9-21.3l25.8 14.9c2.9 1.7 6.7 1.1 9-1.4 15-16.2 26.5-35.8 33.2-57.4 1-3.3-.4-6.8-3.3-8.5l-25.8-14.9zM496 368.5c-26.8 0-48.5-21.8-48.5-48.5s21.8-48.5 48.5-48.5 48.5 21.8 48.5 48.5-21.7 48.5-48.5 48.5zM96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm224 32c1.9 0 3.7-.5 5.6-.6 8.3-21.7 20.5-42.1 36.3-59.2 7.4-8 17.9-12.6 28.9-12.6 6.9 0 13.7 1.8 19.6 5.3l7.9 4.6c.8-.5 1.6-.9 2.4-1.4 7-14.6 11.2-30.8 11.2-48 0-61.9-50.1-112-112-112S208 82.1 208 144c0 61.9 50.1 112 112 112zm105.2 194.5c-2.3-1.2-4.6-2.6-6.8-3.9-8.2 4.8-15.3 9.8-27.5 9.8-10.9 0-21.4-4.6-28.9-12.6-18.3-19.8-32.3-43.9-40.2-69.6-10.7-34.5 24.9-49.7 25.8-50.3-.1-2.6-.1-5.2 0-7.8l-7.9-4.6c-3.8-2.2-7-5-9.8-8.1-3.3.2-6.5.6-9.8.6-24.6 0-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h255.4c-3.7-6-6.2-12.8-6.2-20.3v-9.2zM173.1 274.6C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path>
                                </svg></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="reader.php">Dashboard</a></li>
                            <li><a class="dropdown-item" href="#">Wishlist</a></li>
                            <li><a class="dropdown-item" href="admin_fav.php">Favourites</a></li>
                            <li><a class="dropdown-item" href="#">Change Password</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Manage Admins</a></li>
                            <li><a class="dropdown-item" href="#">Manage Users</a></li>
                            <li><a class="dropdown-item" href="_logout.php">Logout</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
            <!-- <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
        </div>
    </nav>
    <div class="full">

    </div>

    <div class="lists">
        <div class="row">
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) :
                    $count = $row['count'];
                    $author_name = $row['author_name'];
                    $book_id = $row['id'];
            ?>

                    <div class="col-md-3 col-sm-2">
                        <div class="card" style="background-color:rgb(202, 68, 27);margin:5%;">
                            <div class="card-block">
                                <img src="<?= $row['book_cover'] ?>" alt="" class="img-fluid" style="height:300px; width: 90%; margin: 5%;">
                                <div class="card-title">
                                    <h4 style="text-align-last: center; color: white;">
                                        <?= substr($row['name'], 0, 20) ?>
                                    </h4>
                                    <div class="card-text" style="text-align-last: center; color: white;">Written by :
                                        <?= $author_name ?>
                                    </div>
                                    <div class="card-text" style="text-align-last: center; color: white;">copies:
                                        <?= $count ?>
                                    </div>
                                    <div class="card-text">
                                        <div class="form-check form-switch"> <input class="upd_has_book_entry form-check-input" data-user_id="<?= $user_id ?>" data-book_id="<?= $book_id ?>" type="checkbox" value="finished" id="finished" <?php echo check_if_present($all_has_book, $book_id, 'finished') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="finished">finished</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="upd_has_book_entry form-check-input" type="checkbox" data-user_id="<?= $user_id ?>" data-book_id="<?= $book_id ?>" value="issue" id="issue" <?php echo check_if_present($all_has_book, $book_id, 'issue') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="issue">issue</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="upd_has_book_entry form-check-input" type="checkbox" data-user_id="<?= $user_id ?>" data-book_id="<?= $book_id ?>" value="wishlist" id="wishlist" <?php echo check_if_present($all_has_book, $book_id, 'wishlist') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="wishlist">whishlist</label>
                                        </div>
                                        <div class="form-check form-switch">
                                            <input class="upd_has_book_entry form-check-input" type="checkbox" data-user_id="<?= $user_id ?>" data-book_id="<?= $book_id ?>" value="favourite" id="favourite" <?php echo check_if_present($all_has_book, $book_id, 'favourite') ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="favourite">favourites</label>
                                        </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script>
        $('.upd_has_book_entry').on('change', function() {
            var data_val = {};
            data_val['user_id'] = $(this).data('user_id');
            data_val['book_id'] = $(this).data('book_id');
            data_val['name'] = $(this).val();
            data_val['value'] = $(this).is(":checked");
            var data = "val=" + JSON.stringify(data_val);
            $.ajax({
                url: "ajax-handler.php",
                data: data
            });


        });
    </script>
</body>

</html>