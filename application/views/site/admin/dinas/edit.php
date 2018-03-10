<?php
$x = new TopLibrary();

$x->content();


  $x->column(12);
    $x->box('type','success');
      $x->box('title','Edit Dinas');
      $x->box('body');
      ?>

      <!-- data model -->
      <?php echo $data_model; ?>
      <!-- data model -->

       <form class="" action="" method="post" enctype="multipart/form-data">
         <?php
         foreach ($data_dinas as $data) {
           ?>
           <div class="form-group">
             <label for="">Nama Dinas</label>
             <input type="text" name="dinas_nama" value="<?php echo $data->dinas_nama; ?>" class="form-control" placeholder="Ketikan Nama Dinas" required>
           </div>
           <div class="form-group">
             <label for="">Email Dinas</label>
             <input type="text" name="dinas_email" value="<?php echo $data->dinas_email; ?>" class="form-control" placeholder="Ketikan Email Dinas" required>
             <small> <i>* Email dibutuhkan untuk notifikasi</i> </small>
           </div>
           <div class="form-group">
             <label for="">Logo Dinas</label>
             <?php
             if ($data->dinas_photo!="default.png") {
               ?>
               <br>
               <img src="<?php echo URL; ?>upload/img/dinas/<?php echo $data->dinas_photo; ?>" alt="" style="width:200px;" class="img-thumbnail">
               <br><br>
               <?php
             }
              ?>
             <input type="hidden" name="dinas_photo_then" value="<?php echo $data->dinas_photo; ?>" class="form-control">
             <input type="file" name="dinas_photo" value="" class="form-control">
             <small> <i>* Boleh tidak diisi. Jika diisi, format file harus JPG atau PNG. size maximal 1MB</i> </small>
           </div>
           <?php
         }
          ?>
      <?php
      $x->endbox('body');
      $x->box('footer');
      ?>
        <button type="submit" name="button" class="btn btn-primary" value="button">
          <?php echo $x->icon('save'); ?> Simpan
        </button>
      </form>
      <?php
      $x->endbox('footer');
    $x->endbox();
  $x->endcolumn();

$x->endcontent();
 ?>
