<?php
class Messages extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('message');
		$this->load->library('pagination');
	}

	/**
	* Add a state, if state with same name exists in database
	* report .
	*/

	public function view() {
		//check if admin
		if($this->ion_auth->is_admin()) {
			//Validate the form
			
			$this->session->unset_userdata('searchterm');
		$config['base_url'] = base_url() . '/messages/index';
		$config['total_rows'] = $this->message->record_count();
		$config['per_page'] = 15;
		$config['uri_segment'] = 3;
		$choice = $config['total_rows']/$config['per_page'];
		$config['num_links'] = round($choice);		
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;

		$data['results'] = $this->message->fetch_countries($config['per_page'],$page);
		$data['links'] = $this->pagination->create_links();
		$this->load->view('admin/common/admin_header');
		
		$this->load->view('messages/index',$data);
		$this->load->view('admin/common/admin_footer');
		
				
			
			
		}else{
			redirect('users/login');
		}
	}

       function details($id)
		{
		if($this->ion_auth->is_admin()) 
		{

			$q1=$this->db->query("select * from messages where id=$id");
			 foreach($q1->result() as $r1)
			 {

			//$this->load->model('Vendor');
			//$messages = $this->Vendor->contact();
			//$data['messages'] = $messages;
			$this->load->view('admin/common/admin_header');
			$this->load->view('messages/messageview',$r1);
			$this->load->view('admin/common/admin_footer');
			
			
		}
		}
	}


	public function send() {
		if(isset($_GET['name']) && trim($_GET['name']) != '') {
			if(isset($_GET['email']) && trim($_GET['email']) != '') {
				if(isset($_GET['number']) && trim($_GET['number']) != '') {
					if(isset($_GET['message']) && trim($_GET['message']) != '') {
						$msg_data = array(
							'organization_name' => 'Guest',
							'name' 				=> trim($_GET['name']),
							'email' 			=> trim($_GET['email']),
							'contact_number' 	=> trim($_GET['number']),
							'message' 			=> trim($_GET['message']),
						);
						if($this->db->insert('messages', $msg_data)) {
							echo 1;
						}else{
							echo 0;
						}
					}
				}
			}
		}else{
			echo 0;
		}
		
	}


	public function sendmail() {
		// the message
		$msg = "First line of text\nSecond line of text";

		// use wordwrap() if lines are longer than 70 characters
		$msg = wordwrap($msg,70);

		// send email
		mail("nitish.dola@gmail.com","Sample Mail",$msg);
	}






}


