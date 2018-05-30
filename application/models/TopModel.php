<?php

/**
 *
 */
class TopModel extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
    date_default_timezone_set("Asia/Jakarta");
  }
  private $db_host = "localhost";
  private $db_username = "root";
  private $db_password = "";
  private $db_name = "db_eizin";
  // for email
  public $email_active = "off";

  public function db()
  {
    return mysqli_connect($this->db_host,$this->db_username,$this->db_password,$this->db_name);
  }
  public function admin1_id()
  {
    $data = $this->db->get_where('tb_users',['user_level'=>'admin1'])->row();
    return $data->user_id;
  }
  public function admin2_id()
  {
    $data = $this->db->get_where('tb_users',['user_level'=>'admin2'])->row();
    return $data->user_id;
  }
  public function email_admin()
  {
    return "bangrirbkpsdmsbg@gmail.com";
  }
  public function get_template($view,$breadcrumb=null,$data=null,$active=null)
  {
    // menu admin
    if ($this->session->userdata('level') == "admin1" || $this->session->userdata('level') == "admin2") {
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
      $menu['active'] = $active;
      // type url
      $include_type = "admin/";
    }
    else {
      $menu['data'] = array('HOME','IZIN BELAJAR','SURAT KETERANGAN LULUS KULIAH','TIMELINE');
      $menu['link'] = array('','ib','sklk','timeline');
      $menu['icon'] = array('home','book','graduation-cap','clock-o');
      $menu['active'] = $active;
      $menu['brand'] = isset($data['data_page']) ? $data['data_page'] : [];
      // type url
      $include_type = "";
    }

    $this->load->view('template/meta',$data);
    if ($_SESSION['level'] == "dinas") {
      $this->load->view('template/header_user',$menu);
    }
    else {
      $this->load->view('template/header',$menu);
    }
    // $this->load->view('template/header',$menu);
    if ($breadcrumb!=null) {
      $breadcrumb['data'] = $breadcrumb['data'];
      $breadcrumb['link'] = isset($breadcrumb['link'])?$breadcrumb['link']:null;

      $breadcrumb['brand'] = isset($data['data_page']) ? $data['data_page'] : [];
      $this->load->view('template/breadcrumb',$breadcrumb);
    }
    $this->load->view('site/'.$include_type.$view,$data);
    $this->load->view('template/footer');
  }

  public function encription_page($type=null)
  {
    if ($this->session->userdata('log')!=TRUE) {
      redirect(URL."login");
    }
    else{
      if ($type == "admin") {
        if ($this->session->userdata('level')!="admin1" && $this->session->userdata('level')!="admin2") {
          redirect(URL."404_notfound");
        }
      }
      elseif ($type==null) {
        if ($this->session->userdata('log')!=TRUE) {
          redirect(URL."login");
        }
      }
      else{
        if ($this->session->userdata('level')!="dinas") {
          redirect(URL."404_notfound");
        }
      }
    }

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
  public function dashboard_dinas()
  {
    $persyaratan_ib = $this->db->get_where('tb_eizin',array('eizin_dinas_id'=>$this->session->userdata('dinas_id'), 'eizin_type'=>'IB'))->num_rows();
    $persyaratan_sklk = $this->db->get_where('tb_eizin',array('eizin_dinas_id'=>$this->session->userdata('dinas_id'), 'eizin_type'=>'SKLK'))->num_rows();
    $persyaratan_ib_belum_dikirim = $this->db->get_where('tb_eizin',array('eizin_dinas_id'=>$this->session->userdata('dinas_id'), 'eizin_type'=>'IB','eizin_status'=>'belum dikirim'))->num_rows();
    $persyaratan_sklk_belum_dikirim = $this->db->get_where('tb_eizin',array('eizin_dinas_id'=>$this->session->userdata('dinas_id'), 'eizin_type'=>'SKLK','eizin_status'=>'belum dikirim'))->num_rows();
    $persyaratan_ib_terkirim = $this->db->get_where('tb_eizin',array('eizin_dinas_id'=>$this->session->userdata('dinas_id'), 'eizin_type'=>'IB','eizin_status'=>'terkirim'))->num_rows();
    $persyaratan_ib_verifikasi1 = $this->db->get_where('tb_eizin',array('eizin_dinas_id'=>$this->session->userdata('dinas_id'), 'eizin_type'=>'IB','eizin_status'=>'verifikasi 1'))->num_rows();
    $persyaratan_ib_verifikasi2 = $this->db->get_where('tb_eizin',array('eizin_dinas_id'=>$this->session->userdata('dinas_id'), 'eizin_type'=>'IB','eizin_status'=>'verifikasi 2'))->num_rows();
    $persyaratan_sklk_terkirim = $this->db->get_where('tb_eizin',array('eizin_dinas_id'=>$this->session->userdata('dinas_id'), 'eizin_type'=>'SKLK','eizin_status'=>'terkirim'))->num_rows();
    $persyaratan_sklk_verifikasi1 = $this->db->get_where('tb_eizin',array('eizin_dinas_id'=>$this->session->userdata('dinas_id'), 'eizin_type'=>'SKLK','eizin_status'=>'verifikasi 1'))->num_rows();
    $persyaratan_sklk_verifikasi2 = $this->db->get_where('tb_eizin',array('eizin_dinas_id'=>$this->session->userdata('dinas_id'), 'eizin_type'=>'SKLK','eizin_status'=>'verifikasi 2'))->num_rows();
    return array(
      'persyaratan_ib' => $persyaratan_ib,
      'persyaratan_sklk' => $persyaratan_sklk,
      'persyaratan_ib_belum_dikirim' => $persyaratan_ib_belum_dikirim,
      'persyaratan_sklk_belum_dikirim' => $persyaratan_sklk_belum_dikirim,
      'persyaratan_ib_terkirim' => $persyaratan_ib_terkirim,
      'persyaratan_ib_verifikasi1' => $persyaratan_ib_verifikasi1,
      'persyaratan_ib_verifikasi2' => $persyaratan_ib_verifikasi2,
      'persyaratan_sklk_terkirim' => $persyaratan_sklk_terkirim,
      'persyaratan_sklk_verifikasi1' => $persyaratan_sklk_verifikasi1,
      'persyaratan_sklk_verifikasi2' => $persyaratan_sklk_verifikasi2,
    );
  }
  public function data_admin()
  {
    $persyaratan_ib = $this->db->get_where('tb_eizin',array('eizin_type'=>'IB','eizin_status !='=>'belum dikirim'))->num_rows();
    $persyaratan_sklk = $this->db->get_where('tb_eizin',array('eizin_type'=>'SKLK','eizin_status !='=>'belum dikirim'))->num_rows();
    $persyaratan_ib_terkirim = $this->db->get_where('tb_eizin',array('eizin_type'=>'IB','eizin_status'=>'terkirim'))->num_rows();
    $persyaratan_ib_verifikasi1 = $this->db->get_where('tb_eizin',array('eizin_type'=>'IB','eizin_status'=>'verifikasi 1'))->num_rows();
    $persyaratan_ib_verifikasi2 = $this->db->get_where('tb_eizin',array('eizin_type'=>'IB','eizin_status'=>'verifikasi 2'))->num_rows();
    $persyaratan_sklk_terkirim = $this->db->get_where('tb_eizin',array('eizin_type'=>'SKLK','eizin_status'=>'terkirim'))->num_rows();
    $persyaratan_sklk_verifikasi1 = $this->db->get_where('tb_eizin',array('eizin_type'=>'SKLK','eizin_status'=>'verifikasi 1'))->num_rows();
    $persyaratan_sklk_verifikasi2 = $this->db->get_where('tb_eizin',array('eizin_type'=>'SKLK','eizin_status'=>'verifikasi 2'))->num_rows();
    $lampiran = $this->db->get('tb_attachment_type')->num_rows();
    $dinas = $this->db->get('tb_dinas')->num_rows();
    $attachment = $this->db->get('tb_attachment')->num_rows();

    if ($this->session->userdata('level') == "admin2") {
      $this->db->select('*');
      $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_eizin.eizin_dinas_id');
      $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
      $this->db->where('eizin_status','verifikasi 1');
      $this->db->order_by('eizin_entri','desc');
      $eizin_data = $this->db->get('tb_eizin',10,0);
    }
    else {
      $this->db->select('*');
      $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_eizin.eizin_dinas_id');
      $this->db->join('tb_biodata','tb_biodata.biodata_eizin_id = tb_eizin.eizin_id');
      $this->db->where('eizin_status','verifikasi 2');
      $this->db->or_where('eizin_status','terkirim');
      $this->db->order_by('eizin_entri','desc');
      $eizin_data = $this->db->get('tb_eizin',10,0);
    }

    return array(
      'persyaratan_ib' => $persyaratan_ib,
      'persyaratan_sklk' => $persyaratan_sklk,
      'persyaratan_ib_terkirim' => $persyaratan_ib_terkirim,
      'persyaratan_ib_verifikasi1' => $persyaratan_ib_verifikasi1,
      'persyaratan_ib_verifikasi2' => $persyaratan_ib_verifikasi2,
      'persyaratan_sklk_terkirim' => $persyaratan_sklk_terkirim,
      'persyaratan_sklk_verifikasi1' => $persyaratan_sklk_verifikasi1,
      'persyaratan_sklk_verifikasi2' => $persyaratan_sklk_verifikasi2,
      'dinas' => $dinas,
      'lampiran' => $lampiran,
      'attachment' => $attachment,
      'data_eizin' => $eizin_data
    );
  }
  public function login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $button = $this->input->post('button');

    if ($button) {
      $where = array('user_username'=>$username,'user_password'=>$this->encription_password($password));
      $where2 = array('user_username'=>$username);

      $sql = $this->db->get_where('tb_users',$where);
      $sql2 = $this->db->get_where('tb_users',$where2);

      $row_user = $sql->num_rows();
      $row_user2 = $sql2->num_rows();

      if ($row_user > 0) {
        foreach ($sql->result() as $data_user) {
          $user_id = $data_user->user_id;
          $user_level = $data_user->user_level;
          $dinas_id = $data_user->user_dinas_id;
          $data_login = TRUE;

          $data_session = array(
            'id' => $user_id,
            'level' => $user_level,
            'dinas_id' => $dinas_id,
            'log' => $data_login
          );

          $this->session->set_userdata($data_session);

          // jika level admin atau admin2 maka akan dialihkan ke administrator
          if ($user_level == "admin1" || $user_level == "admin2") {
            redirect(ADMIN);
          }
          else{
            redirect(URL);
          }
        }
      }
      elseif($row_user == 0 && $row_user2 > 0){
        return "password salah";
      }
      else{
        return "username dan password salah";
      }
    }
  }

  public function upload($post,$path,$type,$max_size=null)
  {
    $config['upload_path'] = "./upload/".$path."/";
    $config['allowed_types'] = $type;
    if ($max_size!=null) {
      $config['max_size'] = $max_size;
    }

    $this->load->library('upload',$config);

    return $this->upload->do_upload($post);
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
  public function convert_date($date)
  {
    $day = substr($date,3,2);
    $month = substr($date,0,2);
    $year = substr($date,6,4);

    return $year."-".$month."-".$day;
  }


}


 ?>
