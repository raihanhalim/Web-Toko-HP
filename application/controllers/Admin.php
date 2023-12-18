<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_admin');
	}

	public function index()
	{
		$data = array(
			'tittle' => 'Dashboard',
			'total_kategori' => $this->m_admin->total_kategori(),
			'total_barang' => $this->m_admin->total_barang(),
			'total_pesanan' => $this->m_admin->total_pesanan(),
			'total_pelanggan' => $this->m_admin->total_pelanggan(),
			'isi' => 'admin/home'
		);
		$this->load->view('layout/wrapper_backend', $data, FALSE);
	}

	public function kategori()
	{
		$data = array(
			'tittle' => 'Kategori',
			'kategori' => $this->m_admin->get_all_data_kategori(),
			'isi' => 'admin/kategori'
		);
		$this->load->view('layout/wrapper_backend', $data, FALSE);
	}

	public function add_kategori()
	{
		$data = array('nama_kategori' => $this->input->post('nama_kategori'));
		$this->m_admin->add_kategori($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
		redirect('admin/kategori');
	}

	public function update_kategori($id_kategori = NULL)
	{
		$data = array(
			'id_kategori' => $id_kategori,
			'nama_kategori' => $this->input->post('nama_kategori')
		);
		$this->m_admin->update_kategori($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di Update !!!');
		redirect('admin/kategori');
	}

	public function delete_kategori($id_kategori = NULL)
	{
		$data = array('id_kategori' => $id_kategori);
		$this->m_admin->delete_kategori($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!!');
		redirect('admin/kategori');
	}

	public function barang()
	{
		$data = array(
			'tittle' => 'Barang',
			'barang' => $this->m_admin->get_all_data_barang(),
			'isi' => 'admin/barang'
		);
		$this->load->view('layout/wrapper_backend', $data, FALSE);
	}

	public function add_barang()
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('berat', 'Berat', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('harga', 'Harga', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/barang/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size'] = '3000';
			$this->upload->initialize($config);
			$field_name = "foto";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'tittle' => 'Add Barang',
					'kategori' => $this->m_admin->get_all_data_kategori(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'admin/add_barang'
				);
				$this->load->view('layout/wrapper_backend', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/barang/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'nama_barang' => $this->input->post('nama_barang'),
					'id_kategori' => $this->input->post('id_kategori'),
					'deskripsi' => $this->input->post('deskripsi'),
					'berat' => $this->input->post('berat'),
					'harga' => $this->input->post('harga'),
					'foto' => $upload_data['uploads']['file_name']
				);
				$this->m_admin->add_barang($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
				redirect('admin/barang');
			}
		}

		$data = array(
			'tittle' => 'Add Barang',
			'kategori' => $this->m_admin->get_all_data_kategori(),
			'isi' => 'admin/add_barang',
		);
		$this->load->view('layout/wrapper_backend', $data, FALSE);
	}

	public function update_barang($id_barang = NULL)
	{
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('berat', 'Berat', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('harga', 'Harga', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/barang/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size'] = '3000';
			$this->upload->initialize($config);
			$field_name = "foto";
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'tittle' => 'Update Barang',
					'kategori' => $this->m_admin->get_all_data_kategori(),
					'barang' => $this->m_admin->get_data_barang($id_barang),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'admin/update_barang',
				);
				$this->load->view('layout/wrapper_backend', $data, FALSE);
			} else {
				// edit gambar
				$barang = $this->m_admin->get_data_barang($id_barang);
				if ($barang->foto != "") {
					unlink('./assets/barang/' . $barang->foto);
				}
				// end edit gambar
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/barang/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_barang' => $id_barang,
					'nama_barang' => $this->input->post('nama_barang'),
					'id_kategori' => $this->input->post('id_kategori'),
					'deskripsi' => $this->input->post('deskripsi'),
					'berat' => $this->input->post('berat'),
					'harga' => $this->input->post('harga'),
					'foto' => $upload_data['uploads']['file_name'],
				);
				$this->m_admin->update_barang($data);
				$this->session->set_flashdata('pesan', 'Data Berhasil Di Update !!!');
				redirect('admin/barang');
			}
			// tanpa ganti foto
			$data = array(
				'id_barang' => $id_barang,
				'nama_barang' => $this->input->post('nama_barang'),
				'id_kategori' => $this->input->post('id_kategori'),
				'deskripsi' => $this->input->post('deskripsi'),
				'berat' => $this->input->post('berat'),
				'harga' => $this->input->post('harga'),
			);
			$this->m_admin->update_barang($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Di Update !!!');
			redirect('admin/barang');
		}

		$data = array(
			'tittle' => 'Update Barang',
			'kategori' => $this->m_admin->get_all_data_kategori(),
			'barang' => $this->m_admin->get_data_barang($id_barang),
			'isi' => 'admin/update_barang',
		);
		$this->load->view('layout/wrapper_backend', $data, FALSE);
	}

	public function delete_barang($id_barang = NULL)
	{
		// hapus gambar
		$barang = $this->m_admin->get_data_barang($id_barang);
		if ($barang->foto != "") {
			unlink('./assets/barang/' . $barang->foto);
		}
		// end hapus gambar
		$data = array('id_barang' => $id_barang);
		$this->m_admin->delete_barang($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!!');
		redirect('admin/barang');
	}

	public function pesanan_masuk()
	{
		$data = array(
			'tittle' => 'Pesanan Masuk',
			'pesanan_order' => $this->m_admin->pesanan_order(),
			'pesanan_proses' => $this->m_admin->pesanan_proses(),
			'pesanan_kirim' => $this->m_admin->pesanan_kirim(),
			'pesanan_selesai' => $this->m_admin->pesanan_selesai(),
			'isi' => 'admin/pesanan_masuk',
		);
		$this->load->view('layout/wrapper_backend', $data, FALSE);
	}

	public function pesanan_proses($id_transaksi)
	{
		$data = array(
			'id_transaksi' => $id_transaksi,
			'status_order' => '1'
		);
		$this->m_admin->pesanan_update($data);
		$this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Proses !!!');
		redirect('admin/pesanan_masuk');
	}

	public function pesanan_kirim($id_transaksi)
	{
		$data = array(
			'id_transaksi' => $id_transaksi,
			'no_resi' => $this->input->post('no_resi'),
			'status_order' => '2'
		);
		$this->m_admin->pesanan_update($data);
		$this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Kirim !!!');
		redirect('admin/pesanan_masuk');
	}

	public function pelanggan()
	{
		$data = array(
			'tittle' => 'Pelanggan',
			'pelanggan' => $this->m_admin->get_all_data_pelanggan(),
			'isi' => 'admin/pelanggan'
		);
		$this->load->view('layout/wrapper_backend', $data, FALSE);
	}

	public function add_pelanggan()
	{
		$data = array(
			'nama_pelanggan' => $this->input->post('nama_pelanggan'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);
		$this->m_admin->add_pelanggan($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan !!!');
		redirect('admin/pelanggan');
	}

	public function update_pelanggan($id_pelanggan = NULL)
	{
		$data = array(
			'id_pelanggan' => $id_pelanggan,
			'nama_pelanggan' => $this->input->post('nama_pelanggan'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password')
		);
		$this->m_admin->update_pelanggan($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di Update !!!');
		redirect('admin/pelanggan');
	}

	public function delete_pelanggan($id_pelanggan = NULL)
	{
		$data = array('id_pelanggan' => $id_pelanggan);
		$this->m_admin->delete_pelanggan($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus !!!');
		redirect('admin/pelanggan');
	}

	public function laporan()
	{
		$data = array(
			'tittle' => 'Laporan Penjualan',
			'isi' => 'admin/laporan',
		);
		$this->load->view('layout/wrapper_backend', $data, FALSE);
	}

	public function laporan_harian()
	{
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'tittle' => 'Laporan Penjualan Harian',
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_admin->laporan_harian($tanggal, $bulan, $tahun),
			'isi' => 'admin/laporan_harian',
		);
		$this->load->view('layout/wrapper_backend', $data, FALSE);
	}

	public function laporan_bulanan()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'tittle' => 'Laporan Penjualan Bulanan',
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->m_admin->laporan_bulanan($bulan, $tahun),
			'isi' => 'admin/laporan_bulanan',
		);
		$this->load->view('layout/wrapper_backend', $data, FALSE);
	}

	public function laporan_tahunan()
	{
		$tahun = $this->input->post('tahun');

		$data = array(
			'tittle' => 'Laporan Penjualan Tahunan',
			'tahun' => $tahun,
			'laporan' => $this->m_admin->laporan_tahunan($tahun),
			'isi' => 'admin/laporan_tahunan',
		);
		$this->load->view('layout/wrapper_backend', $data, FALSE);
	}

	public function setting()
	{
		$this->form_validation->set_rules('nama_toko', 'Nama Toko', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('kota', 'Kota', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('alamat_toko', 'Alamat Toko', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('no_telepon', 'No Telepon', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'tittle' => 'Setting',
				'setting' => $this->m_admin->data_setting(),
				'isi' => 'admin/setting',
			);
			$this->load->view('layout/wrapper_backend', $data, FALSE);
		} else {
			$data = array(
				'id' => 1,
				'nama_toko' => $this->input->post('nama_toko'),
				'lokasi' => $this->input->post('kota'),
				'alamat_toko' => $this->input->post('alamat_toko'),
				'no_telepon' => $this->input->post('no_telepon')
			);
			$this->m_admin->update_setting($data);
			$this->session->set_flashdata('pesan', 'Setting Berhasil Di Update !!!');
			redirect('admin/setting');
		}
	}
}