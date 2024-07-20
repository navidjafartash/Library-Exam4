<?php
require_once "connection.php";
require_once "file_upload.php";


$search_query = "";
if (isset($_POST['search'])) {
    $search_query = mysqli_real_escape_string($conn, $_POST['search_query']);
}

if (isset($_POST["add"])) {

    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $author_first_name = mysqli_real_escape_string($conn, $_POST["author_first_name"]);
    $author_last_name = mysqli_real_escape_string($conn, $_POST["author_last_name"]);
    $publisher_name = mysqli_real_escape_string($conn, $_POST["publisher_name"]);
    $publisher_address = mysqli_real_escape_string($conn, $_POST["publisher_address"]);
    $publish_date = mysqli_real_escape_string($conn, $_POST["publish_date"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $image = fileUpload($_FILES["image"]);


    $stmt = $conn->prepare("INSERT INTO `library` (`title`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `description`, `image`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $title, $type, $author_first_name, $author_last_name, $publisher_name, $publisher_address, $publish_date, $description, $image[0]);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success' role='alert'>
                  Book has been added with the title '{$title}'. You will be redirected to the home page in <span id='timer'>3</span> seconds!
              </div>";

        header("refresh: 3; url=index.php");
    } else {
        echo "<div class='alert alert-danger' role='alert'>
                  Something went wrong, please try again later!
              </div>";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Library Catalog</a>
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

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="form-container">
            <h2 class="form-title text-center mb-4">Add Book</h2>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" id="title" placeholder="Title" class="form-control" name="title" required>
                </div>
                <div class="form-group mb-3">
                    <label for="type">Type</label>
                    <select id="type" class="form-control" name="type" required>
                        <option value="">Select Type</option>
                        <option value="CD">CD</option>
                        <option value="DVD">DVD</option>
                        <option value="Book">Book</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="author_first_name">Author First Name</label>
                    <input type="text" id="author_first_name" placeholder="Author First Name" class="form-control" name="author_first_name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="author_last_name">Author Last Name</label>
                    <input type="text" id="author_last_name" placeholder="Author Last Name" class="form-control" name="author_last_name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="publisher_name">Publisher Name</label>
                    <input type="text" id="publisher_name" placeholder="Publisher Name" class="form-control" name="publisher_name" required>
                </div>
                <div class="form-group mb-3">
                    <label for="publisher_address">Publisher Address</label>
                    <input type="text" id="publisher_address" placeholder="Publisher Address" class="form-control" name="publisher_address" required>
                </div>
                <div class="form-group mb-3">
                    <label for="publish_date">Publish Date</label>
                    <input type="date" id="publish_date" class="form-control" name="publish_date" required>
                </div>
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea id="description" placeholder="Description" class="form-control" name="description" required></textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="image">Image</label>
                    <input type="file" id="image" class="form-control" name="image">
                </div>
                <div class="form-group mb-4 text-center">
                    <input type="submit" class="btn btn-primary" value="Add" name="add">
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        &copy; <?= date('Y'); ?> Library. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Timer for the alert message
        let timer = 3;
        setInterval(() => {
            timer--;
            document.getElementById("timer").innerText = timer;
        }, 1000);
    </script>
</body>

</html>