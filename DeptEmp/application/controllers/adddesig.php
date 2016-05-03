<?php
class adddesig extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('emp_model');
	}
	function index()
	{
		if (isset($_SESSION['id'])){
		//fetch data from department and designation tables
		$data['designation'] = $this->emp_model->getdesigrecord();
		
		//set validation rules
		$this->form_validation->set_rules('ndesignationid', 'nDesignation ID', 'trim|required|numeric');
		$this->form_validation->set_rules('ndesignationname', 'nDesignation Name', 'trim|required|callback_alpha_only_space');
				
		if ($this->form_validation->run() == FALSE)
		{
			//fail validation
			$this->load->view('adddesig_view', $data);
		}
		else
		{
			//pass validation
			$data = array(
					'id' => $this->input->post('ndesignationid'),
					'designame' => $this->input->post('ndesignationname'),
			);
		
			//insert the form data into database
			$this->emp_model->insertdesig($data);
			redirect('emp');
		}
		}
		else {echo "You are not Authorized!";}
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