<?php
session_start();
include '../connect.php';

$sql = "SELECT reviewid, productName, productReview, 
        CASE 
            WHEN rating = 1 THEN 'Very Bad'
            WHEN rating = 2 THEN 'Bad'
            WHEN rating = 3 THEN 'Neutral'
            WHEN rating = 4 THEN 'Good'
            WHEN rating = 5 THEN 'Very Good'
        END AS rating,
        reviewDate
        FROM reviews
        ORDER BY 
        reviews.reviewDate DESC";
        
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Submitted Reviews</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Review ID</th>
                        <th>Product Name</th>
                        <th>Review</th>
                        <th>Rating</th>
                        <th>Review Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['reviewid']); ?></td>
                                <td><?php echo htmlspecialchars($row['productName']); ?></td>
                                <td><?php echo htmlspecialchars($row['productReview']); ?></td>
                                <td><?php echo htmlspecialchars($row['rating']); ?></td>
                                <td><?php echo htmlspecialchars($row['reviewDate']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">No reviews found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
