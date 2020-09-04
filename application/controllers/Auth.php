<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_get', 'M_get');
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        if (!$this->session->userdata('id_user')) {
            $this->formLogin();
        } else {
            $pages = $this->db->get('tb_user')->result_array();
            $user_level = $this->session->userdata('level');
            if ($pages['level'] = $user_level) {
                redirect('admin');
            } elseif ($pages['level'] = $user_level) {
                redirect('guru');
            } else {
                redirect('siswa');
            }
        }
    }
    public function formlogin()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');

        if (!$this->form_validation->run()) {
            $data['tittle'] = "Web E-Learning | Masuk";
            // Model
            $data['getLevel'] = $this->M_get->getLevel();
            $this->load->view('layout/links', $data);
            $this->load->view('auth/formLogin', $data);
            $this->load->view('layout/javascript');
            $this->load->view('layout/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $post = $this->input->post();

        $getuser = $this->db->get_where('tb_user', ['no_induk' => $post['username']])->row_array();

        if ($getuser) {
            $passVerify = password_verify($post['password'], $getuser['password_user']);

            if ($passVerify) {
                $data = [
                    'id_user' => $getuser['id_user'],
                    'no_induk' => $getuser['no_induk'],
                    'nama' => $getuser['nama_lengkap'],
                    'level' => $getuser['level']
                ];
                $this->session->set_userdata($data);

                helper_log("login", "Login");
                if ($getuser['level'] == 1) {
                    // Masuk Sebagai Admin

                    redirect('Admin');
                } elseif ($getuser['level'] == 2) {
                    // Masuk Sebagai Guru
                    $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">Login Berhasil Guru
                </div>');
                    redirect('Guru');
                } else {
                    // Masuk Sebagai Siswa
                    $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">Login Berhasil Siswa
                </div>');
                    redirect('auth/formLogin');
                }
            } else {
                $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Password Salah
                </div>');
                redirect('auth/formLogin');
            }
        } else {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Login Gagal!! <span> Username & Password </span> salah atau belum terdaftar
            </div>');
            redirect('auth/formLogin');
        }
    }
    public function checkUser()
    {

        $data['tittle'] = "Web E-Learning | Daftar";
        // Form Validation
        $post = $this->input->post();
        $this->form_validation->set_rules('username', 'Username', 'required');
        if (!$this->form_validation->run()) {
            $this->load->view('layout/links', $data);
            $this->load->view('auth/formCheckUser', $data);
            $this->load->view('layout/javascript');
            $this->load->view('layout/footer');
        } else {
            $getguru = $this->db->get_where('tb_guru', ['no_induk' => $this->input->post('username')])->row_array();
            $getSiswa = $this->db->get_where('tb_siswa', ['no_induk' => $post['username']])->row_array();
            if ($getguru) {
                $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">Data Tersedia sebagai Guru
                </div>');
                $data = ['no_induk' => $getguru['no_induk'], 'level' => 2, 'nama' => $getguru['nama']];
                $this->session->set_userdata($data);
                redirect('auth/formDaftar');
            } elseif ($getSiswa) {
                $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">Data tersedia sebagai siswa
                </div>');
                $data = ['no_induk' => $getSiswa['no_induk'], 'level' => 3, 'nama' => $getSiswa['nama']];
                $this->session->set_userdata($data);
                redirect('auth/formDaftar');
            } else {
                $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Data Tidak Tersedia!!!
                </div>');
                redirect('auth/checkUser');
            }
        }
    }
    public function formDaftar()
    {
        if (!$this->session->userdata('no_induk')) {
            $this->session->set_flashdata('message', ' <div class="alert alert-warning" role="alert">Jika tidak mempunyaiakn silahkan kil tombol daftar
            </div>');
            $this->formLogin();
        } else {

            $data['tittle'] = "Daftar";

            //    Form validation
            $this->form_validation->set_rules('nama_user', 'Nama', 'required|trim');
            $this->form_validation->set_rules('email_user', 'Email', 'required|trim|is_unique[tb_user.email]', ['is_unique' => 'Alamat email telah terdatar pada akun lain !!']);

            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', ['matches' => 'Pastikan Password sama', 'required' => 'password harus di isi !!']);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
            if (!$this->form_validation->run()) {
                $this->load->view('layout/links', $data);
                $this->load->view('auth/formDaftar', $data);
                $this->load->view('layout/javascript');
                $this->load->view('layout/footer');
            } else {

                $this->_daftar();
            }
        }
    }
    private function _daftar()
    {

        $data = [
            'no_induk' => $this->input->post('no_induk'),
            'nama_lengkap' => $this->input->post('nama_user'),
            'email' => $this->input->post('email_user'),
            'password_user' => password_hash($this->input->post('password1'), PASSWORD_BCRYPT),
            'level' => $this->session->userdata('level'),
            'is_created' => date('Y-m-d H:i:s')
        ];
        $insertUser = $this->db->insert('tb_user', $data);
        if ($insertUser) {
            $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert"><h5>Selamat!!!</h5> Anda telah terdaftar, silahkan login untuk lanjutke halaman berikutnya
            </div>');
            // Set is_active
            $no_induk = $this->session->userdata('no_induk');
            $setGuru = $this->db->get_where('tb_guru', ['no_induk' => $no_induk])->row_array();
            $setSiswa = $this->db->get_where('tb_siswa', ['no_induk' => $no_induk])->row_array();
            if ($setGuru) {
                $this->db->set('is_active', 1);
                $this->db->where('no_induk', $setGuru['no_induk']);
                $this->db->update('tb_guru');
            } else {
                $this->db->set('is_active', 1);
                $this->db->where('no_induk', $setSiswa['no_induk']);
                $this->db->update('tb_siswa');
            }
            helper_log('add', 'Joined');
            $data = ['no_induk', 'level'];
            $this->session->unset_userdata($data);
            redirect('auth/formLogin');
        } else {
            $this->session->set_flashdata('message', ' <div class="alert alert-danger" role="alert">Data tidak dapat disimpan!!
            </div>');
            redirect('auth/formLogin');
        }
    }
    public function logout()
    {
        $data = [
            'id_user',
            'nama',
            'level'
        ];
        helper_log('logout', 'Logout');
        $this->session->unset_userdata($data);
        $this->session->set_flashdata('message', ' <div class="alert alert-success" role="alert">Anda berhasil keluar !!!
        </div>');
        redirect('auth/formLogin');
    }
}
