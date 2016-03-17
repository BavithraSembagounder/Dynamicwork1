<!DOCTYPE html>
<html>
	<head>
	</head>
	<body>
		<?php include "head.php"; ?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Booking Item Details</h1>
<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("dwa",$con);
	if(isset($_POST['submit']))
	{
		$query=mysql_query("insert into bookingitem(shop,item,nos,amount) VALUES ('".$_POST['shop']."','".$_POST['item']."','".$_POST['nos']."','".$_POST['amount']."')");
		header("Location:bookingitem.php");
	}
?>
									
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<!-- left column -->
					<div class="col-xs-12">
						<!-- general form elements -->
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color="CC33CC"><b><i> Add New Booking Item</i></b></font>
								</h3>
							</div><!-- /.box-header -->
							<!-- form start -->
							<!--<form role="form">-->
							<div class="box-body">
								<form action="addbookingitem.php" method="post">
									<table align="center">
										<tr>
											<td><label><h4>Shop</h4></label></td>
											<td><input type="text" name="shop" id="shop">
												
											</td>
										</tr> 
										<tr>
											<td><label><h4>Item</h4></label></td>
											<td><input type="text" name="item" id="item">
												
											</td>
										</tr> 
										<tr>
											<td><label><h4>Nos</h4></label></td>
											<td><input type="text" name="nos" id="nos">
												
											</td>
										</tr> 
										<tr>
											<td><label><h4>Amount</h4></label></td>
											<td><input type="text" name="amount" id="amount">
												
											</td>
										</tr> 
										<br><tr><td><h4 align="center"><input type="submit" name="submit" value="Add"></h4></td></tr>
										<p>
											<font size="2" face="arial" color="red">
											</font>
										</p>
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
