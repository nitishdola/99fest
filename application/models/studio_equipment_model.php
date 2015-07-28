<?php
class Studio_equipment_model extends MY_Model {
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}

    public function view_all_equipments($vendor_photo_studio_information_id) {
        $this->db->select('studio_equipments.*' );
        $this->db->where('studio_equipments.vendor_photo_studio_information_id', $vendor_photo_studio_information_id);
        return $this->get_all();
    }
}