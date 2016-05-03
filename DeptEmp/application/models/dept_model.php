<?php
class dept_model extends CI_Model{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	//read the department list from db
	function getdeptlist()
	{
		$sql = 'select deptname, empname from dept, emp where emp.desig_id = 2 AND emp.dept_id = dept.id';
		$query = $this->db->query($sql);
		$result = $query->result();
		return $result;
	}
}