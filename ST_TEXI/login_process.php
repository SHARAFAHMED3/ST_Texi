<?php
// login_process.php

require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and execute the query to retrieve user information
    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // Check if a user with the given email exists
    if ($stmt->num_rows == 1) {
        // Bind the results to variables
        $stmt->bind_result($id, $username, $hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Start a session and set session variables
            session_start();
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            // Redirect to the index page upon successful login
            header("Location: index.php");
            exit();
        } else {
            // Redirect back to the login page with an error code
            header("Location: login.php?error=1");
            exit();
        }
    } else {
        // Redirect back to the login page with an error code
        header("Location: login.php?error=1");
        exit();
    }

    // Close the database connection
    $conn->close();
}
?>
