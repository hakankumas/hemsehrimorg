<link href="/hemsehrimorg/tools/img/hemsehrimorg.png" rel="icon">
<title>hemsehrim.org | Silme</title>

<?php
include("tools/connect_db.php");


// ADMİN SİL //
if(isset($_GET["editAdmin_adminUsername"])){
    $query = $db->prepare('DELETE FROM admin WHERE admin_username=?');
    $resault = $query->execute([$_GET['editAdmin_adminUsername']]);
    if($resault){
        echo "<script>alert('Admin Silme İşleminiz Gerçekleştirildi!')</script>";
        header("refresh:0; edit_admin.php");
    }else{
        echo 0;
    }
}


// ŞEHİR SİL //
if(isset($_GET["editCity_cityUsername"])){
    $query = $db->prepare('DELETE FROM city WHERE city_username=?');
    $resault = $query->execute([$_GET['editCity_cityUsername']]);
    if($resault){
        echo "<script>alert('Şehir Silme İşleminiz Gerçekleştirildi!')</script>";
        header("refresh:0; edit_city.php");
    }else{
        echo 0;
    }
}


// ŞEHİR YÖNETİCİSİ SİL //
if(isset($_GET["editAdminofcity_adminofcityUsername"])){
    $query = $db->prepare('DELETE FROM adminofcity WHERE adminofcity_username=?');
    $resault = $query->execute([$_GET['editAdminofcity_adminofcityUsername']]);
    if($resault){
        echo "<script>alert('Şehir Yöneticisi Silme İşleminiz Gerçekleştirildi!')</script>";
        header("refresh:0; edit_adminofcity.php");
    }else{
        echo 0;
    }
}


// ŞEHİR YÖNETİCİSİNİN ŞEHİR İLE OLAN İLİŞİĞİNİ SİL //
if(isset($_GET["editAdminofcity_adminofcityID"])){
    $query = $db->prepare('DELETE FROM city_adminofcity WHERE city_adminofcity_id=?');
    $resault = $query->execute([$_GET['editAdminofcity_adminofcityID']]);
    if($resault){
        echo "<script>alert('Şehir Yöneticisi ve Şehrin İlişiğini Silme İşleminiz Gerçekleştirildi!')</script>";
        header("refresh:0; edit_adminofcity.php");
    }else{
        echo 0;
    }
}


// ÜYE SİL //
if(isset($_GET["editMember_memberUsername"])){
    $query = $db->prepare('DELETE FROM member WHERE member_username=?');
    $resault = $query->execute([$_GET['editMember_memberUsername']]);
    if($resault){
        echo "<script>alert('Üye Silme İşleminiz Gerçekleştirildi!')</script>";
        header("refresh:0; edit_member.php");
    }else{
        echo 0;
    }
}





















?>