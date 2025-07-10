<?php
include '../connect.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background:linear-gradient(to right,#fff,#73c6b6);
        }

        .featured-products {
            text-align: center;
            margin: 10px 0 0px 0;
        }
        .featured-products h2 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            margin-bottom: 10px;
            font-size: 2.5rem;
            color: #333;
        }
        .product-card {
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.2s ease-in-out;
        }
        .product-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }
        .product-title {
            margin-top: 10px;
            font-weight: bold;
            color: #555;
            text-transform: uppercase;
            font-size: 0.9rem;
        }
        .product-link {
            text-decoration: none;
        }
        .product-link:hover {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

        
<div class="d-flex justify-content-center align-items-center" style="min-height: 50vh;">
    <div class="container text-center">
        <h2 class="mb-5" style="margin-top: 30px; font-weight:bold; color: #555;">Welcome to the Admin Panel</h2>
        <div class="row justify-content-center">
            <div class="col-lg-2 col-md-3 col-sm-4 mb-4">
                <a href="banners.php?name=lightsticks" class="product-link">
                    <div class="product-card shadow-sm">
                        <img src="../img\bannerimg\6.png" alt="Lightsticks" class="img-fluid">
                        <p class="product-title">Banners</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 mb-4">
                <a href="products.php?name=photocard" class="product-link">
                    <div class="product-card shadow-sm">
                        <img src="../img\Productimg\Blackpink jennie-photobook-solo.jpg" alt="Photocard" class="img-fluid">
                        <p class="product-title">Products</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 mb-4">
                <a href="orders.php?name=photobook" class="product-link">
                    <div class="product-card shadow-sm">
                        <img src="../img\Productimg\RedVelvet LipBalm.png" alt="Photobook" class="img-fluid">
                        <p class="product-title">Orders</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 mb-4">
                <a href="event.php?name=cd" class="product-link">
                    <div class="product-card shadow-sm">
                        <img src="../img\eventimg\BABYMONSTER 1st WORLD Tour.png" alt="CD" class="img-fluid">
                        <p class="product-title">Events</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4 mb-4">
                <a href="reviews.php?name=albums" class="product-link">
                    <div class="product-card shadow-sm">
                        <img src="../img\recimg\BLACKPINK.jpg" alt="Albums" class="img-fluid">
                        <p class="product-title">Reviews</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
