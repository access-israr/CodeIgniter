<?php 
	
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add New Designation</title>
<!--link the bootstrap css file-->
<link href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
<!-- link jquery ui css-->
<link href="<?php echo base_url('assets/jquery-ui-1.11.2/jquery-ui.min.css'); ?>" rel="stylesheet" type="text/css" />
		<!--include jquery library-->
		<script src="<?php echo base_url('assets/js/jquery-1.10.2.js'); ?>"></script>
		<!--load jquery ui js file-->
		<script src="<?php echo base_url('assets/jquery-ui-1.11.2/jquery-ui.min.js'); ?>"></script>

		<style type="text/css">
		.colbox {
				margin-left: 0px;
				margin-right: 0px;
				}
				</style>
				
				</head>
					<body>
					<br>

					<div class="container">
					<div class="row">
							<div class="col-md-6 col-md-offset-3 well">
        <legend>New Designation Details</legend>
        <?php
        $attributes = array("class" => "form-horizontal", "id" => "employeeform", "name" => "employeeform");
        		echo form_open("adddesig", $attributes);?>
        <fieldset>
            <div class="form-group">
            <div class="row colbox">
            <div class="col-md-4">
                <label for="employeename" class="control-label">Designations</label>
            </div>
            <div class="col-md-8">
            <?php
                $attributes = 'class = "form-control" id = "departmentid"';
                for ($i = 0; $i < count($designation); $i++){
                	$ndesig[]= $designation[$i]->designame;}
                echo form_dropdown('designationname',$ndesig,set_value('designation', $ndesig),$attributes);?>
                <span class="text-danger"><?php echo form_error('designation'); ?></span>
            </div>
            </div>
            </div>
            
            <div class="form-group">
            <div class="row colbox">
            <div class="col-md-4">
                <label for="designation" class="control-label">New Desig. ID</label>
            </div>
            <div class="col-md-8">
                <input id="ndesignationid" name="ndesignationid" placeholder="ndesignationid" type="text" class="form-control"  value="<?php echo set_value('ndesignationid'); ?>" />
                <span class="text-danger"><?php echo form_error('ndesignationid'); ?></span>
            </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row colbox">
            <div class="col-md-4">
                <label for="designation" class="control-label">New Desig. Name</label>
            </div>
            <div class="col-md-8">
                <input id="ndesignationname" name="ndesignationname" placeholder="ndesignationname" type="text" class="form-control"  value="<?php echo set_value('ndesignationname'); ?>" />
                <span class="text-danger"><?php echo form_error('ndesignationname'); ?></span>
            </div>
            </div>
            </div>
            
            <div class="form-group">
            <div class="col-sm-offset-4 col-md-8 text-left">
                <input id="btn_update" name="btn_update" type="submit" class="btn btn-primary" value="Insert" />
                <input id="btn_reset" name="btn_reset" type="reset" class="btn btn-info" value="Reset" />
                <a href="<?php echo base_url(). "emp"; ?>" class="btn btn-info">Cancle</a>
            </div>
            </div>
        </fieldset>
        <?php echo form_close(); ?>
        <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>
</div>
</body>
</html>
<?php  ?>