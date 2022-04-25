<?php
session_start();
if (isset($_POST['otp']) && isset($_POST['old_pass']) && isset($_POST['new_pass'])) {
    $otp = $_POST['otp'];
    if($otp != $_POST['otp']){
        echo "Incorrect OTP, <a href='forgot_password.php'>Try again.</a>";
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

    $email = $_SESSION['email'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];

    $sql = "SELECT id FROM user where email='" . $email . "'" . " AND password='" . md5($old_pass) . "'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "Invalid email/password <br> <a href='forgot_password.php'>Try again</a>";
        die();
    } else {
        $row = $result->fetch_assoc();

        $sql = "UPDATE `user` SET `password`='" . md5($new_pass) . "' WHERE `id`='" . $row['id'] . "'";

        if ($conn->query($sql) === TRUE) {
            setcookie("logged_in", true, time() + (86400 * 30));
            setcookie("id", $row['id'], time() + (86400 * 30));
            header('Location: reserve_table.php');
        } else {
            echo "Error: Couldn't update password. <br> <a href='forgot_password.php'>Try again</a>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/forgot_password.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
</head>

<body>
    <div class="topnav">
        <label style="font-family: 'Dancing Script', cursive; font-size: 20px;">Fine Dine</label>
        <a href="index.php">Home</a>
        <a href="about_us.php">About us</a>
        <a href="login.php">Login</a>
        <a href="signup.php">Signup</a>
    </div>
    <div class="container">
        <form method="POST" action="forgot_password.php" id="main">
            <h1>Set new Password</h1>
            <h3>Enter your OTP</h3>
            <input required type="number" name="otp">
            <h3>Enter your old password</h3>
            <input required type="password" name="old_pass">
            <h3>Enter your new password</h3>
            <input required type="password" name="new_pass">
            <input type="submit" class="button-5" value="Change Password">
        </form>
    </div>
</body>

</html>