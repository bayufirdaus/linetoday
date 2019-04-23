<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Line extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
		$this->load->library('session');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('top');
		$this->load->view('footer');
	}
	public function detail_top()
	{
		$this->load->view('header');
		$this->load->view('detail_top');
		$this->load->view('footer');
	}
	public function sport()
	{
		$this->load->view('header');
		$this->load->view('sport');
		$this->load->view('footer');
	}
	public function detail_sport()
	{
		$this->load->view('header');
		$this->load->view('detail_sport');
		$this->load->view('footer');
	}
	public function news()
	{
		$this->load->view('header');
		$this->load->view('news');
		$this->load->view('footer');
	}
	public function registrasi()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
		if ($this->form_validation->run() == false) {
			$this->load->view('registrasi');
		} else {
			$data = [
				'username' => $this->input->post('username', true),
				'email' => $this->input->post('email', true),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			];
			$table = 'user';
			$register = $this->LoginModel->register_user($table, $data);
			if ($register) {
				$this->session->set_flashdata('alert', 'registrasi_berhasil');
				redirect('LoginController/index');
			}
		}
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view('login');
		} else {
			$this->process_login();
		}
	}

	public function process_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$login = $this->db->get_where('user', ['username' => $username])->row_array();
		if ($login) {
			if (password_verify($password, $login['password'])) {
				$data = [
					'username' => $login['username'],
				];
				$this->session->set_userdata($data);
				redirect('Login/index');
			} else {
				$this->session->set_flashdata('message', 'Gagal login: Cek password! ');
				redirect('line/login');
			}
		} else {
			$this->session->set_flashdata('message', 'Gagal login: Cek username! ');
			redirect('line/login');
		}
	}
}
