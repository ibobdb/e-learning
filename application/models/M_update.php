<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_update extends CI_Model
{
    public function updateSekolah()
    {
        $post = $this->input->post();
        $data = [
            'npsn' => $post['npsn'],
            'nama_sekolah' => $post['nama_sekolah'],
            'status' => $post['status'],
            'jenjang' => $post['pendidikan'],
            'logo' => $this->_uploadLogo(),
            'is_active' => 1
        ];
        return $this->db->update('tb_sekolah', $data);
    }
    private function _uploadLogo()
    {
        $data['upload_path']          = './assets/img/logo/';
        $data['allowed_types']        = 'gif|jpg|png';

        $data['overwrite']            = true;
        $data['max_size']             = 1024; // 1MB


        $this->load->library('upload', $data);

        if ($this->upload->do_upload('uploadLogo')) {
            return $this->upload->data("file_name");
        }

        return "default.png";
    }
}
