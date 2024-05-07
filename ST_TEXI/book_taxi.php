<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Taxi</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="assets/logo.ico" type="image/x-icon">

    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-image: url('assets/background.jpeg');
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        form label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        form select, form input[type="datetime-local"], form button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        form button:hover {
            background-color: #0056b3;
        }
        nav {
            background-color: #444;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: inline;
        }

        nav ul li {
            display: inline;
            margin-right: 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            padding: 10px;
        }

        .user-info {
            float: right;
            margin-right: 20px;
        }


        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        nav ul li a:hover {
            background-color: #555;
        }
    </style>
    <script>
        // Check for booking status message in session and display alert accordingly
        window.onload = function() {
            <?php
            if (isset($_SESSION['booking_status'])) {
                if ($_SESSION['booking_status'] === "success") {
                    echo 'alert("Taxi booked successfully!");';
                } else {
                    echo 'alert("The selected taxi is not available.");';
                }
                // Unset the session variable after displaying the message
                unset($_SESSION['booking_status']);
            }
            ?>
        }
    </script>
</head>
<body>
    
<nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="view_taxis.php">Available Taxis</a></li>
            <li><a href="contact_admin.php">Contact Admin</a></li>
            <li><a href="about.php">About</a></li>

            <?php 
             // Check if the user is logged in
             if (isset($_SESSION['user_id'])) : ?>
                 <li><a href="book_taxi.php">Book Taxi</a></li>
                 <li class="user-info"><?php echo $_SESSION['username']; ?> | <a href="logout.php">Logout</a></li>
             <?php else: ?>
                 <li class="user-info"><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
             <?php endif; ?>
        </ul>
    </nav>
    <div class="container">
    <h2>Book Taxi</h2>
    <form action="book_taxi_process.php" method="POST">
        <label for="taxi_id">Select Taxi Type:</label>
        <select name="taxi_id" id="taxi_id" required>
            <?php
            // Include database connection
            require_once 'db_connection.php';

            // SQL query to retrieve available taxis
            $sql = "SELECT id, type, category FROM taxis WHERE availability = 1"; // Only fetch available taxis
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['id'] . "'>".'Serial No: ' . $row['id'].'  '.'Type: '. $row['type'] . ' - Category: ' . $row['category'] . "</option>";
                }
            } else {
                echo "<option value=''>No available taxis</option>";
            }

            // Close database connection
            $conn->close();
            ?>
        </select>
        <label for="booking_datetime">Select Booking Date and Time:</label>
        <input type="datetime-local" name="booking_datetime" id="booking_datetime" required>
        <button type="submit">Book Taxi</button>
    </form>
</div>
</body>
</html>
