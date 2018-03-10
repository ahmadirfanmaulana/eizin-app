<?php
/**
 *
 */
class ModelSklk extends CI_Model
{
  public function eizin_id()
  {
    $db = $this->TopModel->db();
    $sql = $db->query("SELECT * FROM tb_eizin ORDER BY eizin_id DESC");
    $data = $sql->fetch_assoc();
    if (empty($data['eizin_id'])) {
      $data['eizin_id'] = 0;
    }
    $eizin_id = $data['eizin_id'] + 1;

    return $eizin_id;
  }
  public function get_dinas_id($user_id)
  {
    $sql = mysqli_query($this->TopModel->db(),"select * from tb_dinas inner join tb_users on tb_dinas.dinas_id = tb_users.user_dinas_id where user_id = $user_id");
    $data = mysqli_fetch_array($sql);

    return $data['dinas_id'];
  }
 public function tambah()
 {
   if ($this->input->post('button')) {
     $eizin_id = $this->eizin_id();
     $this_dir = "sklk".$eizin_id;

     $data_biodata = array(
       'biodata_eizin_id' => $eizin_id,
       'biodata_nama' => $this->input->post('biodata_nama'),
       'biodata_nomor' => $this->input->post('biodata_nomor'),
       'biodata_tanggal_surat' => $this->input->post('biodata_tanggal_surat'),
       'biodata_nip' => $this->input->post('biodata_nip'),
       'biodata_pangkat' => $this->input->post('biodata_pangkat'),
       'biodata_jabatan' => $this->input->post('biodata_jabatan'),
       'biodata_almamater' => $this->input->post('biodata_almamater'),
       'biodata_penyelenggara' => $this->input->post('biodata_penyelenggara'),
       'biodata_program' => $this->input->post('biodata_program'),
       'biodata_jurusan' => $this->input->post('biodata_jurusan'),
       'biodata_alamat' => $this->input->post('biodata_alamat'),
       'biodata_no_ijazah' => $this->input->post('biodata_no_ijazah'),
       'biodata_nilai' => $this->input->post('biodata_nilai'),
       'biodata_unit_kerja' => $this->input->post('biodata_unit_kerja'),
       'biodata_tahun_kelulusan' => $this->input->post('biodata_tahun_kelulusan'),
       'biodata_entri' => date('Y-m-d H:i:s')
     );
     $data_eizin = array(
       'eizin_id' => $eizin_id,
       'eizin_dinas_id' => $this->get_dinas_id($this->session->userdata('id')),
       'eizin_dir' => $this_dir,
       'eizin_type' => 'SKLK',
       'eizin_kode' => strtoupper(md5($eizin_id)),
       'eizin_entri' => date('Y-m-d H:i:s'),
     );

     $action = $this->db->insert('tb_biodata',$data_biodata);
     $action2 = $this->db->insert('tb_eizin',$data_eizin);

     if ($action && $action2) {
       // create Directory
       $dir_dinas = file_exists('./upload/attachment/dinas'.$this->session->userdata('dinas_id'));
       if (!$dir_dinas) {
         mkdir('./upload/attachment/dinas'.$this->session->userdata('dinas_id'));
       }
       mkdir('./upload/attachment/dinas'.$this->session->userdata('dinas_id')."/".$this_dir);
       // return jika berhasil
       redirect(URL."sklk/".$eizin_id."/view");
     }
     else {
       return $this->TopModel->alert_danger('Gagal','Biodata gagal ditambahkan');
     }
   }
 }

