<?php
session_start();
$member_username = $_SESSION['member_username'];

include('tools/connect_db.php');
include('session-query.php');
include('session_message-query.php');
include('session_announce-query.php');
include('session_countCities-query.php');
include('cities-query1.php');
include('cities-query2.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lightbox.min.css">
    <script type="text/javascript" src="js/lightbox-plus-jquery.min.js"></script>
    <title>hemsehrim.org | Şehirler</title>
    <link href="/hemsehrimorg/tools/img/hemsehrimorg.png" rel="icon">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark mb-4" style="background-color:#6777ef">
        <a href="index.php" class="navbar-brand"><img src="/hemsehrimorg/tools/img/hemsehrimorg.png" alt="logo" class="img-fluid" width="50px"></a>
        <strong><i><a href="index.php" class="navbar-brand" style="font-size:x-large; font-weight: bolder;">hemsehrim.org</a></i></strong>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#responsive"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse ml-3" id="responsive" style="font-size:medium; font-weight:400;">
            <ul class="navbar navbar-nav mr-auto text-capitalize justify-content-center">
                <li class="nav-item"><a href="index.php" class="nav-link">Ana Sayfa</a></li>
                <li class="nav-item"><a href="notice_event.php" class="nav-link">Duyuru ve Etkinlikler</a></li>
                <li class="nav-item"><a href="cities.php" class="nav-link active">Şehirler</a></li>
            </ul>
        </div>
        <a href="#modalview_message" class="nav-link ml-4" data-toggle="modal" style="color:#CBE4F2;font-size:22px;"><i class="fa fa-envelope d-none d-md-block"></i></a> 
        <a href="#modalview_announce" class="nav-link ml-5 mr-5" data-toggle="modal" style="color:#CBE4F2;font-size:22px;"><i class="fa fa-bullhorn d-none d-md-block"></i></a> 
        <div class="btn-group dropleft pr-5">
          <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="/hemsehrimorg/tools/img/hemsehrimorg.png" alt="" class="rounded-circle" width="32px" height="32px"></button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="settings.php">Kişisel Bilgiler</a>
            <a class="dropdown-item" href="password.php">Şifre Değişikliği</a>
            <a class="dropdown-item" href="request_from_admin.php">Talep Bildir</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Çıkış
            </a>
          </div>
        </div>
        
    </nav>
    <div class="modal fade" id="modalview_message">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title h4">Mesajlar</div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <ul class="list-unstyled">
                        <a href="#" class="text-decoration-none">
                            <li class="media hover-media">
                                <div class="media-body text-dark mr-3 ml-3">
                                <?php foreach($messageList as $message){?>
                                    <img src="<?= $message->admin_img ?>" alt="img" width="60px" height="60px" class="rounded-circle mr-3 d-inline">
                                    <h5 class="media-header mt-3 d-inline"><strong><?= "@".$message->admin_username?></strong></h5>
                                    <p class="media-title mt-2" style="text-align:center"><i><b><?= $message->admintomember_message_title ?></b></i></p>
                                    <p class="media-text" style="text-indent: 30px; text-align:justify"><?= $message->admintomember_message_content ?></p>
                                    <p class="media-text" style="text-align: right;"><i><b><?= $message->admintomember_message_registerDate ?></b></i></p> 
                                    <hr class="mt-5 pb-5">
                                <?php } ?>
                                </div>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalview_announce">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title h4">Duyurular</div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <ul class="list-unstyled">
                        <a href="#" class="text-decoration-none">
                            <li class="media hover-media">
                                <div class="media-body text-dark mr-3 ml-3">
                                <?php foreach($announceList as $announce){?>
                                    <img src="<?= $announce->admin_img ?>" alt="img" width="60px" height="60px" class="rounded-circle mr-3 d-inline">
                                    <h5 class="media-header mt-3 d-inline"><strong><?= "@".$announce->admin_username?></strong></h5>
                                    <p class="media-title mt-2" style="text-align:center"><i><b><?= $announce->admintomember_announce_title ?></b></i></p>
                                    <p class="media-text" style="text-indent: 30px; text-align:justify"><?= $announce->admintomember_announce_content ?></p>
                                    <p class="media-text" style="text-align: right;"><i><b><?= $announce->admintomember_announce_registerDate ?></b></i></p>
                                    <hr class="mt-5 pb-5">
                                <?php } ?>
                                </div>
                            </li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="left-column">
                    <?php foreach($sessionMember as $member){?>
                    <div class="card card-left1 mb-4" >
                        <div class="card-body text-center ">
                            <img src="<?= $member->member_img?>" alt="img" style="width: 120px;" class="rounded-circle mt-3">
                            <h5 class="card-title mt-3"><?= $member->member_name." ".$member->member_surname?></h5>
                            <h6 class="card-title"><?= "@".$member->member_username?></h6>
                    <?php } ?>
                            <ul class="list-unstyled nav justify-content-center">
                               <a href="#" class="text-dark text-decoration-none"> <li class="nav-item mt-4">Takip Ettiği Şehir <br> 
                            <?php foreach($countCities as $count){?>
                                <strong><?= $count->sehir_sayisi?></strong>
                                </li></a>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-9 mb-5 pb-5">
                <div class="card mb-4">
                    <div class="table-responsive p-3">
                        <h1 class="mb-5 mt-3 text-center">Yeni Bir Şehir Takip Et</h1>
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width:20%; text-align:center;">Şehir Resmi</th>
                                    <th style="width:20%;">Şehir Adı</th>
                                    <th style="width:20%;">Şehir Kullanıcı Adı</th>
                                    <th style="width:20%; text-align:center;">Takip Et</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($city_list as $city){?>
                                <tr>
                                    <td style="text-align:center; width:150px;"><img src="<?= $city->city_img ?>" style="width:50px; height:50px;"></td>
                                    <td><?= $city->city_name ?></td>
                                    <td><?= "@".$city->city_username ?></td>
                                    <td style="text-align:center; width:150px;"><a href="apply.php?cities_cityUsername=<?= $city->city_username ?>" class="btn btn-success text-white">Takip Et</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="table-responsive p-3">
                        <h1 class="mb-5 mt-3 text-center">Takipten Çık</h1>
                        <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                            <thead class="thead-light">
                                <tr>
                                    <th style="width:20%; text-align:center;">Şehir Resmi</th>
                                    <th style="width:20%;">Şehir Adı</th>
                                    <th style="width:20%;">Şehir Kullanıcı Adı</th>
                                    <th style="width:20%; text-align:center;">Takipten Çık</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($member_city_list as $m_city){?>
                                <tr>
                                    <td style="text-align:center; width:150px;"><img src="<?= $m_city->city_img ?>" style="width:50px; height:50px;"></td>
                                    <td><?= $m_city->city_name ?></td>
                                    <td><?= "@".$m_city->city_username ?></td>
                                    <td style="text-align:center; width:150px;"><a href="delete.php?cities_memberCityID=<?= $m_city->member_city_id ?>" class="btn btn-danger text-white">Takipten Çık</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12">
                <footer class="bg-light text-center text-lg-start">
                  <!-- Copyright -->
                  <div class="text-center p-3" style="font-weight: bold; background-color: rgba(0, 0, 0, 0.2);">
                    <span>Copyright &copy; <script> document.write(new Date().getFullYear()); </script> | Developed by
                        <b><a href="https://www.linkedin.com/in/hakankumas/" target="_blank">Hakan KUMAŞ</a></b>
                    </span>
                  </div>
                  <!-- Copyright -->
                </footer>
            </div>
            <!-- Modal Logout -->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
              aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Çıkış yapmak istediğinizden emin misiniz?</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">İptal</button>
                    <a href="out.php" class="btn btn-primary">Çıkış</a>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>

    <script>
        lightbox.option({
        })
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>