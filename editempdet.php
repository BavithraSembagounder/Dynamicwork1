<?php
include("config.php");
if(isset($_POST['submit']))
{
$query=mysql_query("update workersdetail set id='".$_POST['id']."',name='".$_POST['name']."',addr='".$_POST['addr']."',mob_no='".$_POST['mob_no']."',alt_no='".$_POST['alt_no']."',mail='".$_POST['mail']."',categoty_main='".$_POST['categoty_main']."',status='".$_POST['status']."' 
where id='".$_POST['id']."'");
header('Location:addempdet.php');

}
$id = $_GET['id'];
$query = mysql_query("select * from workersdetail where id='".$id."'");
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
			<h1>Employee Details</h1>        
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
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Update Employee Details</h2>
						</div><!-- /.box-header -->
						<!-- form start -->
						<!--<form role="form">-->
						<div class="box-body">


<form action="editempdet.php" method="post">
<input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
<table align="center">
<tr><td><label><h4>Employee Id</h4></label></td><td><input type="text" name="id" id="id" value="<?php echo $row['id'];?>"></td></tr>
<tr><td><label><h4>Name</h4></label></td><td><input type="text" name="name" id="name" value="<?php echo $row['name'];?>"></td></tr>
<tr><td><label><h4>Address</h4></label></td><td><input type="text" name="addr" id="addr" value="<?php echo $row['addr'];?>"></td></tr>
<tr><td><label><h4>Contact Number</h4></label></td><td><input type="text" name="mob_no" id="mob_no" value="<?php echo $row['mob_no'];?>"></td></tr>
<tr><td><label><h4>Alternate Number</h4></label></td><td><input type="text" name="alt_no" id="alt_no" value="<?php echo $row['alt_no'];?>"></td></tr>
<tr><td><label><h4>Email Id</h4></label></td><td><input type="email" name="mail" id="mail" value="<?php echo $row['mail'];?>"></td></tr>
<tr><td><label><h4>Type of service</h4></label></td>
<td><select name="categoty_main" id="categoty_main" required>
   <?php
  $sql = mysql_query("select * from main_category");
  while($rows = mysql_fetch_array($sql)) { ?>
	<option value='<?php echo $rows['id']; ?>' <?php if($rows['id'] == $row['categoty_main']) { ?> selected <?php } ?>><?php echo $rows['categoty_main'];?></option>
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