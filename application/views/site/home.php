<?php
$x = new TopLibrary();
?>

<!-- box utama -->
<?php
$x->content();
?>
<div class="header-brand">
  <div class="header-brand-caption">
    <h1>Selamat Datang</h1>
    <h2>Di Aplikasi
      <img src="<?php echo ASSET; ?>img/eizin2.png" alt="" style="width:100px;margin-top:-8px">
    </h2>
  </div>
  <!-- <a href="#" class="btn btn-primary">
    <i class="fa fa-angle-double-down"></i>
  </a> -->
</div>

<div class="container">
  <div class="" style="margin-top:30px;">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">IZIN BELAJAR</h3>
        </div>
        <div class="box-body text-justify">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        <div class="box-footer">


          <a href="<?php echo URL; ?>ib" class="btn btn-default">
            <i class="fa fa-list"></i> Lihat
          </a>

          <a href="<?php echo URL; ?>ib/tambah" class="btn btn-primary">
            <i class="fa fa-pencil-square"></i> Buat
          </a>

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">SURAT KETERANGAN LULUS KULIAH</h3>
        </div>
        <div class="box-body text-justify">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
        <div class="box-footer">


          <a href="<?php echo URL; ?>sklk" class="btn btn-default">
            <i class="fa fa-list"></i> Lihat
          </a>

          <a href="<?php echo URL; ?>sklk/tambah" class="btn btn-primary">
            <i class="fa fa-pencil-square"></i> Buat
          </a>

        </div>
      </div>
  </div>
</div>
<?php
$x->endcontent();
 ?>
