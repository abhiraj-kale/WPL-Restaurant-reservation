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
  <title>Reserve your table</title>
  <link rel="stylesheet" href="css/login_signup.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
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
    <a href="login.php">Login</a>
    <a class="active" href="signup.php">Signup</a>
    <a href="reserve_table.php">Reserve Table</a>
  </div> -->
  <div class="container">
    <form id="main" onsubmit="return signup(this)" action="validate.php" method="POST">
      <center>
        <h2>Register</h2>
      </center>
      <label for="email">Email</label>
      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="email" name="email" id="email" class="form-control" placeholder="Email" aria-label="Email"
          aria-describedby="basic-addon1" required>
      </div>
      <br>
      <label for="username">Set a new Username</label>
      <div class="input-group mb-3">
        <input type="text" name="username" id="username" class="form-control" placeholder="Username" aria-label="Username"
          aria-describedby="basic-addon1" required minlength="4">
      </div>
      <center><label style="color: red; visibility: hidden;" id="label_username">Username length must be minimum 4 chars</label></center>
      <label for="password">New Password</label>
      <div class="form-group">
        <input type="password" name="password" id="password" class="form-control" minlength="6" placeholder="Set Password">
      </div>
      <br>
      <input type="submit" name="submit" class="btn btn-warning" value="Register" required />
      <br>
      <center><span>Have an account already?</span></center><br>
      <center><a href="login.php" class="link link-success">Login</a></center>
      <!-- <center>
        <h2>Register</h2>
      </center>

      <div class="input-parent">
        <label for="email">Email</label><br>
        <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">
      </div>
      <br>
      <div class="input-parent">
        <label for="username">Username</label><br>
        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
      </div>
      <br>
      <div class="input-parent">
        <label for="password">Password</label><br>
        <input type="password" minlength="3" required id="password">
      </div>
      <br>
      <input onclick="window.location.href='reserve_table.php'" type="submit" class="login-btn" value="Register" />
      <br>
      <center><span>Have an account already?</span></center><br>
      <center><a href="login.php">Login</a></center> -->
    </form>
  </div>
  <script src="js/signup.js"></script>
</body>

</html>