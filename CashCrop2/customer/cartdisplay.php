<?php if (!isset($_SESSION)) { session_start();$_SESSION['total_price']=0;}
							include 'cart_fns.php';
							$total_price=0;
							if(isset($_SESSION['cart']) && total_items($_SESSION['cart']))
							{ $total_price=0.00;?>
							<form action="update.php" method="post">
							<table class="table">
							
							<th>ITEM</th>
							<th>PRICE</th>
							<th>QTY</th>
							<th>SUBTOTAL</th>
							<th>REMARKS</th>
							
							
							<?php 
							foreach($_SESSION['cart'] as $id => $qty):
								$product = find_product($id);
								
							?>
							<tr>
							
							<td><?php echo $product['pname']; ?></td>
							<td><?php echo $product['pprice']; ?></td>
							<td><input type="text" size="2" maxlength="2" name="<?php echo $id; ?>" value="<?php echo $qty;?>"></td>
							<td><?php echo $product['pprice'] * $qty; ?></td>
							<?php $total_price+=$product['pprice'] * $qty; ?></td>
							<td></td>
							</tr><?php endforeach; 
							$_SESSION['total_price']=$total_price; ?>
							</table>
							<input type="submit" name="update"class="btn btn-default add-to-cart" Value="Update"></Input>
							<br>
							<table>
							<tr><td>Total :</td><td><?php echo $total_price; ?></td></tr>
							<tr><td>Shipping Charges :</td><td>40</td></tr>
							<tr><td>Grand Total :</td><td><strong><?php echo $total_price+80; ?></strong></td></tr>
							</table>
							
							</form>
							<?php } else {?>
							<Center></h3>OOPSSSS...! There is nothing in Your Cart....<a href="index.php">Continue Shopping</a></h3></center><?php } ?>
							 <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn">Close</a>
		 <?php if(!empty($_SESSION['cart'])){ ?>
          <a onclick=buygoods() class="btn btn-primary">Buy Goods</a><?php } ?>
        </div>