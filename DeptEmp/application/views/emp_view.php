<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert New Employee Details</title>
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
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript">
    //load datepicker control onfocus
    $(function() {
        $("#hireddate").datepicker();
    });
    </script>
    
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-offset-3 col-lg-6 col-sm-6 well">
        <legend>New Employee Details
          <a href="<?php echo base_url() . "adddept" ?>" class="btn btn-success btn-sm" >New Department</a>
          <a href="<?php echo base_url() . "adddesig" ?>" class="btn btn-success btn-sm" >New Designation</a>
        </legend>
        <?php 
        $attributes = array("class" => "form-horizontal", "id" => "employeeform", "name" => "employeeform");
        echo form_open("emp/index", $attributes);?>
        <fieldset>
            
            <div class="form-group">
            <div class="row colbox">
            
            <div class="col-lg-4 col-sm-4">
                <label for="employeeno" class="control-label">Employee No</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="employeeno" name="employeeno" placeholder="employeeno" type="text" class="form-control"  value="<?php echo set_value('employeeno'); ?>" />
                <span class="text-danger"><?php echo form_error('employeeno'); ?></span>
            </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="employeename" class="control-label">Employee Name</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="employeename" name="employeename" placeholder="employeename" type="text" class="form-control"  value="<?php echo set_value('employeename'); ?>" />
                <span class="text-danger"><?php echo form_error('employeename'); ?></span>
            </div>
            </div>
            </div>
            
            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="department" class="control-label">Department</label>
            </div>
            <div class="col-lg-8 col-sm-8">
            
                <?php
                $deattributes = 'class = "form-control" id = "department"';
                echo form_dropdown('department',$departments,set_value('department'),$deattributes);?>
                <span class="text-danger"><?php echo form_error('department'); ?></span>
            </div>
            </div>
            </div>

            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="designation" class="control-label">Designation</label>
            </div>
            <div class="col-lg-8 col-sm-8">
            
                <?php
                $dattributes = 'class = "form-control" id = "designation"';
                echo form_dropdown('designation',$designations, set_value('designation'), $dattributes);?>
                
                <span class="text-danger"><?php echo form_error('designation'); ?></span>
            </div>
            </div>
            </div>
                        			           
            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="hireddate" class="control-label">Hired Date</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="hireddate" name="hireddate" placeholder="hireddate" type="text" class="form-control"  value="<?php echo set_value('hireddate'); ?>" />
                <span class="text-danger"><?php echo form_error('hireddate'); ?></span>
            </div>
            </div>
            </div>
            
            <div class="form-group">
            <div class="row colbox">
            <div class="col-lg-4 col-sm-4">
                <label for="salary" class="control-label">Salary</label>
            </div>
            <div class="col-lg-8 col-sm-8">
                <input id="salary" name="salary" placeholder="salary" type="text" class="form-control" value="<?php echo set_value('salary'); ?>" />
                <span class="text-danger"><?php echo form_error('salary'); ?></span>
            </div>
            </div>
            </div>
            
            <div class="form-group">
            <div class="col-sm-offset-4 col-lg-8 col-sm-8 text-left">
                <input id="btn_add" name="btn_add" type="submit" class="btn btn-primary" value="Insert" />
                <input id="btn_reset" name="btn_reset" type="reset" class="btn btn-info" value="Reset" />
                <a href="<?php echo base_url(). "actionemp"; ?>" class="btn btn-info">Cancle</a>
            </div>
            </div>
        </fieldset>
        <?php echo form_close(); ?>
        <?php echo $this->session->flashdata('msg'); ?>
        </div>
    </div>
</div>
</body>

<script>
			
			//function demo() {
		          var select = document.getElementById("designation");
		          var texts = document.getElementById("demo");
		          
		          select.onchange = function(){
		        	  var val = select.options.value;
			          texts.innerHTML = " ";
		        	  if (select.options.value == 2) {
		 		             texts.innerHTML += '<div class="row colbox"><div class="col-lg-4 col-sm-4"><label for="salary" class="control-label">Salary</label></div><div class="col-lg-8 col-sm-8"><input id="salary" name="salary" placeholder="salary" type="text" class="form-control"/><span class="text-danger"></span></div></div>';
		 		          }
		        }
		       
		     </script>

</html>