<?php
session_start();
include("connect.php");
?>

<?php include 'navbar.php'; ?>
<div class="container-fluid p-0">
<style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .banner img {
            width: 100%;
            height: auto;
            display: block;
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
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.2s ease-in-out;
        }
        .product-card img {
            width: 100%;
            height: 200px;
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
        }
        .product-link {
            text-decoration: none;
        }
        .product-link:hover {
            text-decoration: none;
        }

            .card {
                transition: transform 0.2s ease-in-out;
                border-radius: 15px;
                overflow: hidden;
                padding: 10px 5px;
                width: 70%;
                height: 50%;
            }
            .card img {
                width: 120px;
                height: 120px;
                border-radius: 15px;
                object-fit: cover;
                transition: transform 0.2s ease-in-out;
                margin-top: 5px;
            }
            .card:hover {
                transform: translateY(-10px);
                box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            }
            .card-title {
                margin-bottom: 0px;
                font-weight: bold;
                color: #555;
                text-transform: uppercase;
                font-size: 14px;
                padding-bottom: 0px;
            }

            .card {
                --bs-card-spacer-y: 0.5rem;
                --bs-card-spacer-x: 0.5rem;
            }
            .h2.mb-4 {
                margin-bottom: 2rem; 
            }

    </style>
    <?php
    $sql = "SELECT * FROM banners";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div>';
            echo '<img src="img/bannerimg/' . $row['image_path'] . '" class="img-fluid w-100" alt="Banner">';
            echo '</div>';
        }
    } else {
        echo '<p>No banners available.</p>';
    }
    ?>
</div>

<!-- Featured Products Section -->
<div class="d-flex justify-content-center align-items-center" style="min-height: 50vh;">
    <div class="container text-center">
        <h2 class="mb-5" style="margin-top: 30px;">FEATURED PRODUCTS</h2>
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="product.php?name=lightsticks" class="product-link">
                    <div class="product-card shadow-sm">
                        <img src="img/featuredproductimg/KIOF.png" alt="Lightsticks" class="img-fluid">
                        <p class="product-title">Lightsticks</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="product.php?name=photocard" class="product-link">
                    <div class="product-card shadow-sm">
                        <img src="img/featuredproductimg/aespa 'Armageddgon' Postcard.png" alt="Photocard" class="img-fluid">
                        <p class="product-title">Photocard</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="product.php?name=photobook" class="product-link">
                    <div class="product-card shadow-sm">
                        <img src="img/featuredproductimg/Map of the soul photobook.png" alt="Photobook" class="img-fluid">
                        <p class="product-title">Photobook</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="product.php?name=cd" class="product-link">
                    <div class="product-card shadow-sm">
                        <img src="img/featuredproductimg/New Jeans [SuperNatural] ALBUM CD.png" alt="CD" class="img-fluid">
                        <p class="product-title">CD</p>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="product.php?name=albums" class="product-link">
                    <div class="product-card shadow-sm">
                        <img src="img/featuredproductimg/aespa girls.png" alt="Albums" class="img-fluid">
                        <p class="product-title">Albums</p>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="product.php?name=miscellaneous-merch" class="product-link">
                    <div class="product-card shadow-sm">
                        <img src="img/featuredproductimg/BLINK Membership Card Japan.png" alt="Miscellaneous Merch" class="img-fluid">
                        <p class="product-title">Miscellaneous Merch</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>


<!-- Recommended Artist Section -->
<div class="container d-flex flex-column align-items-center mt-5" style="margin-top: 30px;">
    <h2 class="mb-4" >Recommended Artists</h2>
    <div class="row row-cols-2 row-cols-md-4 row-cols-lg-5 g-3 justify-content-center">
        <?php
        $artists = [
            ["name" => "BTS", "image" => "img/recimg\bts.jpg"],
            ["name" => "TXT", "image" => "img/recimg\TXT.jpg"],
            ["name" => "BLACKPINK", "image" => "img/recimg\BLACKPINK.jpg"],
            ["name" => "LE SSSERAFIM", "image" => "img/recimg\LES.jpg"],
            ["name" => "TWICE", "image" => "img/recimg\TWICE.jpg"],
            ["name" => "NEW JEANS", "image" => "img/recimg\NJ.jpg"],
            ["name" => "AESPA", "image" => "img/recimg\AESPA.jpg"],
            ["name" => "G-IDLE", "image" => "img/recimg\G-IDLE.jpg"],
            ["name" => "BABY MONSTER", "image" => "img/recimg\BM.jpg"],
            ["name" => "EN-HYPHEN", "image" => "img/recimg\EN.jpg"]
        ];
        foreach ($artists as $artist) {
            echo '<div class="col text-center">';
            echo '<div class="card h-100 border-0">';
            echo '<img src="' . $artist["image"] . '" class="card-img-top mx-auto" alt="' . $artist["name"] . '" style="width: 150px; height: 150px; border-radius: 15px;">';
            echo '<div class="card-body">';
            echo '<h6 class="card-title">' . $artist["name"] . '</h6>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<!-- why shop -->
<div class="why-shop" style="margin-top: 70px;">
    <div class="card mx-auto p-4" style="max-width: 95%; border-radius: 25px; padding-top: 50px;">
        <h3 class="text-center font-weight-extra bold" style="font-size: 2rem;">Why Shop with Arirang?</h3>
        <div class="row g-4" style="padding: 15px; margin-top: 0px; row-gap: 0px; column-gap: 20px;">
            <div class="col-md-6 mb-4 text-center" style="border: 2px solid #73c6b6; border-radius: 25px; width: 48%;">
                <div class="icon" style="font-size: 1.5rem; color: #73c6b6;">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h5 style="font-size: 1rem; margin-top: 10px;">AUTHENTIC PRODUCTS GUARANTEED</h5>
                <p style="font-size: 0.85rem;">At Arirang, we provide official and premium-quality merchandise specially curated for Nepal-based K-pop fans.</p>
            </div>
            <div class="col-md-6 mb-4 text-center" style="border: 2px solid #73c6b6; border-radius: 25px; width: 48%;">
                <div class="icon" style="font-size: 1.5rem; color: #73c6b6;">
                    <i class="fas fa-truck"></i>
                </div>
                <h5 style="font-size: 1rem; margin-top: 10px;">RELIABLE & SPEEDY DELIVERY</h5>
                <p style="font-size: 0.85rem;">Your orders are carefully packed and delivered promptly, ensuring a hassle-free experience.</p>
            </div>
            <div class="col-md-6 mb-4 text-center" style="border: 2px solid #73c6b6; border-radius: 25px; width: 48%;">
                <div class="icon" style="font-size: 1.5rem; color: #73c6b6;">
                    <i class="fas fa-headset"></i>
                </div>
                <h5 style="font-size: 1rem; margin-top: 10px;">DEDICATED SUPPORT TEAM</h5>
                <p style="font-size: 0.85rem;">Got questions or concerns? Our friendly support team is always here to assist and make your shopping journey seamless.</p>
            </div>
            <div class="col-md-6 mb-4 text-center" style="border: 2px solid #73c6b6; border-radius: 25px; width: 48%;">
                <div class="icon" style="font-size: 1.5rem; color: #73c6b6;">
                    <i class="fas fa-users"></i>
                </div>
                <h5 style="font-size: 1rem; margin-top: 10px;">CONNECT WITH US</h5>
                <p style="font-size: 0.85rem;">Looking for help with group orders, ticket requests, or event bookings? We’ve got you covered. <a href="#">Find out more</a>.</p>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <hr style="border: none; border-top: 1px solid #ccc; margin: 40px 0;">
</div>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
