<?php
class Vendor_service extends MY_Model {
	protected $belongs_to 	= array('user');
	//protected $has_many 	= array('');
		public $service_validation = array(
			array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'is_unique[states.name]|required|trim'
		),


);
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}

	
	
	public function get_with_service_details($vendor_id = NULL) {

		$this->db->select('vendor_services.*, vendors_categories.*,vendor_categories.name as cname');
	    $this->db->join('vendors_categories', 'vendor_services.vendor_id = vendors_categories.vendor_id');
	    $this->db->join('vendor_categories', 'vendors_categories.vendor_category_id= vendor_categories.id');
	    $this->db->where('vendor_services.vendor_id', $vendor_id);
		return $this->get_all();
   }
}