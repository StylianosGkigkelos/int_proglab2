<?php
session_start();
include 'Database.php';
if (!isset($_SESSION['userid']) || $_SESSION['userid']=="" || $_SESSION['userstatus'] != 'ADMIN') {
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
                                <input type="hidden" id="reason" name="reason" value="addPhoto">
                                <h1 class="text-center">
                                    Add Photo
                                </h1>

                                <div class="form-group">
                                    <label for="exampleInputFile1">Photo</label>
                                    <input type="file" name="fileToUpload" id="fileToUpload" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile1">Choose Category:</label>
                                    <select name="category" id="category" required>
                                        <option value="1">Car</option>
                                        <option value="2">Championship</option>
                                        <option value="3">Historic</option>
                                        <option value="4">Win</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">Add Photo</button>

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