<?php
session_start();
include('tools/connect_db.php');

$city_username = $_SESSION['city_username'];

$query = $db->prepare('SELECT * FROM postofcity WHERE city_username =?');
$query->execute([$city_username]);
$postofcity = $query->fetchAll(PDO::FETCH_OBJ);


?>
<a href="index.php">Ana Sayfa</a>
<br>
<hr>
<a href="out.php">Çıkış</a>
<br>
<hr>

<!doctype html>
<html lang="en">
<head>
  <title>hemsehrim.org</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
  <header>
  </header>
  <main>
    <div class="container-fluid m-5">
      <div class="row">
        <div class="col-12">
          <table class="table table-striped">
            <tr>
              <th>Başlık</th>
              <th>İçerik</th>
              <th>Görsel</th>
            </tr>
            <?php foreach($postofcity as $poc){?>
            <tr>
              <td style="width: 450px;"><?= $poc->postofcity_title?></td>
              <td style="width: 450px;"><?= $poc->postofcity_content?></td>
              <td style="width: 450px;"><?= $poc->postofcity_img?></td>
            </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>

  
  </main>
  <footer>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>