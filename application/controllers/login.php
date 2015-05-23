<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() 
	{
        parent::__construct();
    }

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('index');
	}
	public function register()
	{
		//VALIDATON
		$this->load->helper("form");
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('first_name', 'First Name', 'required|alfa|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|alfa|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|matches[confirm_password]|min_length[8]|alpha_numeric|callback_password_check');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('index');
		}
		//END VALIDATAION
		$newbies = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
					);

		$this->load->model('LoginDB');
		$this->LoginDB->add_user($newbies);

		$this->session->set_userdata('users' , $newbies);
		$this->load->view('welcome' , $newbies);
	}
	public function log_in()
	{
		$login = array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password')
					);
		// var_dump($login);
		// die();

		if ( (($login['email'] === '') && ($login['password'] === '')) || ($login['email'] === '') || ($login['password'] === '') )
		{
			redirect('/Login/error');
		}
		else
		{
			$this->session->set_userdata('existing_users' , $login);

			$this->load->model('LoginDB');
			$this->LoginDB->get_user($login);
		}
	}
	public function error()
	{
		$this->session->set_userdata('error' , "Please register first.");
		redirect('/');
	}

	public function logoff()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}

//end of main controller

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */