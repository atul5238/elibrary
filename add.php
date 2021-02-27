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
            <h1 style="color: rgb(253, 252, 252);
            text-align: center;margin-bottom: 0%;">ADD BOOKS TO YOUR SHELF</h1>
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
                        <a class="nav-link" href="shelf.php">BOOK SHELF</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="add.php">ADD BOOK</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
 

    <form action="/_addbook.php" method="POST" enctype="multipart/form-data">
        <div class="form" style="border-radius: 15px;">
            <h3 style="color: white;background: rgb(3, 21, 29);margin-left: 10%;margin-right: 10%; text-align: center; margin-top: 1%;">
                    Fill in the Book details
            </h3><br><br>

                <div class="form-floating mb-3">
                    <input  name ="book_name" type="text" class="form-control" id="floatingInput" placeholder=" "  required>
                    <label for="floatingInput">Enter Book Name</label>
                </div>

                <div class="form-floating">
                    <input name="author_name" type="text" class="form-control" id="floatingInput" placeholder=" " required>
                    <label for="floatingInput">Enter Author Name</label>
                </div><br>
            
                <div class="form-floating">
                    <input name="book_cover" type="text" class="form-control" placeholder="Paste Image URL" id="floatingInput" style="height:60px">
                    <label for="floatingInput">Paste Image URL</label>
                </div><br>

                <div class="form-floating">
                    <input name="book_url" type="text" class="form-control" placeholder=" " id="floatingInput" style="height: 60px">
                    <label for="floatingInput">Paste Book URL</label>
                </div><br>

                <div class="form-floating">
                    <textarea name="description" type="text" class="form-control" placeholder="" id="floatingInput"style="height: 200px">
                    </textarea>
                    <label for="floatingInput">Write something about this book</label>
                </div><br>

                <button type="submit" class="btn btn-outline-success" style="margin-left: 46.5%;">Upload</button>
                <br><br>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
</body>
</html>