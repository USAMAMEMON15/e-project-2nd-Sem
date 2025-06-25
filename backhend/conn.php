<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "movie_ticket_booking";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn){
    die( "Connection Failed");
}
?>