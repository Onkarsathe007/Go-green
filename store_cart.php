<?php
session_start();  // Start the session

// Get the raw POST data from the incoming request
$data = json_decode(file_get_contents('php://input'), true);

// Check if the cart data is present
if (isset($data['cart'])) {
    // Decode the JSON cart data and store it in the session
    $_SESSION['cart'] = json_decode($data['cart'], true);

    // Send a success response as JSON
    echo json_encode(['message' => 'Cart saved successfully!', 'cart' => $_SESSION['cart']]);
} else {
    // Send an error response as JSON if no cart data was received
    echo json_encode(['message' => 'Failed to save cart.']);
}
?>
