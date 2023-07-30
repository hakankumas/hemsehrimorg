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
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-6">
          <form action="process.php" method="post" class="form-group" enctype="multipart/form-data">
            <div class="mb-3">
              <label class="form-label">Başlık</label>
              <input type="text" class="form-control" name="postofcity_title" id="postofcity_title" placeholder="" autofocus>
            </div>
            <div class="mb-3">
              <label class="form-label">Açıklama</label>
              <input type="text" class="form-control" name="postofcity_content" id="postofcity_content" placeholder="">
            </div>
            <div class="mb-3">
              <label class="form-label">Görsel</label>
              <input type="file" class="form-control" name="postofcity_img" id="postofcity_img" placeholder="" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary" name="publish_post" id="publish_post">Yayınla</button>
          </form>
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