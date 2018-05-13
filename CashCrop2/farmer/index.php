<!DOCTYPE html>
<?php if (!isset($_SESSION)) { session_start();
if(!isset($_SESSION['fm_uname']))
{
//echo "<script>alert('Ooops !!! Kindly Login to access this page !')<script>";
header('Location:login.php');
}
} 
include 'db_connect.php';
$farmer_name=$_SESSION['fm_uname'];?>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>CashCrop Farmer Portal</title>
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
				<a class="brand" href="index.php"><span>Farmer Portal CashCrop</span></a>
								
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
				<li><a href="#">Dashboard</a></li>
			</ul>

			<div class="row-fluid">

				<!-- Rushi display no of orders dispatched here-->
				<?php
			$day=date("d");
			$month=date("m");
			$year=date("y");
			$date = date('Y-m-j');
$newdate = strtotime ( '-7 days' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-j' , $newdate );


					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$date'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$date'"));
						
						$reg0=$row['count'];
					}
					else
					{
						$reg0=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-1 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate'"));
				
						$reg1=$row['count'];
						
						
					}
					else
					{
						$reg1=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-2 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate'"));
						$reg2=$row['count'];
							
					}
					else
					{
						$reg2=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-3 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate'"));
						$reg3=$row['count'];
					
					}
					else
					{
						$reg3=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-4 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate'"));
						$reg4=$row['count'];
						
					}
					else
					{
						$reg4=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-5 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate'"));
						$reg5=$row['count'];
						
					}
					else
					{
						$reg5=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-6 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate'"));
						$reg6=$row['count'];
						
					}
					else
					{
						$reg6=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-7 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate'"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate'"));
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
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date>='$newdate' "));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date>='$newdate'"));
						$reg_count=$row['count'];
						
						echo $reg_count;
					} 
					$newdate1=date('Y-m-j',strtotime ( '-14 days' , strtotime ( $date ) ));
					$numrows1=mysqli_num_rows(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date>='$newdate' "));
					if($numrows1!=0)
					{	$row1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(sub_total) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date>='$newdate1' and B.order_date<'$newdate'"));
						$reg_count1=$row1['count'];
						
					}
					if($reg_count>=$reg_count1){
					?>
					<i class="icon-arrow-up"></i><?php } else { ?><i class="icon-arrow-down"></i><?php } ?></div>
					<div class="title">sales</div>
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


					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$date' group by C.order_id"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$date' group by C.order_id"));
						$reg0=$row['count'];
					}
					else
					{
						$reg0=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-1 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate' group by C.order_id"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate' group by C.order_id"));
						$reg1=$row['count'];
					}
					else
					{
						$reg1=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-2 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate' group by C.order_id"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate' group by C.order_id"));
						$reg2=$row['count'];
					}
					else
					{
						$reg2=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-3 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate' group by C.order_id"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate' group by C.order_id"));
						$reg3=$row['count'];
					}
					else
					{
						$reg3=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-4 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate' group by C.order_id"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate' group by C.order_id"));
						$reg4=$row['count'];
					}
					else
					{
						$reg4=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-5 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate' group by C.order_id"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate' group by C.order_id"));
						$reg5=$row['count'];
					}
					else
					{
						$reg5=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-6 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate' group by C.order_id"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate' group by C.order_id"));
						$reg6=$row['count'];
					}
					else
					{
						$reg6=0;
					}
					$newdate=date('Y-m-j',strtotime ( '-7 days' , strtotime ( $date ) ));
					$numrows=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate' group by C.order_id"));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date='$newdate' group by C.order_id"));
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
					$query1="SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date>='$newdate' group by C.order_id ";
					//echo $query1;
					$numrows=mysqli_num_rows(mysqli_query($conn,$query1));
					if($numrows!=0)
					{	$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date>='$newdate' group by C.order_id"));
						$reg_count=$row['count'];
						echo $reg_count;
					} 
					$newdate1=date('Y-m-j',strtotime ( '-14 days' , strtotime ( $date ) ));
					$numrows1=mysqli_num_rows(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date>='$newdate' group by C.order_id"));
					if($numrows1!=0)
					{	$row1=mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id and B.order_date>='$newdate1' and order_date<'$newdate' group by C.order_id "));
						$reg_count1=$row1['count'];
						
					}
					if($reg_count>=$reg_count1){
					?><i class="icon-arrow-up"></i><?php } else { ?><i class="icon-arrow-down"></i><?php } ?></div>
					<div class="title">orders</div>
					<!--<div class="footer">
						<a href="#"> read full report</a>
					</div>-->
				</div>
				<!--<div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
					<div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
					<div class="number">678<i class="icon-arrow-down"></i></div>
					<div class="title">visits</div>
					<div class="footer">
						<a href="#"> read full report</a>
					</div>
				</div>	-->
				
			</div>		

			<?php  $query1="SELECT COUNT(*) as count FROM cc_m_order_details C,cc_m_order B,cc_m_products prod where fm_uname='$farmer_name' and prod.pid=C.pid and C.order_id=B.order_id";
			$query2="SELECT COUNT(*) as count FROM cc_m_products prod where fm_uname='$farmer_name'";
	$numrows1=mysqli_num_rows(mysqli_query($conn,$query1));
	$numrows2=mysqli_num_rows(mysqli_query($conn,$query2));
if($numrows1!=0){$row=mysqli_fetch_assoc(mysqli_query($conn,$query1));$count1=$row['count'];} else $count1=0;
if($numrows2!=0){$row=mysqli_fetch_assoc(mysqli_query($conn,$query2));$count2=$row['count'];} else $count1=0;	?>
			<div class="row-fluid">	
				
				<!--Display count of orders from order table-->
				<a class="quick-button metro blue span2">
					<i class="icon-shopping-cart"></i>
					<p>Orders</p>
					<span class="badge"><?php echo $count1;?></span>
				</a>
				<!--Display no of products from product table here -->
				<a class="quick-button metro green span2">
					<i class="icon-barcode"></i>
					<p>Products</p>
					<span class="badge"><?php echo $count2;?></span>
				</a>
				<!--
				<a class="quick-button metro pink span2">
					<i class="icon-envelope"></i>
					<p>Messages</p>
					<span class="badge">88</span>
				</a>
				<a class="quick-button metro black span2">
					<i class="icon-calendar"></i>
					<p>Calendar</p>
				</a>-->
				
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
