<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	function get_usuarios () {
		return $this->db->query("SELECT * FROM Usuario")->result_array();
	}

	function get_usuario_by_id($id_usuario) {
		return $this->db->query("SELECT * FROM Usuario WHERE id = $id_usuario")->result_array()[0];
	}

}