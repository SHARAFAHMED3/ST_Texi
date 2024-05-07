<?php
session_start();
require_once '../db_connection.php';

// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $taxi_id = $_POST['id'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Update the taxi details in the database
    $query = "UPDATE taxis SET type='$type', description='$description', price='$price' WHERE id='$taxi_id'";
    $result = $conn->query($query);

    if ($result) {
        // Taxi details updated successfully
        header("Location: manage_taxis.php"); // Redirect to the manage_taxis.php page
        exit();
    } else {
        // Error occurred while updating taxi details
        echo "Error: Unable to update taxi details. Please try again.";
    }
} else {
    // Redirect if the form is not submitted via POST method
    header("Location: manage_taxis.php");
    exit();
}
?>
