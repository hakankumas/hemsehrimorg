<link href="/hemsehrimorg/tools/img/hemsehrimorg.png" rel="icon">
<title>hemsehrim.org | Silme</title>

<?php
include("tools/connect_db.php");


// GEZİ ÖNERİSİ POSTUNU SİL //
if(isset($_GET["postofcityDelete_postofcityID"])){
    $query = $db->prepare('DELETE FROM postofcity WHERE postofcity_id=?');
    $resault = $query->execute([$_GET['postofcityDelete_postofcityID']]);
    if($resault){
        echo "<script>alert('Gezi Önerisi Postu Silme İşleminiz Gerçekleştirildi!')</script>";
        header("refresh:0; lookat_post.php");
    }else{
        echo 0;
    }
}


// DUYURU VE ETKİNLİKLER POSTUNU SİL //
if(isset($_GET["noticeofcityDelete_noticeofcityID"])){
    $query = $db->prepare('DELETE FROM noticeofcity WHERE noticeofcity_id=?');
    $resault = $query->execute([$_GET['noticeofcityDelete_noticeofcityID']]);
    if($resault){
        echo "<script>alert('Duyuru ve Etkinlikler Postu Silme İşleminiz Gerçekleştirildi!')</script>";
        header("refresh:0; lookat_notice.php");
    }else{
        echo 0;
    }
}



















?>