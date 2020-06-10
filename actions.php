<?php
session_start();
if (!isset($_SESSION['userid']) || $_SESSION['userid'] == "") {
    header("Location: login.php");
}
include "database.php";
$database = new Database();


if (isset($_POST['reason'])) {
    $reason = $_POST['reason'];

    if ($reason == 'register') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        // Hash password concatenated with email using algorithm sha256 so it's not saved as plaintext in the database
        $password = hash("sha256", $password . $email);
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        // All created users are REGISTERED.
        // Only an admin can change the status of an account
        // In a later iteration the user can enter a code that corresponds to a known one in the database to denote that he is a user that owns a card
        $status = 'REGISTERED';
        $database->register($first_name, $last_name, $email, $password, $status);
    } else if ($reason == 'login') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        //TODO: HASH HERE?
        $database->login($email, $password);
    } else if ($reason == 'contact') {
        $title = $_POST['title'];
        $message = $_POST['message'];
        $userid = $_SESSION['userid'];
        $database->contact($title, $message, $userid);
    } else if ($reason == 'logout') {
        unset($_SESSION['userid']);
        unset($_SESSION['first_name']);
        unset($_SESSION['userstatus']);

    } else if ($reason == 'addArticle') {
        // Based on w3schools file upload
        $target_dir = "resources/news/";
        $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo 'ok';

                $database->addArticle($_POST['title'], $_POST['message'], $target_file);
            }
        }
    }
    else if ($reason == 'addPhoto') {
        // Based on w3schools file upload
        $target_dir = "resources/photos/";
        $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                if (isset($_POST['category']))
                    $database->addPhoto($target_file, $_POST['category']);
                else
                    header("Location: about_us.php");
            }
        }
    }


    // TODO: Delete these
    elseif ($reason == 'profile_update') {

        $userid = $_POST['userid'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];

        $database->profile_update($userid, $fname, $lname, $address, $tel, $email);

    } elseif ($reason == 'password_update') {

        $userid = $_POST['userid'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $database->password_update($password, $email, $userid);
    } // GC
    else if ($reason == 'addBnb') {

        $userId = $_POST['userId'];
        $name = $_POST['name'];
        $imageUrl = $_POST['imageUrl'];
        $descr = $_POST['descr'];
        $address = $_POST['address'];
        $locationId = $_POST['location'];

        $database->addBnb($userId, $name, $imageUrl, $descr, $address, $locationId);


    } else if ($reason == 'addLocation') {

        $townName = $_POST['townName'];
        $countryName = $_POST['countryName'];

        $database->addLocation($townName, $countryName);

    }
} // end method POST

else if (isset($_GET['reason'])) {

    $reason = $_GET['reason'];
    $id = $_GET['id'];
    // TODO: Is delete neccessary?
    if ($reason == "delete") {
        $type = $_GET['type'];

        switch ($type) {
            case "bnb":
                $database->deleteBnb($id);
                break;

            case "booking":
                $database->deleteBooking($id);
                break;
        }

    }

} // end method GET
?>