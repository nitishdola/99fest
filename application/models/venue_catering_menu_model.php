<?php
class Venue_catering_menu_model extends MY_Model {
    public function __construct() {
        parent::__construct();
        $this->_database = $this->db;
    }

    public function venue_catering_details($venue_id = NULL) {
        $this->db->select('venue_catering_menus.*' );
        $this->db->where('venue_catering_menus.venue_id', $venue_id);
        return $this->get_all();
    }

}