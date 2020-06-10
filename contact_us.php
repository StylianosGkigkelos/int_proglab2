<?php
session_start();
if (!isset($_SESSION['userid']) || $_SESSION['userid']=="") {
    header("Location: login.php");
}
include 'database.php';

$database = new Database();

?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<body>
<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-sm-12 col-md-6 offset-md-3">
                <?php
                // if $_GET['error'] exists
                if (isset($_GET['msg'])) {
                    $msg = $_GET['msg'];
                    echo '<div class="alert alert-'.$_SESSION['status'].'" role="alert">';
                    if($msg == 'Reg_fail'){
                        echo 'Registration failed';
                    }

                    echo '</div>';
                }
                ?>

                <div class="card">
                    <div class="card-body">


                        <form method="post" action="actions.php" >
                            <input type="hidden" id="reason" name="reason" value="contact">
                            <h1 class="text-center">
                                Contact Us!
                            </h1>

                            <div class="form-group">
                                <label for="exampleInputTitle">Title</label>
                                <input type="text" class="form-control" id="exampleInputTitle"  placeholder="Title" name="title" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleMessage">Message</label>
                                <input type="text" class="form-control" id="exampleInputMessage" placeholder = "Message" name="message" required>
                            </div>


                            <button type="submit" class="btn btn-primary btn-block">Send</button>
                        </form>


                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

