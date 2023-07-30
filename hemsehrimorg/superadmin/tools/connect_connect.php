<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$database = "hemsehrimorg";
$message = "";

try{
    $connect = new PDO("mysql:host=$hostname; dbname=$database", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connect->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
}catch(PDOException $error){
    $message = $error->getMessage();
}
?>