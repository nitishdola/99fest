<?php
class Users extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		
		/****EOgoogle**/
	}

	/**
	* login user and redirect to appropriate controller/action
	*/

	public function login() {

		
		maintain_ssl();

		if ($this->authentication->is_signed_in())
		{
			$this->data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		//redirect if already logged in
		if($this->ion_auth->logged_in() == TRUE) {
			$this->navigate_user();
		}
		//Validate the form
		$this->form_validation->set_rules($this->user_model->login_validation);
		
		//Process the form
		if($this->form_validation->run() == TRUE) {
			//If log in successfully, redirect to home page 
			if($this->ion_auth->login($this->input->post('email'), $this->input->post('password')) == true) {
				$this->navigate_user();
			}else{
				$this->data['error'] = 'Unable to log in';
			}
		}
		//Set subview and load layout
		$this->load_view('users/login2');
	}

	
	/**
	* ->registers a user
	* ->validate inputs
	* ->create login details
	*/
	
	public function register() {
		//redirect if already logged in
		if($this->ion_auth->logged_in() == TRUE) {
			redirect('customer/profile');
		}
		
		//Validate the form
		$this->form_validation->set_rules($this->user_model->register_validation);
		
		//Process the registration form
		if($this->form_validation->run() == TRUE) {
			//If validated successfully, register the user 
			
			$group_id = $this->config->item('customer_group_id');
			
			$user_id = $this->do_registration($this->input->post('email'), $this->input->post('password'), $group_id);

			
			//If user is created, insert the other details
			if($user_id) {
				$customer_data = array(
					'user_id' 		=> $user_id,
					'first_name' 	=> $this->input->post('first_name'),
					'last_name' 	=> $this->input->post('last_name'),
					'mobile_number' => $this->input->post('mobile_number'),
					'address' 		=> $this->input->post('address'),
				);
				if($this->db->insert('customer_profiles', $customer_data)) {
					//if the profile has been created, log in the user and redirect to home
					$this->ion_auth->login($this->input->post('email'), $this->input->post('password'));
					redirect('home');
				}
			}
		}
		//Set subview and load layout
		$this->load_view('users/register');
	}
	

	/**
	* Register a vendor
	*/
	public function do_vendor_register() { 

	
		//redirect if not admin
		if(!$this->ion_auth->is_admin()) {
			redirect('users/login');
			exit;
		}

		//Validate the form
		$this->form_validation->set_rules($this->user_model->vendor_register_validation); 

		//Upload the LOGO 
		//prepare file uplaod config array
		$config = array(
			'upload_path' => 'uploads/vendors/logos',
			'allowed_types' => 'gif|jpg|png|jpeg',
			'max_size' => 1024,
			'max_width' => 1920,
			'max_height' => 1080
		);
		$this->load->library('upload', $config);
		
		$check_file_upload = FALSE;
		if(isset($_FILES['logo']['error']) && $_FILES['logo']['error'] != 4) { //check if not UPLOAD_ERR_NO_FILE
			$check_file_upload = TRUE;
		}

		//Process the registration form 

		if($this->form_validation->run() == TRUE) { 
			
		
			$logo_path = '';
			//check if file is set and uploaded 
			if($check_file_upload) {
				if($this->upload->do_upload('logo')) {
					$upload_data = array('upload_data' => $this->upload->data());
					$logo_path = $upload_data['upload_data']['file_name'];
				}else{
					$error = array('error' => $this->upload->display_errors());
					var_dump($error); exit();
					//redirect('vendors/add');
				}
			}
         
//for featured image


         $config2 = array(
			'upload_path' => 'uploads/vendors/images',
			'allowed_types' => 'gif|jpg|jpeg|png',
			'max_size' => 1024,
			'max_width' => 1920,
			'max_height' => 1080
		);
		$this->load->library('upload', $config2);

			$featured_image_path = '';
			//check if file is set and uploaded 

			$check_featured_file_upload = FALSE;
			if(isset($_FILES['featuredimage']['error']) && $_FILES['featuredimage']['error'] != 4) { //check if not UPLOAD_ERR_NO_FILE
				$check_featured_file_upload = TRUE;
			}

			if($check_featured_file_upload) {
				if($this->upload->do_upload('featuredimage')) {
					$upload_data 			= array('upload_data' => $this->upload->data());
					$featured_image_path 	= $upload_data['upload_data']['file_name'];
				}else{
					$error = array('error' => $this->upload->display_errors());
					//var_dump($error);
					redirect('vendors/add');
				}
			}else{
				redirect('vendors/add');
			}

			//If validated successfully, register the user 
			//get the group id
			$group_id = $this->config->item('vendor_group_id');
			
			//generate a password 
			//****for testing password is vendor*******//
			$vendor_password = 'password';
			
			$user_id = $this->do_registration($this->input->post('email'), $vendor_password, $group_id);
			//If user is created, insert the other details
		
			if($user_id) {			
				
				$vendor_data = array(
					'user_id' 			=> $user_id,
					'name' 				=> $this->input->post('name'),
				
					'address' 			=> $this->input->post('address'),
					'logo' 				=> $logo_path,
					'contact_number' 	=> $this->input->post('contact_number'),
					'pin' 				=> $this->input->post('pin'),
					
					'city_id' 			=> $this->input->post('city_id'),
					'state_id' 			=> $this->input->post('state_id'),
					
					'slug' 				=> strtolower($this->input->post('slug')),
					'about' 			=> $this->input->post('about'),
					'featured_img' 	    => $featured_image_path,


					'added_on' 			=> date('Y-m-d H:i:s'),
					
				);


				if($this->db->insert('vendors', $vendor_data)) {
					$vendor_id = $this->db->insert_id(); //get the vendor id

				

					//If vendor id is generated, add category details
					if( $vendor_id) {
						$categories = $this->input->post('category_id'); //get categories selected
					
						$vendor_category_data['vendor_id'] = $vendor_id;

						foreach( $categories as $category ) {
							// echo 'cccc'.$vendor_id;

							$vendor_category_data['vendor_category_id'] = $category;

							$this->db->insert('vendors_categories', $vendor_category_data);
						}

						//exit;

					}
					//if the profile has been created, log in the user and redirect to admin page
					redirect('admin');
				}
			}	
		}else{
            
			//redirect('vendors/add');
			exit;
		}
	}


	/**
	* Register a event manager
	*/
	public function do_event_manager_register() { 
		//redirect if not admin
		if(!$this->ion_auth->is_admin()) {
			redirect('users/login');
			exit;
		}

		$msg = '';


		//Validate the form
		$this->form_validation->set_rules($this->user_model->event_manager_register_validation); 


		
		//Upload the LOGO 
		//prepare file uplaod config array
		$config = array(
			'upload_path' => 'uploads/events/logos',
			'allowed_types' => 'gif|jpg|png',
			'max_size' => 1024,
			'max_width' => 1920,
			'max_height' => 1080
		);
		$this->load->library('upload', $config);
		
		$check_file_upload = FALSE;
		if(isset($_FILES['logo']['error']) && $_FILES['logo']['error'] != 4) { //check if not UPLOAD_ERR_NO_FILE
			$check_file_upload = TRUE;
		}

		
		
		//Process the registration form 

		if($this->form_validation->run() == TRUE) { 
		
			$logo_path = '';
			//check if file is set and uploaded 
			if($check_file_upload) {
				if($this->upload->do_upload('logo')) {
					$upload_data = array('upload_data' => $this->upload->data());
					$logo_path = $upload_data['upload_data']['file_name'];
				}else{
					$error = array('error' => $this->upload->display_errors());
					$msg .= $error;
					redirect('event_managers/add');
				}
			}
			
			//If validated successfully, register the user 
			//get the group id
			$group_id = $this->config->item('event_group_id');
			
			//generate a password 
			//****for testing password is "password"*******//
			$event_manager_password = 'password';
			$user_id = $this->do_registration($this->input->post('email'), $event_manager_password, $group_id);
			//If user is created, insert the other details
		
			if($user_id) {			
				
				$event_manager_data = array(
					'user_id' 			=> $user_id,
					'company_name' 		=> $this->input->post('company_name'),
					'contact_name' 		=> $this->input->post('contact_name'),
					'address' 			=> $this->input->post('address'),
					'logo' 				=> $logo_path,
					'contact_number' 	=> $this->input->post('contact_number'),
					'pin' 				=> $this->input->post('pin'),
					'city_id' 			=> $this->input->post('city_id'),
					'state_id' 			=> $this->input->post('state_id'),
					'added_on' 			=> date('Y-m-d H:i:s'),
				);
				if($this->db->insert('event_managers', $event_manager_data)) {
					

					$msg .= '<div class="alert alert-success fade in">';

				    $msg .= '<a href="#" class="close" data-dismiss="alert">&times;</a>';

				    $msg .= 'Event Manager Added successfully';

				    $msg .= '</div>';
				    $this->session->set_flashdata('msg', $msg);
					$this->session->flashdata('msg');
					redirect('add-event-manager');
					exit;
				}
			}	
		}else{
			$msg .= '<div class="alert alert-danger fade in">';

		    $msg .= '<a href="#" class="close" data-dismiss="alert">&times;</a>';

		    $msg .= 'Unable to add';

		    $msg .= '</div>';

			$this->session->set_flashdata('msg', $msg);
			$this->session->flashdata('msg');
			redirect('add-event-manager');
			exit;
		}
	}
	
	/**
	* Does actual registration of a user
	*/
	function do_registration($email = NULL, $password = NULL, $group_id = NULL) {
		$groups = array($group_id);
		$additional_data = array();

		$user_id = $this->ion_auth->register($email, $password, $email,$additional_data, $groups);
		return $user_id;
		
	}
	
	//Log out user
	public function logout() {
		$this->load->library('facebook');
		unset($_SESSION['access_token']);
        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.
		$this->ion_auth->logout();
		redirect('home');
	}
}