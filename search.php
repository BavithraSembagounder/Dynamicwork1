<?php
error_reporting(0);
include("config.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>search</title>

<style>

BODY, TD {
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}
</style>
</head>
<body>
<?php include "head.php"; ?>
	<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>Search Details</h1>        
		       
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
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<font color="CC33CC"><b><i>Search Details List</i></b></font></h3>
						</div><!-- /.box-header -->
						<!-- form start -->
						<!--<form role="form">-->
						<div class="box-body">

<form id="form1" name="form1" method="post" action="search.php">

	<label for="from">From</label>
<input name="from" type="text" id="from" size="10" value="<?php echo $_REQUEST["from"]; ?>" />
	<label for="to">to</label>
<input name="to" type="text" id="to" size="10" value="<?php echo $_REQUEST["to"]; ?>"/>
 	
<label>Status or Booking:</label>
<input type="text" name="string" id="string" value="<?php echo stripcslashes($_REQUEST["string"]); ?>" />
	

<label>Area</label>
<select name="area">
		<option value="">--</option>
	<?php
	   $sql = "SELECT * FROM ".$SETTINGS["data_table"]." GROUP BY area ORDER BY area";
	   $sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
	   while ($row = mysql_fetch_assoc($sql_result)) {
		echo "<option value='".$row["area"]."'".($row["area"]==$_REQUEST["area"] ? " selected" : "").">".$row["area"]."</option>";
	}
	?>
</select>




<input type="submit" name="button" id="button" value="Filter" />
  </label>
  <a href="search.php"> 
  reset</a>
</form>
    <a href="hom1.php"> Back </a>
<br /><br />
<table id="example2" class="table table-bordered table-hover">
  <tr>
      <td bgcolor="66CCFF"><strong>Id</strong></td>
    <td bgcolor="66CCFF"><strong>Name</strong></td>
 <td bgcolor="66CCFF"><strong>Address</strong></td>
    <td bgcolor="66CCFF"><strong>Area</strong></td>
    <td bgcolor="66CCFF"><strong>Mobile</strong></td>
    <td bgcolor="66CCFF"><strong>E-Mail</strong></td>
    <td bgcolor="66CCFF"><strong>Category</strong></td>
	    <td bgcolor="66CCFF"><strong>Subategory</strong></td>
    <td bgcolor="66CCFF"><strong>Remark</strong></td>
    <td bgcolor="66CCFF"><strong>From date</strong></td>
    <td bgcolor="66CCFF"><strong>To date</strong></td>
    <td bgcolor="66CCFF"><strong>Booking</strong></td>
    <td bgcolor="66CCFF"><strong>Status</strong></td>
     </tr>
<?php

if ($_REQUEST["string"]<>'') 
{
	$search_string = " AND (status LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%' OR booking LIKE '%".mysql_real_escape_string($_REQUEST["string"])."%')";	
}
if ($_REQUEST["area"]<>'') 
{
	$search_city = " AND area='".mysql_real_escape_string($_REQUEST["area"])."'";	
}




if ($_REQUEST["from"]<>'' and $_REQUEST["to"]<>'') 
{
	$sql = "SELECT * FROM ".$SETTINGS["data_table"]." WHERE from_date >= '".mysql_real_escape_string($_REQUEST["from"])."' AND to_date <= '".mysql_real_escape_string($_REQUEST["to"])."'".$search_string.$search_city;
} 
else if ($_REQUEST["from"]<>'') 
{
	$sql = "SELECT * FROM ".$SETTINGS["data_table"]." WHERE from_date >= '".mysql_real_escape_string($_REQUEST["from"])."'".$search_string.$search_city;
} 
else if ($_REQUEST["to"]<>'') 
{
	$sql = "SELECT * FROM ".$SETTINGS["data_table"]." WHERE to_date <= '".mysql_real_escape_string($_REQUEST["to"])."'".$search_string.$search_city;
} 
else {
	$sql = "SELECT * FROM ".$SETTINGS["data_table"]." WHERE id>0".$search_string.$search_city;
     }

$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
if (mysql_num_rows($sql_result)>0) {
	while ($row = mysql_fetch_assoc($sql_result)) {
?>
  <tr>
<td><?php echo $row["id"]; ?></td>  
<td><?php echo $row["full_name"]; ?></td>
<td><?php echo $row["address"]; ?></td>
<td><?php echo $row["area"]; ?></td>
<td><?php echo $row["mobile"]; ?></td>
<td><?php echo $row["email"]; ?></td>
<td><?php echo $row["categoty_main"]; ?></td>
<td><?php echo $row["category_sub1"]; ?></td>
<td><?php echo $row["remark"]; ?></td>
<td><?php echo $row["from_date"]; ?></td>
<td><?php echo $row["to_date"]; ?></td>
<td><?php echo $row["booking"]; ?></td>
 <td><?php echo $row["status"]; ?></td>
      
  </tr>
<?php
	}
} else {
?>
<tr><td colspan="13">No results found.</td>
<?php	
}
?>
</table>
</form>

<script>
	$(function() {
		var dates = $( "#from, #to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 2,
			dateFormat: 'yy-mm-dd',
			onSelect: function( selectedDate ) {
				var option = this.id == "from" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
	});
	</script>
	
							<!--</thead>-->
							<tbody>
					      
							</tbody>



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
