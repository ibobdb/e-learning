<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tes extends CI_Controller
{
    public function index()
    {
        $this->load->view('tes');
    }
    public function test()
    {
        $get = $this->db->get_where('tb_user', ['no_induk' => $this->input->post('user')])->row_array();
        if ($get) {
            if (password_verify($this->input->post('pass'), $get['password_user'])) {
                echo "SUSKES!!";
            } else {
                echo "PASSS SALAH";
                echo $get['password_user'];
                echo $this->input->post('pass');
            }
        } else {
            echo "kontol";
        }
    }
}
