<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_auth');
	}

	public function login_admin()
	{
		$this->form_validation->set_rules('username', 'Username', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('password', 'Password', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));

		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->admin_auth->login($username, $password);
		}
		$data = array(
			'tittle' => 'Login Admin',
		);
		$this->load->view('admin/login', $data, FALSE);
	}

	public function logout_admin()
	{
		$this->admin_auth->logout();
	}

	public function register_pelanggan()
	{
		$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[pelanggan.email]', array(
			'required' => '%s Harus Diisi !!!',
			'is_unique' => '%s Sudah Terdaftar !!!'
		));
		$this->form_validation->set_rules('password', 'Password', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('retype_password', 'Retype Password', 'required|matches[password]', array(
			'required' => '%s Harus Diisi !!!',
			'matches' => 'Password Tidak Sama !!!'
		));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'tittle' => 'Register Pelanggan',
				'isi' => 'pelanggan/register',
			);
			$this->load->view('layout/wrapper_frontend', $data, FALSE);
		} else {
			$data = array(
				'nama_pelanggan' => $this->input->post('nama_pelanggan'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
			);
			$this->m_auth->register_pelanggan($data);
			$this->session->set_flashdata('pesan', 'Register Berhasil <br> Silahkan Login Kembali !!!');
			redirect('auth/register_pelanggan');
		}
	}

	public function login_pelanggan()
	{
		$this->form_validation->set_rules('email', 'Email', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('password', 'Password', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));

		if ($this->form_validation->run() == TRUE) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$this->pelanggan_auth->login($email, $password);
		}
		$data = array(
			'tittle' => 'Login Pelanggan',
			'isi' => 'pelanggan/login',
		);
		$this->load->view('layout/wrapper_frontend', $data, FALSE);
	}

	public function logout_pelanggan()
	{
		$this->cart->destroy();
		$this->pelanggan_auth->logout();
	}
}