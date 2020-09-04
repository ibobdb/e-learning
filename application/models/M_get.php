<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_get extends CI_Model
{
    public function getLevel()
    {
        return $this->db->get('tb_level')->result_array();
    }
    public function getMenu()
    {
        return $this->db->get_where('tb_menu', ['role' => $this->session->userdata('level')])->result_array();
    }
    public function getUser()
    {
        return $this->db->get('tb_user')->result_array();
    }
    public function getGuru()
    {
        return $this->db->get('tb_guru')->result_array();
    }
    public function getSiswa()
    {
        return $this->db->get('tb_siswa')->result_array();
    }
    public function getDataSekolah()
    {
        return $this->db->get_where('tb_sekolah', ['npsn' => 10310590])->result_array();
    }
    public function getKelas()
    {
        return $this->db->get('tb_kelas')->result_array();
    }
    public function getMapel()
    {
        return $this->db->get('tb_mapel')->result_array();
    }
    // Mengambil data materi yang telah di upload guru
    public function getRiwayatUpload()
    {
        $this->db->select('*');
        $this->db->from('tb_materi');
        $this->db->join('tb_mapel', 'tb_mapel.id_mapel=tb_materi.id_mapel');
        $this->db->join('tb_kelas', 'tb_kelas.id_kelas=tb_materi.id_kelas');
        $this->db->where('uploader', $this->session->userdata('no_induk'));
        return $this->db->get()->result_array();
    }
    public function downloadMateri($id_materi)
    {
        return $this->db->get_where('tb_materi', ['id_materi' => $id_materi])->row_array();
    }
}
