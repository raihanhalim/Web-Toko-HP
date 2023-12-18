<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	public function index()
	{
		$data = array(
			'tittle' => 'Home',
			'barang' => $this->m_pelanggan->get_all_data_barang(),
			'isi' => 'pelanggan/home',
		);
		$this->load->view('layout/wrapper_frontend', $data, FALSE);
	}

	public function kategori($id_kategori)
	{
		$kategori = $this->m_pelanggan->kategori($id_kategori);
		$data = array(
			'tittle' => 'Kategori : ' . $kategori->nama_kategori,
			'barang' => $this->m_pelanggan->get_all_data_barang2($id_kategori),
			'isi' => 'pelanggan/kategori',
		);
		$this->load->view('layout/wrapper_frontend', $data, FALSE);
	}

	public function contact()
	{
		$data = array(
			'tittle' => 'Contact',
			'isi' => 'pelanggan/contact',
		);
		$this->load->view('layout/wrapper_frontend', $data, FALSE);
	}

	public function akun_saya()
	{
		$data = array(
			'tittle' => 'Akun Saya',
			'isi' => 'pelanggan/akun_saya',
		);
		$this->load->view('layout/wrapper_frontend', $data, FALSE);
	}

	public function update_akun_saya($id_pelanggan = NULL)
	{
		$this->form_validation->set_rules('email', 'Email', 'is_unique[pelanggan.email]', array(
			'is_unique' => '%s Sudah Terdaftar !!!'
		));
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('retype_password', 'Retype Password', 'matches[password]', array(
			'matches' => 'Password Tidak Sama !!!'
		));

		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'id_pelanggan' => $id_pelanggan,
				'nama_pelanggan' => $this->input->post('nama_pelanggan'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			);
			$this->m_pelanggan->update_pelanggan($data);
			$this->session->set_userdata($data);
			$this->session->set_flashdata('pesan', 'Data Berhasil Di Update !!!');
			redirect('pelanggan/akun_saya');
		}

		$data = array(
			'tittle' => 'Akun Saya',
			'isi' => 'pelanggan/akun_saya',
		);
		$this->load->view('layout/wrapper_frontend', $data, FALSE);
	}

	public function pesanan_saya()
	{
		$data = array(
			'tittle' => 'Pesanan Saya',
			'order' => $this->m_pelanggan->order(),
			'proses' => $this->m_pelanggan->proses(),
			'kirim' => $this->m_pelanggan->kirim(),
			'selesai' => $this->m_pelanggan->selesai(),
			'isi' => 'pelanggan/pesanan_saya',
		);
		$this->load->view('layout/wrapper_frontend', $data, FALSE);
	}

	public function bayar($id_transaksi)
	{
		$this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/bukti_bayar/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico';
			$config['max_size'] = '3000';
			$this->upload->initialize($config);
			$field_name = 'bukti_bayar';
			if (!$this->upload->do_upload($field_name)) {
				$data = array(
					'tittle' => 'Pembayaran',
					'transaksi' => $this->m_pelanggan->transaksi($id_transaksi),
					'rekening' => $this->m_pelanggan->rekening(),
					'error_upload' => $this->upload->display_errors(),
					'isi' => 'pelanggan/bayar'
				);
				$this->load->view('layout/wrapper_frontend', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/bukti_bayar/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'id_transaksi' => $id_transaksi,
					'atas_nama' => $this->input->post('atas_nama'),
					'nama_bank' => $this->input->post('nama_bank'),
					'no_rek' => $this->input->post('no_rek'),
					'status_bayar' => '1',
					'bukti_bayar' => $upload_data['uploads']['file_name']
				);
				$this->m_pelanggan->upload_buktibayar($data);
				$this->session->set_flashdata('pesan', 'Bukti Pembayaran Berhasil Di Upload !!!');
				redirect('pelanggan/pesanan_saya');
			}
		}

		$data = array(
			'tittle' => 'Pembayaran',
			'transaksi' => $this->m_pelanggan->transaksi($id_transaksi),
			'rekening' => $this->m_pelanggan->rekening(),
			'isi' => 'pelanggan/bayar'
		);
		$this->load->view('layout/wrapper_frontend', $data, FALSE);
	}

	public function selesai($id_transaksi)
	{
		$data = array(
			'id_transaksi' => $id_transaksi,
			'status_order' => '3'
		);
		$this->m_pelanggan->pesanan_update($data);
		$this->session->set_flashdata('pesan', 'Pesanan Telah Diterima !!!');
		redirect('pelanggan/pesanan_saya');
	}

	public function detail_barang($id_barang)
	{
		$data = array(
			'tittle' => 'Detail Barang',
			'barang' => $this->m_pelanggan->detail_barang($id_barang),
			'isi' => 'pelanggan/detail_barang',
		);
		$this->load->view('layout/wrapper_frontend', $data, FALSE);
	}

	public function add_cart()
	{
		$this->pelanggan_auth->proteksi_halaman();
		$redirect_page = $this->input->post('redirect_page');
		$data = array(
			'id' => $this->input->post('id'),
			'qty' => $this->input->post('qty'),
			'price' => $this->input->post('price'),
			'name' => $this->input->post('name'),
		);
		$this->cart->insert($data);
		redirect($redirect_page, 'refresh');
	}

	public function view_cart()
	{
		if (empty($this->cart->contents())) {
			redirect('pelanggan');
		}
		$data = array(
			'tittle' => 'View Cart',
			'isi' => 'pelanggan/view_cart',
		);
		$this->load->view('layout/wrapper_frontend', $data, FALSE);
	}

	public function update_cart()
	{
		$i = 1;
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'rowid' => $items['rowid'],
				'qty' => $this->input->post($i . '[qty]'),
			);
			$this->cart->update($data);
			$i++;
		}
		$this->session->set_flashdata('pesan', 'Keranjang Berhasil Di Update !!!');
		redirect('pelanggan/view_cart');
	}

	public function delete_cart($rowid)
	{
		$this->cart->remove($rowid);
		$this->session->set_flashdata('pesan', 'Barang Berhasil Di Hapus !!!');
		redirect('pelanggan/view_cart');
	}

	public function clear_cart()
	{
		$this->cart->destroy();
		redirect('pelanggan/view_cart');
	}

	public function check_out()
	{
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('kota', 'Kota', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('expedisi', 'Expedisi', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));
		$this->form_validation->set_rules('paket', 'Paket', 'required', array(
			'required' => '%s Harus Diisi !!!'
		));

		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'tittle' => 'Check Out',
				'isi' => 'pelanggan/check_out',
			);
			$this->load->view('layout/wrapper_frontend', $data, FALSE);
		} else {
			// simpan ke tabel transaksi
			$data = array(
				'id_pelanggan' => $this->session->userdata('id_pelanggan'),
				'no_order' => $this->input->post('no_order'),
				'tgl_order' => date('Y-m-d'),
				'nama_penerima' => $this->input->post('nama_penerima'),
				'hp_penerima' => $this->input->post('hp_penerima'),
				'provinsi' => $this->input->post('provinsi'),
				'kota' => $this->input->post('kota'),
				'alamat' => $this->input->post('alamat'),
				'kode_pos' => $this->input->post('kode_pos'),
				'expedisi' => $this->input->post('expedisi'),
				'paket' => $this->input->post('paket'),
				'estimasi' => $this->input->post('estimasi'),
				'ongkir' => $this->input->post('ongkir'),
				'berat' => $this->input->post('berat'),
				'grand_total' => $this->input->post('grand_total'),
				'total_bayar' => $this->input->post('total_bayar'),
				'status_bayar' => '0',
				'status_order' => '0',
			);
			$this->m_pelanggan->simpan_transaksi($data);
			// simpan ke tabel rinci transaksi
			$i = 1;
			foreach ($this->cart->contents() as $items) {
				$data_detail = array(
					'no_order' => $this->input->post('no_order'),
					'id_barang' => $items['id'],
					'qty' => $this->input->post('qty' . $i++),
				);
				$this->m_pelanggan->simpan_detail_transaksi($data_detail);
			}
			$this->session->set_flashdata('pesan', 'Pesanan Berhasil Di Tambahkan !!!');
			$this->cart->destroy();
			redirect('pelanggan/pesanan_saya');
		}
	}
}