<?php
include("config.php");
if(isset($_POST['submit']))
{
$query=mysql_query("update attendance set entry_type='".$_POST['entry_type']."' where id='".$_POST['id']."'");
header("Location:addatt1.php");
exit;
}
$id = $_GET['id'];
$query = mysql_query("select * from attendance where id='".$id."'");
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
			<h1>City Details</h1>        
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
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <font color="CC33CC"><b><i>Update City</i></b></font></h5>
						</div><!-- /.box-header -->
						<!-- form start -->
						<!--<form role="form">-->
						<div class="box-body">


<form action="editatt1.php" method="post">
<input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
<table align="center">
<tr><td><label><h4>Employee Id</h4></label></td><td><input type="text" name="id" id="id" value="<?php echo $row['id'];?>">
<tr><td><label><h4>Location</h4></label></td><td><input type="text" name="area" id="area" value="<?php echo $row['area'];?>">
                                   <tr>
											<td>Entry Type</td>
											<td>
												<select name="entry_type" id="entry_type" required>
													<option> -Select Entry- </option>
														<option>Intime</option>	
														<option>Outtime</option>
													<?php
													$sql = mysql_query("DELETE FROM attendance WHERE entry_type='outtime'");
													while($row = mysql_fetch_array($sql)) 
													{ ?>
														<option value='<?php echo $row['id']; ?>'><?php echo $row['entry_type'];?></option>
														<?php
													} ?>
												</select>
											</td>
										</tr> 
<tr><td><label><h4><font size="3" face="arial" color="red">*</font>Per date</h4></label></td>
<td><input type="text" name="per_date" value="<?php echo date("d/M/Y"); ?>" readonly="readonly" /></td></tr>

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