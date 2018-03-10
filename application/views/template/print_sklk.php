<?php
$custom = new SystemLibrary();
$x= new TopLibrary();
foreach ($data_sklk as $data): ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $data->dinas_nama; ?> - <?php echo $data->biodata_nama; ?></title>
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
      <div style="font-family: sans-serif; font-size: 13px;"><br>
        <center>
        <b><u>SURAT KETERANGAN BELAJAR</u></b>
        </center>
        <span style="margin-left:247px;">Nomor : </span>
        <div style="padding:0px 5%;">
          Yang Bertanda tangan di bawah ini:
          <ol type="a" style="margin-left:-25px;margin-top: 0px;">
            <li>Nama<span style="padding-right: 100px;"></span>: <b>Hj. NINA HERLINA, S.Sos, M.Si</b></li>
            <li>Jabatan<span style="padding-right: 89px;"></span>: <b>Kepala BKPPSDM Kabupaten Subang</b></li>
          </ol>
          Dengan ini menerangkan :
          <ol type="a" style="margin-left:-25px;margin-top: 0px;">
            <li>Nama<span style="padding-right: 100px;"></span>: <b><?php echo $data->biodata_nama; ?></b></li>
            <li>NIP<span style="padding-right: 113px;"></span>: <?php echo $data->biodata_nip; ?></b></li>
            <li>Pangkat / Gol. Ruang &nbsp&nbsp;: <?php echo $data->biodata_pangkat; ?></li>
            <li>Jabatan<span style="padding-right: 89px;"></span>: <?php echo $data->biodata_jabatan; ?></li>
            <li>Unit Kerja<span style="padding-right: 78px;"></span>: <?php echo $data->biodata_unit_kerja; ?></li>
          </ol>
          Bahwa yang bersangkutan telah menyelesaikan pendidikan dan mendapat ijazah pada :<br>
          Sekolah / Perguruan Tinggi : <?php echo $data->biodata_almamater; ?><br>
          Akreditasi<span style="padding-right: 103px;"></span>: <?php echo $data->biodata_akreditasi; ?><br>
          Penyelenggara<span style="padding-right: 73px;"></span>: <?php echo $data->biodata_penyelenggara; ?><br>
          Jurusan / Program<span style="padding-right: 53px;"></span>: <?php echo $data->biodata_jurusan; ?><br>
          Nomor Ijazah<span style="padding-right: 83px;"></span>: <?php echo $data->biodata_no_ijazah; ?><br>
          Tahun Kelulusan<span style="padding-right: 64px;"></span>: <?php echo $data->biodata_tahun_kelulusan; ?><br>
          Nilai / IPK<span style="padding-right: 103px;"></span>: <?php echo $data->biodata_nilai; ?><br><br>
          Dasar<span style="padding-right: 73px;"></span>:
          <div style="margin-left:50px;">
            <ol type="a">
              <li>Surat Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor : B/1299/M.PAN-RB/3/2013 Perihal Surat Edaran Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 04 Tahun 2013 tentang Pemberian Tugas Belajar dan Izin Belajar tanggal 25 Maret 2013;</li>
              <li>Peraturan Bupati Subang Nomor 33 Tahun 2015 tentang Pemberian Izin Belajar, Surat Keterangan Telah Lulus Mengikuti Pendidikan Formal dan Ujian Penyesuaian Kenaikan Pangkat Pegawai Negeri Sipil di Lingkungan Pemerintah Kabupaten Subang;</li>
              <li>
                Surat Dari Dinas Kesehatan Kab.Subang<br>
                Nomor &nbsp; : <?php echo $data->biodata_nomor; ?><br>
                Tanggal : <?php echo $x->format_tanggal_real($data->biodata_tanggal_surat); ?><br>
                Perihal &nbsp; : Permohonan Keterangan Lulus Pendidikan
              </li>
            </ol>
          </div>
          Demikian surat keterangan ini dibuat dengan ketentuan tidak menuntut penyesuaian ijazah kecuali formasi memungkinkan dan sesuai Peraturan Perundang-undangan yang berlaku.
        </div><br>
        <div style="float:right; margin-left:300px;	">
          <center>Dikeluarkan di Subang<br>
          Pada Tanggal <?php echo $x->format_tanggal_real($tanggal_cetak); ?> <br>
          <b>KEPALA BADAN KEPEGAWAIAN DAN<br>
          PENGEMBANGAN SUMBER DAYA MANUSIA<br>
          KABUPATEN SUBANG<br><br><br><br><br><br>
          <u>H.J NINA HERLINA, S.Sos., M.Si</u><br>
          Pembina Tk. I (IV/b)<br>
          NIP. 19591103 198401 2 001</b></center>
        </div>
        <div class="" style="position: absolute; width: 85px;margin-top: 60px;margin-left:100px;">
          <?php echo $custom->qr_pengambilan($data->eizin_kode,'Q',8); ?>
        </div>
        <div style="margin-top:180px;">
        Tembusan Yth. :<br>
        <ol>
          <li>Bupati Subang (sebagai laporan);</li>
          <li>Kepala <?php echo $data->dinas_nama; ?></li>
        </ol>
        </div>
      </div>
    </div>


    <?php endforeach; ?>
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
