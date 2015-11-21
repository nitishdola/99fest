<?php
class Events extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('event_model');
		$this->load->model('event_gallery_model');
		$this->load->model('event_sponsor_model');
		$this->load->model('state_model');
		$this->load->model('city_model');
		$this->load->model('event_category_model');
		$this->load->model('events_category_model');
		$this->load->model('event_ticket_model');
		$this->load->model('event_manager_model');
		$this->load->model('event_booked_ticket_model');
		$this->load->model('customer_profile_model');
		$this->load->model('default_image_model');

		$this->load->helper('text');

		$this->load->file('application/libraries/payu.php', true);
	}

	/**
	* index() view all events 
	*/
	
	function index() {
		$city_id = '';
		$city_info = $this->get_city_info(); 

		if($city_info) {
			$city_all_info = $this->city_model->get_city_info($city_id);
			$city_id 	= $city_info['city_id'];
			$city_name 	= $city_info['city_name'];

			$this->data['city_id'] 		= $city_id; 
			$this->data['city_name'] 	= $city_name;
		}
		$events_home_data = $this->event_model->get_events_home_data( $city_id );
		$this->data['events_home_data'] = $events_home_data;

		$upcoming_events = $this->event_model->get_upcoming_events( $city_id );
		$this->data['upcoming_events'] = $upcoming_events;

		$default_event_image = $this->default_image_model->get_all_images($status = 1, $type = 'event');
		$default_event_image = $default_event_image[0]->path;
		$this->data['default_event_image'] = $default_event_image;
		//get sponsored events

		$cities = $this->city_model->dropdown($value = 'name');

		$event_categories = $this->event_category_model->get_all_categories();

		$this->data['event_categories'] = $event_categories;

		$this->data['cities']	= $cities;
		
		//$this->load_view('events/index');
		$this->load_view('events/index_test');
	}

	/**
	* api_get_vendors()
	* get the events data for searching
	* default page number is congigured in config file
	* @return JSON data of the events
	* page number is incremented with each scroll, see the view search.php for more details
	* page number is used for offset, with each scroll the next page is loaded with LIMIT equals page size
	*/

	public function api_get_events_old() {
		$city_id		= '';	
		$offset			= 0;

		if(isset($_GET['offset']) && $_GET['offset'] != '' && $_GET['offset'] > 0) {
			$offset = $_GET['offset'];
		}

		if(isset($_GET['city_id']) && $_GET['city_id'] != '' && $_GET['city_id'] > 0) {
			$city_id = $_GET['city_id'];
		}

		$page_num = !isset($_GET["page_num"]) || $_GET["page_num"]  == "" ? 1 : $_GET["page_num"];
        $page_size = !isset($_GET["page_size"]) || $_GET["page_size"]  == "" ? EVENTSPERPAGE : $_GET["page_size"];

        $offset = ($page_num-1)*$page_size;

		$get_all_events = $this->event_model->get_all_events($city_id,$limit = EVENTSPERPAGE, $offset);
		if(empty($get_all_events)) {
			$get_all_events['last_reached'] = true;
		}else{
			$get_all_events['last_reached'] = false;
		}
		//dump($get_all_vendors);
		echo json_encode($get_all_events);
	}

	public function api_get_events() {

		$city_id = '';
		$city_info = $this->get_city_info(); 

		if($city_info) {
			$city_all_info = $this->city_model->get_city_info($city_id);
			$city_id = $city_info['city_id'];
			$city_name = $city_info['city_name'];

			$this->data['city_id'] 		= $city_id; 
			$this->data['city_name'] 	= $city_name;
		}


		$offset = 0;
		$category_id = null;
		if(isset($_GET['offset']) && $_GET['offset'] != '') {
			$offset = $_GET['offset'];
		}

		if(isset($_GET['category_id']) && $_GET['category_id'] != '' && $_GET['category_id'] > 0) {
			if($category_id != 'all'):
				$category_id = $_GET['category_id'];
			endif;
		}

		$all_events = array();

		$get_all_sponsoed_events = $this->api_get_sponsored_events($category_id, $city_id);

		$get_all_non_sponsoed_events = json_decode($this->api_get_non_sponsored_events($category_id, $city_id, $offset));

		//$get_all_events = $this->event_model->get_all_events($category_id,$limit = 10, $offset, $sponsored = FALSE);
		/*if(empty($get_all_events)) {
			$get_all_events['last_reached'] = true;
		}else{
			$get_all_events['last_reached'] = false;
		}*/
		
		$all_events['sponsored'] 		= $get_all_sponsoed_events;
		$all_events['non_sponsored'] 	= $get_all_non_sponsoed_events;
		echo json_encode($all_events);
	}

	public function api_get_sponsored_events($category_id = NULL , $city_id = NULL) {
		$offset = 0;
		$get_all_events = $this->event_model->get_all_events($category_id,$city_id,$limit = 10, $offset, $sponsored = TRUE);
		return $get_all_events;
	}

	public function api_get_non_sponsored_events($category_id = NULL, $city_id = NULL, $offset = 0) {
		
		$get_all_events = $this->event_model->get_all_events($category_id,$city_id,$limit = 6, $offset, $sponsored = FALSE);
		
		if(empty($get_all_events)) {
			$get_all_events['last_reached'] = true;
		}else{
			$get_all_events['last_reached'] = false;
		}
		return json_encode($get_all_events);
	}


	/**
	* Add a event by event manager
	* an event manager can add/organize multiple events
	*/
	
	public function add() {
		//check if event manager
		if($this->check_event_manager()) {
			$states = $this->state_model->dropdown($value = 'name');
			$this->data['states'] = $states;

			$cities = $this->city_model->dropdown($value = 'name');
			$this->data['cities'] = $cities;

			$categories = $this->event_category_model->dropdown($value = 'name');
			$this->data['categories'] = $categories;

			

			$config['center'] = '28.640156399310275 , 77.23725781250005';
			$config['zoom'] = 5;//'auto';
			$config['places'] = TRUE;
			$config['placesAutocompleteInputID'] = 'event_location';
			$config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
			//$config['placesAutocompleteOnChange'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';//'getInfo()';//'alert(\'You selected a place\');';
			$marker = array();
			$marker['position'] = '28.640156399310275 , 77.23725781250005';
			$marker['draggable'] = true;
			$marker['ondragend'] = 'updateDatabase(event.latLng.lat(), event.latLng.lng());';
			$this->googlemaps->add_marker($marker);


			$this->googlemaps->initialize($config);



			$this->data['map'] = $this->googlemaps->create_map();


			//Validate the form
			$this->form_validation->set_rules($this->event_model->add_event_validation);
			
			//Process the registration form
			//Upload the LOGO
			//prepare file uplaod config array
			$config['upload_path'] = './uploads/events/posters';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '30720';
			$config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->do_upload('poster');
           	$upload_data = array('upload_data' => $this->upload->data()); //get the upload data
			$poster_path = $upload_data['upload_data']['file_name'];


				//for thumbs
			$config2['upload_path'] = './uploads/events/thumbs';
			$config2['allowed_types'] = 'jpg|jpeg|bmp|png';
			$config2['max_size'] = '30720';
			$config2['encrypt_name'] = TRUE;

			$this->upload->initialize($config2);
			$this->upload->do_upload('thumbs');
			$upload_data 		= array('upload_data' => $this->upload->data());
			$thumb_image_path 	= $upload_data['upload_data']['file_name'];
				

				$event_duration = 0;
				$event_hr 	= $this->input->post('event_duration_hr');
				$event_min = $this->input->post('event_duration_minutes');
				//calculate event duration in minutes
				$event_duration = $event_hr*60 + $event_min ;
				
				$event_start_time = date('H:i', strtotime($this->input->post('event_start_time')));

				$event_slug = strtolower(str_replace(' ','-',$this->input->post('name')));

				/**
				* Check if event slug name is unique
				* returns TRUE if slug name does not exists 
				* and FALSE if already exists
				*/
				
				$count = $this->event_model->count_by('slug', $event_slug);

				//continue if slug doe not exist ie $count = 0
				if(!$count) {
					$event_end_date = '';
					if($this->input->post('event_end_date') != '') {
						$event_end_date = $this->input->post('event_end_date');
					}else{
						$event_end_date = $this->input->post('event_start_date');
					}

					$facebok = $twitter = $instagram = '';
					if($this->input->post('event_facebook_id') != '') {
						$facebok 	= substr($this->input->post('event_facebook_id'),25);
					}
					if($this->input->post('event_twitter_id') != '') {
						$twitter 	= substr($this->input->post('event_twitter_id'),20);
					}
					if($this->input->post('event_instagram_id') != '') {
						$instagram	= substr($this->input->post('event_instagram_id'),22);
					}
					
					
					

					$event_data = array(
						'user_id'			=> $this->ion_auth->get_user_id(),
						'name' 				=> $this->input->post('name'),
						'slug' 				=> $event_slug,
						'event_start_time'	=> $event_start_time,
						'poster' 			=> $poster_path,
						'thumb' 			=> $thumb_image_path,
						'event_start_date' 	=> $this->input->post('event_start_date'),
						'event_end_date' 	=> $event_end_date,
						'venue' 			=> $this->input->post('venue'),
						'venue_address' 	=> $this->input->post('venue_address'),
						'venue_pin' 		=> $this->input->post('venue_pin'),
						'venue_lat' 		=> $this->input->post('venue_lat'),
						'venue_lng' 		=> $this->input->post('venue_lng'),
						'state_id' 			=> $this->input->post('state_id'),
						'city_id' 			=> $this->input->post('city_id'),
						'event_duration'	=> $event_duration,
						'about'				=> $this->input->post('about'),
						'faq'				=> $this->input->post('faq'),
						'tnc'				=> $this->input->post('tnc'),
						'facebook'			=> $facebok,
						'twitter'			=> $twitter,
						'instagram'			=> $instagram,
						'added_on' 			=> date('Y-m-d H:i:s'),
					);
			

					if($this->db->insert('events', $event_data)) {
						

						$event_id = $this->db->insert_id(); //get the event id

						//If event id is generated, add categories for the event
						if( $event_id) {
							$categories = $this->input->post('categories'); //get categories selected

							$event_category_data['event_id'] = $event_id;

							//for the event created , insert the categories individually
							foreach( $categories as $category ) {
								$event_category_data['event_category_id'] = $category;
								$this->db->insert('events_categories', $event_category_data);

							}

						}
					}
			
			
				
			}else{
				//echo 'validation error'; exit;
			}
			 
			$this->load_view('events/add', 'event');
		}else{
			redirect('users/login');
		}
	}

	


	//Create tickets by event manager
	public function create_tickets() {
		//check if event manager
		if($this->check_event_manager()) {

			$events = $this->event_model->get_events_by_manager($this->ion_auth->get_user_id());
			$this->data['events'] = $events;

			$this->form_validation->set_rules($this->event_model->create_event_ticket_validation);

			if($this->form_validation->run()) {
				$event_ticket_data = array(
					'event_id'			=> $this->input->post('event_id'),
					'name' 				=> $this->input->post('name'),
					'rate'				=> $this->input->post('rate'),
					'tickets_issued' 	=> $this->input->post('tickets_issued'),
				);

				if($this->db->insert('event_tickets', $event_ticket_data)) {

				}
			}else{
				//dump($_POST);
			}
			
			$this->load_view('events/create_tickets', 'event');
		}else{
			redirect('users/login');
		}
	}


	/**
	* api_book_tickets()
	* @parameters GET ticket_id
	* perform ticket booking if the user is customer 
	* and the event have tickets available
	* @return true if booking successfull
	* false if not
	*/
	function api_book_tickets() {

		if(isset($_GET['ticket_id']) && $_GET['ticket_id'] != '' && isset($_GET['no_of_tickets']) && $_GET['no_of_tickets'] != '') {
			//get the user id
			$userId = $this->ion_auth->get_user_id();

			if($userId) { 
				//if user id is valid, get the user group. Only customers can book tickets
				$group_id = $this->ion_auth->get_users_groups()->row()->id;
				//verify if user is customer
				if($group_id == $this->config->item('customer_group_id')) { 
					
					$ticket_id 		= $_GET['ticket_id'];
					$no_of_tickets 	= $_GET['no_of_tickets'];
					//get ticket details
					$ticket_details = $this->event_ticket_model->get_ticket_details($ticket_id);

					if(!empty($ticket_details)) { 
						$event_id = $ticket_details[0]->event_id;

						//check if event is closed(ended)
						$check_if_closed = $this->event_model->check_if_event_closed($event_id);
						//If not closed alreday
						if(!$check_if_closed) {
							//Prepare data to isert
							$booking_data = array(
								'ticket_id' 		=> $ticket_id,
								'user_id'			=> $userId,
								'tickets_booked'	=> $no_of_tickets,
								'booked_time'		=> date('Y-m-d H:i:s'),
							);
							//Insert to database
							if($this->db->insert('event_booked_tickets', $booking_data)) {
								return TRUE;
							}
						}
					}
				}
			}
			
		}
		return FALSE;
	}
 
	/**
	* do the checkout confirmation
	* show customer total bill and ticket info
	* if customer accepts, proceed to checkout with CUSTOMER details
	* for the payment gateway
	*/

	public function checkout_booking() {
		$total_booked_rate = 0;

		$ticket_data = $this->input->post('qty');
		$qty = count($this->input->post('qty'));// dump($ticket_data); exit;

		for($i = 0; $i < $qty; $i++ ) {
			
			if(is_numeric($i)) {
				 
				$ticket = $ticket_data[$i];

				if($ticket != 0) {
					$ticket_info = explode('_', $ticket);
				
					$ticket_qty = $ticket_info[0];

					$ticket_id  = $ticket_info[2];

					$get_ticket_data 		= $this->event_ticket_model->get_ticket_details($ticket_id);
					$total_tickets_booked 	= $this->event_booked_ticket_model->total_tickets_booked($ticket_id);
					
					$event_id = $get_ticket_data[0]->event_id;

					$tickets_issued = $get_ticket_data[0]->tickets_issued;

					$ticket_left = $tickets_issued - $total_tickets_booked;
		
					if($ticket_qty > $ticket_left) {
						redirect('users/login');
					}else{
						$ticket_rate 	= $get_ticket_data[0]->rate;
						$ticket_total 	= $ticket_rate * $ticket_qty;

						$total_booked_rate += $ticket_total;
					}
				}
				
			}
		}
		$event_details = $this->event_model->get_event_details($event_id);

		$this->data['event_details']	 = $event_details;
		$this->data['total_booked_rate'] = $total_booked_rate;
		$this->load_view('events/checkout_booking');
	}


	public function booking() {
		$total_booked_rate = 0;
		$event_slug = $this->input->post('slug');
		
	
		$ticket_data = $this->input->post('qty');
		$qty = count($this->input->post('qty'));// dump($ticket_data); exit;
		for($i = 0; $i < $qty; $i++ ) {
			
			if(is_numeric($i)) {
				 
				$ticket = $ticket_data[$i];

				if($ticket != 0) {
					$ticket_info = explode('_', $ticket);
				
					$ticket_qty = $ticket_info[0];

					$ticket_id  = $ticket_info[2];

					$get_ticket_data 		= $this->event_ticket_model->get_ticket_details($ticket_id);
					$total_tickets_booked 	= $this->event_booked_ticket_model->total_tickets_booked($ticket_id);
					
					$event_id = $get_ticket_data[0]->event_id;
					

					$tickets_issued = $get_ticket_data[0]->tickets_issued;

					$ticket_left = $tickets_issued - $total_tickets_booked;
		
					if($ticket_qty > $ticket_left) {
						redirect('users/login');
					}else{
						$ticket_rate 	= $get_ticket_data[0]->rate;
						$ticket_total 	= $ticket_rate * $ticket_qty;

						$total_booked_rate += $ticket_total;
					}
				}
				
			}
			
		}
		$userId = $this->ion_auth->get_user_id();
		$user_details = $this->customer_profile_model->get_with_user_details($userId);
		
		$failed_uri = 'payments/failed';
		$success_uri = 'payments/success';
		pay_page( array (	
			'key' => 'gtKFFx', 
			'txnid' => uniqid(), 
			'amount' => $total_booked_rate,
			'firstname' => $user_details[0]->first_name, 
			'email' => $user_details[0]->username, 
			'phone' => $user_details[0]->mobile_number,
			'productinfo' => 'Event Booking Info', 
			'surl' => $success_uri, 
			'furl' => $failed_uri), 
			'eCwWELxi' );

			if(!empty($_POST) && isset($_POST['mihpayid']) && $_POST['mihpayid'] != '') {
					
				if($_POST['status'] == 'failure') {

					
					if($_POST['error_Message'] != '') {
						$_SESSION['payment_error_message'] = $_POST['error_Message'];
					}else if($_POST['field9'] != '') {
						$_SESSION['payment_error_message'] = $_POST['field9'];
					}
					redirect($failed_uri, 'refresh');
				}
			}
	
	}

	function payment_success() {
		/* Payment success logic goes here. */
		echo "Payment Success" . "<pre>" . print_r( $_POST, true ) . "</pre>";
	}

	function payment_failure() {
		/* Payment failure logic goes here. */
		echo "Payment Failure" . "<pre>" . print_r( $_POST, true ) . "</pre>";
	}


	/**
	* view an event
	* @parameter $slug
	* to view details of the event, booking link, venue etc
	*/

	public function view($slug = NULL) {
		$slug = $this->uri->segment(1);
		if($slug != NULL) {
			$event_id = $this->event_model->get_event_id_from_slug($slug);
		
			if($event_id) {
				$event_details = $this->event_model->get_event_details($event_id);

				$event_categories 	= $this->events_category_model->get_categories_for_event($event_id);

				$event_tickets 		= $this->event_ticket_model->get_tickets($event_id);

				$event_images		= $this->event_gallery_model->get_image_gallery($event_id);

				$event_sposnsors	= $this->event_sponsor_model->get_all_sponsors($event_id);

				$this->load->library('googlemaps');


				$lat = $event_details[0]->venue_lat;
				$lng = $event_details[0]->venue_lng;
				$config['center'] = "$lat, $lng";
				$config['zoom'] = 16;
				$this->googlemaps->initialize($config);

				$marker = array();
				$marker['position'] = "$lat, $lng";
				$this->googlemaps->add_marker($marker);
				$this->data['map'] = $this->googlemaps->create_map();

				
				$this->data['event_details'] 	= $event_details[0];
				$this->data['event_categories'] = $event_categories;
				$this->data['event_tickets'] 	= $event_tickets;
				$this->data['event_images'] 	= $event_images;
				$this->data['event_sposnsors']	= $event_sposnsors;

				$this->load_view('events/view2', 'single_event');
			}else{
				echo 'Page Not Found !'; exit;
			}
			
		}else{
			redirect('events');
		}
	}


	/**
	* api_rate_events()
	* accepts GET values : rate_value and event_id
	* inserts rate_value for the event_id for the current user
	* false if not logged in
	* false if already voted for the event
	*/
	function api_rate_events() {

		$userId = $this->ion_auth->get_user_id();

		if($userId) {
			if(isset($_GET['rate_value']) && $_GET['rate_value'] != '') {
				$rate = $_GET['rate_value'];
			}

			if(isset($_GET['event_id']) && $_GET['event_id'] != '') {
				$event_id = $_GET['event_id'];
			}

			if($rate && $event_id) {
				//check if already voted
				$chk = $this->event_model->check_if_already_voted($userId, $event_id);
				if(!$chk) {
					//if not voted already , cast the vote
					$vote_array = array(
						'event_id' 	=> $event_id,
						'rate' 		=> $rate,
						'user_id'	=> $userId,
						'voted_at'	=> date('Y-m-d H:i:s'),
					);

					if($this->db->insert('event_ratings', $vote_array)) { 
						return true;
					}
				}

			}
		}
		return false;
		
	}


	/**
	* write_review()
	* only registered customers can write reviews
	*/

	function write_review($slug) {
		//check if user is logged in and is customer type
		$user_id 	= $this->ion_auth->get_user_id();

		$event_id 	= $this->event_model->get_event_id_from_slug($slug);

		if($user_id && $event_id) { 
			//if user id is valid, get the user group. Only customers can write review
			$group_id = $this->ion_auth->get_users_groups()->row()->id;
			//verify if user is customer
			if($group_id == $this->config->item('customer_group_id')) { 
				$this->data['slug'] = $slug;
				$this->load_view('events/write_review');
			}else{
				redirect('users/login');
			}
		}
	}

	function post_review() {
		$this->form_validation->set_rules($this->event_model->create_event_review_validation);

		if($this->form_validation->run()) {
			$user_id 	= $this->ion_auth->get_user_id();

			$event_id 	= $this->event_model->get_event_id_from_slug($this->input->post('slug'));

			$event_review_data = array(
				'user_id'		=> $user_id,
				'event_id'		=> $event_id,
				'title' 		=> $this->input->post('title'),
				'review'		=> $this->input->post('review'),
				'added_on' 		=> date('Y-m-d H:i:s'),
			);

			if($this->db->insert('event_reviews', $event_review_data)) {
				redirect('events/view/'.$this->input->post('slug'));
			}
		}
	}

	/**
	* function to update the database status
	* a/c to payment gateway status
	*/
	public function payment_status() {
		//update databse
		//redirect to payment success/ failure
	}

	public function api_set_default_city() {
		if(isset($_GET['city_id']) && $_GET['city_id'] != '') {
			$city_id = $_GET['city_id'];
			$city_info = $this->city_model->get_city_info($city_id);

			$city_name = $city_info->name;

			$cookie = array(
				'name'   => 'city',
				'value'  => $city_name,
				'expire' => time()+86500,
				'secure' => false
				);
			set_cookie($cookie);

			echo TRUE;
		}
		
	}

	public function view_all_events() {
		//get the event manager details
		$events = $this->event_model->get_all_events_admin();
		$this->data['events'] = $events;
		$this->load_view('events/view_all_events', 'admin');
	}

	public function api_change_status() {
		if(isset($_GET['apprv']) && $_GET['apprv'] != '') {
			$apprv = $_GET['apprv'];

			$arr = explode('__', $apprv);

			$event_id = $arr[1];
			$req      = $arr[0];

			if($req == 'approve_accepted') {
				$data = array(
	               'status' => 1
	            ); 
			}else if($req == 'approve_rejected') {
				$data = array(
	               'status' => 0
	            );
			}

			$this->db->where('id', $event_id);
			
			if($this->db->update('events', $data)) {
				echo 1; exit;
			}

		}

		echo 0;
		exit;
	}

	public function api_make_sposnored() {
		if(isset($_GET['sponsor']) && $_GET['sponsor'] != '') {
			$sponsor = $_GET['sponsor']; 

			$arr = explode('__', $sponsor);

			$event_id = $arr[1];
			$req      = $arr[0];

			if($req == 'sponsored') {
				$data = array(
	               'sponsored' => 1
	            ); 
			}

			$this->db->where('id', $event_id);
			
			if($this->db->update('events', $data)) {
				echo 1; exit;
			}

		}

		echo 0;
		exit;
	}



}