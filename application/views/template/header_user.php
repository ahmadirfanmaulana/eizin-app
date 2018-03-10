<?php
$x = new TopLibrary();
$user_level = $_SESSION['level'];
if ($user_level == "admin1" || $user_level == "admin2") {
  $user_url = ADMIN;
}
else{
  $user_url = URL;
}
 ?>
<header class="main-header">
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <!-- Logo -->
        <a href="<?php echo URL; ?>" class="navbar-brand" style="padding-top:2px">
          <!-- logo for regular state and mobile devices -->
            <img src="<?php echo ASSET; ?>img/eizin2.png" alt="" style="width:80px;">
        </a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <?php

          // tampilkan menu
          for ($i=0; $i <count($data) ; $i++) {
            if ($data[$i] == strtoupper($active)) {
              ?>
              <li class="active">
                <a href="<?php echo $user_url.$link[$i]; ?>">
                  <i class="fa fa-<?php echo $icon[$i]; ?>"></i>
                    <span><?php echo $data[$i]; ?></span>
                </a>
              </li>
              <?php
            }
            else{
              ?>
              <li>
                <a href="<?php echo $user_url.$link[$i]; ?>">
                  <i class="fa fa-<?php echo $icon[$i]; ?>"></i>
                  <span><?php echo $data[$i]; ?></span>
                </a>
              </li>
              <?php
            }
          }

           ?>
        </ul>
        <!-- <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
          </div>
        </form> -->
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle row_notif" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
                <?php
                $row_notif_D = $x->db()->query("select * from tb_notif where notif_to_user_id = $_SESSION[id] and notif_status = 'delive'")->num_rows;
                if ($row_notif_D != 0) {
                  ?>
                  <span class="label bg-yellow">
                    <?php echo $row_notif_D; ?>
                  </span>
                  <?php
                }
                 ?>
            </a>
            <ul class="dropdown-menu list-notif">

            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php
              if ($_SESSION['level'] != "admin1" && $_SESSION['level'] != "admin2") {
                $sql = $x->db()->query("select * from tb_dinas inner join tb_users on tb_dinas.dinas_id = tb_users.user_dinas_id where user_id = $_SESSION[id]")->fetch_assoc();
                ?>
                <div class="user-image" style="background-image:url('<?php echo URL; ?>upload/img/dinas/<?php echo $sql['dinas_photo']; ?>');background-size:cover;background-position:center">

                </div>
                <?php
              }
              else{
                ?>
                <div class="user-image" style="background-image:url('<?php echo ASSET; ?>img/logo.jpg');background-size:cover;background-position:center;background-position:center;">

                </div>
                <?php
              }
               ?>

              <span class="hidden-xs">
                <?php
                if ($_SESSION['level'] != "admin1" && $_SESSION['level'] != "admin2") {
                  $sql = $x->db()->query("select * from tb_dinas inner join tb_users on tb_dinas.dinas_id = tb_users.user_dinas_id where user_id = $_SESSION[id]")->fetch_assoc();
                  echo $sql['dinas_nama'];
                }
                else{
                  $sql = $x->db()->query("select * from tb_users where user_id = $_SESSION[id]")->fetch_assoc();
                  echo $sql['user_username'];
                }
                 ?>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                 <p>
                  <?php
                  if ($_SESSION['level'] != "admin1" && $_SESSION['level'] != "admin2") {
                    $sql = $x->db()->query("select * from tb_dinas inner join tb_users on tb_dinas.dinas_id = tb_users.user_dinas_id where user_id = $_SESSION[id]")->fetch_assoc();
                    ?>
                    <div class="img-circle img-thumbnail" style="height:80px;width:80px;background-image:url('<?php echo URL; ?>upload/img/dinas/<?php echo $sql['dinas_photo']; ?>');background-size:cover;background-position:center;">

                    </div>
                    <?php
                  }
                  else{
                    $sql = $x->db()->query("select * from tb_users where user_id = $_SESSION[id]")->fetch_assoc();
                    ?>
                    <div class="img-circle img-thumbnail" style="height:80px;width:80px;background-image:url('<?php echo ASSET; ?>img/logo.jpg');background-size:cover;background-position:center;">

                    </div>
                    <?php
                  }
                   ?>

                   <p>
                     <?php
                       if ($_SESSION['level'] != "admin1" && $_SESSION['level'] != "admin2") {
                         $sql = $x->db()->query("select * from tb_dinas inner join tb_users on tb_dinas.dinas_id = tb_users.user_dinas_id where user_id = $_SESSION[id]")->fetch_assoc();
                         echo $sql['dinas_nama'];
                       }
                       else{
                         $sql = $x->db()->query("select * from tb_users where user_id = $_SESSION[id]")->fetch_assoc();
                         echo $sql['user_username'];
                       } ?>
                    <small><?php echo "Bergabung pada ".$x->format_tanggal($sql['user_entri']); ?></small>
                   </p>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo $user_url; ?>profile" class="btn btn-default btn-flat">
                    <i class="fa fa-user-circle"></i> Profil
                  </a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo URL; ?>logout" class="btn btn-default btn-flat">
                     Keluar <i class="fa fa-sign-in"></i>
                  </a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="<?php echo $user_url; ?>tentang"><i class="fa fa-question-circle"></i></a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</header>
<!-- Full Width Column -->
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
    <?php
    if (count($brand) > 0) {
      ?>
      <div class="jumbotron" style="border-bottom:1px solid #ddd; background-image:url('<?php echo ASSET; ?>img/hexagon.png');background-color:rgb(0, 200, 80);border-radius:0px;background-attachment:fixed;">
        <h2 class="text-center" style="margin-bottom:0px">

          <span style="font-size:50px;letter-spacing:5px;text-shadow:0px 1px 0px #f3f3f3;color:#fff;">
              <?php
              for ($i=0; $i < count($data); $i++) {
                if (strtoupper($brand['parent']) == $data[$i]) {
                  ?>
                  <i class="fa fa-<?php echo $icon[$i]; ?>"></i>
                  <?php
                }
              }
               ?>
              <?php echo strtoupper($brand['parent']); ?></span>
        </h2>
        <?php
        if ($brand['child'] != null) {
          ?>
          <div class="text-center" >
            <hr style="margin-bottom:0px;width:100px;border:3px solid #f3f3f3;display:inline-block;">
            <h2 style="display:inline-block;color:#fff;transform:translate(0px,6px);">
            <i class="fa fa-black-tie"></i>
            </h2>
            <hr style="margin-bottom:0px;width:100px;border:3px solid #f3f3f3;display:inline-block;">
          </div>
          <?php
        }
         ?>
        <h3 class="text-center" style="font-size:30px;margin-top:0px; padding-top:20px;letter-spacing:5px;color:#fff;text-shadow:0px 1px 0px #f3f3f3">
          <?php echo strtoupper($brand['child']); ?>
        </h3>
      </div>
    </div>
      <?php
    }
     ?>
