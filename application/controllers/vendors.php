<?php
class Vendors extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('cart');
		$this->load->helper("url");
		$this->load->library("pagination");
		$this->load->model('vendor_model');
		$this->load->model('state_model');
		$this->load->model('city_model');
		$this->load->model('vendor_category_model');
		$this->load->model('vendors_category_model');
		$this->load->model('vendor_view');
		$this->load->model('cateror_service_types_model');
		$this->load->model('vendor_service');
		$this->load->model('vendor_image_model');
        $this->load->model('catering_categories_model');
		$this->load->helper("text");
		
		$this->load->model('vendor_venue_information_model');
		$this->load->model('venue_type');
		$this->load->model('venue_catering_menu_model');
		$this->load->model('venue_special_offer_model');
		$this->load->model('vendor_catering_service_information_model');

		$this->load->model('cateror_menu_model');
		$this->load->model('catering_special_offer_model');

		$this->load->model('vendor_photo_studio_information_model');
		$this->load->model('studio_equipment_model');
		$this->load->model('studio_special_offer_model');


	}
	
	/**
	* Add a vendor only by admin
	* For sends data to users/add
	*/
	
	public function add() {
		//check if admin
		if($this->ion_auth->is_admin()) {
			$states = $this->state_model->dropdown($value = 'name');
			$this->data['states'] = $states;

			$cities = $this->city_model->dropdown($value = 'name');
			$this->data['cities'] = $cities;



			$vendor_categories = $this->vendor_category_model->dropdown($value = 'name');
			$this->data['vendor_categories'] = $vendor_categories;
			$this->load_view('vendors/add', 'admin');
		}else{
			redirect('users/login');
		}
	}

	





  function search($category_slug = NULL) {
		if($category_slug != NULL) {
			$cities = $this->city_model->dropdown($value = 'name');
			$this->data['cities'] = $cities;

			//Conver the slug to vendor name
			$category_slug = trim($category_slug);
			$category_name = str_replace('-', ' ', $category_slug);


			$category_id = $this->vendor_category_model->get_category_id($category_name);

			$get_all_vendors = array();
			if(!empty($category_id)) {
				$category_id = $category_id[0]->id;
				$get_all_vendors = $this->vendors_category_model->vendor_with_category_details($category_id);
			}
			
			//dump($get_all_vendors);
			$this->data['vendors'] = $get_all_vendors;
			$this->load_view('vendors/search');
		}
		
	}



//to view vendor search details
	function view_details($slug){
		
	    $vendor_details = $this->vendor_model->get_vendor($slug);
        $vendor = $this->vendor_model->get_with_user_details($vendor_details[0]->user_id);
        $this->data['details'] = $vendor;
		$this->load_view('vendors/search_details');
		   
        
	}

	function clr() {
		$this->session->unset_userdata('vendordata');	
	}

	/**
	* remove_bid()
	* @parameters vendor_id
	* accepts GET variable from AJAX, removes the venors from 
	* all vendors cart of the customer
	* @return TRUE if session is unset
	* FALSE otherwise
	*/

	function remove_bid(){
		if(isset($_GET['id']) && $_GET['id'] != '') {
			$id = $_GET['id'];
			$id = intval($id);
	        $vendordata  = $this->session->userdata('vendordata'); 
	    	unset($vendordata[$id]);
	    	$this->session->set_userdata('vendordata',  $vendordata);
	       	return TRUE;
		}else{
			return FALSE;  
		}
    	  
	}
	//add to bid in session
	function add_bid($vendor_id = NULL) 
     {
/*
      if(!$this->ion_auth->is_admin()) {

			redirect('users/login');
			exit;
		}*/
        if($vendor_id != NULL) {
        	$addedvendordata     = $this->session->userdata('vendordata'); //dump($addedvendordata); 

	        $already_exists = FALSE;
	        if(!empty($addedvendordata)) {
	        	
	        	foreach( $addedvendordata as $vdata) {
	        		//dump($vdata);
		        	if($vendor_id == $vdata['id']) {
		        		$already_exists = TRUE;
		        	}
		        }
	        }
	        

	        if(!$already_exists) {
	        	$vendor_data         = $this->vendor_model->get_vendor_details($vendor_id);
	        	//dump($vendor_data);
		        if(!empty($vendor_data)) {	

			        $vendor_id           = $vendor_data[0]->id;
			        $vendor_name         = $vendor_data[0]->name;
			        $price               = $vendor_data[0]->price;

			        $addedvendordata[] = array(
		                'id'           => $vendor_id,
		                'name'         => $vendor_name,
		                'price'        => $price,
			        );

			        $this->session->set_userdata('vendordata',  $addedvendordata);
		        }
	        }
        }
        redirect('vendors/view_cart');
   /* }else{
    	 redirect('users/login');
      }*/
	}


	function view_cart() {
		$bid_data  = $this->session->userdata('vendordata'); 
		//dump($bid_data);
		$this->data['details'] = $bid_data;	
		$this->load_view('vendors/view_cart');
	}



