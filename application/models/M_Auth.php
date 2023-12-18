<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Auth extends CI_Model {
	public function login_admin($username, $password)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where(array(
			'username' => $username,
			'password' => $password
		));
		return $this->db->get()->row();
	}

	public function register_pelanggan($data)
	{
		$this->db->insert('pelanggan', $data);
	}

	public function login_pelanggan($email, $password)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->where(array(
			'email' => $email,
			'password' => $password
		));
		return $this->db->get()->row();
	}
}