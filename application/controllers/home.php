<?php
if(!defined('BASEPATH')) exit('No direct script access  is allowed !');
class Home extends MY_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('event_model');

		$this->load->model('vendor_model');
	}

	public function index() {
		$this->load_view('home/index');
	}

	public function test() {
		$this->load->library('facebook');
		$this->load_view('home/test');
	}
	public function web_login()
	{

		$data['user'] = array();

		if ($this->facebook->logged_in())
		{
			$user = $this->facebook->user();

			if ($user['code'] === 200)
			{
				unset($user['data']['permissions']);
				$data['user'] = $user['data'];
			}

		}

		$this->load->view('examples/web', $data);
	}

	public function js_login()
	{
		$this->load->view('examples/js');
	}

	public function post()
	{

		header('Content-Type: application/json');

		$result = $this->facebook->publish_text($this->input->post('message'));
		echo json_encode($result);

	}

	public function logout()
	{
		$this->facebook->destroy_session();
		redirect('example/web_login', redirect);
	}

	/** 
	* function to check if slug exists for
	* events
	* vendors
	* if not redirect to 404 error
	*/
	public function check_path() {
		$slug = $this->uri->segment(1);
		//check if event exists
		$event_check = $this->event_model->get_event_id_from_slug($slug);
		if($event_check) {
			//redirect('events/view/'.$slug);
			redirect($slug);
		}else{
			redirect('page-not-found');
		}
	}

	public function not_found() {
		echo "NOT FOUND . 404 Error";
		
	}
}