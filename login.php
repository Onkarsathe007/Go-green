<?php
session_start();
include 'conn.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password']; 

    // Check login details
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['first_name'];
        $_SESSION['email'] = $user['email'];
        header('Location: index.php'); // Redirect to home page
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>
    <div class="form-container">
        <h1>Login</h1>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        </form>
    </div>
</body>
</html>
