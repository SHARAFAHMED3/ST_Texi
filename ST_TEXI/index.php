<?php
             session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="assets/logo.ico" type="image/x-icon">

    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Include Slick Slider CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            position: relative; 
            background-image: url('assets/background.jpeg');
        }

        header {
    background-color: #cf8908;
    color: #fff;
    padding: 20px;
    text-align: center;
    position: relative;
}

.logo {
    position: absolute;
    top: 20px;
    right: 20px;
}

.logo img {
    width: 100px; 
    height: auto;
    border-radius:100%;
}

        nav {
            background-color: #000;
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

        main {
            padding: 20px;
        }

        section {
            margin-bottom: 20px;
        }

        .footer {
    background-color: #cf8908;
    color: #fff;
    padding: 20px;
    text-align: center;
    width: 100%;
    position: fixed;
    bottom: 0;

}

.footer-content {
    max-width: 960px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
}

.footer-content p {
    margin: 10px 0;
}

.social-icons {
    list-style-type: none;
    padding: 0;
}

.social-icons li {
    display: inline;
    margin-right: 10px;
}

.social-icons li a {
    color: #fff;
    font-size: 20px;
}

.social-icons li a:hover {
    color: #ffd700; /* Change to your preferred hover color */
}


        nav ul li a:hover {
            background-color: #555;
        }

        /* Style for Admin and Driver buttons */
        .admin-button, .driver-button {
            position: fixed;
            bottom: 20px;
            background-color: #000;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .admin-button {
            left: 20px;
        }

        .driver-button {
            right: 20px;
        }
        .slider {
            width: 80%;
            margin-left: 400px ;  
            margin-bottom:50px;      
        
        }

        .slider img {
            width: 100%;
        }
        .services {
    text-align: center;
    margin-top: 50px; /* Adjust margin as needed */
}

.service-cards {
    display: flex;
    justify-content: center;
    gap: 20px; /* Adjust gap between cards */
}

.service-card {
    margin:50px;
    background-color: #cf8908;
    padding: 20px;
    color:white;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 600px; /* Adjust card width as needed */
}

.service-card h3 {
    margin-top: 0;
}

.service-card p {
    margin-bottom: 0;
}

.cardContainer{
    height: 600px;
    width:100%;
    display:flex;
    gap: 20px;
    justify-content: center;
}
.card{
    height: 300px;
    width: 300px;
    background-color:black;
    border: 2px solid #cf8908;
        border-radius:10px;
}
.card img{
    height: 250px;
    width: 300px;
    border-radius:10px;

}
.card p{
    color:white;
 margin-left:50px;

}
    </style>
</head>
<body>
    <header>
    <div class="logo">
        <img src="assets/logo.jpeg" alt="Sana Travels Logo">
    </div>
        <h1>Welcome to Sana Travels</h1>
    </header>

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

    <main>
    <div class="service-cards">
        <div class="service-card">
            <h3>Our service</h3>
           <marquee> <p>Explore our range of taxi services for all your transportation needs.</p></marquee>
        </div>
    </div>
   
    <div class="cardContainer">
        <div class="card">
            <img src="assets/img1.png" alt="" srcset=""> 
            <p>Price per Km:300LKR</p>
        </div>

        <div class="card">
            <img src="assets/img2.png" alt="" srcset=""> 
            <p>Price per Km:1000LKR</p>

        </div>
        <div class="card">
            <img src="assets/img3.png" alt="" srcset=""> 
            <p>Price per Km:2000LKR</p>

        </div>
        <div class="card">
            <img src="assets/img4.png" alt="" srcset=""> 
            <p>Price per Km:600LKR</p>

        </div>
    </div>

    </main>

    <footer class="footer">
    <div class="footer-content">
        <div class="contact-info">
            <p>Sana Travel: <a href="mailto:sanatravel@gmail.com">sanatravel@gmail.com</a>, Trincomalee</p>
            <p>Phone: +94779606284</p>
            <p>Address: 123 Main Street, Kanthale, Sri Lanka</p>
        </div>
        <div class="social-media">
            <p>Follow us:</p>
            <ul class="social-icons">
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-instagram fw-normal"></i></a>
            </ul>
        </div>
    </div>
</footer>


    <!-- Admin Button -->
    <button class="admin-button" onclick="location.href='Admin/admin_login.php'">Admin</button>
    <!-- Driver Button -->
    <button class="driver-button" onclick="location.href='Driver/driverLogin.php'">Driver</button>

     <!-- Include jQuery -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Slick Slider JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        // Initialize Slick Slider
        $(document).ready(function(){
            $('.slider').slick({
                autoplay: true,
                autoplaySpeed: 2000, // Change slide every 2 seconds
                arrows: false, // Hide navigation arrows
                dots: true // Show navigation dots
            });
        });
    </script>
</body>
</html>
