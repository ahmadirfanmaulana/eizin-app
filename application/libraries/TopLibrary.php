<?php
/**
 *
 */
class TopLibrary
{

  private $db_host = "localhost";
  private $db_username = "root";
  private $db_password = "";
  private $db_name = "db_eizin";

  public function db()
  {
    return mysqli_connect($this->db_host,$this->db_username,$this->db_password,$this->db_name);
  }

  public function end()
  {
    ?>
    </div>
    <?php
  }
 public function box($type,$value=null)
 {
   if ($type == "type") {
     ?>
     <div class="box box-<?php echo $value; ?>">
       <?php
   }
   elseif ($type == "title") {
     ?>
     <div class="box-header with-border">
       <h3 class="box-title"><?php echo strtoupper($value); ?></h3>
     </div>
     <?php
   }
   elseif ($type == "body") {
     ?>
     <div class="box-body <?php echo $value; ?>">
     <?php
   }
   elseif ($type == "footer") {
     ?>
     <div class="box-footer">
     <?php
   }
 }
 public function endbox($type=null)
 {
   $this->end();
 }
 public function navpills($data=null)
 {
   $user_level = $_SESSION['level'];
   if ($user_level == "admin1" || $user_level == "admin2") {
    $user_link = ADMIN;
   }
   else {
     $user_link = URL;
   }
   if (empty($data)) {
     ?>
     <ul class="nav nav-pills nav-stacked">
     <?php
   }
   else {
     ?>
     <li class="<?php echo isset($data['active'])?$data['active']:null; ?>">
       <a href="<?php echo $user_link.$data['link']; ?>"><i class="fa fa-<?php echo isset($data['icon'])?$data['icon']:null; ?>"></i>
         <?php echo $data['data']; ?>
       </a>
     </li>
     <?php
   }
 }
 public function endnavpills()
 {
   ?>
  </ul>
   <?php
 }
 public function content()
 {
   ?>
   <section class="content">
    <div class="row">
   <?php
 }
 public function endcontent()
 {
   $this->end().$this->end();
 }
 public function column($value,$offset=null)
 {
   if (!empty($offset)) {
     $offset = "col-md-offset-".$offset;
   }
    ?>
     <div class="col-md-<?php echo $value ?> <?php echo $offset; ?>">
    <?php
 }
 public function endcolumn()
 {
   $this->end();
 }
 public function icon($value)
 {
   ?>
   <i class="fa fa-<?php echo $value; ?>"></i>
   <?php
 }
 public function button($type,$value,$attribut=null)
 {
   ?>
   <button type="button" name="button" class="btn btn-<?php echo $type; ?>" <?php echo $attribut; ?>><?php echo $value; ?></button>
   <?php
 }
 public function tag($tag,$data=null)
 {
   ?>
   <<?php echo $tag; ?> <?php echo isset($data['attr'])?$data['attr']:null; ?> class="<?php echo isset($data['class'])?$data['class']:null; ?>">
   <?php
 }
 public function endtag($tag)
 {
   ?>
   </<?php echo $tag; ?>>
   <?php
 }
 public function encription_password($password)
 {
   // karakter untuk lebih aman
   $string_run = "tahubulatdigorengdadakan";
   // konversi password
   $md5_password = md5($password.$string_run);
   $step_1 = substr($md5_password,0,7);
   $step_2 = substr($md5_password,8,15);
   $step_3 = substr($md5_password,16,24);
   $step_4 = substr($md5_password,25,32);
   // password now
   $password_now = $step_3.$step_4.$step_1.$step_2;
   return $password_now;
 }
 public function pict($url,$data)
 {
   ?>
   <ul class="docs-pictures">
     <li style="width:100%">
         <div style="width:25px;height:25px;background-image:url('<?php echo URL; ?>upload/img/<?php echo $url; ?>');background-size:cover;background-position:center;cursor:pointer;" class="img-circle img-thumbnail" data-toggle="tooltip" title="">
           <img data-original="<?php echo URL; ?>upload/img/<?php echo $url; ?>" class="img-thumbnail img-circle" src="" style="width:100%;height:100%;opacity:0">
         </div>
         <?php echo isset($data['string'])?$data['string']:null; ?>
       </li>
    </ul>
   <?php
 }

