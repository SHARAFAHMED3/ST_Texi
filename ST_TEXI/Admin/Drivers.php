<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/logo.ico" type="image/x-icon">

    <title>Register New Driver</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('../assets/background.jpeg');
                }

        h2 {
            text-align: center;
            margin-top: 20px;
            color:white;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Register New Driver</h2>
    <form action="register_driver.php" method="POST">
        <label for="driver_name">Driver Name:</label>
        <input type="text" id="driver_name" name="driver_name" required>
        
        <label for="owner_name">Owner Name:</label>
        <input type="text" id="owner_name" name="owner_name" required>
        
        <label for="driver_address">Driver Address:</label>
        <input type="text" id="driver_address" name="driver_address" required>
        
        <label for="owner_address">Owner Address:</label>
        <input type="text" id="owner_address" name="owner_address" required>
        
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        
        <label for="vehicle_serial_no">Vehicle Serial No:</label>
        <input type="text" id="vehicle_serial_no" name="vehicle_serial_no" required>
        
        <button type="submit">Register</button>
    </form>
</body>
</html>
