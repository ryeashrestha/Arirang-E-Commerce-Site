<?php
include '../connect.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $start_date = $conn->real_escape_string($_POST['startDate']);
    $location = $conn->real_escape_string($_POST['location']);
    $image_path = '';

    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../img/eventimg/"; 
        $image_path = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_path;

        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "Error uploading the image.";
        }
    }

    $sql = "INSERT INTO events (name, description, startDate, location, image_path) 
            VALUES ('$name', '$description', '$start_date', '$location', '$image_path')";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>New event added successfully!</div>";
        header("Location: event.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "SELECT image_path FROM events WHERE eventid=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $sql = "DELETE FROM events WHERE eventid=$id";
    if ($conn->query($sql) === TRUE) {
        if (!empty($row['image_path']) && file_exists("../img/eventimg/" . $row['image_path'])) {
            unlink("../img/eventimg/" . $row['image_path']);
        }
        echo "<div id='message' class='alert alert-success'>Event deleted successfully!</div>";
    } else {
        echo "<div id='message' class='alert alert-danger'>Error deleting event: " . $conn->error . "</div>";
    }
}
?>

<script>
// JavaScript to hide the message after 1 second
setTimeout(function() {
    var message = document.getElementById('message');
    if (message) {
        message.style.display = 'none';
    }
}, 1000); // 1000 milliseconds = 1 second
</script>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Manage Event</title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
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
    <h2 class="text-center" style="font-weight: bold; margin-bottom: 20px; color: #aaa;">Manage Events</h2>
    <!-- Event Form -->
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Event Title</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="startDate" class="form-label">Start Date</label>
            <input type="datetime-local" class="form-control" id="startDate" name="startDate" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Event Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-success">Add</button>
    </form>

    <hr>

    <!-- Display Events -->
    <div class="row">
        <?php
        $sql = "SELECT * FROM events";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mb-3">';
                echo '<div class="card">';
                if (!empty($row['image_path'])) {
                    echo '<img src="../img/eventimg/' . $row['image_path'] . '" class="card-img-top" alt="' . htmlspecialchars($row['name']) . '">';
                }
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($row['name']) . '</h5>';
                echo '<p class="card-text">' . htmlspecialchars($row['description']) . '</p>';
                echo '<p class="card-text"><strong>Start Date:</strong> ' . htmlspecialchars($row['startDate']) . '</p>';
                echo '<p class="card-text"><strong>Location:</strong> ' . htmlspecialchars($row['location']) . '</p>';
                echo '<a href="event.php?delete=' . $row['eventID'] . '" class="btn btn-danger">Delete</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No Events available!</p>';
        }
        ?>
    </div>
</div>
<script>
setTimeout(function() {
    var message = document.getElementById('message');
    if (message) {
        message.style.display = 'none';
    }
}, 1000); 
</script>

</body>
</html>
