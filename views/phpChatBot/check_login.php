<?php
error_reporting(0);
session_start();
$user_id = $_SESSION['user_id'];
$fullname = $_SESSION['fullname'];
$username=$_SESSION['username'];
$password = $_SESSION['password'];
$email = $_SESSION['email'];
$phanquyen=$_SESSION['phanquyen'];

if ($phanquyen != 1 && $phanquyen != 2) {
    echo '<script languae="javascript">window.location.href="login_form/login_ngtimviec.php"</script>';
}