 public function format_tanggal($tanggal)
 {
   date_default_timezone_set("Asia/Jakarta");

   $day = substr($tanggal,8,2);
   $month = substr($tanggal,5,2);
   $year = substr($tanggal,0,4);

   if ($month == "01") {
     $month = "Jan.";
   }
   elseif ($month == "02") {
     $month = "Feb.";
   }
   elseif ($month == "03") {
     $month = "Mar.";
   }
   elseif ($month == "04") {
     $month = "Apr.";
   }
   elseif ($month == "05") {
     $month = "Mei.";
   }
   elseif ($month == "06") {
     $month = "Jun.";
   }
   elseif ($month == "07") {
     $month = "Jul.";
   }
   elseif ($month == "08") {
     $month = "Agu.";
   }
   elseif ($month == "09") {
     $month = "Sep.";
   }
   elseif ($month == "10") {
     $month = "Okt.";
   }
   elseif ($month == "11") {
     $month = "Nov.";
   }
   elseif ($month == "12") {
     $month = "Des.";
   }
   else{
     $month = "00";
   }

   $hour = substr($tanggal,11,2);
   if ($hour>12) {
     $hour_type = "PM";
     $hour = $hour - 5;
   }
   else {
     $hour_type = "AM";
     $hour = $hour;
   }
   $minute = substr($tanggal,14,2);

   $longtime = strtotime(date('Y-m-d H:i:s')) - strtotime($tanggal);
   if ($longtime >= 86400 && $longtime < 172800) {
     return "Kemarin";
   }
   elseif ($longtime < 86400) {
     $awal = date_create($tanggal);
     $akhir = date_create();
     $diff = date_diff($awal,$akhir);
     if ($diff->h > 0) {
       $hasil = $diff->h." jam ";
     }
     elseif($diff->i > 0) {
       $hasil = $diff->i." menit ";
     }
     else {
       $hasil = $diff->s." detik ";
     }
     return $hasil."yang lalu";
   }
   else{
     if (strlen($tanggal) == 10) {
       return "$day $month $year";
     }
     elseif (strlen($tanggal) == 19) {
       return "$day $month $year $hour:$minute $hour_type";
     }
   }
 }

 public function format_tanggal_real($tanggal)
 {
   $day = substr($tanggal,8,2);
   $month = substr($tanggal,5,2);
   $year = substr($tanggal,0,4);

   if ($month == "01") {
     $month = "Januari";
   }
   elseif ($month == "02") {
     $month = "Febuari";
   }
   elseif ($month == "03") {
     $month = "Maret";
   }
   elseif ($month == "04") {
     $month = "April";
   }
   elseif ($month == "05") {
     $month = "Mei.";
   }
   elseif ($month == "06") {
     $month = "Juni";
   }
   elseif ($month == "07") {
     $month = "Juli";
   }
   elseif ($month == "08") {
     $month = "Agustus";
   }
   elseif ($month == "09") {
     $month = "September";
   }
   elseif ($month == "10") {
     $month = "Oktober";
   }
   elseif ($month == "11") {
     $month = "November";
   }
   elseif ($month == "12") {
     $month = "Desember";
   }
   else{
     $month = "00";
   }


     return "$day $month $year";

 }

 public function feedback_tanggal($tanggal)
 {
   $day = substr($tanggal,8,2);
   $month = substr($tanggal,5,2);
   $year = substr($tanggal,0,4);

   return "$month/$day/$year";
 }
 public function alert_success($h4,$p)
 {
   return '<div class="alert alert-success animated bounceInDown">
     <h4> <i class="fa fa-check-square"></i> '.$h4.'</h4>
     '.$p.'
   </div>';
 }
 public function alert_danger($h4,$p)
 {
   return '<div class="alert alert-danger animated shake">
     <h4> <i class="fa fa-times"></i> '.$h4.'</h4>
     '.$p.'
   </div>';
 }

}

 ?>
