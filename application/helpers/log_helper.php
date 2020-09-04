
<?php
defined('BASEPATH') or exit('No direct script access allowed');

function helper_log($tipe = "", $str = "")
{
    $CI = &get_instance();
    if (strtolower($tipe) == "login") {
        $log_tipe = 0;
    } elseif (strtolower($tipe) == "add") {
        $log_tipe = 1;
    } elseif (strtolower($tipe) == "update") {
        $log_tipe = 2;
    } elseif (strtolower($tipe) == "hapus") {
        $log_tipe = 3;
    } elseif (strtolower($tipe) == "logout") {
        $log_tipe = 4;
    } elseif (strtolower($tipe) == "post") {
        $log_tipe = 5;
    } else {
        $log_tipe = 6;
    }
    $data['log_user'] = $CI->session->userdata('no_induk');
    $data['log_tipe'] = $log_tipe;
    $data['tanggal'] = date('Y-m-d H:i:s');
    $data['level'] = $CI->session->userdata('level');
    $data['log_str'] = $str;
    // load model
    $CI->load->model('M_input');
    $CI->M_input->saveLog($data);
}
