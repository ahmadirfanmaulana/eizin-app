<?php
$x = new TopLibrary();

$x->content();
$x->column(3);
  $x->box('type','success');
    $x->box('title','Dinas');
    $x->box('body');
     ?>
     <table class="table table-striped">
       <form class="" action="" method="post">
         <tr>
           <td>
             <b>Kode Surat :</b>
           </td>
         </tr>
         <tr>
           <td>
             <select class="form-control select2" name="eizin_kode" data-placeholder="Cari Kode" required>
               <?php
               $post_kode = isset($_POST['eizin_kode'])?$_POST['eizin_kode']:null;
               if (!empty($post_kode)) {
                 ?>
                 <option value="<?php echo $_POST['eizin_kode']; ?>"><?php echo $_POST['eizin_kode']; ?></option>
                 <?php
               }
               else {
                 ?>
                 <option value="">Cari Kode</option>
                 <?php
               }
                ?>
               <?php foreach ($kode_aktif as $datae): ?>
                 <?php
                 if ($datae->eizin_kode == $post_kode) {
                   # code...
                 }
                 else {
                   ?>
                   <option value="<?php echo $datae->eizin_kode; ?>"><?php echo $datae->eizin_kode; ?></option>
                   <?php
                 }
                  ?>
               <?php endforeach; ?>
             </select>
             <!-- <input type="text" name="eizin_kode" value="<?php echo isset($_POST['eizin_kode'])?$_POST['eizin_kode']:null; ?>" class="form-control" placeholder="Kode Surat"> -->
           </td>
         </tr>
     </table>
    <?php
    $x->endbox('body');

    $x->box('footer');
    ?>
    <button type="submit" name="cari" class="btn btn-primary" value="button">
      <i class="fa fa-search"></i> Cari Data
    </button>
    </form>
    <?php
    $x->endbox('footer');
  $x->endbox();
$x->endcolumn();

  $x->column(9);
    $x->box('type','success');
      $x->box('title','Cari Surat');
      $x->box('body','no');
      ?>
      <?php
      if (isset($_POST['cari'])) {
        if ($row > 0) {
          ?>
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Progress</th>
                <th class="text-center">Dinas</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Tipe</th>
                <th class="text-center">Tanggal Entri</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $no = 1;
                foreach ($data as $d) {
                  ?>
                  <tr>
                    <td class="text-center">
                      <?php echo $no; ?>
                    </td>
                    <td class="text-center">
                      <div class="progress progress-sm" style="margin-bottom:0px">
                    <?php
                    if ($d->eizin_status == "terkirim") {
                      ?>
                      <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                        <span class="sr-only">50% Complete</span>
                      </div>
                      <?php
                    }
                    elseif ($d->eizin_status == "verifikasi 1") {
                      ?>
                      <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                        <span class="sr-only">75% Complete</span>
                      </div>
                      <?php
                    }
                    elseif ($d->eizin_status == "verifikasi 2") {
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
                      <?php echo $d->dinas_nama; ?>
                    </td>
                    <td>
                      <?php echo $d->biodata_nama; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $d->eizin_type; ?>
                    </td>
                    <td class="text-center">
                      <?php echo $x->format_tanggal($d->eizin_date_kirim); ?>
                    </td>
                    <td>
                      <?php
                      if ($d->eizin_type == "IB") {
                        $link_eizin = "ib";
                      }
                      else {
                        $link_eizin = "sklk";
                      }
                       ?>
                      <a href="<?php echo ADMIN.$link_eizin; ?>/<?php echo $d->eizin_id; ?>/print">
                      <button type="button" name="button" class="btn btn-success">
                        <i class="fa fa-print"></i>
                      </button>
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
        }
        else {
          ?>
          Data tidak ditemukan...
          <?php
        }
      }
      else {
        ?>
        Isikan inputan di form untuk memulai pencarian...
        <?php
      }
       ?>
      <?php $x->endbox('footer'); ?>

      <?php $x->endbox('footer'); ?>
      <!-- /.box-footer -->

      <?php
    $x->endbox();
  $x->endcolumn();
$x->endcontent();
 ?>

 <script type="text/javascript">
 $(document).ready(function () {

 })
 </script>
