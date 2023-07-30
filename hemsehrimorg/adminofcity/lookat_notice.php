<?php
session_start();

$adminofcity_username = $_SESSION['adminofcity_username'];
$city_username = $_SESSION['city_username'];

include('tools/connect_db.php');
include("session-query.php");
include('session_message-query.php');
include('session_announce-query.php');
include('lookat_notice-query1.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="/hemsehrimorg/tools/img/hemsehrimorg.png" rel="icon">
  <title>hemsehrim.org - Duyuru ve Etkinlikler</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <img src="/hemsehrimorg/tools/img/hemsehrimorg.png">
        </div>
        <div class="sidebar-brand-text mx-3">hemsehrim.org</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        İŞLEMLER
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Gezi Önerisi</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gezi Önerisi</h6>
            <a class="collapse-item" href="publish_post.php">Oluştur</a>
            <a class="collapse-item" href="lookat_post.php">Düzenle</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm" aria-expanded="true"
          aria-controls="collapseForm">
          <i class="fa fa-bullhorn"></i>
          <span>Duyuru ve Etkinlikler</span>
        </a>
        <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Duyuru ve Etkinlikler</h6>
            <a class="collapse-item" href="publish_notice.php">Oluştur</a>
            <a class="collapse-item" href="lookat_notice.php">Düzenle</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <a href="request_from_admin.php" class="nav-link mr-3 mt-3" style="color:#CBE4F2;font-size:22px;"><i class="fa fa-pen d-none d-md-block"></i></a> 
            <a href="#modalview_message" class="nav-link ml-3 mr-3 mt-3" data-toggle="modal" style="color:#CBE4F2;font-size:22px;"><i class="fa fa-envelope d-none d-md-block"></i></a> 
            <a href="#modalview_announce" class="nav-link ml-3 mr-3 mt-3" data-toggle="modal" style="color:#CBE4F2;font-size:22px;"><i class="fa fa-bullhorn d-none d-md-block"></i></a> 
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
            <?php foreach ($adminofcity_session_info as $session){?>
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="<?= $session->adminofcity_img ?>" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?= "@".$session->adminofcity_username ?></span>
              </a>
            <?php } ?>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="settings.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Kişisel Bilgiler
                </a>
                <a class="dropdown-item" href="password.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>Şifre Değişikliği
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Çıkış
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
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
                                        <p class="media-title mt-2" style="text-align:center"><i><b><?= $message->admintoadminofcity_message_title ?></b></i></p>
                                        <p class="media-text" style="text-indent: 30px; text-align:justify"><?= $message->admintoadminofcity_message_content ?></p>
                                        <p class="media-text" style="text-align: right;"><i><b><?= $message->admintoadminofcity_message_registerDate ?></b></i></p> 
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
                                        <p class="media-title mt-2" style="text-align:center"><i><b><?= $announce->admintoadminofcity_announce_title ?></b></i></p>
                                        <p class="media-text" style="text-indent: 30px; text-align:justify"><?= $announce->admintoadminofcity_announce_content ?></p>
                                        <p class="media-text" style="text-align: right; font-size: small; "><i><b><?= $announce->admintoadminofcity_announce_registerDate ?></b></i></p>
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
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Duyuru ve Etkinlikler</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Ana Sayfa</a></li>
              <li class="breadcrumb-item">Duyuru ve Etkinlikler</a></li>
              <li class="breadcrumb-item active" aria-current="page">Duyuru ve Etkinlikleri Düzenle</li>
            </ol>
          </div>
          <!-- Row -->
          <div class="row mb-5 pb-5">
            <div class="col-lg-12">
              <div class="card shadow mb-4 ml-5 mr-5">
                <form action="process.php" method="post"></form>
            <?php foreach($noticeofcity as $noc){?>
                <div class="card-header mt-5 ml-3 mr-3">
                  <h1 class="font-weight-bold text-primary mb-4" style="text-align: center;"><?= $noc->noticeofcity_title?></h1>
                  <img src="<?= $noc->noticeofcity_img?>" style="display: block; margin: auto; width:750px;">
                  <p class="ml-5 mr-5 mt-5 mb-5" style="display: block; margin: auto;  text-indent:50px;text-align:justify;"><?= $noc->noticeofcity_content?></p>
                  <a href="delete.php?noticeofcityDelete_noticeofcityID=<?= $noc->noticeofcity_id ?>"><button type="submit" name="noticeofcity_delete" style="display: block; margin: auto;" class="btn btn-lg btn-danger text-white pr-5 pl-5">Duyuru veya Etkinliği Sil</button></a>
                  <div class="mt-5" style="border-bottom:3px double black;width:99%;"></div>
                </div>
            <?php } ?>
              </div>
            </div>
          </div>
          <!--Row-->

          

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
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
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white mt-5 pt-5">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <script> document.write(new Date().getFullYear()); </script> - Developed by
              <b><a href="https://www.linkedin.com/in/hakankumas/" target="_blank">Hakan KUMAŞ</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>
</body>

</body>

</html>