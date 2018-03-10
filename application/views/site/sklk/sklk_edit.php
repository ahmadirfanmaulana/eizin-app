<?php
$x = new TopLibrary();
$sql_at = mysqli_query($x->db(),"select * from tb_attachment_type where at_id = $at_id");
$data_at = mysqli_fetch_array($sql_at);

$x->content();
$x->column(4);
  $x->box('type','success');
    $x->box('title','Biodata');
    $x->box('body');
     ?>
    <?php foreach ($data_table as $data): ?>
      <form class="" action="" method="post">
        <div class="form-group">
          <label for="">Nama :</label>
          <input type="text" name="biodata_nama" value="<?php echo $data->biodata_nama; ?>" class="form-control" placeholder="Ketikan Nama" required>
        </div>
        <div class="form-group">
          <label for="">Nomor :</label>
          <input type="text" name="biodata_nomor" value="<?php echo $data->biodata_nomor; ?>" class="form-control" placeholder="Ketikan Nomor" required>
        </div>
        <div class="form-group">
          <label for="">Tanggal Surat :</label>
          <input type="date" name="biodata_tanggal_surat" value="<?php echo $data->biodata_tanggal_surat; ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">NIP :</label>
          <input type="text" name="biodata_nip" value="<?php echo $data->biodata_nip; ?>" class="form-control" placeholder="Ketikan NIP" required>
        </div>
        <div class="form-group">
          <label for="">Pangkat :</label>
          <input type="text" name="biodata_pangkat" value="<?php echo $data->biodata_pangkat; ?>" class="form-control" placeholder="Ketikan Pangkat" required>
        </div>
        <div class="form-group">
          <label for="">Jabatan :</label>
          <input type="text" name="biodata_jabatan" value="<?php echo $data->biodata_jabatan; ?>" class="form-control" placeholder="Ketikan Jabatan" required>
        </div>
        <div class="form-group">
          <label for="">Sekolah :</label>
          <input type="text" name="biodata_almamater" value="<?php echo $data->biodata_almamater; ?>" class="form-control" placeholder="Ketikan Perguruan Tinggi" required>
        </div>
        <div class="form-group">
          <label for="">Penyelenggara :</label>
          <input type="text" name="biodata_penyelenggara" value="<?php echo $data->biodata_penyelenggara; ?>" class="form-control" placeholder="Ketikan Perguruan Tinggi" required>
        </div>
        <div class="form-group">
          <label for="">Program Studi :</label>
          <input type="text" name="biodata_program" value="<?php echo $data->biodata_program; ?>" class="form-control" placeholder="Ketikan Program Studi" required>
        </div>
        <div class="form-group">
          <label for="">Jurusan :</label>
          <input type="text" name="biodata_jurusan" value="<?php echo $data->biodata_jurusan; ?>" class="form-control" placeholder="Ketikan Jurusan" required>
        </div>
        <div class="form-group">
          <label for="">Alamat :</label>
          <textarea name="biodata_alamat" class="form-control" required placeholder="Ketikan Alamat" rows="8" cols="80"><?php echo $data->biodata_alamat; ?></textarea>
        </div>
        <div class="form-group">
          <label for="">Nomor Ijazah :</label>
          <input type="text" name="biodata_no_ijazah" value="<?php echo $data->biodata_no_ijazah; ?>" class="form-control" placeholder="Ketikan Jurusan" required>
        </div>
        <div class="form-group">
          <label for="">Nilai / IPK :</label>
          <input type="text" name="biodata_nilai" value="<?php echo $data->biodata_nilai; ?>" class="form-control" placeholder="Ketikan Jurusan" required>
        </div>
        <div class="form-group">
          <label for="">Unit Kerja :</label>
          <input type="text" name="biodata_unit_kerja" value="<?php echo $data->biodata_unit_kerja; ?>" class="form-control" placeholder="Ketikan Unit Kerja" required>
        </div>
        <div class="form-group">
          <label for="">Tahun Kelulusan :</label>
          <select class="form-control" name="biodata_tahun_kelulusan">
            <option value="<?php echo $data->biodata_tahun_kelulusan; ?>">
              <?php echo $data->biodata_tahun_kelulusan; ?>
            </option>
            <?php
            for ($i=date('Y'); $i >=date('Y')-60  ; $i--) {
              if ($data->biodata_tahun_kelulusan == $i-1 ."/". $i) {
                # code...
              }
              else {
                ?>
                <option value="<?php echo $i-1 ."/". $i; ?>"><?php echo $i-1 ."/". $i; ?></option>
                <?php
              }
            }
             ?>
          </select>
        </div>
        <?php
        if ($data->biodata_akreditasi == "A") {
          $ak_a = "checked";
          $ak_b = "";
        }
        else {
          $ak_a = "";
          $ak_b = "checked";
        }
         ?>
        <input type="radio" name="biodata_akreditasi" value="A" <?php echo $ak_a; ?>> A
        <input type="radio" name="biodata_akreditasi" value="B" <?php echo $ak_b; ?>> B
      <?php endforeach; ?>
      <!-- /.mailbox-read-message -->
    <?php $x->endbox('body'); ?>
    <!-- /.box-body -->
    <?php $x->box('footer'); ?>
      <button type="submit" name="button" class="btn btn-primary" value="button">
        <?php echo $x->icon('save'); ?> Update
      </button>
    </form>
    <?php $x->endbox('footer');
  $x->endbox();
