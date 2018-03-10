<?php
$x = new TopLibrary();

$x->content();
  $x->column(3);
    $x->tag('a',array('attr'=>'href='.ADMIN.'lampiran/tambah'));
      $x->button('primary','Tambah','style="width:100%;"');
    $x->endtag('a');
    $x->tag('br');
    $x->tag('br');
    $x->box('type','primary');
    $x->box('title','ORDER');
    $x->box('body','no-padding');
      $x->navpills();
        $data_type = isset($data_type)?$data_type:null;
        if (empty($data_type)) {
          $default = "active";
        }
        elseif ($data_type == "semua") {
          $semua = "active";
        }
        elseif ($data_type == "ib") {
          $ib = "active";
        }
        else {
          $sklk = "active";
        }
        $x->navpills(array('data'=>'Semua','link'=>'lampiran','active'=>''.isset($default)?$default:null.''));
        $x->navpills(array('data'=>'Izin Belajar','link'=>'lampiran/ib/tag','active'=>''.isset($ib)?$ib:null.''));
        $x->navpills(array('data'=>'SK Lulus Kuliah','link'=>'lampiran/sklk/tag','active'=>''.isset($sklk)?$sklk:null.''));
        $x->navpills(array('data'=>'Izin Belajar & SK Lulus Kuliah','link'=>'lampiran/semua/tag','active'=>''.isset($semua)?$semua:null.''));
      $x->endnavpills();
    $x->endbox('body');
    $x->endbox();
  $x->endcolumn();

  $x->column(9);
    $x->box('type','success');
      $x->box('title','Dinas');
      $x->box('body');
      ?>
      <table class="table table-striped dataTable">
        <thead>

          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Lampiran</th>
            <th class="text-center">Deskripsi</th>
            <th class="text-center">Untuk</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($data_lampiran as $data) {
            ?>
            <tr> 
              <td class="text-center"><?php echo $no; ?></td>
              <td><?php echo $data->at_nama; ?></td>
              <td class="text-center"><?php if($data->at_deskripsi==""){echo "-";}else{echo $data->at_deskripsi;} ?></td>
              <td class="text-center"><?php echo $data->at_type; ?></td>
              <td class="text-center">
                <?php
                $row_attachment = $x->db()->query("select * from tb_attachment where attachment_at_id = ".$data->at_id."")->num_rows;
                if ($row_attachment >0) {
                  ?>
                  <button type="button" name="button" class="btn btn-danger" title="Lampiran dapat dihapus jika semua lampiran yang diinputkan dinas dihapus" disabled>
                    <i class="fa fa-trash"></i>
                  </button>
                  <?php
                }
                else {
                  ?>
                  <button type="button" name="button" class="btn btn-danger trash" title="Hapus" lampiran-id="<?php echo $data->at_id; ?>">
                    <i class="fa fa-trash"></i>
                  </button>
                  <?php
                }
                 ?>
                <a href="<?php echo ADMIN; ?>lampiran/<?php echo $data->at_id; ?>/edit">
                  <button type="button" name="button" class="btn btn-warning" title="Edit"  value="">
                    <i class="fa fa-pencil"></i>
                  </button>
                </a>
                </a>
              </td>
            </tr>
            <?php
            $no++;
          }
           ?>
        </tbody>
      </table>
      <?php
      $x->endbox('body');
      $x->box('footer');
      ?>
      <?php
      $x->endbox('footer');
    $x->endbox();
  $x->endcolumn();
$x->endcontent();
 ?>


 <script type="text/javascript">
   $('.trash').click(function () {
     lampiran_id = $(this).attr('lampiran-id');
     swal({
       type : 'warning',
       title : 'Konfirmasi',
       text : 'Apakah Anda Yakin Ingin Menghapus ?',
       showCancelButton : true,
       showLoaderOnConfirm : true
     },function () {
           setTimeout(function () {
             $.ajax({
               method : 'post',
               url : '<?php echo ADMIN; ?>lampiran/hapus',
               data : {lampiran_id : lampiran_id},
               success : function () {
                 swal({
                   type : 'success',
                   title : 'Sukses',
                   text : 'Berhasil Dihapus'
                 },function () {
                   window.location = '<?php echo ADMIN; ?>lampiran'
                 })
               }
             })
           },400)
     })
   })
 </script>
