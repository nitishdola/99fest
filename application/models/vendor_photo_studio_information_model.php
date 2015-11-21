<?php
class Vendor_photo_studio_information_model extends MY_Model {
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}
	
	public function get_studio_details($city_id = NULL) {
		// echo $user_id;
		$this->db->select('vendor_photo_studio_informations.*, v.id as vendor_id,v.*, c.name as cityname, s.name as statename' );
        $this->db->join('vendors v', 'v.id = vendor_photo_studio_informations.vendor_id');
        $this->db->join('cities c', 'c.id = v.city_id');
        $this->db->join('states s', 's.id = v.state_id');
        

        if($city_id != NULL) {
			$this->db->where('v.city_id', $city_id);
		}

		$this->db->order_by('v.id', 'DESC');

		$this->db->limit(6);
        
		return $this->get_all();
	}

	public function studio_info($studio_id = NULL) {
		// echo $user_id;
		$this->db->select('vendor_photo_studio_informations.*, vendors.id as vendor_id,vendors.*, c.name as cityname, s.name as statename' );
        $this->db->join('vendors', 'vendors.id = vendor_photo_studio_informations.vendor_id');
        $this->db->join('cities c', 'c.id = vendors.city_id');
        $this->db->join('states s', 's.id = vendors.state_id');
        
		if($studio_id != NULL) {
			$this->db->where('vendor_photo_studio_informations.id', $studio_id);
		}

		$res = $this->get_all();
		return $res[0];
	}

	

	public function studio_id_from_slug($slug) {
		$this->db->select('vendor_photo_studio_informations.id');
		if($slug != NULL) {
			$this->db->where('vendor_photo_studio_informations.studio_slug', $slug);
		}

		$res = $this->get_all();

		return $res[0]->id;
	}

	
}
