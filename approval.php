<html>
<head>
<script>
}(window.jQuery));
$('#datepicker').datepicker({
       /*  format: 'yyyy-mm-dd',
        multidate: true,
        multidateSeparator: ",",
        calendarWeeks: true,
        todayHighlight: true */
    }).on('changeDate', function(e){
        alert($('#datepicker1').datepicker('getDates'));
    });

</script>
</head>
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
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Booking Approval
							</h5>
						</div><!-- /.box-header -->
						<!-- form start -->
						<!--<form role="form">-->
						<div class="box-body">

								<table align="center">
									<form name="book_approve" action="approval.php" method="post" onSubmit="return check(this)">
										<div>
											<!--<tr><td><label><h4><font size="3" face="arial" color="red">*</font>Emp Id</h4></label></td><td><input type="text" size="35px" name="emp_id" id="emp_id" required></td></tr>-->
											<tr><td><label><h4><font size="3" face="arial" color="red">*</font>Customer Name</h4></label></td><td><input type="text" size="35px" name="name" id="name" required></td>
											<div class="datepicker" id="datepicker1" ><tr><td><label><h4><font size="3" face="arial" color="red">*</font>Required Date</h4></label></td><td><input type="date" size="35px" name="location" id="datepicker" required></td></tr></div>
											<tr><td><label><h4><font size="3" face="arial" color="red">*</font>Status</h4></label></td><td><select name="status" id="sta" required>
											<option>---Status---</option>
											<option> Waiting for approval</option>
											</select></td></tr>
											<tr><td><label><h4><font size="3" face="arial" color="red">*</font>Select Person</h4></label></td><td><select name="person" id="person" required>
											<?php
											$sql=mysql_query("select * from attendance");
											while($row=mysql_fetch_assoc($sql))
											{
												?>
												<option value="<?php echo $row['id']; ?>"><?php echo $row['name'];?></option>
												<?php 
											}
											 ?>
											</select></td></tr>
											<tr><td><label><h4><font size="3" face="arial" color="red">*</font>contact Number</h4></label></td><td><input type="text" size="35px" name="out_time" id="out_time" required></td></tr>
											<tr><td><h4><center><input type="submit" name="submit" value="Submit"></h4></center></td>
											<td><h4><center><input type="reset" name="reset" value="Reset"></h4></center></td></tr>
											</table>
								<table border=2" align="center">
<tr>
<th bgcolor="66CCFF">Customer name</th>
<th bgcolor="66CCFF">Contact Number</th>
<th bgcolor="66CCFF">Address</th>
<th bgcolor="66CCFF">Landmark</th>
<th bgcolor="66CCFF">Requirements</th>
<th bgcolor="66CCFF">Required Date</th>
<th bgcolor="66CCFF">Show</th>
<th bgcolor="66CCFF">Delete</th>
</tr>
</table>
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
	<?php include "navigation.php"; ?>
	<?php include "footer.php"; ?>
</body>
</html>