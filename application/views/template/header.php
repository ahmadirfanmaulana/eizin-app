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

  <!-- Logo -->
  <a href="<?php if($_SESSION['level']=="dinas"){echo URL;}else{echo ADMIN;} ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>E</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>
      <img src="<?php echo ASSET; ?>img/eizin2.png" alt="" style="width:80px;">
    </b></span>
  </a>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Notifications: style can be found in dropdown.less -->
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
                     } ?> - <?php echo $_SESSION['level']; ?>
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

  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <?php
        if ($_SESSION['level'] != "admin1" && $_SESSION['level'] != "admin2") {
          $sql = $x->db()->query("select * from tb_dinas inner join tb_users on tb_dinas.dinas_id = tb_users.user_dinas_id where user_id = $_SESSION[id]")->fetch_assoc();
          ?>
          <div class="img-circle img-thumbnail" style="height:40px;width:40px;background-image:url('<?php echo URL; ?>upload/img/dinas/<?php echo $sql['dinas_photo']; ?>');background-size:cover;background-position:center;">

          </div>
          <?php
        }
        else{
          $sql = $x->db()->query("select * from tb_users where user_id = $_SESSION[id]")->fetch_assoc();
          ?>
          <div class="img-circle img-thumbnail" style="height:40px;width:40px;background-image:url('<?php echo ASSET; ?>img/logo.jpg');background-size:cover;background-position:center;">

          </div>
          <?php
        }
         ?>
      </div>
      <div class="pull-left info">
        <p><?php
        if ($_SESSION['level'] != "admin1" && $_SESSION['level'] != "admin2") {
          $sql = $x->db()->query("select * from tb_dinas inner join tb_users on tb_dinas.dinas_id = tb_users.user_dinas_id where user_id = $_SESSION[id]")->fetch_assoc();
          echo $sql['dinas_nama'];
        }
        else{
          $sql = $x->db()->query("select * from tb_users where user_id = $_SESSION[id]")->fetch_assoc();
          echo $sql['user_username'];
        }
         ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU NAVIGASI</li>
      <?php

      // tampilkan menu
      for ($i=0; $i <count($data) ; $i++) {
        if ($data[$i] == $active) {
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
       <li class="header">MENU LAIN</li>
       <li class="<?php if($active == "Profile"){echo "active";} ?>">
         <a href="<?php echo $user_url; ?>profile">
           <i class="fa fa-user-circle"></i> <span>Profil</span>
         </a>
       </li>
       <li>
         <a href="<?php echo URL; ?>logout">
           <i class="fa fa-sign-out"></i> <span>Keluar</span>
         </a>
       </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
<div class="content-wrapper">
