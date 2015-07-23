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
			$this->data['results'] = $data["results"];
			$this->data['links'] = $data["links"];
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
			 $q1=$this->db->query("delete from vendors where user_id=$user_id");
			   if($q1){
			   	      $this->load->helper('url');
                      redirect('vendors/vendor');

                     /* redirect("vendors/vendor/");*/

                       }
                      else   {
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
//dump($_POST); exit;
		 $config = array(
			'upload_path' => 'uploads/vendors/images',
			'allowed_types' => 'gif|jpg|png',
			'max_size' => 1024,
			'max_width' => 1920,
			'max_height' => 1080
		);
		$this->load->library('upload', $config);
		$check_file_upload = FALSE;

		if(isset($_FILES['new_avatar']['error']) && $_FILES['new_avatar']['error'] != 4) { //check if not UPLOAD_ERR_NO_FILE
			$check_file_upload = TRUE;
		}

			$image_path = '';
			if($check_file_upload) {
			
			
				if($this->upload->do_upload('new_avatar')) {
					$upload_data 	= array('upload_data' => $this->upload->data());
					$image_path 	= $upload_data['upload_data']['file_name'];
				}else{
					redirect('vendors/profile/edit');
				}
			}	
			
			
		
      // dump($_POST);
		$vid = $this->input->post('vid');

		$vendor_profile = array(
			'name'            => $this->input->post('name'),
			'contact_number'  => $this->input->post('contact_number'),
			'address'         => $this->input->post('address'),
			'state_id'        => $this->input->post('state_id'),
			'city_id'         => $this->input->post('city_id'),
			'pin'             => $this->input->post('pin'),
			'logo'            => $image_path,
			
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


	
	
}