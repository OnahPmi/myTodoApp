<?php
$hostname = "localhost";
$username = "root";
$db_password = ""; 
$db_name = "my_todo_list_db";
$port_no = 3308; 
$conn = mysqli_connect($hostname, $username, $db_password, $db_name, $port_no);

if (!$conn){
    die("Connect Error (" . $mysqli->connect_errno . ") "  . $mysqli->connect_error);
}
?>