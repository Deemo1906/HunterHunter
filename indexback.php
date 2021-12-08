<?php
session_start();
$database = "hxh";
$db_handle = mysqli_connect('localhost','root','');
$db_found = mysqli_select_db($db_handle, $database);


?>