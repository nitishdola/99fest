<?php
class Customer_profile_model extends MY_Model {
	protected $belongs_to 	= array('user');
	//protected $has_many 	= array('');
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}
	
	public function get_with_user_details($user_id = NULL) {
		$this->db->select('customer_profiles.id as customer_profile_id,customer_profiles.first_name,customer_profiles.last_name,customer_profiles.mobile_number,customer_profiles.address, users.*');
		$this->db->join('users', 'customer_profiles.user_id = users.id');
		$this->db->where('customer_profiles.user_id', $user_id);
		
		return $this->get_all();
	}
}