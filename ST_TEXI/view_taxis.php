<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Taxis</title>
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
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .taxi {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
           align-items: center;
        }
        .taxi h3 {
            margin-top: 0;
            color: #007bff;
        }
        .taxi p {
            margin: 10px 0;
        }
        .taxi img {
            width: 100%;
            max-width: 300px;
            display: block;
            margin: 10px auto;
            border-radius: 4px;
        
                }
                .taxi-image {
            max-width: 200px; 
            margin-right: 20px; 
        }.taxi-details {
                flex-grow: 1;
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
             session_start();
             if (isset($_SESSION['user_id'])) : ?>
                 <li><a href="book_taxi.php">Book Taxi</a></li>
                 <li class="user-info"><?php echo $_SESSION['username']; ?> | <a href="logout.php">Logout</a></li>
             <?php else: ?>
                 <li class="user-info"><a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
             <?php endif; ?>
        </ul>
    </nav>
    <div class="container">
        <h2>Available Taxis</h2>
        <?php
        // Include database connection
        require_once 'db_connection.php';

        // SQL query to retrieve taxi data
        $sql = "SELECT * FROM taxis";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<div class='taxi'>";
                echo "<img src='Admin/" . $row['image_url'] . "' alt='Taxi Image' class='taxi-image'>";
                echo "<div class='taxi-details'>";
                echo "<h3>Taxi Serial No : " . $row['id'] . "</h3>";
                echo "<h3>Taxi Type: " . $row['type'] . "</h3>";
                echo "<p>Description: " . $row['description'] . "</p>";
                echo "<p>Price: Rs." . $row['price'] . " per 1Km </p>";
                echo "</div>"; // Close taxi-details
                echo "</div>"; // Close taxi
                
            }
        } else {
            echo "No taxis available.";
        }

        // Close database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
