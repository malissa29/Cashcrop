<!DOCTYPE html>
<?php if (!isset($_SESSION)) { session_start();
if(!isset($_SESSION['fm_uname']))
{
//echo "<script>alert('Ooops !!! Kindly Login to access this page !')<script>";
header('Location:login.php');
}
} 
include 'db_connect.php';
$farmer_name=$_SESSION['fm_uname'];
if (isset($_GET['orderid'])) {
    delivered_product($_GET['orderid']);
  }
  



	?> 
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>CashCrop Admin</title>
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
<a class="brand" href="index.html"><span>Farmer Portal CashCrop</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?php echo $farmer_name; ?>
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
						<li><a href="addproducts.php"><i class="icon-tasks"></i><span class="hidden-tablet"> Add Products</span></a></li>
						<li><a href="deleteproducts.php"><i class="icon-eye-open"></i><span class="hidden-tablet"> Delete Products</span></a></li>
						<!--<li><a href="editproducts.php"><i class="icon-dashboard"></i><span class="hidden-tablet"> Edit Products</span></a></li>-->
						
						<li><a href="orderscompleted.php"><i class="icon-edit"></i><span class="hidden-tablet"> Orders completed</span></a></li>
						<li><a href="viewproducts.php"><i class="icon-list-alt"></i><span class="hidden-tablet"> View Products</span></a></li>
						
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
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Order's Cancelled</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Products</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					<?php 
							$query="SELECT C.order_id,C.cust_uname,C.order_date,C.delivery_boy,C.order_status,C.total_price FROM cc_m_order_details B,cc_m_order C,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=B.pid and B.order_id=C.order_id and  order_status='Delivered' ";
					//echo $query;
					$numrows=mysqli_num_rows(mysqli_query($conn,$query));
					?>
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
									<th>Order Id</th>
								  <th>Customer Name</th>
								  <th>Products</th>
								  <th>Order Date</th>
								  <th>Delivery Boy</th>
								  <th>Order Status</th>
								  <th>Total</th>
								  
							  </tr>
						  </thead>
						  <tbody>
						<?php
						$res=mysqli_query($conn,$query);
						while($row=mysqli_fetch_assoc($res))
						{ 
				$query2="SELECT group_concat(p.pname separator ',') as 'All products' FROM cc_m_order_details D, cc_m_products p WHERE order_id='".$row['order_id']."' and D.pid=p.pid";
					$res2=mysqli_query($conn,$query2);
					$row2=mysqli_fetch_assoc($res2);?>	
							
						 <tr>
								<td><?php echo $row['order_id']; ?></td>
								<td class="center"><?php echo $row['cust_uname']; ?></td>
								<td class="center"><?php echo $row2['All products']; ?></td>
								<td class="center"><?php echo $row['order_date']; ?></td>
								<td class="center"><?php echo $row['delivery_boy']; ?></td>
								<td class="center">
									<span class="label label-success"><?php echo $row['order_status']; ?></span>
								</td>
								<td class="center"><?php echo $row['total_price']; ?></td>
								
								
								
								
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
function delivered_product($order_id)
	{
		include 'db_connect.php';
		$query="UPDATE cc_m_order SET order_status='Delivered' WHERE order_id=$order_id";
		echo $query;
		mysqli_query($conn,$query);
		
	}
?>

	
	
</body>
</html>


