<?php
session_start();
// Include database connection script
require_once '../db_connection.php';
// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch users data from the database
$query = "SELECT * FROM users";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/logo.ico" type="image/x-icon">

    <title>Manage Users</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .user-list {
            margin-top: 20px;
        }

        .user-item {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }

        .user-id, .user-name, .user-email {
            display: block;
            font-size: 16px;
            color: #333;
        }

        .user-id {
            font-weight: bold;
            color: #007bff;
        }

        .user-name, .user-email {
            margin-top: 5px;
        }

        .message-container {
            background-color: #f9f9f9;
            padding: 10px;
            margin-top: 10px;
            display: none; /* Hidden by default */
        }

        .message {
            color: #666;
            font-style: italic;
            margin-left: 20px;
        }

        .toggle-link {
            color: #007bff;
            cursor: pointer;
        }

        p {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Users</h1>
        <div class="user-list">
            <?php if ($result->num_rows > 0) : ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <div class="user-item">
                        <span class="user-id">User ID: <?php echo $row['id']; ?></span>
                        <span class="user-name">Username: <?php echo $row['username']; ?></span>
                        <span class="user-email">Email: <?php echo $row['email']; ?></span>
                        <!-- Toggle Link -->
                        <p class="toggle-link" onclick="toggleMessage(this)">Show Messages</p>
                        <!-- Message Container -->
                        <div class="message-container">
                            <?php
                                // Fetch messages for the current user
                                $user_id = $row['id'];
                                $messages_query = "SELECT * FROM messages WHERE user_id = $user_id";
                                $messages_result = $conn->query($messages_query);
                                if ($messages_result->num_rows > 0) {
                                    while ($message_row = $messages_result->fetch_assoc()) {
                                        echo '<span class="message">Message: ' . $message_row['message'] . '</span>';
                                        echo '<span class="message">Timestamp: ' . $message_row['timestamp'] . '</span><br>';
                                    }
                                } else {
                                    echo '<span class="message">No messages found.</span>';
                                }
                            ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p>No users found.</p>
            <?php endif; ?>
        </div>
    </div>
    <script>
        function toggleMessage(element) {
            var messageContainer = element.nextElementSibling;
            if (messageContainer.style.display === "none") {
                messageContainer.style.display = "block";
                element.innerText = "Hide Messages";
            } else {
                messageContainer.style.display = "none";
                element.innerText = "Show Messages";
            }
        }
    </script>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
