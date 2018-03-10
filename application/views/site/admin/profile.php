<?php
$x = new TopLibrary();
?>

<!-- box utama -->
<?php
foreach ($data_user as $data) {
$x->content();
$x->column('3');
$x->box('type','success');
  $x->box('title','MENU');
  $x->box('body','no-padding');
    $x->navpills();
      $x->navpills(array('data'=>'Profil','link'=>'profile','active'=>isset($menu_profile)?$menu_profile:null,'icon'=>'user-circle-o'));
      $x->navpills(array('data'=>'Ganti Password','link'=>'ganti-password','icon'=>'lock','active'=>isset($menu_change)?$menu_change:null));
    $x->endnavpills();
  $x->endbox('body'); 
$x->endbox();
$x->endcolumn();

$x->column('9');
$x->box('type','success');
  $x->box('title','PROFIL');
  $x->box('body');
  ?>
   <form class="" action="" method="post">
     <?php
     if (!empty($data_update)) {
       if ($data_update == "berhasil") {
         echo $x->alert_success('Sukses','Berhasil Diupdate');
       }
       else {
         echo $x->alert_success('Gagal','Gagal Diupdate');
       }
     }
      ?>
     <div class="col-md-4">
       <img src="<?php echo ASSET; ?>img/logo.jpg" alt="" style="width:100%">
     </div>
     <div class="col-md-8">
       <div class="form-group">
         <label for="">Username : </label>
         <input type="text" name="user_username" value="<?php echo $data->user_username; ?>" placeholder="Username" class="form-control">
       </div>
       <div class="form-group">
         <label for="">Level : </label>
         <input type="text" name="" value="<?php echo $data->user_level; ?>" placeholder="Username" class="form-control" readonly>
       </div>
       <div class="form-group">
         <label for="">Dientri : </label>
         <input type="text" name="" value="<?php echo $x->format_tanggal($data->user_entri); ?>" placeholder="Username" class="form-control" readonly>
       </div>
     </div>

  <?php
  $x->endbox('body');
  $x->box('footer');
  ?>
  <!-- footer -->
  <div class="col-md-8 col-md-offset-4">
    <button type="submit" name="button" value="button" class="btn btn-primary">
      <i class="fa fa-save"></i> Update
    </button>
  </div>
  </form>
  <?php
  $x->endbox('footer');
$x->endbox();
$x->endcontent();
}
 ?>
