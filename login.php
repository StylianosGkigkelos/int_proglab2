<?php
session_start();
include 'database.php';

$database = new Database();

include 'header.php';
?>

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-sm-12 col-md-6 offset-md-3">
                <?php
                if (isset($_GET['msg'])){ // an yparxei to $_GET['error']
                    $msg = $_GET['msg'];
                    echo '<div class="alert alert-'.$_SESSION['status'].'" role="alert">' ;
                    if($msg == 'invalid_data')
                    {
                        echo 'Login credentials were incorrect';
                    }
                    else if($msg == 'Reg_success'){
                        echo 'Registration successful!';
                    }
                    echo '</div>';
                }
                ?>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="actions.php">
                            <input type="hidden" id="reason" name="reason" value="login">
                            <h1 class="text-center">
                                Login
                            </h1>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="bmd-label-floating">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="bmd-label-floating">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                            <a class="form-text text-muted" href="register.php">Not registered? Register now!</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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