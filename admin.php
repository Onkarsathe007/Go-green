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
  <style>
    /* Futuristic Neon Admin Panel Theme */
:root {
  --primary-blue:rgb(0, 141, 56);
  --secondary-blue: #0088cc;
  --dark-blue: #001f3f;
  --neon-glow: rgba(0, 255, 255, 0.8);
  --bg-dark: #0a0f1e;
}

/* Background Animation */
body {
  background: radial-gradient(circle at top left, #001f3f, #0a0f1e);
  min-height: 100vh;
  font-family: 'Poppins', sans-serif;
  color: white;
  overflow: hidden;
}

/* Animated Background Lights */
body::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: url('https://source.unsplash.com/1600x900/?technology,abstract');
  background-size: cover;
  opacity: 0.1;
  filter: blur(10px);
  z-index: -1;
}

/* Container */
.container {
  background: rgba(0, 0, 0, 0.7);
  padding: 2rem;
  border-radius: 15px;
  box-shadow: 0 0 20px var(--neon-glow);
  text-align: center;
  transition: 0.5s ease-in-out;
  animation: neonPulse 3s infinite alternate;
}

@keyframes neonPulse {
  from {
    box-shadow: 0 0 10px var(--neon-glow);
  }
  to {
    box-shadow: 0 0 30px var(--primary-blue);
  }
}

/* Header Styling */
h2 {
  font-size: 2.5rem;
  letter-spacing: 2px;
  text-transform: uppercase;
  background: linear-gradient(45deg, var(--primary-blue), var(--secondary-blue));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: glowText 2s infinite alternate;
}

@keyframes glowText {
  from {
    text-shadow: 0 0 5px var(--primary-blue);
  }
  to {
    text-shadow: 0 0 15px var(--primary-blue);
  }
}

/* Table Styling */
.table {
  width: 100%;
  border-collapse: collapse;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(5px);
  border-radius: 10px;
  overflow: hidden;
}

.table thead {
  background: var(--primary-blue);
  color: black;
}

.table th,
.table td {
  padding: 1rem;
  text-align: left;
  border-bottom: 1px solid rgba(255, 255, 255, 0.2);
}

.table tbody tr:hover {
  background: rgba(0, 234, 255, 0.2);
  transform: scale(1.02);
  transition: 0.3s ease-in-out;
}

/* Neon Buttons */
button {
  background: none;
  border: 2px solid var(--primary-blue);
  color: var(--primary-blue);
  padding: 10px 20px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
  font-size: 1rem;
  font-weight: bold;
  text-transform: uppercase;
  position: relative;
  overflow: hidden;
}

button::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
  background: var(--primary-blue);
  top: 0;
  left: -100%;
  transition: 0.5s;
}

button:hover::before {
  left: 0;
}

button:hover {
  color: black;
  box-shadow: 0 0 10px var(--primary-blue);
}

/* Scrollbar */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: #061326;
}

::-webkit-scrollbar-thumb {
  background: var(--primary-blue);
  border-radius: 10px;
}

::-webkit-scrollbar-thumb:hover {
  background: var(--secondary-blue);
}

/* Responsive */
@media (max-width: 768px) {
  .container {
    padding: 1rem;
  }
  
  h2 {
    font-size: 2rem;
  }

  .table {
    display: block;
    overflow-x: auto;
  }
}

</style>
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
