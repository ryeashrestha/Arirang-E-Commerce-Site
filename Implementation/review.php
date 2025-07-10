<?php
session_start();
include("connect.php");

$reviewSuccess = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['productName'];
    $productReview = $_POST['productReview'];
    $rating = $_POST['rating'];

    $sql = "INSERT INTO reviews (productName, productReview, rating) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $productName, $productReview, $rating);
    $stmt->execute();
    $stmt->close();

    $reviewSuccess = true;
}
?>
<body>
<?php include 'navbar.php'; ?>
<style>
        body {
            background: linear-gradient(to right, #fff, #73c6b6);
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
        font-weight: 500;
        color: #555;
        }
        .btn-submit {
            background-color: #73c6b6 !important;
            color: white !important;
            font-weight: bold !important;
            width: 28% !important;
            display: block;
            margin: 20px auto 0 !important;
            align-items: center;
            text-align: center;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .btn-submit:hover {
            background-color: #5bb198 !important;
        }

        h2 {
            font-weight: bold;
            color: #aaa;
        }

        #successMessage {
            display: none;
        }
    </style>
<div class="container">
    <div class="form-container">
        <h2 class="text-center" style="font-weight: bold; margin-bottom: 20px; color: #aaa;">Submit Your Review</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" id="productName" name="productName" required>
            </div>
            <div class="form-group">
                <label for="productReview">Product Review</label>
                <textarea class="form-control" id="productReview" name="productReview" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="rating">Rating</label>
                <select class="form-control" id="rating" name="rating" required>
                    <option value="1">Awful</option>
                    <option value="2">Not Good</option>
                    <option value="3">Neutral</option>
                    <option value="4">Good</option>
                    <option value="5">Excellent</option>
                </select>
            </div>
            <button type="submit" class="btn-submit">Submit Review</button>
        </form>
        
        <?php if ($reviewSuccess): ?>
            <div id="successMessage" class="alert alert-success mt-3" role="alert">
                Review submitted successfully!
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php if ($reviewSuccess): ?>
            const successMessage = document.getElementById('successMessage');
            successMessage.style.display = 'block';
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 2000);
        <?php endif; ?>
    });
</script>
<?php include 'footer.php'; ?>
</body>
</html>
