<?php
session_start();
include 'header.php';
include 'database.php';
error_reporting(0);
$database = new Database();
$drivers = $database->getCurrentDrivers();

?>

    <head>
        <title>Our Drivers</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>


    <div id="main" class="main-container" style="padding-top: 50px">
        <div class="row">
            <?php
            foreach ($drivers as $driver){
                echo '<div class="card cardDrivers">';
                echo '   <img src="'.$driver['photo_source'].'" alt="Avatar"';
                echo '        style="width:100%;opacity:0.85;border-radius:5px 5px 0 0; padding: 5px">';
                echo '   <div class="container">';
                echo '       <h5><b>'.$driver['name'].'</b></h5>';
                echo '       <p>Age:'.$driver['age'].'</p>';
                echo '       <p>Car number:'.$driver['car_number'].'</p>';
                echo '       <p>Wins:'.$driver['wins'].'</p>';
                echo '   </div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

<?php include 'footer.php'; ?>