<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

	public function getAllCustomer() {
		$query = "SELECT * FROM customer ";
		return $this->db->query($query)->result_array();
	}

	public function getNumberCustomer($id) {
		$query = "SELECT nomor FROM customer WHERE id_customer = $id";
		return $this->db->query($query)->result_array();
	}

	public function getDataCustomer($id) {
		$query = "SELECT * FROM `data_customer` JOIN `customer`
							ON `data_customer`.`id_customer` = `customer`.`id_customer`
							WHERE `data_customer`.`id_customer` = $id";
		return $this->db->query($query)->result_array();
	}

}