<?php
session_start();
include 'Database.php';
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
                  <input type="hidden" id="reason" name="reason" value="register">
                    <h1 class="text-center">
                      Register
                    </h1>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" minlength="8" id="exampleInputEmail1"  placeholder="example@domain.com" name="email" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInput1">First Name</label>
                    <input type="text" class="form-control" id="exampleInput1" placeholder = "Firstname" name="first_name" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInput2">Last Name</label>
                    <input type="text" class="form-control" id="exampleInput2" placeholder="Lastname" name="last_name" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1"> Password</label>
                    <input type="password" minlength="8" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" data-toggle = "password" required>
                  </div>

                  <button type="submit" class="btn btn-primary btn-block">Register</button>
                  <a  class="form-text text-muted" href = "login.php">Already registered? Login!</a>

              </form>


            </div>
          </div>


        </div>
      </div>
    </div>
  </div>
