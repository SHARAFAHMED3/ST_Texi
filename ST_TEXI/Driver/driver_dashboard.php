<?php
session_start();
require_once '../db_connection.php';

// Check if the session variable 'driver_id' is set
if(isset($_SESSION['driver_id'])) {
    // Assuming you have a session variable storing the driver ID
    $driver_id = $_SESSION['driver_id'];

    // Fetch driver details from the database
    $driver_sql = "SELECT * FROM drivers WHERE id = ?";
    $driver_stmt = $conn->prepare($driver_sql);
    $driver_stmt->bind_param("i", $driver_id);
    $driver_stmt->execute();
    $driver_result = $driver_stmt->get_result();
    $driver_row = $driver_result->fetch_assoc();
    $driver_stmt->close();

    // Fetch availability status from the database by joining the taxis and drivers tables
    $availability_sql = "SELECT t.availability FROM taxis t 
            INNER JOIN drivers d ON t.driver_id = d.id 
            WHERE d.id = ?";
    $stmt = $conn->prepare($availability_sql);
    $stmt->bind_param("i", $driver_id);
    $stmt->execute();
    $stmt->bind_result($availability);
    $stmt->fetch();
    $stmt->close();
} else {
    echo "Session variable 'driver_id' is not set.";
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/logo.ico" type="image/x-icon">

    <title>Driver Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('../assets/background.jpeg');
            margin: 0;
            padding: 20px;
        }
.container{
    background-color: #cf8908;
    color:white;
}
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #white;
        }

        h3, h4 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            transform: translateX(26px);
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>Driver Dashboard</h2>
    <!-- Display driver details -->
    <h3>Welcome, <?php echo $driver_row['driver_name']; ?></h3>
    <h4>Vehicle Serial No: <?php echo $driver_row['vehicle_serial_no']; ?></h4>
    </div>
    <!-- Toggle switch for availability status -->
    <label class="switch">
        <input type="checkbox" id="availabilityToggle" <?php echo ($availability == 1) ? 'checked' : ''; ?>>
        <span class="slider"></span>
        <h4>Status: <?php echo ($availability == 1) ? 'Available' : 'Driving or Reserved'; ?></h4>
    </label>
    <script>
       // JavaScript code to handle toggle switch
document.addEventListener('DOMContentLoaded', function () {
    var availabilityToggle = document.getElementById('availabilityToggle');

    availabilityToggle.addEventListener('change', function () {
        var availability = availabilityToggle.checked ? 1 : 0; 

        // Send availability status via AJAX to update_availability.php
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_availability.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText); // Log response from update_availability.php
            }
        };
        xhr.send('availability=' + availability);
    });
});
    </script>
</body>
</html>

