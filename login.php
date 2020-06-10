<?php
session_start();
include 'database.php';

$database = new Database();

include 'header.php';
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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

