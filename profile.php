<?php
    session_start();
    if(!isset($_COOKIE['logged_in']) || !isset($_COOKIE['username'])
    || !isset($_COOKIE['password']) || !$_COOKIE['logged_in']==true){
        header("Location: login.php");
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
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
        body {
            background-image: url("https://thumbs.dreamstime.com/z/restaurant-menu-set-food-dishes-black-stone-background-top-view-183992631.jpg");
            background-color: #cccccc;
            margin: 0px;
            font-family: 'Helvetica Neue', sans-serif;
        }

        .topnav {
            overflow: hidden;
            background-color: #333;
            width: 100%;
            height: 8vh;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav label {
            float: left;
            color: #f93a13;
            font-weight: bold;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            color: #04AA6D;
        }

        .topnav a.active {
            color: #04AA6D;
        }

        .container {
            min-height: 100vh;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
            background-color: #fffffff3;
            flex: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        #main {
            width: 75%;
            padding: 25px 28px;
            border-radius: 4px;
            border: 1px solid #302d2d;
            animation: popup 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .button-5 {
            align-items: center;
            background-clip: padding-box;
            background-color: #fa6400;
            border: 1px solid transparent;
            border-radius: .25rem;
            box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            display: inline-flex;
            font-family: system-ui, -apple-system, system-ui, "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 16px;
            font-weight: 600;
            justify-content: center;
            line-height: 1.25;
            margin: 0;
            min-height: 3rem;
            padding: calc(.875rem - 1px) calc(1.5rem - 1px);
            position: relative;
            text-decoration: none;
            transition: all 250ms;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: baseline;
            width: auto;
        }

        .button-5:hover,
        .button-5:focus {
            background-color: #fb8332;
            box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
        }

        .button-5:hover {
            transform: translateY(-1px);
        }

        .button-5:active {
            background-color: #c85000;
            box-shadow: rgba(0, 0, 0, .06) 0 2px 4px;
            transform: translateY(0);
        }
    </style>
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
        <a href="signup.php">Signup</a>
        <a class="active" href="reserve_table.php">Reserve Table</a>
    </div> -->
    <div class="container">
        <center>
            <h1>Profile</h1>            
        </center>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <?php
            $result = 'images/'.$_COOKIE['username'].'.jpg';
            ?>
            <center>
                <img src="<?php echo $result; ?>" height="100px" width="100px">
            <br><br>
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            </center>
            <h3>Username</h3>
            <input type="text" name="username" disabled 
            value="
            <?php
                echo $_COOKIE['username'];
            ?>
            ">
            <h3>Password</h3>
            <input type="text" name="password"
            value="
            <?php
                echo $_COOKIE['password'];
            ?>
            ">
            <br><br>
            <center>
            <input type="submit" value="Upload Image" name="submit">
            </center>
        </form>
        
    </div>
    <script src="js/reserve_table.js"></script>
</body>

</html>