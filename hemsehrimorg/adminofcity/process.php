<link href="/hemsehrimorg/tools/img/hemsehrimorg.png" rel="icon">
<title>hemsehrim.org | İşlem</title>

<?php
include('tools/connect_db.php');
include('tools/connect_connect.php');
session_start();
// error_reporting(0);

// ADMİNOFCİTY GİRİŞ EKRANI //
if(isset($_POST["adminofcity_login"])){
    if(empty($_POST["city_username"]) || empty($_POST["adminofcity_username"]) || empty($_POST["adminofcity_password"])){
        $message = '<label>Tüm alanlar gereklidir!</label>';
    }else{
        $query = "SELECT * FROM adminofcity_logininfo WHERE city_username =:city_username AND adminofcity_username =:adminofcity_username AND adminofcity_password =:adminofcity_password";
        $statement = $connect->prepare($query);
        $statement->execute(
            array(
                'city_username' => $_POST["city_username"],
                'adminofcity_username' => $_POST["adminofcity_username"],
                'adminofcity_password' => $_POST["adminofcity_password"],

                )
        );
        $count = $statement->rowCount();
        if($count > 0){
            $_SESSION["city_username"] = $_POST["city_username"];
            $_SESSION["adminofcity_username"] = $_POST["adminofcity_username"];
            $_SESSION["adminofcity_password"] = $_POST["adminofcity_password"];
            $_SESSION["oturum"] = true;

            header("location: index.php");
        }else{
            echo "<script>alert('Giriş bilgileriniz yanlış!')</script>";
            header("refresh:0; out.php");
        }
    }
}


