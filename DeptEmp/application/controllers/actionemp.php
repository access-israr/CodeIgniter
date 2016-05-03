<?php
class actionemp extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		//load the employee model
		$this->load->model('emp_model');
	}

	//index function
	function index()
	{
		//get the employee list
		if (isset($_SESSION['id'])){
		$data['emp_list'] = $this->emp_model->getemplist();
		$this->load->view('actionemp_view', $data);
		}
		else {echo "You are not Authorized!";}
		
	}

	//delete employee record from db
	function deleteemp($id)
	{
		//delete employee record
		//$this->db->where('employee_id', $id);
		//$this->db->delete('tbl_employee');
		$this->emp_model->deleteemp($id);
		redirect('actionemp');
	}
	
	function logout()
	{
		unset($_SESSION['id']);
		session_destroy();
		redirect('login');
	}
}
?>