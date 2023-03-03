<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "shop";


// bazaga ulanish
$conn = new mysqli($servername, $username, $password, $dbname);

//bazaga ulanishni tekshirish

if ($conn->connect_error){
    die("Bazaga ulana olmadi: " . $conn->connect_error);
}