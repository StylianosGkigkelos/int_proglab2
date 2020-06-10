<?php
session_start();
error_reporting(0);
unset($_SESSION['userid']);
unset($_SESSION['first_name']);
unset($_SESSION['userstatus']);
header("Location:index.php");
?>