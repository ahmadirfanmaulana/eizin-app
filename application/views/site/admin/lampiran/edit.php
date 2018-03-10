<?php
$x = new TopLibrary();

$x->content();


  $x->column(12);
    $x->box('type','success');
      $x->box('title','Tambah Lampiran');
      $x->box('body');
      ?>

      <!-- data model -->
      <?php echo $data_model; ?>
      <!-- data model -->

       <form class="" action="" method="post" enctype="multipart/form-data">
         <?php
         foreach ($data_lampiran as $data) {
           ?>
           <div class="form-group">
             <label for="">Lampiran untuk :</label>
             <select class="form-control" name="at_type">
               <?php
               $lampiran_type = array("Semua","Izin Belajar","SK Lulus Kuliah");
               $lampiran_type_value = array("semua","IB","SKLK");
                ?>
               <option value="<?php echo $data->at_type; ?>">
                 <?php
                 for ($i=0; $i <3 ; $i++) {
                   if ($data->at_type== $lampiran_type_value [$i]) {
                     echo $lampiran_type[$i];
                   }
                 }
                  ?>
               </option>
               <?php
               for ($i=0; $i <3 ; $i++) {
                 if ($data->at_type== $lampiran_type_value [$i]) {

                 }
                 else{
                   ?>
                   <option value="<?php echo $lampiran_type_value[$i]; ?>">
                     <?php echo $lampiran_type[$i]; ?>
                   </option>
                   <?php
                 }
               }
                ?>
             </select>
           </div>
           <div class="form-group">
             <label for="">Nama Lampiran :</label>
             <input type="text" name="at_nama" value="<?php echo $data->at_nama; ?>" class="form-control" placeholder="Ketikan Nama Lampiran" required>
           </div>
           <div class="form-group">
             <label for="">Lampiran Deskripsi :</label>
             <textarea name="at_deskripsi" rows="8" cols="80" class="form-control" placeholder="Ketikan Deskripsi Lampiran"><?php echo $data->at_deskripsi; ?></textarea>
             <small> <i>* Boleh tidak diisi.</i> </small>
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
