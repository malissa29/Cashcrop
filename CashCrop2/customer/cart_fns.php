<?php function db_connect()
{
   $servername = "localhost";
$username = "root";
$password = "";
$db_name="db_cashcrop";

// Create connection
$con = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
	return $con;
	
}
	
	
	function add_to_cart($id,$qty)
	{
			
		if(isset($_SESSION['cart'][$id]))
		{
			echo "hello";
			
			$_SESSION['cart'][$id]=$_SESSION['cart'][$id]+$qty;
			print_r($_SESSION['cart']);
			return true;
		}
		else
		{
			//echo "sad";
			$_SESSION['cart'][$id]=$qty;
			return true;
		}
		return false;
	}
	function update_cart()
	{
		foreach($_SESSION['cart'] as $id => $qty)
		{
			if($_POST[$id]== '0')
			{
				unset($_SESSION['cart'][$id]);
			}
			else
			{
				$_SESSION['cart'][$id]=$_POST[$id];
			}
		}
	}
	function total_items($cart)
	{
		$num_items = 0;
		if(is_array($cart))
		{
			foreach($cart as $id => $qty)
			{
				$num_items += $qty;
			}
		}
		return $num_items;
	}
	function total_price($cart)
	{
		$price = 0.0;
		db_connect();
		if(is_array($cart))
		{
			foreach($cart as $id => $qty)
			{
				$query = "Select book_price from book_info where book_info.book_isbn = '$id'";
				$result = mysql_query($query);
				if($result)
				{
						$item_price = mysql_result($result, 0, 'Price');
						$price += $item_price * $qty;
				}
			}
		}
		return $price;
	}
	function find_products()
	{
		db_connect();
		$query = "select * from book_info order by book_info.book_isbn desc";
		$result = mysql_query($query);
		$result = db_result_to_array($result);
		return $result;
	}
	function find_product($id)
	{
		$con=db_connect();
		$query="select * from cc_m_products where cc_m_products.pid = '$id'";
		//$query = sprintf("select * from book_info where book_info.book_isbn = '%s'",mysql_real_escape_string($id));
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
?>