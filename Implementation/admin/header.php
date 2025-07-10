<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar .navbar-brand {
            font-family: 'Pacifico', cursive;
            color: #73c6b6 !important;
            font-size: 2rem !important;
        }
        .navbar .nav-link {
            color: #333 !important;
            font-weight: 400;
        }
        .navbar .nav-link:hover {
            color: #73c6b6 !important;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">arirang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="banners.php">Manage Banners</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">Manage Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="event.php">Manage Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="orders.php">View Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="reviews.php">View Reviews</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
