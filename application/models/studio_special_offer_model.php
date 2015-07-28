<?php
class Studio_special_offer_model extends MY_Model {
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}

    public function studio_offers($studio_id = NULL) {
        $this->db->select('studio_special_offers.*' );
        $this->db->where('studio_special_offers.studio_id', $studio_id);
        return $this->get_all();
    }
}