<?php if (!isset($_SESSION)) { session_start();
if(!isset($_SESSION['user']))
{
//echo "<script>alert('Ooops !!! Kindly Login to access this page !')<script>";
header('Location:login.php');
}
} 
include 'db_connect.php';?><!DOCTYPE html>
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
				<a class="brand" href="index.html"><span>CashCrop</span></a>
								
				<!-- start: Header Menu -->
				<div class="nav-no-collapse header-nav">
					<ul class="nav pull-right">
						
						<li class="dropdown">
							<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="halflings-icon white user"></i> <?php   echo $_SESSION['user'];?>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li class="dropdown-menu-title">
 									<span>Account Settings</span>
								</li>
								<li><a href="#"><i class="halflings-icon user"></i> Change Password</a></li>
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
						<li><a href="orders.php"><i class="icon-eye-open"></i><span class="hidden-tablet"> Order's</span></a></li>
						<li><a href="ordersprogress.php"><i class="icon-dashboard"></i><span class="hidden-tablet"> Order's in Progress</span></a></li>
						
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
					<a href="#">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Dashboard</a></li>
			</ul>
			<?php
			$day=date("d");
			$month=date("m");
			$year=date("y");
			$date = date('Y-m-j');
$newdate = strtotime ( '-7 days' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-j' , $newdate );

//echo $newdate;
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_customer C where cust_sys_creation_date='$date'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_customer C where cust_sys_creation_date='$date'"));
						$reg0=$row['count'];
					}
					else
					{
						$reg0=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-1 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_customer C where cust_sys_creation_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_customer C where cust_sys_creation_date='$newdate'"));
						$reg1=$row['count'];
					}
					else
					{
						$reg1=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-2 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_customer C where cust_sys_creation_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_customer C where cust_sys_creation_date='$newdate'"));
						$reg2=$row['count'];
					}
					else
					{
						$reg2=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-3 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_customer C where cust_sys_creation_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_customer C where cust_sys_creation_date='$newdate'"));
						$reg3=$row['count'];
					}
					else
					{
						$reg3=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-4 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_customer C where cust_sys_creation_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_customer C where cust_sys_creation_date='$newdate'"));
						$reg4=$row['count'];
					}
					else
					{
						$reg4=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-5 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_customer C where cust_sys_creation_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_customer C where cust_sys_creation_date='$newdate'"));
						$reg5=$row['count'];
					}
					else
					{
						$reg5=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-6 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_customer C where cust_sys_creation_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_customer C where cust_sys_creation_date='$newdate'"));
						$reg6=$row['count'];
					}
					else
					{
						$reg6=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-7 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_customer C where cust_sys_creation_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_customer C where cust_sys_creation_date='$newdate'"));
						$reg7=$row['count'];
					}
					else
					{
						$reg7=0;
					}
			//$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(C.*) FROM cc_m_customers C,cc_m_time t " ));
			?>

			<div class="row-fluid">
				<!-- Rushi display no of visitors here -->
				<div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
					<div class="boxchart"><?php echo $reg7.",".$reg6.",".$reg5.",".$reg4.",".$reg3.",".$reg2.",".$reg1.",".$reg0; ?></div>
					<div class="number"><?php $newdate=date('Y-m-j',strtotime ( '-7 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_customer C where cust_sys_creation_date>='$newdate' "));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_customer C where cust_sys_creation_date>='$newdate'"));
						$reg_count=$row['count'];
						echo $reg_count;
					} 
					$newdate1=date('Y-m-j',strtotime ( '-14 days' , strtotime ( $date ) ));
					$numrows1=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_customer C where cust_sys_creation_date>='$newdate' "));
					if($numrows1!=0)
					{	$row1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_customer C where cust_sys_creation_date>='$newdate1' and cust_sys_creation_date<'$newdate'"));
						$reg_count1=$row1['count'];
						
					}
					if($reg_count>=$reg_count1){
					?><i class='icon-arrow-up'></i><?php } else {?><i class='icon-arrow-down'></i> <?php } ?></div>
					<div class="title">Registrations</div>
					<div class="footer">
							<span class="count">
								<span class="unit">In last 7 days</span>
							</span>
					</div>
					<!--<div class="footer">
						<a href="#"> read full report</a>
					</div>	-->
				</div>
				<!-- Rushi display no of orders dispatched here-->
				<?php
			$day=date("d");
			$month=date("m");
			$year=date("y");
			$date = date('Y-m-j');
$newdate = strtotime ( '-7 days' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-j' , $newdate );


					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(total_price) FROM cc_m_order C where order_date='$date'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total_price) as count FROM cc_m_order C where order_date='$date'"));
						
						$reg0=$row['count'];
					}
					else
					{
						$reg0=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-1 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(total_price) FROM cc_m_order C where order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total_price) as count FROM cc_m_order C where order_date='$newdate'"));
				
						$reg1=$row['count'];
						
						
					}
					else
					{
						$reg1=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-2 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(total_price) FROM cc_m_order C where order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total_price) as count FROM cc_m_order C where order_date='$newdate'"));
						$reg2=$row['count'];
							
					}
					else
					{
						$reg2=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-3 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(total_price) FROM cc_m_order C where order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total_price) as count FROM cc_m_order C where order_date='$newdate'"));
						$reg3=$row['count'];
					
					}
					else
					{
						$reg3=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-4 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(total_price) FROM cc_m_order C where order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total_price) as count FROM cc_m_order C where order_date='$newdate'"));
						$reg4=$row['count'];
						
					}
					else
					{
						$reg4=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-5 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(total_price) FROM cc_m_order C where order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total_price) as count FROM cc_m_order C where order_date='$newdate'"));
						$reg5=$row['count'];
						
					}
					else
					{
						$reg5=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-6 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(total_price) FROM cc_m_order C where order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total_price) as count FROM cc_m_order C where order_date='$newdate'"));
						$reg6=$row['count'];
						
					}
					else
					{
						$reg6=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-7 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(total_price) FROM cc_m_order C where order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total_price) as count FROM cc_m_order C where order_date='$newdate'"));
						$reg7=$row['count'];
					}
					else
					{
						$reg7=0;
					}
			//$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(C.*) FROM cc_m_customers C,cc_m_time t " ));
			?>
				<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
					<div class="boxchart"><?php echo $reg7.",".$reg6.",".$reg5.",".$reg4.",".$reg3.",".$reg2.",".$reg1.",".$reg0; ?></div>
					<div class="number"><?php $newdate=date('Y-m-j',strtotime ( '-7 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(total_price) FROM cc_m_order C where order_date>='$newdate' "));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total_price) as count FROM cc_m_order C where order_date>='$newdate'"));
						$reg_count=$row['count'];
						echo $reg_count;
					} 
					$newdate1=date('Y-m-j',strtotime ( '-14 days' , strtotime ( $date ) ));
					$numrows1=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(total_price) FROM cc_m_order C where order_date>='$newdate' "));
					if($numrows1!=0)
					{	$row1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(total_price) as count FROM cc_m_order C where order_date>='$newdate1' and order_date<'$newdate'"));
						$reg_count1=$row1['count'];
						
					}
					if($reg_count>=$reg_count1){
					?><i class='icon-arrow-up'></i><?php } else {?><i class='icon-arrow-down'></i> <?php } ?></div>
					<div class="title">Sales</div>
					<div class="footer">
							<span class="count">
								<span class="unit">In last 7 days</span>
							</span>
					</div>
					<!--<div class="footer">
						<a href="#"> read full report</a>
					</div>-->
				</div>
				<!-- Rushi disply no of orders here -->
				<?php
			$day=date("d");
			$month=date("m");
			$year=date("y");
			$date = date('Y-m-j');
$newdate = strtotime ( '-7 days' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-j' , $newdate );


					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order C where order_date='$date'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_order C where order_date='$date'"));
						$reg0=$row['count'];
					}
					else
					{
						$reg0=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-1 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order C where order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_order C where order_date='$newdate'"));
						$reg1=$row['count'];
					}
					else
					{
						$reg1=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-2 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order C where order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_order C where order_date='$newdate'"));
						$reg2=$row['count'];
					}
					else
					{
						$reg2=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-3 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order C where order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_order C where order_date='$newdate'"));
						$reg3=$row['count'];
					}
					else
					{
						$reg3=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-4 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order C where order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_order C where order_date='$newdate'"));
						$reg4=$row['count'];
					}
					else
					{
						$reg4=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-5 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order C where order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_order C where order_date='$newdate'"));
						$reg5=$row['count'];
					}
					else
					{
						$reg5=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-6 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order C where order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_order C where order_date='$newdate'"));
						$reg6=$row['count'];
					}
					else
					{
						$reg6=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-7 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order C where order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_order C where order_date='$newdate'"));
						$reg7=$row['count'];
					}
					else
					{
						$reg7=0;
					}
			//$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(C.*) FROM cc_m_customers C,cc_m_time t " ));
			?>
				<div class="span3 statbox green" onTablet="span6" onDesktop="span3">
					<div class="boxchart"><?php echo $reg7.",".$reg6.",".$reg5.",".$reg4.",".$reg3.",".$reg2.",".$reg1.",".$reg0; ?></div>
					<div class="number"><?php $newdate=date('Y-m-j',strtotime ( '-7 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order C where order_date>='$newdate' "));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_order C where order_date>='$newdate'"));
						$reg_count=$row['count'];
						echo $reg_count;
					} 
					$newdate1=date('Y-m-j',strtotime ( '-14 days' , strtotime ( $date ) ));
					$numrows1=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order C where order_date>='$newdate' "));
					if($numrows1!=0)
					{	$row1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_order C where order_date>='$newdate1' and order_date<'$newdate'"));
						$reg_count1=$row1['count'];
						
					}
					if($reg_count>=$reg_count1){
					?><i class='icon-arrow-up'></i><?php } else {?><i class='icon-arrow-down'></i> <?php } ?></div>
				
					<div class="title">Orders</div>
					<div class="footer">
							<span class="count">
								<span class="unit">In last 7 days</span>
							</span>
					</div>
					<!--<div class="footer">
						<a href="#"> read full report</a>
					</div>-->
				</div>
				
				
			</div>		

						<div class="row-fluid hideInIE8 circleStats">
				
				<div class="span2" onTablet="span4" onDesktop="span2">
                	<div class="circleStatsItemBox yellow">
						<div class="header">Sales Ratio</div>
						<span class="percent">Percent</span>
						<?php //$newdate=date('Y-m-j',strtotime ( '-7 days' , strtotime ( $date ) ));
						$year = date('Y', strtotime($date));
						$month = date('m', strtotime($date));
						$newdate=$year."-".$month;
						$newdate=$newdate."-00";
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(total_price) FROM cc_m_order C where STR_TO_DATE(order_date,'%Y-%m')='$newdate' "));
					if($numrows!=0)
					{	$query="SELECT SUM(total_price) as count FROM cc_m_order C where STR_TO_DATE(order_date,'%Y-%m')='$newdate'";
						$row=mysqli_fetch_assoc(mysqli_query($conn,$query));
						$reg_count=$row['count'];
						//echo $query;
						
					} 
					$newdate1=date('Y-m',strtotime ( '-1 months' , strtotime ( $date ) ));
					$newdate1=$newdate1."-00";
					$numrows1=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(total_price) FROM cc_m_order C where STR_TO_DATE(order_date,'%Y-%m')='$newdate' "));
					if($numrows1!=0)
					{	$query="SELECT SUM(total_price) as count FROM cc_m_order C where order_date>='$newdate1' and order_date<'$newdate'";
				//echo $query;
						$row1=mysqli_fetch_assoc(mysqli_query($conn,$query));
						
						$reg_count1=$row1['count'];
						//echo $reg_count1;
						
					}?>
						<div class="circleStat">
                    		<input type="text" value="<?php echo $reg_count/$reg_count1*100; ?>" class="whiteCircle" />
						</div>		
						<div class="footer">
							<span class="count">
								<span class="number"></span>
								<span class="unit">Rs.</span>
							</span>
							<span class="sep"> / </span>
							<span class="value">
								<span class="number"><?php echo $reg_count1; ?></span>
								<span class="unit">Rs.</span>
							</span>	
							
							
						</div>
                	</div>
				</div>

				<div class="span2" onTablet="span4" onDesktop="span2">
                	<div class="circleStatsItemBox green">
						<div class="header">Profit Ratio</div>
						<span class="percent">Percent</span>
						<?php //$newdate=date('Y-m-j',strtotime ( '-7 days' , strtotime ( $date ) ));
						$year = date('Y', strtotime($date));
						$month = date('m', strtotime($date));
						$newdate=$year."-".$month;
						$newdate=$newdate."-00";
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order C where STR_TO_DATE(order_date,'%Y-%m')='$newdate' "));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_order C where STR_TO_DATE(order_date,'%Y-%m')='$newdate'"));
						$reg_count=$row['count'];
						
					} 
					$newdate1=date('Y-m',strtotime ( '-1 months' , strtotime ( $date ) ));
					$newdate1=$newdate1."-00";
					$numrows1=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order C where STR_TO_DATE(order_date,'%Y-%m')='$newdate' "));
					if($numrows1!=0)
					{	$row1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_order C where order_date>='$newdate1' and order_date<'$newdate'"));
						$reg_count1=$row1['count'];
						
					}?>
						<div class="circleStat">
                    		<input type="text" value="<?php echo $reg_count/$reg_count1*100; ?>" class="whiteCircle" />
						</div>
						<div class="footer">
							<span class="count">
								<span class="number">0</span>
								<span class="unit">Rs.</span>
							</span>
							<span class="sep"> / </span>
							<span class="value">
								<span class="number"><?php echo $reg_count1; ?></span>
								<span class="unit">Rs.</span>
							</span>	
						</div>
                	</div>
				</div>

				<div class="span2" onTablet="span4" onDesktop="span2">
                	<div class="circleStatsItemBox greenDark">
						<div class="header">Orders Ratio</div>
						<span class="percent">Percent</span>
						<?php //$newdate=date('Y-m-j',strtotime ( '-7 days' , strtotime ( $date ) ));
						$year = date('Y', strtotime($date));
						$month = date('m', strtotime($date));
						$newdate=$year."-".$month;
						$newdate=$newdate."-00";
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order C where STR_TO_DATE(order_date,'%Y-%m')='$newdate' "));
					
					if($numrows!=0)
					{	
						$query="SELECT COUNT(*) as count FROM cc_m_order C where STR_TO_DATE(order_date,'%Y-%m')='$newdate'";
						//echo $query;
						$row=mysqli_fetch_assoc(mysqli_query($conn,$query));
						$reg_count=$row['count'];
						
						
					} 
					$newdate1=date('Y-m',strtotime ( '-1 months' , strtotime ( $date ) ));
					$newdate1=$newdate1."-00";
					$numrows1=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order C where STR_TO_DATE(order_date,'%Y-%m')='$newdate' "));
					if($numrows1!=0)
					{	$row1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as count FROM cc_m_order C where order_date>='$newdate1' and order_date<'$newdate'"));
						$reg_count1=$row1['count'];
						
					}?>
                    	<div class="circleStat">
                    		<input type="text" value="<?php echo $reg_count/$reg_count1*100; ?>" class="whiteCircle" />
						</div>
						<div class="footer">
							<span class="count">
								<span class="number">0</span>
								<span class="unit">Orders</span>
							</span>
							<span class="sep"> / </span>
							<span class="value">
								<span class="number"><?php echo $reg_count1; ?></span>
								<span class="unit">Orders</span>
							</span>	
						</div>
                	</div>
				</div>
				<div class="span2 statbox green" onTablet="span4" onDesktop="span2">
				
					
					<div class="title">Top Customer</div>
					<?php //$newdate=date('Y-m-j',strtotime ( '-7 days' , strtotime ( $date ) ));
						$year = date('Y', strtotime($date));
						$month = date('m', strtotime($date));
						$newdate=$year."-".$month;
						$newdate=$newdate."-00";
						$query="SELECT cust_fname as fname,cust_lname as lname,count(C.cust_uname) as occu FROM cc_m_order C, cc_m_customer_details where STR_TO_DATE(order_date,'%Y-%m')='$newdate' group by C.cust_uname order by occu DESC LIMIT 1  ";
						//echo $query;
					$numrows=mysqli_num_rows(mysqli_query($conn,$query));
					
					if($numrows!=0)
					{	
						
						//echo $query;
						$row=mysqli_fetch_assoc(mysqli_query($conn,$query));
						$top_customer=$row['fname']." ".$row['lname'];
						$count=$row['occu'];
						
						
					} 
					?>
					<div class="header"><b><?php echo $top_customer ?></b></div>
					<div class="footer">
							<span class="count">
								<span class="unit"><?php echo $count; ?></span>
								<span class="unit">Orders</span>
							</span>
					</div>
					
					<!--<div class="footer">
						<a href="#"> read full report</a>
					</div>-->
				</div>
					<div class="span2 statbox blue" onTablet="span4" onDesktop="span2">
				
					<!--<div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>-->
					<?php //$newdate=date('Y-m-j',strtotime ( '-7 days' , strtotime ( $date ) ));
						$year = date('Y', strtotime($date));
						$month = date('m', strtotime($date));
						$newdate=$year."-".$month;
						$newdate=$newdate."-00";
						$query="SELECT fm_fname as fname,fm_lname as lname,count(fdetails.fm_uname) as occu FROM cc_m_order_details odetails, cc_m_order oorder, cc_m_products product, cc_m_farmer_details fdetails where odetails.order_id=oorder.order_id and odetails.pid=product.pid and product.fm_uname=fdetails.fm_uname and STR_TO_DATE(order_date,'%Y-%m')='$newdate' group by fdetails.fm_uname order by occu DESC";
						//echo $query;
					$numrows=mysqli_num_rows(mysqli_query($conn,$query));
					
					if($numrows!=0)
					{	
						
						//echo $query;
						$row=mysqli_fetch_assoc(mysqli_query($conn,$query));
						$top_farmer=$row['fname']." ".$row['lname'];
						$count=$row['occu'];
						
						
					} 
					?>
					<div class="header"><b><?php echo $top_farmer ?></b></div>
					<div class="title">Top Farmer</div>
					<div class="footer">
							<span class="count">
								<span class="unit"><?php echo $count; ?></span>
								<span class="unit">Products</span>
							</span>
					</div>
					<!--<div class="footer">
						<a href="#"> read full report</a>
					</div>-->
				</div>
				<div class="span2 statbox yellow " onTablet="span4" onDesktop="span2">
				
					<!--<div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>-->
					<?php //$newdate=date('Y-m-j',strtotime ( '-7 days' , strtotime ( $date ) ));
						$year = date('Y', strtotime($date));
						$month = date('m', strtotime($date));
						$newdate=$year."-".$month;
						$newdate=$newdate."-00";
						$query="SELECT pname as pname,count(odetails.order_id) as occu FROM cc_m_order_details odetails, cc_m_products product , cc_m_order oorder where STR_TO_DATE(order_date,'%Y-%m')='$newdate' and product.pid=odetails.pid and oorder.order_id=odetails.order_id group by odetails.pid order by occu DESC LIMIT 1";
						//echo $query;
					$numrows=mysqli_num_rows(mysqli_query($conn,$query));
					
					if($numrows!=0)
					{	
						
						//echo $query;
						$row=mysqli_fetch_assoc(mysqli_query($conn,$query));
						$top_product=$row['pname'];
						$count=$row['occu'];
						
						
					} 
					?>
					
					<div class="header"><b><?php echo $top_product ?></b></div>
					<div class="title">Top Product</div>
					<div class="footer">
							<span class="count">
								<span class="unit"><?php echo $count ?></span>
								<span class="unit">Orders</span>
							</span>
					</div>
					<!--<div class="footer">
						<a href="#"> read full report</a>
					</div>-->
				</div>
			
			<br><br>
