<?php
    include 'header.php';
    session_start();

    include 'database.php';
    $database = new Database();
    $article = $database->getArticleByID($_GET['articleid']);
    if (isset($article)) {
        echo '<h2 class="text-center">' . $article['title'] . "<br></h2>";
        echo $article['message'] . "<br>";
        echo "Posted on: " . $article['date'];
    }
    else
        echo '<h2 class="text-center">' . "Article does not exist." . "<br></h2>";
    ?>


<?php    include 'footer.php';?>