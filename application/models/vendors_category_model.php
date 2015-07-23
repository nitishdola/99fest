<?php
class Vendors_category_model extends MY_Model {
	public $vendor_category_validation = array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'is_unique[vendor_categories.name]|required|trim'
		),
		
	);
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}
	public function get_vendor_category_details($vendor_id = NULL) {
		$this->db->select('vendors_categories.*, vendor_categories.name');
		$this->db->join('vendor_categories', 'vendors_categories.vendor_category_id = vendor_categories.id');
		$this->db->where('vendors_categories.vendor_id', $vendor_id);
		
		return $this->get_all();
	}
	/**
	* vendor with category details 
	* @parameter category_id Vendor category id
	* returns vendor category detail array
	*/
	public function vendor_with_category_details($category_id=NULL){
		$this->db->select('vendors.*, vendors_categories.vendor_category_id,states.name as statename,cities.name as cityname');
		$this->db->join('vendors', 'vendors_categories.vendor_id = vendors.id');
		$this->db->join('states', 'vendors.state_id = states.id');
		$this->db->join('cities', 'vendors.city_id = cities.id');
		$this->db->where('vendors_categories.vendor_category_id', $category_id);
		
		return $this->get_all();
		

	}
	

	
}
