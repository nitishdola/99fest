<?php
class Admin_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}
}