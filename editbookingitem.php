<!DOCTYPE html>
<?php
include("config.php");
if(isset($_POST['submit']))
{
$query=mysql_query("update bookingitem set shop='".$_POST['shop']."',item='".$_POST['item']."',nos='".$_POST['nos']."' where id='".$_POST['id']."'");
header("Location:bookingitem.php");
exit;
}

$id = $_GET['id'];
$query = mysql_query("select * from bookingitem where id='".$id."'");
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
			<h1>Booking Item Details</h1>        
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
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color="CC33CC"><b><i> Update Booking Item</i></b></font></h5>
						</div><!-- /.box-header -->
						<!-- form start -->
						<!--<form role="form">-->
						<div class="box-body">

<form action="editbookingitem.php" method="post">
<input type='hidden' name='id' value='<?php echo $row['id']; ?>'>
<table align="center">
<tr>
											<td><label><h4>Shop</h4></label></td>
											<td><input type="text" name="shop" id="shop" value="<?php echo $row['shop']; ?>">
												
											</td>
										</tr> 
										<tr>
											<td><label><h4>Item</h4></label></td>
											<td><input type="text" name="item" id="item" value="<?php echo $row['item']; ?>">
												
											</td>
										</tr> 
										<tr>
											<td><label><h4>Nos</h4></label></td>
											<td><input type="text" name="nos" id="nos" value="<?php echo $row['nos']; ?>">
												
											</td>
										</tr> 

 <tr><td colspan="2"><h4 align="center"><input type="submit" name="submit" value="Update"></h4></td></tr>
</table>
</form>
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