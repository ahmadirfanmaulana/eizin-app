<?php

/**
 *
 */
class Sklk extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->TopModel->encription_page('user');
    $this->load->model('ModelSklk');
  }
  private $menuName = "Surat keterangan Lulus Kuliah";
  public function index()
  {
    // data model
    $this->db->select('*');
    $this->db->from('tb_eizin');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->where('eizin_dinas_id',$this->ModelSklk->get_dinas_id($this->session->userdata('id')));
    $this->db->where('eizin_type','SKLK');
    $this->db->order_by('biodata_entri','DESC');
    $data['data_table'] = $this->db->get()->result();
    $data['data_sort'] = "semua";
    $data['data_page'] = [
      'parent' => 'Surat Keterangan Lulus Kuliah',
      'child' => 'List Persyaratan'
    ];
    // breadcrumb
    $breadcrumb['data'] = array('home','surat keterangan lulus kuliah');
    $breadcrumb['link'] = array('');
    // get template
    $this->TopModel->get_template('sklk/sklk_home',$breadcrumb,$data,$this->menuName);
  }
  public function tag($value)
  {
    // data model
    $this->db->select('*');
    $this->db->from('tb_eizin');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->where('eizin_dinas_id',$this->ModelSklk->get_dinas_id($this->session->userdata('id')));
    $this->db->where('eizin_status',str_replace('-',' ',$value));
    $this->db->where('eizin_type','SKLK');
    $this->db->order_by('biodata_entri','DESC');
    $data['data_table'] = $this->db->get()->result();
    $data['data_sort'] = str_replace('-',' ',$value);
    $data['data_page'] = [
      'parent' => 'Surat Keterangan Lulus Kuliah',
      'child' => $data['data_sort']
    ];
    // breadcrumb
    $breadcrumb['data'] = array('home','surat keterangan lulus kuliah');
    $breadcrumb['link'] = array('');
    // get template
    $this->TopModel->get_template('sklk/sklk_home',$breadcrumb,$data,$this->menuName);
  }
  public function tambah()
  {
    // data model
    $data['data_model'] = $this->ModelSklk->tambah();
    // breadcrumb
    $breadcrumb['data'] = array('home','surat keterangan lulus kuliah','tambah biodata');
    $breadcrumb['link'] = array('','sklk');
    $data['data_page'] = [
      'parent' => 'Surat Keterangan Lulus Kuliah',
      'child' => 'Tambah Biodata'
    ];
    // get template
    $this->TopModel->get_template('sklk/sklk_tambah',$breadcrumb,$data,$this->menuName);
  }
  public function view($eizin_id)
  {
    // data model
    if ($this->db->get_where('tb_eizin',array('eizin_dinas_id'=>$this->session->userdata('dinas_id'),'eizin_id'=>$eizin_id))->num_rows() == 0) {
      redirect(URL."sklk");
    }
    $data['data_model'] = $this->ModelSklk->edit($eizin_id);
    $this->db->select('*');
    $this->db->from('tb_eizin');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->where('eizin_dinas_id',$this->ModelSklk->get_dinas_id($this->session->userdata('id')));
    $this->db->where('eizin_id',$eizin_id);
    $this->db->where('eizin_type','SKLK');
    $data['data_table'] = $this->db->get()->result();
    $data['eizin_id'] = $eizin_id;
    $data['data_page'] = [
      'parent' => 'Surat Keterangan Lulus Kuliah',
      'child' => 'Lihat Persyaratan'
    ];
    // breadcrumb
    $breadcrumb['data'] = array('home','surat keterangan lulus kuliah','lihat');
    $breadcrumb['link'] = array('','sklk');
    // get template
    $this->TopModel->get_template('sklk/sklk_view',$breadcrumb,$data,$this->menuName);
  }

  public function input($eizin_id,$at_id)
  {
    // data model
    $data['data_model'] = $this->ModelSklk->edit($eizin_id);
    $data['data_upload'] = $this->ModelSklk->upload($eizin_id,$at_id);
    $this->db->select('*');
    $this->db->from('tb_eizin');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->where('eizin_dinas_id',$this->ModelSklk->get_dinas_id($this->session->userdata('id')));
    $this->db->where('eizin_id',$eizin_id);
    $this->db->where('eizin_type','SKLK');
    $data['data_table'] = $this->db->get()->result();
    $data['eizin_id'] = $eizin_id;
    $data['at_id'] = $at_id;
    $data['data_page'] = [
      'parent' => 'Surat Keterangan Lulus Kuliah',
      'child' => 'Input Lampiran Persyaratan'
    ];
    // breadcrumb
    $breadcrumb['data'] = array('home','surat keterangan lulus kuliah','lihat','input lampiran');
    $breadcrumb['link'] = array('','sklk','sklk/'.$eizin_id."/view");
    // get template
    $this->TopModel->get_template('sklk/sklk_input',$breadcrumb,$data,$this->menuName);
  }

  public function send()
  {
    $data_id = $_POST['data_id'];
    if (isset($data_id)) {
      $data = array('eizin_status'=>'terkirim','eizin_date_kirim'=>date('Y-m-d H:i:s'));
      $this->db->where('eizin_id',$data_id);
      $this->db->where('eizin_type','SKLK');
      $this->db->update('tb_eizin',$data);

      // notif to dinas
      $this->db->select('*');
      $this->db->from('tb_eizin');
      $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
      $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_eizin.eizin_dinas_id');
      $this->db->join('tb_users','tb_users.user_dinas_id = tb_dinas.dinas_id');
      $this->db->where(array('eizin_id'=>$data_id));
      $sql_dinas = $this->db->get_where()->result();
      foreach ($sql_dinas as $data) {

        if (!empty($data->dinas_email)) {
          // kirim notifikasi email ke admin
          if ($this->TopModel->email_active == "on") {
            $from = $data->dinas_email;
            $to = $this->TopModel->email_admin();
            $subject = "Dinas ".$data->dinas_nama." Mengirimkan Persyaratan Surat Keterangan Lulus Kuliah atas nama ".$data->biodata_nama;
            $pesan = "Verifikasi untuk dilanjutkan ke Admin 2";
            $header = "From:".$from;
            mail($to,$subject,$pesan,$header);
          }
        }

        $data = array(
          'notif_user_id' => $this->session->userdata('id'),
          'notif_to_user_id' => $this->TopModel->admin1_id(),
          'notif_eizin_id' => $data->eizin_id,
          'notif_title' => $data->dinas_nama. ' : Mengirimkan Persyaratan Surat Keterangan Lulus Kuliah atas nama '.$data->biodata_nama,
          'notif_type' => 'kirim admin1',
          'notif_text' => $data->dinas_nama.'Mengirim Persyaratan Izin Belajar '.$data->biodata_nama,
          'notif_link' => 'sklk/'.$data->dinas_id."/".$data->eizin_id.'/terkirim',
          'notif_status' => 'delive',
          'notif_entri' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tb_notif',$data);
      }
    }
  }

  public function edit($eizin_id,$at_id)
  {
    // data model
    $data['data_model'] = $this->ModelSklk->edit($eizin_id);
    $data['data_upload'] = $this->ModelSklk->edit_upload($eizin_id,$at_id);
    $this->db->select('*');
    $this->db->from('tb_eizin');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->where('eizin_dinas_id',$this->ModelSklk->get_dinas_id($this->session->userdata('id')));
    $this->db->where('eizin_id',$eizin_id);
    $data['data_table'] = $this->db->get()->result();
    $data['data_attachment'] = $this->db->get_where('tb_attachment',array('attachment_eizin_id'=>$eizin_id,'attachment_at_id'=>$at_id))->result();
    $data['eizin_id'] = $eizin_id;
    $data['at_id'] = $at_id;
    $data['data_page'] = [
      'parent' => 'Surat Keterangan Lulus Kuliah',
      'child' => 'Edit Lampiran Persyaratan'
    ];
    // breadcrumb
    $breadcrumb['data'] = array('home','surat keterangan lulus kuliah','lihat','edit lampiran');
    $breadcrumb['link'] = array('','sklk','sklk/'.$eizin_id."/view");
    // get template
    $this->TopModel->get_template('sklk/sklk_edit',$breadcrumb,$data,$this->menuName);
  }

  public function hapus($eizin_id,$at_id)
  {
    // data model
    $data['data_model'] = $this->ModelSklk->edit($eizin_id);
    $data['data_upload'] = $this->ModelSklk->hapus_upload($eizin_id,$at_id);
    $this->db->select('*');
    $this->db->from('tb_eizin');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->where('eizin_dinas_id',$this->ModelSklk->get_dinas_id($this->session->userdata('id')));
    $this->db->where('eizin_id',$eizin_id);
    $data['data_table'] = $this->db->get()->result();
    $data['data_attachment'] = $this->db->get_where('tb_attachment',array('attachment_eizin_id'=>$eizin_id,'attachment_at_id'=>$at_id))->result();
    $data['eizin_id'] = $eizin_id;
    $data['at_id'] = $at_id;
    $data['data_page'] = [
      'parent' => 'Surat Keterangan Lulus Kuliah',
      'child' => 'Hapus Lampiran Persyaratan'
    ];
    // breadcrumb
    $breadcrumb['data'] = array('home','surat keterangan lulus kuliah','lihat','hapus lampiran');
    $breadcrumb['link'] = array('','sklk','sklk/'.$eizin_id."/view");
    // get template
    $this->TopModel->get_template('sklk/sklk_hapus',$breadcrumb,$data,$this->menuName);
  }

  public function print_kartu($eizin_id)
  {
    $this->db->select('*');
    $this->db->from('tb_eizin');
    $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_eizin.eizin_dinas_id');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->where(array('eizin_id'=>$eizin_id));
    $data['data'] = $this->db->get()->result();
    $data['tanggal_pengambilan'] = date('Y-m-d',strtotime('+2 days',strtotime(date('Y-m-d'))));
    $data['eizin_id'] = $eizin_id;
    $data['eizin_type'] = "sklk";

    $this->load->view('template/kartu/print',$data);
  }
  public function hapus_data()
  {
    $data_id = $_POST['data_id'];
    if(isset($data_id)){
      $this->db->select('*');
      $this->db->from('tb_eizin');
      $this->db->join('tb_attachment','tb_attachment.attachment_eizin_id = tb_eizin.eizin_id');
      $this->db->where('eizin_id',$data_id);
      foreach ($this->db->get()->result() as $data) {
        unlink('./upload/attachment/dinas'.$this->session->userdata('dinas_id').'/sklk'.$data_id.'/'.$data->attachment_file_name);
      }
      rmdir('./upload/attachment/dinas'.$this->session->userdata('dinas_id').'/sklk'.$data_id);

      $this->db->where('eizin_id',$data_id);
      $this->db->delete('tb_eizin');
      $this->db->where('biodata_eizin_id',$data_id);
      $this->db->delete('tb_biodata');
      $this->db->where('attachment_eizin_id',$data_id);
      $this->db->delete('tb_attachment');
    }
  }
}


 ?>
