<?php
$x = new TopLibrary();
 ?>

 <?php $x->content(); ?>

 <!-- col 3 -->
 <?php
 $x->column(3);
   $x->box('type','primary');
   $x->box('title','STATUS');
   $x->box('body','no-padding');
     $x->navpills();
       $data_order = isset($data_sort)?$data_sort:null;
       if ($data_order == "terkirim") {
         $menu_terkirim = "active";
       }
       elseif ($data_order == "verifikasi 1") {
         $menu_verifikasi1 = "active";
       }
       elseif ($data_order == "verifikasi 2") {
         $menu_verifikasi2 = "active";
       }
       else {
         $menu_empty = "active";
       }

       $x->navpills(array('data'=>'Semua','link'=>'sklk','active'=>isset($menu_empty)?$menu_empty:null,'icon'=>'th-list'));
       $x->navpills(array('data'=>'Diterima','link'=>'sklk/tag/terkirim','icon'=>'envelope-open-o','active'=>isset($menu_terkirim)?$menu_terkirim:null));
       $x->navpills(array('data'=>'Diverifikasi 1','link'=>'sklk/tag/verifikasi-1','icon'=>'hourglass-start','active'=>isset($menu_verifikasi1)?$menu_verifikasi1:null));
       $x->navpills(array('data'=>'Diverifikasi 2','link'=>'sklk/tag/verifikasi-2','icon'=>'check-square-o','active'=>isset($menu_verifikasi2)?$menu_verifikasi2:null));
     $x->endnavpills();
   $x->endbox('body');
   $x->endbox();
 $x->endcolumn();
  ?>
 <!-- col 3 -->

 <!-- col 9 -->
 <?php $x->column(9); ?>
  <?php $x->box('type','success'); ?>
    <?php $x->box('title','Surat Keterangan Lulus Kuliah'); ?>
    <?php $x->box('body'); ?>
    <table class="table table-striped dataTable">
      <thead>
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Dinas</th>
          <th class="text-center">Jumlah</th>
          <th class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($data_dinas as $data) {
          ?>
          <tr>
            <td class="text-center">
              <?php echo $no; ?>
            </td>
            <td>
              <?php $x->pict('dinas/'.$data['dinas_photo'],array('string'=>$data['dinas_nama'])); ?>
            </td>
            <td class="text-center">
              <?php
              if ($data_sort == "semua") {
                // diterima
                ?>
                <span class="label label-info" style="margin-right:5px;">
                  <?php
                  echo $this->db->get_where("tb_eizin",[
                    "eizin_dinas_id" => $data['dinas_id'],
                    "eizin_status"   => 'terkirim',
                    "eizin_type"     => 'SKLK'
                    ])->num_rows();
                  ?>
                  <i class="fa fa-envelope-o"></i>
                </span>
                <?php
                // verifikasi 1
                ?>
                <span class="label label-primary" style="margin-right:5px;">
                  <?php
                  echo $this->db->get_where("tb_eizin",[
                    "eizin_dinas_id" => $data['dinas_id'],
                    "eizin_status"   => 'verifikasi 1',
                    "eizin_type"     => 'SKLK'
                    ])->num_rows();
                  ?>
                  <i class="fa fa-hourglass-start"></i>
                </span>
                <?php
                // verifikasi 2
                ?>
                <span class="label label-success">
                  <?php
                  echo $this->db->get_where("tb_eizin",[
                    "eizin_dinas_id" => $data['dinas_id'],
                    "eizin_status"   => 'verifikasi 2',
                    "eizin_type"     => 'SKLK'
                    ])->num_rows();
                  ?>
                  <i class="fa fa-check-square-o"></i>
                </span>
                <?php
              }
              else{
                ?>
                <span class="text-<?php if($data_sort == "terkirim"){echo "info";}elseif($data_sort == "verifikasi 1"){echo "primary";}else{echo "success";} ?>">
                  <?php
                  echo $this->db->get_where("tb_eizin",[
                    "eizin_dinas_id" => $data['dinas_id'],
                    "eizin_status"   => $data_sort,
                    "eizin_type"     => 'SKLK'
                    ])->num_rows();
                  ?>
                  <i class="fa fa-male"></i>
                </span>
                <?php
              }
               ?>
            </td>
            <td class="text-center">
              <a href="<?php echo ADMIN; ?>sklk/<?php echo $data['dinas_id']; ?>/<?php echo str_replace(' ','-',$data_sort); ?>">
                <button type="button" name="button" class="btn btn-default">
                  <i class="fa fa-eye"></i>
                </button>
              </a>
              <?php
                $jumlah_semua_data = $this->db->get_where("tb_eizin",[
                  "eizin_dinas_id" => $data['dinas_id'],
                  "eizin_type"     => 'SKLK'
                  ])->num_rows();
                $jumlah_data_selesai = $this->db->get_where("tb_eizin",[
                  "eizin_dinas_id" => $data['dinas_id'],
                  "eizin_status"   => 'verifikasi 2',
                  "eizin_type"     => 'SKLK'
                  ])->num_rows();
                if ($jumlah_semua_data == $jumlah_data_selesai) {
                  ?>
                  <button type="button" name="button" class="btn btn-danger delete" data-dinas="<?php echo $data['dinas_id']; ?>">
                    <i class="fa fa-trash"></i>
                  </button>
                  <?php
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
    <?php $x->endbox('body'); ?>
  <?php $x->endbox(); ?>
 <?php $x->endcolumn(); ?>
 <!-- col 3 -->

 <?php $x->endcontent(); ?>


 <script type="text/javascript">
 $('.delete').click(function () {
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
         url : '<?php echo ADMIN; ?>ib/hapus_semua',
         data : {dinas_id:dinas_id},
         success : function () {
           swal({
             type : 'success',
             title : 'Sukses',
             text : 'Berhasil Dihapus'
           },function () {
             window.location = '<?php echo ADMIN; ?>ib';
           })
         }
       })
     },400)
   })
 })
 </script>
