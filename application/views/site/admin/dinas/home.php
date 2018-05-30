<?php
$x = new TopLibrary();

$x->content();
  $x->column(3);
    $x->tag('a',array('attr'=>'href='.ADMIN.'dinas/tambah'));
      $x->button('primary','Tambah','style="width:100%;"');
    $x->endtag('a');
    $x->tag('br');
    $x->tag('br');
    $x->box('type','primary');
    $x->box('title','ORDER');
    $x->box('body','no-padding');
      $x->navpills();
      if ($tag == "belum mengirimkan") {
        $belum_mengirimkan = "active";
      }
      elseif ($tag == "mengirimkan") {
        $mengirimkan = "active";
      }
      else {
        $default = "active";
      }
        $x->navpills(array('data'=>'Semua','link'=>'dinas','active'=>isset($default)?$default:null));
        $x->navpills(array('data'=>'Belum Mengirimkan','link'=>'dinas/tag/belum-mengirimkan','active'=>isset($belum_mengirimkan)?$belum_mengirimkan:null));
        $x->navpills(array('data'=>'Mengirimkan','link'=>'dinas/tag/mengirimkan','active'=>isset($mengirimkan)?$mengirimkan:null));
      $x->endnavpills();
    $x->endbox('body');
    $x->endbox();
  $x->endcolumn();

  $x->column(9);
    $x->box('type','success');
      $x->box('title','Dinas');
      $x->box('body');
      ?>
      <table class="table table-striped dataTable" style="width:100%;">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Email</th>
            <th class="text-center">Username</th>
            <th class="text-center">Password</th>
            <th class="text-center">Status</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($data_dinas as $data) {
            $row_eizin = $this->db->get_where("tb_eizin",["eizin_dinas_id" => $data->dinas_id])->num_rows();
            if ($tag == "belum mengirimkan") {
              if ($row_eizin == 0) {
                ?>
                <tr>
                  <td class="text-center"><?php echo $no; ?></td>
                  <td>
                    <?php $x->pict('dinas/'.$data->dinas_photo,array('string'=>$data->dinas_nama)); ?>
                  </td>
                  <td class="text-center"><?php echo $data->dinas_email; ?></td>
                  <td class="text-center"><?php echo $data->user_username; ?></td>
                  <td class="text-center"><?php echo $data->dinas_password; ?></td>
                  <td class="text-center">
                    <?php
                    if ($row_eizin == 0) {
                      ?>
                      <label for="" class="label label-danger">Belum </label>
                      <?php
                    }
                    else {
                      ?>
                      <label for="" class="label label-success">Mengirimkan</label>
                      <?php
                    }
                     ?>
                  </td>
                  <td class="text-center">
                    <?php
                    if ($row_eizin == 0) {
                      ?>
                      <button type="button" name="button" class="btn btn-danger trash" title="Hapus" dinas-id="<?php echo $data->dinas_id; ?>">
                        <i class="fa fa-trash"></i>
                      </button>
                      <?php
                    }
                    else {
                      ?>
                      <button type="button" name="button" class="btn btn-danger" title="Dinas ini memiliki persyaratan. Dinas bisa dihapus setelah semua persyaratan terhapus." disabled>
                        <i class="fa fa-trash"></i>
                      </button>
                      <?php
                    }
                     ?>
                    <a href="<?php echo ADMIN; ?>dinas/<?php echo $data->dinas_id; ?>/edit">
                      <button type="button" name="button" class="btn btn-warning" title="Edit">
                        <i class="fa fa-pencil"></i>
                      </button>
                    </a>
                  </td>
                </tr>
                <?php
              }
            }
            elseif($tag == "mengirimkan") {
              if ($row_eizin > 0) {
                ?>
                <tr>
                  <td class="text-center"><?php echo $no; ?></td>
                  <td>
                    <?php $x->pict('dinas/'.$data->dinas_photo,array('string'=>$data->dinas_nama)); ?>
                  </td>
                  <td class="text-center"><?php echo $data->dinas_email; ?></td>
                  <td class="text-center"><?php echo $data->user_username; ?></td>
                  <td class="text-center"><?php echo $data->dinas_password; ?></td>
                  <td class="text-center">
                    <?php
                    if ($row_eizin == 0) {
                      ?>
                      <label for="" class="label label-danger">Belum </label>
                      <?php
                    }
                    else {
                      ?>
                      <label for="" class="label label-success">Mengirimkan</label>
                      <?php
                    }
                     ?>
                  </td>
                  <td class="text-center">
                    <?php
                    if ($row_eizin == 0) {
                      ?>
                      <button type="button" name="button" class="btn btn-danger trash" title="Hapus" dinas-id="<?php echo $data->dinas_id; ?>">
                        <i class="fa fa-trash"></i>
                      </button>
                      <?php
                    }
                    else {
                      ?>
                      <button type="button" name="button" class="btn btn-danger" title="Dinas ini memiliki persyaratan. Dinas bisa dihapus setelah semua persyaratan terhapus." disabled>
                        <i class="fa fa-trash"></i>
                      </button>
                      <?php
                    }
                     ?>
                    <a href="<?php echo ADMIN; ?>dinas/<?php echo $data->dinas_id; ?>/edit">
                      <button type="button" name="button" class="btn btn-warning" title="Edit">
                        <i class="fa fa-pencil"></i>
                      </button>
                    </a>
                  </td>
                </tr>
                <?php
              }
            }
            else {
              ?>
              <tr>
                <td class="text-center"><?php echo $no; ?></td>
                <td>
                  <?php $x->pict('dinas/'.$data->dinas_photo,array('string'=>$data->dinas_nama)); ?>
                </td>
                <td class="text-center"><?php echo $data->dinas_email; ?></td>
                <td class="text-center"><?php echo $data->user_username; ?></td>
                <td class="text-center"><?php echo $data->dinas_password; ?></td>
                <td class="text-center">
                  <?php
                  if ($row_eizin == 0) {
                    ?>
                    <label for="" class="label label-danger">Belum </label>
                    <?php
                  }
                  else {
                    ?>
                    <label for="" class="label label-success">Mengirimkan</label>
                    <?php
                  }
                   ?>
                </td>
                <td class="text-center">
                  <?php
                  if ($row_eizin == 0) {
                    ?>
                    <button type="button" name="button" class="btn btn-danger trash" title="Hapus" dinas-id="<?php echo $data->dinas_id; ?>">
                      <i class="fa fa-trash"></i>
                    </button>
                    <?php
                  }
                  else {
                    ?>
                    <button type="button" name="button" class="btn btn-danger" title="Dinas ini memiliki persyaratan. Dinas bisa dihapus setelah semua persyaratan terhapus." disabled>
                      <i class="fa fa-trash"></i>
                    </button>
                    <?php
                  }
                   ?>
                  <a href="<?php echo ADMIN; ?>dinas/<?php echo $data->dinas_id; ?>/edit">
                    <button type="button" name="button" class="btn btn-warning" title="Edit">
                      <i class="fa fa-pencil"></i>
                    </button>
                  </a>
                </td>
              </tr>
              <?php
            }
            ?>

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
      <a href="<?php echo ADMIN; ?>dinas/print">
        <button type="button" name="button" class="btn btn-success">
          <i class="fa fa-print"></i> Print Data Dinas
        </button>
      </a>
      <?php
      $x->endbox('footer');
    $x->endbox();
  $x->endcolumn();
$x->endcontent();
 ?>


 <script type="text/javascript">
   $('.trash').click(function () {
     dinas_id = $(this).attr('dinas-id');
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
               url : '<?php echo ADMIN; ?>dinas/hapus',
               data : {dinas_id : dinas_id},
               success : function () {
                 swal({
                   type : 'success',
                   title : 'Sukses',
                   text : 'Berhasil Dihapus'
                 },function () {
                   window.location = '<?php echo ADMIN; ?>dinas'
                 })
               }
             })
           },400)
     })
   })
 </script>
