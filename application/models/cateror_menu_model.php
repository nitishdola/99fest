<?php
class Cateror_menu_model extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->_database = $this->db;
    }

    public function menu_details($catering_id = NULL) {
        $this->db->select('cateror_menus.*' );
        $this->db->where('cateror_menus.vendor_catering_service_information_id', $catering_id);
        return $this->get_all();
    }

}