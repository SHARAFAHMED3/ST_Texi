<?php
require_once '../db_connection.php';

// Function to fetch options from the database and generate select element
function generateSelectOptions($table, $column, $label) {
    $html = "<label for='$column'>$label:</label>";
    $html .= "<select id='$column' name='$column' required>";
    
    global $conn;
    $sql = "SELECT $column FROM $table";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $html .= "<option value='" . $row[$column] . "'>" . $row[$column] . "</option>";
        }
    } else {
        $html .= "<option value=''>No $label available</option>";
    }

    $html .= "</select>";

    return $html;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Taxi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-top: 6px;
            margin-bottom: 16px;
        }

        button[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Add New Taxi</h2>
    <form action="add_taxi_process.php" method="POST" enctype="multipart/form-data">
        <?php
        echo generateSelectOptions('drivers', 'id', 'Driver ID');
        echo generateSelectOptions('drivers', 'vehicle_serial_no', 'Vehicle Serial No');
        ?>

        <label for="type">Taxi Type:</label>
        <input type="text" id="type" name="type" placeholder="Taxi Type" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" placeholder="Description" required></textarea>

        <label for="category">Category:</label>
        <select id="category" name="category" required>
            <option value="Van">Van</option>
            <option value="Car">Car</option>
            <option value="Bike">Bike</option>
            <option value="Wheel">Wheel</option>
        </select>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" placeholder="Price" required>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <button type="submit">Add Taxi</button>
    </form>
</body>
</html>
