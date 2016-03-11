<!DOCTYPE html>

<html>
<head>

	<link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
	<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("dwa",$con);

?>
		<script>
			function getXMLHTTP()
			{
			var xmlhttp=false;
				try
				{
				xmlhttp= new XMLHttpRequest();
				}
				catch(e)
				{
					try
					{
					xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
					}

					catch(e)
					{
						try
						{
						xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
						}
						catch(e1)
						{
						xmlhttp=false;
						}
					}
				}
				return xmlhttp;
			}

			function attendance(val)
			{
				
				var strURL="attendance.php?att="+val; 
				
				var req = getXMLHTTP();
				if (req) 
				{
					req.onreadystatechange = function() 
					{
						if (req.readyState == 4) {
							// only if "OK" 
							if (req.status == 200) {	
								document.getElementById('detail').innerHTML=req.responseText;					
							} else {
								alert("There was a problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}	
			}
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
									<form name="book_approve" action="approval.php" method="post" >
									<table align="center">
										<div>
											<!--<tr><td><label><h4><font size="3" face="arial" color="red">*</font>Emp Id</h4></label></td><td><input type="text" size="35px" name="emp_id" id="emp_id" required></td></tr>-->
											<tr><td><label><h4><font size="3" face="arial" color="red">*</font>Customer Name</h4></label></td><td><input type="text" size="35px" name="name" id="name" required></td></tr>
											<tr><td><label><h4><font size="3" face="arial" color="red">*</font>Required Date</h4></label></td><td><input type="date" size="35px" name="req_date" id="req_date" required></td>
											<tr><td><label><h4><font size="3" face="arial" color="red">*</font>Status</h4></label></td><td><select name="status" id="sta" required>
											<option>---Status---</option>
											<option> Waiting for approval</option>
											</select></td></tr>
											<tr><td><label><h4><font size="3" face="arial" color="red">*</font>Service person</h4></label></td>
										<td><select name="name" onchange="attendance(this.value)">
										<option value="">--Select Employee--</option>
										<?php
											$sql=mysql_query("select *  from workersdetail");
											while($row=mysql_fetch_assoc($sql))
											{
												?>
												<option value="<?php echo $row['emp_id']; ?>"><?php echo $row['name']; ?></option>
												<?php 
											} 
										?>
									</select>
										</td></tr>
											<tr><td><label><h4><font size="3" face="arial" color="red">*</font>contact Number</h4></label></td><td><input type="text" size="35px" name="out_time" id="out_time" required></td></tr>
											<tr><td><h4><center><input type="submit" name="submit" value="Submit"></h4></center></td>
											<td><h4><center><input type="reset" name="reset" value="Reset"></h4></center></td></tr>
											</table>
								<table id="example2" class="table table-bordered table-hover">
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