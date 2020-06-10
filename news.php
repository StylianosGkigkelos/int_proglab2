<?php
session_start();

include 'database.php';
$database = new Database();

include 'header.php';

?>

<head>
    <title>News</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>


<body>
<div class="main-container">
    <div class="row">
        <?php
        $test = $database->getAllArticles();

        if ($test != null) {
            foreach ($test as $item) {
                echo '<div class="card cardNews" style="width: 20rem;">';
                echo '<img id="cimg" src="' . $item['photo_source'] . '" class="card-img-top w-40 h-20" alt="...">';
                echo '<div class="dropdown-divider"></div>';
                echo '<div id="cbd" class="card-body d-flex flex-column" style="margin-top: 10%;">';
                echo '<h5 class="card-title">';
                echo $item['title'];
                echo '</h5>';
                echo '<p class="card-text">';
                echo 'Posted on: ' . $item['date'];
                echo '</p>';
                echo '<a href="article.php?articleid=' . $item['id'] . '"';
                echo 'target="_blank" class="btn btn-secondary mt-auto">Read article</a>';
                echo '</div>';
                echo '</div>';

            }

        } else {
            echo '<h1> No articles found </h1>';
        }
        ?>
    </div>
</div>

</body>

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
