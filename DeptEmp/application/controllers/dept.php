<?php
class dept extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		//load the department_model
		$this->load->model('dept_model','deptmodel');
	}

	public function index()
	{
		//call the model function to get the department data
		$result = $this->deptmodel->getdeptlist();
		$data['deptlist'] = $result;
		//load the department_view
		$this->load->view('dept_view',$data);
	}
}