<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
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
        <a class="active" href="#home">Home</a>
        <a href="about_us.php">About us</a>
        <a href="login.php">Login</a>
        <a href="signup.php">Signup</a>
        <a href="reserve_table.php">Reserve Table</a>
    </div> -->
    <div class="contain">
        <div id="main">
            <div>
                <h1 style="font-size: 100px">Fine Dine</h1>
                <h1 style="font-size: 100px;">Restaurant</h1>
                <span id="tagline">The only thing we’re serious about is food.</span>
            </div>

            <button class="button-77" onclick="location.href='login.php'" role="button">Reserve Table</button>

        </div>
    </div>

</body>

</html>