<?php

/**
 *
 */
class TopControl extends CI_Controller
{
   public function home()
   {
     $this->TopModel->encription_page('user');
     // data model
     $data['data'] = $this->TopModel->dashboard_dinas();
     // breadcrumb
     $breadcrumb['data'] = array('home');
     // get template
     $this->TopModel->get_template('home',$breadcrumb,$data,"Home");
   }

   public function login()
   {
     if ($this->session->userdata('id')!=null) {
       redirect(URL."404_notfound");
     }
     $data['data_login'] = $this->TopModel->login();

     $this->load->view('site/login',$data);
   }

   public function logout()
   {
     // logout
     $this->session->sess_destroy();
     redirect(URL."login");
   }
   public function notif()
   {
     $this->TopModel->encription_page();
     $this->db->distinct();
     $this->db->select('notif_title,notif_text,notif_type,notif_link');
     $this->db->from('tb_notif');
     $this->db->where('notif_to_user_id' , $this->session->userdata('id'));
     $this->db->order_by('notif_entri' , 'desc');
     $query = $this->db->get();
     $row_notif = $query->num_rows();
     if ($row_notif == 0) {
       ?>
       <li class="footer"><a href="#">Tidak Ada Notifikasi</a></li>
       <?php
     }
     else {
       ?>
   <li>
     <!-- inner menu: contains the actual data -->
     <ul class="menu">
       <?php
    }
     $no = 1;
     foreach ($query->result_array() as $notif) {
       ?>
       <li>
         <?php
         if ($notif['notif_link'] != "#") {
           if ($_SESSION['level'] == "dinas") {
             $link_notif = URL.$notif['notif_link'];
           }
           else {
             $link_notif = ADMIN.$notif['notif_link'];
           }
         }
         else {
           $link_notif = "#";
         }
         ?>
         <a href="<?php echo $link_notif; ?>" title="<?php echo $notif['notif_text']; ?>" data-toggle="tooltip" data-content="haha">
           <?php
           if ($notif['notif_type'] == "hapus ib" || $notif['notif_type'] == "hapus persyaratan") {
             ?>
             <i class="fa fa-trash text-danger"></i>
             <?php
           }
           elseif ($notif['notif_type'] == "verifikasi 1") {
             ?>
             <i class="fa fa-hourglass-start text-primary"></i>
             <?php
           }
           elseif ($notif['notif_type'] == "verifikasi 2") {
             ?>
             <i class="fa fa-print text-success"></i>
             <?php
           }
           elseif ($notif['notif_type'] == "kirim admin1") {
             ?>
             <i class="fa fa-envelope-o text-info"></i>
             <?php
           }
           elseif($notif['notif_type'] == "ubah username") {
             ?>
             <i class="fa fa-user-circle text-purple"></i>
             <?php
           }
           elseif($notif['notif_type'] == "ubah password") {
             ?>
             <i class="fa fa-lock text-red"></i>
             <?php
           }
           ?>
           <?php echo " ".$notif['notif_title']; ?>
         </a>
       </li>
       <?php
       $no++;
     }
     ?>
   </ul>
   </li>
   <li class="footer">
     <a href="<?php if($this->session->userdata('level')=="dinas"){echo URL;}else{echo ADMIN;} ?>timeline">
       Lihat Timeline
     </a>
   </li>
     <?php
   }
   public function notif_delive()
   {
     $this->TopModel->encription_page();
     ?>
     <i class="fa fa-bell-o"></i>
       <?php
       $this->db->where(array('notif_to_user_id' => $this->session->userdata('id') , 'notif_status' => 'delive'));
       $row_notif_D = $this->db->get("tb_notif")->num_rows();
       if ($row_notif_D != 0) {
         ?>
         <span class="label bg-yellow">
           <?php echo $row_notif_D; ?>
         </span>
         <?php
       }
   }
   public function notif_read()
   {
     $this->TopModel->encription_page();
     if ($this->session->userdata('id')) {
       $this->db->where('notif_to_user_id',$this->session->userdata('id'));
       $this->db->update('tb_notif',array('notif_status'=>'read'));
     }
   }

   public function notif_clean()
   {
     $this->TopModel->encription_page();
     if ($this->session->userdata('id')) {
       $this->db->where('notif_to_user_id',$this->session->userdata('id'));
       $this->db->delete('tb_notif');
     }
   }

   public function tentang()
   {
     $this->TopModel->encription_page();
     // breadcrumb
     $breadcrumb['data'] = array('home','tentang');
     $breadcrumb['data'] = array('');
     $data['data_page'] = [
       'parent' => 'Tentang',
       'child' => ''
     ];
     // get template
     $this->TopModel->get_template('tentang',$breadcrumb,$data,null);
   }
   public function profile()
   {
     $this->TopModel->encription_page('user');
     $this->load->model('ModelDinas');
     // data model
     $data['data_update'] = $this->ModelDinas->edit($this->session->userdata('dinas_id'));
     $data['menu_profile'] = "active";
     $data['data_page'] = [
       'parent' => 'Profile',
       'child' => ''
     ];
     $data['data_user'] = $this->db->get_where('tb_dinas',array('dinas_id'=>$this->session->userdata('dinas_id')))->result();
     // breadcrumb
     $breadcrumb['data'] = array('home','profil');
     $breadcrumb['link'] = array('');
     // get template
     $this->TopModel->get_template('dinas_profile',$breadcrumb,$data,null);
   }

   public function timeline()
   {
     $this->TopModel->encription_page('user');
     // breadcrumb
     $this->db->distinct();
     $this->db->select('notif_title,notif_text,notif_type,notif_link,notif_entri');
     $this->db->from('tb_notif');
     $this->db->where('notif_to_user_id' , $this->session->userdata('id'));
     $this->db->order_by('notif_entri' , 'desc');

     $data['data'] = $this->db->get()->result();
     $this->db->select('*');
     $this->db->from('tb_dinas');
     $this->db->join('tb_users','tb_users.user_dinas_id = tb_dinas.dinas_id');
     $this->db->where(array('dinas_id'=>$this->session->userdata('dinas_id')));
     $data['data_user'] = $this->db->get()->result();
     $data['data_page'] = [
       'parent' => 'Timeline',
       'child' => ''
     ];
     $breadcrumb['data'] = array('home','timeline');
     $breadcrumb['link'] = array('');
     // get template
     $this->TopModel->get_template('timeline',$breadcrumb,$data,"Timeline");
   }
}


 ?>
