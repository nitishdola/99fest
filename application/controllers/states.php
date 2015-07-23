<?php
class States extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('state_model');
	}

	/**
	* Add a state, if state with same name exists in database
	* report .
	*/

	public function add() {
		//check if admin
		if($this->ion_auth->is_admin()) {
			//Validate the form
			$this->form_validation->set_rules($this->state_model->state_validation);
		
			//Process the form
			if($this->form_validation->run() == TRUE) {
				//add to database
				$states_data = array(
					'name' => $this->input->post('name'),
				);
				if($this->db->insert('states', $states_data)) {
					//if the state has been added, redirect to state add page
					$this->session->set_flashdata('flash_message', array('message' => 'State has been added')); 
					redirect('states/add');
				}
			}
		$this->load_view('states/add', 'admin');
			
		}else{
			redirect('users/login');
		}
	}
}