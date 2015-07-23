<?php
class State_model extends MY_Model {
	public $state_validation = array(
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

	/*
	* get all states
	* @params : 
	* $status default is 1
	* if $status 0 is passed, all deleted states will be retrieved
	*/

	public function get_states($status = 1) {
		$this->db->select('states.*');
		$this->db->where('states.status', $status);
		
		return $this->get_all();
	}
}