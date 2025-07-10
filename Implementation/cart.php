<?php
session_start();
include 'connect.php';

if (isset($_GET['action']) && isset($_GET['productid'])) {
    $productid = intval($_GET['productid']);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    foreach ($_SESSION['cart'] as $key => $product) {
        if ($product['productid'] == $productid) {
            if ($_GET['action'] == 'increase') {
                $_SESSION['cart'][$key]['quantity']++;
            } elseif ($_GET['action'] == 'decrease' && $_SESSION['cart'][$key]['quantity'] > 1) {
                $_SESSION['cart'][$key]['quantity']--;
            }
            header("Location: cart.php");
            exit();
        }
    }
}

if (isset($_GET['remove']) && isset($_GET['productid'])) {
    $productid = intval($_GET['productid']);

    foreach ($_SESSION['cart'] as $key => $product) {
        if ($product['productid'] == $productid) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); 
            break;
        }
    }
    header("Location: cart.php");
    exit();
}

?>

<body>
<style>
        .card {
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
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

        .quantity-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .quantity-controls a {
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            background-color: #007bff;
            border-radius: 5px;
        }

<?php include 'navbar.php'; ?>

<div class="container my-5">
    <h2 class="text-center" style="font-weight: bold; margin-bottom: 20px; color: #aaa;">CART</h2>

    <div class="row">
        <?php
        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $product) {
                if (!isset($_SESSION['cart'][$key]['quantity'])) {
                    $_SESSION['cart'][$key]['quantity'] = 1;
                }

                echo '<div class="col-md-4 mb-3">';
                echo '<div class="card">';
                if (!empty($product['image_path'])) {
                    echo '<img src="img/Productimg/' . $product['image_path'] . '" class="card-img-top" alt="' . htmlspecialchars($product['name']) . '">';
                }
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($product['name']) . '</h5>';
                echo '<p class="card-text">' . htmlspecialchars($product['description']) . '</p>';
                echo '<p class="card-text"><strong>Price: Rs. ' . htmlspecialchars($product['price']) . '</strong></p>';
                echo '<p class="card-text"><strong>Quantity: ' . $_SESSION['cart'][$key]['quantity'] . '</strong></p>';

                // Quantity Controls
                echo '<div class="quantity-controls">';
                echo '<a href="cart.php?action=decrease&productid=' . $product['productid'] . '">-</a>';
                echo '<span style="padding: 5px 10px;">' . $_SESSION['cart'][$key]['quantity'] . '</span>';
                echo '<a href="cart.php?action=increase&productid=' . $product['productid'] . '">+</a>';
                echo '</div>';

                // Remove Button
                echo '<a href="cart.php?remove=true&productid=' . $product['productid'] . '" class="btn btn-danger mt-3">Remove</a>';

                echo '<a href="order.php?buy=' . $product['productid'] . '" class="btn btn-success mt-3 ms-2">Buy Now</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p class="text-center">Your cart is empty!</p>';
        }
        ?>
    </div>
</div>

<?php include 'footer.php'; ?>

</body>

