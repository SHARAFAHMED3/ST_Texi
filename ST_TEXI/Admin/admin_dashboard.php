<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php"); // Redirect to login page if not logged in
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
            background-image: url('../assets/background.jpeg');

        }
        .head{
            background-color: #1e7496;
    color: #fff;
    padding: 20px;
    text-align: center;
    position: relative;
        }
        .card{
            background-color: #cf8908;
            margin: 10px;
            border-radius:20px;
  
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center head">Welcome, <?php echo $_SESSION['admin_username']; ?></h2>
            </div>
            <div class="col-md-12 text-right">
                <a href="admin_logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Taxis</h5>
                        <p class="card-text">Manage the taxi listings and details.</p>
                        <a href="manage_taxis.php" class="btn btn-primary">Go to Manage Taxis</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Users</h5>
                        <p class="card-text">Manage user accounts and permissions.</p>
                        <a href="manage_users.php" class="btn btn-primary">Go to Manage Users</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Driver</h5>
                        <p class="card-text">Manage user accounts and permissions.</p>
                        <a href="Drivers.php" class="btn btn-primary">Go to Drivers</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add more cards for additional features -->
        <div class="row mt-4">
            
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
