<?php
/**
 *
 */
class Lampiran extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->TopModel->encription_page('admin');
    $this->load->model('ModelLampiran');
  }
  public function index()
  {
    // data model
    $this->db->order_by('at_entri');
    $data['data_lampiran'] = $this->db->get('tb_attachment_type')->result();
    // breadcrumb
    $breadcrumb['data'] = array('home','lampiran');
    $breadcrumb['link'] = array('');
    // get template
    $this->TopModel->get_template('lampiran/home',$breadcrumb,$data,"Lampiran");
  }

  public function tag($at_type)
  {
    // data model
    $this->db->order_by('at_entri');
    $this->db->where('at_type',strtoupper($at_type));
    $data['data_lampiran'] = $this->db->get('tb_attachment_type')->result();
    $data['data_type'] = $at_type;
    // breadcrumb
    $breadcrumb['data'] = array('home','lampiran');
    $breadcrumb['link'] = array('');
    // get template
    $this->TopModel->get_template('lampiran/home',$breadcrumb,$data,"Lampiran");
  }

  public function tambah()
  {
    // data model
    $data['data_model'] = $this->ModelLampiran->tambah();
    // breadcrumb
    $breadcrumb['data'] = array('home','lampiran','tambah lampiran');
    $breadcrumb['link'] = array('home','lampiran');
    // get template
    $this->TopModel->get_template('lampiran/tambah',$breadcrumb,$data,"Lampiran");
  }

  public function hapus()
  {
    if (isset($_POST['lampiran_id'])) {
      // delete lampiran
      $this->db->where('at_id',$_POST['lampiran_id']);
      $this->db->delete('tb_attachment_type');
    }
  }
  public function edit($data_id)
  {
    // data model
    if (empty($data_id)) {
      redirect(ADMIN."lampiran");
    }
    $data['data_model'] = $this->ModelLampiran->edit($data_id);
    $this->db->where('at_id',$data_id);
    $data['data_lampiran'] = $this->db->get('tb_attachment_type')->result();
    // breadcrumb
    $breadcrumb['data'] = array('home','lampiran','edit lampiran');
    $breadcrumb['link'] = array('home','lampiran');
    // get template
    $this->TopModel->get_template('lampiran/edit',$breadcrumb,$data,"Lampiran");
  }
}

?>
