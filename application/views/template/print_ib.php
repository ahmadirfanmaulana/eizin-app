<?php
$x = new TopLibrary();
$custom = new SystemLibrary();
foreach ($data_ib as $data): ?>

  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title><?php echo $data->biodata_nama; ?></title>
    </head>
    <body>
      <div style="float:left;width:49%">
        <a href="<?php echo ADMIN; ?>search"><button type="button" name="button">Kembali</button></a>
        <button type="button" name="button" onclick="printC('elem')">Print</button>
      </div>
      <div  style="padding:5px;padding-bottom:60px;margin-bottom:60px;border:1px solid #777;float:left;width:50%;margin:0 auto;display:inline-block;" id="elem">
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
      		<span style="margin-left:200px;">Nomor :
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
    </body>
  </html>

  <script type="text/javascript">
  function printC(element){
    var bodyTag = document.body.innerHTML;
    var content = document.getElementById(element).innerHTML;
    document.body.innerHTML = content;
    window.print();
    document.body.innerHTML = bodyTag;
  }
  </script>

<?php endforeach; ?>
