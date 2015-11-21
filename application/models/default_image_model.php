<?php
class Default_image_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}
	
	public function get_all_images($status = NULL, $type = 'all') {

		$this->db->select('default_images.*');
		if($status != NULL) {
			$this->db->where('default_images.status', $status);	
		}
		if($type != 'all') {
			$this->db->where('default_images.type', $type);	
		}

		$this->db->order_by("id", "desc");
		
		return $this->get_all();
	}
}