<?php
include("config.php");
if(isset($_POST['submit']))
{
$query=mysql_query("update customerdetails set customername='".$_POST['customername']."',email='".$_POST['email']."',mobileno='".$_POST['mobileno']."',zone='".$_POST['zone']."' where id='".$_POST['id']."'");
header("Location:customertable.php");
exit;
}

$id = $_GET['id'];
$query = mysql_query("select * from customerdetails where id='".$id."'");
$row = mysql_fetch_array($query);
?>
<html>
<head>
</head>
<body>
<?php include "head.php"; ?>
	<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Customer Details</h1>        
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<!-- left column -->
				<div class="col-xs-12">
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h2 class="box-title">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Update Customer</h2>
						</div><!-- /.box-header -->
						<!-- form start -->
						<!--<form role="form">-->
						<div class="box-body">


<form action="editcustomer.php" method="post">
<input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
<table align="center">
<tr><td><label><h4>Customer Name:</h4></label></td><td><input type="text" name="customername" id="customername" value="<?php echo $row['customername'];?>"></td></tr>
<tr><td><label><h4>Email:</h4></label></td><td><input type="email" name="email" id="email" value="<?php echo $row['email'];?>"></td></tr>
<tr><td><label><h4>Mobile Number:</h4></label></td><td><input type="text" name="mobileno" id="mobileno" value="<?php echo $row['mobileno'];?>"></td></tr>
<tr><td><label><h4>Zone Name:</h4></label></td>
<td><select name="zone" id="zone" required>
   <?php
  $sql = mysql_query("select * from zonedetails");
  while($rows = mysql_fetch_array($sql)) { ?>
	<option value='<?php echo $rows['id']; ?>' <?php if($rows['id'] == $row['zone']) { ?> selected <?php } ?>><?php echo $rows['zone'];?></option>
  <?php } ?>
</select></td> </tr>
 <tr><td colspan="2"><h4 align="center"><input type="submit" name="submit" value="Update"></h4></td></tr>
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