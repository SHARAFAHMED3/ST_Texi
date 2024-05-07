<?php
session_start();
require_once '../db_connection.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $type = $_POST['type'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $driver_id = $_POST['id'];
    $vehicle_serial_no = $_POST['vehicle_serial_no'];

    // File upload handling
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a valid image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check === false) {
        echo "File is not an image.";
        exit();
    }

    // Move the uploaded file to the target directory
    if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "Error uploading file.";
        exit();
    }

    // Insert taxi details into the database using prepared statements
    $query = "INSERT INTO taxis (type, description, category, price, image_url, driver_id, vehicle_serial_no) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssisss", $type, $description, $category, $price, $target_file, $driver_id, $vehicle_serial_no);
    
    if ($stmt->execute()) {
        // Alert message
        echo '<script>alert("Taxi added successfully.");</script>';
        // Redirect to add_taxi.php after a short delay
        echo '<script>window.setTimeout(function(){window.location.href = "add_taxi.php";}, 500);</script>';
    } else {
        echo "Error adding taxi: " . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
