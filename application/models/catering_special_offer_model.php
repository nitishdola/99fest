<?php
class Catering_special_offer_model extends MY_Model {
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}

    public function catering_offers($catering_id = NULL) {
        $this->db->select('catering_special_offers.*' );
        $this->db->where('catering_special_offers.vendor_catering_service_information_id', $catering_id);
        return $this->get_all();
    }
}