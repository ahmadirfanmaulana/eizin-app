<?php
/**
 *
 */
class SystemLibrary
{
  private $db_host = "localhost";
  private $db_username = "root";
  private $db_password = "";
  private $db_name = "db_eizin";

  public function db()
  {
    return mysqli_connect($this->db_host,$this->db_username,$this->db_password,$this->db_name);
  }

  public function qr_pengambilan($kode,$errorCorrectionLevel,$matrixPointSize)
  {

        //set it to writable location, a place for temp generated PNG files
        $PNG_TEMP_DIR = 'upload\img\qr'.DIRECTORY_SEPARATOR;
        //html PNG location prefix
        $PNG_WEB_DIR = URL.'upload/img/qr/';

        include "phpqrcode/qrlib.php";

        //ofcourse we need rights to create temp dir
        if (!file_exists($PNG_TEMP_DIR))
            mkdir($PNG_TEMP_DIR);

        //processing form input
        //remember to sanitize user input in real-life solution !!!
        $errorCorrectionLevel = $errorCorrectionLevel;
        $matrixPointSize = $matrixPointSize;

        $filename = $PNG_TEMP_DIR.$kode.'.png';
        QRcode::png($kode, $filename, $errorCorrectionLevel, $matrixPointSize, 2);

        //display generated file
        echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" style="width:99%"/>';


  }
}

 ?>
