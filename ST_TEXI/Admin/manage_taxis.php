<?php
session_start();
// Include database connection script
require_once '../db_connection.php';
// Check if the admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch taxis data from the database
$query = "SELECT * FROM taxis";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/logo.ico" type="image/x-icon">

    <title>Manage Taxis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        .taxi {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            position: relative;
        }
        .button {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            text-decoration: none;
            position: absolute;
            bottom: 10px;
        }
        .button.left {
            right: -32px;
            margin:40px;
        }
        .button.right {
            right: 10px;
        }
        .button:hover {
            filter: brightness(85%);
        }
        .add-button {
           position: relative;
            background-color: #28a745;
            color: #fff;
        }
        .edit-button {
            background-color: #ffc107;
            color: #000;
            width:48px
        }
        .delete-button {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Manage Taxis</h2>
        <a href="add_taxi.php" class="button add-button">Add Taxi</a>
        <hr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='taxi'>";
                echo "Taxi ID: " . $row['id'] . "<br>";
                echo "Type: " . $row['type'] . "<br>";
                echo "Description: " . $row['description'] . "<br>";
                echo "Price: LKR " . $row['price'] . "<br>";
                echo "<a href='edit_taxi.php?id=" . $row['id'] . "' class='button edit-button left'>Edit</a>";
                echo "<a href='delete_taxi.php?id=" . $row['id'] . "' class='button delete-button right'>Delete</a>";
                echo "</div><hr>";
            }
        } else {
            echo "No taxis available.";
        }
        ?>
    </div>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
