<?php
include 'connection.php';
session_start();
if(!isset($_SESSION['id'])) {
    header("Location: login.php");
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            width: 250px;
            height: 100vh;
            background: #343a40;
            color: white;
            position: fixed;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .topbar {
            background: #f8f9fa;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar border-end">
        <h4 class="text-center mb-5">Student Permission System</h4>
        <a href="#"> Dashboard </a>
        <a href="#"> permission</a>
        <a href="#"> My profile </a>
        <a href="#"> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="topbar d-flex justify-content-between bg-light border-bottom">
            <h2>Dashboard</h2>
            <div>
                <span class="me-3">👤 <?php echo $_SESSION['username']; ?></span>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="card p-3">
                        <h5>Students</h5>
                        <p>
                            <?php
                             $students= mysqli_query($con, "SELECT * FROM students ");
                                echo mysqli_num_rows($students);
                           ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <h5> New Permission </h5>
                        <p>
                            <?php
                             $students= mysqli_query($con, "SELECT * FROM permission  WHERE status='0'");  
                                echo mysqli_num_rows($students);
                           ?>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <h5>Approved</h5>
                        <P> <?php
                             $students= mysqli_query($con, "SELECT * FROM permission  WHERE status='1'");  
                                echo mysqli_num_rows($students);
                           ?>
                        </P>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3">
                        <h5>Rejected</h5>
                        <p>
                        <?php
                             $students= mysqli_query($con, "SELECT * FROM permission  WHERE status='3'");  
                                echo mysqli_num_rows($students);
                           ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

