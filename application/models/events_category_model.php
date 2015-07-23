<?php
class Events_category_model extends MY_Model {
	
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
	function get_categories_for_event($event_id) {
		$this->db->select('evs.*' );
        
        $this->db->join('event_categories evs', 'evs.id = events_categories.event_category_id');
		$this->db->where('events_categories.event_id', $event_id);
        
		return $this->get_all();
	}
	

}
