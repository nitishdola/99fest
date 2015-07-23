<?php
class Vendor_category_model extends MY_Model {
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
public function get_all_categories($status = NULL) {

		if($status != NULL )
		{
			$this->db->where('status', 1); //get only active categories
		}
		
		
		$this->db->order_by("name","asc");
        $qry = $this->db->get('vendor_categories');

        return $qry->result();
	}

	/**
	* get category id from category name
	*/
	public function get_category_id($category_name = NULL) {
		$this->db->select('vendor_categories.id');
		$this->db->where('LCASE(vendor_categories.name)', $category_name);
		return $this->get_all();
	}

}