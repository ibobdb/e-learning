<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        if (!$this->session->userdata('id_user')) {
            $this->session->set_flashdata('message', ' <div class="alert alert-warning" role="alert">Silahkan login untuk ke halaman berikutnya
            </div>');
            redirect('auth');
        }
        $this->dashboard();
    }
    public function dashboard()
    {
        // Model
        $data['getMenu'] = $this->M_get->getMenu();
        $data['tittle'] = "Dashboard | Admin";
        $data['pageHeader'] = "Dashboard";
        $data['dataSekolah'] = $this->M_get->getDataSekolah();
        $this->load->view('layout/links', $data);
        $this->load->view('layout/header', $data);
        $this->load->view('pages/admin/dashboard', $data);
        $this->load->view('layout/javascript');
        $this->load->view('layout/footer');
    }
    // Features
    // Management Data Guru
    public function dataGuru()
    {
        // layout
        $data['getMenu'] = $this->M_get->getMenu();
        $data['tittle'] = "Data Guru | Admin ";
        $data['pageHeader'] = "Data Guru";
        // Get data
        $data['dataSekolah'] = $this->M_get->getDataSekolah();
        $data['getGuru'] = $this->M_get->getGuru();
        $this->load->view('layout/links', $data);
        $this->load->view('layout/header', $data);
        $this->load->view('pages/admin/dataGuru', $data);
        $this->load->view('layout/javascript');
        $this->load->view('layout/footer');
    }
    public function tambahGuru()
    {
        // $this->form_validation->set_rules('nip', 'Nip', 'required|trim|is_unique[tb_guru.nip]', ['is_unique' => 'NIP telah terdaftar']);
        // $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        // $this->form_validation->set_rules('kelamin', 'Nama', 'required|trim');
        // $this->form_validation->set_rules('status', 'Nama', 'required|trim');
        // $this->form_validation->set_rules('golongan', 'Nama', 'required|trim');
        // $this->form_validation->set_rules('jabatan', 'Nama', 'required|trim');
        // $this->form_validation->set_rules('ijazah', 'Nama', 'required|trim');

        if ($this->M_input->inputGuru()) {
            $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert"><b>Data berhasil di tambahkan!!</b>
            </div>');
            helper_log("add", "menambahkan data guru");
            redirect('admin/dataGuru');
        } else {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert"><b>Data gagal di proses</b>
            </div>');
            redirect('admin/dataGuru');
        }
    }
    public function importdataGuru()
    {
        // Panggil Library PHP EXCEL
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('importdata')) {

            //upload gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> ' . $this->upload->display_errors() . '</div>');
            //redirect halaman
            redirect('admin/dataGuru');
        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

            $data = array();

            $numrow = 1;
            foreach ($sheet as $row) {
                if ($numrow > 1) {
                    array_push($data, array(
                        'no_induk' => $row['A'],
                        'nama'      => $row['B'],
                        'jenis_kelamin'      => $row['C'],
                        'kelahiran'      => $row['D'],
                        'jabatan'      => $row['E'],
                        'status'      => $row['F'],
                        'golongan'      => $row['G'],
                        'ijazah'      => $row['H'],
                        'is_active'      => 0,

                    ));
                }
                $numrow++;
            }
            $this->db->insert_batch('tb_guru', $data);
            //delete file from server
            unlink(realpath('excel/' . $data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //    save log
            helper_log("add", "Import data guru");
            //redirect halaman
            redirect('admin/dataGuru');
        }
    }
    public function hapusDataguru($nip)
    {
        $tables = ['tb_guru', 'tb_user'];

        if (!$this->db->delete($tables, ['no_induk' => $nip])) {
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>DATA BERHASIL DI HAPUS!!!</b></div>');
            helper_log('hapus', 'menghapus ' . $nip);
            //redirect halaman
            redirect('admin/dataGuru');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger"><b>DATA GAGAL DI HAPUS!!!</b></div>');
            //redirect halaman
            redirect('admin/dataGuru');
        }
    }
    // Management Siswa
    public function dataSiswa()
    {
        // layout
        $data['getMenu'] = $this->M_get->getMenu();
        $data['tittle'] = "Data Siswa | Admin ";
        $data['pageHeader'] = "Data Siswa";
        // Get data
        $data['dataSekolah'] = $this->M_get->getDataSekolah();
        $data['getGuru'] = $this->M_get->getGuru();
        $data['getSiswa'] = $this->M_get->getSiswa();
        $this->load->view('layout/links', $data);
        $this->load->view('layout/header', $data);
        $this->load->view('pages/admin/dataSiswa', $data);
        $this->load->view('layout/javascript');
        $this->load->view('layout/footer');
    }
    public function tambahSiswa()
    {
        if ($this->M_input->inputSiswa()) {
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>DATA BERHASIL DI TAMBAHKAN!!!</b></div>');
            helper_log('add', 'menambah data siswa ');
            //redirect halaman
            redirect('admin/dataSiswa');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger"><b>DATA GAGAL DI TAMBAHKAN!!!</b></div>');

            //redirect halaman
            redirect('admin/dataSiswa');
        }
    }
    public function importDatasiswa()
    {
        // Panggil Library PHP EXCEL
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('importdata')) {

            //upload gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger"><b>PROSES IMPORT GAGAL!</b> ' . $this->upload->display_errors() . '</div>');
            //redirect halaman
            redirect('admin/dataGuru');
        } else {

            $data_upload = $this->upload->data();

            $excelreader     = new PHPExcel_Reader_Excel2007();
            $loadexcel         = $excelreader->load('excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
            $sheet             = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

            $data = array();

            $numrow = 1;
            foreach ($sheet as $row) {
                if ($numrow > 1) {
                    array_push($data, array(
                        'no_induk' => $row['A'],
                        'nama'      => $row['B'],
                        'tanggal'      => $row['C'],
                        'kelamin'      => $row['D'],
                        'agama'      => $row['E'],
                        'jurusan'      => $row['F'],
                        'tingkat'      => $row['G'],
                        'kelas'      => $row['H'],
                        'is_active'      => 0,

                    ));
                }
                $numrow++;
            }
            $this->db->insert_batch('tb_siswa', $data);
            //delete file from server
            unlink(realpath('excel/' . $data_upload['file_name']));

            //upload success
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>PROSES IMPORT BERHASIL!</b> Data berhasil diimport!</div>');
            //    save log
            helper_log("add", "Import data siswa");
            //redirect halaman
            redirect('admin/dataSiswa');
        }
    }
    // Data Sekolah
    public function dataSekolah()
    {
        // layout
        $data['getMenu'] = $this->M_get->getMenu();
        $data['tittle'] = "Data Sekolah | Admin ";
        $data['pageHeader'] = "Data Sekolah";
        // Get data
        $data['dataSekolah'] = $this->M_get->getDataSekolah();
        $this->load->view('layout/links', $data);
        $this->load->view('layout/header', $data);
        if ($this->db->get('tb_sekolah')->num_rows() == 0) {
            $this->load->view('pages/admin/tambahdataSekolah', $data);
        } else {
            $this->load->view('pages/admin/updatedataSekolah', $data);
        }

        $this->load->view('layout/javascript');
        $this->load->view('layout/footer');
    }
    public function tambahDataSekolah()
    {
        if ($this->M_input->inputSekolah()) {
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>DATA BERHASIL DISIMPAN!!</b> </div>');
            //    save log
            helper_log("update", "update data sekolah");
            //redirect halaman
            redirect('admin/dataSekolah');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger"><b>DATA GAGAL DISIMPAN!!</b> </div>');

            //redirect halaman
            redirect('admin/dataSekolah');
        }
    }
    public function updateDataSekolah()
    {
        if ($this->M_update->updateSekolah()) {
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>DATA BERHASIL DISIMPAN!!</b> </div>');
            //    save log
            helper_log("update", "update data sekolah");
            //redirect halaman
            redirect('admin/dataSekolah');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger"><b>DATA GAGAL DISIMPAN!!</b> </div>');

            //redirect halaman
            redirect('admin/dataSekolah');
        }
    }
    public function dataKelas()
    {
        // layout
        $data['getMenu'] = $this->M_get->getMenu();
        $data['tittle'] = "Data Kelas | Admin ";
        $data['pageHeader'] = "Data Kelas";
        // Get data
        $data['getKelas'] = $this->M_get->getKelas();
        $data['dataSekolah'] = $this->M_get->getDataSekolah();
        $this->load->view('layout/links', $data);
        $this->load->view('layout/header', $data);
        $this->load->view('pages/admin/dataKelas', $data);
        $this->load->view('layout/javascript');
        $this->load->view('layout/footer');
    }
    public function tambahKelas()
    {
        if ($this->M_input->inputkelas()) {
            $this->session->set_flashdata('message', '<div class="alert alert-success"><b>DATA BERHASIL DISIMPAN!!</b> </div>');
            //    save log
            helper_log("add", "Menambahkan kelas baru");
            //redirect halaman
            redirect('admin/dataKelas');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger"><b>DATA GAGAL DISIMPAN!!</b> </div>');

            //redirect halaman
            redirect('admin/dataKelas');
        }
    }
}
