<?php
    include 'connection.php';
    session_start();

    if(isset($_POST['submit'])) {
        $username = $_POST['uname'];
        $password = $_POST['pwd'];

        $query = mysqli_query($con, "SELECT * FROM `users` WHERE username='$username' AND password='$password'");
        
        if(mysqli_num_rows($query) == 0) {
            echo "<script>alert('Invalid Username or password')</script>";
        }
        else {
            $row = mysqli_fetch_array($query);
            
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['type'];

            header("Location: home.php");
        }
    }
?>

<html>
    <head>
        <title> Login foam </title>
        <link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
    </head>
    <body> 

        <div class="container">

        <div class="row mt-5">
            <div class="col-3"></div>
                <div class="col-6">
                    <div class="card shadow mt-5">
                        <div class="card-body">
                                <h3 class="mb-4">login </h3>
                            <form action="" method="post">  
                                <input type="text" placeholder="Username" class="form-control" name="uname">
                                <input type="password" placeholder="Password" class="form-control mt-2" name="pwd">

                                <input type="submit" name="submit"  class="btn btn-success mt-3 w-100" value="Login">

                            </form>
                        </div>
                    </div>
                </div>
               
            <div class="col-3"></div>
            </div>
        </div>

    </body>
</html>
