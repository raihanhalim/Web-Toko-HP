<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {
	public function index()
	{
		$this->load->view('');
	}

	public function total_kategori()
	{
		return $this->db->get('kategori')->num_rows();
	}

	public function total_barang()
	{
		return $this->db->get('barang')->num_rows();
	}

	public function total_pesanan()
	{
		return $this->db->get('transaksi')->num_rows();
	}

	public function total_pelanggan()
	{
		return $this->db->get('pelanggan')->num_rows();
	}

	public function get_all_data_kategori()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->order_by('nama_kategori');
		return $this->db->get()->result();
	}

	public function add_kategori($data)
	{
		$this->db->insert('kategori', $data);
	}

	public function update_kategori($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->update('kategori', $data);
	}

	public function delete_kategori($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->delete('kategori', $data);
	}

	public function get_all_data_barang()
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
		$this->db->order_by('nama_barang');
		return $this->db->get()->result();
	}

	public function get_data_barang($id_barang)
	{
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
		$this->db->where('id_barang', $id_barang);
		return $this->db->get()->row();
	}

	public function add_barang($data)
	{
		$this->db->insert('barang', $data);
	}

	public function update_barang($data)
	{
		$this->db->where('id_barang', $data['id_barang']);
		$this->db->update('barang', $data);
	}

	public function delete_barang($data)
	{
		$this->db->where('id_barang', $data['id_barang']);
		$this->db->delete('barang', $data);
	}

	public function pesanan_order()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('status_order = 0');
		$this->db->order_by('id_transaksi');
		return $this->db->get()->result();
	}

	public function pesanan_proses()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('status_order = 1');
		$this->db->order_by('id_transaksi');
		return $this->db->get()->result();
	}

	public function pesanan_kirim()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('status_order = 2');
		$this->db->order_by('id_transaksi');
		return $this->db->get()->result();
	}

	public function pesanan_selesai()
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('status_order = 3');
		$this->db->order_by('id_transaksi');
		return $this->db->get()->result();
	}

	public function pesanan_update($data)
	{
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->update('transaksi', $data);
	}

	public function get_all_data_pelanggan()
	{
		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->order_by('nama_pelanggan');
		return $this->db->get()->result();
	}

	public function add_pelanggan($data)
	{
		$this->db->insert('pelanggan', $data);
	}

	public function update_pelanggan($data)
	{
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->update('pelanggan', $data);
	}

	public function delete_pelanggan($data)
	{
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->delete('pelanggan', $data);
	}

	public function laporan_harian($tanggal, $bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('detail_transaksi');
		$this->db->join('transaksi', 'transaksi.no_order = detail_transaksi.no_order', 'left');
		$this->db->join('barang', 'barang.id_barang = detail_transaksi.id_barang', 'left');
		$this->db->where('DAY(transaksi.tgl_order)', $tanggal);
		$this->db->where('MONTH(transaksi.tgl_order)', $bulan);
		$this->db->where('YEAR(transaksi.tgl_order)', $tahun);
		$this->db->where('status_bayar = 1');
		return $this->db->get()->result();
	}

	public function laporan_bulanan($bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('detail_transaksi');
		$this->db->join('transaksi', 'transaksi.no_order = detail_transaksi.no_order', 'left');
		$this->db->join('barang', 'barang.id_barang = detail_transaksi.id_barang', 'left');
		$this->db->where('MONTH(tgl_order)', $bulan);
		$this->db->where('YEAR(tgl_order)', $tahun);
		$this->db->where('status_bayar = 1');
		return $this->db->get()->result();
	}

	public function laporan_tahunan($tahun)
	{
		$this->db->select('*');
		$this->db->from('detail_transaksi');
		$this->db->join('transaksi', 'transaksi.no_order = detail_transaksi.no_order', 'left');
		$this->db->join('barang', 'barang.id_barang = detail_transaksi.id_barang', 'left');
		$this->db->where('YEAR(tgl_order)', $tahun);
		$this->db->where('status_bayar = 1');
		return $this->db->get()->result();
	}

	public function data_setting()
	{
		$this->db->select('*');
		$this->db->from('setting');
		$this->db->where('id', 1);
		return $this->db->get()->row();
	}

	public function update_setting($data)
	{
		$this->db->where('id', $data['id']);
		$this->db->update('setting', $data);
	}
}