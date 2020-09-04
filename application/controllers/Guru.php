<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_get', 'M_get');
        $this->load->model('M_input', 'M_input');
        $this->load->model('M_update', 'M_update');
        date_default_timezone_set('Asia/Jakarta');
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
        if (!$this->session->userdata('id_user')) {
            $this->session->set_flashdata('message', ' <div class="alert alert-warning" role="alert">Silahkan login untuk ke halaman berikutnya
            </div>');
            redirect('auth');
        }
    }
    public function index()
    {
        $this->dashboard();
    }
    public function dashboard()
    {
        $data['getMenu'] = $this->M_get->getMenu();
        $data['tittle'] = "Dashboard | Guru";
        $data['pageHeader'] = "Dashboard";
        $data['dataSekolah'] = $this->M_get->getDataSekolah();
        $data['rows_kelas'] = $this->db->get('tb_kelas')->num_rows();
        $this->load->view('layout/links', $data);
        $this->load->view('layout/header', $data);
        $this->load->view('pages/guru/dashboard', $data);
        $this->load->view('layout/javascript');
        $this->load->view('layout/footer');
    }
    public function kelasOnline()
    {
        $data['getMenu'] = $this->M_get->getMenu();
        $data['tittle'] = "Dashboard | Guru";
        $data['pageHeader'] = "Dashboard";
        $data['dataSekolah'] = $this->M_get->getDataSekolah();
        $data['getKelas'] = $this->M_get->getKelas();
        $data['getMapel'] = $this->M_get->getMapel();
        $data['riwayat_upload'] = $this->M_get->getRiwayatUpload();
        $this->load->view('layout/links', $data);
        $this->load->view('layout/header', $data);
        $this->load->view('pages/guru/kelasOnline', $data);
        $this->load->view('layout/javascript');
        $this->load->view('layout/footer');
    }
    public function newMateri()
    {
        if ($this->M_input->postMateri()) {
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>DATA BERHASIL DI TAMBAHKAN!!!</b></div>');
            helper_log('add', 'Upload Materi ');
            //redirect halaman
            redirect('guru/kelasOnline');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger"><b>DATA GAGAL DI TAMBAHKAN!!!</b></div>');

            //redirect halaman
            redirect('guru/kelasOnline');
        }
    }
    public function download($id_materi)
    {
        $getFile = $this->M_get->downloadMateri($id_materi);
        $file = './assets/data/materi/' . $getFile['materi'];
        return force_download($file, NULL);
    }
    public function tesBOT()
    {
    }
}
