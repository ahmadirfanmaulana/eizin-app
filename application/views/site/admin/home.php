<?php
$x = new TopLibrary();
?>

<!-- box utama -->
<div class="col-md-4">
  <div class="small-box bg-yellow">
    <div class="inner">
      <h3><?php echo $data['dinas']; ?></h3>

      <p>Dinas</p>
    </div>
    <div class="icon">
      <i class="fa fa-university"></i>
    </div>
    <a href="<?php echo ADMIN; ?>dinas" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<div class="col-md-4">
  <div class="small-box bg-red">
    <div class="inner">
      <h3><?php echo $data['lampiran']; ?></h3>
      <p>Lampiran</p>
    </div>
    <div class="icon">
      <i class="fa fa-paperclip"></i>
    </div>
    <a href="<?php echo ADMIN; ?>lampiran" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<div class="col-md-4">
  <div class="small-box bg-purple">
    <div class="inner">
      <h3><?php echo $data['attachment']; ?></h3>

      <p>File Persyaratan</p>
    </div>
    <div class="icon">
      <i class="fa fa-cloud-upload"></i>
    </div>
    <a href="<?php echo ADMIN; ?>file" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>
<?php
$x->content();
if ($_SESSION['level'] == "admin1") {
  $x->column('6');
  ?>
  <div class="small-box bg-aqua">
    <div class="inner">
      <h3><?php echo $data['persyaratan_ib_terkirim']; ?></h3>

      <p>Izin Belajar : <br> <i class="fa fa-envelope-open-o"></i> Diterima</p>
    </div>
    <div class="icon">
      <i class="fa fa-book"></i>
      <i class="fa fa-envelope-open-o"></i>
    </div>
    <a href="<?php echo ADMIN; ?>ib/tag/terkirim" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
  <?php
  $x->endcolumn();

  $x->column('6');
  ?>
  <div class="small-box bg-aqua">
    <div class="inner">
      <h3><?php echo $data['persyaratan_sklk_terkirim']; ?></h3>

      <p>SK Lulus Kuliah : <br> <i class="fa fa-envelope-o"></i> Diterima</p>
    </div>
    <div class="icon">
      <i class="fa fa-graduation-cap"></i>
      <i class="fa fa-envelope-open-o"></i>
    </div>
    <a href="<?php echo ADMIN; ?>sklk/tag/terkirim" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
  <?php
  $x->endcolumn();

  $x->column('6');
  ?>
  <div class="small-box bg-green">
    <div class="inner">
      <h3><?php echo $data['persyaratan_ib_verifikasi2']; ?></h3>

      <p>Izin Belajar : <br> <i class="fa fa-print"></i> Diverifikasi ke-2</p>
    </div>
    <div class="icon">
      <i class="fa fa-book"></i>
      <i class="fa fa-print"></i>
    </div>
    <a href="<?php echo ADMIN; ?>ib/tag/verifikasi-2" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
  <?php
  $x->endcolumn();

  $x->column('6');
  ?>
  <div class="small-box bg-green">
    <div class="inner">
      <h3><?php echo $data['persyaratan_sklk_verifikasi2']; ?></h3>

      <p>SK Lulus Kuliah : <br> <i class="fa fa-print"></i> Diverifikasi ke-2</p>
    </div>
    <div class="icon">
      <i class="fa fa-graduation-cap"></i>
      <i class="fa fa-print"></i>
    </div>
    <a href="<?php echo ADMIN; ?>sklk/tag/verifikasi-2" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
  <?php
  $x->endcolumn();

  // in here
}
else {
  $x->column('6');
  ?>
  <div class="small-box bg-blue">
    <div class="inner">
      <h3><?php echo $data['persyaratan_ib_verifikasi1']; ?></h3>

      <p>Izin Belajar : <br> <i class="fa fa-hourglass-start"></i> Diverifikasi ke-1</p>
    </div>
    <div class="icon">
      <i class="fa fa-book"></i>
      <i class="fa fa-hourglass-start"></i>
    </div>
    <a href="<?php echo ADMIN; ?>ib/tag/verifikasi-1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
  <?php
  $x->endcolumn();
  $x->column('6');
  ?>
  <div class="small-box bg-blue">
    <div class="inner">
      <h3><?php echo $data['persyaratan_sklk_verifikasi1']; ?></h3>

      <p>SK Lulus Kuliah : <br> <i class="fa fa-hourglass-start"></i> Diverifikasi ke-1</p>
    </div>
    <div class="icon">
      <i class="fa fa-graduation-cap"></i>
      <i class="fa fa-hourglass-start"></i>
    </div>
    <a href="<?php echo ADMIN; ?>sklk/tag/verifikasi-1" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
  <?php
  $x->endcolumn();
}

?>
<div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">
        <?php
        if ($_SESSION['level'] == "admin2") {
          echo "Diverifikasi ke-1 Terbaru";
        }
        else {
          echo "Diterima &amp; Diverifikasi ke-2 Terbaru";
        }
         ?>
      </h3>
    </div>
    <div class="box-body">
      <table class="table table-striped table-hover table-bordered">
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Progress</th>
          <th class="text-center">Dinas</th>
          <th class="text-center">NIP</th>
          <th class="text-center">Nama</th>
          <th class="text-center">Tanggal Entri</th>
          <th class="text-center">Aksi</th>
        </tr>
        <tbody>
          <?php
          $no = 1;
          if ($data['data_eizin']->num_rows() == 0) {
            ?>
            <tr>
              <td colspan="7" class="text-center">Data Kosong</td>
            </tr>
            <?php
          }
          else {
            foreach ($data['data_eizin']->result() as $data) {
              $this->db->where('at_type','IB');
              $this->db->or_where('at_type','semua');
              $count_at = $this->db->get("tb_attachment_type")->num_rows();
              $count_attachment = $this->db->get_where("tb_attachment",[
                "attachment_eizin_id" => $data->eizin_id
                ])->num_rows();
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
                  <td>
                    <?php $x->pict('dinas/'.$data->dinas_photo,array('string'=>$data->dinas_nama)); ?>
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
                  <td class="text-center">
                    <a href="<?php echo ADMIN . strtolower($data->eizin_type); ?>/<?php echo $data->dinas_id; ?>/<?php echo $data->eizin_id; ?>/verifikasi-1">
                      <button type="button" name="button" class="btn btn-default" title="Lihat" data-toggle="tooltip">
                        <i class="fa fa-share"></i>
                      </button>
                    </a>
                  </td>
                </tr>
                <?php
                $no++;
              }
          }
           ?>
        </tbody>
      </table>
    </div>
    <div class="box-footer">
      <a href="<?php echo ADMIN."ib/tag/terkirim"; ?>">
        <button type="button" name="button" class="btn btn-primary">
          <i class="fa fa-home"></i> Lihat Izin Belajar
        </button>
      </a>
      <a href="<?php echo ADMIN."sklk/tag/terkirim"; ?>">
        <button type="button" name="button" class="btn btn-default">
          <i class="fa fa-refresh"></i> Lihat SK Lulus Kuliah
        </button>
      </a>
    </div>
  </div>
</div>
<?php

$x->endcontent();
 ?>
