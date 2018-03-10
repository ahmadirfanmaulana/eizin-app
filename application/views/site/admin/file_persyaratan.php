<?php
$x = new TopLibrary();

$x->content();
  $x->column(3);  
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
            <th class="text-center">Dinas</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Lampiran</th>
            <th class="text-center">Diupload</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($data_attachment as $data) {
            if ($data->eizin_type == "IB") {
              $url_type = "ib";
            }
            else {
              $url_type = "sklk";
            }
            ?>
            <tr>
              <td class="text-center"><?php echo $no; ?></td>
              <td>
                <?php $x->pict('dinas/'.$data->dinas_photo,array('string'=>$data->dinas_nama)); ?>
              </td>
              <td class="text-center"><?php echo $data->biodata_nama; ?></td>
              <td class="text-center"><?php echo $data->at_nama; ?></td>
              <td class="text-center"><?php echo $x->format_tanggal($data->attachment_entri); ?></td>
              <td class="text-center">
                <a href="<?php echo URL; ?>upload/attachment/dinas<?php echo $data->dinas_id; ?>/<?php echo $url_type.$data->eizin_id; ?>/<?php echo $data->attachment_file_name; ?>" target="_blank">
                  <button type="button" name="button" class="btn btn-default" title="Download"  value="">
                    <i class="fa fa-cloud-download"></i>
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
