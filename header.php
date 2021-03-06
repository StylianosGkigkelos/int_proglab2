    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<nav class="navbar navbar-expand-lg navbar-dark ">
    <a class="navbar-brand" href="index.php">
    <i class="fa fa-globe"></i>icsd17029
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navContent"
        aria-controls="navContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link"  href="news.php">News </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="driversPage.php">Drivers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="standings.php">Standings </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="gallery.php">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about_us.php">About us </a>
            </li>
            <li>
                <a class="nav-link" href="management.php">Management </a>
            </li>
            <li>
                <a class="nav-link" href="halloffame.php">Management </a>
            </li>
            <li class="nav-item">
                <a class="nav-link"  href="contact_us.php" >Contact us</a>
            </li>
        </ul>

        <?php

            if(isset($_SESSION['first_name'])) {
                echo '<ul class="navbar-nav justify-content-end mr-5">';
                    echo '<li class="nav-item dropdown">';
                        echo '<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                            echo 'Hi ' . $_SESSION['first_name'];
                        echo '</a>';
                        echo '<div class="dropdown-menu">';
                                if (isset($_SESSION['userstatus'])){
                                    if($_SESSION['userstatus']=='ADMIN'){
                                        echo '<a id="addArticle" class="dropdown-item" href="addArticle.php">Add Article</a>';
                                        echo '<a id="addPhoto" class="dropdown-item" href="addPhoto.php">Add Photo</a>';

                                    }
                                }
                                echo '<a id="logout" class="dropdown-item" href="logout.php">Logout</a>';
                         echo '</div>';
                    echo '</li>';
                echo '</ul>';

            }
            else {
                echo '<ul class="navbar-nav justify-content-end mr-5">';
                echo    '<a id="login" class="nav-link" href="login.php">Login</a>';
                echo '</ul>';
            }

        ?>


    </div>
</nav>