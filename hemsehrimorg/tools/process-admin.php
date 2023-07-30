<?php
include("connect_conn.php");
include("connect_db.php");

session_start();
error_reporting(0);

// YÖNETİCİ GİRİŞ EKRANI //
if(isset($_POST["admin_login"])){

    $admin_username = $_POST["admin_username"];
    $admin_password = $_POST["admin_password"];
    $admin_type = $_POST["admin_type"];
    
    // SUPERADMİN GİRİŞ //
    $sql = "SELECT admin_username, admin_password, admin_type FROM admin WHERE admin_username ='$admin_username' and admin_password='$admin_password' and admin_type='Superadmin'";

    $query = mysqli_query($conn, $sql);
    $array = mysqli_fetch_array($query);

    if($array!=0){
        $_SESSION["admin_username"] = $_POST["admin_username"];
        $_SESSION["admin_password"] = $_POST["admin_password"];
        $_SESSION["admin_type"] = 'Superadmin';
        $_SESSION["oturum"] = true;
        header("location:/hemsehrimorg/superadmin/index.php");
    }

    // ADMİN GİRİŞ //
    $sql = "SELECT admin_username, admin_password, admin_type FROM admin WHERE admin_username ='$admin_username' and admin_password='$admin_password' and admin_type='Admin'";

    $query = mysqli_query($conn, $sql);
    $array = mysqli_fetch_array($query);

    if($array!=0){
            $_SESSION["admin_username"] = $_POST["admin_username"];
            $_SESSION["admin_password"] = $_POST["admin_password"];
            $_SESSION["admin_type"] = 'Admin';
            $_SESSION["oturum"] = true;
        header("location:/hemsehrimorg/admin/index.php");
    }
    
    else{
        header('Refresh:0; /hemsehrimorg/login-admin.php');
    }
}



// SUPERADMİN'İN ŞEHİR EKLEME İŞLEMİ //
if(isset($_POST['superadmin_add_city'])){
    $city_name = $_POST["city_name"];
    $city_username = $_POST["city_username"];

    $dest_path_city = "img/upload_city/";
    $filename_city = $_FILES['city_img']['name'];
    $fileSourcePath_city = $_FILES['city_img']['tmp_name'];
    $dosyaAdi_city = explode(".", $filename_city); 
    $dosyaAdi_uzantisiz_city = $dosyaAdi_city[0];
    $dosyaAdi_uzantisi_city = $dosyaAdi_city[1];
    $yeni_dosyaAdi_city = md5(time().$dosyaAdi_uzantisiz_city).'.'.$dosyaAdi_uzantisi_city;
    $fileDestPath_city = $dest_path_city.$yeni_dosyaAdi_city;
    
    if(move_uploaded_file($fileSourcePath_city, $fileDestPath_city)){
        $city_img = "/hemsehrimorg/tools/".$fileDestPath_city;
        $query = $db->prepare('INSERT INTO city SET city_name =?, city_username =?, city_img =?');
        $add_data = $query->execute([$city_name, $city_username, $city_img]);
        
        if($add_data){
            echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
            header("Refresh:0; /hemsehrimorg/superadmin/add_city.php");   
        }else{
            echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
            header('Refresh:0; /hemsehrimorg/superadmin/add_city.php');
        }
    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; /hemsehrimorg/superadmin/add_city.php');
    }

}


// SUPERADMİNİN KİŞİSEL PROFİL RESMİNİ GÜNCELLEME İŞLEMİ //
if(isset($_POST['superadmin_update_pp'])){
    $admin_username = $_SESSION["admin_username"];
    $admin_password = $_SESSION["admin_password"];

    $dest_path_adminpp = "img/upload_admin/";
    $filename_adminpp = $_FILES['admin_img']['name'];
    $fileSourcePath_adminpp = $_FILES['admin_img']['tmp_name'];
    $dosyaAdi_adminpp = explode(".", $filename_adminpp); 
    $dosyaAdi_uzantisiz_adminpp = $dosyaAdi_adminpp[0];
    $dosyaAdi_uzantisi_adminpp = $dosyaAdi_adminpp[1];
    $yeni_dosyaAdi_adminpp = md5(time().$dosyaAdi_uzantisiz_adminpp).'.'.$dosyaAdi_uzantisi_adminpp;
    $fileDestPath_adminpp = $dest_path_adminpp.$yeni_dosyaAdi_adminpp;
    
    if(move_uploaded_file($fileSourcePath_adminpp, $fileDestPath_adminpp)){
        $admin_img = "/hemsehrimorg/tools/".$fileDestPath_adminpp;

        $query = $db->prepare("UPDATE admin SET admin_img =? WHERE admin_username IN ('$admin_username')");
        $add_data = $query->execute([$admin_img]);
        if($add_data){
            echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
            header("Refresh:0; /hemsehrimorg/superadmin/settings.php");
    
        }else{
            echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
            header('Refresh:0; /hemsehrimorg/superadmin/settings.php');
        }
    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; /hemsehrimorg/superadmin/settings.php');
    }

}


