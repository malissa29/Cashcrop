                                <?php include 'cart_fns.php';
if (!isset($_SESSION)) { session_start();}
 if(isset($_SESSION['user']))
	{	$conn=db_connect();
		
		$tot=total_items($_SESSION['cart']);
		$tot_p=$_SESSION['total_price'];
		$username=$_SESSION['username'];
		$query="Select max(order_id) as maxorder from cc_m_order";
			$result2 = mysqli_query($conn,$query);
			$maxo=mysqli_fetch_assoc($result2);
			$max_order=$maxo['maxorder']+1;
		$tot_del=$tot_p+40;	
		$sql= "INSERT INTO cc_m_order(order_id,cust_uname,order_status,total_price,delivery_charge,grand_total,total_items) VALUES ('$max_order','$username','Placed','$tot_p','40','$tot_del','$tot')";
		$result = mysqli_query($conn,$sql);
		$orderins=0;$orderdetails=0;$order=0;
		//echo $sql;
		//echo $result;
		if($result)
		{
		$orderins=1;
		//$sql2="SELECT MAX(order_id) from cc_m_order where cust_username='$username'";
		//$order=mysqli_query($conn,$sql2);
		//echo $sql2;
		//$maxo=mysqli_fetch_assoc($order);
		//echo $maxo[0];
		}
		foreach($_SESSION['cart'] as $id => $qty):
								$product = find_product($id);
								$bn=$product['pname'];
								$bi=$product['pid'];
								$bp=$product['pprice'];
								$bt=$qty*$bp;
		$sql1="INSERT INTO cc_m_order_details(cust_uname,order_id,pid,quantity,per_price,sub_total) VALUES('$username','$max_order','$bi','$qty','$bp',$bt)"; 
		//echo $sql1;
		$result1 = mysqli_query($conn,$sql1);
		endforeach;
		//echo $result1;
		if($result1)
		{
		$orderdetails=1;}
		if($orderins==1 && $orderdetails==1)
		{
		 echo "Your Order has been placed....";
		 unset($_SESSION['cart']);
		 unset($_SESSION['total_items']);
		 unset($_SESSION['total_price']);
		}
		else
		{
		echo "Order Failed";
		$sql3="delete from orders where order_no=maxo[0]"; 
		
		$result2 = mysql_query($sql3);
		}
	}
	else { echo "You Must <a href='login.php'>login</a> First";
	} ?>
                            