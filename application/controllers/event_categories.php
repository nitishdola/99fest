<?php
class Event_categories extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('event_category_model');
	}
	
	/**
	* Add a event category only by admin
	*/
	
	public function add() {
		//check if admin
		if($this->ion_auth->is_admin()) {
			

			//Validate the form
			$this->form_validation->set_rules($this->event_category_model->category_validation);
			
			//Process the form
			if($this->form_validation->run() == TRUE) {
				//save the category
				$category = array(
					'name' => $this->input->post('name'),
				);

				if($this->db->insert('event_categories', $category)) {
					//if the state has been added, redirect to state add page
					$this->session->set_flashdata('flash_message', array('message' => 'Even category has been added')); 
				}
			}

			$this->load_view('event_categories/add', 'admin');
		}else{
			redirect('users/login');
		}
	}

}