<?php
class Event_ticket_model extends MY_Model {
	
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}

	/*
	* get all tickets
	* @params : event_id
	*/

	public function get_tickets($event_id) {
		$this->db->select('event_tickets.*');
		$this->db->where('event_tickets.event_id', $event_id);
		$this->db->where('event_tickets.status', 1);
		
		return $this->get_all();
	}

	/**
	* get_ticket_details()
	* @parrams $ticket_id
	* @return array of ticket details
	*/

	function get_ticket_details($ticket_id = NULL) {
		$this->db->select('event_tickets.*');
		$this->db->where('event_tickets.id', $ticket_id);
		$this->db->where('event_tickets.status', 1);
		
		return $this->get_all();
	}

}