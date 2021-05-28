<?php
//fetch_user_chat_history.php
include('database.inc.php');
error_reporting(0);
$tr = new getData();
$tr->ketnoi_csdl();
$id_user = $_POST['id_user'];
echo $tr->fetch_user_chat_history($id_user);
