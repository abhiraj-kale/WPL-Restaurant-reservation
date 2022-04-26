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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/bookings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><label style="font-family: 'Dancing Script', cursive; color: #f93a13; font-size: 20px;">Fine
                    Dine</label></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Admin Panel</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="contain">
        <div class="column" id="middle-column">
            <div id="main">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="upcoming-tab" data-bs-toggle="tab" href="#upcoming" role="tab" aria-controls="upcoming" aria-selected="true">Upcoming Reservations</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="past-tab" data-bs-toggle="tab" href="#past" role="tab" aria-controls="past" aria-selected="false">Past Reservations</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="upcoming" role="tabpanel" aria-labelledby="upcoming-tab">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Sr no</th>
                                    <th scope="col">Booking ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">No of people</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Occasion</th>
                                    <th scope="col">Instructions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id = $_COOKIE['id'];
                                $sql = "SELECT * FROM booking where id=" . $id . " ORDER BY date ASC, time ASC";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    $counter = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        $now = time();
                                        $latest = $row['date'] . " " . $row['time'];
                                        $latest = strtotime($latest);
                                        if ($latest > $now) {
                                            echo "
                                                <tr>
                                                    <th scope='row'>" . $counter++ . "</th>
                                                    <td>" . $row['booking_id'] . "</td>
                                                    <td>" . $row['name'] . "</td>
                                                    <td>" . $row['people'] . "</td>
                                                    <td>" . $row['date'] . "</td>
                                                    <td>" . $row['time'] . "</td>
                                                    <td>" . $row['type'] . "</td>
                                                    <td>" . $row['occasion'] . "</td>
                                                    <td>" . $row['instructions'] . "</td>
                                                </tr>
                                                ";
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="past" role="tabpanel" aria-labelledby="past-tab">
                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Sr no</th>
                                    <th scope="col">Booking ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">No of people</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Occasion</th>
                                    <th scope="col">Instructions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $id = $_COOKIE['id'];
                                $sql = "SELECT * FROM booking where id=" . $id . " ORDER BY date ASC, time ASC";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    $counter = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        $now = time();
                                        $latest = $row['date'] . " " . $row['time'];
                                        $latest = strtotime($latest);
                                        if ($latest <= $now) {
                                            echo "
                                                <tr>
                                                    <th scope='row'>" . $counter++ . "</th>
                                                    <td>" . $row['booking_id'] . "</td>
                                                    <td>" . $row['name'] . "</td>
                                                    <td>" . $row['people'] . "</td>
                                                    <td>" . $row['date'] . "</td>
                                                    <td>" . $row['time'] . "</td>
                                                    <td>" . $row['type'] . "</td>
                                                    <td>" . $row['occasion'] . "</td>
                                                    <td>" . $row['instructions'] . "</td>
                                                </tr>
                                                ";
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/about_us.js"></script>
</body>

</html>