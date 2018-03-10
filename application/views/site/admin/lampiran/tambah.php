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
         <div class="form-group">
           <label for="">Lampiran untuk :</label>
           <select class="form-control" name="at_type">
             <option value="semua">Semua</option>
             <option value="IB">Izin Belajar</option>
             <option value="SKLK">SK Lulus Kuliah</option>
           </select>
         </div>
         <div class="form-group">
           <label for="">Nama Lampiran :</label>
           <input type="text" name="at_nama" value="" class="form-control" placeholder="Ketikan Nama Lampiran" required>
         </div>
         <div class="form-group">
           <label for="">Lampiran Deskripsi :</label>
           <textarea name="at_deskripsi" rows="8" cols="80" class="form-control" placeholder="Ketikan Deskripsi Lampiran"></textarea>
           <small> <i>* Boleh tidak diisi.</i> </small>
         </div>
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
