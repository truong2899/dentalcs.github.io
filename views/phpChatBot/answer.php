<?php
session_start();
//fetch_user_chat_history.php
include('database.inc.php');
error_reporting(0);
$tr = new getData();
$id = $_POST['idQuestion'];
echo $tr->getAnswer($id);
unset($_SESSION['idQuestion']);
