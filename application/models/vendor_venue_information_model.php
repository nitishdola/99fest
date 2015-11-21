<?php
class Vendor_venue_information_model extends MY_Model {
	/*public $vendor_venue_validation = array(
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'is_unique[vendor_categories.name]|required|trim'
		),
		
	);
	*/
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}
	
	public function get_venue_details($city_id = NULL) {
		// echo $user_id;
		$this->db->select('vendor_venue_informations.*, v.id as vendor_id,v.*, c.name as cityname, s.name as statename' );
        $this->db->join('vendors v', 'v.id = vendor_venue_informations.vendor_id');
        $this->db->join('cities c', 'c.id = v.city_id');
        $this->db->join('states s', 's.id = v.state_id');
        

        if($city_id != NULL) {
			$this->db->where('v.city_id', $city_id);
		}

		$this->db->order_by('v.id', 'DESC');

		$this->db->limit(6);
        
		return $this->get_all();
	}

	public function venue_info($venue_id = NULL) {
		// echo $user_id;
		$this->db->select('vendor_venue_informations.*,vendor_venue_informations.address as venueaddress, vendors.id as vendor_id,vendors.*, c.name as cityname, s.name as statename, vt.name as venue_type_name' );
        $this->db->join('vendors', 'vendors.id = vendor_venue_informations.vendor_id');
        $this->db->join('cities c', 'c.id = vendors.city_id');
        $this->db->join('states s', 's.id = vendors.state_id');
        //$this->db->join('venue_catering_menu vcm', 'vcm.venue_id = vendor_venue_informations.id');
        
        $this->db->join('venue_types vt', 'vt.id = vendor_venue_informations.venue_type_id');
		if($venue_id != NULL) {
			$this->db->where('vendor_venue_informations.id', $venue_id);
		}

		$res = $this->get_all();
		return $res[0];
	}

	

	public function venue_id_from_slug($slug) {
		$this->db->select('vendor_venue_informations.id');
		if($slug != NULL) {
			$this->db->where('vendor_venue_informations.venue_slug', $slug);
		}

		$res = $this->get_all();

		return $res[0]->id;
	}

	
}
