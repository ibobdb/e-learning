<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_input extends CI_Model
{
    public function inputGuru()
    {
        $post = $this->input->post();
        $data = [
            'no_induk' => $post['nip'],
            'nama' => $post['nama'],
            'jenis_kelamin' => $post['kelamin'],
            'kelahiran' => $post['kelahiran'],
            'status' => $post['status'],
            'golongan' => $post['golongan'],
            'jabatan' => $post['jabatan'],
            'ijazah' => $post['ijazah'],
            'is_active' => 0
        ];
        return $this->db->insert('tb_guru', $data);
    }
    public function saveLog($data)
    {

        $sql        = $this->db->insert_string('tb_log', $data);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }
    public function inputSiswa()
    {
        $post = $this->input->post();
        $data = [
            'no_induk' => $post['nis'],
            'nama' => $post['nama'],
            'kelamin' => $post['kelamin'],
            'tanggal' => $post['kelahiran'],
            'agama' => $post['agama'],
            'jurusan' => $post['jurusan'],
            'tingkat' => $post['tingkat'],
            'kelas' => $post['kelas'],
            'is_active' => 0
        ];
        return $this->db->insert('tb_siswa', $data);
    }
    public function inputSekolah()
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
        return $this->db->insert('tb_sekolah', $data);
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
    public function inputKelas()
    {
        $post = $this->input->post();
        $data = [
            'label_kelas' => $post['label'],
            'tingkat' => $post['tingkat'],

            'jurusan' => $post['jurusan']
        ];
        return $this->db->insert('tb_kelas', $data);
    }
    public function postMateri()
    {
        $post = $this->input->post();
        $data = [
            'id_mapel' => $post['mapel'],
            'id_kelas' => $post['kelas'],
            'is_created' => date('Y-m-d H:i:s'),
            'judul_materi' => $post['nm_materi'],
            'uploader' => $this->session->userdata('no_induk'),
            'materi' => $this->_uploadMateri()
        ];
        return $this->db->insert('tb_materi', $data);
    }
    private function _uploadMateri()
    {
        $data['upload_path']          =  './assets/data/materi/';
        $data['allowed_types']        = 'docx|pdf';
        $data['overwrite']            = true;
        $data['max_size']             = 5000;
        $this->load->library('upload', $data);
        if ($this->upload->do_upload('materi')) {
            return $this->upload->data("file_name");
        }
    }
}
