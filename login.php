<?php
    session_start();
    if(isset($_COOKIE['logged_in']) && $_COOKIE['logged_in']==true){
        header("Location: reserve_table.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login_signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><label
                    style="font-family: 'Dancing Script', cursive; color: #f93a13; font-size: 20px;">Fine
                    Dine</label></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about_us.php">About us</a>
                    </li>
                    <?php
                        if(!isset($_COOKIE['logged_in']) || (isset($_COOKIE['logged_in']) && !$_COOKIE['logged_in'])){
                            echo "
                            <li class='nav-item'>
                            <a class='nav-link' href='login.php'>Login</a>
                            </li>
                            <li class='nav-item'>
                                <a class='nav-link' href='signup.php'>Signup</a>
                            </li>                        
                            ";
                        }
                        
                        if(isset($_COOKIE['logged_in']) && $_COOKIE['logged_in']){
                            echo "
                            <li class='nav-item'>
                            <a class='nav-link' href='reserve_table.php'>Reserve Table</a>
                            </li>  
                            <li class='nav-item'>
                            <a class='nav-link' href='log_out.php'>Log out</a>
                            </li>                    
                            <li class='nav-item'>
                                <a class='nav-link' href='profile.php'>Profile</a>
                            </li>                       
                            ";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- <div class="topnav">
        <label style="font-family: 'Dancing Script', cursive; font-size: 20px;">Fine Dine</label>
        <a href="index.php">Home</a>
        <a href="about_us.php">About us</a>
        <a class="active" href="login.php">Login</a>
        <a href="signup.php">Signup</a>
        <a href="reserve_table.php">Reserve Table</a>
    </div> -->
    <div class="container">
        <form id="main" method="GET" action="validate.php" onsubmit="return login(this)">
            <center>
                <h2>Login to your account</h2>
            </center>
            <br>
            <label for="username">Username</label><br>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input name="username" type="text" id="username" class="form-control" placeholder="Username" aria-label="Username"
                    aria-describedby="basic-addon1"
                    <?php if(isset($_COOKIE['remember_username'])){
                    echo "value='".$_COOKIE['remember_username']."'";
                    } ?>
                    >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input name="password" type="password" id="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                <?php if(isset($_COOKIE['remember_password'])){
                    echo "value='".$_COOKIE['remember_password']."'";
                } ?>
                >
            </div>
            <center>
                <a href="enter_email.php" class="link-danger text-align-center">Forgot Password?</a>
                <br><br>
                <input type="checkbox" name="remember_me"><label for="">Remember be</label><br>
                <input name="submit" type="submit" class="btn btn-warning" value="Login">
                <br>
                <span>Don't have an account already?</span><br>
                <a href="signup.php" class="link-success">Register</a>
            </center>
            <!-- <center><h2>Login to your account</h2></center>

            <div class="input-parent">
                <label for="username">Username / Email</label><br>
                <input type="text" required id="username">
            </div>
            <br>
            <div class="input-parent">
                <label for="password">Password</label><br>
                <input type="password" required id="password">
            </div>
            <br>
            <center><a href="get_otp.php">Forgot Password?</a></center>
            <br>
            <input onclick="location.href='reserve_table.php'" type="submit" class="login-btn" value="Login" />
            <br>
            <center><span>Don't have an account already?</span></center><br>
            <center><a href="signup.php">Register</a></center> -->
        </form>
    </div>
    <script src="js/userlogin.js"></script>
</body>

</html>