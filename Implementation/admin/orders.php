<?php
include("../connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Orders</title>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        table {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        th, td {
            text-align: center;
        }
        .custom-thead {
            background-color: #73c6b6; 
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>

    <div class="container">
        <h2 class="text-center" style="font-weight: bold; margin-bottom: 20px; color: #aaa;">Placed Orders</h2>
        <table class="table table-bordered mt-4">
            <thead class="bg-info text-white">
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price (Per Item)</th>
                    <th>Total Price</th> 
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Payment Method</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT 
                            orders.orderID, 
                            products.name AS productName, 
                            products.price AS productPrice, 
                            orders.quantity, 
                            (products.price * orders.quantity) AS totalPrice, 
                            orders.userName, 
                            orders.email, 
                            orders.phone, 
                            orders.address, 
                            orders.paymentMethod, 
                            orders.orderDate 
                        FROM 
                            orders 
                        LEFT JOIN 
                            products 
                        ON 
                            orders.productid = products.productid 
                        ORDER BY 
                            orders.orderDate DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['orderID'] . "</td>";
                        echo "<td>" . htmlspecialchars($row['productName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                        echo "<td>Rs. " . htmlspecialchars($row['productPrice']) . "</td>"; 
                        echo "<td>Rs. " . htmlspecialchars($row['totalPrice']) . "</td>"; 
                        echo "<td>" . htmlspecialchars($row['userName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['paymentMethod']) . "</td>";
                        echo "<td>" . $row['orderDate'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11'>No orders found!</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
