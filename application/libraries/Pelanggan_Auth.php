<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_Auth
{
	protected $ci;
	
	public function __construct()
	{
		$this->ci = &get_instance();
		$this->ci->load->model('m_auth');
	}

	public function login($email, $password)
	{
		$cek = $this->ci->m_auth->login_pelanggan($email, $password);
		if ($cek) {
			$id_pelanggan = $cek->id_pelanggan;
			$nama_pelanggan = $cek->nama_pelanggan;
			$email = $cek->email;

			// Session
			$this->ci->session->set_userdata('id_pelanggan', $id_pelanggan);
			$this->ci->session->set_userdata('nama_pelanggan', $nama_pelanggan);
			$this->ci->session->set_userdata('email', $email);
			redirect('pelanggan');
		} else {
			$this->ci->session->set_flashdata('error', 'Email/Password Salah !!!');
			redirect('auth/login_pelanggan');
		}
	}

	public function proteksi_halaman()
	{
		if ($this->ci->session->userdata('nama_pelanggan') == '') {
			$this->ci->session->set_flashdata('error', 'Belum Login !!!');
			redirect('auth/login_pelanggan');
		}
	}

	public function logout()
	{
		$this->ci->session->unset_userdata('id_pelanggan');
		$this->ci->session->unset_userdata('nama_pelanggan');
		$this->ci->session->unset_userdata('email');
		$this->ci->session->set_flashdata('pesan', 'Berhasil Logout !!!');
		redirect('auth/login_pelanggan');
	}
}