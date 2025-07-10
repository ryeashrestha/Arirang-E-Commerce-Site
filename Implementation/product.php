<?php
session_start();
include 'connect.php';

if (isset($_GET['productid'])) {
    $productid = intval($_GET['productid']);
    $sql = "SELECT * FROM products WHERE productid = $productid";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $_SESSION['cart'][] = $product;

        $_SESSION['message'] = "Product added to cart successfully!";
    }

    header("Location: product.php");
    exit();
}
?>


<?php include 'navbar.php'; ?>
<style>
        .card {
            width: 300px;
            height: 200px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            margin-left: 45px;
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

        .success-message {
            position: fixed;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            z-index: 1000;
            display: none;
        }
    </style>
<?php if (isset($_SESSION['message'])): ?>
    <div class="success-message" id="successMessage">
        <?= htmlspecialchars($_SESSION['message']); ?>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>

<div class="container my-5">
    <h2 class="text-center" style="font-weight: bold; margin-bottom: 30px; color: #aaa;">Products</h2>
    <div class="row">
        <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mb-3">';
                echo '<div class="card">';
                if (!empty($row['image_path'])) {
                    echo '<img src="img/Productimg/' . $row['image_path'] . '" class="card-img-top" alt="' . htmlspecialchars($row['name']) . '">';
                }
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($row['name']) . '</h5>';
                echo '<p class="card-text">' . htmlspecialchars($row['description']) . '</p>';
                echo '<p class="card-text"><strong>Price: Rs. ' . htmlspecialchars($row['price']) . '</strong></p>';
                echo '<div style="display: flex; justify-content: space-between; width: 100%;">';
                echo '<a href="product.php?productid=' . $row['productid'] . '" class="btn" style="background-color: #73c6b6; color: white; font-size: 16px; padding: 5px 10px; width: 45%; transition: background-color 0.3s ease;">Add to Cart</a>';
                echo '<a href="order.php?buy=' . $row['productid'] . '" class="btn" style="background-color: #73c6b6; color: white; font-size: 16px; padding: 5px 10px; width: 45%; transition: background-color 0.3s ease;">Buy Now</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p class="text-center">No products available!</p>';
        }
        ?>
    </div>
</div>

<?php include 'footer.php'; ?>
</script>
</body>
