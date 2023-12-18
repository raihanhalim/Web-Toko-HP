<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Auth
{
	protected $ci;
	
	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('m_auth');
	}

	public function login($username, $password)
	{
		$cek = $this->ci->m_auth->login_admin($username, $password);
		if ($cek) {
			$nama_admin = $cek->nama_admin;
			$username = $cek->username;

			// Session
			$this->ci->session->set_userdata('nama_admin', $nama_admin);
			$this->ci->session->set_userdata('username', $username);
			redirect('admin');
		} else {
			$this->ci->session->set_flashdata('error', 'Username/Password Salah !!!');
			redirect('auth/login_admin');
		}
	}

	public function proteksi_halaman()
	{
		if ($this->ci->session->userdata('username') == '') {
			$this->ci->session->set_flashdata('error', 'Belum Login !!!');
			redirect('auth/login_admin');
		}
	}

	public function logout()
	{
		$this->ci->session->unset_userdata('nama_admin');
		$this->ci->session->unset_userdata('username');
		$this->ci->session->set_flashdata('pesan', 'Berhasil Logout !!!');
		redirect('auth/login_admin');
	}
}