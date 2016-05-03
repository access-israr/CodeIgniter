<html>
<head>
<title>Department List</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--link the bootstrap css file-->
<link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>">
</head>
<body>
<div class="container">
<div class="row">
		<div class="col-lg-12 col-sm-12">
		<h2><i>Departments</i></h2>
		<table class="table table-striped table-hover">
		<thead>
		<tr>
		<th>No.</th>
				<th>Department Name</th>
				<th>Head of Department</th>
				</tr>
				</thead>
				<tbody>
				<?php if ($deptlist){ 
				for ($i = 0; $i < count($deptlist); $i++) { ?>
                              <tr>
                                   <td><?php echo ($i+1); ?></td>
                                   <td><?php echo $deptlist[$i]->deptname; ?></td>
                                   <td><?php echo $deptlist[$i]->empname; ?></td>
                              </tr>
                         <?php } }else { ?>
                         	<h2> No Recod Found.</h2>
                        <?php }?>
                    </tbody>
               </table>
          </div>
          </div>
          </div>
     </body>
</html>