 public function edit($biodata_eizin_id)
 {
   $dir_dinas = file_exists('./upload/attachment/dinas'.$this->session->userdata('dinas_id'));
   if (!$dir_dinas) {
     mkdir('./upload/attachment/dinas'.$this->session->userdata('dinas_id'));
   }
   if ($this->input->post('button')) {
     $data_biodata = array(
       'biodata_nama' => $this->input->post('biodata_nama'),
       'biodata_nomor' => $this->input->post('biodata_nomor'),
       'biodata_tanggal_surat' => $this->input->post('biodata_tanggal_surat'),
       'biodata_nip' => $this->input->post('biodata_nip'),
       'biodata_pangkat' => $this->input->post('biodata_pangkat'),
       'biodata_jabatan' => $this->input->post('biodata_jabatan'),
       'biodata_almamater' => $this->input->post('biodata_almamater'),
       'biodata_penyelenggara' => $this->input->post('biodata_penyelenggara'),
       'biodata_program' => $this->input->post('biodata_program'),
       'biodata_jurusan' => $this->input->post('biodata_jurusan'),
       'biodata_alamat' => $this->input->post('biodata_alamat'),
       'biodata_no_ijazah' => $this->input->post('biodata_no_ijazah'),
       'biodata_nilai' => $this->input->post('biodata_nilai'),
       'biodata_unit_kerja' => $this->input->post('biodata_unit_kerja'),
       'biodata_tahun_kelulusan' => $this->input->post('biodata_tahun_kelulusan')
     );

     $this->db->where('biodata_eizin_id',$biodata_eizin_id);
     $action = $this->db->update('tb_biodata',$data_biodata);

     if ($action) {
       return "berhasil";
     }
     else {
       return "gagal";
     }
   }
 }
 public function upload($eizin_id,$at_id)
 {
  $row_attachment = $this->db->get_where('tb_attachment',array('attachment_at_id'=>$at_id,'attachment_eizin_id'=>$eizin_id))->num_rows();
  if ($row_attachment>0) {
    redirect(URL."sklk/".$eizin_id."/view");
  }
  if ($this->input->post('upload')) {
    $dir_dinas = file_exists('./upload/attachment/dinas'.$this->session->userdata('dinas_id'));
    if (!$dir_dinas) {
      mkdir('./upload/attachment/dinas'.$this->session->userdata('dinas_id'));
    }
    $dir_eizin = file_exists('./upload/attachment/dinas'.$this->session->userdata('dinas_id').'/sklk'.$eizin_id);
    if (!$dir_eizin) {
      mkdir('./upload/attachment/dinas'.$this->session->userdata('dinas_id').'/sklk'.$eizin_id);
    }
    if ($this->TopModel->upload('file','attachment/dinas'.$this->session->userdata('dinas_id').'/sklk'.$eizin_id,"png|jpg|jpeg",5000)) {
      $file_name = $this->upload->data('file_name');
      $file_size = $this->upload->data('file_size');
      $file_type = $this->upload->data('file_type');
      $file_ext = $this->upload->data('file_ext');

      $data = array(
        'attachment_at_id' => $at_id,
        'attachment_eizin_id' => $eizin_id,
        'attachment_file_name' => $file_name,
        'attachment_file_type' => $file_type,
        'attachment_file_size' => $file_size,
        'attachment_file_ext' => $file_ext,
        'attachment_entri' => date('Y-m-d H:i:s')
      );

      $action = $this->db->insert('tb_attachment',$data);
      if ($action) {
        redirect(URL."sklk/".$eizin_id."/view");
      }
      else {
        return array("gagal");
      }
    }
    else {
      return $this->upload->display_errors();
    }
  }
 }

 public function edit_upload($eizin_id,$at_id)
 {
  $row_attachment = $this->db->get_where('tb_attachment',array('attachment_at_id'=>$at_id,'attachment_eizin_id'=>$eizin_id))->num_rows();
  if ($row_attachment==0) {
    redirect(URL."sklk/".$eizin_id."/view");
  }
  if ($this->input->post('upload')) {
    $dir_dinas = file_exists('./upload/attachment/dinas'.$this->session->userdata('dinas_id'));
    if (!$dir_dinas) {
      mkdir('./upload/attachment/dinas'.$this->session->userdata('dinas_id'));
    }
    $dir_eizin = file_exists('./upload/attachment/dinas'.$this->session->userdata('dinas_id').'/sklk'.$eizin_id);
    if (!$dir_eizin) {
      mkdir('./upload/attachment/dinas'.$this->session->userdata('dinas_id').'/sklk'.$eizin_id);
    }
    if ($this->TopModel->upload('file','attachment/dinas'.$this->session->userdata('dinas_id').'/sklk'.$eizin_id,"png|jpg|jpeg",5000)) {
      // haspus file dahulu
      unlink('./upload/attachment/dinas'.$this->session->userdata('dinas_id').'/sklk'.$eizin_id.'/'.$this->input->post('file_then'));

      $file_name = $this->upload->data('file_name');
      $file_size = $this->upload->data('file_size');
      $file_type = $this->upload->data('file_type');
      $file_ext = $this->upload->data('file_ext');

      $data = array(
        'attachment_file_name' => $file_name,
        'attachment_file_type' => $file_type,
        'attachment_file_size' => $file_size,
        'attachment_file_ext' => $file_ext,
      );

      $this->db->where('attachment_eizin_id',$eizin_id);
      $this->db->where('attachment_at_id',$at_id);
      $action = $this->db->update('tb_attachment',$data);
      if ($action) {
        redirect(URL."sklk/".$eizin_id."/view");
      }
      else {
        return array("gagal");
      }
    }
    else {
      return $this->upload->display_errors();
    }
  }
 }

 public function hapus_upload($eizin_id,$at_id)
 {
   if ($this->input->post('upload')) {
     $this->db->where(array('attachment_eizin_id'=>$eizin_id,'attachment_at_id'=>$at_id));
     if ($this->db->delete('tb_attachment')) {
       unlink('./upload/attachment/dinas'.$this->session->userdata('dinas_id').'/sklk'.$eizin_id.'/'.$this->input->post('file_then'));
       redirect(URL."sklk/".$eizin_id."/view");
     }
     else {
       return array("gagal");
     }
   }
 }
}

 ?>
