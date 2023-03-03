<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "shop";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
} catch(PDOException $e){
    echo "Bazaga ulana olmadi: " . $e->getMessage();

}