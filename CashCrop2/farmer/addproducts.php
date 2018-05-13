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
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add New Product</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Product details</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" action="<?php
$_php_self;
?>" method="post" enctype="multipart/form-data">
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Product Name </label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead" name="product_name" required  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
								<p class="help-block">Tell us what you want to sell !</p>
							  </div>
							</div>
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Description</label>
							  <div class="controls">
								<textarea class="cleditor" id="textarea2" name="product_desc" rows="3"></textarea>
								<p class="help-block">What is so special about it ?</p>
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="fileInput">Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" name="fileToUpload" id="fileToUpload" required type="file">
								<p class="help-block">How does it look?</p>
							  </div>
							</div> 
							<div class="control-group">
							  <label class="control-label" for="typeahead">Unit </label>
							  <div class="controls">
								<input type="text" class="span2 typeahead" id="typeahead" name="product_unit" required  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
								<p class="help-block">How do you measure it ?</p>
							  </div>
							</div>
							<div class="control-group">
								<label class="control-label" for="appendedPrependedInput">Price per Unit</label>
								<div class="controls">
								  <div class="input-prepend input-append">
									<span class="add-on">INR</span><input id="appendedPrependedInput" name="price_per_unit" required size="16" type="text"><span class="add-on">.00</span>
								  </div>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="selectError2">Category</label>
								<div class="controls">
									<select data-placeholder="Can you put it in basket?" name="product_cat" id="selectError2" data-rel="chosen">
										<option value=""></option>
										<optgroup label="Vegetables">
										  <option value="Fresh Vegetables">Fresh Vegetables</option>
										  
										</optgroup>
										<optgroup label="Fruits">
										  <option value="Fresh Fruits">Fresh Fruits</option>
										  
										</optgroup>
										<optgroup label="Fresh Flowers">
										  <option value="Fresh Flowers">Fresh Flowers</option>
										 
										</optgroup>
										
								  </select>
								</div>
							  </div>
							  
							
							

							        
							
							<div class="form-actions">
							  
							   <input type="submit" class="btn btn-primary" value="Save Changes" id="submit_product" name="submit_product"></input>
							   <input type="reset" class="btn" value="Cancel" ></input>
						
							</div>
						  </fieldset>
						</form>
 <?php
if (!empty($_POST['submit_product'])) {
    
    
    $product_name    = $_POST['product_name'];
    $product_desc  = $_POST['product_desc'];
    $product_unit = $_POST['product_unit'];
    $price_per_unit   = $_POST['price_per_unit'];
    $product_cat     = $_POST['product_cat'];
   
    $s_image     = basename($_FILES["fileToUpload"]["name"]);
    
    
    $target_dir    = "images/products/";
    $target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk      = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
    list($width, $height, $type, $attr) = getimagesize($_FILES["fileToUpload"]['tmp_name']);
    
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit_product"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "<script>alert('File is not an image.');</script>";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if ($width > 1024 || $height > 1024) {
        echo ("Exceeded image dimension limits.");
        $uploadOk = 0;
    }
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$query2="SELECT GREATEST((SELECT MAX(PID) FROM cc_m_products), (SELECT MAX(PID) FROM cc_m_upload_products))as maxid ";
			include 'db_connect.php';
			$res=mysqli_query($conn,$query2);
			$row2=mysqli_fetch_assoc($res);
			$nextrow=$row2['maxid']+1;
			$zip="401201,"."401202,"."401203,"."401207,"."401301,"."401302,"."401303,"."400103,"."400101";
            $query  = "INSERT INTO cc_m_upload_products(pid, pname, pdesc, pimage, pprice, pcategory, fm_uname, added_on, unit, avail_zip, Status) VALUES ('".$nextrow."','$product_name','$product_desc','$s_image','$price_per_unit','$product_cat','".$_SESSION['fm_uname']."',now(),'$product_unit','".$zip."','To be approved')";
           //echo $query;
		   $result = mysqli_query($conn,$query);
            if (!$result) {
                echo "<script>alert('Could not enter data:);</script>";
            } else {
                echo  "<script>alert('Entered Data Successfully);</script>";
            }
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
}

?>						

					</div>
				</div><!--/span-->

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
