<?php
class Event_sponsor_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}

	function get_all_sponsors( $event_id = NULL ) {
		$this->db->select('event_sponsors.name, event_sponsors.image');
		$this->db->where('event_sponsors.event_id', $event_id);
		$this->db->where('event_sponsors.status', 1);
		$res = $this->get_all();

		return $res;
	}

}