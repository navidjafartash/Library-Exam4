<?php
require_once "connection.php";


$search_query = "";
if (isset($_POST['search'])) {
    $search_query = mysqli_real_escape_string($conn, $_POST['search_query']);
}


$sql = "SELECT * FROM `library` WHERE 1=1";
if (!empty($search_query)) {
    $sql .= " AND (title LIKE '%$search_query%' OR CONCAT(author_first_name, ' ', author_last_name) LIKE '%$search_query%')";
}

$result = mysqli_query($conn, $sql);

$layout = "";
if (mysqli_num_rows($result) == 0) {
    $layout .= "<p>No results found for your search.</p>";
} else {
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($rows as $row) {
        $layout .= "<div class='col mb-4'>
           <div class='card library-card'>
               <img src='images/{$row["image"]}' class='card-img-top' alt='{$row["title"]}'>
               <div class='card-body'>
                   <h5 class='card-title'>{$row["title"]}</h5>
                   <hr>
                   <h6 class='card-subtitle mb-2 text-muted'>{$row["type"]}</h6>
                   <a href='publisher.php?publisher_name=" . urlencode($row["publisher_name"]) . "' class='btn btn-primary'>{$row["publisher_name"]}</a>
                   <a href='details.php?isbn_code={$row["isbn_code"]}' class='btn btn-secondary'>Show Details</a>
               </div>
           </div>
        </div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Catalog</title>
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
            <form method="post" class="d-flex ms-auto">
                <input type="text" name="search_query" class="form-control me-2" placeholder="Search by title or author" value="<?= htmlspecialchars($search_query) ?>">
                <button class="btn btn-outline-light" type="submit" name="search">Search</button>
            </form>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container my-4">
        <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-xs-1">
            <?= $layout ?>
        </div>
    </div>

    <!-- Footer -->

    <footer class="bg-dark text-white text-center py-3 mt-5">
        &copy; <?= date('Y'); ?> Library. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>