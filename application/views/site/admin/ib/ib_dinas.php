<?php
$x = new TopLibrary();

$x->content();
$x->column(3);
  $x->box('type','success');
    $x->box('title','Dinas');
    $x->box('body');
     ?>
     <?php foreach ($data_dinas as $data): ?>
    <?php $x->pict('dinas/'.$data->dinas_photo,array('string'=>$data->dinas_nama)); ?>
     <?php endforeach; ?>
    <?php
    $x->endbox('body');

  $x->endbox();
$x->endcolumn();

  $x->column(9);
    $x->box('type','success');
      $x->box('title','Izin Belajar : '.$data_sort);
      $x->box('body','no');
      ?>
      <table class="table table-striped dataTable">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Progress</th>
            <th class="text-center">NIP</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Tanggal Entri</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($data_eizin as $data) {
            $count_at = $x->db()->query("select * from tb_attachment_type where at_type = 'IB' or at_type = 'semua'")->num_rows;
            $count_attachment = $x->db()->query("select * from tb_attachment where attachment_eizin_id = ".$data->eizin_id."")->num_rows;
            ?>
            <tr>
              <td class="text-center">
                <?php echo $no; ?>
              </td>
              <td class="text-center">
                <div class="progress progress-sm active" style="margin-bottom:0px">
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
                    ?>
                    <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                      <span class="sr-only">10% Complete</span>
                    </div>
                    <?php
                }
              }
              ?>
              </div>
              </td>
              <td class="text-center">
                <?php echo $data->biodata_nip; ?>
              </td>
              <td>
                <?php echo $data->biodata_nama; ?>
              </td>
              <td class="text-center">
                <?php echo $x->format_tanggal($data->eizin_date_kirim); ?>
              </td>
              <td>
                <a href="<?php echo ADMIN; ?>ib/<?php echo $dinas_id; ?>/<?php echo $data->biodata_eizin_id; ?>/<?php echo str_replace(' ','-',$data_sort); ?>">
                  <button type="button" name="button" class="btn btn-default">
                    <i class="fa fa-eye"></i>
                  </button>
                </a>
                <?php
                if ($data->eizin_status == "terkirim") {
                  if ($_SESSION['level'] == "admin1") {
                    ?>
                    <button type="button" name="button" class="btn btn-info verifikasi1" data-id="<?php echo $data->eizin_id; ?>">
                      <i class="fa fa-check-square"></i> Verifikasi
                    </button>
                    <?php
                  }
                  else {
                  }
                }
                elseif ($data->eizin_status == "verifikasi 1") {
                  if ($_SESSION['level'] == "admin1") {
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
                    <a href="<?php echo ADMIN; ?>ib/<?php echo $data->eizin_id; ?>/print">
                    <button type="button" name="button" class="btn btn-success">
                      <i class="fa fa-print"></i>
                    </button>
                    </a>
                    <?php
                  }
                  else {
                    ?>
                    <button type="button" name="button" class="btn btn-danger delete" data-id="<?php echo $data->eizin_id; ?>" data-dinas="<?php echo $data->eizin_dinas_id; ?>">
                      <i class="fa fa-trash"></i>
                    </button>
                    <?php
                  }
                }
                 ?>
              </td>
            </tr>
            <?php
            $no++;
          }
           ?>
        </tbody>
      </table> 
      <!-- /.box-footer -->

      <?php
    $x->endbox();
  $x->endcolumn();
$x->endcontent();
 ?>

 <script type="text/javascript">
 $(document).ready(function () {

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
               url : '<?php echo ADMIN; ?>ib/verifikasi_satu',
               data : {data_id : data_id},
               success : function () {
                 swal({
                   type : 'success',
                   title : 'Sukses',
                   text : 'Berhasil Diverifikasi'
                 },function () {
                   window.location = '<?php echo ADMIN; ?>ib/<?php echo $dinas_id; ?>/<?php echo str_replace(' ','-',$data_sort); ?>';
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
               url : '<?php echo ADMIN; ?>ib/verifikasi_dua',
               data : {data_id : data_id},
               success : function () {
                 swal({
                   type : 'success',
                   title : 'Sukses',
                   text : 'Berhasil Diverifikasi'
                 },function () {
                   window.location = '<?php echo ADMIN; ?>ib/<?php echo $dinas_id; ?>/<?php echo str_replace(' ','-',$data_sort); ?>';
                 })
               }
             })
           },400)
     })
   })



 })

 $('.delete').click(function () {
   data_id = $(this).attr('data-id');
   dinas_id = $(this).attr('data-dinas');

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
         url : '<?php echo ADMIN; ?>ib/hapus',
         data : {data_id : data_id,dinas_id:dinas_id},
         success : function () {
           swal({
             type : 'success',
             title : 'Sukses',
             text : 'Berhasil Dihapus'
           },function () {
             window.location = '<?php echo ADMIN; ?>ib/<?php echo $dinas_id; ?>/<?php echo str_replace(' ','-',$data_sort); ?>';
           })
         }
       })
     },400)
   })
 })
 </script>