$x->endcolumn();

  $x->column(8);
    $x->box('type','success');
      $x->box('title','Edit : '.$data_at['at_nama']);
      ?>
      <form class="" action="" method="post" enctype="multipart/form-data">
        <!-- box body -->
        <?php $x->box('body'); ?>
        <?php
        if ($data_upload!=null) {
          ?>
          <div class="alert alert-danger animated shake">
            <h4><i class="fa fa-warning"></i> Opps</h4>
            <?php print_r($data_upload); ?>
          </div>
          <?php
        }
        ?>
        <?php
        foreach ($data_attachment as $y) {
          ?>
        <div class="form-group" style="margin-bottom:0px">
          <label for="">File Terdahulu :</label> <br>
          <ul class="docs-pictures">
            <li style="width:100%;margin-bottom:15px">
                <div style="width:200px;height:230px;background-image:url('<?php echo URL; ?>upload/attachment/dinas<?php echo $_SESSION['dinas_id']; ?>/sklk<?php echo $y->attachment_eizin_id; ?>/<?php echo $y->attachment_file_name; ?>');background-size:cover;background-position:center;cursor:pointer;"class="img-thumbnail" data-toggle="tooltip" title="Lihat Foto Ini">
                  <img data-original="<?php echo URL; ?>upload/attachment/dinas<?php echo $_SESSION['dinas_id']; ?>/sklk<?php echo $y->attachment_eizin_id; ?>/<?php echo $y->attachment_file_name; ?>" class="img-thumbnail img-circle" src="" style="width:100%;height:100%;opacity:0">
                </div>
              </li>
           </ul>
          <br>
          <label for="">Browse file :</label>
          <input type="file" name="file" value="" class="form-control">
            <input type="hidden" name="file_then" value="<?php echo $y->attachment_file_name; ?>">
          <small> <i><i class="fa fa-exclamation-circle"></i> Inputan harus PNG/JPG</i> </small>
        </div>
      <?php } ?>
        <?php $x->endbox('body'); ?>
        <!-- box body -->

        <!-- box-footer -->
        <?php $x->box('footer'); ?>
          <button type="submit" class="btn btn-default" name="upload" value="button">
            <i class="fa fa-cloud-upload"></i> Upload
          </button>
        <?php $x->endbox('footer'); ?>
        <!-- box footer -->
      </form>

      <?php
    $x->endbox();
  $x->endcolumn();
$x->endcontent();
 ?>


 <?php
 if ($data_model == "berhasil") {
   ?>
   <script type="text/javascript">
     swal({
       type : 'success',
       title : 'Sukses',
       text : 'Berhasil diupdate'
     });
   </script>
   <?php
 }
 elseif($data_model == "gagal") {
   ?>
   <script type="text/javascript">
     swal({
       type : 'error',
       title : 'Opps',
       text : 'Gagal diupdate. Silahkan coba kembali'
     });
   </script>
   <?php
 }
  ?>
