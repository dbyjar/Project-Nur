<?php

function is_logged_in()
{
	// library ci di helper
	$jar = get_instance();
	// menghindari user nakal tanpa login
	if (!$jar->session->userdata('email')) {
		redirect('auth');
	} else {
		// dapetin role_id
		$role_id = $jar->session->userdata('role_id');
		// dapetin nama menu lewat url
		$menu = $jar->uri->segment(1);

		$queryMenu = $jar->db->get_where('user_menu', ['menu' => $menu])->row_array();
		$menu_id = $queryMenu['id'];

		// cek db user_access_menu
		$userAccess = $jar->db->get_where('user_access_menu', [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		]);

		if ($userAccess->num_rows() < 1) {
			redirect('auth/blocked');
		}
	}
}

function check_access($role_id, $menu_id)
{
	$ci = get_instance();

	$result = $ci->db->get_where('user_access_menu', [
		'role_id' => $role_id,
		'menu_id' => $menu_id
	]);

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}