<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_oa2 extends CI_Controller
{
    public function session($provider_name)
    {
        $this->load->library('session');
        $this->load->helper('url_helper');

        $this->load->library('oauth2/OAuth2');
				$this->load->model('user_model');
				$this->load->config('oauth2', TRUE);

        $provider = $this->oauth2->provider($provider_name, array(
            'id' => $this->config->item($provider_name.'_id', 'oauth2'),
            'secret' => $this->config->item($provider_name.'_secret', 'oauth2'),
        ));


        if ( ! $this->input->get('code'))
        {
            // By sending no options it'll come back here
            $provider->authorize();
        }
        else
        {
            try
            {
                $token = $provider->access($this->input->get('code'));

                $user = $provider->get_user_info($token);
                	
                	if(!empty($user)) {


	                	$email 		= $user['email'];
		                $password 	= 'password';

		                $first_name = $user['first_name'];
		                $last_name	= $user['last_name'];



		                if(!$this->user_model->check_if_email_exists($email)) {


							$group_id = $this->config->item('customer_group_id');
						
							$user_id = $this->do_registration($email, $password, $group_id);
	
							//If user is created, insert the other details
							if($user_id) {
								$customer_data = array(
									'user_id' 		=> $user_id,
									'first_name' 	=> $first_name,
									'last_name' 	=> $last_name,
									'mobile_number' => '',
									'address' 		=> '',
								);
								if($this->db->insert('customer_profiles', $customer_data)) {
									//if the profile has been created, log in the user and redirect to home
									$this->ion_auth->login($email, $password);
									redirect('home');
								}
							}
						
						}else{
								$this->ion_auth->login($email, $password);
								redirect('home');
						}	
					}else{
						redirect('login');
					}

            }

            catch (OAuth2_Exception $e)
            {
                show_error('That didnt work: '.$e);
            }

        }
    }



    /**
	* Does actual registration of a user
	*/
	function do_registration($email = NULL, $password = NULL, $group_id = NULL) {
		$groups = array($group_id);
		$additional_data = array();

		$user_id = $this->ion_auth->register($email, $password, $email,$additional_data, $groups);
		return $user_id;
		
	}

	/**
	 * Send email message of given type (activate, forgot_password, etc.)
	 *
	 * @param	string
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	function _send_email($type, $email, &$data)
	{
		$this->load->library('email');
		$this->email->from($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->reply_to($this->config->item('webmaster_email', 'tank_auth'), $this->config->item('website_name', 'tank_auth'));
		$this->email->to($email);
		$this->email->subject(sprintf($this->lang->line('auth_subject_'.$type), $this->config->item('website_name', 'tank_auth')));
		$this->email->message($this->load->view('email/'.$type.'-html', $data, TRUE));
		$this->email->set_alt_message($this->load->view('email/'.$type.'-txt', $data, TRUE));
		$this->email->send();
	}

}

/* End of file auth_oa2.php */
/* Location: ./application/controllers/auth_oa2.php */