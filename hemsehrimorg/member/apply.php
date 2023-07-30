<?php

include("tools/connect_db.php");
session_start();


// ÜYENİN YENİ BİR ŞEHİR TAKİP ETME İŞLEMİ //
if(isset($_GET["cities_cityUsername"])){
    $member_username = $_SESSION["member_username"];
    $city_username = $_GET['cities_cityUsername'];

    $query = $db->prepare('INSERT INTO member_city SET member_username =?, city_username =?');
    $add_data = $query->execute([$member_username, $city_username]);
    if($add_data){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; cities.php");
    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; cities.php');
    }
}


?>