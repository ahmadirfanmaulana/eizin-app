<?php
$x = new TopLibrary();

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
          <label for="">Perguruan Tinggi :</label>
          <input type="text" name="biodata_almamater" value="<?php echo $data->biodata_almamater; ?>" class="form-control" placeholder="Ketikan Perguruan Tinggi" required>
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
          <label for="">Unit Kerja :</label>
          <input type="text" name="biodata_unit_kerja" value="<?php echo $data->biodata_unit_kerja; ?>" class="form-control" placeholder="Ketikan Unit Kerja" required>
        </div>
        <div class="form-group">
          <label for="">Tahun :</label>
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
      $x->box('title','Lihat Persyaratan Izin Belajar');
      $x->box('body','no-padding');
      ?>
        <div class="mailbox-read-info">
                <h5>Status :
                  <?php
                  $count_at = $x->db()->query("select * from tb_attachment_type where at_type = 'IB' or at_type = 'semua'")->num_rows;
                  $count_attachment = $x->db()->query("select * from tb_attachment where attachment_eizin_id = '$eizin_id'")->num_rows;
                  if ($data->eizin_status == "terkirim") {
                    ?>
                    <label for="" class="label label-info">Terkirim</label>
                    <?php
                  }
                  elseif ($data->eizin_status == "verifikasi 1") {
                    ?>
                    <label for="" class="label label-primary">Telah Diverifikasi 1</label>
                    <?php
                  }
                  elseif ($data->eizin_status == "verifikasi 2") {
                    ?>
                    <label for="" class="label label-success">Selesai Verifikasi</label>
                    <?php
                  }
                  else{
                    if ($count_at == $count_attachment) {
                      ?>
                      <label for="" class="label-status label label-warning">Lengkap</label>
                      <?php
                    }
                    else {
                      $at_empty = $count_at - $count_attachment;
                      if ($at_empty == $count_at) {
                        $at_empty = "Semua";
                      }
                      ?>
                      <label for="" class="label label-danger"><?php echo $at_empty; ?> Lampiran Belum Diinputkan</label>
                      <?php
                    }
                  }
                   ?>
                   <span class="mailbox-read-time pull-right">
                     Dientri
                      <?php echo $x->format_tanggal($data->biodata_entri); ?></span>
                </h5>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="box-footer">
                <div class="progress progress-md active" style="margin-bottom:0px">
              <?php
              if ($data->eizin_status == "terkirim") {
                ?>
                <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                  <span class="sr-only">50% Complete</span>
                </div>
                <?php
              }
              elseif ($data->eizin_status == "verifikasi 1") {
                ?>
                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                  <span class="sr-only">75% Complete</span>
                </div>
                <?php
              }
              elseif ($data->eizin_status == "verifikasi 2") {
                ?>
                <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                  <span class="sr-only">100% Complete</span>
                </div>
                <?php
              }
              else {
                if ($count_at == $count_attachment) {
                  ?>
                  <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                    <span class="sr-only">25% Complete</span>
                  </div>
                  <?php
                }
                else {
                  if ($count_attachment>0) {
                    ?>
                    <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                      <span class="sr-only">10% Complete</span>
                    </div>
                    <?php
                  }
                }
              }
              ?>
              </div>
            </div>
            <?php $x->box('footer'); ?>
              <ul class="mailbox-attachments clearfix">
                <?php
                $sql = mysqli_query($x->db(),"select * from tb_attachment_type where at_type = 'IB' or at_type = 'Semua'");
                $no=1;
                while ($at = mysqli_fetch_array($sql)) {
                  $sql_attachment = mysqli_query($x->db(),"select * from tb_attachment where attachment_at_id = $at[at_id] and attachment_eizin_id = ".$data->biodata_eizin_id."");
                  $row_attachment = mysqli_num_rows($sql_attachment);
                  $data_attachment = mysqli_fetch_array($sql_attachment);
                  if ($row_attachment>0) {
                    ?>
                    <li style="width:31.5%" title="<?php echo $at['at_nama']; ?>" data-toggle="tooltip">
                      <span class="mailbox-attachment-icon has-img">
                        <ul class="docs-pictures">
                          <li style="width:100%">
                              <div style="width:100%;height:230px;background-image:url('<?php echo URL; ?>upload/attachment/dinas<?php echo $_SESSION['dinas_id']; ?>/ib<?php echo $data->biodata_eizin_id; ?>/<?php echo $data_attachment['attachment_file_name']; ?>');background-size:cover;background-position:center;cursor:pointer;" data-toggle="tooltip" title="Lihat Foto Ini">
                                <img data-original="<?php echo URL; ?>upload/attachment/dinas<?php echo $_SESSION['dinas_id']; ?>/ib<?php echo $data->biodata_eizin_id; ?>/<?php echo $data_attachment['attachment_file_name']; ?>" class="img-thumbnail img-circle" src="" style="width:100%;height:100%;opacity:0">
                              </div>
                            </li>
                         </ul>
                        </span>
                      <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i>
                          <?php
                          if (strlen($at['at_nama']) > 22) {
                            echo substr($at['at_nama'],0,22)."...";
                          }
                          else{
                            echo $at['at_nama'];
                          }
                           ?>
                        </a>
                        <span class="mailbox-attachment-size">
                          <?php echo $data_attachment['attachment_file_size']; ?> KB
                          <a href="<?php echo URL; ?>upload/attachment/dinas<?php echo $_SESSION['dinas_id']; ?>/ib<?php echo $eizin_id; ?>/<?php echo $data_attachment['attachment_file_name']; ?>" class="btn btn-default btn-xs pull-right" target="_blank" title="Download" data-toggle="tooltip">
                            <i class="fa fa-cloud-download"></i>
                          </a>
                          <a href="<?php echo URL; ?>ib/<?php echo $data->biodata_eizin_id; ?>/edit/<?php echo $at['at_id']; ?>" class="btn btn-default btn-xs pull-right" title="Edit Lampiran" data-toggle="tooltip">
                            <i class="fa fa-pencil"></i>
                          </a>
                          <?php
                          if ($data->eizin_status == "belum dikirim") {
                            ?>
                            <a href="<?php echo URL; ?>ib/<?php echo $data->biodata_eizin_id; ?>/hapus/<?php echo $at['at_id']; ?>" class="btn btn-default btn-xs pull-right" title="Hapus Lampiran" data-toggle="tooltip">
                              <i class="fa fa-trash"></i>
                            </a>
                            <?php
                          }
                           ?>
                        </span>
                      </div>
                    </li>
                    <?php
                  }
                  else{
                    ?>
                    <li style="width:31.5%" title="<?php echo $at['at_nama']; ?>" data-toggle="tooltip">
                      <span class="mailbox-attachment-icon has-img"><img src="<?php echo ASSET; ?>img/logo.jpg" alt="Attachment"></span>

                      <div class="mailbox-attachment-info">
                        <a href="#" class="mailbox-attachment-name"><i class="fa fa-ban"></i> <?php
                        if (strlen($at['at_nama']) > 22) {
                          echo substr($at['at_nama'],0,22)."...";
                        }
                        else{
                          echo $at['at_nama'];
                        }
                         ?></a>
                        <span class="mailbox-attachment-size">
                          belum diinputkan
                          <a href="<?php echo URL; ?>ib/<?php echo $data->biodata_eizin_id; ?>/input/<?php echo $at['at_id']; ?>" class="btn btn-default btn-xs pull-right"  title="Upload Lampiran" data-toggle="tooltip">
                            <i class="fa fa-upload"></i> Upload
                          </a>
                        </span>
                      </div>
                    </li>
                    <?php
                  }
                  $no++;
                }
                 ?>
              </ul>
            <?php $x->endbox('footer'); ?>
            <!-- /.box-footer -->
            <?php $x->box('footer'); ?>
              <div class="pull-right">
                <?php
                  if ($data->eizin_status == "terkirim") {
                    ?>
                    <label for="" class="label label-info" disabled><i class="fa fa-paper-plane"></i> Data ini telah terkirim. Tunggu verifikasi pertama dari Admin.</label>
                    <?php
                  }
                  elseif ($data->eizin_status == "verifikasi 1") {
                    ?>
                    <label for="" class="label label-primary">
                      <i class="fa fa-hourglass-start"></i> Telah Diverifikasi oleh admin 1. Tunggu Verifikasi ke 2 untuk mengambil kartu pengambilan
                    </label>
                    <?php
                  }
                  elseif ($data->eizin_status == "verifikasi 2") {
                    ?>
                    <a href="<?php echo URL; ?>ib/print_kartu/<?php echo $data->eizin_id; ?>">
                      <button type="button" name="button" class="btn btn-success">
                        <i class="fa fa-print"></i> Print Kartu Pengambilan
                      </button>
                    </a>
                    <?php
                  }
                  else{
                    if ($count_at == $count_attachment) {
                      ?>
                      <button type="button" name="button" class="btn btn-danger delete" data-id="<?php echo $data->eizin_id; ?>">
                        <i class="fa fa-trash"></i> Hapus Persyaratan
                      </button>
                      <button type="button" class="btn btn-warning send-eizin" data-id="<?php echo $eizin_id; ?>"><i class="fa fa-envelope-o"></i> Kirim</button>
                      <?php
                    }
                    else {
                      $at_empty = $count_at - $count_attachment;
                      if ($at_empty == $count_at) {
                        $at_empty = "Semua";
                      }
                      ?>
                      <button type="button" name="button" class="btn btn-danger delete" data-id="<?php echo $data->eizin_id; ?>">
                        <i class="fa fa-trash"></i> Hapus Persyaratan
                      </button>
                      <button type="button" class="btn btn-danger" disabled title="<?php echo $at_empty; ?> Lampiran Belum Diinputkan"><i class="fa fa-envelope-o"></i> Kirim</button>
                      <?php
                    }
                  }
                 ?>
              </div>
            <?php $x->endbox('footer'); ?>
            <!-- /.box-footer -->

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
<?php endforeach; ?>
  <script type="text/javascript">
    $('.send-eizin').click(function () {
      data_id = $(this).attr('data-id');

      swal({
        type : 'warning',
        title : 'Konfirmasi',
        text : 'Apakah Anda ingin mengirimkan data ini ke admin ?',
        showCancelButton : true,
        showLoaderOnConfirm : true
      },function () {
            setTimeout(function () {
              $.ajax({
                method : 'post',
                url : '<?php echo URL; ?>ib/send',
                data : {data_id : data_id},
                success : function () {
                  swal({
                    type : 'success',
                    title : 'Sukses',
                    text : 'Berhasil Dikirim'
                  },function () {
                    window.location = '<?php echo URL; ?>ib/'+data_id+'/view';
                  })
                }
              })
            },400)
      })
    })
    $('.delete').click(function () {
      data_id = $(this).attr('data-id');

      swal({
        type : 'warning',
        title : 'Konfirmasi',
        text : 'Apakah Anda ingin menghapus data ini ?',
        showCancelButton : true,
        showLoaderOnConfirm : true
      },function () {
        setTimeout(function () {
          $.ajax({
            method : 'post',
            url : '<?php echo URL; ?>ib/hapus_data',
            data : {data_id : data_id},
            success : function () {
              swal({
                type : 'success',
                title : 'Sukses',
                text : 'Berhasil Dihapus'
              },function () {
                window.location = '<?php echo URL; ?>ib';
              })
            }
          })
        },400)
      })
    })
  </script>
