<?php
session_start();
$key = $_GET['key'];
if ($key=="logout") {
    unset($_SESSION['user_id']);
    unset($_SESSION['fullname']);
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['email']);
    unset($_SESSION['phanquyen']);
   
    echo "<script languae='javascript'>window.location.href='../web/index.php'</script>";
}
