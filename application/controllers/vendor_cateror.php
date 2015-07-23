<?php
class Vendor_cateror extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('vendor_cateror_model');
		$this->load->helper("url");
		$this->load->library("pagination");
		$this->load->model('vendor_model');
		$this->load->model('user_model');
	
		$this->load->model('city_model');
		$this->load->model('vendor_category_model');
		$this->load->model('vendors_category_model');
		$this->load->model('catering_categories_model');
		$this->load->model('cateror_service_types_model');


		$this->load->model('catering_categories_model');
	}




 	public function index() {
		if(!$this->check_vendor()) {
			redirect('users/login');
		}
			
			$config["base_url"] = base_url() . "vendor_cateror/";
			$config["total_rows"] = $this->vendor_cateror_model->record_count();
			$config["per_page"] = 8;
			$config["uri_segment"] = 3;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = round($choice);
	        $this->pagination->initialize($config);
	        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
			$data["results"] = $this->vendor_cateror_model
			  ->fetch_cateror($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			
			/*$all_vendors = $this->vendor_model->get_with_user_details(); //var_dump($all_vendors);
			$this->data['vendors'] = $all_vendors;*/
			$this->data['results'] = $data["results"];
			$this->data['links'] = $data["links"];
			$this->load_view('cateror/view_cateror_information', 'vendor');
		  
		
	}




    //caterriing information register form
      public function add_cateror_details() {
      	
      	if(!$this->check_vendor()) {
			redirect('users/login');
		}
		 //Validate the form
		//$this->form_validation->set_rules($this->user_model->catering_information_validation); 
		$this->load_view('vendors/add_vendor_cateror', 'vendor');


		$user_id = $this->ion_auth->get_user_id();
		$cateror_service_types = $this->cateror_service_types_model->get_cateror_service();
		$this->data['cateror_service_types'] = $cateror_service_types;
		$cateror_catering_types = $this->catering_categories_model->get_catering_for();
		$this->data['cateror_catering_types'] = $cateror_catering_types;
        $vendor_details = $this->vendor_model->get_with_user_details($user_id);
		$vendor_id=$vendor_details[0]->vendor_id;
		//dump($vendor_details->vendor); 
		//dump($_POST);

		if($this->input->post('addSubmit')) {

			

			$types_of_function = implode(',',$this->input->post('function'));
			$catering_for      = implode(',',$this->input->post('chkUser'));

			$category_data     = array(
				'vendor_id' 	            => $vendor_id,
				'name' 	                    => $this->input->post('name'),
				'catering_for' 	            => $catering_for,
				'area_cover' 	            => $this->input->post('cateror_area_data'),
				'food_types' 	            => $this->input->post('types'),
				'provide_transportation' 	=> $this->input->post('transport'),
				'provide_waiter' 	        => $this->input->post('waiter'),
				'types_of_function' 	    => $types_of_function, 

			);
			//dump($_POST);

			if(($this->db->insert('vendor_catering_service_information', $category_data) ))
			{
				//if(foreach($item_name_,))
					if( $vendor_id) {
						//dump($_POST);
									$counter = $this->input->post('counter');
						            
						           //dump($item_name);

					                for($i = 1; $i <= $counter; $i++ ):
					                $menu_data=array(
					                	'vendor_id' 	 => $vendor_id,
				                        'item_name' 	 => $this->input->post('item_name_'.$i),
				                        'cost_per_plate' => $this->input->post('item_price_'.$i),
                                        
					                	);
					             	
                                    $this->db->insert('cateror_menu', $menu_data);
                                    endfor;
                                    //dump($menu_data);
						           }
			   
			  }   

					 //if the profile has been created, log in the user and redirect to home
				redirect('vendors/vendor_catering');
		}else{
				 $this->load_view('vendors/add_vendor_cateror', 'vendor');
			
		     }
	}
    

	//delete  a state
	  function trash($id){
		if($this->ion_auth->is_admin()) {
			 $q1=$this->db->query("delete from cities where id=$id");
			   if($q1){
			   	      $this->load->helper('url');
                      redirect('cities/');

                     /* redirect("vendors/vendor/");*/

                       }
                      else   {
                                   $this->load->helper('url');
                                   redirect('cities');

                             }
                       }
            }   


	public function add() {
		//check if admin
		if($this->ion_auth->is_admin()) {
			//Validate the form
			$this->form_validation->set_rules($this->city_model->city_validation);
		
			//Process the form
			if($this->form_validation->run() == TRUE) {
			
			
				//Check if city for the same state does not exists
				$check_if_city_exists = $this->city_model->check_if_city_exists($this->input->post('name'),$this->input->post('state_id'));
				if(!$check_if_city_exists) {
					//add to database
				//proceed if city does not exists
					$city_data = array(
						'state_id' 	=> $this->input->post('state_id'),
						'name' 		=> $this->input->post('name'),
					);
					if($this->db->insert('cities', $city_data)) {
						$this->session->set_flashdata('flash_message', array('message' => 'City has been added')); 
					}
				}else{
					$this->session->set_flashdata('flash_message', array('message' => 'City already exists !')); 
				}
				//redirect to city add page
				redirect('cities/add');
			}

			//Get all states
			
			$states = $this->state_model->dropdown($value = 'name');
			$this->data['states'] = $states;
			//$this->load->view('admin/common/admin_header');
		
		$this->load_view('cities/add','admin');
		//$this->load->view('admin/common/admin_footer');
			
		}else{
			redirect('users/login');
		}
	}
	
	
}