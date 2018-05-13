<?php include 'cart_fns.php';
session_start();
$tt=0; 
if(isset($_SESSION['cart']))
{foreach($_SESSION['cart'] as $id => $qty):
								$product = find_product($id);
								
								 $tt+=$product['pprice'] * $qty;
								 endforeach;  echo " Total :".$tt;
}								 ?>
 

                            