// ADMİN'İN ŞEHİR EKLEME İŞLEMİ //
if(isset($_POST['admin_add_city'])){
    $city_name = $_POST["city_name"];
    $city_username = $_POST["city_username"];

    $dest_path_city = "img/upload_city/";
    $filename_city = $_FILES['city_img']['name'];
    $fileSourcePath_city = $_FILES['city_img']['tmp_name'];
    $dosyaAdi_city = explode(".", $filename_city); 
    $dosyaAdi_uzantisiz_city = $dosyaAdi_city[0];
    $dosyaAdi_uzantisi_city = $dosyaAdi_city[1];
    $yeni_dosyaAdi_city = md5(time().$dosyaAdi_uzantisiz_city).'.'.$dosyaAdi_uzantisi_city;
    $fileDestPath_city = $dest_path_city.$yeni_dosyaAdi_city;
    
    if(move_uploaded_file($fileSourcePath_city, $fileDestPath_city)){
        $city_img = "/hemsehrimorg/tools/".$fileDestPath_city;
        $query = $db->prepare('INSERT INTO city SET city_name =?, city_username =?, city_img =?');
        $add_data = $query->execute([$city_name, $city_username, $city_img]);
        
        if($add_data){
            echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
            header("Refresh:0; /hemsehrimorg/admin/add_city.php");   
        }else{
            echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
            header('Refresh:0; /hemsehrimorg/admin/add_city.php');
        }
    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; /hemsehrimorg/admin/add_city.php');
    }

}


// SUPERADMİNİN KİŞİSEL PROFİL RESMİNİ GÜNCELLEME İŞLEMİ //
if(isset($_POST['admin_update_pp'])){
    $admin_username = $_SESSION["admin_username"];
    $admin_password = $_SESSION["admin_password"];

    $dest_path_adminpp = "img/upload_admin/";
    $filename_adminpp = $_FILES['admin_img']['name'];
    $fileSourcePath_adminpp = $_FILES['admin_img']['tmp_name'];
    $dosyaAdi_adminpp = explode(".", $filename_adminpp); 
    $dosyaAdi_uzantisiz_adminpp = $dosyaAdi_adminpp[0];
    $dosyaAdi_uzantisi_adminpp = $dosyaAdi_adminpp[1];
    $yeni_dosyaAdi_adminpp = md5(time().$dosyaAdi_uzantisiz_adminpp).'.'.$dosyaAdi_uzantisi_adminpp;
    $fileDestPath_adminpp = $dest_path_adminpp.$yeni_dosyaAdi_adminpp;
    
    if(move_uploaded_file($fileSourcePath_adminpp, $fileDestPath_adminpp)){
        $admin_img = "/hemsehrimorg/tools/".$fileDestPath_adminpp;

        $query = $db->prepare("UPDATE admin SET admin_img =? WHERE admin_username IN ('$admin_username')");
        $add_data = $query->execute([$admin_img]);
        if($add_data){
            echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
            header("Refresh:0; /hemsehrimorg/admin/settings.php");
    
        }else{
            echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
            header('Refresh:0; /hemsehrimorg/admin/settings.php');
        }
    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; /hemsehrimorg/admin/settings.php');
    }

}


// ŞEHİR YÖNETİCİSİNİN KİŞİSEL PROFİL RESMİNİ GÜNCELLEME İŞLEMİ //
if(isset($_POST['adminofcity_update_pp'])){
    $adminofcity_username = $_SESSION["adminofcity_username"];
    $adminofcity_password = $_SESSION["adminofcity_password"];

    $dest_path_adminofcitypp = "img/upload_adminofcity/";
    $filename_adminofcitypp = $_FILES['adminofcity_img']['name'];
    $fileSourcePath_adminofcitypp = $_FILES['adminofcity_img']['tmp_name'];
    $dosyaAdi_adminofcitypp = explode(".", $filename_adminofcitypp); 
    $dosyaAdi_uzantisiz_adminofcitypp = $dosyaAdi_adminofcitypp[0];
    $dosyaAdi_uzantisi_adminofcitypp = $dosyaAdi_adminofcitypp[1];
    $yeni_dosyaAdi_adminofcitypp = md5(time().$dosyaAdi_uzantisiz_adminofcitypp).'.'.$dosyaAdi_uzantisi_adminofcitypp;
    $fileDestPath_adminofcitypp = $dest_path_adminofcitypp.$yeni_dosyaAdi_adminofcitypp;
    
    if(move_uploaded_file($fileSourcePath_adminofcitypp, $fileDestPath_adminofcitypp)){
        $adminofcity_img = "/hemsehrimorg/tools/".$fileDestPath_adminofcitypp;

        $query = $db->prepare("UPDATE adminofcity SET adminofcity_img =? WHERE adminofcity_username IN ('$adminofcity_username')");
        $add_data = $query->execute([$adminofcity_img]);
        if($add_data){
            echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
            header("Refresh:0; /hemsehrimorg/adminofcity/settings.php");
    
        }else{
            echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
            header('Refresh:0; /hemsehrimorg/adminofcity/settings.php');
        }
    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; /hemsehrimorg/adminofcity/settings.php');
    }

}


// ÜYE OLMAYAN KİŞİLERDEN ADMİNE MAİL GÖNDERME İŞLEMİ //
if(isset($_POST['add_nonmember_message'])){
    $nonmember_name = $_POST["nonmember_name"];
    $nonmember_surname = $_POST["nonmember_surname"];
    $nonmember_mail = $_POST["nonmember_mail"];
    $nonmember_message = $_POST["nonmember_message"];

    $nonmember_name = Transliterator::create('tr-title')->transliterate($nonmember_name);
    $nonmember_surname = Transliterator::create('tr-upper')->transliterate($nonmember_surname);

    $query = $db->prepare('INSERT INTO nonmember SET nonmember_name =?, nonmember_surname =?, nonmember_mail =?, nonmember_message =?');
    $add_data = $query->execute([$nonmember_name, $nonmember_surname, $nonmember_mail, $nonmember_message]);
    if($add_data){
        echo "<script>alert('İşleminiz Başarıyla Gerçekleştirilmiştir.');</script>";
        header("Refresh:0; /hemsehrimorg/index.php");

    }else{
        echo "<script>alert('Bir Hata Oluştu. Tekrar Deneyiniz...');</script>";
        header('Refresh:0; /hemsehrimorg/index.php');
    }
}





















?>