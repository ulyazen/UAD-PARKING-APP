<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'username', 'required|trim|');
		$this->form_validation->set_rules('password', 'password', 'required|trim');
		if ($this->form_validation->run() == false) {
			$style = $this->load->view('style', '', true);
			$script = $this->load->view('script', '', true);
			$is_logged_in = $this->session->userdata('is_logged_in');
			$data = [];
			$this->template->load('master_auth', 'login_index', compact('style', 'script', 'data'));
			if (isset($is_logged_in) || $is_logged_in == true) {
				redirect('app');
			}
		} else {
			$this->loginAct();
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('username', 'username', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
			'matches' => 'Password tidak cocok.',
			'min_length' => 'Password setidaknya memiliki 8 karakter.',
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		if ($this->form_validation->run() == false) {
			$style = $this->load->view('style', '', true);
			$script = $this->load->view('script', '', true);
			$is_logged_in = $this->session->userdata('is_logged_in');
			$data = [];
			$this->template->load('master_auth', 'register_index', compact('style', 'script', 'data'));
			if (isset($is_logged_in) || $is_logged_in == true) {
				redirect('app');
			}
		} else {
			$data = [
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password2'), PASSWORD_DEFAULT),
				'status' => 0
			];
			$this->db->insert('tbl_user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
           Akun anda telah dibuat. </div>');
			redirect('auth/register');
		}
	}

	public function loginAct()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$userLogin = $this->db->get_where('tbl_user', ['username' => $username])->row_array();
		if ($userLogin) {
			if (password_verify($password, $userLogin['password'])) {
				$data = [
					'username' => $userLogin['username'],
					'is_logged_in' => true
				];
				$this->session->set_userdata($data);
				redirect('app');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Password yang anda inputkan salah. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button> </div>');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Akun tidak terdaftar. <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button> </div>');
			redirect('Auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('is_logged_in');
		redirect('Auth');
	}
}
