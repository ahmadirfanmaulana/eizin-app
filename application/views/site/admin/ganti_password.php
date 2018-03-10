<?php
$x = new TopLibrary();
?>

<!-- box utama -->
<?php
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
         echo $x->alert_success('Sukses','Password Berhasil Diupdate');
       }
       else {
         echo $x->alert_danger('Gagal',$data_update);
       }
     }
      ?>
       <div class="form-group">
         <label for="">Passowrd Lama : </label>
         <input type="password" name="user_password" value="<?php echo isset($_POST['user_password'])?$_POST['user_password']:null; ?>" placeholder="Password Lama" class="form-control" required>
       </div>
       <div class="form-group">
         <label for="">Password Baru : </label>
         <input type="password" name="user_password_new" value="" placeholder="Password Baru" class="form-control" required>
       </div>
       <div class="form-group">
         <label for="">Ulangi Password Baru : </label>
         <input type="password" name="user_password_new_try" value="" placeholder="Ulangi Password Baru" class="form-control" required>
       </div>

  <?php
  $x->endbox('body');
  $x->box('footer');
  ?>
  <!-- footer -->
    <button type="submit" name="button" value="button" class="btn btn-primary">
      <i class="fa fa-save"></i> Ganti Password
    </button>
  </form>
  <?php
  $x->endbox('footer');
$x->endbox();
$x->endcontent();
 ?>
