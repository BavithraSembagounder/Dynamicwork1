<?php
include("config.php");
if(isset($_POST['submit']))
{
$query=mysql_query("update data set allocatedper='".$_POST['allocatedper']."' where id='".$_POST['id']."'");
header('Location:approval.php');
exit;
}
$id = $_GET['id'];
$query = mysql_query("select * from data where id='".$id."'");
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
			<h1>service</h1>        
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<!-- left column -->
				<div class="col-xs-12">
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h5 class="box-title">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <font color="CC33CC"><b><i>service person allocation</i></b></font></h5>
						</div><!-- /.box-header -->
						<!-- form start -->
						<!--<form role="form">-->
						<div class="box-body">


<form action="checkserper.php" method="post">
<input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
<table id="example2" class="table table-bordered table-hover">
<tr>
											<td>Employee Id</td>
											<td>
												<select name="allocatedper" id="allocatedper" required>
													<option> -Select Employee- </option>
												<?php
													$sql = mysql_query("select id from workersdetail where status='present'");
													while($row = mysql_fetch_array($sql)) 
													{ ?>
														<option value='<?php echo $row['id']; ?>'><?php echo $row['id'];?></option>
														<?php
													} ?>
													
													
												</select>
											</td>
										</tr> 
 <tr><td colspan="2"><h4 align="center"><input type="submit" name="submit" value="submit"></h4></td></tr>
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