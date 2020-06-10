<!DOCTYPE html>

<?php
session_start();
//if (!isset($_SESSION['userid']) || $_SESSION['userid']=="") {
//    header("Location: login.php");
//}

include 'database.php';
$database = new Database();

include 'header.php'
?>


<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"-->
<!--      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->


<head>
    <title>Title</title>
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
            <h2>The Story of the Prancing Horse<br>
                <small class="text-muted">A short view back to the past</small>
            </h2>
        </div>
    </div>

<!--    FIXME:new photos-->
    <div id="cc" class="container">
        <div id ="mycarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                <li data-target="#mycarousel" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner text-center">
                <div class="carousel-item active" data-interval="10000">
                    <img src="resources/1.png" class="img-fluid rounded w-50 h-50 responsive" alt="..." >
                    <div class="carousel-caption d-none d-md-block">
                        <h5>New Order</h5>
                        <p>Age of Consent</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="resources/2.png" class="img-fluid rounded w-50 h-50 responsive" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Joy Division</h5>
                        <p>Atmosphere</p>
                    </div>
                </div>
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
<!--<footer class="page-footer font small">-->
<!--    <div class="py-4 bg-light mt-auto">-->
<!--        <div class="container-fluid">-->
<!--            <div class="d-flex align-items-center justify-content-between small">-->
<!--                <div class="text-muted">Copyright &copy; Your Website 2019</div>-->
<!--                <div>-->
<!--                    <a href="#">Privacy Policy</a>-->
<!--                    &middot;-->
<!--                    <a href="#">Terms &amp; Conditions</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</footer>-->

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

