                                <!DOCTYPE html><html lang="en">
<head>
<?php 
include 'header.php';

?>
</head><!--/head-->
<body><header id="header">

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					
					<div class="col-sm-9">
						<div class="search_box pull-right">
							<input id="search" type="text"  placeholder="Search Category,Product,Farmer"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#engg">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											<p id="cat1" onclick="javascript:proddhoond(this.id);">Fruits and Vegetables</p>
										</a>
									</h4>
								</div>
								<div id="engg" class="panel-collapse collapse">
									<div class="panel-body">
										
										<select id="cat1subcat1" class="btn dropdown-toggle selectpicker" data-toggle="dropdown" onchange="proddhoond(this.id)">
											<option value="">Select Sub-Category</option>
											<option value="Fresh Fruits">Fresh Fruits</option>
											<option value="Fresh Vegetables">Fresh Vegetables</option>
											
										</select>
										<br>
										<br>										
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#es">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											<p id="cat2" onclick="javascript:proddhoond(this.id);">Fresh Flowers</p>
										</a>
									</h4>
								</div>
								
							</div>	
						</div>
					<!--/category-products-->
					
						
						
						<div class="shipping text-center"><!--shipping-->
						
							<!--image-->
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div id="items" class="features_items"><!--features_items-->
					
					<?php  
					$con=db_connect();
					$query="SELECT  * FROM cc_m_products";
								//echo $query;
								$result=mysqli_query($con,$query);
								$prcount=0;
								while($row = mysqli_fetch_assoc($result))
{
	if($row['quantity']=0)
	{
$new="Sorry Out Of Stock";
	}

$pid=$row['pid'];
$name2=$row['pname'];
$len=strlen($name2);
if($len<35)
{
$add=35-$len;
$name1=str_pad($name2,$add);
}
else{$name1=substr($name2,0,60);}
$name=substr($name1,0,48);
$pcategory=$row['pcategory'];
$farmer=$row['fm_uname'];
$price=$row['pprice'];
$image=$row['pimage'];




$img=$row['pimage'];

$desc=$row['pdesc'];

$unit=$row['unit'];
$qty=$row['quantity'];
?>
<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="/CashCrop/farmer/images/products/<?php echo $image; ?>" alt="<?php echo $image; ?>" />
										<h2><strong>Rs.</strong> <?php echo $price;?></h2>
										<p><?php echo $name1; ?></p>
										<button onclick="myAddcart(<?php echo $pid?>)" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
										<h5 id="hello"></h5>
											<h2><?php echo $name; ?></h2>
											<p><strong>Farmer : </strong><?php echo $farmer; ?></p>
											<p><strong>pid : </strong><?php echo $pid; ?></p>
											<p><strong>Price : Rs. </strong><?php echo $price; ?></p>
											<p><strong>Unit : </strong><?php echo $unit; ?></p>
											<p><strong>Quantity Available : </strong><?php echo $qty; ?></p>
											<p><?php //echo $new; ?></p>
											<p>Quantity : <input id="<?php echo $pid ?>qty" type="number" value="1" min="1" max="99" /></p>
											
											<button id="addc"onclick="myAddcart(<?php echo $pid?>)" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php } ?>

					
					</div><!--features_items-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
							<?php 
							$con=db_connect();
					
							
								$query="SELECT  * FROM cc_m_recommended";
								//echo $query;
								$result=mysqli_query($con,$query);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
   // exit();
}
								
								$count=0;
							
								while($row=mysqli_fetch_assoc($result))
								{
									//echo "aya";
									if(mysqli_fetch_assoc($result))
								{
									$id=$row['pid'];
									//echo $id;
									$query1="Select * from cc_m_products where pid=$id";
									//echo $query1;
									$result1 = mysqli_query($con,$query1);
									$row = mysqli_fetch_array($result1,MYSQLI_ASSOC);
									$name2=$row['pname'];
										$pid=$row['pid'];
										//echo $name2;
									$pdesc=$row['pdesc'];
									$auth=$row['pcategory'];
									$price=$row['pprice'];
									$image=$row['pimage'];
									$farmer=$row['fm_uname'];
									$unit=$row['unit'];
									$edi=$row['avail_zip'];
									$semes=$row['quantity'];
	
									if($row['quantity']>=1)
									{ 
									if($count<3)
									{
							?>			
										<div class="item active">	
											<div class="col-sm-4">
												<div class="product-image-wrapper">
													<div class="single-products">
														<div class="productinfo text-center">
															<img src="/CashCrop/farmer/images/products/<?php echo $image; ?>" alt="<?php echo $image; ?>"/>
															<h2><?php echo "Rs. ".$price; ?></h2>
															<p><?php echo $name2; ?></p>
															<input type="hidden" id="<?php echo $pid ?>qty" type="number" value="1" min="1" max="99" />
															<button id="addc"onclick="myAddcart(<?php echo $pid?>)" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
														</div>
												
													</div>
												</div>
											</div>
									
										</div>
										
										<?php $count++; }  ?>
										<div class="item ">	
											<div class="col-sm-4">
												<div class="product-image-wrapper">
													<div class="single-products">
														<div class="productinfo text-center">
															<img src="/CashCrop/farmer/images/products/<?php echo $image; ?>" alt="<?php echo $image; ?>"/>
															<h2><?php echo "Rs. ".$price; ?></h2>
															<p><?php echo $name2; ?></p>
															<input type="hidden" id="<?php echo $pid ?>qty" type="number" value="1" min="1" max="99" />
															<button id="addc"onclick="myAddcart(<?php echo $pid?>)" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
														</div>
												
													</div>
												</div>
											</div>
									
										</div>
								<?php  }} $row=mysqli_fetch_assoc($result);} ?>
								
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
						
					</div><!--/recommended_items-->
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2016 cashcropcashcrop.com | All rights reserved.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/trans.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
	<script src="select.js"></script>
	<script src="js/ajax.js"></script>
	<script src="js/classie.js"></script>
    <script src="js/modalEffects.js"></script>
	
</body>
</html>
                            
                            
                            
                            
                            
                            
                            