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
//$query=mysql_query("insert into att(emp_id,status,perdate) VALUES ('".$_POST['emp_id']."','".$_POST['status']."',NOW())");
//echo"insert into attendance1(emp_id,location,out_time,perdate) VALUES ('".$_POST['emp_id']."','".$_POST['location']."','".$_POST['out_time']."',NOW())";
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
				<form name="attendance" action="editatt2.php" method="post" onSubmit="return check(this)">
<table align="center" class="table table-hover">


<div>

<tr><td><label><h4><font size="3" face="arial" color="red">*</font>Service type</h4></label></td>
<td><select name="main_category" id="main_cat" required>
										<option value=""> -Select Main Service- </option>
										<?php
											$sql=mysql_query("select * from main_category");
											while($row=mysql_fetch_assoc($sql))
											{
												?>
												<option value="<?php echo $row['Id']; ?>"><?php echo $row['categoty_main'];?></option>
												<?php 
											} 
										?>
										</select>
										</td>
										</tr>

<!--<div class="input-group date" data-provide="timepicker" style="width:70%">
                          <input type="text" class="form-control" id="app" required>
                        <div class="input-group-addon">
                        <i class="fa fa-timer"></i>
                        </div>
                     </div></tr></td>-->

					 <script src="plugins/datepicker/bootstrap-datepickerpicker"></script>
<tr><td><h4><input type="submit" name="submit" value="Submit"></h4></td>
<table id="example2" class="table table-bordered table-hover">
<tr>
									<td bgcolor="66CCFF"><b>Id</b></td>
									<td bgcolor="66CCFF"><b>Name</b></td>
									<td bgcolor="66CCFF"><b>Status</b></td>
									<td bgcolor="66CCFF"><b>Edit</b></td>
								</tr>
			<?php
$sql=mysql_query("SELECT * from workersdetail");
while($row=mysql_fetch_assoc($sql))
{
?>
<tr>

<td><?php echo $row['emp_id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo 'empty'; ?></td>
<td><a href="editatt2.php?did=<?php echo $row['id']; ?>">Edit</a></td>
</tr>
<?php } ?>

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