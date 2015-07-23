<?php
class Catering_categories extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper("url");
		$this->load->library("pagination");
		$this->load->model('state_model');
		$this->load->model('catering_categories_model');
	}
//view all states with pagination
	public function index() {
		if($this->ion_auth->is_admin()) {
			
			$config["base_url"] = base_url() . "Cateror/view_cateror_categories";
			$config["total_rows"] = $this->catering_categories_model->record_count();
			$config["per_page"] = 15;
			$config["uri_segment"] = 3;
			
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = round($choice);
	 
			$this->pagination->initialize($config);
	 
			$page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
			$data["results"] = $this->catering_categories_model
			  ->fetch_vendors($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			
			/*$all_vendors = $this->vendor_model->get_with_user_details(); //var_dump($all_vendors);
			$this->data['vendors'] = $all_vendors;*/
			$this->data['results'] = $data["results"];
			$this->data['links'] = $data["links"];
			$this->load_view('Cateror/view_cateror_categories', 'admin');
		}else{
			redirect('users/login');
		}
		
	}

	//cateror catergories like breakfast lunch etc add
        

         public function add_cateror_categories()
         
		  {
		      if($this->ion_auth->is_admin()) {
			//Validate the form
			$this->form_validation->set_rules($this->catering_categories_model->categories_validation);
		
			//Process the form
			if($this->form_validation->run() == TRUE) {
				//add to database
				$service_data = array(
					'cname' => $this->input->post('cname'),
				);
				if($this->db->insert('catering_categories', $service_data)) {
					//if the state has been added, redirect to state add page
					$this->session->set_flashdata('flash_message', array('message' => 'Categories has been added')); 
					redirect('catering_categories/');
				}
			}
			$this->load_view('cateror/add_cateror_categories', 'admin');
			
		}else{
			redirect('users/login');
		}
		//$this->load_view('states/add', 'admin');
	}




function get_category($id){
		if($this->ion_auth->is_admin()) {
			
		 $details = $this->catering_categories_model->get_category($id);
		 $this->data['details'] = $details[0];
         $this->load_view('cateror/edit_cateror_categories', 'admin');
		   
        }
	}


//edit state	

function edit_categories($id){
		if($this->ion_auth->is_admin()) {
			
		          $id = $this->input->post('id');

		          $category = array(
			         'cname'            => $this->input->post('name'),
			
			
		           );

		        if($this->catering_categories_model->update($id, $category)) {
			    //dump($_POST);
			    redirect('catering_categories/');
		        }
		          else{

			                   //dump($_POST);
			                  redirect('catering_categories/');

		               }
	        }else{
		                redirect('users/login');

	            }

		   
        
	    }
	


        //delete  a state
	  function trash($id){
		if($this->ion_auth->is_admin()) {
			 $q1=$this->db->query("delete from catering_categories where id=$id");
			   if($q1){
			   	      $this->load->helper('url');
                      redirect('catering_categories/');

                     /* redirect("vendors/vendor/");*/

                       }
                      else   {
                                   $this->load->helper('url');
                                   redirect('catering_categories');

                             }
                       }
            }   

  

}