function addevents() {
	if($this->ion_auth->is_admin()) {
			$states = $this->state_model->dropdown($value = 'name');
			$this->data['states'] = $states;

			$cities = $this->city_model->dropdown($value = 'name');
			$this->data['cities'] = $cities;

		
		$this->load_view('events/add');
		}else{
			redirect('users/login');
		}
	}





	










    function view() {
		
		//Check if user is admin
		if($this->ion_auth->is_admin()) {
			
			$config["base_url"] = base_url() . "vendors/view";
			$config["total_rows"] = $this->vendor_view->record_count();
			$config["per_page"] = 2;
			$config["uri_segment"] = 3;
			
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = round($choice);
	 
			$this->pagination->initialize($config);
	 
			$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
			$data["results"] = $this->vendor_view
			  ->fetch_vendors($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			
			/*$all_vendors = $this->vendor_model->get_with_user_details(); //var_dump($all_vendors);
			$this->data['vendors'] = $all_vendors;*/
			$this->data['results'] 	= $data["results"];
			$this->data['links'] 	= $data["links"];
			$this->load_view('vendors/view', 'admin');
		}else{
			redirect('users/login');
		}
		

	}





      
	public function view_services() {

		//redirect if not logged in
		if(!$this->check_vendor()) {
			redirect('users/login');
		}
		
		$user_id = $this->ion_auth->get_user_id();
		
		$vendor_details = $this->vendor_model->get_with_user_details($user_id);
		$this->data['details'] = $vendor_details[0];
        $vendor_service_details = $this->vendor_service->get_with_service_details($vendor_details[0]->vendor_id);
		$this->data['services'] = $vendor_service_details;
		$this->load_view('vendors/view_services', 'vendor');
		
	  }




    

	function information($user_id){
		if($this->ion_auth->is_admin()) {
			
		 $vendor_details = $this->vendor_model->get_with_user_details($user_id);
		 $this->data['details'] = $vendor_details[0];
         $this->load_view('vendors/viewdetails', 'admin');
		   
        }
	}




	

	///*delete vendors
       function trash($user_id){
			if($this->ion_auth->is_admin()) {
				$q1 = $this->db->query("delete from vendors where user_id = $user_id");
				   if($q1){
				   	    $this->load->helper('url');
	                    redirect('vendors/vendor');

	                }else{
						$this->load->helper('url');
						redirect('vendors/view');

	                }
            }
        }   




	

	public function profile($edit = NULL) {

		//redirect if not logged in
		if(!$this->check_vendor()) {
			redirect('users/login');
		}
		$states = $this->state_model->dropdown($value = 'name');
		$this->data['states'] = $states;
        $cities = $this->city_model->dropdown($value = 'name');
	    $this->data['cities'] = $cities;
		$user_id = $this->ion_auth->get_user_id();
		//echo $user_id;
		$vendor_details = $this->vendor_model->get_with_user_details($user_id);
		//dump($vendor_details);
		$this->data['details'] = $vendor_details[0];
        $vendor_category_details = $this->vendors_category_model->get_vendor_category_details($vendor_details[0]->vendor_id);
		$this->data['categories'] = $vendor_category_details;
		
		
		
		
		//if the request is not edit
		if($edit == NULL) {
			//Set subview and load layout profile view
			$this->load_view('vendors/profile', 'vendor');
		//if edit is set 
		}else if($edit == 'edit') {
			//Set subview and load layout profile edit
			$this->load_view('vendors/edit_profile', 'vendor');
		}
		
		//$this->load->view('vendors/profile', 'vendor');
		
		
		
}

	public function vendorpanel(){

		//redirect if not logged in
		if(!$this->check_vendor()) {
			redirect('users/login');
		}
		$this->load_view('vendors/vendorpanel', 'vendor');

	}

   //edit vendor profile
	public function edit_vendor_profile() {

		$slug = strtolower(str_replace(' ','-', trim($this->input->post('name'))));


		 $config = array(
			'upload_path' => 'uploads/vendors/logos',
			'allowed_types' => 'gif|jpg|png|jpeg',
			'max_size' => 1024,
		);
		$this->load->library('upload', $config);
		$check_file_upload = FALSE;

		if(isset($_FILES['new_avatar']['error']) && $_FILES['new_avatar']['error'] != 4 && $_FILES['new_avatar']['name'] != '') { //check if not UPLOAD_ERR_NO_FILE
			$check_file_upload = TRUE;
		}

		$image_path = '';
		if($check_file_upload) {
			if($this->upload->do_upload('new_avatar')) {

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
					redirect('vendors/profile/edit');
				}		
				
				$logo_path = $new_file_name;
			}else{
				$error = array('error' => $this->upload->display_errors());
				$this->session->set_flashdata('error_message', $error['error']);
				redirect('vendors/profile/edit');
			}
			$image_path 	= $logo_path;
			
		}else{
			if($this->input->post('logo_path') !== null) {
				$image_path = $this->input->post('logo_path');
			}
		}	


		//Featured Image Upload
		//upload and crop featured image
			$featured_image_name 		= '';

			

			if($_FILES['featuredimage']['name'] != '') {
				$featured_image_name 		= $slug;
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
								redirect('vendors/profile/edit');
							}
						 }
						 $featured_image_path 	= $featured_image_name;
					}else{
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error_message', $error['error']);
						redirect('vendors/profile/edit');
					}
				}else{
					$this->session->set_flashdata('error_message', 'Unable to upload featured image');
					redirect('vendors/profile/edit');
				}
			}else{
				if($this->input->post('featured_img_old') !== null) {
					$featured_image_path = $this->input->post('featured_img_old');
				}
			}
			
		
      // dump($_POST);
		$vid = $this->input->post('vid');

		$vendor_profile = array(
			'name'            => $this->input->post('name'),
			'slug'			  => $slug,	
			'contact_number'  => $this->input->post('contact_number'),
			'address'         => $this->input->post('address'),
			'state_id'        => $this->input->post('state_id'),
			'city_id'         => $this->input->post('city_id'),
			'pin'             => $this->input->post('pin'),
			'logo'            => $image_path,
			'featured_img'	  => $featured_image_path,
			
		);

		if($this->vendor_model->update($vid, $vendor_profile)) {
			//dump($_POST);
			redirect('vendors/profile/');
		}
		else{

			//dump($_POST);
			redirect('vendors/profile/edit');

		}
	}





	//do the edit
	public function edit() {
		$customer_id = $this->input->post('id');

		$customer_profile = array(
			'first_name'    => $this->input->post('first_name'),
			
			'last_name'     => $this->input->post('last_name'),
			'mobile_number' => $this->input->post('mobile_number'),
			'address'       => $this->input->post('address'),
		);
		if($this->customer_profile_model->update($customer_id, $customer_profile)) {
			redirect('customers/profile');
		}
	}


	


	//View vendor images
	public function view_images() {

		//redirect if not logged in
		if(!$this->check_vendor()) {
			redirect('users/login');
		}

		$user_id = $this->ion_auth->get_user_id();
		$vendor_details = $this->vendor_model->get_with_user_details($user_id);
		$vendor_images = $this->vendor_image_model->get_vendor_images($vendor_details[0]->vendor_id);
		$this->data['vendor_images'] = $vendor_images;
        $this->load_view('vendors/view_images', 'vendor');
	}
     
    



     //add vendor categories

	 public function service() {

		//redirect if not logged in
		if(!$this->check_vendor()) {
			redirect('users/login');
		}
            $vendor_categories = $this->vendor_category_model->dropdown($value = 'name');
			$this->data['vendor_categories'] = $vendor_categories;
		    $this->load_view('vendors/add_vendor_service', 'vendor');
	}

    //catering form add by vendor
   
    public function vendor_catering($edit = NULL){
    	//redirect if not logged in
		if(!$this->check_vendor()) {
			redirect('users/login');
		}
		          $cateror_service_types = $this->cateror_service_types_model->get_cateror_service();
		          $this->data['cateror_service_types'] = $cateror_service_types;
		          $cateror_catering_types = $this->catering_categories_model->get_catering_for();
		          $this->data['cateror_catering_types'] = $cateror_catering_types;
		         
		          	//if the request is not edit
		if($edit == NULL) {
			//Set subview and load layout profile view
			 $this->load_view('vendors/add_vendor_cateror', 'vendor');
		//if edit is set 
		}else if($edit == 'edit') {
			//Set subview and load layout profile edit
			$this->load_view('vendors/edit_vendor_cateror', 'vendor');
		}
       }

       
   


    //venue information add by vendor 

       public function venue_information(){
    	//redirect if not logged in
		if(!$this->check_vendor()) {
			redirect('users/login');
		}

			$venue_types = $this->venue_type->dropdown($value = 'name');
			$this->data['venue_types'] = $venue_types;

			$cateror_service_types = $this->cateror_service_types_model->get_cateror_service();
			$this->data['cateror_service_types'] = $cateror_service_types;
			
			$cateror_catering_types = $this->catering_categories_model->get_catering_for();
			$this->data['cateror_catering_types'] = $cateror_catering_types;
			
			$this->load_view('vendors/add_venue_information', 'vendor');

		}



      

        //caterring service types add  by admin

     public function cateror_service_types()
 	  {
		if($this->ion_auth->is_admin()) {

			$this->load_view('vendors/add_cateror_services' ,'admin');
		}
	}
   





