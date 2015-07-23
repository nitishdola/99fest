<?php
class Customers extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('customer_profile_model');
	}

	/**
	* View profile
	*/

	public function profile($edit = NULL) {
		//redirect if not logged in
		if($this->ion_auth->logged_in() == FALSE) {
			redirect('users/login');
		}
		
		$user_id = $this->ion_auth->get_user_id();
		
		$customer_details = $this->customer_profile_model->get_with_user_details($user_id);
		$this->data['details'] = $customer_details[0];
		
		//if the request is not edit
		if($edit == NULL) {
			//Set subview and load layout profile view
			$this->load_view('customers/profile', 'customer');
		//if edit is set
		}else if($edit == 'edit') {
			//Set subview and load layout profile edit
			$this->load_view('customers/edit');
		}
		
	}

	//do the edit
	public function edit() {
		$customer_user_id = $this->ion_auth->get_user_id();
		$details = $this->customer_profile_model->get_with_user_details($customer_user_id);
		$id = $details[0]->customer_profile_id;

		$customer_profile = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'mobile_number' => $this->input->post('mobile_number'),
			'address' => $this->input->post('address'),
		);
		if($this->customer_profile_model->update($id, $customer_profile)) {
			redirect('myprofile');
		}
	}
	
}