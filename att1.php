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
$query=mysql_query("insert into attendance(id,location,perdate) VALUES ('".$_POST['id']."','".$_POST['location']."',NOW())");
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

<form name="attendance" action="att1.php" method="post" onSubmit="return check(this)">
<table align="center" class="table table-hover">

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

<tr><td><label><h4><font size="3" face="arial" color="red">*</font>Emp Id</h4></label></td>
<td><input type="text" size="35px" name="id" id="id" required></td></tr>
<tr><td><label><h4><font size="3" face="arial" color="red">*</font>Location</h4></label></td><td><input type="text" size="35px" name="location" id="location" required></td></tr>
<tr><td><label><h4><font size="3" face="arial" color="red">*</font>Entry Type</h4></label></td>
<td><input type="radio" name="group" value="Intime" checked> Intime
 <input type="radio" name="group" value="Outtime"> Outtime</td>


<!--<tr><td><label><h4><font size="3" face="arial" color="red">*</font>In time</h4></label></td><td><input type="time" size="35px" name="in_time" id="in_time" required></td></tr>-->

<tr>
                	<td><label><h4><font size="3" face="arial" color="red">*</font>Per date</h4></label></td>
                    <td><input type="text" name="txtdate" value="<?php echo date("d/M/Y"); ?>" readonly="readonly" /></td>
                </tr>

<!--<div class="input-group date" data-provide="timepicker" style="width:70%">
                          <input type="text" class="form-control" id="app" required>
                        <div class="input-group-addon">
                        <i class="fa fa-timer"></i>
                        </div>
                     </div></tr></td>-->

					 <script src="plugins/datepicker/bootstrap-datepickerpicker"></script>
<tr><td><h4><center><input type="submit" name="submit" value="Submit"></h4></center></td>
<td><h4><center><input type="reset" name="reset" value="Reset"></h4></center></td></tr>

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