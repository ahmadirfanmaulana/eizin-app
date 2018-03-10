<?php
/**
 *
 */
class Administrator extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->TopModel->encription_page('admin');
  }

  public function index()
  {
    // breadcrumb
    $data['data'] = $this->TopModel->data_admin();
    $breadcrumb['data'] = array('home');
    // get template
    $this->TopModel->get_template('home',$breadcrumb,$data,"Home");
  }

  public function profile()
  {
    $data['menu_profile'] = "active";
    $data['data_update'] = null;
    if ($this->input->post('button')) {
      $data_user = array(
        'user_username' => $this->input->post('user_username')
      );
      $this->db->where(array('user_id'=>$this->session->userdata('id')));
      if ($this->db->update('tb_users',$data_user)) {
        // notif
        $data_notif = array(
          'notif_user_id' => $this->session->userdata('id'),
          'notif_to_user_id' => $this->session->userdata('id'),
          'notif_eizin_id' => "",
          'notif_title' => 'Anda : Mengubah username',
          'notif_type' => 'ubah username',
          'notif_text' => 'Anda menubah username menjadi '.$this->input->post('user_username'),
          'notif_link' => 'timeline',
          'notif_status' => 'delive',
          'notif_entri' => date('Y-m-d H:i:s')
        );
        $this->db->insert('tb_notif',$data_notif);

        $data['data_update'] = "berhasil";
      }
      else {
        $data['data_update'] = "gagal";
      }
    }

    $data['data_user'] = $this->db->get_where('tb_users',array('user_id'=>$this->session->userdata('id')))->result();
    if ($this->session->userdata('level') == "admin1") {
      $menu['data'] = array('Home','Izin Belajar','SK Lulus Kuliah','Dinas', 'Lampiran','File Persyaratan', 'Print Surat','Timeline');
      $menu['link'] = array('','ib/tag/terkirim','sklk/tag/terkirim','dinas','lampiran','file', 'search','timeline');
      $menu['icon'] = array('home','book','graduation-cap','university','paperclip','cloud-upload','print','clock-o');
    }
    else {
      $menu['data'] = array('Home','Izin Belajar','SK Lulus Kuliah','Dinas','Lampiran','File Persyaratan','Timeline');
      $menu['link'] = array('','ib/tag/verifikasi-1','sklk/tag/verifikasi-1','dinas', 'lampiran','file','timeline');
      $menu['icon'] = array('home','book','graduation-cap','university','paperclip','cloud-upload','clock-o');
    }
    $menu['active'] = "Profile";

    // breadcrumb
    $breadcrumb['data'] = array('home','profile');
    $breadcrumb['link'] = array('');
    // get template
    $this->load->view('template/meta');
    $this->load->view('template/header',$menu);
    if ($breadcrumb!=null) {
      $this->load->view('template/breadcrumb',$breadcrumb);
    }
    $this->load->view('site/admin/profile',$data);
    $this->load->view('template/footer');
  }

  public function ganti_password()
  {
    $this->load->model('TopModel');
    $data['menu_change'] = "active";
    $data['data_update'] = null;
    if ($this->input->post('button')) {
      $password_then = $this->input->post('user_password');
      $password_baru = $this->input->post('user_password_new');
      $password_baru_ulang = $this->input->post('user_password_new_try');

      if ($this->db->get_where('tb_users',array('user_password'=>$this->TopModel->encription_password($password_then)))->num_rows() == 0) {
        $data['data_update'] = "Password lama salah";
      }
      elseif ($password_baru != $password_baru_ulang) {
        $data['data_update'] = "Password baru tidak sama";
      }
      else {
        $data_password = array(
          'user_password' => $this->TopModel->encription_password($password_baru)
        );
        $this->db->where(array('user_id'=>$this->session->userdata('id')));
        if ($this->db->update('tb_users',$data_password)) {
          // notif
          $data_notif = array(
            'notif_user_id' => $this->session->userdata('id'),
            'notif_to_user_id' => $this->session->userdata('id'),
            'notif_eizin_id' => "",
            'notif_title' => 'Anda : Mengubah password lama menjadi password baru',
            'notif_type' => 'ubah password',
            'notif_text' => 'Anda menubah password lama menjadi password baru',
            'notif_link' => 'timeline',
            'notif_status' => 'delive',
            'notif_entri' => date('Y-m-d H:i:s')
          );
          $this->db->insert('tb_notif',$data_notif);
          $data['data_update'] = "berhasil";
        }
        else {
          $data['data_update'] = "gagal";
        }
      }
    }

    if ($this->session->userdata('level') == "admin1") {
      $menu['data'] = array('Home','Izin Belajar','SK Lulus Kuliah','Dinas', 'Lampiran','File Persyaratan', 'Print Surat','Timeline');
      $menu['link'] = array('','ib/tag/terkirim','sklk/tag/terkirim','dinas','lampiran','file', 'search','timeline');
      $menu['icon'] = array('home','book','graduation-cap','university','paperclip','cloud-upload','print','clock-o');
    }
    else {
      $menu['data'] = array('Home','Izin Belajar','SK Lulus Kuliah','Dinas','Lampiran','File Persyaratan','Timeline');
      $menu['link'] = array('','ib/tag/verifikasi-1','sklk/tag/verifikasi-1','dinas', 'lampiran','file','timeline');
      $menu['icon'] = array('home','book','graduation-cap','university','paperclip','cloud-upload','clock-o');
    }
    $menu['active'] = "Profile";

    // breadcrumb
    $breadcrumb['data'] = array('home','ganti password');
    $breadcrumb['link'] = array('');
    // get template
    $this->load->view('template/meta');
    $this->load->view('template/header',$menu);
    if ($breadcrumb!=null) {
      $this->load->view('template/breadcrumb',$breadcrumb);
    }
    $this->load->view('site/admin/ganti_password',$data);
    $this->load->view('template/footer');
  }
  public function timeline()
  {
    // breadcrumb
    $this->db->distinct();
    $this->db->select('notif_title,notif_text,notif_type,notif_link,notif_entri');
    $this->db->from('tb_notif');
    $this->db->where('notif_to_user_id' , $this->session->userdata('id'));
    $this->db->order_by('notif_entri' , 'desc');
    $data['data'] = $this->db->get()->result();
    $data['data_user'] = $this->db->get_where('tb_users',array('user_id'=>$this->session->userdata('id')))->result();
    $breadcrumb['data'] = array('home','timeline');
    $breadcrumb['link'] = array('');
    // get template
    $this->TopModel->get_template('timeline',$breadcrumb,$data,"Timeline");
  }

  public function file_p()
  {
    // breadcrumb
    $this->db->select('*');
    $this->db->from('tb_attachment');
    $this->db->join('tb_attachment_type','tb_attachment_type.at_id = tb_attachment.attachment_at_id');
    $this->db->join('tb_eizin','tb_eizin.eizin_id = tb_attachment.attachment_eizin_id');
    $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
    $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_eizin.eizin_dinas_id');
    $this->db->order_by('attachment_entri', 'desc');
    $data['data_attachment'] = $this->db->get()->result();

    $breadcrumb['data'] = array('home','file persyaratan');
    $breadcrumb['link'] = array('');
    // get template
    $this->TopModel->get_template('file_persyaratan',$breadcrumb,$data,"File Persyaratan");
  }
}

 ?>