// ADMİNİN ŞİFRESİNİ GÜNCELLEME İŞLEMİ //
if(isset($_POST["update_adminofcity_password"])){
    $adminofcity_username = $_SESSION["adminofcity_username"];
    $adminofcity_password = $_SESSION["adminofcity_password"];
    $now_adminofcity_password = $_POST["now_adminofcity_password"];
    $new_adminofcity_password = $_POST["new_adminofcity_password"];
    $new2_adminofcity_password = $_POST["new2_adminofcity_password"];

    $query = $db->prepare("SELECT * FROM adminofcity WHERE adminofcity_username = '$adminofcity_username' AND adminofcity_password = '$adminofcity_password'");
    $add_data = $query->execute();
    if($adminofcity_password == $now_adminofcity_password){
        if($new_adminofcity_password != $new2_adminofcity_password){
            echo "<script>alert('Yeni şifreler örtüşmemektedir. Tekrar Deneyiniz...');</script>";
            header('Refresh:0; password.php');
        }elseif($adminofcity_password == $new_adminofcity_password){
            echo "<script>alert('Şifreler zaten aynı! Tekrar Deneyiniz...');</script>";
            header('Refresh:0; password.php');
        }else{
            $query2 = $db->prepare("UPDATE adminofcity SET adminofcity_password =? 
            WHERE adminofcity_username = '$adminofcity_username' AND adminofcity_password = '$adminofcity_password'");
            $add_data = $query2->execute([$new2_adminofcity_password]);
            if($add_data){
                $_SESSION["adminofcity_password"] = $new_adminofcity_password;
                echo "<script>alert('Şifreniz Başarıyla Güncellendi!');</script>";
                header('Refresh:0; password.php');
            }
        }
    }elseif($adminofcity_password != $now_adminofcity_password){
        echo "<script>alert('Mevcut şifreniz doğru değil!');</script>";
        header('Refresh:0; password.php');
    }else{
        echo 0;
    }
}


// ŞEHİR YÖNETİCİSİNİN KİŞİSEL BİLGİLERİNİ GÜNCELLEME İŞLEMİ //
if(isset($_POST['update_adminofcity_info'])){
    $adminofcity_username = $_SESSION["adminofcity_username"];
    $adminofcity_password = $_SESSION["adminofcity_password"];

    $adminofcity_name = $_POST["adminofcity_name"];
    $adminofcity_surname = $_POST["adminofcity_surname"];
    $gender_type = $_POST["gender_type"];
    $adminofcity_telephone = $_POST["adminofcity_telephone"];
    $adminofcity_mail = $_POST["adminofcity_mail"];

    $query = $db->prepare("UPDATE adminofcity SET adminofcity_name =? , adminofcity_surname =? ,  gender_type =? , adminofcity_telephone =? ,  adminofcity_mail =? WHERE adminofcity_username IN ('$adminofcity_username')");
    $add_data = $query->execute([$adminofcity_name, $adminofcity_surname, $gender_type, $adminofcity_telephone, $adminofcity_mail]);
    if($add_data){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; settings.php");

    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; settings.php');
    }
}

// ADMİNOFCİTY POST EKLEME İŞLEMİ //
if(isset($_POST['publish_post'])){
    $city_username = $_SESSION["city_username"];
    $adminofcity_username = $_SESSION["adminofcity_username"];
    $adminofcity_password = $_SESSION["adminofcity_password"];

    $postofcity_title = $_POST["postofcity_title"];
    $postofcity_content = $_POST["postofcity_content"];

    $dest_path_post = "upload_post/";
    $filename_post = $_FILES['postofcity_img']['name'];
    $fileSourcePath_post = $_FILES['postofcity_img']['tmp_name'];
    $dosyaAdi_post = explode(".", $filename_post); 
    $dosyaAdi_uzantisiz_post = $dosyaAdi_post[0];
    $dosyaAdi_uzantisi_post = $dosyaAdi_post[1];
    $yeni_dosyaAdi_post = md5(time().$dosyaAdi_uzantisiz_post).'.'.$dosyaAdi_uzantisi_post;
    $fileDestPath_post = $dest_path_post.$yeni_dosyaAdi_post;
    
    if(move_uploaded_file($fileSourcePath_post, $fileDestPath_post)){

    }

    $sorgu = $db->prepare('INSERT INTO postofcity SET 
                                                    city_username =?, 
                                                    adminofcity_username =?,
                                                    postofcity_title =?, 
                                                    postofcity_content =?, 
                                                    postofcity_img =?');
    $ekle = $sorgu->execute([$city_username, 
                            $adminofcity_username, 
                            $postofcity_title, 
                            $postofcity_content, 
                            $fileDestPath_post]);
    if($ekle){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; publish_post.php");

    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; publish_post.php');
    }
}


// ADMİNOFCİTY DUYURU EKLEME İŞLEMİ //
if(isset($_POST['publish_notice'])){
    $city_username = $_SESSION["city_username"];
    $adminofcity_username = $_SESSION["adminofcity_username"];
    $adminofcity_password = $_SESSION["adminofcity_password"];

    $noticeofcity_title = $_POST["noticeofcity_title"];
    $noticeofcity_content = $_POST["noticeofcity_content"];
    $fileDestPath_notice = NULL;
    if($_FILES['noticeofcity_img']['name'] != NULL){
        $dest_path_notice = "upload_notice/";
        $filename_notice = $_FILES['noticeofcity_img']['name'];
        $fileSourcePath_notice = $_FILES['noticeofcity_img']['tmp_name'];
        $dosyaAdi_notice = explode(".", $filename_notice); 
        $dosyaAdi_uzantisiz_notice = $dosyaAdi_notice[0];
        $dosyaAdi_uzantisi_notice = $dosyaAdi_notice[1];
        $yeni_dosyaAdi_notice = md5(time().$dosyaAdi_uzantisiz_notice).'.'.$dosyaAdi_uzantisi_notice;
        $fileDestPath_notice = $dest_path_notice.$yeni_dosyaAdi_notice;
        
        if(move_uploaded_file($fileSourcePath_notice, $fileDestPath_notice)){
    
        }
    }
    $sorgu = $db->prepare('INSERT INTO noticeofcity SET 
                                                    city_username =?, 
                                                    adminofcity_username =?,
                                                    noticeofcity_title =?, 
                                                    noticeofcity_content =?, 
                                                    noticeofcity_img =?');
    $ekle = $sorgu->execute([$city_username, 
                            $adminofcity_username, 
                            $noticeofcity_title, 
                            $noticeofcity_content, 
                            $fileDestPath_notice]);
    if($ekle){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; publish_notice.php");

    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; publish_notice.php');
    }
}


// ADMİONCİTY TALEBİ EKLEME İŞLEMİ //
if(isset($_POST['adminofcitytoadmin_message'])){
    $adminofcity_username = $_SESSION["adminofcity_username"];
    $adminofcity_password = $_SESSION["adminofcity_password"];

    $adminofcitytoadmin_title = $_POST["adminofcitytoadmin_title"];
    $adminofcitytoadmin_content = $_POST["adminofcitytoadmin_content"];

    $query = $db->prepare("INSERT INTO adminofcitytoadmin SET adminofcity_username =? , adminofcitytoadmin_title =? , adminofcitytoadmin_content =?");
    $add_data = $query->execute([$adminofcity_username, $adminofcitytoadmin_title, $adminofcitytoadmin_content]);
    if($add_data){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; request_from_admin.php");

    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; request_from_admin.php');
    }
}

?>