
<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("dwa",$con);


?>

<html>
<body>
<?php include "head.php"; ?>
	<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Booking</h1>        
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<!-- left column -->
				<div class="col-xs-12">
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h5 class="box-title">
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Search Booking
							</h5>
						</div><!-- /.box-header -->
						<!-- form start -->
						<!--<form role="form">-->
						<div class="box-body">

<form action="search.php" method="post">
<table class="table table-hover">
<div>
<tr><td><label><h4>customer Name<input type="text" size="35px" name="customername" id="customername"></h4></label></td></tr>
<tr><td><label><h4>Status</h4></label></td>
<td><select name="status" id="status" required>
<option>---Status---</option>
<option> Waiting for approval</option>
<option> Open</option>
<option> In progress</option>
<option> Rejected before inspection</option>
<option> Rejected after inspection</option>
<option> Completed</option>
<option> Close</option>
</select></td></tr>
	<tr><td><label><h4>Contact number</h4></label><input type="text" size="35px" name="contact_no" id="contact_no"></td></tr>
	<tr><td><label><h4>Required Date</h4></label><input type="text" size="35px" name="req_date" id="req_ date"></td></tr>
	<tr><td><label><h4>Service Person</h4></label></td>
	<td><select name="service_person" id="service_person">
<option value=""> -Select Service person- </option>
<?php
$sql=mysql_query("select * from attendance");
while($row=mysql_fetch_assoc($sql))
{
?>
<option value="<?php echo $row['id']; ?>"><?php echo $row['name'];?></option>
<?php } ?>
</select>
</td></tr>
<tr><td><h4><center><input type="submit" name="submit" value="Submit"></h4></center></td>
<td><h4><center><input type="reset" name="reset" value="Reset"></h4></center></td></tr>
											
</div>
</table>
</form>
</div>
					</div>      
					<!--</form>-->
				</div>
			</div>
		</section>	
	</div>
	<!-- /.box -->
	<?php include "navigation2.php"; ?>
	<?php include "footer.php"; ?>
</body>
</html>