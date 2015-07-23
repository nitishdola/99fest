<?php
class Cateror_services extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper("url");
		$this->load->library("pagination");
		$this->load->model('state_model');
		$this->load->model('vendor_service');
		$this->load->model('cateror_service_types_model');
	}


//view all states with pagination
	public function index() {
		if($this->ion_auth->is_admin()) {
			
			$config["base_url"] = base_url() . "Cateror/view_service";
			$config["total_rows"] = $this->cateror_service_types_model->record_count();
			$config["per_page"] = 15;
			$config["uri_segment"] = 3;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = round($choice);
	        $this->pagination->initialize($config);
	        $page = ($this->uri->segment(3))? $this->uri->segment(3) : 0;
			$data["results"] = $this->cateror_service_types_model
			  ->fetch_vendors($config["per_page"], $page);
			$data["links"] = $this->pagination->create_links();
			
			/*$all_vendors = $this->vendor_model->get_with_user_details(); //var_dump($all_vendors);
			$this->data['vendors'] = $all_vendors;*/
			$this->data['results'] = $data["results"];
			$this->data['links'] = $data["links"];
			$this->load_view('Cateror/view_service', 'admin');
		}else{
			redirect('users/login');
		}
		
	}


function get_service($id){
		if($this->ion_auth->is_admin()) {
			
		 $details = $this->cateror_service_types_model->get_service($id);
		 $this->data['details'] = $details[0];
         $this->load_view('cateror/edit_cateror_services', 'admin');
		   
        }
	}


//edit state	

function edit_service($id){
		if($this->ion_auth->is_admin()) {
			
		          $id = $this->input->post('id');

		          $service = array(
			         'name'            => $this->input->post('name'),
			
			
		           );

		        if($this->cateror_service_types_model->update($id, $service)) {
			    //dump($_POST);
			    redirect('cateror_services/');
		        }
		          else{

			                   //dump($_POST);
			                  redirect('cateror_services/');

		               }
	        }else{
		                redirect('users/login');

	            }

		   
        
	    }
	


	
   //cateror service types add by vendor
    public function cateror_service_types()
 	  {
		if($this->ion_auth->is_admin()) {
			//Validate the form
			$this->form_validation->set_rules($this->vendor_service->service_validation);
		
			//Process the form
			if($this->form_validation->run() == TRUE) {
				//add to database
				$service_data = array(
					'name' => $this->input->post('name'),
				);
				if($this->db->insert('cateror_service_types', $service_data)) {
					//if the state has been added, redirect to state add page
					$this->session->set_flashdata('flash_message', array('message' => 'State has been added')); 
					redirect('cateror_services/cateror_service_types');
				}
			}
			$this->load_view('cateror/add_cateror_services', 'admin');
			
		}else{
			redirect('users/login');
		}
		//$this->load_view('states/add', 'admin');
	}

	         
 

          

          //delete  a state
	    function trash($id){
		if($this->ion_auth->is_admin()) {
			 $q1=$this->db->query("delete from cateror_service_types where id=$id");
			   if($q1){
			   	      $this->load->helper('url');
                      redirect('Cateror_services/');

                     /* redirect("vendors/vendor/");*/

                       }
                      else   {
                                   $this->load->helper('url');
                                   redirect('Cateror_services');

                             }
                       }
            }   





}