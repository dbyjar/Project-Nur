<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

	public function getAllCustomer() {
		return $this->db->get('customer')->result_array();
	}

	public function searchCustomer($keyword) {
		$this->db->like('nomor', $keyword);
		$this->db->or_like('nik', $keyword);
    $this->db->or_like('nama', $keyword);
    $this->db->or_like('ttl', $keyword);
    $this->db->or_like('umur', $keyword);
    $this->db->or_like('alamat', $keyword);
    $this->db->or_like('no_telp', $keyword);
    
    $result = $this->db->get('customer')->result_array();
    
    return $result; 
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

	public function getDataRekamMedis($id) {
		$query = "SELECT * FROM `data_customer` JOIN `customer`
							ON `data_customer`.`id_customer` = `customer`.`id_customer`
							WHERE `data_customer`.`id_customer` = $id";
		return $this->db->query($query)->result_array();
	}

}