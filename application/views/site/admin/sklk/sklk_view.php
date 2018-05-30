<?php
$x = new TopLibrary();

$x->content();
$x->column(4);
  $x->box('type','success');
    $x->box('title','Biodata');
    $x->box('body');
     ?>
    <?php foreach ($data_table as $data): ?>
    <table class="table table-striped">
      <tr>
        <td> <b>Nama :</b>  </td>
      </tr>
      <tr>
        <td><?php echo $data->biodata_nama; ?></td>
      </tr>
      <tr>
        <td> <b>Nip : </b> </td>
      </tr>
      <tr>
        <td><?php echo $data->biodata_nip; ?></td>
      </tr>
      <tr>
        <td> <b>Pangkat : </b> </td>
      </tr>
      <tr>
        <td><?php echo $data->biodata_pangkat; ?></td>
      </tr>
      <tr>
        <td> <b>Jabatan : </b> </td>
      </tr>
      <tr>
        <td><?php echo $data->biodata_jabatan; ?></td>
      </tr>
      <tr>
        <td> <b>Alamat : </b> </td>
      </tr>
      <tr>
        <td><?php echo $data->biodata_alamat; ?></td>
      </tr>
      <tr>
        <td> <b>Sekolah :</b>  </td>
      </tr>
      <tr>
        <td><?php echo $data->biodata_almamater; ?></td>
      </tr>
      <tr>
        <td> <b>Penyelenggara :</b>  </td>
      </tr>
      <tr>
        <td><?php echo $data->biodata_penyelenggara; ?></td>
      </tr>
      <tr>
        <td> <b>Pogram Studi :</b>  </td>
      </tr>
      <tr>
        <td><?php echo $data->biodata_program; ?></td>
      </tr>
      <tr>
        <td> <b>Jurusan : </b> </td>
      </tr>
      <tr>
        <td><?php echo $data->biodata_jurusan; ?></td>
      </tr>
      <tr>
        <td> <b>No Ijazah : </b> </td>
      </tr>
      <tr>
        <td><?php echo $data->biodata_no_ijazah; ?></td>
      </tr>
      <tr>
        <td> <b>Nilai / IPK : </b> </td>
      </tr>
      <tr>
        <td><?php echo $data->biodata_nilai; ?></td>
      </tr>
      <tr>
        <td> <b>Unit Kerja : </b> </td>
      </tr>
      <tr>
        <td><?php echo $data->biodata_unit_kerja; ?></td>
      </tr>
      <tr>
        <td> <b>Tahun Kelulusan: </b> </td>
      </tr>
      <tr>
        <td><?php echo $data->biodata_tahun_kelulusan; ?></td>
      </tr>
      <tr>
        <td> <b>Akreditasi : </b> </td>
      </tr>
      <tr>
        <td><?php echo $data->biodata_akreditasi; ?></td>
      </tr>
      <tr>
        <td> <b>Dasar : </b> </td>
      </tr>
      <tr>
        <td><?php echo $data->biodata_dasar; ?></td>
      </tr>
    </table>
    <?php $x->endbox('body'); ?>
    <!-- /.box-body -->
    <?php $x->box('footer'); ?>
    <?php foreach ($data_dinas as $y): ?>
      <?php $x->pict('dinas/'.$y->dinas_photo,array('string'=>$y->dinas_nama)); ?>
    <?php endforeach; ?>
    <?php $x->endbox('footer');
  $x->endbox();
