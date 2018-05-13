                                                                
<?php include 'cart_fns.php';
$con=db_connect();
if(isset($_GET['cat']))
{
$stream=$_GET['cat'];
//$main=$_GET['main'];
//echo $main;
$query="Select * from cc_m_products where pcategory like '%$stream%'";
	if(!empty($_GET['subcat']))
	{
		$sem=$_GET['subcat'];
		$query.="AND psubcategory like '%$sem%'";
	}
//	echo $query;
$result = mysqli_query($con,$query);
}
//echo count($result);
for($i=0;$i<550;$i++)
{
	$numrows=mysqli_num_rows(mysqli_query($con,$query));
if($row = mysqli_fetch_assoc($result))
{
$new="Sorry Out Of Stock";


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
$category=$row['pcategory'];
$farmer=$row['fm_uname'];
$price=$row['pprice'];


if($numrows>=1)
{

if($row['quantity']>=1){
$new="A product available";}

}


$image=$row['pimage'];

$desc=$row['pdesc'];

$unit=$row['unit'];
$qty=$row['quantity'];
//$jsonData = '{ "id":$id, "isbn":$isbn, "name":"United States" }';
//$sequential = array('id'=>$id,'isbn'=>$isbn, 'name'=>$name, 'publ'=>$publ,'auth'=>$auth,'price'=>$price,'new'=>$new,'img'=>$img,'disc'=>$disc,'strea'=>$strea,'edi'=>$edi,'semes'=>$semes);
//echo json_encode($sequential);
?>
<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img img src="/CashCrop/farmer/images/products/<?php echo $image; ?>" alt="<?php echo $image; ?>" />
										<h2><strong>Rs.</strong> <?php echo $price;?></h2>
										<p><?php echo $name1; ?></p>
										<button onclick="myAddcart(<?php echo $pid?>)" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
										<h5 id="hello"></h5>
											<h2><?php echo $name; ?></h2>
											<p><strong>Farmer : </strong><?php echo $farmer; ?></p>
											<p><strong>Pid : </strong><?php echo $pid; ?></p>
											<p><strong>Price : Rs. </strong><?php echo $price; ?></p>
											<p><strong>Unit : </strong><?php echo $unit; ?></p>
											<p><strong>Quantity Available : </strong><?php echo $qty; ?></p>
											<p><?php echo $new; ?></p>
											<p>Quantity : <input id="<?php echo $pid ?>qty" type="number" value="1" min="1" max="99" /></p>
											
											<button id="addc"onclick="myAddcart(<?php echo $pid?>)" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>
<?php }
	else{  echo "total ".$i." results";break;}
	} ?>

						
						
						

                            
                            