<?php
setcookie("id", false, time() - 3600);
setcookie("logged_in", false, time() - 3600);
setcookie("username", false, time() - 3600);
setcookie("password", false, time() - 3600);
header('Location: login.php')
?>