<?php
session_start();

if(!isset($_POST['otp'])){
    header('Location: get_top.php');
    exit();
}
if(!isset($_SESSION['otp'])){
    header('Location: signup.php');
    exit();
}

if($_POST['otp'] == $_SESSION['otp']){
    setcookie("logged_in", true, time() + (86400 * 30));

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "restaurant";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    

    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $pass = $_SESSION['password'];

    $sql = "INSERT INTO user (username, email, password)
    VALUES ('" . $username . "', '" . $email . "', '" . md5($pass) . "');";

    if ($conn->query($sql)) {
    echo "New record created successfully";

    $sql = "SELECT id FROM user where username = '" . $username . "';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            setcookie("id", $row["id"], time() + (86400 * 30));
        }        

        setcookie("username", $username, time() + (86400 * 30));
        setcookie("password", $pass, time() + (86400 * 30));

        header('Location: reserve_table.php');
      } else {
        echo "0 results";
      }
    }

}

?>