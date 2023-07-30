<?php

include("tools/connect_db.php");


// ÜYENİN TAKİP ETTİĞİ BİR ŞEHRİ SİLME İŞLEMİ //
if(isset($_GET["cities_memberCityID"])){
    $member_city_id = $_GET['cities_memberCityID'];

    $query = $db->prepare('DELETE FROM member_city WHERE member_city_id=?');
    $resault = $query->execute([$member_city_id]);
    if($resault){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; cities.php");
    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; cities.php');
    }
}


// ÜYENİN TALEBİNİ SİLME İŞLEMİ //
if(isset($_GET["rfa_membertoadmin_id"])){
    $membertoadmin_id = $_GET['rfa_membertoadmin_id'];

    $query = $db->prepare('DELETE FROM membertoadmin WHERE membertoadmin_id=?');
    $resault = $query->execute([$membertoadmin_id]);
    if($resault){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; request_from_admin.php");
    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; request_from_admin.php');
    }
}
























?>