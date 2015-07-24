<?php
class Vendor_stores extends MY_Controller {
	public function __construct() {
		parent::__construct();
	
		$this->load->model('vendor_model');
		$this->load->model('user_model');
	
		$this->load->model('city_model');
		$this->load->model('vendor_category_model');
		$this->load->model('vendors_category_model');
		$this->load->model('catering_categories_model');
		$this->load->model('cateror_service_types_model');


		$this->load->model('catering_categories_model');
	
	}
	public function add_service()
	{
		//redirect if not logged in
		if(!$this->check_vendor()) {
			redirect('users/login');
		}
		  $category = $this->vendor_category_model->dropdown($value = 'name');
            $this->data['category'] = $category;
		$user_id = $this->ion_auth->get_user_id();
		$vendor_details = $this->vendor_model->get_with_user_details($user_id);
		$vendor_id=$vendor_details[0]->vendor_id;
		if($user_id) {
			$service_data = array(
					
					'vendor_id' 		  => $vendor_id,
				
					'vendor_category_id'  => $this->input->post('category_id'),
					'type_name' 				  => $this->input->post('name'),
					'rate' 	          => $this->input->post('price'),
					
					
					
					
				);
				dump($service_data);
				if($this->db->insert('vendor_services', $service_data)){
					redirect('vendors/service');
				}
	      }
  }


  

  //category add by admin
  public function add()
 	  {
		if($this->ion_auth->is_admin()) {
			
			//$this->load_view('category/add_category' ,'admin');
			//dump($_POST);
			$category_data = array(
					
					'name' 	=> $this->input->post('name'),
				
				);
			
				if($this->db->insert('vendor_categories', $category_data))
				   {

					//if the profile has been created, log in the user and redirect to home
					redirect('vendors/add_category');
                    }

	        }
		
        }









    



      //caterriing information register form
      public function add_cateror_details() {
      	
      	if(!$this->check_vendor()) {
			redirect('users/login');
		}
		 //Validate the form
		//$this->form_validation->set_rules($this->user_model->catering_information_validation); 


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
    




     ///photo studio information fOrm
	  public function add_photo_studio() {
      	
      	if(!$this->check_vendor()) {
			redirect('users/login');
		}
		 //Validate the form
		$this->form_validation->set_rules($this->user_model->catering_information_validation); 
        $user_id = $this->ion_auth->get_user_id();
		$cateror_service_types = $this->cateror_service_types_model->get_cateror_service();
		$this->data['cateror_service_types'] = $cateror_service_types;
		$vendor_details = $this->vendor_model->get_with_user_details($user_id);
		$vendor_id=$vendor_details[0]->vendor_id;
		//dump($vendor_details->vendor); 

		if($this->input->post('addSubmit')) {

			

			$types_of_function = implode(',',$this->input->post('function'));

			$category_data     = array(
				'vendor_id' 	            => $vendor_id,
				'name' 	                    => $this->input->post('name'),
				'address' 	                => $this->input->post('address'),
				'contact_number' 	        => $this->input->post('contact_number'),
				'email' 	                => $this->input->post('email'),
				'area_cover' 	            => $this->input->post('area'),
				'types_of_function' 	    =>$types_of_function, 
				'time_taken' 	            => $this->input->post('time'),
				'cost_per_picture' 	        => $this->input->post('cost_picture'),
				'cost_per_video' 	        => $this->input->post('cost_video'),

			);

			if(($this->db->insert('vendor_photo_studio_information', $category_data) ))
			   {
				//if(foreach($item_name_,))
					
			   //if the profile has been created, log in the user and redirect to home
				redirect('vendors/photo_studio');
			  }
			    
		}else{
				 $this->load_view('vendors/add_photo_studio' ,'vendor');
			
		     }
	}




   // VENUE INFORMATION FORM REGISTER 
	  public function register_venue_information() {
      	
      	if(!$this->check_vendor()) {
			redirect('users/login');
		}
		 //Validate the form
		//$this->form_validation->set_rules($this->user_model->catering_information_validation); 


		$user_id = $this->ion_auth->get_user_id();
		$cateror_service_types = $this->cateror_service_types_model->get_cateror_service();
		$this->data['cateror_service_types'] = $cateror_service_types;
		$vendor_details = $this->vendor_model->get_with_user_details($user_id);
		$vendor_id=$vendor_details[0]->vendor_id;

		if($this->input->post('addSubmit')) {

			$website = '';

			if(isset($this->input->post('website')) && $this->input->post('website') != '') {
				$website = $this->input->post('website');
			}
			

			$types_of_function = implode(',',$this->input->post('function'));

			$category_data     = array(
				'vendor_id' 	            => $vendor_id,
				'venue_name' 	            => $this->input->post('venue_name'),
				'address' 	                => $this->input->post('venue_address'),
				'contact_number' 	        => $this->input->post('venue_number'),
				'email' 	                => $this->input->post('email'),
				'capacity' 	                => $this->input->post('venue_capacity'),
				'venue_types' 	            => $this->input->post('venue_types'), 
				'per_day' 	                => $this->input->post('perday'),
				'per_plate' 	            => $this->input->post('perplate'),
				'per_hour' 	                => $this->input->post('perhour'),
				'hall_rent' 	            => $this->input->post('hallrent'),
				'venue_description' 	    => $this->input->post('venue_description'),
				'venue_diagram' 	        => $this->input->post('logo'),
				'venue_suited_for' 	        => $types_of_function, 
				'room' 	                    => $this->input->post('rooms'),
				'ac' 	                    => $this->input->post('ac'),
                'parking' 	                => $this->input->post('parking'),
				'parking_capacity' 	        => $this->input->post('parking_capacity'),
				'wifi' 	                    => $this->input->post('wifi'),
				'alcohol' 	                => $this->input->post('alcohol'),
				'catering' 	                => $this->input->post('catering'),
				'outside_catering' 	        => $this->input->post('outsidecatering'),
				'hall_dimensions' 	        => $this->input->post('halldimensions'),
				'decoration_service' 	    =>$this->input->post('decorationservice'), 
				'cost' 	                    => $this->input->post('cost'),
				'outside_decoration' 	    => $this->input->post('outsidedecoration'),
				'distance_airport' 	        => $this->input->post('airport'),
				'distance_bus_stand' 	    => $this->input->post('bus_stand'),
				'website' 	                => $website,
 
			);

			if(($this->db->insert('vendor_venue_information', $category_data) ))
			{
				if( $vendor_id) {
									$counter = $this->input->post('counter');
						            
						           //dump($item_name);

					                 for($i = 1; $i <= $counter; $i++ ):
					                     $menu_data=array(
					                	'vendor_id' 	 => $vendor_id,
				                        'item_name' 	 => $this->input->post('item_name_'.$i),
				                        'price' => $this->input->post('item_price_'.$i),
                                        
					                	 );
					             	
                                    $this->db->insert('venue_catering_menu', $menu_data);
                                    endfor;
                                    //dump($menu_data);
						           }
						       }   

					 //if the profile has been created, log in the user and redirect to home
				redirect('vendors/venue_information');
			    
		}else{
				 $this->load_view('vendors/add_venue_information', 'vendor');
			
		}
	}


}