<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="hemsehrim.org | Ana Sayfa">
    <meta name="author" content="Devcrud">
    <title>hemsehrim.org | Admin Girişi</title>
    <link href="/hemsehrimorg/tools/img/hemsehrimorg.png" rel="icon">
    <link rel="stylesheet" href="tools/assets/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="tools/assets/css/meyawo.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    <nav class="custom-navbar" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a href="index.php"><img src="tools/img/hemsehrimorg.png" style="width:80px;"></a> 
            <a class="logo pt-2 ml-3" href="index.php">hemsehrim.org</a>
            <ul class="nav">
                <li class="item">
                    <a class="link" href="index.php">Ana Sayfa</a>
                </li>
                <li class="item ml-md-3">
                    <div class="dropdown d-inline-block">
                        <button class="btn btn-danger dropdown-toggle rounded-pill" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                           >Hesap Oluştur</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                           <a class="dropdown-item" href="create-member.php">Üye</a>
                        </div>
                    </div>
                </li>
                <li class="item ml-md-3">
                    <div class="dropdown d-inline-block">
                        <button class="btn btn-primary dropdown-toggle rounded-pill" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            >Giriş Yap</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                           <a class="dropdown-item" href="login-admin.php">Admin</a>
                           <a class="dropdown-item" href="login-adminofcity.php">Şehir Yöneticisi</a>
                           <a class="dropdown-item" href="login-member.php">Üye</a>
                        </div>
                    </div>
                </li>
            </ul>
            <a href="javascript:void(0)" id="nav-toggle" class="hamburger hamburger--elastic">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </a>
        </div>
    </nav>
    <section class="header" id="home">
        <div class="container text-center">
            <form action="/hemsehrimorg/tools/process-admin.php" method="POST" class="contact-form col-md-10 col-lg-8 m-auto bg-light rounded p-5">
                <h1 class="section-title mb-5 bg-light">Admin Girişi</h1>
                <div class="form-row">
                    <label for="admin_username">Kullanıcı Adınız</label>
                    <div class="form-group col-sm-12 mb-4">
                        <input type="text" name="admin_username" id="admin_username" size="50" class="form-control" placeholder="" required autofocus>
                    </div>

                    <label for="admin_password">Şifreniz</label>
                    <div class="form-group col-sm-12 mb-3">
                        <input type="password" name="admin_password" id="admin_password" size="50" class="form-control" placeholder="" required>
                    </div>

                    <div class="form-group col-sm-12">
                        <input type="submit" name="admin_login" class="btn btn-lg btn-primary rounded">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div class="container">
        <footer class="footer">
            <p class="mb-0">Copyright
                <script>document.write(new Date().getFullYear())</script>
                <a>&copy;</a>
                <a> Powered by </a>
                <a href="https://www.linkedin.com/in/hakankumas/" target="_blank">Hakan KUMAŞ</a>
            </p>
            <div class="social-links text-right m-auto ml-sm-auto">
                <a href="https://www.linkedin.com/in/hakankumas/" class="link" target="_blank"><i class="ti-linkedin"></i></a>
                <a href="https://github.com/hakankumas" class="link" target="_blank"><i class="ti-github"></i></a>
            </div>
        </footer>
    </div>
    <script src="tools/assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="tools/assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <script src="tools/assets/vendors/bootstrap/bootstrap.affix.js"></script>
    <script src="tools/assets/js/meyawo.js"></script>
</body>
</html>