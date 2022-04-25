<?php
session_start();
?>
<html>

<head>
   <title>Welcome</title>
</head>

<body>

</body>

</html>
<?php
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

if (isset($_GET['username']) && isset($_GET['password'])) {
   $username = $_GET['username'];
   $password = $_GET['password'];

   $sql = "SELECT id FROM user where username='" . $username . "'" . " AND password='" . md5($password) . "'";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {

      $row = $result->fetch_assoc();
      setcookie("logged_in", true, time() + (86400 * 30));
      setcookie("id", $row['id'], time() + (86400 * 30));

      if (isset($_GET['remember_me'])) {
         setcookie("remember_username", $username, time() + (86400 * 30));
         setcookie("remember_password", $password, time() + (86400 * 30));
      }

      setcookie("username", $username, time() + (86400 * 30));
      setcookie("password", $password, time() + (86400 * 30));

      header('Location: reserve_table.php');
   } else {
      echo "Incorrect Credentials, 
   <br> <a href='login.php'>Try again</a>
   ";
   }
}

if (isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"])) {
   $otp = rand(1000, 9999);
   $to_email = $_POST['email'];
   $subject = "Your OTP to create account.";
   $body = "Hello " . $_POST['username'] . ", your OTP to create account is " . $otp;
   $headers = "From: OTP";

   if (mail($to_email, $subject, $body, $headers)) {
      echo "Email successfully sent to $to_email...";
   } else {
      echo "Email sending failed...";
      die();
   }
   $_SESSION['otp'] = $otp;
   $_SESSION['email'] = $_POST['email'];
   $_SESSION['username'] = $_POST['username'];
   $_SESSION['password'] = $_POST['password'];
   header('Location: get_otp.php');
}
?>