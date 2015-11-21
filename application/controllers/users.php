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

		$message = '';
		maintain_ssl();

		/*
		if ($this->authentication->is_signed_in())
		{
			$this->data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
		}
		*/

		//redirect if already logged in
		if($this->ion_auth->logged_in() == TRUE) {
			$this->navigate_user();
		}
		//Validate the form
		$this->form_validation->set_rules($this->user_model->login_validation);
		
		//Process the form
		if($this->input->post('loginSubmit') != '') {
			if($this->form_validation->run() == TRUE) {
			//If log in successfully, redirect to home page 
				if($this->ion_auth->login($this->input->post('email'), $this->input->post('password')) == true) {
					$this->navigate_user();
				}else{
					$message .= 'Validation failed';
					$this->session->set_flashdata('error_message', $message);
					redirect('login');
				}
			}else{
				$message .= 'Validation failed';
				$this->session->set_flashdata('error_message', $message);
				redirect('login');
			}
		}else{
			$this->load_view('users/login2');
		}
		
		//Set subview and load layout
		
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
			'max_size' => 2048,
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

					$upload_data = $this->upload->data();
					$new_file_name = $upload_data['raw_name'].md5(time()).'_280x281'.$upload_data['file_ext'];

					$image_config["image_library"]	= "gd2";
					$image_config["source_image"] 	= $upload_data["full_path"];
					$image_config['create_thumb'] 	= FALSE;
					$image_config['maintain_ratio'] = TRUE;
					$image_config['new_image'] 		= $upload_data["file_path"] . $new_file_name;
					$image_config['quality'] 		= "100%";
					$image_config['width'] 			= 280;
					$image_config['height'] 		= 281;
					$dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
					$image_config['master_dim'] 	= ($dim > 0)? "height" : "width";
					 
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					 
					if(!$this->image_lib->resize()){ //Resize image
					    $this->session->set_flashdata('error_message', 'Unable to resize the logo !');
						redirect('vendors/add');
					}		
					
					$logo_path = $new_file_name;
				}else{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error_message', $error['error']);
					redirect('vendors/add');
				}
			}else{
				$error = array('error' => 'Logo Upload Error !');
				$this->session->set_flashdata('error_message', $error['error']);
				redirect('vendors/add');
			}
         
			//upload and crop featured image
			$featured_image_name 		= '';
			$featured_image_name 		= strtolower($this->input->post('slug'));
			$featured_image_info 		= new SplFileInfo($_FILES['featuredimage']['name']);
			$featured_image_extension 	= $featured_image_info->getExtension();


			$featured_image_name .= '_'.md5(time()).'.'.$featured_image_extension;
	        $config2 = array(
				'upload_path' 	=> 'uploads/vendors/images',
				'allowed_types' => 'gif|jpg|jpeg|png',
				'file_name'		=> $featured_image_name,
				'max_size' 		=> 2048,
			);


			$this->upload->initialize($config2);
			$this->load->library('upload', $config2);

			$featured_image_path = '';
			//check if file is set and uploaded 

			$check_featured_file_upload = FALSE;
			if(isset($_FILES['featuredimage']['error']) && $_FILES['featuredimage']['error'] != 4) { //check if not UPLOAD_ERR_NO_FILE
				$check_featured_file_upload = TRUE;
			}

			if($check_featured_file_upload) {
				if($this->upload->do_upload('featuredimage')) {
					$new_file_name = '';
					$upload_data = $this->upload->data();
					$new_file_name = $featured_image_name;

					$image_config["image_library"] = "gd2";
					$image_config["source_image"] = $upload_data["full_path"];
					$image_config['create_thumb'] = FALSE;
					$image_config['maintain_ratio'] = TRUE;
					$image_config['new_image'] = $upload_data["file_path"] . $new_file_name;
					$image_config['quality'] = "100%";
					$image_config['encrypt_name'] = TRUE;
            		$image_config['remove_spaces'] = TRUE;
            		$image_config['width'] = 1900;
					$image_config['height'] = 600;
					


					$dim = (intval($upload_data["image_width"]) / intval($upload_data["image_height"])) - ($image_config['width'] / $image_config['height']);
					$image_config['master_dim'] = ($dim > 0)? "height" : "width";
					 
					$this->load->library('image_lib');
					$this->image_lib->initialize($image_config);
					 
					if(!$this->image_lib->resize()){ //Resize image
					    
					}else{
						
						$image_config['image_library'] 	= 'gd2';
						$image_config['source_image'] 	= $featured_image_name;
						$image_config['new_image'] 		= $featured_image_name;
						$image_config['quality'] 		= "100%";
						$image_config['maintain_ratio'] = FALSE;
						$image_config['width'] 			= 1900;
						$image_config['height'] 		= 600;

						 
						//$this->image_lib->clear();
						$this->image_lib->initialize($image_config); 
						 
						if (!$this->image_lib->crop()){
							$this->session->set_flashdata('error_message', 'Unable to crop featured image');
							redirect('vendors/add');
						}
					 }
					 $featured_image_path 	= $featured_image_name;
				}else{
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error_message', $error['error']);
					redirect('vendors/add');
				}
			}else{
				$this->session->set_flashdata('error_message', 'Unable to upload featured image');
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
					$this->session->set_flashdata('success_message', 'Vendor added successfully');
					redirect('vendors/add');
				}else{
					$this->session->set_flashdata('error_message', 'Unable to add vendor !');
					redirect('vendors/add');
				}


			}else{
				$this->session->set_flashdata('error_message', 'Unable to add vendor user !');
				redirect('vendors/add');
			}	
		}else{
			$this->session->set_flashdata('error_message', 'Error submitting form !');
			redirect('vendors/add');
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

	public function change_password() {
		if($this->ion_auth->logged_in() == TRUE)
		{
			$message = '';
			
			$this->form_validation->set_rules($this->user_model->change_password_validation);
		
			//Process the form

			if($this->input->post('addSubmit') != '') {
				if($this->form_validation->run() == TRUE) {
				
				$old = $this->input->post('old');
				$new = $this->input->post('new');
				$new_confirm = $this->input->post('new_confirm');

				$user = $this->ion_auth->user();
				$user_id = $this->ion_auth->get_user_id();
				$old_password = $this->input->post('old');
				$user_details = $this->ion_auth->user()->row();
				//$password_matches = $this->ion_auth->hash_password_db($user_id, $old_password);

				//dump($password_matches);
				//echo $this->ion_auth->hash_password($new_confirm);

				
				if($this->ion_auth->change_password($user_details->username, $old, $new)) {
					$message .= 'Password changed successfully';
					$this->session->set_flashdata('success_message', $message);
					
				}else{
					$message .= 'Unable to chnage password';
					$this->session->set_flashdata('error_message', $message);
				}

				redirect('change-password');
			}else{
				$message .= 'Validation Error !';
				$this->session->set_flashdata('error_message', $message);
			}
			}
			

			$this->load_view('users/change_password', 'customer');
		}else{
			redirect('home');
		}
	}


	public function forgot_password() {
		$message = '';

		if($this->input->post('email') != '') {
			//$this->ion_auth->forgotten_password( trim($this->input->post('email')) );

			$email_id = trim($this->input->post('email'));
			$check_if_email_exists = $this->user_model->check_if_email_exists( $email_id );
			
			if($check_if_email_exists) {
				//send email

				$forgot_password_code = $this->generateRandomString();

				//insert the code in users table
				$user_id = $this->user_model->get_user_id($email_id);

				$user_update_date = array(
					'forgotten_password_code' => $forgot_password_code,
				);

				if($this->user_model->update($user_id, $user_update_date)) {

					//prepare the email 
					$to = $email_id;

					$subject = '99fest Password Rset Assistance ';

					$headers = "From: " . strip_tags($this->config->item('forgot_password_email')) . "\r\n";
					//$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
					$url_encode = $this->base64_url_encode($email_id).'++___++'.$forgot_password_code;
		
		
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

					$mail_message = '<html><body>';
					$mail_message .= '<p> We received a request to reset the password associated with this e-mail address. If you made this request, please follow the instructions below.
Click on the link below to reset your password: </p>';
					$mail_message .= 'Click '.anchor(base_url().'reset-password/'.$url_encode,'here').'</p>';
					$mail_message .= '<p> If you did not request to have your password reset you can safely ignore this email </p>';
					$mail_message .= '</body></html>';

					mail($to, $subject, $mail_message, $headers);

					$message .= 'An Email has been sent to '.$email_id.' . Please check for for further instructions.';
					$this->session->set_flashdata('success_message', $message);
					redirect('forgot-password');
				}else{
					$message .= 'Unable to send request. please try later';
					$this->session->set_flashdata('error_message', $message);
					redirect('forgot-password');
				}
			}else{
				$message .= 'Invalid Email Id Entered !';
				$this->session->set_flashdata('error_message', $message);
				redirect('forgot-password');
			}
		}
		$this->load_view('users/forgot_password', 'customer');
	}

	public function reset_password($url = NULL) {
		//reset-password
		$arr = explode('++___++', $url);

		$email = $this->base64_url_decode($arr[0]);
		$code  = $arr[1];
		if($email != NULL && $code != NULL ) {
			$check = $this->user_model->check_if_forgot_code_exists($email, $code);
			if($check) {
				$this->data['email'] = $email;
				$this->load_view('users/reset_password', 'customer');
			}else{
				$message .= 'Invalid code. Please reset again. !';
				$this->session->set_flashdata('error_message', $message);
				redirect('forgot-password');
			}
		}else{
			$message .= 'Invalid code. Please reset again. !';
			$this->session->set_flashdata('error_message', $message);
			redirect('forgot-password');
		}
	}

	public function reset_new_password() {
		//hash_password
		$message = '';

		if($this->input->post('new') != '') {
			$new 		= $this->input->post('new');
			$confirm 	= $this->input->post('new_confirm');

			if($new === $confirm) {
				//update the database 
				$email 	= $this->input->post('value');
				$user_id = $this->user_model->get_user_id($email);


				$new_password = $this->ion_auth->hash_password( $confirm );
				$data = array(
				               'password' => $new_password,
				               'forgotten_password_code' => '',
				            );

				if($this->user_model->update($user_id, $data)) {
					$message .= 'Password chnaged ! login with your new password.';
					$this->session->set_flashdata('success_message', $message);
					redirect('login');
				}
			}
		}

	}

	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
}