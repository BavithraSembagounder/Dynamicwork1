<!DOCTYPE html>
<html>
  <head>
	<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  </head>
  <?php
$con=mysql_connect("localhost","root","");
mysql_select_db("dwa",$con);
if(isset($_POST['submit']))
{
$query=mysql_query("insert into attendance(emp_id,location,created_date,update_date,in_time,out_time) VALUES ('".$_POST['emp_id']."','".$_POST['location']."','".$_POST['created_date']."','".$_POST['update_date']."','".$_POST['in_time']."','".$_POST['out_time']."')");
//echo"Submittedted successfully";
}
?>

<body>
	<?php include "head.php"; ?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            
            <!--<small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>-->
			<h1><font color="0033CC" font style="Comic Sans MS">Attendance</font></h1>
            <!--<li class="active">Care Takers</li>-->
          
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
				<div class="form-group">
<table align="center">
<form name="attendance" action="att1.php" method="post" onSubmit="return check(this)">

<div>

<tr><td><label><h4><font size="3" face="arial" color="red">*</font>Emp Id</h4></label></td>
<td><input type="text" size="35px" name="emp_id" id="emp_id" required></td></tr>
<tr><td><label><h4><font size="3" face="arial" color="red">*</font>Location</h4></label></td><td><input type="text" size="35px" name="location" id="location" required></td></tr>
<tr>
															<td align=right><label><h4>Created Date :</h4></label></td>
															<td>
																<div id="datepicker" class="input-group date" data-provide="datepicker" style="width:70%">
																<input type="date" class="form-control" name="created_date">
															</td>	
													</tr>
													<tr>
															<td align=right><label><h4>Updated Date :</h4></label></td>
															<td>
																<div id="datepicker" class="input-group date" data-provide="datepicker" style="width:70%">
																<input type="date" class="form-control" name="update_date">
															</td>	
													</tr>
<tr><td><label><h4><font size="3" face="arial" color="red">*</font>In time</h4></label></td><td><input type="time" size="35px" name="in_time" id="in_time" required></td></tr>
<tr><td><label><h4><font size="3" face="arial" color="red">*</font>Out time</h4></label></td><td><input type="time" size="35px" name="out_time" id="out_time"></td></tr>


<!--<div class="input-group date" data-provide="timepicker" style="width:70%">
                          <input type="text" class="form-control" id="app" required>
                        <div class="input-group-addon">
                        <i class="fa fa-timer"></i>
                        </div>
                     </div></tr></td>-->

					 <script src="plugins/datepicker/bootstrap-datepickerpicker"></script>
<tr><td><h4><center><input type="submit" name="submit" value="Submit"></h4></center></td>
<td><h4><center><input type="reset" name="reset" value="Reset"></h4></center></td></tr>
</div>
</form>
</table>
 </div><!-- /.box-body -->
 </div>
              </div><!-- /.box -->        
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div>
<?php include "navigation.php"; ?>
<?php include "footer.php"; ?>
<script>$("#datepicker").datepicker();</script>
<script>$("#datepicker1").datepicker();</script>
</body>
</html>