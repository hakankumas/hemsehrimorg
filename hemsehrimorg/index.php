<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="hemsehrim.org | Ana Sayfa">
    <meta name="author" content="Devcrud">
    <title>hemsehrim.org | Ana Sayfa</title>
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
                    <a class="link" href="#home">Ana Sayfa</a>
                </li>
                <li class="item">
                    <a class="link" href="#about">Hakkımızda</a>
                </li>
                <li class="item">
                    <a class="link" href="#service">Hizmetlerimiz</a>
                </li>
                <li class="item">
                    <a class="link" href="#contact">İletişim</a>
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
    <header id="home" class="header">
        <div class="overlay"></div>
        <div class="header-content container">
            <h1 class="header-title">
                <span class="up">Merhaba</span>
                <span class="down">hemşehrim!</span>
            </h1>
            <a class="btn btn-primary" href="#about">Keşfetmeye Başla!</a>
        </div>
    </header>
    <section class="section pt-0" id="about">
        <div class="container text-center">
            <div class="about">
                <div class="about-img-holder">
                    <img src="tools/assets/imgs/find.png" class="about-img" style="width:250px;"
                        alt="">
                </div>
                <div class="about-caption">
                    <h2 class="section-title mb-3">Hakkımızda</h2>
                        <p>Öncelikle merhaba, burada olduğun için hemsehrim.org ekibi olarak çok mutluyuz!
                        <br>
                        Sana kendimizi tanıtmak istiyoruz...
                        <br><br>
                        <strong>hemsehrim.org ile sistemimize kayıtlı tüm şehirleri keşfedebilme imkanına sahipsin.</strong> 
                        <br><br>
                        <i>Peki bu ne mi demek?</i>
                        <br><br>
                        hemsehrim.org'da kayıtlı olan tüm şehirler için güncel paylaşımlara yer verilmektedir.
                        <br>
                        Böylelikle takip ettiğin şehirlerden oluşan sana özgü bir timeline'ın oluşacak. Bu timeline ile birlikte sonsuz sayıda gezi önerisi alabilecek, duyurular kısmında ise şehirlerdeki önemli etkinliklerin duyurusunu da öğrenebileceksin!
                        <br>
                        <br>
                        <strong><i>Haydi şimdi hemsehrim.org'da şehirleri keşfetmeye başla!</i></strong>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="section" id="service">
        <div class="container text-center">
            <h6 class="section-title mb-6">Hizmetlerimiz</h6>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="service-card">
                        <div class="body">
                            <img src="tools/assets/imgs/scooter.svg "
                                alt=""
                                class="icon">
                            <h6 class="title">Gezi Önerisi</h6>
                            <p class="subtitle">Her bir şehir için en turistik mekanlarla ilgili gezi önerisi paylaşımları yapılmaktadır.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="service-card">
                        <div class="body">
                            <img src="tools/assets/imgs/analytics.svg "
                                alt=""
                                class="icon">
                            <h6 class="title">Etkinlik Duyuruları</h6>
                            <p class="subtitle">Her bir şehir için önemli etkinliklerin duyurularıyla ilgili paylaşımlar yapılmaktadır.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section" id="contact">
        <div class="container text-center">
            <h6 class="section-title mb-5">İletişim</h6>
            <form action="tools/process-admin.php" method="POST" class="contact-form col-md-10 col-lg-8 m-auto">
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <input type="text" name="nonmember_name" size="50" class="form-control" placeholder="Adınız" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <input type="text" name="nonmember_surname" size="50" class="form-control" placeholder="Soyadınız" required>
                    </div>
                    <div class="form-group col-sm-12">
                        <input type="email" name="nonmember_mail" class="form-control" placeholder="Mail Adresiniz" requried>
                    </div>
                    <div class="form-group col-sm-12">
                        <textarea name="nonmember_message" id="comment" rows="6" class="form-control" requried 
                            placeholder="İletinizi detaylı bir şekilde açıklayınız!"></textarea>
                    </div>
                    <div class="form-group col-sm-12 mt-3">
                        <input type="submit" name="add_nonmember_message" class="btn btn-lg btn-primary rounded">
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
                <a> Developed by </a>
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