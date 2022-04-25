<?php
    session_start();
    if(!isset($_COOKIE['logged_in']) || !$_COOKIE['logged_in']==true){
        header("Location: login.php");
        die();
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "restaurant";
 
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    if(isset($_POST['name']) && isset($_POST['people']) && isset($_POST['date']) && isset($_POST['time']) && 
    isset($_POST['type_dine_in']) && isset($_POST['occasion']) && isset($_POST['submit'])){
        $id = $_COOKIE['id'];
        $name =  $_POST['name'];
        $people =  $_POST['people'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $type_dine_in = $_POST['type_dine_in'];
        $occasion = $_POST['occasion'];
        $instructions = $_POST['instructions'];

        $sql = "INSERT INTO `booking`(`id`, `name`, `people`, `date`, `time`, `type`, `occasion`, `instructions`) 
        VALUES ('".$id."','".$name."','".$people."','".$date."','".$time."','".$type_dine_in."','".$occasion."','".$instructions."')";

        if ($conn->query($sql)) {
            $sql = "SELECT username, email FROM user where id=". $id . "";
            
            if($result = $conn->query($sql)){
                $row = $result->fetch_assoc();

                $to_email = $row['email'];
    
                $subject = "Your booking confirmation.";
                $body = "Hello ". $row['username'].", this is your booking confirmation at Fine dine. The details are as follows: 
                 Booking id: " . $id . " 
                 Name: ".$name . "
                 No of people: ". $_POST['people']. "
                 Date: ". $date . "
                 Time: ". $time ."
                 Type of dine in: ". $type_dine_in . "    

                 Please show this when you reach the restaurant and don't share your booking id with anyone.  
                 Thank you.";
                 
                $headers = "From: Restaurant booking";
    
                if (mail($to_email, $subject, $body, $headers)) {
                    echo "Email successfully sent to $to_email...";
                    
                    setcookie("email", $to_email, time() + (86400 * 30));
                    echo '<script>alert("Your Table has been reserved and confirmation is sent to your mail id")</script>';
                    header('Location: booking_confirmation.php');
                } else {
                    echo "Email sending failed...";
                    die();
                }
            }
        }
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
            <h1>Reserve a Table</h1>
        </center>
        <form id="main" action="reserve_table.php" method="POST" onsubmit="return validateReservation()">
            <h5>Enter the Name with which you want to reserve table</h5>
            <input type="text" id="username" name="name"> <br><br>
            <h5>How many people you wish to book a table for?</h5>
            <select name="people" id="people">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
            </select><br><br>
            <h5>What date do you plan to come?</h5>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required><br><br>
            <h5>Please choose the time for your arrival.</h5>
            <label for="time">Time:</label>
            <input type="time" id="time" name="time"><br><br>
            <h5>What Type Dine in do you prefer?</h5>
            <select name="type_dine_in" id="type_dine_in">
                <option selected value="pool">Open Dine</option>
                <option value="ac">A/C Dine</option>
                <option value="pool">Pool side</option>
                <option value="candle_light">Candle light</option>
                <option value="private_hut">Private hut</option>
            </select><br><br>
            <h5>Is it a special occasion?</h5>
            <select name="occasion" id="occasion">
                <option default value="no">No</option>
                <option value="Birthday">Birthday</option>
                <option value="Anniversary">Anniversary</option>
                <option value="Other">Other Celebration</option>
            </select><br><br>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Any Special Instructions?</label>
                <textarea style="resize: none;" class="form-control" id="special_instructions" cols="50"
                    rows="7" name="instructions"></textarea>
            </div>
            <h5>I have read the <a href="#">terms and conditions.</a></h5>
            <center><input type="submit" name="submit" id="submit" class="button-5" role="button"
                    value="Confirm booking" /></center>
        </form>

    </div>
    <script src="js/reserve_table.js"></script>
</body>

</html>