<?php
class Event_managers extends MY_Controller {
	public function __construct() {
		parent::__construct();

		//redirect if not logged in
		$this->load->model('event_model');
		$this->load->helper("url");
		$this->load->model('event_manager_model');
		$this->load->model('state_model');
		$this->load->model('city_model');
	}
	
	/**
	* Add a event manager only by admin
	* For user login sends data to users/add
	*/
	
	public function add() {
		//check if admin
		if($this->ion_auth->is_admin()) {
			$states = $this->state_model->dropdown($value = 'name');
			$this->data['states'] = $states;

			$cities = $this->city_model->dropdown($value = 'name');
			$this->data['cities'] = $cities;

			$this->load_view('event_managers/add', 'admin');
		}else{
			//echo 'NO ADMIN';
			redirect('users/login');
		}
	}

	public function profile($edit = NULL) {
		//redirect if not logged in
		if(!$this->check_event_manager()) {
			redirect('users/login');
		}
		
		$states = $this->state_model->dropdown($value = 'name');
		$this->data['states'] = $states;

		$cities = $this->city_model->dropdown($value = 'name');
		$this->data['cities'] = $cities;
		//get the user id
		$user_id = $this->ion_auth->get_user_id();
		
		//get the event manager details
		$event_manager_details = $this->event_manager_model->get_with_user_details($user_id);
		$this->data['details'] = $event_manager_details[0];
		
		$this->load_view('event_managers/profile', 'event');
	}

	public function update_profile() {
		
	}

	/**
	* add a event gallery
	* uploads multiple images
	*/

	public function event_image_gallery_upload() {
		if($this->check_event_manager()) {
			$events = $this->event_model->get_events_by_manager($this->ion_auth->get_user_id());
			$this->data['events'] = $events;

			//Validate the form
			$this->form_validation->set_rules($this->event_manager_model->add_event_image_validation);
			if($this->form_validation->run() == TRUE) {
				//Process the registration form
				//Upload the image
				//prepare file uplaod config array
				$config = array(
					'upload_path' => 'uploads/events/gallery',
					'allowed_types' => 'gif|jpg|png|jpeg',
					'max_size' => 1024, //max 1MB
					'max_width' => 1920,
					'max_height' => 1080
				);
				$this->load->library('upload', $config);
				
				
				//LOOP through the files uploaded
				for($i = 1; $i<= MAX_EVENT_GALLERY_UPLOAD; $i++) {
					$check_file_upload = FALSE;
					//check if file is not empty
					if(isset($_FILES['image'.$i]['error']) && $_FILES['image'.$i]['error'] != 4) { //check if not UPLOAD_ERR_NO_FILE
						$check_file_upload = TRUE;
					}

					if($check_file_upload == TRUE) { 
						$gallery_path = '';
						if($this->upload->do_upload('image'.$i)) {
							$upload_data = array('upload_data' => $this->upload->data()); //get the upload data
							$gallery_path = $upload_data['upload_data']['file_name'];

							$event_gallery_data = array(
								'event_id' 		=> $this->input->post('event_id'),
								'image_path'	=> $gallery_path,
							);
							$this->db->insert('event_galleries', $event_gallery_data);
						}else{
							$error = array('error' => $this->upload->display_errors());
							//dump($error); exit;
							//redirect('events/add');
						}
					}
				}
			}
			$this->load_view('event_managers/event_gallery_upload', 'event');
			
		}else{
			redirect('users/login');
		}
	}

	/**
	* event_video_gallery_upload() 
	* accepts the URL of the youtube video
	* filters and saves the unique id of the video
	*/
	function event_video_gallery_upload() {
		

		if($this->check_event_manager()) {
			$events = $this->event_model->get_events_by_manager($this->ion_auth->get_user_id());
			$this->data['events'] = $events;

			//Validate the form
			$this->form_validation->set_rules($this->event_manager_model->add_event_video_validation);
			if($this->form_validation->run() == TRUE) {

				for($i = 1; $i <= 4; $i++) {

					$url = $this->input->post('video_url_'.$i);

					if($url != '') {
						$query_string = array();

						parse_str(parse_url($url, PHP_URL_QUERY), $query_string);

						$unique_id = $query_string["v"];

						if($unique_id != '') {
							$event_video_data = array(
								'event_id'			=> $this->input->post('event_id'),
								'unique_id' 		=> $unique_id,
							);
						
							$this->db->insert('event_video_galleries', $event_video_data);
						}
						
					}
					
				}
			}
			
			$this->load_view('event_managers/event_video_gallery_upload', 'event');
		}else{
			redirect('users/login');
		}
	}

	public function add_sponsors() {
		if(!$this->check_event_manager()) {
			redirect('users/login');
		}else{
			$events = $this->event_model->get_events_by_manager($this->ion_auth->get_user_id());
			$this->data['events'] = $events;
			$this->load_view('event_managers/add_sponsors', 'event');
		}
		
	}

	public function event_sponsor_upload() {
		if($this->check_event_manager()) {
			$config = array(
				'upload_path' => 'uploads/events/sponsors',
				'allowed_types' => 'gif|jpg|png|jpeg',
				'max_size' => 1024, //max 1MB
				'max_width' => 1920,
				'max_height' => 1080
			);
			$this->load->library('upload', $config);

			for($i = 1; $i<= MAX_EVENT_GALLERY_UPLOAD; $i++) {
				$check_file_upload = FALSE;
				//check if file is not empty
				if(isset($_FILES['image'.$i]['error']) && $_FILES['image'.$i]['error'] != 4) { //check if not UPLOAD_ERR_NO_FILE
					$check_file_upload = TRUE;
				}

				if($check_file_upload == TRUE) { 
					$gallery_path = '';
					if($this->upload->do_upload('image'.$i)) {
						$upload_data = array('upload_data' => $this->upload->data()); //get the upload data
						$gallery_path = $upload_data['upload_data']['file_name'];

						$event_sponsor_data = array(
							'event_id' 		=> $this->input->post('event_id'),
							'name' 			=> $this->input->post('name'.$i),
							'image'			=> $gallery_path,
						);
						$this->db->insert('event_sponsors', $event_sponsor_data);
					}else{
						$error = array('error' => $this->upload->display_errors());
					}
				}
			}
			redirect('event_managers/add_sponsors');
		}
		
	}

	public function view_all_managers() {
		//get the event manager details
		if($this->ion_auth->is_admin()) {
			$event_manager_details = $this->event_manager_model->get_with_user_details();
			$this->data['details'] = $event_manager_details;
			$this->load_view('event_managers/view_all_managers', 'admin');
		}
	}

	public function change_manager_status() {
		if($this->ion_auth->is_admin()) {
			if(isset($_GET['user_id']) && $_GET['user_id'] != '') {
				$status = $_GET['status'];
				
				$user_id = $_GET['user_id'];
				$data = array(
	               'active' => $status
	            ); 
	            $this->db->where('id', $user_id);
			
				if($this->db->update('users', $data)) {
					echo 1; exit;
				}
			}
		}
		echo 0;
	}

}