<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Taxi Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Taxi Details</h2>
        <?php
        session_start();
        require_once '../db_connection.php';
        if (!isset($_SESSION['admin_id'])) {
            header("Location: admin_login.php");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
            $taxi_id = $_GET['id'];
            // Fetch taxi details based on taxi_id
            $query = "SELECT * FROM taxis WHERE id = $taxi_id";
            $result = $conn->query($query);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $type = $row['type'];
                $description = $row['description'];
                $price = $row['price'];
                // Display the form for editing taxi details
        ?>
                <form action="update_taxi.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $taxi_id; ?>">
                    Type: <input type="text" name="type" value="<?php echo $type; ?>"><br>
                    Description: <textarea name="description"><?php echo $description; ?></textarea><br>
                    Price: <input type="text" name="price" value="<?php echo $price; ?>"><br>
                    <input type="submit" value="Update Taxi">
                </form>
        <?php
            } else {
                echo "Taxi not found.";
            }
        } else {
            echo "Invalid request.";
        }
        ?>
    </div>
</body>
</html>
