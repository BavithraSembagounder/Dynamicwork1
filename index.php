<!-- A session is a way to store information (in variables) to be used across multiple pages. -->

<!-- A cookie is often used to identify a user. A cookie is a small file that the server embeds on the user's computer. 
Each time the same computer requests a page with a browser, it will send the cookie too. With PHP, you can both create 
and retrieve cookie values. -->

<?php
	$con=mysql_connect("localhost","root","");
	mysql_select_db("dwa",$con);
	 session_start();
	if(isset($_POST['submit']))
	{
	$sql=mysql_query("select * from validate where username = '".$_POST['username']."' and password = '".$_POST['password']."'");
$sql1=mysql_query("select * from valids where username = '".$_POST['username']."' and password = '".$_POST['password']."'");
$sql2=mysql_query("select * from validd where username = '".$_POST['username']."' and password = '".$_POST['password']."'");
	$x=mysql_num_rows($sql);
	echo "$x";
		if(mysql_num_rows($sql) ==1)
		{
		$_SESSION['username'] = $_POST['username'];
		echo "Username & Password Matched";
		header('Location:hom1.php');
		}
		if(mysql_num_rows($sql1) == 1)
		{
		$_SESSION['username'] = $_POST['username'];
		echo "Username & Password Matched";
		header('Location:hom2.php');
		}
		if(mysql_num_rows($sql2) ==1)
		{
		$_SESSION['username'] = $_POST['username'];
		echo "Username & Password Matched";
		header('Location:hom3.php');
		}
		else
	{
	 echo "username & Password Mismatched";
	}
	}
	?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Page</title>
		<style type="text/css">
		nav
		{
			float:left;
		}
		body 
			{
				background-color:#F5F5F5;
				color: #5a5656;
				font-family: 'Open Sans', Arial, Helvetica, sans-serif;
				font-size: 16px;
				line-height: 1.5em;
				margin-top:150px;
				margin-left:320px;
			}
			a 
			{ 
				text-decoration: none; 
			}
			h2 
			{ 
				font-size: 1em; 
			}
			h2, p 
			{
				margin-bottom: 10px;
			}
			strong 
			{
				font-weight: bold;
			}
			.uppercase 
			{ 
				text-transform: uppercase; 
			}
			#login 
			{
			    margin: 50px auto;
				width:400px;
			}
			form fieldset input[type="text"], input[type="password"] 
			{
				background-color: #FFFFFF;
				border: none;
				border-radius: 3px;
				-moz-border-radius: 3px;
				-webkit-border-radius: 3px;
				color: #5a5656;
				font-family: 'Open Sans', Arial, Helvetica, sans-serif;
				font-size: 14px;
				height: 50px;
				outline: none;
				padding: 0px 10px;
				width: 280px;
				-webkit-appearance:none;
			}
			form fieldset input[type="submit"] 
			{
				background-color: #008dde;
				border: none;
				border-radius: 3px;
				-moz-border-radius: 3px;
				-webkit-border-radius: 3px;
				color: #f4f4f4;
				cursor: pointer;
				font-family: 'Open Sans', Arial, Helvetica, sans-serif;
				height: 50px;
				text-transform: uppercase;
				width: 300px;
				-webkit-appearance:none;
			}
			form fieldset a 
			{
				color: #5a5656;
				font-size: 10px;
				//align:center;
			}
			form fieldset a:hover 
			{ 
				text-decoration: underline; 
			}
			header
			{
				background-color:"66CCFF";
			}
        </style>
	</head>
	<body>
		<div style="margin-left:-4px; margin-top:-6px;">
			<div id="login" style="margin-left:100px; margin-top:23;">
			<div id="header">
					<h1><i><font color="#DC14C3"> <i>CRAV</i>ing Services</font></i></h1>
				</div>
				<section>
					<h2><strong>Login</strong></h2>
				</section>
				<footer>
					<form action="index.php" method="POST" align="center">
						<fieldset>
							<p><input type="text" required value="" name="username" placeholder="Username"></p>
							<p><input type="password" required value="" name="password" placeholder="password"></p>
							<p><a href="">Help? Forgot Password</a></p><br/>
							<p><input type="submit" value="Login" name="submit"></p>
						</fieldset>
					</form>
				</footer>	
			</div> 
		</div>
	</body>
</html>