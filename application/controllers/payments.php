<?php
class Payments extends MY_Controller {
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

		$this->load->file('application/libraries/payu.php', true);
	}

	public function failed() {
		$this->load_view('payments/failed', 'customer');
	}
}