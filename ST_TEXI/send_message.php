<?php
// send_message.php

session_start(); // Start the session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if user is logged in
    if (isset($_SESSION['user_id'])) {
        // Retrieve the message and user details from the form
        $message = $_POST['message'];
        $user_id = $_SESSION['user_id']; // Assuming user is logged in
        // You may retrieve additional user details as per your user management system

        // Validate and sanitize the message
        $message = htmlspecialchars($message); // Sanitize HTML tags
        // You may perform additional validation here depending on your requirements

        // Include database connection
        require_once 'db_connection.php';

        // Insert the message into the database
        $stmt = $conn->prepare("INSERT INTO messages (user_id, message) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $message);

        if ($stmt->execute()) {
            $response = "Message stored successfully!";
        } else {
            $response = "Failed to store message. Please try again later.";
        }

        // Close prepared statement and database connection
        $stmt->close();
        $conn->close();
    } else {
        $response = "User not logged in. Please log in to send a message.";
    }
} else {
    // If the request method is not POST, redirect to contact page
    header("Location: contact_admin.php");
    exit();
}

// Redirect back to contact page with the message in query string
header("Location: contact_admin.php?message=" . urlencode($response));
exit();
?>
