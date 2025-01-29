<?php
include 'conn.php'; // Database connection

// Fetch orders from the database
$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);

// Handle delete request
if (isset($_GET['delete'])) {
    $order_id = $_GET['delete'];
    $conn->query("DELETE FROM orders WHERE order_id = $order_id");
    header("Location: admin.php"); // Refresh the page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Nursery Orders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Admin Panel</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Username</th>
                    <th>Address</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>Order Date</th>
                    <th>Items</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['order_id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['payment_method']; ?></td>
                    <td><?php echo $row['order_status']; ?></td>
                    <td><?php echo $row['order_date']; ?></td>
                    <td><?php echo $row['items']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td>&#8377;<?php echo number_format($row['price'], 2); ?></td>
                    <td>
                        <a href="admin.php?delete=<?php echo $row['order_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this order?');">Delete</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
