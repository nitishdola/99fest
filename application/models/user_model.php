<?php
class User_model extends MY_Model {
	public $login_validation = array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email|trim'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|trim'
		),
	);
	
	public $register_validation = array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email|trim'
		),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|trim|matches[confirm_password]'
			//'rules' => 'required|trim'
		),
		
		array(
			'field' => 'confirm_password',
			'label' => 'Confirm Password',
			'rules' => 'required|trim'
		),
		
		array(
			'field' => 'first_name',
			'label' => 'First Name',
			'rules' => 'required|trim'
		),
		
		array(
			'field' => 'last_name',
			'label' => 'Last Name',
			'rules' => 'required|trim'
		),
		/*
		array(
			'field' => 'mobile_number',
			'label' => 'Mobile Number',
			'rules' => 'is_unique[customer_profiles.mobile_number]|required|trim|exact_length[10]|numeric|'
		),
		*/
	);
	
	
	public $vendor_register_validation = array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email|trim'
		),

		array(
			'field' => 'name',
			'label' => 'Vendor Name',
			'rules' => 'required|trim'
		),
		
		
		array(
			'field' => 'contact_number',
			'label' => 'Contact Number',
			'rules' => 'required|trim|numeric'
		),
		
		array(
			'field' => 'address',
			'label' => 'Address',
			'rules' => 'required|trim'
		),
		
		array(
			'field' => 'state_id',
			'label' => 'State',
			'rules' => 'required|trim|numeric'
		),
		
		
		array(
			'field' => 'city_id',
			'label' => 'City',
			'rules' => 'required|trim|numeric'
		),
		
		array(
			'field' => 'pin',
			'label' => 'Pin',
			'rules' => 'required|trim|exact_length[6]|numeric'
		)
	);
	public $event_manager_register_validation = array(
		array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|valid_email|trim'
		),

		array(
			'field' => 'company_name',
			'label' => 'Company Name',
			'rules' => 'required|trim'
		),
		
		
		array(
			'field' => 'contact_number',
			'label' => 'Contact Number',
			'rules' => 'required|trim|numeric'
		),
		
		array(
			'field' => 'address',
			'label' => 'Address',
			'rules' => 'required|trim'
		),
		
		array(
			'field' => 'state_id',
			'label' => 'State',
			'rules' => 'required|trim|numeric'
		),
		
		
		array(
			'field' => 'city_id',
			'label' => 'City',
			'rules' => 'required|trim|numeric'
		),
		
		array(
			'field' => 'pin',
			'label' => 'Pin',
			'rules' => 'required|trim|exact_length[6]|numeric'
		)
	);
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}

	/*
	* Check if city exists for the state
	* @return true if exists
	* return false if not
	*/
	public function check_if_email_exists($email = NULL) {
		if($email != NULL) {
			$this->db->where('users.username', $email);
			
			return $this->count_by(array('username' => $email));
		}
		
	}
}