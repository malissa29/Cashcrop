<!DOCTYPE html>
<?php if (!isset($_SESSION)) { session_start();}
					include 'db_connect.php';
					
					function clean($string)
{

return preg_replace('/[^A-Za-z0-9\-]/',' ',$string);
}

if(!empty($_POST['submit']))
{
$submit2=$_POST['submit'];
if(!empty($_POST['email']))
$email=strip_tags($_POST['email']);

$username=clean((strip_tags($_POST['username'])));

$password=clean(strip_tags($_POST['password']));


	if($username && $password)
	{
	//echo $username;
		
		if($username)
		{
			$query=mysqli_query($conn,"SELECT * FROM cc_m_farmer WHERE fm_uname='$username'");
			$query2=mysqli_query($conn,"SELECT * FROM cc_m_farmer_details WHERE fm_uname='$username'");
			
		}
		/*else if($email)
		{
			$query=mysql_query("SELECT * FROM cc_m_customer_details WHERE cust_email='$email'");
		}*/
		$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM cc_m_farmer WHERE fm_uname='$username'"));
		$numrows2=mysqli_num_rows($query2);
		if($numrows!=0)
		{
			while($row=mysqli_fetch_assoc($query))
			{
				$row2=mysqli_fetch_assoc($query2);
				$dbusername=$row['fm_uname'];
				$dbpassword=$row['fm_pswd'];
				//$row2=mysqli_fetch_assoc($query2);
				$dbuser=$row2['fm_fname'];
				//$dbemail=$row['cust_email'];
				//$dbuser=$row['cust_fname'];
				//$dblastname=$row['cust_lname'];
				//echo $dbusername.$dbpassword;
				
				
			}
			if(($username==$dbusername)&& $password==$dbpassword)
			{	
		$_SESSION['fm_uname']=$dbusername;
		
				if (!isset($_SESSION)) { session_start();}
				if(!isset($_SESSION['farmer']))
				{echo $_SESSION['farmer'].$_SESSION['fm_uname']." You have Successfully logged in";
				$_SESSION['fm_uname']=$dbusername;
				$_SESSION["farmer"]=$dbuser;}
				echo $_SESSION['farmer'].$_SESSION['fm_uname']." You have Successfully logged in";
				header('Location:index.php');
				//echo $_SESSION['farmer'];
				
			
			}
			else
			{
				echo "Password incorrect";
				 }
		}
		else
		{
			echo "The Username doesn't exist or Enter correct email Please <u><h3><a href='login.php'>Login Again</a></h3></u>";
		}
	}
	else
	{
		echo "Incomplete Fields.....<u><h3><a href='login.php'>Try Again</a></h3></u>";
	}
	}

?><!--/login form-->
		
					
<?php if (!isset($_SESSION)) { session_start();} ?>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>CashCrop Farmer </title>
	<meta name="description" content="CashCrop Admin">
	<meta name="author" content="Siddharth Tankariya">
	<meta name="keyword" content="Dashboard, Bootstrap, Admin, Siddharth,Vedant, Rushi, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="css/ie.css" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="css/ie9.css" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { background: url(img/bg-login.jpg) !important; }
		</style>
		
		
		
</head>

<body>
		<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<h1 align="center">Cash Crop Farmer</h1>
						<a href="#"><i class="halflings-icon home"></i></a><!--Enter the main sites URL here -->
						<a href="#"><i class="halflings-icon cog"></i></a><!-- just to add beauty -->
					</div>
					<h2>Login to your account</h2>
					<form class="form-horizontal" action="<?php $_php_self ?>" method="post">
						<fieldset>
							
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="username" id="username" type="text" placeholder="type username"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" placeholder="type password"/>
							</div>
							<div class="clearfix"></div>
							
							<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
							<div id='alert'>
							</div>

							<div class="button-login">	
								<button type="submit" name="submit" type="submit" value ="submit" class="btn btn-primary"> Login</button>
							</div>
							<div class="clearfix"></div>
					</form>
					<hr>
					<h3>Forgot Password?</h3>
					<p>
						No problem, <a href="#">click here</a> to get a new password.
					</p>	
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
