<?php
session_start();
$admin_username = $_SESSION['admin_username'];

include("tools/connect_db.php");
include("session-query.php");
include('session_message_adminofcity-query.php');
include('session_message_member-query.php');

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
  <title>hemsehrim.org | Şifre Değişikliği</title>
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
        <div class="sidebar-brand-text mx-3 mt-1">hemsehrim.org</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fa fa-home ml-2 mr-2"></i>
          <span class="mx-1 px-1">Ana Sayfa</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">İŞLEMLER</div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCity"
          aria-expanded="true" aria-controls="collapseCity">
          <i class="fa fa-solid fa-city ml-2 mr-2"></i>
          <span class="mx-2">Şehir</span>
        </a>
        <div id="collapseCity" class="collapse" aria-labelledby="headingCity" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Şehir</h6>
            <a class="collapse-item" href="add_city.php">Ekle</a>
            <a class="collapse-item" href="edit_city.php">Düzenle</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdminofcity"
          aria-expanded="true" aria-controls="collapseAdminofcity">
          <i class="fa fa-user ml-2 mr-2"></i>
          <span class="mx-2 px-1">Şehir Yöneticisi</span>
        </a>
        <div id="collapseAdminofcity" class="collapse" aria-labelledby="headingAdminofcity" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Şehir Yöneticisi</h6>
            <a class="collapse-item" href="add_adminofcity.php">Ekle</a>
            <a class="collapse-item" href="edit_adminofcity.php">Düzenle</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMember"
          aria-expanded="true" aria-controls="collapseMember">
          <i class="fa fa-users ml-2 mr-2"></i>
          <span class="mx-1 px-1">Üye</span>
        </a>
        <div id="collapseMember" class="collapse" aria-labelledby="headingMember" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Üye</h6>
            <a class="collapse-item" href="add_member.php">Ekle</a>
            <a class="collapse-item" href="edit_member.php">Düzenle</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnnounce"
          aria-expanded="true" aria-controls="collapseAnnounce">
          <i class="fa fa-bullhorn ml-2 mr-2"></i>
          <span class="mx-1 px-1">Duyuru</span>
        </a>
        <div id="collapseAnnounce" class="collapse" aria-labelledby="headingAnnounce" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Şehir Yönetici</h6>
            <a class="collapse-item" href="add_announce_adminofcity.php">Ekle</a>
          </div>
        </div>
        <div id="collapseAnnounce" class="collapse" aria-labelledby="headingAnnounce" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Üye</h6>
            <a class="collapse-item" href="add_announce_member.php">Ekle</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMessage"
          aria-expanded="true" aria-controls="collapseMessage">
          <i class="fa fa-envelope ml-2 mr-2"></i>
          <span class="mx-1 px-1">Mesaj</span>
        </a>
        <div id="collapseMessage" class="collapse" aria-labelledby="headingMessage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Şehir Yönetici</h6>
            <a class="collapse-item" href="add_message_adminofcity.php">Mesaj Yaz</a>
          </div>
        </div>
        <div id="collapseMessage" class="collapse" aria-labelledby="headingMessage" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Üye</h6>
            <a class="collapse-item" href="add_message_member.php">Mesaj Yaz</a>
          </div>
        </div>
      </li>
      <br>
      <hr class="sidebar-divider">
      <br>
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
            <a href="#modalview_message_adminofcity" class="nav-link mr-3 mt-3" data-toggle="modal" style="color:#CBE4F2; font-size:large"><i class="fa fa-envelope d-none d-md-block"> Şehir Yöneticisi</i></a> 
            <a href="#modalview_message_member" class="nav-link ml-3 mr-3 mt-3" data-toggle="modal" style="color:#CBE4F2; font-size:large"><i class="fa fa-envelope d-none d-md-block"> Üye</i></a> 
            <li class="nav-item dropdown no-arrow">
            <?php foreach ($admin_session_info as $admin){?>
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="<?= $admin->admin_img ?>" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small"><?= "@".$admin->admin_username ?></span>
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
        <div class="modal fade" id="modalview_message_adminofcity">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title h4">Şehir Yöneticilerinden Gelen Mesajlar</div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body p-5" style="overflow-x: hidden;">
                        <ul class="list-unstyled">
                            <a href="#" class="text-decoration-none">
                                <li class="media hover-media">
                                    <div class="media-body text-dark mr-3 ml-3" style="width: 200px;">
                                    <?php foreach($message_adminofcity as $message_a){?>
                                        <img src="<?= $message_a->adminofcity_img ?>" alt="img" width="60px" height="60px" class="rounded-circle mr-3 d-inline">
                                        <h5 class="media-header mt-3 d-inline"><strong><?= "@".$message_a->adminofcity_username?></strong></h5>
                                        <p class="media-title mt-4" style="text-align:center"><i><b><?= $message_a->adminofcitytoadmin_title ?></b></i></p>
                                        <p class="media-text" style="text-indent: 30px; text-align:justify"><?= $message_a->adminofcitytoadmin_content ?></p>
                                        <p class="media-text" style="text-align: right; font-size: small;"><i><b><?= $message_a->adminofcitytoadmin_registerDate ?></b></i></p> 
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
        <div class="modal fade" id="modalview_message_member">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title h4">Üyelerden Gelen Mesajlar</div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body p-5" style="overflow-x: hidden;">
                        <ul class="list-unstyled">
                            <a href="#" class="text-decoration-none">
                                <li class="media hover-media">
                                    <div class="media-body text-dark mr-3 ml-3" style="width: 200px;">
                                    <?php foreach($message_member as $message_m){?>
                                        <img src="<?= $message_m->member_img ?>" alt="img" width="60px" height="60px" class="rounded-circle mr-3 d-inline">
                                        <h5 class="media-header mt-3 d-inline"><strong><?= "@".$message_m->member_username?></strong></h5>
                                        <p class="media-title mt-4" style="text-align:center"><i><b><?= $message_m->membertoadmin_title ?></b></i></p>
                                        <p class="media-text" style="text-indent: 30px; text-align:justify"><?= $message_m->membertoadmin_content ?></p>
                                        <p class="media-text" style="text-align: right; font-size: small;"><i><b><?= $message_m->membertoadmin_registerDate ?></b></i></p>
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
            <h1 class="h3 mb-0 text-gray-800">Şifre Değişikliği</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Ana Sayfa</li>
              <li class="breadcrumb-item">Şifre Değişikliği</li>
            </ol>
          </div>

          <div class="row">
            <div class="col-lg-6">
              <div class="alert alert-danger bg-danger text-white alert-dismissible" role="alert">
                  <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  <strong>Karmaşık / Güçlü Bir Şifre Koymanızı Öneririz!</strong>
              </div>
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Bilgileri Doldurunuz!</h6>
                </div>
                <div class="card-body">
                  <form action="process.php" method="POST">
                    <div class="form-group">
                        <label for="now_admin_password">Mevcut Şifre</label>
                        <input type="text" class="form-control" id="now_admin_password" name="now_admin_password" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="new_admin_password">Yeni Şifre</label>
                        <input type="text" class="form-control" id="new_admin_password" name="new_admin_password" required>
                    </div>
                    <div class="form-group">
                        <label for="new2_admin_password">Tekrardan Yeni Şifre</label>
                        <input type="text" class="form-control" id="new2_admin_password" name="new2_admin_password" required>
                    </div>
                    <button type="submit" class="btn btn-lg btn-success btn-icon-split mt-3" name="update_admin_password">
                        <span class="icon text-white-100"><i class="fas fa-check"></i></span>
                        <span class="text">Tamamla</span>
                    </button>
                  </form>
                </div>
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

</body>

</html>