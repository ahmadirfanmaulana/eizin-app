<?php
$custom = new SystemLibrary();
$x = new TopLibrary();

foreach ($data as $y) {
  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title></title>
      <style media="screen">
        button{

        }
      </style>
    </head>
    <body>
      <div style="float:left;width:49%">
        <a href="<?php echo URL.$eizin_type."/".$eizin_id."/view"; ?>"><button type="button" name="button">Kembali</button></a>
        <button type="button" name="button" onclick="printC('elem')">Print</button>
      </div>
      <div  style="padding:5px;padding-bottom:60px;margin-bottom:60px;float:left;width:50%;margin:0 auto;display:inline-block;" id="elem">
        <div>
        	<div style="border:1px solid black;width: 100%;height:1000px;">
        		<center>
        			<h1>KARTU PENGAMBILAN</h1>
        			<hr style="width:500px;"><br><br><br><br>
        			Kode<br><br>
        			<div class="kode" style="border: 1px solid black; width: 300px;height:300px;padding-top:5px;">
                <?php echo $custom->qr_pengambilan($y->eizin_kode,'Q',8); ?>
              </div>
        		</center><br><br>
        		<div style="margin-left: 100px;">
              <table style="width:100%">
                <tr>
                  <td style="vertical-align: top;padding-top: 8px;width:30%">Nama</td>
                  <td style="vertical-align: top;padding-top: 8px;width:5%">:</td>
                  <td style="vertical-align: top;padding-top: 8px;width:65%"><?php echo $y->biodata_nama; ?></td>
                </tr>
                <tr>
                  <td style="vertical-align: top;padding-top: 8px;">Dinas</td>
                  <td style="vertical-align: top;padding-top: 8px;">:</td>
                  <td style="vertical-align: top;padding-top: 8px;"><?php echo $y->dinas_nama; ?></td>
                </tr>
                <tr>
                  <td style="vertical-align: top;padding-top: 8px;">Pelayanan</td>
                  <td style="vertical-align: top;padding-top: 8px;">:</td>
                  <td style="vertical-align: top;padding-top: 8px;">
                    <?php
                    if ($y->eizin_type == "IB") {
                      echo "Izin Belajar";
                    }
                    else {
                      echo "Surat Keterangan Lulus Kuliah";
                    }
                     ?>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: top;padding-top: 8px;">Tanggal Pengambilan</td>
                  <td style="vertical-align: top;padding-top: 8px;">:</td>
                  <td style="vertical-align: top;padding-top: 8px;"><?php echo $x->format_tanggal_real($tanggal_pengambilan); ?></td>
                </tr>
                <tr>
                  <td style="vertical-align: top;padding-top: 8px;">Catatan</td>
                  <td style="vertical-align: top;padding-top: 8px;">:</td>
                  <td style="vertical-align: top;padding-top: 8px;">Diharapkan membawa kartu ini pada saat pengambilan Izin belajar dan atau Surat Keterangan Lulus Kuliah di <b>BKPSDM</b> Kabupaten Subang.</td>
                </tr>
              </table>
        			
        		</div>
        		<div style="float:left; margin-right: 250px;margin-left: 50px;">
        		<center><br><br><br><br><br><br><br><br><br><br>
        			<hr style="width:200px;border:1px solid black">
        			Petugas Pelayanan
        		</center>
        		</div>
        		<!-- <div style="float:right; margin-left: 250px;margin-right: 50px;">
        		<center><br><br><br><br><br><br><br><br><br><br><br><br><br>
        			<hr style="width:200px;border:1px solid black">
        			Pengambil
        		</center>
        		</div> -->
        		<div style="float: right;margin-right: 50px;margin-top:-35px;">
        		<center>
        			<hr style="width:200px;border:1px solid black">
        			Pengambil
        		</center>
        		</div>
        	</div>
        </div>
      </div>
      <script type="text/javascript">
      function printC(element){
        var bodyTag = document.body.innerHTML;
        var content = document.getElementById(element).innerHTML;
        document.body.innerHTML = content;
        window.print();
        document.body.innerHTML = bodyTag;
      }
      </script>
    </body>
  </html>



  <?php
}
 ?>
