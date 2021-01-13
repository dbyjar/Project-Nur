<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	// menghindari user nakal tanpa login
	public function __construct() {
		parent::__construct();
		is_logged_in();
	}

	public function index() {
		$data['title'] = 'Menu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/footer');
		} else {
			$menu = htmlspecialchars($this->input->post('menu',true));

			$this->db->insert('user_menu', ['menu' => $menu]);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu Added!</div>');
			redirect('menu');
		}
	}

	public function editMenu($id) {
		// get id Menu
		$data['editMenu'] = $this->db->get_where('user_menu', ['id' => $id])->result_array();

		// data
		$data['title'] = 'Edit Menu';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/editmenu', $data);
		$this->load->view('templates/footer');
	}

	public function updateMenu() {
		$id = $this->input->post('id');
		$menu = htmlspecialchars($this->input->post('menu', true));

		$data = [
			'menu' => $menu
		];

		$this->db->where('id', $id);
		$this->db->update('user_menu', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Changed!</div>');
		redirect('menu');
	}

	public function deleteMenu($id) {
		// get id Menu
		$id = array('id' => $id );
		
		// query Delete
		$this->db->where($id);
		$this->db->delete('user_menu');

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Menu have been Deleted!</div>');
		redirect('menu');
	}

	public function subMenu() {
		$data['title'] = 'Submenu Management';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->model('Menu_model', 'menu');
		$data['subMenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'title' => htmlspecialchars($this->input->post('title',true)),
				'menu_id' => htmlspecialchars($this->input->post('menu_id',true)),
				'url' => htmlspecialchars($this->input->post('url',true)),
				'icon' => htmlspecialchars($this->input->post('icon',true)),
				'is_active' => htmlspecialchars($this->input->post('is_active',true))
			];

			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Sub Menu Added!</div>');
			redirect('menu/subMenu');
		}
	}

	public function editSubMenu($id) {

		// get id SubMenu
		$data['editSubMenu'] = $this->db->get_where('user_sub_menu', ['id' => $id])->result_array();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		// data
		$data['title'] = 'Edit SubMenu';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('menu/editsubmenu', $data);
		$this->load->view('templates/footer');
	}

	public function updateSubMenu() {
		$id = $this->input->post('id');
		$data = [
			'title' => htmlspecialchars($this->input->post('title',true)),
			'menu_id' => htmlspecialchars($this->input->post('menu_id',true)),
			'url' => htmlspecialchars($this->input->post('url',true)),
			'icon' => htmlspecialchars($this->input->post('icon',true)),
			'is_active' => htmlspecialchars($this->input->post('is_active',true))
		];

		$this->db->where('id', $id);
		$this->db->update('user_sub_menu', $data);

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub Menu Changed!</div>');
		redirect('menu/submenu');
	}

	public function deleteSubMenu($id) {
		// get id Menu
		$id = array('id' => $id );
		
		// query Delete
		$this->db->where($id);
		$this->db->delete('user_sub_menu');

		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sub Menu have been Deleted!</div>');
		redirect('menu/submenu');
	}

}