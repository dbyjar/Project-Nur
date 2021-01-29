<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	// menghindari user nakal tanpa login
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('Customer_model', 'custModel');
	}

	public function index() {
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['customer'] = $this->custModel->getAllCustomer();
		
		$data['title'] = 'Daftar Customer';
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('customer/index', $data);
		$this->load->view('templates/footer');
	}
  
  public function search() {
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$keyword = $this->input->post('keyword');
		$data['customers'] = $this->custModel->searchCustomer($keyword);
		
		$data['title'] = 'Daftar Customer';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('customer/viewCust', $data);
		$this->load->view('templates/footer');
  }

	public function tambahCustomer() {
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$data['title'] = 'Tambah Customer';
		$this->form_validation->set_rules('nomor', 'ID Medis', 'required');
		$this->form_validation->set_rules('nik', 'NIK', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('ttl', 'TTL', 'required');
		$this->form_validation->set_rules('umur', 'Umur', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no', 'Nomor Telp.', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('customer/tambah', $data);
			$this->load->view('templates/footer');
		} else {
				$nomor = $this->input->post('nomor');
				$nik = $this->input->post('nik');
				$nama = $this->input->post('nama');
				$ttl = $this->input->post('ttl');
				$umur = $this->input->post('umur');
				$no_telp = $this->input->post('no');
				$alamat = $this->input->post('alamat');
			

			$this->db->insert('customer', [
				'nomor' => $nomor,
				'nik' => $nik,
				'nama' => $nama,
				'ttl' => $ttl,
				'umur' => $umur,
				'no_telp' => $no_telp,
				'alamat' => $alamat
			]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Customer berhasil ditambahkan!</div>');
			redirect('customer');
		}
	}

	public function deleteCustomer($id) {
		// get id Customer
		$id = array('id_customer' => $id );
		
		// query Delete
		$this->db->where($id);
		$this->db->delete('customer');

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Customer berhasil dihapus!</div>');
		redirect('customer');
	}

	public function editCustomer($id) {
		// get id Customer
		$data['editCustomer'] = $this->db->get_where('customer', ['id_customer' => $id])->row_array();
		$data['customer'] = $this->db->get('customer')->result_array();
		
		// data
		$data['title'] = 'Data Customer';

		$this->load->model('Customer_model', 'customer');
		$data['data_customer'] = $this->customer->getDataCustomer($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('customer/edit', $data);
		$this->load->view('templates/footer');
	}

	public function updateCustomer() {
		$id = $this->input->post('id');
		$data = [
			'nomor' => htmlspecialchars($this->input->post('nomor',true)),
			'nik' => htmlspecialchars($this->input->post('nik',true)),
			'nama' => htmlspecialchars($this->input->post('nama',true)),
			'ttl' => htmlspecialchars($this->input->post('ttl',true)),
			'umur' => htmlspecialchars($this->input->post('umur',true)),
			'no_telp' => htmlspecialchars($this->input->post('no',true)),
			'alamat' => htmlspecialchars($this->input->post('alamat',true))
		];

		$this->db->where('id_customer', $id);
		$this->db->update('customer', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Customer berhasil dirubah!</div>');
		redirect('customer');
	}

	public function rekam() {
		// data
		$data['title'] = 'Rekam Medis';
		$data['customer'] = $this->db->get('customer')->result_array();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('customer/rekam', $data);
		$this->load->view('templates/footer');
	}
	
	public function rekamMedis($id) {
		// load data
		$this->load->model('Customer_model', 'customer');
		$data['rekamMedis'] = $this->customer->getDataRekamMedis($id);
		$data['userRM'] = $this->db->get_where('customer', ['id_customer' => $id])->row_array();
		
		// data
		$data['title'] = 'Rekam Medis';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
		$this->form_validation->set_rules('keluhan', 'Keluhan', 'required');
		$this->form_validation->set_rules('diagnosa', 'Diagnosa', 'required');
		$this->form_validation->set_rules('terapi', 'Terapi', 'required');

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('customer/rekamMedis', $data);
			$this->load->view('templates/footer');
		
	}

	public function tambahRM() {
		$id_customer = $this->input->post('id_customer');
		$tanggal = $this->input->post('tanggal');
		$keluhan = $this->input->post('keluhan');
		$diagnosa = $this->input->post('diagnosa');
		$terapi = $this->input->post('terapi');

		$this->db->insert('data_customer', [
			'id_customer' => $id_customer,
			'tanggal' => $tanggal,
			'keluhan' => $keluhan,
			'diagnosa' => $diagnosa,
			'terapi' => $terapi
		]);
		
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Rekam Medis berhasil ditambahkan!</div>');
		redirect('customer/rekam');
	}

	public function deleteRM($id) {
		$id = $id;

		// get id Customer
		$id = array('id_data_customer' => $id );
		
		// query Delete
		$this->db->where($id);
		$this->db->delete('data_customer');

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Rekam Medis berhasil dihapus!</div>');
		redirect('customer/rekam');
	}

	public function editRM($id) {
		// get id Rekam Medis
		$data['editRM'] = $this->db->get_where('data_customer', ['id_data_customer' => $id])->row_array();
		$data['RM'] = $this->db->get('data_customer')->result_array();
		
		// data
		$data['title'] = 'Edit Rekam Medis';

		$this->load->model('Customer_model', 'customer');
		$data['data_rm'] = $this->customer->getDataRekamMedis($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('customer/editRM', $data);
		$this->load->view('templates/footer');
	}

	public function updateRM() {
		$id = $this->input->post('id');
		$data = [
			'tanggal' => htmlspecialchars($this->input->post('tanggal',true)),
			'keluhan' => htmlspecialchars($this->input->post('keluhan',true)),
			'diagnosa' => htmlspecialchars($this->input->post('diagnosa',true)),
			'terapi' => htmlspecialchars($this->input->post('terapi',true)),
		];

		$this->db->where('id_data_customer', $id);
		$this->db->update('data_customer', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Rekam Medis berhasil dirubah!</div>');
		redirect('customer/rekam');
	}

}