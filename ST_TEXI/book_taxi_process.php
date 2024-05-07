<?php
session_start();
// Include database connection script
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id']; // Assuming user is logged in
    $taxi_id = $_POST['taxi_id']; // Assuming selected taxi id
    $booking_datetime = $_POST['booking_datetime']; // Assuming selected booking date and time

    // Check if the taxi is available
    $stmt_check_availability = $conn->prepare("SELECT availability FROM taxis WHERE id = ?");
    $stmt_check_availability->bind_param("i", $taxi_id);
    $stmt_check_availability->execute();
    $stmt_check_availability->bind_result($availability);
    $stmt_check_availability->fetch();
    $stmt_check_availability->close();

    if ($availability == 1) { // Taxi is available
        // Insert the booking details into the database
        $stmt_insert_booking = $conn->prepare("INSERT INTO bookings (user_id, taxi_id, booking_datetime) VALUES (?, ?, ?)");
        $stmt_insert_booking->bind_param("iis", $user_id, $taxi_id, $booking_datetime);
        $stmt_insert_booking->execute();
        $stmt_insert_booking->close();

        // Update taxi availability to FALSE
        $stmt_update_availability = $conn->prepare("UPDATE taxis SET availability = FALSE WHERE id = ?");
        $stmt_update_availability->bind_param("i", $taxi_id);
        $stmt_update_availability->execute();
        $stmt_update_availability->close();

        $_SESSION['booking_status'] = "success";
    } else {
        $_SESSION['booking_status'] = "failure";
    }

    // Close the database connection
    $conn->close();

    // Redirect back to book_taxi.php page
    header("Location: book_taxi.php");
    exit();
}
?>
