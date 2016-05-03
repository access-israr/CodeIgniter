<?php
class emp extends CI_Controller
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
		$data['departments'] = $this->emp_model->getdept();
		$data['designations'] = $this->emp_model->getdesig();
		
		//set validation rules
		$this->form_validation->set_rules('employeeno', 'Employee No', 'trim|required|numeric');
		$this->form_validation->set_rules('employeename', 'Employee Name', 'trim|required|callback_alpha_only_space');
		$this->form_validation->set_rules('department', 'Department', 'callback_combo_check');
		$this->form_validation->set_rules('designation', 'Designation', 'callback_combo_check');
		$this->form_validation->set_rules('hireddate', 'Hired Date', 'required');
		$this->form_validation->set_rules('salary', 'Salary', 'required|numeric');
		
		if ($this->form_validation->run() == FALSE)
		{
			//fail validation
			$this->load->view('emp_view', $data);
		}
		else
		{
			//pass validation
			$data = array(
					'empno' => $this->input->post('employeeno'),
					'empname' => $this->input->post('employeename'),
					'dept_id' => $this->input->post('department'),
					'desig_id' => $this->input->post('designation'),
					'hireddate' => @date('Y-m-d', @strtotime($this->input->post('hireddate'))),
					'salary' => $this->input->post('salary'),
			);
		
			//insert the form data into database
			$this->emp_model->insertemp($data);
		
			//display success message
			//$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Employee details added to Database!!!</div>');
			redirect('actionemp');
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