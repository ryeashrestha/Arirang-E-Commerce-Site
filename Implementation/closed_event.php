<?php
include 'connect.php';
?>

<?php include 'navbar.php'; ?>
<style>
        .card {
            width: 300px;
            height: auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            margin-bottom: 30px;
            margin-left: 40px;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            object-fit: cover;
        }

        .card-body {
            padding: 10px;
        }

        .card-title, .card-text {
            font-size: 14px;
        }
    </style>
<div class="container my-5">
    <h2 class="text-center" style="font-weight: bold; margin-bottom: 30px; color: #aaa;">Events</h2>
    <div class="row">
    <?php
    $sql = "SELECT * FROM events";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-md-4 mb-3">';
            echo '<div class="card">';
            if (!empty($row['image_path'])) {
                echo '<img src="img/eventimg/' . $row['image_path'] . '" class="card-img-top" alt="' . htmlspecialchars($row['name']) . '">';
            }
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($row['name']) . '</h5>';
            echo '<p class="card-text">' . htmlspecialchars($row['description']) . '</p>';
            echo '<p class="card-text"><strong>Start Date:</strong> ' . htmlspecialchars($row['startDate']) . '</p>';
            echo '<p class="card-text"><strong>Location:</strong> ' . htmlspecialchars($row['location']) . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p class="text-center">No Events happening!</p>';
    }
    ?>
</div>

</div>
<?php include 'footer.php'; ?>
</body>

