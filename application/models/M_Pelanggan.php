<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pelanggan extends CI_Model {
	public function get_all_data_kategori()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->order_by('id_kategori', 'desc');
		return $this->db->get()->result();
	}

	public function get_all_data_barang()
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
		$this->db->order_by('id_barang', 'desc');
		return $this->db->get()->result();
	}

	public function get_all_data_barang2($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
		$this->db->where('barang.id_kategori', $id_kategori);
		return $this->db->get()->result();
	}

	public function kategori($id_kategori)
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('id_kategori', $id_kategori);
		return $this->db->get()->row();
	}

	public function detail_barang($id_barang)
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
		$this->db->where('id_barang', $id_barang);
		return $this->db->get()->row();
	}

	public function pelanggan($id_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->order_by('id_pelanggan', $id_pelanggan);
		return $this->db->get()->row();
	}

	public function update_pelanggan($data)
	{
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->update('pelanggan', $data);
	}

	public function simpan_transaksi($data)
	{
		$this->db->insert('transaksi', $data);
	}

	public function simpan_detail_transaksi($data_detail)
	{
		$this->db->insert('detail_transaksi', $data_detail);
	}

	public function order()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
		$this->db->where('status_order = 0');
		$this->db->order_by('id_transaksi');
		return $this->db->get()->result();
	}

	public function proses()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
		$this->db->where('status_order = 1');
		$this->db->order_by('id_transaksi');
		return $this->db->get()->result();
	}

	public function kirim()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
		$this->db->where('status_order = 2');
		$this->db->order_by('id_transaksi');
		return $this->db->get()->result();
	}

	public function selesai()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_pelanggan', $this->session->userdata('id_pelanggan'));
		$this->db->where('status_order = 3');
		$this->db->order_by('id_transaksi');
		return $this->db->get()->result();
	}

	public function pesanan_update($data)
	{
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->update('transaksi', $data);
	}

	public function transaksi($id_transaksi)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_transaksi', $id_transaksi);
		return $this->db->get()->row();
	}

	public function rekening()
	{
		$this->db->select('*');
		$this->db->from('rekening');
		return $this->db->get()->result();
	}

	public function upload_buktibayar($data)
	{
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->update('transaksi', $data);
	}
}