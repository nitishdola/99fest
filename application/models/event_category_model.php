<?php
class Event_category_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}

	public $category_validation = array(
		array(
			'field' => 'name',
			'label' => 'Category Name',
			'rules' => 'is_unique[event_categories.name]|required|trim'
		),
	);


	/**
	* return all active cities
	* @params state_id
	* if state_id is set, returns cities of the state
	*/
	function get_all_categories()
    {   
        $this->db->where('status', 1); //get only active cities
		
		$this->db->order_by("name","asc");
        $qry = $this->db->get('event_categories');

        return $qry->result();
    }

	

}