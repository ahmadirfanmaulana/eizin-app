<?php
$x = new TopLibrary();
?>

<!-- box utama -->
<?php
foreach ($data_user as $data) {
$x->content();


$x->column('12');
$x->box('type','success');
  $x->box('title','TENTANG DINAS');
  $x->box('body');
    ?>
    <form class="" action="" method="post" enctype="multipart/form-data">
      <?php echo $data_update; ?>
      <table class="table table-striped table-bordered" style="margin-top:0px;">
        <tr>
          <td style="width:25%">Logo / Photo :</td>
          <td>Nama :</td>
        </tr>
        <tr>
          <td rowspan="5" class="text-center">
            <label for="image-upload" class="img-thumbnail img-circle" id="image-preview" style="background-image:url('<?php echo URL; ?>upload/img/dinas/<?php echo $data->dinas_photo; ?>');background-size:cover;background-position:center;cursor:pointer;background-color:#fff;width:200px;height:200px;"></label>
            <input type="file" name="dinas_photo" id="image-upload" style="display:none" />
            <input type="hidden" name="dinas_photo_then" value="<?php echo $data->dinas_photo; ?>" />
          </td>
          <td>
            <input type="text" name="dinas_nama" value="<?php echo $data->dinas_nama; ?>" class="form-control">
          </td>
        </tr>
        <tr>
          <td>Email :</td>
        </tr>
        <tr>
          <td>
            <input type="text" name="dinas_email" value="<?php echo $data->dinas_email; ?>" class="form-control">
          </td>
        </tr>
        <tr>
          <td>Tanggal Entri :</td>
        </tr>
        <tr>
          <td>
            <input type="text" name="" value="<?php echo $x->format_tanggal($data->dinas_entri); ?>" class="form-control" readonly>
          </td>
        </tr>
      </table>
    <?php
  $x->endbox('body');
  $x->box('footer');
  ?>
  <button type="submit" value="button" name="button" class="btn btn-primary">
    Update
  </button>
  </form>
  <?php
  $x->endbox('footer');
$x->endbox();
$x->endcolumn();

$x->endcontent();
}
 ?>
