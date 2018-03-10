<?php

/**
 *
 */
class ModelLampiran extends CI_Model
{
  public function tambah()
  {
    if ($this->input->post('button')) {

      $data_lampiran = array(
        'at_nama' => $this->input->post('at_nama'),
        'at_deskripsi' => $this->input->post('at_deskripsi'),
        'at_type' => $this->input->post('at_type'),
        'at_entri' => date('Y-m-d H:i:s')
      );

      $insert_lampiran = $this->db->insert('tb_attachment_type',$data_lampiran);

      if ($insert_lampiran) {
        return $this->TopModel->alert_success('Sukses','Data lampiran berhasil disimpan.');
      }
      else{
        return $this->TopModel->alert_success('Gagal','Data lampiran gagal disimpan.');
      }
    }
  }

  public function edit($at_id)
  {
    if ($this->input->post('button')) {

      $data_lampiran = array(
        'at_nama' => $this->input->post('at_nama'),
        'at_deskripsi' => $this->input->post('at_deskripsi'),
        'at_type' => $this->input->post('at_type')
      );

      $this->db->where('at_id',$at_id);
      $edit_lampiran = $this->db->update('tb_attachment_type',$data_lampiran);

      if ($edit_lampiran) {
        return $this->TopModel->alert_success('Sukses','Data lampiran berhasil diupdate.');
      }
      else{
        return $this->TopModel->alert_success('Gagal','Data lampiran gagal diupdate.');
      }
    }
  }
}


 ?>
