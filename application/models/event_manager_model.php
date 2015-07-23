<?php
class Event_manager_model extends MY_Model {
	protected $belongs_to 	= array('user', 'city', 'state');

	public $add_event_image_validation = array(
		
		array(
			'field' => 'event_id',
			'label' => 'Event',
			'rules' => 'required|trim|integer'
		),
		
	);

	public $add_event_video_validation = array(
		
		array(
			'field' => 'event_id',
			'label' => 'Event',
			'rules' => 'required|trim|integer'
		),
		
	);
	
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}

	public function get_with_user_details( $user_id = NULL ) {
		$this->db->select('event_managers.id as event_manager_id,event_managers.*, users.id, users.username,users.active, cities.id as city_id, cities.name as cityname, states.id as state_id, states.name as statename');
		$this->db->join('users', 'event_managers.user_id = users.id');
		$this->db->join('states', 'event_managers.state_id = states.id');
		$this->db->join('cities', 'event_managers.city_id = cities.id');
		if($user_id != NULL) {
			$this->db->where('event_managers.user_id', $user_id);
		}
		
		
		return $this->get_all();
	}

}