<?php
	class Admin extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('default_image_model');
	}

	/**
	* View admin functions
	*/

	public function index($edit = NULL) {
		//redirect if not logged in
		if($this->ion_auth->logged_in() == FALSE) {
			redirect('users/login');
		}
		//Set subview and load layout profile edit
		//$this->load->view('admin/common/admin_header');
		
		$this->load_view('admin/index', 'admin');
		//$this->load->view('admin/common/admin_footer');
				
	}


	public function upload_default_image() {
		if($this->ion_auth->is_admin()) {

			if($this->input->post('addSubmit') != '') {
				$d_width 	= 1920;
				$d_height 	= 850;
				$type = $this->input->post('type');
				if($type == 1) {
					$_type = 'vendor';

					$d_width 	= 1900;
					$d_height 	= 600;


				}else{
					$_type = 'event';
				}

				//upload and crop featured image
				$featured_image_name 		= '';
				$featured_image_name 		= 'default-'.$_type.'-99-fest';
				$featured_image_info 		= new SplFileInfo($_FILES['featuredimage']['name']);
				$featured_image_extension 	= $featured_image_info->getExtension();


				$featured_image_name .= '_'.md5(time()).'.'.$featured_image_extension;
		        $config2 = array(
					'upload_path' 	=> 'uploads/default',
					'allowed_types' => 'gif|jpg|jpeg|png',
					'file_name'		=> $featured_image_name,
					'max_size' 		=> 2048,
				);

		        $this->load->library('upload', $config2);
				$this->upload->initialize($config2);
				

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
	            		$image_config['width'] = $d_width;
						$image_config['height'] = $d_height;
						


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
							$image_config['width'] 			= $d_width;
							$image_config['height'] 		= $d_height;

							 
							//$this->image_lib->clear();
							$this->image_lib->initialize($image_config); 
							 
							if (!$this->image_lib->crop()){
								$this->session->set_flashdata('error_message', 'Unable to crop featured image');
								redirect('add-default-image');
							}
						 }
						 $featured_image_path 	= $featured_image_name;
					}else{
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('error_message', $error['error']);
						redirect('add-default-image');
					}
				}else{
					$this->session->set_flashdata('error_message', 'Unable to upload featured image');
					redirect('add-default-image');
				}
				//prepare data to insert
				$data = array(
					'path' 	=> $featured_image_path,
					'type'	=> $_type,
				);

				if($this->db->insert('default_images', $data)) {
					$this->session->set_flashdata('success_message', 'Uploaded default featured image for '.$_type);
				}else{
					$this->session->set_flashdata('error_message', 'Unable to upload featured image');
				}

				redirect('add-default-image');

			}	
			$this->load_view('admin/upload_default_image', 'admin');
		}
	}


	public function view_default_image() {
		if($this->ion_auth->is_admin()) {
			$images = $this->default_image_model->get_all_images();
			
			$this->data['images'] = $images;
			$this->load_view('admin/view_default_image', 'admin');
		}
	}

	public function disable_default_image($id = NULL) {
		$image_update_date = array(
					'status' => 0,
				);

		if($this->default_image_model->update($id, $image_update_date)) {
			$this->session->set_flashdata('success_message', 'Updated featured image');
		}else{
			$this->session->set_flashdata('error_message', 'Unable to update featured image');

		}
		redirect('view-default-images');

	}

	public function enable_default_image($id = NULL) {
		$image_update_date = array(
					'status' => 1,
				);

		if($this->default_image_model->update($id, $image_update_date)) {
			$this->session->set_flashdata('success_message', 'Updated featured image');
		}else{
			$this->session->set_flashdata('error_message', 'Unable to update featured image');

		}
		redirect('view-default-images');

	}
}