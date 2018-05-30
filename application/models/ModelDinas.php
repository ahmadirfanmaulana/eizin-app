<?php
/**
 *
 */
class ModelDinas extends CI_Model
{
  public function dinas_id()
  {
    $db = $this->TopModel->db();
    $sql = $db->query("SELECT * FROM tb_dinas ORDER BY dinas_id DESC");
    $data = $sql->fetch_assoc();
    if (empty($data['dinas_id'])) {
      $data['dinas_id'] = 0;
    }
    $dinas_id = $data['dinas_id'] + 1;

    return $dinas_id;
  }
  public function tambah()
  {
    if ($this->input->post('button')) {
      if ($this->TopModel->upload('dinas_photo','img/dinas','png|jpg|jpeg',1000)) {
        $dinas_photo = $this->upload->data('file_name');
      }
      else{
        $dinas_photo = "default.png";
      }

      $dinas_id = $this->dinas_id();
      $rand = rand(111111111,999999999);
      $data_dinas = array(
        'dinas_id' => $dinas_id,
        'dinas_nama' => $this->input->post('dinas_nama'),
        'dinas_photo' => $dinas_photo,
        'dinas_password' => $rand,
        'dinas_email' => $this->input->post('dinas_email'),
        'dinas_entri' => date('Y-m-d H:i:s')
      );
      $data_user = array(
        'user_dinas_id' => $dinas_id,
        'user_username' => strtoupper(substr(md5($this->input->post('dinas_nama')),0,9)),
        'user_password' => $this->TopModel->encription_password($rand),
        'user_entri' => date('Y-m-d H:i:s')
      );

      $insert_dinas = $this->db->insert('tb_dinas',$data_dinas);
      $insert_user = $this->db->insert('tb_users',$data_user);

      if ($insert_dinas && $insert_user) {
        if (!empty($this->input->post('dinas_email'))) {
          // kirim notifikasi email ke admin
          if ($this->TopModel->email_active == "on") {
            $from = $this->TopModel->email_admin();
            $to = $this->input->post('dinas_email');
            $subject = "e-Izin membuat akun anda";
            $pesan = "Username : ".strtoupper(substr(md5($this->input->post('dinas_nama')),0,9))."<br> Password : ".$this->TopModel->encription_password($rand);
            $header = "From:".$from;
            mail($to,$subject,$pesan,$header);
          }
        }

        // create dir
        mkdir('./upload/attachment/dinas'.$dinas_id);
        return $this->TopModel->alert_success('Sukses','Data dinas berhasil disimpan.');
      }
      else{
        return $this->TopModel->alert_success('Gagal','Data dinas gagal disimpan.');
      }
    }
  }
  public function edit($dinas_id)
  {
    if ($this->input->post('button')) {
      $dinas_photo_then = $this->input->post('dinas_photo_then');
      if ($this->TopModel->upload('dinas_photo','img/dinas','png|jpg|jpeg',1000)) {
        $dinas_photo = $this->upload->data('file_name');
        if ($dinas_photo_then!="default.png") {
          unlink('./upload/img/dinas/'.$dinas_photo_then);
        }
      }
      else{
        $dinas_photo = $dinas_photo_then;
      }

      $data_dinas = array(
        'dinas_nama' => $this->input->post('dinas_nama'),
        'dinas_email' => $this->input->post('dinas_email'),
        'dinas_photo' => $dinas_photo,
      );

      $this->db->where('dinas_id',$dinas_id);
      $edit_dinas = $this->db->update('tb_dinas',$data_dinas);

      if ($edit_dinas) {
        return $this->TopModel->alert_success('Sukses','Data dinas berhasil diupdate.');
      }
      else{
        return $this->TopModel->alert_success('Gagal','Data dinas gagal diupdate.');
      }
    }
  }
}

 ?>
