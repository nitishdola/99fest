<?php
class Cities extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('city_model');
		$this->load->model('state_model');
	}

	/**
	* Add a city for a state, if city with same name exists in database
	* report .
	*/

	public function add() {
		//check if admin
		if($this->ion_auth->is_admin()) {
			
			$states = $this->state_model->dropdown($value = 'name');
			$this->data['states'] = $states;
			
			//Validate the form
			$this->form_validation->set_rules($this->city_model->city_validation);
		
			//Process the form
			if($this->form_validation->run() == TRUE) {
			
			
				//Check if city for the same state does not exists
				$check_if_city_exists = $this->city_model->check_if_city_exists($this->input->post('name'),$this->input->post('state_id'));
				if(!$check_if_city_exists) {
					//add to database
				//proceed if city does not exists
					$city_data = array(
						'state_id' 	=> $this->input->post('state_id'),
						'name' 		=> $this->input->post('name'),
					);
					if($this->db->insert('cities', $city_data)) {
						$this->session->set_flashdata('flash_message', array('message' => 'City has been added')); 
					}
				}else{
					$this->session->set_flashdata('flash_message', array('message' => 'City already exists !')); 
				}
				//redirect to city add page
				redirect('cities/add');
			}

			//Get all states
		
			$this->load_view('cities/add', 'admin');

			
		}else{
			redirect('users/login');
		}
	}
	
	/*
	* returns json encoded list of cities for the state requested
	*/
	function api_get_cities() {
		if(isset($_GET['state_id']) && $_GET['state_id'] != '') {
			$cities = $this->city_model->get_all_cities($_GET['state_id']);
			echo json_encode($cities);
		}
	}
}