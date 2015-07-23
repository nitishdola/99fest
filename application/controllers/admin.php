<?php
	class Admin extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
	}

	/**
	* View admin functions
	*/

	public function index($edit = NULL) {
		//redirect if not logged in
		if($this->ion_auth->logged_in() == FALSE) {
			redirect('users/login');
		}
		//Set subview and load layout profile edit
		//$this->load->view('admin/common/admin_header');
		
		$this->load_view('admin/index', 'admin');
		//$this->load->view('admin/common/admin_footer');
				
	}
}