$x->endcolumn();

  $x->column(8);
    $x->box('type','success');
      $x->box('title','Lihat Surat Keterangan Lulus Kuliah');
      $x->box('body','no-padding');
      ?>
        <div class="mailbox-read-info">
                <h5>Nama : <?php echo $data->biodata_nama; ?>
                  <span class="mailbox-read-time pull-right">
                     <?php echo $x->format_tanggal($data->eizin_date_kirim); ?></span></h5>
                <h5>Status :
                  <?php
                  $this->db->where("at_type",'SKLK');
                  $this->db->or_where("at_type",'semua');
                  $count_at = $this->db->get("tb_attachment_type")->num_rows();
                  $count_attachment = $this->db->get_where("tb_attachment",["attachment_eizin_id" => $data->eizin_id])->num_rows();
                  if ($data->eizin_status == "terkirim") {
                    ?>
                    <label for="" class="label label-info">Diterima</label>
                    <?php
                  }
                  elseif ($data->eizin_status == "verifikasi 1") {
                    ?>
                    <label for="" class="label label-primary">Telah Diverifikasi 1</label>
                    <?php
                  }
                  elseif ($data->eizin_status == "verifikasi 2") {
                    ?>
                    <label for="" class="label label-success">Telah Diverifikasi 2</label>
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
                $this->db->where('at_type','SKLK');
                $this->db->or_where('at_type','Semua');
                $sql = $this->db->get('tb_attachment_type');
                $no=1;
                foreach ($sql->result_array() as $at) {
                  $sql_attachment = $this->db->get_where('tb_attachment',[
                    "attachment_at_id"    => $at['at_id'],
                    "attachment_eizin_id" => $data->biodata_eizin_id
                  ]);
                  $row_attachment = $sql_attachment->num_rows();
                  $data_attachment = $sql_attachment->row();
                  if ($row_attachment>0) {
                    ?>
                    <li style="width:31.5%" title="<?php echo $at['at_nama']; ?>" data-toggle="tooltip">
                      <span class="mailbox-attachment-icon has-img">
                        <ul class="docs-pictures">
                          <li style="width:100%">
                              <div style="width:100%;height:230px;background-image:url('<?php echo URL; ?>upload/attachment/dinas<?php echo $dinas_id; ?>/sklk<?php echo $data->biodata_eizin_id; ?>/<?php echo $data_attachment->attachment_file_name; ?>');background-size:cover;background-position:center;cursor:pointer;" data-toggle="tooltip" title="Lihat Foto Ini">
                                <img data-original="<?php echo URL; ?>upload/attachment/dinas<?php echo $dinas_id; ?>/<?php echo $data->eizin_dir; ?>/<?php echo $data_attachment->attachment_file_name; ?>" class="img-thumbnail img-circle" src="" style="width:100%;height:100%;opacity:0">
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
                          <?php echo $data_attachment->attachment_file_size; ?> KB
                          <a href="<?php echo URL; ?>upload/attachment/dinas<?php echo $data->eizin_dinas_id; ?>/sklk<?php echo $eizin_id; ?>/<?php echo $data_attachment->attachment_file_name; ?>" class="btn btn-default btn-xs pull-right" target="_blank"><i class="fa fa-cloud-download"></i></a>
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
                    if ($_SESSION['level'] == "admin1") {
                      ?>
                      <button type="button" name="button" class="btn btn-info verifikasi1" data-id="<?php echo $data->eizin_id; ?>">
                        Verifikasi
                      </button>
                      <?php
                    }
                    else {
                      ?>
                      <label for="" class="label label-info">
                        <i class="fa fa-paper-plane"></i> Data ini telah Diterima. Tunggu verifikasi dari admin 1 untuk memverifikasi
                      </label>
                      <?php
                    }
                  }
                  elseif ($data->eizin_status == "verifikasi 1") {
                    if ($_SESSION['level'] == "admin1") {
                    ?>
                    <label for="" class="label label-primary">
                      <i class="fa fa-hourglass-start"></i> Telah Diverifikasi. Tunggu Verifikasi ke 2 untuk mengambil & print surat
                    </label>
                    <?php
                    }
                    else {
                      ?>
                      <button type="button" name="button" class="btn btn-primary verifikasi2" data-id="<?php echo $data->eizin_id; ?>">
                        <i class="fa fa-check-square"></i> Verifikasi
                      </button>
                      <?php
                    }
                  }
                  elseif ($data->eizin_status == "verifikasi 2") {
                    if ($_SESSION['level'] == "admin1") {
                      ?>
                      <a href="<?php echo ADMIN; ?>sklk/<?php echo $data->eizin_id; ?>/print">

                        <button type="button" name="button" class="btn btn-success">
                          <i class="fa fa-print"></i> Print Surat
                        </button>
                      </a>
                      <?php
                    }
                    else {
                      ?>
                      <label for="" class="label label-success">
                        <i class="fa fa-check-square-o"></i> Telah Selesai Verifikasi
                      </label>
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


<script type="text/javascript">
  $('.verifikasi1').click(function () {
    data_id = $(this).attr('data-id');

    swal({
      type : 'warning',
      title : 'Konfirmasi',
      text : 'Apakah Anda ingin memverifikasi data ini ?',
      showCancelButton : true,
      showLoaderOnConfirm : true
    },function () {
          setTimeout(function () {
            $.ajax({
              method : 'post',
              url : '<?php echo ADMIN; ?>sklk/verifikasi_satu',
              data : {data_id : data_id},
              success : function () {
                swal({
                  type : 'success',
                  title : 'Sukses',
                  text : 'Berhasil Diverifikasi'
                },function () {
                  window.location = '<?php echo ADMIN; ?>sklk/<?php echo $dinas_id; ?>/<?php echo $eizin_id; ?>/<?php echo str_replace(' ','-',$data_sort); ?>';
                })
              }
            })
          },400)
    })
  })

  $('.verifikasi2').click(function () {
    data_id = $(this).attr('data-id');

    swal({
      type : 'warning',
      title : 'Konfirmasi',
      text : 'Apakah Anda ingin memverifikasi data ini ?',
      showCancelButton : true,
      showLoaderOnConfirm : true
    },function () {
          setTimeout(function () {
            $.ajax({
              method : 'post',
              url : '<?php echo ADMIN; ?>sklk/verifikasi_dua',
              data : {data_id : data_id},
              success : function () {
                swal({
                  type : 'success',
                  title : 'Sukses',
                  text : 'Berhasil Diverifikasi'
                },function () {
                  window.location = '<?php echo ADMIN; ?>sklk/<?php echo $dinas_id; ?>/<?php echo $eizin_id; ?>/<?php echo str_replace(' ','-',$data_sort); ?>';
                })
              }
            })
          },400)
    })
  })
</script>

<?php endforeach; ?>
