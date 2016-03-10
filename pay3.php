
	<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Advanced form elements</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script>
			function getXMLHTTP()
			{
				var xmlhttp=false;
				try
				{
					xmlhttp= new XMLHttpRequest();
				}
				catch(e)
				{
					try
					{
						xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
					}
					catch(e)
					{
						try
						{
							xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
						}
						catch(e1)
						{
							xmlhttp=false;
						}
					}
				}
				return xmlhttp;
			}

			function menu1(val1)
			{
				var strURL="attendance_emp.php?sub="+val1; 
				var req = getXMLHTTP();
				if (req) 
				{
					req.onreadystatechange = function() 
					{
						if (req.readyState == 4) 
						{
							// only if "OK" 
							if (req.status == 200) 
							{	
								document.getElementById('detail').innerHTML=req.responseText;					
							} else 
							{
								alert("There was a problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}	
			}

		</script>

  
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
	<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("dwa",$con);
if(isset($_POST['submit']))
{
	$sql=mysql_query("insert into payment(from_date,to_date) VALUES('".$_POST['from_date']."','".$_POST['to_date']."')");
//echo "insert into stud(name,phone,mail) VALUES('".$_POST['name']."','".$_POST['phone']."','".$_POST['mail']."') ";
}
?>

<?php include"head.php"; ?>
      <!-- Left side column. contains the logo and sidebar -->
     
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
       <section class="content-header">
          <h1>
		  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
									&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            PAYMENT
            
          </h1>
          <!--<ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Advanced Elements</li>
          </ol>-->
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->

          <div class="row">
            
            <div class="col-md-8">
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div>
                <div class="box-body">
				<form action="pay3.php" method="post">
				<table>
				 <!-- Date range 
                  <div class="form-group">
                    <label>Select Date range:</label>
                    <div class="input-group">
                      <div class="input-group-addon" width="40%">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservation" name="date" >
                    </div>--><!-- /.input group -->
                  </div><!-- /.form group -->
				<td align=right><label><h4>From Date </h4></label></td>
															<td>
																<div id="datepicker" class="input-group date" data-provide="datepicker" style="width:70%">
																<input type="date" class="form-control" name="from_date">
															</td>	
													</tr>
													<tr>
															<td align=right><label><h4>To Date </h4></label></td>
															<td>
																<div id="datepicker" class="input-group date" data-provide="datepicker" style="width:70%">
																<input type="date" class="form-control" name="to_date" onClick="menu1(this.value)">
															</td>	
													</tr>
													<tr><td><h4><center><input type="button" name="search" value="search" onClick="menu1(this.value)"></center></h4></td>
													<tr>
													<td><label><h4>Employee Name </h4></label>
													<td><select name="emp_name" id="emp_name" >
													 <option value="">-Select employee name-</option>
													 <?php
                                                     $sql=mysql_query("select * from attendance,payment where attendance.perdate BETWEEN payment.from_date AND payment.to_date");
                                                     while($row=mysql_fetch_assoc($sql))
                                                         {?>
                                                  <option value="<?php echo $row['emp_name']; ?>"><?php echo $row['emp_name'];?></option>
                                                   <?php } ?>

													</select>
													
													</td>
													</td>
													</tr>
													
													</table>
                 

                  <!-- Date and time range -->
                  <!--<div class="form-group">
                    <label>Date and time range:</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="reservationtime">
                    </div><!-- /.input group 
                  </div><!-- /.form group -->

                  <!-- Date and time range -->
                  <!--<div class="form-group">
                    <label>Date range button:</label>
                    <div class="input-group">
                      <button class="btn btn-default pull-right" id="daterange-btn">
                        <i class="fa fa-calendar"></i> Date range picker
                        <i class="fa fa-caret-down"></i>
                      </button>
                    </div>
                  </div><!-- /.form group -->

                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col (right) -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page script -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
              ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
              },
              startDate: moment().subtract(29, 'days'),
              endDate: moment()
            },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>
  
		<!-- /.box -->
		<?php include"navigation.php"; ?>
		</body>
</html>
