<!DOCTYPE html>

<?php
session_start();
//if (!isset($_SESSION['userid']) || $_SESSION['userid']=="") {
//    header("Location: login.php");
//}

//TODO ATHLETE, ADMIN PAGE

include 'database.php';
$database = new Database();

include 'header.php'
?>


<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"-->
<!--      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->


<head>
    <title>Icsd17029</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>

<body>
<div id="main" class="main-container">
    <div class="jumbotron jumbo-fluid">
        <div class="container">
            <h2>Ferrari<br>
                <small class="text-muted">The unofficial site</small>
            </h2>
        </div>
    </div>

    <div id="cc" class="container">
        <div id ="mycarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner text-center">
                <?php
                $photos = $database->getAllPhotos();
                $first = 0;
                foreach ($photos as $photo){
                    if ($first==0){
                        echo '<div class="carousel-item active" data-interval="10000">';
                        echo '   <img src="'.$photo['photo_source'].'" class="img-fluid rounded w-80 h-80 responsive" alt="..." >';
                        echo '</div>';
                        $first = 1;
                    }
                    else {
                        echo '<div class="carousel-item" data-interval="10000">';
                        echo '   <img src="'.$photo['photo_source'].'" class="img-fluid rounded w-80 h-80 responsive" alt="..." >';
                        echo '</div>';
                    }
                }

            ?>
            </div>
            <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
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

