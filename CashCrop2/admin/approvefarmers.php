<?php if (!isset($_SESSION)) { session_start();
if(!isset($_SESSION['user']))
{
//echo "<script>alert('Ooops !!! Kindly Login to access this page !')<script>";
header('Location:login.php');
}
} 
include 'db_connect.php';
if (isset($_GET['appfarmerid'])) {
    approve_farmer($_GET['appfarmerid']);
  }
  if (isset($_GET['rejfarmerid'])) {
    reject_farmer($_GET['rejfarmerid']);
  }


	?><!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>CashCrop Admin</title>
	<meta name="description" content="CashCrop Admin">
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
	
		
		
		
</head>

<body>
		<!-- start: Header -->
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="index.php"><span>CashCrop</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
					
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?php echo $_SESSION['user']; ?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
								<li><a href="logout.php"><i class="halflings-icon off"></i> Logout</a></li>
							</ul>
						</li>
						<!-- end: User Dropdown -->
					</ul>
				</div>
				<!-- end: Header Menu -->
				
			</div>
		</div>
	</div>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<div id="sidebar-left" class="span2">
				<div class="nav-collapse sidebar-nav">
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li><a href="index.php"><i class="icon-bar-chart"></i><span class="hidden-tablet"> Dashboard</span></a></li>	
						<li><a href="orders.php"><i class="icon-eye-open"></i><span class="hidden-tablet"> Orders</span></a></li>
						<li><a href="ordersprogress.php"><i class="icon-dashboard"></i><span class="hidden-tablet"> Orders in Progress</span></a></li>
						
						<li><a href="orderscompleted.php"><i class="icon-edit"></i><span class="hidden-tablet"> Orders completed</span></a></li>
						<li><a href="viewproducts.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> View Products</span></a></li>
						<li><a href="approveproducts.php"><i class="icon-font"></i><span class="hidden-tablet"> Approve Products</span></a></li>
						<!--<li><a href="gallery.html"><i class="icon-picture"></i><span class="hidden-tablet"> Gallery</span></a></li>-->
						<li><a href="viewfarmers.php"><i class="icon-align-justify"></i><span class="hidden-tablet"> View Farmers</span></a></li>
						<li><a href="approvefarmers.php"><i class="icon-align-justify"></i><span class="hidden-tablet"> Approve Farmers</span></a></li>
					</ul>
				</div>
			</div>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.php">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="approveproducts.php">Approve Farmers</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Farmers</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					<?php 
							$query="SELECT C.*,D.sys_creation_date date FROM cc_m_farmer_details C, cc_m_farmer D WHERE fm_active_ind='N' and D.fm_uname=C.fm_uname";
					$numrows=mysqli_num_rows(mysqli_query($conn,$query));
					?>
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Farmer Name</th>
								  <th>Address</th>
								  <th>Pincode</th>
								  <th>Contact</th>
								  <th>Added On</th>
								  
								  <th>Action</th>
							  </tr>
						  </thead>
						  <tbody>
						<?php
						$res=mysqli_query($conn,$query);
						while($row=mysqli_fetch_assoc($res))
						{?>	
						 <tr>
								<td><?php echo $row['fm_fname']." ".$row['fm_lname']; ?></td>
								<td class="center"><?php echo $row['fm_address']." ".$row['fm_city']." ".$row['fm_state']; ?></td>
								<td class="center"><?php echo $row['fm_pincode']; ?></td>
								<td class="center"><?php echo $row['contact_number']; ?></td>
								<td class="center"><?php echo $row['date']; ?></td>
								
								
								
								<td class="center">
									<a class="btn btn-success" href='approvefarmers.php?appfarmerid=<?php echo $row['fm_uname']; ?>'>
							
										<i>Approve</i> 
									</a>
									<a class="btn btn-danger" href='approvefarmers.php?rejfarmerid=<?php echo $row['fm_uname']; ?>'>
							
										<i>Reject</i> 
									</a>
								</td>
							</tr>
							
						<?php } ?>
						</tbody>
						</table>
					
							
					</div>
				</div><!--/span-->
			
			</div><!--/row-->



	
	<div class="clearfix"></div>
	
	<footer style="position: fixed;
    z-index: 100; 
    bottom: 0; 
    left: 0;
    width: 100%;">

		<p>
			<span style="text-align:left;float:left">&copy; 2015 <a href="index.php" alt="CashCrop">CashCrop Official</a></span>
			
		</p>

	</footer>
	
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
<?php
function approve_farmer($farmer_id)
	{
		include 'db_connect.php';
		/*$sel_from_up_prod="Select * from cc_m_upload_products where pid='$prod_id'";
		$res=mysqli_query($conn,$sel_from_up_prod);
		$row=mysqli_fetch_assoc($res);
		$pid=$row['pid'];
		$pname=$row['pname'];
		$pdesc=$row['pdesc'];
		$pimage=$row['pimage'];
		$pprice=$row['pprice'];
		$pcategory=$row['pcategory'];
		$fm_uname=$row['fm_uname'];
		$added_on=$row['added_on'];
		$unit=$row['unit'];
		$avail_zip=$row['avail_zip'];
		$query= "INSERT INTO `db_cashcrop`.`cc_m_products` (`pid`, `pname`, `pdesc`, `pimage`, `pprice`, `pcategory`, `fm_uname`, `added_on`, `unit`, `avail_zip`) VALUES ('$pid', '$pname', '$pdesc', '$pimage', '$pprice', '$pcategory', '$fm_uname','$added_on','$unit','$avail_zip')";
		echo $query;
		mysqli_query($conn,$query);*/
		
		$query2="Update cc_m_farmer SET fm_active_ind='Y' where fm_uname='$farmer_id'";
		mysqli_query($conn,$query2);
		//echo $query2;
		
		
	}
	
	function reject_farmer($farmer_id)
	{
		include 'db_connect.php';

		
		$query2="Update cc_m_farmer SET fm_active_ind='F' where fm_uname='$farmer_id'";
		mysqli_query($conn,$query2);
		
		
	}
?>
	
	
</body>
</html>


