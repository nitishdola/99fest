<?php
class Venue_special_offer_model extends MY_Model {
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}

    public function venue_offers($venue_id = NULL) {
        $this->db->select('venue_special_offers.*' );
        $this->db->where('venue_special_offers.venue_id', $venue_id);
        return $this->get_all();
    }
}