<?php
class Vendor_image_model extends MY_Model {
	public $vendor_image_validation = array(
		
		array(
			'field' => 'vendor_category_id',
			'label' => 'Category',
			'rules' => 'required|trim'
		),
		
	);
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}
	
	public function get_vendor_images($vendor_id = NULL) {
		$this->db->select('vendor_images.*, vendor_categories.name');
		$this->db->join('vendor_categories', 'vendor_categories.id = vendor_images.vendor_store_id');
		$this->db->where('vendor_images.vendor_id', $vendor_id);
		
		return $this->get_all();
	}
}