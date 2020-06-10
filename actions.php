<?php
session_start();
if (!isset($_SESSION['userid']) || $_SESSION['userid']=="") {
    header("Location: login.php");
}
include "database.php";
$database = new Database();



if (isset($_POST['reason'])){
    $reason = $_POST['reason'];

    if ($reason == 'register') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        // Hash password concatenated with email using algorithm sha256 so it's not saved as plaintext in the database
        $password = hash("sha256", $password.$email);
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        // All created users are REGISTERED.
        // Only an admin can change the status of an account
        // In a later iteration the user can enter a code that corresponds to a known one in the database to denote that he is a user that owns a card
        $status = 'REGISTERED';
        $database->register($first_name, $last_name, $email, $password, $status);
    }
    else if($reason == 'login')
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        //TODO: HASH HERE?
        $database->login($email, $password);
    }
    else if($reason == 'contact') {
        $title = $_POST['title'];
        $message = $_POST['message'];
        $userid = $_SESSION['userid'];
        $database->contact($title, $message, $userid);
    }
    else if ($reason == 'logout'){
        unset($_SESSION['userid']);
        unset($_SESSION['first_name']);
    }
    //FIXME: unneeded? basika needed gia otan click
    else if($reason == 'get_article') {
        $articleid = $_POST['articleid'];
        $database->getArticle($articleid);
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

    }
    elseif ($reason == 'password_update') {

        $userid = $_POST['userid'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $database->password_update($password, $email, $userid);
    }
    // GC
    else if($reason == 'addBnb') {

        $userId = $_POST['userId'];
        $name = $_POST['name'];
        $imageUrl = $_POST['imageUrl'];
        $descr = $_POST['descr'];
        $address = $_POST['address'];
        $locationId = $_POST['location'];

        $database->addBnb($userId, $name, $imageUrl, $descr, $address, $locationId);



    }
    else if($reason == 'addLocation') {

        $townName = $_POST['townName'];
        $countryName = $_POST['countryName'];

        $database->addLocation($townName, $countryName);

    }
} // end method POST

else if(isset($_GET['reason'])) {

    $reason = $_GET['reason'];
    $id = $_GET['id'];
    // TODO: Is delete neccessary?
    if($reason == "delete") {
        $type = $_GET['type'];

        switch($type) {
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