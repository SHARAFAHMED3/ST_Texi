<?php 
             session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logo.ico" type="image/x-icon">

    <title>Contact Admin</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-image: url('assets/background.jpeg');
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
        form textarea {
            width: 100%;
            height: 150px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: none;
        }
        form button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #0056b3;
        }
        .logout-btn {
            display: block;
            width: 100px;
            margin: 20px auto;
            text-align: center;
            background-color: #dc3545;
            color: #fff;
            padding: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }
        .logout-btn:hover {
            background-color: #c82333;
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
<script>
        // Check if a message is received in the query string
        var message = "<?php echo isset($_GET['message']) ? $_GET['message'] : ''; ?>";
        
        // Display an alert if a message is received
        if (message) {
            alert(message);
        }
    </script>
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
        <h2>Contact Admin</h2>
        <form action="send_message.php" method="POST">
            <textarea name="message" placeholder="Enter your message here" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>
</body>
</html>
