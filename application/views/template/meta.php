<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>e-Izin - <?php $data_page = isset($data_page)?$data_page:[]; if(count($data_page) > 0){echo $data_page['parent']; ?> | <?php echo $data_page['child'];}else{echo "Home";} ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- icon -->
  <link rel="icon" href="<?php echo ASSET; ?>img/logo.png">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo ASSET; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo ASSET; ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo ASSET; ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo ASSET; ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo ASSET; ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo ASSET; ?>bower_components/jvectormap/jquery-jvectormap.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo ASSET; ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo ASSET; ?>plugins/iCheck/all.css">
  <!-- Sweetalert -->
  <link rel="stylesheet" href="<?php echo ASSET; ?>plugins/sweetalert/sweetalert.css">
  <link rel="stylesheet" href="<?php echo ASSET; ?>plugins/sweetalert/sweetalert-dev.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo ASSET; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo ASSET; ?>bower_components/select2/dist/css/select2.min.css">
  <!-- Jquery Upload -->
  <link rel="stylesheet" href="<?php echo ASSET; ?>dist/css/jquery.uploadPreview.min.css">
  <!-- Viewer -->
  <link rel="stylesheet" href="<?php echo ASSET; ?>dist/css/viewer.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo ASSET; ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo ASSET; ?>dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?php echo ASSET; ?>dist/css/animate.min.css">
  <link rel="stylesheet" href="<?php echo ASSET; ?>dist/css/main.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- custom style -->
  <style media="screen">
    .content-wrapper{
      background: url('<?php echo ASSET; ?>img/bg-line.png')
    }
    @keyframes notif {

    }
    h1,h2,h3,h4,h5,h6{
      font-family: "Poppins";
    }
  </style>

  <!-- jQuery 3 -->
  <script src="<?php echo ASSET; ?>bower_components/jquery/dist/jquery.min.js"></script>
  <link rel="stylesheet" href="<?php echo ASSET; ?>dist/css/jqueryui.css">
  <script src="<?php echo ASSET; ?>dist/js/jquery.uploadPreview.js"></script>
  <script src="<?php echo ASSET; ?>dist/js/popper.js"></script>
  <script src="<?php echo ASSET; ?>dist/js/utils.js"></script>
  <script type="text/javascript" src="<?php echo ASSET; ?>plugins/sweetalert/sweetalert.min.js"></script>
</head>
<body class="hold-transition fixed <?php if($_SESSION['level'] == "dinas"){echo "skin-green layout-top-nav";}elseif($_SESSION['level'] == "admin1"){echo "skin-red fixed";}else{echo "skin-blue fixed";} ?> sidebar-mini">
<div class="wrapper">
