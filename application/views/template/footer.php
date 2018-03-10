<?php
  if ($_SESSION['level'] == "dinas") {
    ?>
    </div>
    <?php
  }
 ?>
</div> <!-- wrapper -->
<footer class="main-footer" style="background-color:#222d32;">
  <div class="pull-right hidden-xs">
    <b> <span style="color:#ffcd03;">BKPSDM</span> </b> <span style="color:#fff;">Kabupaten Subang</span>
  </div>
  <span style="width:30px;">
    <img src="<?php echo ASSET; ?>img/logo.jpg" alt="" style="width:25px;height:25px;border-radius:50%;">
  </span>
  <strong><span style="color:#ffcd03;">CREW BANG</span>
  </strong>
  <span style="color:#fff;">RIER</span>
</footer>

<div class="preloader" style="position:fixed;width:100%;height:600px;background:red">

</div>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo ASSET; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo ASSET; ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo ASSET; ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo ASSET; ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- fengyuanchen -->
<script src="<?php echo ASSET; ?>dist/js/common.js"></script>
<script src="<?php echo ASSET; ?>dist/js/viewer.js"></script>
<script src="<?php echo ASSET; ?>dist/js/main.js"></script>
<!-- DataTables -->
<script src="<?php echo ASSET; ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo ASSET; ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo ASSET; ?>plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo ASSET; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Select2 -->
<script src="<?php echo ASSET; ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- FastClick -->
<script src="<?php echo ASSET; ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo ASSET; ?>dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo ASSET; ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?php echo ASSET; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo ASSET; ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?php echo ASSET; ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo ASSET; ?>bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo ASSET; ?>dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo ASSET; ?>dist/js/demo.js"></script>

<script type="text/javascript">
// preloader
$(document).ready(function () {
  $('.preloader').fadeOut();
})

  $('.select2').select2();
  $('*').click(function () {
    $.ajax({
      method : 'post',
      url : '<?php echo URL; ?>get_rows_notif_delive',
      success : function (r) {
        $('.row_notif').html(r);
      }
    })
  })
  $('.row_notif').click(function () {
    $.ajax({
      method : 'post',
      url : '<?php echo URL; ?>notif_read',
      success : function (r) {
      }
    })

    $.ajax({
      method : 'post',
      url : '<?php echo URL; ?>get_list_notif',
      success : function (r) {
        $('.list-notif').html(r);
      }
    })

  })

  $(document).ready(function() {
    $.uploadPreview({
      input_field: "#image-upload",
      preview_box: "#image-preview",
      label_field: "#image-label"
    });
    //Add text editor
    $(".editor").wysihtml5();
  });
  //Date picker
  $('.datepicker').datepicker({
    autoclose: true
  })

  $('input[type="radio"]').iCheck({
    checkboxClass: 'icheckbox_flat-blue',
    radioClass: 'iradio_flat-blue'
  });

  $('.dataTable').DataTable();
  $('input[type="checkbox"], input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    <?php
    if ($_SESSION['level'] == "admin1") {
      ?>
      $('.box').
      removeClass("box-success").
      removeClass("box-primary").
      removeClass("box-warning").
      addClass("box-danger");
      $('.nav-stacked>li.active>a, .nav-stacked>li.active>a:hover').
      css({"border-left-color":"#dd4b39"});
      <?php
    }
    elseif ($_SESSION['level'] == "admin2") {
      ?>
      $('.box').
      removeClass("box-success").
      removeClass("box-danger").
      removeClass("box-warning").
      addClass("box-primary");
      $('.nav-stacked>li.active>a, .nav-stacked>li.active>a:hover').
      css({"border-left-color":"#3c8dbc"});
      <?php
    }
    else {
      ?>
      $('.box').
      removeClass("box-primary").
      removeClass("box-danger").
      removeClass("box-warning").
      addClass("box-success");
      $('.nav-stacked>li.active>a, .nav-stacked>li.active>a:hover').
      css({"border-left-color":"#00a65a"});
      <?php
    }
     ?>

     $('button,.btn').click(function () {
       value = $(this).html();

       $(this).html(value+"...");
     })
</script>
</body>
</html>
