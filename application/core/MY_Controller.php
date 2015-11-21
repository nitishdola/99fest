<?php
class MY_Controller extends CI_Controller {
public $data = array();
	function __construct() {
		parent::__construct();

		$this->load->model('city_model');

		$this->load->helper('cookie');

		$this->load->library('googlemaps');

		$this->load->helper(array('language', 'url', 'form', 'account/ssl'));
		//$this->load->library(array('account/authentication', 'account/authorization'));
		//$this->load->model(array('account/account_model'));

		//$this->lang->load('english', 'english');

		$this->set_city_cookie();

		//check for authentication
		//check for controller/action which does not require authenticatin
		$no_auth = array('users/login', 'users/register','welcome', 'home', 'vendors/search'); //prepare the array
		if($this->ion_auth->logged_in() == false &&  !in_array(uri_string(), $no_auth)) {
			//redirect('users/login');
		}
		
		$user_details = $this->ion_auth->user()->row();

		$this->data['login'] = FALSE;

		if(!empty($user_details)) {
			$group_id = $this->ion_auth->get_users_groups()->row()->id;
			
			$is_customer = FALSE; $is_admin = FALSE; $is_vendor = FALSE; $is_event_manager = FALSE;
			if($group_id == $this->config->item('customer_group_id')) {
				$is_customer = TRUE;
			}

			if($group_id == $this->config->item('admin_group_id')) {
				$is_admin = TRUE;
			}

			if($group_id == $this->config->item('vendor_group_id')) {
				$is_vendor = TRUE;
			}

			if($group_id == $this->config->item('event_group_id')) {
				$is_event_manager = TRUE;
			}


			$this->data['display_name'] = $this->get_display_name();
			
			$this->data['is_admin'] 	= $is_admin;
			$this->data['is_vendor'] 	= $is_vendor;
			$this->data['is_customer'] 	= $is_customer;
			$this->data['is_event_manager'] = $is_event_manager;

			$this->data['login'] = TRUE;
		}
	}


	/** 
	* Set subview and load default layout
	* @ params $subview
	*/
	public function load_view($subview, $type = NULL) {
		$this->data['subview'] = $subview;
		if($type == NULL) {
			$this->load->view('layouts/default_layout', $this->data);
		}else{
			$this->load->view('layouts/'.$type.'_layout', $this->data);
		}
		
	}
	
	/***
	* Get name based on user id and group
	*/
	function get_display_name() {

		$login = $this->ion_auth->logged_in();


		$group 			= $this->config->item('customer_group_id');

		$vendorgroup 	= $this->config->item('vendor_group_id');

		$admingroup 	= $this->config->item('admin_group_id');

		$eventgroup 	= $this->config->item('event_group_id');

		if($login && $this->ion_auth->in_group($group)) {

			$user_id = $this->ion_auth->get_user_id();
			$this->load->model('customer_profile_model');
			$userdata = $this->customer_profile_model->get_with_user_details( $user_id );
			return $userdata[0]->first_name;

		}else if($login && $this->ion_auth->in_group($admingroup)) { 
			
			return 'Admin';

		}else if($login && $this->ion_auth->in_group($vendorgroup)) {
			
			$user_id = $this->ion_auth->get_user_id();
			$this->load->model('vendor_model');
			$userdata = $this->vendor_model->get_with_user_details( $user_id );
			return $userdata[0]->name;

		}else if($login && $this->ion_auth->in_group($eventgroup)) {
			
			$user_id = $this->ion_auth->get_user_id();
			$this->load->model('event_manager_model');
			$userdata = $this->event_manager_model->get_with_user_details( $user_id );
			return $userdata[0]->company_name;

		}
	}

	/**
	* redirects a user to proper place after when the user logs in
	*/

	public function navigate_user() {
		
		$user_group_id = $this->ion_auth->get_users_groups()->row()->id;
		//if admin, redirect to admin page
		if($user_group_id == $this->config->item('admin_group_id')) {
			redirect('admin');
		//if the user is customer	
		}else if($user_group_id == $this->config->item('customer_group_id')) {
			redirect('home');
			//If the user is vendor
		}else if($user_group_id == $this->config->item('vendor_group_id')) {
			redirect('vendors/profile');
			//if the user is event manager
		}else if($user_group_id == $this->config->item('event_group_id')) {
			redirect('event_managers/profile');
		}
	}

	/**
	* function to check if logged in user is a vendor
	*/
	public function check_vendor() {
		$userId = $this->ion_auth->get_user_id();
		$user_group_id = $this->ion_auth->get_users_groups()->row()->id;
		if($user_group_id == $this->config->item('vendor_group_id')) {
			return TRUE;
		}
		return FALSE;
	}	

	/**
	* function to check if logged in user is a event manager
	*/
	public function check_event_manager() {
		$userId = $this->ion_auth->get_user_id();
		$user_group_id = $this->ion_auth->get_users_groups()->row()->id;
		if($user_group_id == $this->config->item('event_group_id')) {
			return TRUE;
		}
		return FALSE;
	}

	/**
	* Get city name from IP address and set to cookie city
	* API site : ipinfodb.com
	* Key      : defined in config
	*/

	public function set_city_cookie() {
		
		$ip = $this->get_client_ip();
		$city_name = '';
		if($ip != 'UNKNOWN' || $ip != '127.0.0.1') {
			$key 		= $this->config->item('ip_info_key');
			$ip_address = $ip;
			$ip_info 	= get_geolocation($ip_address); 

			 
			$city_name_data 	= $ip_info['city'];
			$city_name_data  	= explode(' ', $city_name_data);
			$city_name 			= $city_name_data[0];
			
			$cookie = array(
				'name'   => 'city',
				'value'  => $city_name,
				'expire' => time()+86500,
				'secure' => false
				);
			set_cookie($cookie);
		}
		
	}

	// Function to get the client IP address
	function get_client_ip() {
	    $ipaddress = '';
	    if (getenv('HTTP_CLIENT_IP'))
	        $ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
	        $ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
	        $ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
	        $ipaddress = getenv('REMOTE_ADDR');
	    else
	        $ipaddress = 'UNKNOWN';
	    return $ipaddress;
	}

	public function get_city_info() {
		$city_name = $this->input->cookie('city', TRUE);

		if($city_name) {
			$city_id = $this->city_model->get_city_id($city_name);

			if($city_id) {
				return array('city_id'=>$city_id,'city_name'=> $city_name);
			}
		}

		return false;
	}

	function base64_url_encode($input) {
	 return strtr(base64_encode($input), '+/=', '-_,');
	}

	function base64_url_decode($input) {
	 return base64_decode(strtr($input, '-_,', '+/='));
	}

}