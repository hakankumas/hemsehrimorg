<link href="/hemsehrimorg/tools/img/hemsehrimorg.png" rel="icon">
<title>hemsehrim.org | İşlem</title>

<?php
include('tools/connect_db.php');
include('tools/connect_connect.php');
session_start();
// error_reporting(0);


// ADMİNİN ŞİFRESİNİ GÜNCELLEME İŞLEMİ //
if(isset($_POST["update_admin_password"])){
    $admin_username = $_SESSION["admin_username"];
    $admin_password = $_SESSION["admin_password"];
    $now_admin_password = $_POST["now_admin_password"];
    $new_admin_password = $_POST["new_admin_password"];
    $new2_admin_password = $_POST["new2_admin_password"];

    $query = $db->prepare("SELECT * FROM admin WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'");
    $add_data = $query->execute();
    if($admin_password == $now_admin_password){
        if($new_admin_password != $new2_admin_password){
            echo "<script>alert('Yeni şifreler örtüşmemektedir. Tekrar Deneyiniz...');</script>";
            header('Refresh:0; password.php');
        }elseif($admin_password == $new_admin_password){
            echo "<script>alert('Şifreler zaten aynı! Tekrar Deneyiniz...');</script>";
            header('Refresh:0; password.php');
        }else{
            $query2 = $db->prepare("UPDATE admin SET admin_password =? 
            WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'");
            $add_data = $query2->execute([$new2_admin_password]);
            if($add_data){
                $_SESSION["admin_password"] = $new_admin_password;
                echo "<script>alert('Şifreniz Başarıyla Güncellendi!');</script>";
                header('Refresh:0; password.php');
            }
        }
    }elseif($admin_password != $now_admin_password){
        echo "<script>alert('Mevcut şifreniz doğru değil!');</script>";
        header('Refresh:0; password.php');
    }else{
        echo 0;
    }
}


// ADMİNİN KİŞİSEL BİLGİLERİNİ GÜNCELLEME İŞLEMİ //
if(isset($_POST['update_admin_info'])){
    $admin_username = $_SESSION["admin_username"];
    $admin_password = $_SESSION["admin_password"];

    $admin_name = $_POST["admin_name"];
    $admin_surname = $_POST["admin_surname"];
    $gender_type = $_POST["gender_type"];
    $admin_telephone = $_POST["admin_telephone"];
    $admin_mail = $_POST["admin_mail"];

    $query = $db->prepare("UPDATE admin SET admin_name =? , admin_surname =? ,  gender_type =? , admin_telephone =? ,  admin_mail =? WHERE admin_username IN ('$admin_username')");
    $add_data = $query->execute([$admin_name, $admin_surname, $gender_type, $admin_telephone, $admin_mail]);
    if($add_data){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; settings.php");

    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; settings.php');
    }
}


// ADMİN EKLEME İŞLEMİ //
if(isset($_POST['add_admin'])){
    $admin_username = $_POST["admin_username"];
    $admin_password = $_POST["admin_password"];
    $admin_type = $_POST["admin_type"];

    $query = $db->prepare('INSERT INTO admin SET admin_username =?, admin_password =?, admin_type =?');
    $add_data = $query->execute([$admin_username, $admin_password, $admin_type]);
    if($add_data){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; add_admin.php");

    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; add_admin.php');
    }
}


// ŞEHİR YÖNETİCİSİ EKLEME İŞLEMİ //
if(isset($_POST['add_adminofcity'])){
    $adminofcity_username = $_POST["adminofcity_username"];
    $adminofcity_password = $_POST["adminofcity_password"];

    $query = $db->prepare('INSERT INTO adminofcity SET adminofcity_username =?, adminofcity_password =?');
    $add_data = $query->execute([$adminofcity_username, $adminofcity_password]);
    if($add_data){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; add_adminofcity.php");

    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; add_adminofcity.php');
    }
}


// ŞEHİR YÖNETİCİSİNİ BİR ŞEHİRLE İLİŞKİLENDİRME İŞLEMİ //
if(isset($_POST['add_city_adminofcity'])){
    $city_username = $_POST["city_username"];
    $adminofcity_username = $_POST["adminofcity_username"];

    $query = $db->prepare('INSERT INTO city_adminofcity SET city_username =?, adminofcity_username =?');
    $add_data = $query->execute([$city_username, $adminofcity_username]);
    if($add_data){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; add_adminofcity.php");

    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; add_adminofcity.php');
    }
}


// ÜYE EKLEME İŞLEMİ //
if(isset($_POST['add_member'])){
    $member_username = $_POST["member_username"];
    $member_password = $_POST["member_password"];

    $query = $db->prepare('INSERT INTO member SET member_username =?, member_password =?');
    $add_data = $query->execute([$member_username, $member_password]);
    if($add_data){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; add_member.php");

    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; add_member.php');
    }
}


// ADMİNDEN ŞEHİR YÖNETİCİLERİNE TOPLU DUYURU EKLEME İŞLEMİ //
if(isset($_POST['add_announce_admintoadminofcity'])){
    $admin_username = $_SESSION["admin_username"];
    $admintoadminofcity_announce_title = $_POST["admintoadminofcity_announce_title"];
    $admintoadminofcity_announce_content = $_POST["admintoadminofcity_announce_content"];

    $query = $db->prepare('INSERT INTO admintoadminofcity_announce SET admin_username =?, admintoadminofcity_announce_title =?, admintoadminofcity_announce_content =?');
    $add_data = $query->execute([$admin_username, $admintoadminofcity_announce_title, $admintoadminofcity_announce_content]);
    if($add_data){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; add_announce_adminofcity.php");

    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; add_announce_adminofcity.php');
    }
}


// ADMİNDEN ÜYELERE TOPLU DUYURU EKLEME İŞLEMİ //
if(isset($_POST['add_announce_admintomember'])){
    $admin_username = $_SESSION["admin_username"];
    $admintomember_announce_title = $_POST["admintomember_announce_title"];
    $admintomember_announce_content = $_POST["admintomember_announce_content"];

    $query = $db->prepare('INSERT INTO admintomember_announce SET admin_username =?, admintomember_announce_title =?, admintomember_announce_content =?');
    $add_data = $query->execute([$admin_username, $admintomember_announce_title, $admintomember_announce_content]);
    if($add_data){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; add_announce_member.php");

    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; add_announce_member.php');
    }
}


// ADMİNDEN ŞEHİR YÖNETİCİLERİNE MESAJ GÖNDERME İŞLEMİ //
if(isset($_POST['add_message_admintoadminofcity'])){
    $admin_username = $_SESSION["admin_username"];
    $adminofcity_username = $_POST["adminofcity_username"];
    $admintoadminofcity_message_title = $_POST["admintoadminofcity_message_title"];
    $admintoadminofcity_message_content = $_POST["admintoadminofcity_message_content"];

    $query = $db->prepare('INSERT INTO admintoadminofcity_message SET admin_username =?, adminofcity_username =?, admintoadminofcity_message_title =?, admintoadminofcity_message_content =?');
    $add_data = $query->execute([$admin_username, $adminofcity_username, $admintoadminofcity_message_title, $admintoadminofcity_message_content]);
    if($add_data){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; add_message_adminofcity.php");

    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; add_message_adminofcity.php');
    }
}


// ADMİNDEN ÜYELERE MESAJ GÖNDERME İŞLEMİ //
if(isset($_POST['add_message_member'])){
    $admin_username = $_SESSION["admin_username"];
    $member_username = $_POST["member_username"];
    $admintomember_message_title = $_POST["admintomember_message_title"];
    $admintomember_message_content = $_POST["admintomember_message_content"];

    $query = $db->prepare('INSERT INTO admintomember_message SET admin_username =?, member_username =?, admintomember_message_title =?, admintomember_message_content =?');
    $add_data = $query->execute([$admin_username, $member_username, $admintomember_message_title, $admintomember_message_content]);
    if($add_data){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; add_message_adminofcity.php");

    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; add_message_adminofcity.php');
    }
}

























?>