<?php
$x = new TopLibrary();

$x->content();


  $x->column(12);
    $x->box('type','success');
      $x->box('title','tambah biodata');
      $x->box('body');
      ?>

      <!-- data model -->
      <?php echo $data_model; ?>
      <!-- data model -->

       <form class="" action="" method="post" enctype="multipart/form-data">
         <?php $x->tag('div',array('class'=>'row')); ?>
         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">Nama :</label>
           <input type="text" name="biodata_nama" value="" class="form-control" placeholder="Ketikan Nama" required>
         </div>
         <?php $x->endcolumn(); ?>

         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">Nomor :</label>
           <input type="text" name="biodata_nomor" value="" class="form-control" placeholder="Ketikan Nomor Surat" required>
         </div>
         <?php $x->endcolumn(); ?>

         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">Tanggal Surat :</label>
           <input type="date" name="biodata_tanggal_surat" value="" class="form-control" required>
         </div>
         <?php $x->endcolumn(); ?>

         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">NIP :</label>
           <input type="number" name="biodata_nip" value="" class="form-control" placeholder="Ketikan NIP" required>
         </div>
         <?php $x->endcolumn(); ?>

         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">Pangkat :</label>
           <input type="text" name="biodata_pangkat" value="" class="form-control" placeholder="Ketikan Pangkat" required>
         </div>
         <?php $x->endcolumn(); ?>

         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">Jabatan :</label>
           <input type="text" name="biodata_jabatan" value="" class="form-control" placeholder="Ketikan Jabatan" required>
         </div>
         <?php $x->endcolumn(); ?>
         
         <?php $x->column(12); ?>
         <div class="form-group">
           <label for="">Alamat :</label>
           <textarea name="biodata_alamat" rows="8" cols="80" class="form-control" placeholder="Ketikan Alamat" required></textarea>
         </div>
         <?php $x->endcolumn(); ?>

         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">Sekolah :</label>
           <input type="text" name="biodata_almamater" value="" class="form-control" placeholder="Ketikan Perguruan Tinggi" required>
         </div>
         <?php $x->endcolumn(); ?>

         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">Penyelenggara :</label>
           <input type="text" name="biodata_penyelenggara" value="" class="form-control" placeholder="Ketikan Perguruan Tinggi" required>
         </div>
         <?php $x->endcolumn(); ?>

         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">Program Studi :</label>
           <input type="text" name="biodata_program" value="" class="form-control" placeholder="Ketikan Program Studi" required>
         </div>
         <?php $x->endcolumn(); ?>

         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">Jurusan :</label>
           <input type="text" name="biodata_jurusan" value="" class="form-control" placeholder="Ketikan Jurusan" required>
         </div>
         <?php $x->endcolumn(); ?>

         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">No Ijazah :</label>
           <input type="text" name="biodata_no_ijazah" value="" class="form-control" placeholder="Ketikan Perguruan Tinggi" required>
         </div>
         <?php $x->endcolumn(); ?>

         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">Nilai / IPK :</label>
           <input type="number" name="biodata_nilai" value="" class="form-control" placeholder="Ketikan Perguruan Tinggi" required>
         </div>
         <?php $x->endcolumn(); ?>

         <?php $x->column(6); ?>
         <div class="form-group">
           <label for="">Unit Kerja :</label>
           <input type="text" name="biodata_unit_kerja" value="" class="form-control" placeholder="Ketikan Unit Kerja" required>
         </div>
         <?php $x->endcolumn(); ?>

         <?php $x->column(6); ?>
         <div class="form-group">
           <label for="">Tahun Kelulusan:</label>
           <select class="form-control" name="biodata_tahun_kelulusan">
             <?php
             for ($i=date('Y'); $i >=date('Y')-60  ; $i--) {
              ?>
              <option value="<?php echo $i-1 ."/". $i; ?>"><?php echo $i-1 ."/". $i; ?></option>
              <?php
             }
              ?>
           </select>
          </div>
         <?php $x->endcolumn(); ?>

         <?php $x->column(6); ?>
         <div class="form-group">
           <label for="">Akreditasi :</label> <br>
           <input type="radio" name="biodata_akreditasi" value="A"> A
           <input type="radio" name="biodata_akreditasi" value="B"> B
         </div>
         <?php $x->endcolumn(); ?>

         <?php $x->endtag('div'); ?>
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
