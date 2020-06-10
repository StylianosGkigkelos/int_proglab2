<?php
session_start();
include 'Database.php';
include 'header.php';
error_reporting(0);
?>


    <head>
        <title>Register</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="styles.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>

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