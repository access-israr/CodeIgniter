<?php
class login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('emp_model');
	}
	function index()
	{
		//set validation rules
		
		$this->form_validation->set_rules('username', 'UserName', 'trim|required|callback_alpha_only_space');
		$this->form_validation->set_rules('password', 'Password', 'required');
				
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('login_view');
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = $this->emp_model->login($username , $password);
			
			if ( $data){
				foreach($data as $row){
			$_SESSION['id']= $row->empname;}
			//echo $_SESSION['id'];
			redirect('actionemp');
			//print_r($data['login']);
			
			}
			else {
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Please enter correct Username and/or Password</div>');
				$this->load->view('login_view');
			}
		}
	}
	
	//custom validation function for dropdown input
	function combo_check($str)
	{
		if ($str == '-SELECT-')
		{
			$this->form_validation->set_message('combo_check', 'Valid %s Name is required');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	//custom validation function to accept only alpha and space input
	function alpha_only_space($str)
	{
		if (!preg_match("/^([-a-z ])+$/i", $str))
		{
			$this->form_validation->set_message('alpha_only_space', 'The %s field must contain only alphabets or spaces');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
}