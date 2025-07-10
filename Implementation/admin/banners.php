<?php
include '../connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $image_path = '';

    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../img/bannerimg/";
        $image_path = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_path;

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Error uploading the image.";
        }
    }

    $sql = "INSERT INTO banners (image_path) VALUES ('$image_path')";
    if ($conn->query($sql) === TRUE) {
        header("Location: banners.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "SELECT image_path FROM banners WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $sql = "DELETE FROM banners WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        if (!empty($row['image_path']) && file_exists("../img/bannerimg/" . $row['image_path'])) {
            unlink("../img/bannerimg/" . $row['image_path']);
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Manage Banners</title>
    <style>
        .navbar .navbar-brand {
            font-family: 'Pacifico', cursive;
            color: #73c6b6 !important;
            font-size: 2rem !important;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="container my-5">
    <h2 class="text-center" style="font-weight: bold; margin-bottom: 20px; color: #aaa;">Manage Banners</h2>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="image" class="form-label">Banner Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-success">Add Banner</button>
    </form>

    <hr>

    <!-- Display Banners -->
    <div class="row">
        <?php
        $sql = "SELECT * FROM banners";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-12 mb-3">';
                echo '<img src="../img/bannerimg/' . $row['image_path'] . '" class="img-fluid w-100" alt="Banner">';
                echo '<a href="banners.php?delete=' . $row['id'] . '" class="btn btn-danger mt-2">Delete</a>';
                echo '</div>';
            }
        } else {
            echo '<p>No banners available!</p>';
        }
        ?>
    </div>
</div>
</body>
</html>
