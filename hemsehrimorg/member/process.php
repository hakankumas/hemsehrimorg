<?php
include('tools/connect_db.php');
include('tools/connect_connect.php');
session_start();
// error_reporting(0);

// ÜYE GİRİŞ EKRANI //
if(isset($_POST["member_login"])){
    if(empty($_POST["member_username"]) || empty($_POST["member_password"])){
        $message = '<label>Tüm alanlar gereklidir!</label>';
    }else{
        $query = "SELECT * FROM member WHERE member_username =:member_username AND member_password =:member_password";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                'member_username' => $_POST["member_username"],
                'member_password' => $_POST["member_password"],

                )
        );
        $count = $statement->rowCount();
        if($count > 0){
            $_SESSION["member_username"] = $_POST["member_username"];
            $_SESSION["member_password"] = $_POST["member_password"];
            $_SESSION["oturum"] = true;
            echo "<script>alert('Hoş Geldiniz!')</script>";
            header("refresh:0; index.php");
        }else{
            echo "<script>alert('Giriş bilgileriniz yanlış!')</script>";
            header("refresh:0; out.php");
        }
    }
}


// YENİ ÜYE KAYIT İŞLEMİ //
if(isset($_POST['member_signin'])){
    $member_username = $_POST["member_username"];
    $member_password = $_POST["member_password"];

    $query = $db->prepare('SELECT * FROM member WHERE member_username =?');
    $query->execute([$member_username]);
    $member_list = $query->fetchAll(PDO::FETCH_OBJ);
    
    if($member_list != NULL){
        echo "<script>alert('Bu kullanıcı adı zaten kullanılmaktadır. Lütfen başka bir kullanıcı adı seçiniz!');</script>";
        header("Refresh:0; /hemsehrimorg/create-member.php");

    }elseif($member_list == NULL){
        $query2 = $db->prepare('INSERT INTO member(member_username, member_password) VALUES (?,?)');
        $add_data = $query2->execute([$member_username, $member_password]);
            if($add_data){
            echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
            header('Refresh:0; /hemsehrimorg/login-member.php');
            }else{
                echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
                header('Refresh:0; /hemsehrimorg/create-member.php');
            }
    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; /hemsehrimorg/create-member.php');
    }

}

// ÜYENİN ŞİFRESİNİ GÜNCELLEME İŞLEMİ //
if(isset($_POST["update_member_password"])){
    $member_username = $_SESSION["member_username"];
    $member_password = $_SESSION["member_password"];
    $now_member_password = $_POST["now_member_password"];
    $new_member_password = $_POST["new_member_password"];
    $new2_member_password = $_POST["new2_member_password"];

    $query = $db->prepare("SELECT * FROM member WHERE member_username = '$member_username' AND member_password = '$member_password'");
    $add_data = $query->execute();
    if($member_password == $now_member_password){
        if($new_member_password != $new2_member_password){
            echo "<script>alert('Yeni şifreler örtüşmemektedir. Tekrar Deneyiniz...');</script>";
            header('Refresh:0; password.php');
        }elseif($member_password == $new_member_password){
            echo "<script>alert('Şifreler zaten aynı! Tekrar Deneyiniz...');</script>";
            header('Refresh:0; password.php');
        }else{
            $query2 = $db->prepare("UPDATE member SET member_password =? 
            WHERE member_username = '$member_username' AND member_password = '$member_password'");
            $add_data = $query2->execute([$new2_member_password]);
            if($add_data){
                $_SESSION["member_password"] = $new_member_password;
                echo "<script>alert('Şifreniz Başarıyla Güncellendi!');</script>";
                header('Refresh:0; password.php');
            }
        }
    }elseif($member_password != $now_member_password){
        echo "<script>alert('Mevcut şifreniz doğru değil!');</script>";
        header('Refresh:0; password.php');
    }else{
        echo 0;
    }
}


// ÜYENİN KİŞİSEL BİLGİLERİNİ GÜNCELLEME İŞLEMİ //
if(isset($_POST['update_member_info'])){
    $member_username = $_SESSION["member_username"];
    $member_password = $_SESSION["member_password"];

    $member_name = $_POST["member_name"];
    $member_surname = $_POST["member_surname"];
    $gender_type = $_POST["gender_type"];
    $member_telephone = $_POST["member_telephone"];
    $member_mail = $_POST["member_mail"];

    $query = $db->prepare("UPDATE member SET member_name =? , member_surname =? ,  gender_type =? , member_telephone =? ,  member_mail =? WHERE member_username IN ('$member_username')");
    $add_data = $query->execute([$member_name, $member_surname, $gender_type, $member_telephone, $member_mail]);
    if($add_data){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; settings.php");

    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; settings.php');
    }
}


// SUPERADMİNİN KİŞİSEL PROFİL RESMİNİ GÜNCELLEME İŞLEMİ //
if(isset($_POST['member_update_pp'])){
    $member_username = $_SESSION["member_username"];
    $member_password = $_SESSION["member_password"];

    $dest_path_memberpp = "img/upload_member/";
    $filename_memberpp = $_FILES['member_img']['name'];
    $fileSourcePath_memberpp = $_FILES['member_img']['tmp_name'];
    $dosyaAdi_memberpp = explode(".", $filename_memberpp); 
    $dosyaAdi_uzantisiz_memberpp = $dosyaAdi_memberpp[0];
    $dosyaAdi_uzantisi_memberpp = $dosyaAdi_memberpp[1];
    $yeni_dosyaAdi_memberpp = md5(time().$dosyaAdi_uzantisiz_memberpp).'.'.$dosyaAdi_uzantisi_memberpp;
    $fileDestPath_memberpp = $dest_path_memberpp.$yeni_dosyaAdi_memberpp;
    
    if(move_uploaded_file($fileSourcePath_memberpp, $fileDestPath_memberpp)){
        $member_img = "/hemsehrimorg/member/".$fileDestPath_memberpp;

        $query = $db->prepare("UPDATE member SET member_img =? WHERE member_username IN ('$member_username')");
        $add_data = $query->execute([$member_img]);
        if($add_data){
            echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
            header("Refresh:0; /hemsehrimorg/member/settings.php");
    
        }else{
            echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
            header('Refresh:0; /hemsehrimorg/member/settings.php');
        }
    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; /hemsehrimorg/member/settings.php');
    }

}


// ÜYE TALEBİ EKLEME İŞLEMİ //
if(isset($_POST['membertoadmin_message'])){
    $member_username = $_SESSION["member_username"];
    $member_password = $_SESSION["member_password"];

    $membertoadmin_title = $_POST["membertoadmin_title"];
    $membertoadmin_content = $_POST["membertoadmin_content"];

    $query = $db->prepare("INSERT INTO membertoadmin SET member_username =? , membertoadmin_title =? , membertoadmin_content =?");
    $add_data = $query->execute([$member_username, $membertoadmin_title, $membertoadmin_content]);
    if($add_data){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; request_from_admin.php");

    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; request_from_admin.php');
    }
}








?>