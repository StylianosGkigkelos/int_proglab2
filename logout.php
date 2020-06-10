<?php
session_start();
unset($_SESSION['userid']);
unset($_SESSION['first_name']);
unset($_SESSION['userstatus']);
header("Location:index.php");
?>