<br>	<br><br><br><br><br><br><br><br><br>		<div class="row-fluid">	
<?php
	$query1="SELECT COUNT(*) as count From cc_m_customer";
	$query2="SELECT COUNT(*) as count FROM cc_m_order where order_status='to be approved' ";
	$query3="SELECT COUNT(*) as count FROM cc_m_order";
	$query4="SELECT COUNT(*) as count FROM cc_m_products";
	$query5="SELECT COUNT(*) as count FROM cc_m_farmer";
	$query6="SELECT COUNT(*) as count FROM cc_m_delivery";
	$numrows1=mysqli_num_rows(mysqli_query($conn,$query1));
	$numrows2=mysqli_num_rows(mysqli_query($conn,$query2));
	$numrows3=mysqli_num_rows(mysqli_query($conn,$query3));
	$numrows4=mysqli_num_rows(mysqli_query($conn,$query4));
	$numrows5=mysqli_num_rows(mysqli_query($conn,$query5));
	$numrows6=mysqli_num_rows(mysqli_query($conn,$query6));
	if($numrows1!=0){$row=mysqli_fetch_assoc(mysqli_query($conn,$query1));$count1=$row['count'];} else $count1=0;
	if($numrows2!=0){$row=mysqli_fetch_assoc(mysqli_query($conn,$query2));$count2=$row['count'];} else $count2=0;
	if($numrows3!=0){$row=mysqli_fetch_assoc(mysqli_query($conn,$query3));$count3=$row['count'];} else $count3=0;
	if($numrows4!=0){$row=mysqli_fetch_assoc(mysqli_query($conn,$query4));$count4=$row['count'];} else $count4=0;
	if($numrows5!=0){$row=mysqli_fetch_assoc(mysqli_query($conn,$query5));$count5=$row['count'];} else $count5=0;
	if($numrows6!=0){$row=mysqli_fetch_assoc(mysqli_query($conn,$query6));$count6=$row['count'];} else $count6=0;?>
				<!-- Display no of users from customer table-->
				<a class="quick-button metro yellow span2">
					<i class="icon-group"></i>
					<p>Users</p>
					<span class="badge"><?php echo $count1;?></span>
				</a>
				<!-- Rushi here show how many things are waiting to be apporved-->
				<a class="quick-button metro red span2">
					<i class="icon-comments-alt"></i>
					<p>Order to be approved</p>
					<span class="badge"><?php echo $count2;?></span>
				</a>
				<!--Display count of orders from order table-->
				<a class="quick-button metro blue span2">
					<i class="icon-shopping-cart"></i>
					<p>Orders</p>
					<span class="badge"><?php echo $count3;?></span>
				</a>
				<!--Display no of products from product table here -->
				<a class="quick-button metro green span2">
					<i class="icon-barcode"></i>
					<p>Products</p>
					<span class="badge"><?php echo $count4;?></span>
				</a>
				
				<a class="quick-button metro pink span2">
					<i class="icon-leaf"></i>
					<p>Farmers</p>
					<span class="badge"><?php echo $count5;?></span>
				</a>
				<a class="quick-button metro black span2">
					<i class="icon-gift"></i>
					<p>Delivery Persons</p>
					<span class="badge"><?php echo $count6;?></span>
				</a>
				
				<div class="clearfix"></div>
								
			</div><!--/row-->
			
       

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>
			
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
	
</body>
</html>
