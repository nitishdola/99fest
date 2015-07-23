<?php
class City_model extends MY_Model {
	public $city_validation = array(
		array(
			'field' => 'state_id',
			'label' => 'State',
			'rules' => 'required|trim'
		),
		array(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'is_unique[cities.name]|required|trim'
		),
		
	);
	
	public function __construct() {
		parent::__construct();
		$this->_database = $this->db;
	}
	
	/*
	* Check if city exists for the state
	* @return true if exists
	* return false if not
	*/
	public function check_if_city_exists($city_name = NULL, $state_id = NULL) {
		$this->db->where('cities.name', $city_name);
		$this->db->where('cities.state_id', $state_id);
		
		return $this->count_by(array('name' => $city_name,'state_id' => $state_id));
	}
	
	/**
	* return all active cities
	* @params state_id
	* if state_id is set, returns cities of the state
	*/
	function get_all_cities($state_id = NULL)
    {   
        $this->db->where('status', 1); //get only active cities
		if( $state_id != NULL) {
			$this->db->where('state_id', $state_id);
		}
		
		$this->db->order_by("name","asc");
        $qry = $this->db->get('cities');

        return $qry->result();
    }

    /**
    * checks if city name exists in database
    * @parameter city_name
    * @return city_id if found else fasle
    */
    function get_city_id($city_name = NULL) {
    	if($city_name != NULL) {

    		$this->db->select('cities.id');

    		$this->db->from('cities');

    		$this->db->like('cities.name', $city_name);
		
			$query = $this->db->get();

			$ret = $query->row();

			if(!empty($ret)) {
				return $ret->id;
			}

			
    	}
    	return FALSE;
    }

    
    function get_city_info($city_id = NULL) {
    	if($city_id != NULL) {

    		$this->db->select('cities.*');

    		$this->db->from('cities');

    		$this->db->where('cities.id', $city_id);
		
			$query = $this->db->get();

			$ret = $query->row();

			return $ret;
    	}
    	return FALSE;
    }
}