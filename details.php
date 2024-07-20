<?php
require_once "connection.php";

$isbn_code = $_GET["isbn_code"];

$sql = "SELECT * FROM `library` WHERE `isbn_code` = $isbn_code";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

$layout = '<header class="bg-primary text-white text-center py-3">
    <h1>Book Details</h1>
</header>
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card library-card">';
if ($row["image"]) {
    $layout .= '<img src="images/' . $row["image"] . '" class="card-img-top" alt="' . htmlspecialchars($row["title"]) . '">';
}
$layout .= '<div class="card-body">
                <h5 class="card-title">' . htmlspecialchars($row["title"]) . '</h5>
                <hr>
                <h6 class="card-subtitle mb-2 text-muted">Type: ' . htmlspecialchars($row["type"]) . '</h6>
                <p class="card-text">Author: ' . htmlspecialchars($row["author_first_name"]) . ' ' . htmlspecialchars($row["author_last_name"]) . '</p>
                <p class="card-text">Publisher: ' . htmlspecialchars($row["publisher_name"]) . '</p>
                <p class="card-text">Address: ' . htmlspecialchars($row["publisher_address"]) . '</p>
                <p class="card-text">Published Date: ' . htmlspecialchars($row["publish_date"]) . '</p>
                <p class="card-text">' . htmlspecialchars($row["description"]) . '</p>
                <a href="index.php" class="btn btn-primary">Back to All Books</a>
            </div>
        </div>
    </div>
</div>
</div>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Library Catalog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="create.php">Add Data</a>
                </li>
            </ul>
            <!-- Search Form in Navbar -->
            <form method="post" class="d-flex ms-auto" action="index.php">
                <input type="text" name="search_query" class="form-control me-2" placeholder="Search by title or author">
                <button class="btn btn-outline-light" type="submit" name="search">Search</button>
            </form>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container my-4">
        <?= $layout ?>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        &copy; <?= date('Y'); ?> Library. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>