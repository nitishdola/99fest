<?php
class Event_gallery_model extends MY_Model {
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}

	function get_image_gallery( $event_id = NULL ) {
		$this->db->select('event_galleries.*');
		$this->db->where('event_galleries.event_id', $event_id);

		$this->db->order_by('id', 'RANDOM');
    	$this->db->limit(4);
    	
		$res = $this->get_all();

		return $res;
	}

}