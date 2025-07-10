<?php
session_start();
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productid = isset($_POST['productid']) ? intval($_POST['productid']) : null;
    $userName = isset($_POST['userName']) ? htmlspecialchars($_POST['userName']) : null;
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $address = htmlspecialchars($_POST['address']);
    $paymentMethod = htmlspecialchars($_POST['paymentMethod']);
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 1;

    $sql = "SELECT price FROM products WHERE productid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $productid);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $productPrice = $product['price'];
        $totalPrice = $productPrice * $quantity; 
    }

    $sql = "INSERT INTO orders (productid, userName, email, phone, address, paymentMethod, quantity, price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssis", $productid, $userName, $email, $phone, $address, $paymentMethod, $quantity, $totalPrice);

    if ($stmt->execute()) {
        $orderSuccess = true; 
        $orderId = $conn->insert_id; 
    } else {
        $orderError = true; 
    }
    $stmt->close();
}


?>

<body>
<style>
    body {
            background:linear-gradient(to right,#fff,#73c6b6);
        }

    .form-container {
        max-width: 600px;
        margin: 50px auto;
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    h2 {
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }
    .form-group label {
        font-weight: 500;
        color: #555;
    }
    .btn-submit {
        background-color: #73c6b6;
        color: white;
        width: 100%;
        border: none;
        padding: 10px;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s;
    }
    .btn-submit:hover {
        background-color: #aaa;
    }
    .success-message, .error-message {
        text-align: center;
        font-size: 18px;
        margin-top: 20px;
    }
    .success-message {
        color: green;
    }
    .error-message {
        color: red;
    }
    .product-card {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        margin-top: 40px;
        margin-bottom: 20px;
    }
  </style>
<?php include 'navbar.php'; ?>

<div class="container">
    <?php if (isset($_GET['buy'])): 
        $productid = intval($_GET['buy']);
        $sql = "SELECT * FROM products WHERE productid = $productid";
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $productDetails = $result->fetch_assoc();
        }
    ?>
        <?php if (!empty($productDetails)): ?>
            <div class="card product-card mx-auto" style="max-width: 550px;"> 
    <div class="row no-gutters">
        <div class="col-4">
            <img src="img/Productimg/<?php echo htmlspecialchars($productDetails['image_path']); ?>" class="card-img" alt="<?php echo htmlspecialchars($productDetails['name']); ?>">
        </div>
        <div class="col-8">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($productDetails['name']); ?></h5>
                <p class="card-text"><?php echo htmlspecialchars($productDetails['description']); ?></p>
                <p class="card-text"><strong>Price: Rs. <?php echo htmlspecialchars($productDetails['price']); ?></strong></p>
            </div>
        </div>
    </div>
</div>

        <?php endif; ?>
    <?php endif; ?>

    <!-- Checkout Form -->
    <div class="form-container">
        <h2 class="text-center" style="font-weight: bold; margin-bottom: 20px; color: #aaa;">CHECK OUT</h2>
        <form method="POST">
          
            <?php if (isset($productDetails)): ?>
                <input type="hidden" name="productid" value="<?php echo $productDetails['productid']; ?>">
            <?php endif; ?>

            <div class="form-group">
                <label for="userName">User Name</label>
                <input type="text" class="form-control" id="userName" name="userName" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1" required>
            </div>

            <div class="form-group">
                <label for="paymentMethod">Payment Method</label>
                <select class="form-control" id="paymentMethod" name="paymentMethod" required>
                    <option value="COD">Cash on Delivery</option>
                    <option value="E-sewa">E-sewa</option>
                    <option value="Bank Transfer">Bank Transfer</option>
                </select>
            </div>

            <div class="form-group">
                <label for="price">Total Price</label>
                <input type="text" class="form-control" id="price" value="<?php echo isset($productDetails) ? $productDetails['price'] : 0; ?>" readonly>
            </div>

            <?php if (isset($orderSuccess)): ?>
                <div id="successMessage" class="alert alert-success mt-3" role="alert">
                    Order placed successfully! Thank you for your purchase.
                </div>
            <?php elseif (isset($orderError)): ?>
                <div id="errorMessage" class="alert alert-danger mt-3" role="alert">
                    Failed to place the order. Please try again.
                </div>
            <?php endif; ?>
            

            <button type="submit" class="btn btn-submit">Purchase</button>
            
        </form>
        
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const successMessage = document.getElementById('successMessage');
        const errorMessage = document.getElementById('errorMessage');
        
        if (successMessage) {
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 2000); 
        }

        if (errorMessage) {
            setTimeout(() => {
                errorMessage.style.display = 'none';
            }, 2000); 
        }

        const quantityInput = document.getElementById('quantity');
        const priceInput = document.getElementById('price');
        const basePrice = <?php echo isset($productDetails) ? $productDetails['price'] : 0; ?>; 

        quantityInput.addEventListener('input', function () {
            const quantity = parseInt(quantityInput.value, 10) || 1; 
            const totalPrice = basePrice * quantity;
            priceInput.value = totalPrice; 
        });
    });
</script>

</body>

