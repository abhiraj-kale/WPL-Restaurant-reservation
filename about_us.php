<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="css/about_us.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <a class="active" href="about_us.php">About us</a>
        <a href="login.php">Login</a>
        <a href="signup.php">Signup</a>
        <a href="reserve_table.php">Reserve Table</a>
    </div> -->
    <div class="contain">
        <div class="column" id="middle-column">
            <div id="main">
                <center>
                    <h1>About Us</h1>
                    <center><input type="submit" onclick="location.href='reserve_table.php'" name="submit" id="submit" class="button-5" role="button" value="Reserve my table"/></center>
                </center>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div id="card-photo"> 
                                <img src="https://c0.wallpaperflare.com/preview/82/14/390/woman-sitting-down.jpg" alt=" " style="height:200px;width: 150px;">
                             </div>
                             <div id="card-details">
                                 <h2>Table for 1</h2>
                                 <p>Make your private peaceful trip a success with options for open and closed dine-in.</p>
                                 <p><button class="btn">1 person</button></p>
                             </div>
                         </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div id="card-photo"> 
                                <img src="https://x.cdrst.com/foto/hotel-sf/13fae/granderesp/lebua-at-state-tower-the-world-s-first-vertical-destination-general-b7dad71.jpg" alt=" " style="height:200px;">
                             </div>
                             <div id="card-details">
                                 <h2>Pool side table</h2>
                                 <p>Have a soothing experience in our pool side dining.</p>
                                 <p><button class="btn">1-8 people</button></p>
                             </div>
                         </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                        <div class="card">
                            <div id="card-photo"> 
                                <img src="https://thumbs.dreamstime.com/b/romantic-candlelit-dinner-lake-13806896.jpg" alt=" " style="height:200px;">
                             </div>
                             <div id="card-details">
                                 <h2>Candle-light dinner</h2>
                                 <p>Perfect romantic atmosphere for you and your loved one.</p>
                                 <p><button class="btn">2 people</button></p>
                             </div>
                         </div>
                    </div>
                    <div class="col">
                    <div class="card">
                        <div id="card-photo"> 
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVjgfsLZ65SzgudHaSL5-Xa5_alWRKQ8VIXYqxUcaZfnvQL1A4RgrSC0x_JzWb0asDxcY&usqp=CAU" alt=" " style="height:200px;">
                         </div>
                         <div id="card-details">
                             <h2>Private huts for families</h2>
                             <p>A family Celebration/Reunion? Try our mega hut for families.</p>
                             <p><button class="btn">More than 8 people</button></p>
                         </div>
                     </div></div>
                  </div>
                  <iframe id="map" style="margin-top: 1%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15081.090358144946!2d72.84519766977536!3d19.095693900000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c85af128c1fb%3A0x2cc538d0c7109b4d!2sMabruk%20-%20Mediterranean%20Restaurant!5e0!3m2!1sen!2sin!4v1644057052272!5m2!1sen!2sin" width="1300" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>


            </div>
        </div>
    </div>
    <script src="js/about_us.js"></script>
</body>

</html>