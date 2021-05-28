<?php
error_reporting(0);
session_start();
$user_id = $_SESSION['user_id'];
$fullname = $_SESSION['fullname'];
$username=$_SESSION['username'];
$password = $_SESSION['password'];
$email = $_SESSION['email'];
$phanquyen=$_SESSION['phanquyen'];

if ($phanquyen != 0 && $phanquyen != 2 && $phanquyen != 1) {
    echo '<script languae="javascript">window.location.href="login_form/login_ngtimviec.php"</script>';
}
$action = $_GET['key'];
if (isset($action)) {
    unset($_SESSION['user_id']);
    unset($_SESSION['fullname']);
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['email']);
    unset($_SESSION['phanquyen']);
    echo '<script languae="javascript">window.location.href="index.php"</script>';
}
