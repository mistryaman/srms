<?php
session_start();
$hostname = "localhost";
$user     = "root";
$pass     = "";
$db       = "collage";

$conn = mysqli_connect($hostname, $user, $pass, $db);

if (!$conn) {
    echo "error";
} else {
    echo "";
}