<?php

/**
 *
 */
class AdministratorIb extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->TopModel->encription_page('admin');
  }

  public function index()
  {
    // data model
    $this->db->distinct();
    $this->db->select('dinas_id,dinas_nama,dinas_photo');
    $this->db->from('tb_dinas');
    $this->db->join('tb_eizin','tb_dinas.dinas_id = tb_eizin.eizin_dinas_id');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->where('eizin_status !=','belum dikirim');
    $this->db->where('eizin_type','IB');
    $this->db->order_by('biodata_entri','desc');
    $data['data_dinas'] = $this->db->get()->result_array();
    $data['data_sort'] = "semua";
    // breadcrumb
    $breadcrumb['data'] = array('home','izin belajar');
    $breadcrumb['link'] = array('');
    // get template
    $this->TopModel->get_template('ib/ib_home',$breadcrumb,$data,"Izin Belajar");

  }

  public function tag($value)
  {
    // data model
    $this->db->distinct();
    $this->db->select('dinas_id,dinas_nama,dinas_photo');
    $this->db->from('tb_dinas');
    $this->db->join('tb_eizin','tb_dinas.dinas_id = tb_eizin.eizin_dinas_id');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->where('eizin_status',str_replace('-',' ',$value));
    $this->db->where('eizin_type','IB');
    $this->db->order_by('biodata_entri','desc');
    $data['data_dinas'] = $this->db->get()->result_array();
    $data['data_sort'] = str_replace('-',' ',$value);
    // breadcrumb
    $breadcrumb['data'] = array('home','izin belajar');
    $breadcrumb['link'] = array('');
    // get template
    $this->TopModel->get_template('ib/ib_home',$breadcrumb,$data,"Izin Belajar");
  }

  public function view($dinas_id,$value)
  {
    // data model
    $data['data_dinas'] = $this->db->get_where('tb_dinas',array('dinas_id'=>$dinas_id))->result();
    $this->db->select('*');
    $this->db->from('tb_eizin');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->where('eizin_dinas_id',$dinas_id);
    $this->db->where('eizin_type','IB');
    if ($value!="semua") {
      $this->db->where('eizin_status',str_replace('-',' ',$value));
    }
    else {
      $this->db->where('eizin_status !=','belum dikirim');
    }
    $this->db->order_by('eizin_date_kirim','DESC');
    $data['data_eizin'] = $this->db->get()->result();
    $data['dinas_id'] = $dinas_id;
    $data['data_sort'] = str_replace('-',' ',$value);
    if($value!="semua"){$value = "/tag/$value";}
    else{$value="";}
    // breadcrumb
    $breadcrumb['data'] = array('home','izin belajar','list izin belajar');
    $breadcrumb['link'] = array('','ib'.$value);
    // get template
    $this->TopModel->get_template('ib/ib_dinas',$breadcrumb,$data,"Izin Belajar");
  }
  public function view_eizin($dinas_id,$eizin_id,$value)
  {
    // data model
    $data['data_dinas'] = $this->db->get_where('tb_dinas',array('dinas_id'=>$dinas_id))->result();
    $this->db->select('*');
    $this->db->from('tb_eizin');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->where('eizin_dinas_id',$dinas_id);
    $this->db->where('eizin_id',$eizin_id);
    $this->db->where('eizin_type','IB');
    $data['data_table'] = $this->db->get()->result();
    $data['dinas_id'] = $dinas_id;
    $data['eizin_id'] = $eizin_id;
    $data['data_sort'] = str_replace('-',' ',$value);
    if($value!="semua"){$link = "/tag/$value";}
    else{$link="";}
    // breadcrumb
    $breadcrumb['data'] = array('home','izin belajar','list izin belajar','lihat');
    $breadcrumb['link'] = array('','ib'.$link,'ib/'.$dinas_id.'/'.$value);
    // get template
    $this->TopModel->get_template('ib/ib_view',$breadcrumb,$data,"Izin Belajar");
  }

  public function verifikasi_satu()
  {
    $data_id = $_POST['data_id'];
    if (isset($data_id)) {
      $data = array('eizin_status'=>'verifikasi 1','eizin_date_kirim'=>date('Y-m-d H:i:s'));
      $this->db->where('eizin_id',$data_id);
      $this->db->where('eizin_type','IB');
      $this->db->update('tb_eizin',$data);

      // notif to dinas
      $this->db->select('*');
      $this->db->from('tb_eizin');
      $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
      $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_eizin.eizin_dinas_id');
      $this->db->join('tb_users','tb_users.user_dinas_id = tb_dinas.dinas_id');
      $this->db->where('eizin_id',$data_id);
      foreach ($this->db->get()->result() as $data) {
        $data_notif = array(
          'notif_user_id' => $this->session->userdata('id'),
          'notif_to_user_id' => $data->user_id,
          'notif_eizin_id' => $data->eizin_id,
          'notif_title' => $data->dinas_nama. ' : '.$data->biodata_nama.' telah diverifikasi ke-1',
          'notif_type' => 'verifikasi 1',
          'notif_text' => 'Persyaratan Izin Belajar '.$data->biodata_nama.' telah diverifikasi ke-1 oleh admin',
          'notif_link' => 'ib/'.$data->eizin_id.'/view',
          'notif_status' => 'delive',
          'notif_entri' => date('Y-m-d H:i:s')
        );

        $this->db->insert('tb_notif',$data_notif);

        // ke admin 2
        $data_notif = array(
          'notif_user_id' => $this->session->userdata('id'),
          'notif_to_user_id' => $this->TopModel->admin2_id(),
          'notif_eizin_id' => $data->eizin_id,
          'notif_title' => $data->dinas_nama. ' : '.$data->biodata_nama.' telah diverifikasi ke-1',
          'notif_type' => 'verifikasi 1',
          'notif_text' => 'Persyaratan Izin Belajar '.$data->biodata_nama.' telah diverifikasi ke-1. Silahkan Verifikasi ke-2',
          'notif_link' => 'ib/'.$data->dinas_id."/".$data->eizin_id.'/verifikasi-1',
          'notif_status' => 'delive',
          'notif_entri' => date('Y-m-d H:i:s')
        );

        $this->db->insert('tb_notif',$data_notif);
      }
    }
  }
  public function verifikasi_dua()
  {
    $data_id = $_POST['data_id'];
    if (isset($data_id)) {
      $data = array('eizin_status'=>'verifikasi 2','eizin_date_kirim'=>date('Y-m-d H:i:s'));
      $this->db->where('eizin_id',$data_id);
      $this->db->where('eizin_type','IB');
      $this->db->update('tb_eizin',$data);

      // notif to dinas
      $this->db->select('*');
      $this->db->from('tb_eizin');
      $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
      $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_eizin.eizin_dinas_id');
      $this->db->join('tb_users','tb_users.user_dinas_id = tb_dinas.dinas_id');
      $this->db->where('eizin_id',$data_id);
      foreach ($this->db->get()->result() as $data) {

        if (!empty($data->dinas_email)) {
          // kirim notifikasi email ke admin
          if ($this->TopModel->email_active == "on") {
            $from = $this->TopModel->email_admin();
            $to = $data->dinas_email;
            $subject = "Admin 2 telah Memverifikasi Persyaratan Surat Izin Belajar atas nama ".$data->biodata_nama;
            $pesan = "Cetak kartu pengambilan untuk ditukarkan dengan surat kepada petugas pelayanan";
            $header = "From:".$from;
            mail($to,$subject,$pesan,$header);
          }
        }

        $data_notif = array(
          'notif_user_id' => $this->session->userdata('id'),
          'notif_to_user_id' => $data->user_id,
          'notif_eizin_id' => $data->eizin_id,
          'notif_title' => $data->dinas_nama. ' : '.$data->biodata_nama.' telah diverifikasi ke-2',
          'notif_type' => 'verifikasi 2',
          'notif_text' => 'Silahkan print dan tukarkan kartu pengambilan untuk mendapatkan surat',
          'notif_link' => 'ib/'.$data->eizin_id.'/view',
          'notif_status' => 'delive',
          'notif_entri' => date('Y-m-d H:i:s')
        );

        $this->db->insert('tb_notif',$data_notif);

        $data_notif = array(
          'notif_user_id' => $this->session->userdata('id'),
          'notif_to_user_id' => $this->TopModel->admin1_id(),
          'notif_eizin_id' => $data->eizin_id,
          'notif_title' => $data->dinas_nama. ' : '.$data->biodata_nama.' telah diverifikasi ke-2',
          'notif_type' => 'verifikasi 2',
          'notif_text' => 'Anda bisa print surat apabila dinas menyerahkan kartu pengambilan untuk dicari',
          'notif_link' => 'ib/'.$data->dinas_id."/".$data->eizin_id.'/verifikasi-2',
          'notif_status' => 'delive',
          'notif_entri' => date('Y-m-d H:i:s')
        );

        $this->db->insert('tb_notif',$data_notif);
      }
    }
  }

  public function print_surat($eizin_id)
  {
    $this->db->select('*');
    $this->db->from('tb_eizin');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_eizin.eizin_dinas_id');
    $this->db->where('eizin_id',$eizin_id);
    $data['data_ib'] = $this->db->get()->result();
    $data['tanggal_cetak'] = date('Y-m-d');

    $this->load->view('template/print_ib',$data);
  }

  public function hapus()
  {
    $data_id = $_POST['data_id'];
    $dinas_id = $_POST['dinas_id'];
    if(isset($data_id) && isset($dinas_id)){
      // notif to dinas
      $this->db->select('*');
      $this->db->from('tb_eizin');
      $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
      $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_eizin.eizin_dinas_id');
      $this->db->join('tb_users','tb_users.user_dinas_id = tb_dinas.dinas_id');
      $this->db->where(array('eizin_id'=>$data_id));
      $sql_dinas = $this->db->get_where()->result();
      foreach ($sql_dinas as $data) {
        $data = array(
          'notif_user_id' => $this->session->userdata('id'),
          'notif_to_user_id' => $data->user_id,
          'notif_eizin_id' => $data->eizin_id,
          'notif_title' => $data->dinas_nama. ' : '.$data->biodata_nama.' telah dihapus admin',
          'notif_type' => 'hapus persyaratan',
          'notif_text' => 'Persyaratan Izin Belajar '.$data->biodata_nama.' yang telah selesai dihapus oleh admin',
          'notif_link' => '#',
          'notif_status' => 'delive',
          'notif_entri' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tb_notif',$data);
      }

      $this->db->select('*');
      $this->db->from('tb_eizin');
      $this->db->join('tb_attachment','tb_attachment.attachment_eizin_id = tb_eizin.eizin_id');
      $this->db->where('eizin_id',$data_id);
      foreach ($this->db->get()->result() as $data) {
        unlink('./upload/attachment/dinas'.$dinas_id.'/ib'.$data_id.'/'.$data->attachment_file_name);
      }
      rmdir('./upload/attachment/dinas'.$dinas_id.'/ib'.$data_id);

      $this->db->where('eizin_id',$data_id);
      $this->db->delete('tb_eizin');
      $this->db->where('biodata_eizin_id',$data_id);
      $this->db->delete('tb_biodata');
      $this->db->where('attachment_eizin_id',$data_id);
      $this->db->delete('tb_attachment');
    }
  }
  public function hapus_semua()
  {
    $dinas_id = $_POST['dinas_id'];
    if(isset($dinas_id)){
      foreach ($this->db->get_where('tb_eizin',array('eizin_dinas_id'=>$dinas_id))->result() as $x) {
        // notif to dinas
        $this->db->select('*');
        $this->db->from('tb_eizin');
        $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
        $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_eizin.eizin_dinas_id');
        $this->db->join('tb_users','tb_users.user_dinas_id = tb_dinas.dinas_id');
        $this->db->where(array('user_dinas_id'=>$dinas_id));
        $sql_dinas = $this->db->get_where()->result();
        foreach ($sql_dinas as $data) {
          $data = array(
            'notif_user_id' => $this->session->userdata('id'),
            'notif_to_user_id' => $data->user_id,
            'notif_title' => $data->biodata_nama. ' telah dihapus admin',
            'notif_type' => 'hapus persyaratan',
            'notif_text' => 'Persyaratan Surat Keterangan Lulus Kuliah '.$data->biodata_nama.' yang telah selesai dihapus oleh admin',
            'notif_link' => '#',
            'notif_status' => 'delive',
            'notif_entri' => date('Y-m-d H:i:s')
          );
          $this->db->insert('tb_notif',$data);
        }

        $this->db->select('*');
        $this->db->from('tb_eizin');
        $this->db->join('tb_attachment','tb_attachment.attachment_eizin_id = tb_eizin.eizin_id');
        $this->db->where('eizin_id',$x->eizin_id);
        foreach ($this->db->get()->result() as $data) {
          if (unlink('./upload/attachment/dinas'.$dinas_id.'/ib'.$x->eizin_id.'/'.$data->attachment_file_name)) {
            echo "berhasil";
          }
          else {
            echo "gagal";
          }
        }
        rmdir('./upload/attachment/dinas'.$dinas_id.'/ib'.$x->eizin_id);

        $this->db->where('eizin_id',$data->eizin_id);
        $this->db->delete('tb_eizin');
        $this->db->where('biodata_eizin_id',$data->eizin_id);
        $this->db->delete('tb_biodata');
        $this->db->where('attachment_eizin_id',$data->eizin_id);
        $this->db->delete('tb_attachment');
      }
    }
  }

  public function search_surat()
  {
    // data model
    $data['data']=null;
    if ($this->input->post('cari')) {
      $eizin_kode = $this->input->post('eizin_kode');
      $this->db->select('*');
      $this->db->from('tb_eizin');
      $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
      $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_eizin.eizin_dinas_id');
      $this->db->like('eizin_kode',$eizin_kode);
      $this->db->where('eizin_status','verifikasi 2');

      $sql = $this->db->get();
      $data['data'] = $sql->result();
      $data['row'] = $sql->num_rows();
    }
    $data['kode_aktif'] = $this->db->get_where('tb_eizin',array('eizin_status'=>'verifikasi 2'))->result();
    // breadcrumb
    $breadcrumb['data'] = array('home','cari surat');
    $breadcrumb['link'] = array('');
    // get template
    $this->TopModel->get_template('cari_surat2',$breadcrumb,$data,"Print Surat");
  }
}


 ?>
