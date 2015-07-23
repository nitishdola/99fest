<?php
class Vendor_model extends MY_Model {
	protected $belongs_to 	= array('user');
	//protected $has_many 	= array('');
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}
	
	public function get_with_user_details($user_id = NULL) {
        // echo $user_id;
		$this->db->select('vendors.id as vendor_id,vendors.*, u.*, c.name as cityname, s.name as statename' );
        //$this->db->from('vendors v'); 
        $this->db->join('users u', 'u.id = vendors.user_id');
        $this->db->join('cities c', 'c.id = vendors.city_id');
        $this->db->join('states s', 's.id = vendors.state_id');
        if($user_id != NULL) {
			$this->db->where('vendors.user_id', $user_id);
		}
		//dump($this->get_all());
        
		return $this->get_all();
	}

	public function get_vendor_details($vendor_id = NULL) {
		$this->db->select('vendors.*');
		$this->db->where('vendors.id', $vendor_id);
		
		return $this->get_all();
	}
	public function get_vendor($slug) {
		$this->db->select('vendors.*');
		$this->db->where('vendors.slug', $slug);
		
		return $this->get_all();
	}

	public function update($vid,$vendor_profile){
             $this->db->where('id', $vid);
             $this->db->update('vendors', $vendor_profile);
          }
}