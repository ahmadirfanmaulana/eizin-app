<?php
$x = new TopLibrary();

$x->content();
?>
<div class="col-md-12">
  <ul class="timeline">

      <?php foreach ($data as $key): ?>
        <!-- timeline time label -->
        <?php
        if (substr($key->notif_entri,0,10) == substr($key->notif_entri,0,10)) {
          ?>
          <li class="time-label">
                  <span class="bg-red">
                      <?php echo $x->format_tanggal_real($key->notif_entri); ?>
                  </span>
              </li>
          <?php
        }
         ?>
        <!-- /.timeline-label -->

        <!-- timeline item -->
        <li>
          <!-- timeline icon -->
          <?php
          if ($key->notif_type == "hapus persyaratan") {
            ?>
            <i class="fa fa-trash bg-red"></i>
            <?php
          }
          elseif($key->notif_type == "kirim admin1") {
            ?>
            <i class="fa fa-envelope-o bg-teal"></i>
            <?php
          }
          elseif($key->notif_type == "verifikasi 1") {
            ?>
            <i class="fa fa-hourglass-start bg-blue"></i>
            <?php
          }
          elseif($key->notif_type == "verifikasi 2") {
            ?>
            <i class="fa fa-check-square-o bg-green"></i>
            <?php
          }
          elseif($key->notif_type == "ubah username") {
            ?>
            <i class="fa fa-user-circle bg-purple"></i>
            <?php
          }
          elseif($key->notif_type == "ubah password") {
            ?>
            <i class="fa fa-lock bg-red"></i>
            <?php
          }
           ?>

          <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i>
              <?php echo substr($key->notif_entri,11,5); ?>
            </span>

            <h3 class="timeline-header"><a href="<?php echo $key->notif_link; ?>"><?php echo $key->notif_title; ?></a></h3>

            <div class="timeline-body">
              <?php echo $key->notif_text; ?>
            </div>

            <div class="timeline-footer">
              <?php
              if ($key->notif_type == "ubah username" || $key->notif_type == "ubah password") {
                # code...
              }
              else {
                ?>
                <a class="btn btn-primary btn-xs" href="<?php echo $key->notif_link; ?>">
                  <i class="fa fa-share"></i> Detail
                </a>
                <?php
              }
               ?>
            </div>
          </div>
        </li>
        <!-- END timeline item -->
      <?php endforeach; ?>

      <!-- frist timeline -->
      <?php foreach ($data_user as $data): ?>
        <!-- timeline time label -->
        <li class="time-label">
            <span class="bg-red">
                <?php echo $x->format_tanggal_real($data->user_entri); ?>
            </span>
        </li>
        <!-- /.timeline-label -->

        <!-- timeline item -->
        <li>
            <!-- timeline icon -->
            <i class="fa fa-envelope bg-blue"></i>
            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i>
                  <?php echo substr($data->user_entri,11,5); ?>
                </span>

                <h3 class="timeline-header">Selamat Datang <?php echo $data->user_username; ?></h3>

                <div class="timeline-body">
                    Akun anda dibuat
                </div>

                <div class="timeline-footer">
                    <a href="<?php echo ADMIN; ?>" class="btn btn-primary btn-xs">Pergi Ke Home</a>
                </div>
            </div>
        </li>
      <?php endforeach; ?>
  </ul>
</div>


<?php
$x->endcontent();
 ?>
