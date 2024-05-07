<?php
session_start();
require_once '../db_connection.php';

// Check if the availability value is set and not empty
if(isset($_POST['availability'])) {
    // Get the availability value from the POST request
    $availability = $_POST['availability'];
    
    // Assuming you have a session variable storing the driver ID
    $driver_id = $_SESSION['driver_id'];

    // Update the availability status in the database
    $sql = "UPDATE taxis SET availability = ? WHERE driver_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $availability, $driver_id);

    if ($stmt->execute()) {
        // Return a success message to the client-side JavaScript
        echo "Availability status updated successfully.";
    } else {
        // Return an error message if the update fails
        echo "Error updating availability status: " . $conn->error;
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
} else {
    // Return an error message if the availability value is not set
    echo "Availability value not provided.";
}
?>
