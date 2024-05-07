<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logo.ico" type="image/x-icon">

    <title>About Us</title>
    <style>
               nav {
            background-color: #444;
            color: #fff;
            padding: 10px;
            text-align: center;
            margin:-10px;
            margin-bottom:50px;
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

        main {
            padding: 20px;
        }

        section {
            margin-bottom: 20px;
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

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            background-image: url('assets/background.jpeg');

        }
        .container {
            margin-top:100px;
            max-width: 800px;
            margin: 0 auto;
            background-color: #cf8908;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, p {
            text-align: left;
        }
        h1 {
            text-align: center;
        }
        img {
            display: block;
            margin: 0 auto;
            max-width: 100%;
            height: auto;
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
        <h1>Welcome to Sana Travels</h1>
        <img src="assets/logo.jpeg" alt="Company Logo" style="width:300px; heigth:300px; border-radius:100%;">
        <p><strong>Customer-Centric Approach</strong></p>
<p>At our taxi service, customer satisfaction is our top priority. Our experienced drivers are committed to providing safe, reliable, and comfortable transportation, ensuring that you reach your destination on time and in style.</p>

<p><strong>Convenient Booking</strong></p>
<p>Booking a ride with us is quick and hassle-free. Whether you prefer to book online, through our mobile app, or by phone, we offer multiple booking options to accommodate your preferences.</p>

<p><strong>Community Engagement</strong></p>
<p>We're proud to be an active member of the communities we serve. Through our involvement in local initiatives and events, we strive to give back and make a positive impact in the areas we operate.</p>

<p><strong>Safety and Security</strong></p>
<p>Your safety is paramount to us. Our vehicles undergo regular maintenance checks, and our drivers are trained to prioritize passenger safety at all times. We adhere to strict safety protocols to ensure a secure and comfortable journey for every passenger.</p>

<p><strong>Experience the Difference</strong></p>
<p>Whether you're commuting to work, running errands, or exploring the city, choose our taxi service for a seamless and enjoyable transportation experience. We look forward to being your trusted partner on the road.</p>

    </div>
</body>
</html>
