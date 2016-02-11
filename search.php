
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

<form action="search.php" method="POST">
<table>
<tr>
<td>name:<input type="text" name="search_name" id="search_name"></td>
<br>
<td>age:<input type="text" name="search_age" id="search_age"></td>
<br><td><input type="submit" name="submit" value="submit"></td>
</tr>
</table>
<table border=1>
<tr>
<td>name:</td>
<td>age:</td>
<td>sex:</td>
</tr>
<?php
if(isset($_POST['submit']))
{
	//$sql=mysql_query("select * from  detail where name='".$_GET['sid']."' ");
	$query=mysql_query("select * from details ");
	while($row=mysql_fetch_array($query))
	{
		if((($row['name']==$_POST['search_name'])&&(empty($_POST['search_age'])))||((empty($_POST['search_name'])&&($row['age']==$_POST['search_age'])))||(($row['name']==$_POST['search_name'])&&($row['age']==$_POST['search_age'])))
			
		{
		//elseif($row['age']==$_POST['search_age'])	{	
		?>
	
<tr>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['age'];?></td>
<td><?php echo $row['sex'];?></td>
</tr>
<?php }
		}
	//}
}
?>

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