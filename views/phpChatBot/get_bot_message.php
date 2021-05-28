<?php
//fetch_user_chat_history.php
include('database.inc.php');
error_reporting(0);
$tr = new getData();
$con = $tr->ketnoi_csdl();
$answer =  trim($_POST['txt']);
$id_user = $_POST['id_user'];
$id_answer = $_POST['id'];

echo $tr->getQuestion($answer, $id_user, $id_answer);
