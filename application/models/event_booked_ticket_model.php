<?php
class Event_booked_ticket_model extends MY_Model {
	
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}

	/**
	* get_last_ticket_booked()
	* @parrams $userId
	* @return last_ticket_id of the event booked by user
	*/
	function get_last_ticket_booked($userId) {
		$this->db->select('event_booked_tickets.*');
		$this->db->order_by("booked_time", "desc");
		$this->db->where('event_booked_tickets.user_id', $userId);
		$this->db->where('event_booked_tickets.payment_status', 0);
		
		
		return $this->get_all();
	}

	public function total_tickets_booked($ticket_id = NULL) {
		$this->db->select('COUNT(*) as count');

		$this->db->where('event_booked_tickets.ticket_id', $ticket_id);
		$this->db->where('event_booked_tickets.payment_status', 1);
		
		$res = $this->get_all();
		return $res[0]->count;
	}

}
