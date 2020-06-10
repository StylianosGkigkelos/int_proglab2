<?php
session_start();
include 'Database.php';
if (!isset($_SESSION['userid']) || $_SESSION['userid']=="" || $_SESSION['userstatus'] != 'ADMIN'
    || $_SESSION['userstatus'] != 'ATHLETE') {
    header("Location: index.php");
}
include 'header.php';
?>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <body>
    <div class="container">
        <div class="content">
            <div class="row">
                <div class="col-sm-12 col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="actions.php" enctype="multipart/form-data" >
                                <input type="hidden" id="reason" name="reason" value="updateAthlete">
                                <h1 class="text-center">
                                    Update Athlete
                                </h1>

                                <div class="form-group">
                                    <label for="exampleInput1">Age</label>
                                    <input type="text" class="form-control" maxlength="3" id="exampleInput1" placeholder = "Age" name="age" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInput2">Car Number</label>
                                    <input type="text" class="form-control" maxlength="2" id="exampleInput2" placeholder="Car Number" name="car_number" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInput3">Number of wins</label>
                                    <input type="text" class="form-control" maxlength="2" id="exampleInput2" placeholder="Number of Wins" name="wins" required>
                                </div>


                                <div class="form-group">
                                    <label for="exampleInputFile1">Photo</label>
                                    <input type="file" name="fileToUpload" id="fileToUpload" required>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">Update Driver</button>

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