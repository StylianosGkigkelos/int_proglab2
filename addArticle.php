<?php
session_start();
include 'Database.php';
if (!isset($_SESSION['userid']) || $_SESSION['userid']=="" || $_SESSION['userstatus'] != 'ADMIN') {
    header("Location: index.php");
}
error_reporting(0);
include 'header.php';
?>

    <head>
        <title>Add article</title>
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

                <div class="card">
                    <div class="card-body">


                        <form method="post" action="actions.php" enctype="multipart/form-data" >
                            <input type="hidden" id="reason" name="reason" value="addArticle">
                            <h1 class="text-center">
                                Add Article
                            </h1>

                            <div class="form-group">
                                <label for="exampleInput1">Title</label>
                                <input type="text" class="form-control" maxlength="100" id="exampleInput1" placeholder = "Article Title" name="title" required>
                            </div>

                            <div class="form-group">
                                <label for="exampleInput2">Message</label>
                                <textarea type="text" class="form-control" id="exampleInput2" placeholder="Message" name="message" required></textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile1">Photo</label>
                                <input type="file" name="fileToUpload" id="fileToUpload" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Add Article</button>

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