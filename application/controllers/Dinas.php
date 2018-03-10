<?php
/**
 *
 */
class Dinas extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->TopModel->encription_page('admin');
    $this->load->model('ModelDinas');
  }
  public function index()
  {
    // data model
    $this->db->select('*');
    $this->db->from('tb_users');
    $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_users.user_dinas_id ');
    $this->db->where('user_level','dinas');
    $this->db->order_by('dinas_entri','desc');
    $data['data_dinas'] = $this->db->get()->result();
    $data['tag'] = null;
    // breadcrumb
    $breadcrumb['data'] = array('home','dinas');
    $breadcrumb['link'] = array('');
    // get template
    $this->TopModel->get_template('dinas/home',$breadcrumb,$data,"Dinas");
  }
  public function tag($value)
  {
    // data model
    $this->db->select('*');
    $this->db->from('tb_users');
    $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_users.user_dinas_id ');
    $this->db->where('user_level','dinas');
    $this->db->order_by('dinas_entri','desc');
    $data['data_dinas'] = $this->db->get()->result();
    $data['tag'] = str_replace('-',' ',$value);
    // breadcrumb
    $breadcrumb['data'] = array('home','dinas');
    $breadcrumb['link'] = array('');
    // get template
    $this->TopModel->get_template('dinas/home',$breadcrumb,$data,"Dinas");
  }
  public function tambah()
  {
    // data model
    $data['data_model'] = $this->ModelDinas->tambah();
    // breadcrumb
    $breadcrumb['data'] = array('home','dinas','tambah dinas');
    $breadcrumb['link'] = array('home','dinas');
    // get template
    $this->TopModel->get_template('dinas/tambah',$breadcrumb,$data,"Dinas");
  }

  public function hapus()
  {
    if (isset($_POST['dinas_id'])) {
      // delete attachment
      foreach ($this->db->get_where('tb_dinas',array('dinas_id'=>$_POST['dinas_id']))->result() as $data) {
        if ($data->dinas_photo != "default.png") {
          unlink('./upload/img/dinas/'.$data->dinas_photo);
        }
        rmdir('./upload/attachment/dinas'.$data->dinas_id);
      }
      // delete dinas
      $this->db->where('dinas_id',$_POST['dinas_id']);
      $this->db->delete('tb_dinas');
      // delete users
      $this->db->where('user_dinas_id',$_POST['dinas_id']);
      $this->db->delete('tb_users');
    }
  }

  public function edit($dinas_id)
  {
    // data model
    $data['data_model'] = $this->ModelDinas->edit($dinas_id);
    $this->db->select('*');
    $this->db->from('tb_users');
    $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_users.user_dinas_id ');
    $this->db->where('user_level','dinas');
    $this->db->where('dinas_id',$dinas_id);
    $this->db->order_by('dinas_entri','desc');
    $data['data_dinas'] = $this->db->get()->result();

    // breadcrumb
    $breadcrumb['data'] = array('home','dinas','edit dinas');
    $breadcrumb['link'] = array('home','dinas');
    // get template
    $this->TopModel->get_template('dinas/edit',$breadcrumb,$data,"Dinas");
  }

  public function printd($value='')
  {
    $this->db->select('*');
    $this->db->from('tb_users');
    $this->db->join('tb_dinas','tb_dinas.dinas_id = tb_users.user_dinas_id ');
    $this->db->where('user_level','dinas');
    $this->db->order_by('dinas_entri','desc');
    $data = $this->db->get()->result();
    $this->load->view('template/meta_print');
    ?>
    <style media="screen">
      td,th{
        padding: 8px;
      }
    </style>
    <table style="font-family:sans-serif;width:100%;border-collapse: collapse;">
      <tr>
        <th style="border:1px solid #333;">No</th>
        <th style="border:1px solid #333;">Dinas</th>
        <th style="border:1px solid #333;">Username</th>
        <th style="border:1px solid #333;">Password</th>
      </tr>
      <tr>
        <?php
        $no = 1;
        foreach ($data as $key) {
          ?>
          <tr>
            <td style="border:1px solid #333;text-align:center;"><?php echo $no; ?></td>
            <td style="border:1px solid #333;"><?php echo $key->dinas_nama; ?></td>
            <td style="border:1px solid #333;text-align:center;"><?php echo $key->user_username; ?></td>
            <td style="border:1px solid #333;text-align:center;"><?php echo $key->dinas_password; ?></td>
          </tr>
          <?php
          $no++;
        }
         ?>
      </tr>
    </table>
    <script type="text/javascript">
      if (!window.print()) {
        window.location = '<?php echo ADMIN; ?>dinas';
      }
    </script>
    <?php
  }

}

 ?>
