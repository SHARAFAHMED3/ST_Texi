<?php
// Assuming you already have a database connection established
require_once '../db_connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $driver_name = $_POST['driver_name'];
    $owner_name = $_POST['owner_name'];
    $driver_address = $_POST['driver_address'];
    $owner_address = $_POST['owner_address'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $vehicle_serial_no = $_POST['vehicle_serial_no'];

    // Perform password validation
    if ($password !== $confirm_password) {
        echo '<script>alert("Passwords do not match.");</script>';
        echo '<script>window.location.href = "admin_dashboard.php";</script>';
        exit();
    }

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // SQL query to insert data into the table
    $sql = "INSERT INTO drivers (driver_name, owner_name, driver_address, owner_address, username, password, vehicle_serial_no)
            VALUES ('$driver_name', '$owner_name', '$driver_address', '$owner_address', '$username', '$hashed_password', '$vehicle_serial_no')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("New driver registered successfully.");</script>';
        echo '<script>window.location.href = "admin_dashboard.php";</script>';    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
