<?php
session_start();
//fetch_user_chat_history.php
include('database.inc.php');
error_reporting(0);
$tr = new getData();
$con = $tr->ketnoi_csdl();
$id_user = $_SESSION['user_id'];
$action = $_GET['key'];
if (isset($action) && ($action == "reconsult")) {
    unset($_SESSION['idQuestion']);
    $excute = mysqli_query($con, 'Delete from user_answer where id_user = '.$id_user.' ');
    
    if ($excute) {
        header("location:index.php");
    } else {
        echo 'Erorr!';
    }
} else {
    echo "Erorr!";
}
