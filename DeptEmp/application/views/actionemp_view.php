<?php 
	
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee CRUD CMS</title>
    <!--link the bootstrap css file-->
    <link href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div style = "width:100%;">
        <div style= "float:left;width:300px;">
        <h4>List of Employees</h4>
        </div>
        <div style= "float:right;width:70px;">
        <a href="<?php echo base_url() . "actionemp/logout" ?>" class="btn btn-warning" >Logout</a>
        </div>
        <div style= "float:right;width:125px;">
        <a href="<?php echo base_url() . "emp" ?>" class="btn btn-success" >New Employee</a>
        </div>
        </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th>No.</th>
                        <th>Employee No.</th>
                        <th>Employee Name</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($emp_list); $i++) { ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td><?php echo $emp_list[$i]->empno; ?></td>
                        <td><?php echo $emp_list[$i]->empname; ?></td>
                        <td><?php echo $emp_list[$i]->deptname; ?></td>
                        <td><?php echo $emp_list[$i]->designame; ?></td>
                        <td>
                        <a href="<?php echo base_url() . "updateEmp/index/" . $emp_list[$i]->id; ?>" class="btn btn-info btn-xs">Update</a>
                        <a href="<?php echo base_url() . "actionemp/deleteemp/" . $emp_list[$i]->id; ?>" class="btn btn-danger btn-xs">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
<?php ?>