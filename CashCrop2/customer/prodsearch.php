                                                                <?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name="db_cashcrop";

// Create connection
$con = mysqli_connect($servername, $username, $password, $db_name);

if(isset($_GET['text']))
{
$text=$_GET['text'];

//echo $text;
$query="Select * from cc_m_products C,cc_m_farmer_details D where (C.fm_uname=D.fm_uname)  AND (pname like '%$text%' OR pcategory like'%$text%' OR C.fm_uname like'%$text%' OR pid='$text' OR fm_fname like'%$text%' OR fm_lname like'%$text%')";
	
	//echo $query;
$result = mysqli_query($con,$query);
}
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
						


                            
                            