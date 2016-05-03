<?php

class updateEmp extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('emp_model');
	}

	//index function
	function index($empno)
	{
		if (isset($_SESSION['id'])){
		$data['empno'] = $empno;

		//fetch data from department and designation tables
		$data['department'] = $this->emp_model->getdept();
		$data['designation'] = $this->emp_model->getdesig();

		//fetch employee record for the given employee no
		$data['emprecord'] = $this->emp_model->getemprecord($empno);

		//set validation rules
		$this->form_validation->set_rules('employeename', 'Employee Name', 'trim|required|callback_alpha_only_space');
		$this->form_validation->set_rules('department', 'Department', 'callback_combo_check');
		$this->form_validation->set_rules('designation', 'Designation', 'callback_combo_check');
		$this->form_validation->set_rules('hireddate', 'Hired Date', 'required');
		$this->form_validation->set_rules('salary', 'Salary', 'required|numeric');

		if ($this->form_validation->run() == FALSE)
		{
			//fail validation
			$this->load->view('updateemp_view', $data);
		}
		else
		{
			//pass validation
			$data = array(
					'empname' => $this->input->post('employeename'),
					'dept_id' => $this->input->post('department'),
					'desig_id' => $this->input->post('designation'),
					'hireddate' => @date('Y-m-d', @strtotime($this->input->post('hireddate'))),
					'salary' => $this->input->post('salary'),
			);

			//update employee record
			//$this->db->where('employee_no', $empno);
			//$this->db->update('tbl_employee', $data);
			$data['empname'] = "'".$data['empname']."'";
			$data['hireddate'] = "'".$data['hireddate']."'";
			$this->emp_model->updateemprecord($empno,$data);

			//display success message
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center">Employee Record is Successfully Updated!</div>');
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
?>