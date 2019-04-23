<?php

class Login extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('LoginModel');
    $this->load->library('session');
    $this->load->library('form_validation');
  }
  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();
    $this->load->view('header2', $data);
    $this->load->view('top');
    $this->load->view('footer');
  }
  public function detail_top()
  {
    $data['user'] = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();
    $this->load->view('header2', $data);
    $this->load->view('detail_top');
    $this->load->view('footer');
  }
  public function sport()
  {
    $data['user'] = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();
    $this->load->view('header2', $data);
    $this->load->view('sport');
    $this->load->view('footer');
  }
  public function detail_sport()
  {
    $data['user'] = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();
    $this->load->view('header2', $data);
    $this->load->view('detail_sport');
    $this->load->view('footer');
  }
  public function news()
  {
    $data['user'] = $this->db->get_where('user', ['username' =>
    $this->session->userdata('username')])->row_array();
    $this->load->view('header2', $data);
    $this->load->view('news');
    $this->load->view('footer');
  }
}
