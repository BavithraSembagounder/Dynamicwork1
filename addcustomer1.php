<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("dwa",$con);
	if(isset($_GET['id']))
	{	
					$sql=mysql_query("select * from statedetails where country='".$_GET['id']."'");
					while($row=mysql_fetch_assoc($sql))
					{
						?>
						<option  value="<?php echo $row['id']; ?>"><?php  echo $row['state']; ?></option>
						<?php 
					} 				
	} 
?>	
	