<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "crud1";


$conn = new mysqli($localhost, $username, $password, $dbname);

if($conn -> connect_error){
    die("Connection Failed: ". $conn -> connect_error);
}
?>