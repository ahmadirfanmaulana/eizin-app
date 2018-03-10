<?php
$x = new TopLibrary();
$custom = new SystemLibrary();

$x->content();
$x->column(3);
  $x->box('type','success');
    $x->box('title','Dinas');
    $x->box('body');
     ?>
     <style media="screen">
       #surat *{
         line-height: 15px;
       }
     </style>
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
          <?php foreach ($data_ib as $data): ?>

            <div style="" id="surat">
              <img src="<?php echo ASSET; ?>img/lks.png" style="position: absolute;width:85px;">
            	<div style="padding: 0px 15%;font-family: 'Times New Roman';">
            		<center>
            		<p style="font-weight: normal;margin-bottom:-20px; font-size:18px">PEMERINTAHAN KABUPATEN SUBANG</p>
            		<p style="font-weight: bold; font-size: 20px; margin-bottom: 5px;">BADAN KEPEGAWAIAN DAN PENGEMBANGAN SUMBER DAYA MANUSIA</p>
            		<span style="font-size:13px;">ALAMAT : JALAN KAPTEN TENDEAN NO.1 TELP.(0260)418116-418118 SUBANG</span>
            		</center>
            	</div>
            	<hr>
            	<hr style="background-color: black;margin-top: -7px; border: 2px solid black;">
            	<div style="font-family: sans-serif;">
            		<center style="letter-spacing: 5px">SURAT IZIN</center>
            		<span style="margin-left:200px;">Nomor : <span style="font-size:13px"><?php echo $data->biodata_nomor; ?></span> </span>
            		<center>
            		<p style="font-size: "><b>
            			TENTANG<br>
            			PEMBERIAN IZIN BELAJAR BAGI PEGAWAI NEGERI SIPIL<br>
            			PEMERINTAH KABUPATEN SUBANG<br>
            			BUPATI SUBANG,
            		</b></p>
            		</center>
            		<div style="padding: 0px 5%;font-size: 13px;">
            			<span style="">Dasar<span style="padding-left:100px;">:</span></span><ol type="a" style="">
            			<li>Surat Menteri Pendayagunaan Aparatur dan Reformasi Birokrasi Nomor : B/1299/M.PAS-RB/3/2013 Perihal surat Edaran Menteri Pendayagunaan Aparatur Negara Reformasi Birokrasi Nomor 04 Tahun 2013 tentang Pemberian Tugas Belajar dan izin Belajar tanggal 25 Maret 2013;</li>
            			<li>Peraturan Bupati Subang Nomor 33 Tahun 2015 tentang pemberian izin Belajar, Surat Keterangan Telah Lulus Mengikuti pendidikan Formal dan Ujian penyesuaian kenaikan pangkat pegawwai Negeri Sipil di Lingkungan Pemerintah Kabupaten Subang;</li>
            			<li>Surat dari Kepala <?php echo $data->dinas_nama; ?><br>Nomor :<?php echo $data->biodata_nomor; ?></li></ol>
            			<center style="font-size:16px;"><b>MEMBERI IZIN :</b></center>
            			<span style="padding-bottom: 50px;">Kepada<span style="padding-left:100px;">:</span></span><br>
            			<span style="padding-left:40px;"></span>Nama<span style="padding-right: 100px;"></span>: <b><?php echo $data->biodata_nama; ?></b><br>
            			<span style="padding-left:40px;"></span>NIP<span style="padding-right: 113px;"></span>: <?php echo $data->biodata_nip; ?><br>
            			<span style="padding-left:40px;"></span>Pangkat/ Gol Ruangan : <?php echo $data->biodata_pangkat; ?><br>
            			<span style="padding-left:40px;"></span>Jabatan<span style="padding-right: 85px;"></span> : <?php echo $data->biodata_jabatan; ?><br>
            			<span style="padding-left:40px;"></span>Unit Kerja<span style="padding-right: 78px;"></span>: <?php echo $data->biodata_unit_kerja; ?> <br>
            			<span style="padding-left:40px;"></span>Akreditasi<span style="padding-right: 78px;"></span>: <?php echo $data->biodata_akreditasi; ?><!-- iyeu --><br><br>
            			<span style="padding-bottom: 50px;">Untuk<span style="padding-left:100px;">:</span></span><br>
            			<span style="padding-left:40px;">Mengikuti Kegiatan Pendidikan di Perguruan Tinggi <?php echo $data->biodata_almamater; ?> Pada Program Studi <?php echo $data->biodata_program; ?> Jurusan <?php echo $data->biodata_jurusan; ?> Tahun Akademik <?php echo $data->biodata_tahun_kelulusan; ?></span><br>
            			<span style="padding-left:40px;">Dengan Ketentuan:</span>
            			<ol>
            				<li>Pendidikan yang akan ditempuh dapat mendukung pelaksanaan tugas jabatan pada unit organisasi;</li>
            				<li>Izin belajar ini diberikan diluar jam kerja;</li>
            				<li>Tidak mengikuti program Pendidikan "Kelas Jauh", dan kegiatan pendidikan diselenggarakan oleh lembaga pendidikan Negeri/Swasta yang terakreditasi berdasarkan peraturan perundang-undangan yang berlaku;</li>
            				<li>Biaya ditanggung sepenuhnya oleh yang bersangkutan dan;</li>
            				<li>Tidak akan menuntut penyesuaian ijazah kecuali formasi memungkinkan dan sesuai peraturan perundang-undangan yang berlaku.</li>
            			</ol>
            			<div style="float:right; margin-left:300px;	">
            				<center>Dikeluarkan di Subang<br>
            				Pada Tanggal : <?php echo $x->format_tanggal_real($tanggal_cetak); ?> <br>
            				<b>a.n BUPATI SUBANG<br>
            				KEPALA BADAN KEPEGAWAIAN DAN<br>
            				PENGEMBANGAN SUMBER DAYA MANUSIA<br>
            				KABUPATEN SUBANG<br><br><br><br><br><br>
            				<u>H.J NINA HERLINA, S.Sos., M.Si</u><br>
            				Pembina Tk. I (IV/b)<br>
            				NIP. 19591103 198401 2 001</b></center>
            			</div>
                  <div class="" style="position: absolute; width: 85px;margin-top: 40px;margin-left:100px;">
                    <?php echo $custom->qr_pengambilan($data->eizin_kode,'Q',8); ?>
                  </div>
                  <div class="" style="margin-top:150px;">
                    Tembusan Yth. : <br>
                    <span style="position:absolute;">
                      1. Bupati Subang (sebagai laporan) <br>
                      2. Inspektur Inspektorat Daerah Kabupaten Subang <br>
                      3. Kepala <?php echo $data->dinas_nama; ?>
                    </span>
                  </div>

            		</div>
            	</div>
            </div>

          <?php endforeach; ?>
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
      <?php $x->endbox('body'); ?>
      <?php $x->box('footer'); ?>
      <button type="button" name="button" onclick="printC('surat')" class="btn btn-success">
        <i class="fa fa-print"></i> Print Surat
      </button>
      <?php $x->endbox('footer'); ?>
      <!-- /.box-footer -->

      <?php
    $x->endbox();
  $x->endcolumn();
$x->endcontent();
 ?>

 <script type="text/javascript">
 function printC(element){
   var bodyTag = document.body.innerHTML;
   var content = document.getElementById(element).innerHTML;
   document.body.innerHTML = content;
   window.print();
   document.body.innerHTML = bodyTag;
 }
 </script>
