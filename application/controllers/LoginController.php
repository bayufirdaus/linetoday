<?php

defined('BASEPATH') or exit('No direct script access allowed');


class LoginController extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('LoginModel');
    $this->load->library('form_validation');
  }

  public function index()
  {
    if ($this->session->userdata('login') == 1) {
      redirect('BelajarController/index');
    }
    $this->load->view('login');
  }

  public function register_view()
  {
    $this->load->view('register');
  }

  public function cek_login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $login = $this->LoginModel->login_user($username, $password);

    if ($login) {
      $sess_data = array(
        'logged_in' => 1,
        'username' => $login->username
      );
      $this->session->set_userdata($sess_data);
      redirect('BelajarController/index');
    } else {
      $this->session->set_flashdata('message1', 'Gagal login: Cek username, password! ');
      redirect('LoginController/index');
    }
  }

  public function register()
  {
    if ($this->form_validation->rin() == false) { }
    $this->load->model('LoginModel');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $email = $this->input->post('email');
    $table = 'data_diri';

    $data_insert = array(
      'username' => $username,
      'password' => $password,
      'email' => $email
    );

    $register = $this->LoginModel->register_user($table, $data_insert);

    if ($register) {
      $this->session->set_flashdata('alert', 'registrasi_berhasil');
      redirect('LoginController/index');
    }
  }
}
