<?php
session_start();
require_once '../db_connection.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $taxi_id = $_GET['id'];

    // Delete related bookings first
    $delete_bookings_query = "DELETE FROM bookings WHERE taxi_id = $taxi_id";
    if ($conn->query($delete_bookings_query) === TRUE) {
        // Bookings deleted successfully, now delete the taxi record
        $delete_taxi_query = "DELETE FROM taxis WHERE id = $taxi_id";
        if ($conn->query($delete_taxi_query) === TRUE) {
            header("Location: manage_taxis.php");
            exit();
        } else {
            echo "Error deleting taxi: " . $conn->error;
        }
    } else {
        echo "Error deleting bookings: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

?>
