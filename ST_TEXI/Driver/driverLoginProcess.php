<?php
session_start();
require_once '../db_connection.php'; // Adjust the path as per your file structure

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL statement to check if the credentials are valid
    $stmt = $conn->prepare("SELECT * FROM drivers WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // If the username exists, verify the password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables and redirect to dashboard or another page
            $_SESSION['driver_id'] = $row['id']; // Assuming you have a column named driver_id
            $_SESSION['driver_username'] = $row['username']; // Assuming you have a column named username
            header("Location: driver_dashboard.php"); // Adjust the path as needed
            exit();
        } else {
            // Password is incorrect, redirect back to the login page with an error message
            $_SESSION['login_error'] = "Invalid username or password";
            header("Location: driverLogin.php"); // Adjust the path as needed
            exit();
        }
    } else {
        // Username doesn't exist, redirect back to the login page with an error message
        $_SESSION['login_error'] = "Invalid username or password";
        header("Location: driverLogin.php"); // Adjust the path as needed
        exit();
    }
} else {
    // If the request method is not POST, redirect back to the login page
    header("Location: driverLogin.php"); // Adjust the path as needed
    exit();
}
?>