//to view cateror information registration form

     public function cateror_categories()
 	  {
		if($this->ion_auth->is_admin()) {
		
				

			$this->load_view('vendors/add_cateror_categories' ,'admin');
		}
	}
   




//to view photo studio information registration form

    public function photo_studio()
 	{
		if(!$this->check_vendor()) {
			redirect('users/login');
		}
		    $cateror_service_types = $this->cateror_service_types_model->get_cateror_service();
		    $this->data['cateror_service_types'] = $cateror_service_types;
			$this->load_view('vendors/add_photo_studio' ,'vendor');
		}

	// category add by vendor
      public function add_category()
 	  {
		if($this->ion_auth->is_admin()) {
		  //  $vendor_category_details = $this->vendors_category_model->get_vendor_category_details($vendor_details[0]->vendor_id);
		//$this->data['categories'] = $vendor_category_details;
			$this->load_view('category/add_category' ,'admin');
		}
	}


	

	//do photo upload
	public function upload_image() {

		$user_id = $this->ion_auth->get_user_id();
		$vendor_details = $this->vendor_model->get_with_user_details($user_id);
        $vendor_category_details = $this->vendors_category_model->get_vendor_category_details($vendor_details[0]->vendor_id);
		$this->data['categories'] = $vendor_category_details;
		$this->form_validation->set_rules($this->vendor_image_model->vendor_image_validation);
		$this->form_validation->set_rules('vendor_category_id', 'Category', 'trim|required');
        if($this->form_validation->run() == TRUE) {
			//Upload the image 
			//prepare file uplaod config array
			$config = array(
				'upload_path' => 'uploads/vendors/images',
				'allowed_types' => 'gif|jpg|png',
				'max_size' => 2048,
				'max_width' => 1920,
				'max_height' => 1080
			);
			$this->load->library('upload', $config);
			
			
			$check_file_upload = FALSE;
			if(isset($_FILES['image']['error']) && $_FILES['image']['error'] != 4) { //check if not UPLOAD_ERR_NO_FILE
				$check_file_upload = TRUE;
			}
			
			if($check_file_upload) {
				if($this->upload->do_upload('image')) {
					$upload_data = array('upload_data' => $this->upload->data());
					echo $path = $upload_data['upload_data']['file_name'];
					
					$vendor_image_array = array(
						'vendor_id' 			=> $vendor_details[0]->vendor_id,
						'vendor_store_id' 	    => $this->input->post('vendor_category_id'),
						'path'					=> $path
					);
					
					if($this->db->insert('vendor_images', $vendor_image_array)) {
						redirect('vendors/upload_image');
					}
				}else{
					$error = array('error' => $this->upload->display_errors());
					redirect('vendors/upload_image');
				}
			}
		}

		$this->load_view('vendors/upload_image', 'vendor');
	}


	public function change_vendor_status() {
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


	public function view_all_vendors() {
		$city_id = '';
		$city_info = $this->get_city_info(); 

		if($city_info) {
			$city_all_info = $this->city_model->get_city_info($city_id);
			$city_id = $city_info['city_id'];
			$city_name = $city_info['city_name'];

			$this->data['city_id'] 		= $city_id; 
			$this->data['city_name'] 	= $city_name;
		}

		$this->data['city_id'] = $city_id;
		$cities = $this->city_model->dropdown($value = 'name');
		$this->data['cities'] = $cities;

		$venue_vendors = $this->vendor_venue_information_model->get_venue_details($city_id);
		$this->data['venue_vendors'] = $venue_vendors;

		$catering_vendors = $this->vendor_catering_service_information_model->get_catering_details($city_id);
		$this->data['catering_vendors'] = $catering_vendors;

		$photo_vendors = $this->vendor_photo_studio_information_model->get_studio_details($city_id);
		$this->data['photo_vendors'] = $photo_vendors;


		//$venue_vendors = $this->vendor_venue_information_model->get_venue_details($city_id);
		//$this->data['venue_vendors'] = $venue_vendors;

		$this->load_view('vendors/view_all_vendors' ,'customer');

	}


	public function venue_details( $venue_slug = NULL ) {
		if($venue_slug != NULL) {
			$venue_id = $this->vendor_venue_information_model->venue_id_from_slug(trim($venue_slug));
			if($venue_id) {
				$venue_details = $this->vendor_venue_information_model->venue_info($venue_id);
				//dump($venue_details);

				$venue_catering_details = $this->venue_catering_menu_model->venue_catering_details($venue_id);

				//dump($venue_catering_details);

				$offers = $this->venue_special_offer_model->venue_offers($venue_id);

				$this->data['details'] = $venue_details;
				$this->data['venue_catering_details'] = $venue_catering_details;
				$this->data['offers'] = $offers;

				$this->load_view('vendors/view_venue_details' ,'customer');
			}else{
				redirect('vendors');
			}
		}else{
			redirect('vendors');
		}
	}


	public function catering_details($catering_slug = NULL) {
		if($catering_slug != NULL) {
			$catering_id = $this->vendor_catering_service_information_model->catering_id_from_slug(trim($catering_slug));
			if($catering_id) {
				$catering_details = $this->vendor_catering_service_information_model->catering_info($catering_id);
				//dump($venue_details);

				$cateror_menu_details = $this->cateror_menu_model->menu_details($catering_id);

				//dump($venue_catering_details);

				$offers = $this->catering_special_offer_model->catering_offers($catering_id);

				$this->data['details'] = $catering_details;
				$this->data['cateror_menu_details'] = $cateror_menu_details;
				$this->data['offers'] = $offers;
				

				$this->load_view('vendors/view_catering_details' ,'customer');
			}else{
				redirect('vendors');
			}
		}else{
			redirect('vendors');
		}
	}


	public function studio_details($studio_slug) {
		if($studio_slug != NULL) {

			$studio_id = $this->vendor_photo_studio_information_model->studio_id_from_slug(trim($studio_slug));
			if($studio_id) {
				$studio_details 			= $this->vendor_photo_studio_information_model->studio_info($studio_id);
				$equipments 				= $this->studio_equipment_model->view_all_equipments($studio_id);
				$offers 					= $this->studio_special_offer_model->studio_offers($studio_id);
				$this->data['details'] 		= $studio_details;
				$this->data['equipments'] 	= $equipments;
				$this->data['offers'] 		= $offers;
				

				$this->load_view('vendors/view_studio_details' ,'customer');
			}else{
				redirect('vendors');
			}
		}else{
			redirect('vendors');
		}
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


	
	
}