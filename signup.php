<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // Hash the password
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal_code = $_POST['postal_code'];

    // Insert user into database
    $query = "INSERT INTO users (first_name, last_name, email, password, phone, address, city, state, postal_code) 
              VALUES ('$first_name', '$last_name', '$email', '$password', '$phone', '$address', '$city', '$state', '$postal_code')";
    if (mysqli_query($conn, $query)) {
        header('Location: login.php');
        exit();
    } else {
        $error = "Error: Could not register. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="form-container">
        <h1>Sign Up</h1>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST" action="">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <input type="text" name="address" placeholder="Address" required>
            <input type="text" name="city" placeholder="City" required>
            <input type="text" name="state" placeholder="State" required>
            <input type="text" name="postal_code" placeholder="Postal Code" required>
            <button type="submit">Sign Up</button>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>
</body>
</html>
