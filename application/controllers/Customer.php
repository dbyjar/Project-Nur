<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

	// menghindari user nakal tanpa login
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index() {
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['customer'] = $this->db->get('customer')->result_array();
		
		$data['title'] = 'Daftar Customer';
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('umur', 'Umur', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no', 'Nomor Telp.', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('customer/index', $data);
			$this->load->view('templates/footer');
		} else {
			$nama = htmlspecialchars($this->input->post('nama',true));
			$umur = htmlspecialchars($this->input->post('umur',true));
			$alamat = htmlspecialchars($this->input->post('alamat',true));
			$no = htmlspecialchars($this->input->post('no',true));

			$this->db->insert('customer', [
				'nama' => $nama,
				'umur' => $umur,
				'alamat' => $alamat,
				'no_telp' => $no
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
		$data['title'] = 'Edit Customer';

		$this->load->model('Customer_model', 'customer');
		$data['data_customer'] = $this->customer->getDataCustomer($id);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('customer/editCustomer', $data);
		$this->load->view('templates/footer');
	}

}