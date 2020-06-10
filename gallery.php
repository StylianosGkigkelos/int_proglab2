<!DOCTYPE html>

<?php
session_start();
error_reporting(0);
include 'database.php';
$database = new Database();

include 'header.php'
?>

<head>
    <title>Gallery</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
<div id="main" class="main-container">
    <div id="cc" class="container">
        <?php

        echo '<div class="dropdown show " >';
        echo '<a class="btn btn-secondary dropdown-toggle justify-content-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" 
                style="margin-top: 2%; margin-bottom: 2%;">';
        echo 'Choose photo category';
        echo '</a>';
        echo '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
        echo '<a class="dropdown-item" href="?id=CAR">Car</a>';
        echo '<a class="dropdown-item" href="?id=CHAMPIONSHIP">Championship</a>';
        echo '<a class="dropdown-item" href="?id=HISTORIC">Historical</a>';
        echo '<a class="dropdown-item" href="?id=WIN">Win</a>';


        echo '</div>';
        echo '</div>';

        $photos = $database->getAllPhotos();
        if(isset($_GET['id'])){
            echo '<div id ="mycarousel" class="carousel slide" data-ride="carousel">';
            echo '<div class="carousel-inner text-center">';
            $first = 0;
            foreach ($photos as $photo) {
                if ($photo['category'] == $_GET['id']) {
                    echo 'hi';
                    if ($first == 0) {
                        echo '<div class="carousel-item active" data-interval="10000">';
                        echo '   <img src="' . $photo['photo_source'] . '" class="img-fluid rounded w-80 h-80 responsive" alt="..." >';
                        echo '</div>';
                        $first = 1;
                    } else {
                        echo '<div class="carousel-item" data-interval="10000">';
                        echo '   <img src="' . $photo['photo_source'] . '" class="img-fluid rounded w-80 h-80 responsive" alt="..." >';
                        echo '</div>';
                    }
                }
            }
            echo '   </div>';
            echo '   <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">';
            echo '       <span class="carousel-control-prev-icon" aria-hidden="true"></span>';
            echo '       <span class="sr-only">Previous</span>';
            echo '   </a>';
            echo '   <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">';
            echo '       <span class="carousel-control-next-icon" aria-hidden="true"></span>';
            echo '       <span class="sr-only">Next</span>';
            echo '   </a>';
            echo '</div>';
            echo '</div>';
        }


        ?>
    </div>

</div>


<?php
include 'footer.php';
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


</body>

