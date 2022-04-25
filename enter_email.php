<?php
session_start();
if (isset($_POST['email'])) {
    $otp = rand(1000, 9999);
    $to_email = $_POST['email'];
    $subject = "Your OTP to reset password.";
    $body = "Hello " . $_POST['username'] . ", your OTP to reset password is " . $otp;
    $headers = "From: OTP";

    if (mail($to_email, $subject, $body, $headers)) {
        echo "Email successfully sent to $to_email...";
        $_SESSION['email'] = $to_email;
        header('Location: forgot_password.php');
    } else {
        echo "Email sending failed...";
        die();
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
        <form method="POST" action="enter_email.php" id="main">
            <h1>Set new Password</h1>
            <h3>Enter your email</h3>
            <input required type="email" name="email">
            <input type="submit" class="button-5" value="Send OTP">
        </form>
    </div>
</body>

</html>