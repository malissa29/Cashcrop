<!DOCTYPE html>
<html lang="en">
<head>
 <link href="data:image/x-icon;base64,AAABAAEAEBAAAAEACABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAABLOugASDrxAPX2+QDu39AA6+PcAHAuCQD5/fwAcysJAD8+yAD9/fwA/v7/AP/+/wDPwqgAdzQJAEIyKABNQrkAdjoJAJFmTABMQmAAeTgMAEwvgQBGMuwAT0LCAGlgwQDw18sA7dvOAPj96wBPQYoAmXVVAGsyBAD7//oA/fr9APz9/QDy5OAAdTcBAHY4BAB5NwEAdzoBADZC8ABcSbQASD3zAJhxUwDz+fsARFXhAOvj1QDt4tIA9P/7APf8+wBUKkcA7+TYAHE0AgD/+/gAcjUFAHM3AgDrv80A4NHNAGtxKADLsKIA7d/TAGRXlwCNXDoA9/75APn5/AD9+PkA/Pn8AK9+gwD6/vkAbDYJAFNCjwD8/PwAyMOuAP7//AB1NwMA4tDLAHg3AwB/UDIAOEPsAHg6DACzqWsAt5d9AI10VQCEVzUAwLigAPn09wCKXkEA/vvxAPz7+gD9/voAcDkBAODSwAD9//0A/v/9AIlpRwD///0ANTn8AHg6BABiWgoAfTkKAHw+BwD09fIA9fjyAGkwAgBZT7cA9fb+AG0wAgD4+f4Al3xcAHIwAgBwNwUA/v/+AHI8AgD///4AjWZIAHc2AgCifVYAdzcFAOfSwQDd28oAg2xsAOHd0AB9Nw4AxK2cAH85CwCDPQUAQEL0AJdvUQBFPP0A6t7cAPz78wBkOW4AWlxQAL2hlAB1LAkA/v/2APv//wD+/vwAdDQGAP3//wD+//8AejADAP///wDz5uIAeDYDAHc5AwB5PAMAPznsAGGYEQCJUjIA+ProAHAyAQC7nJgAbzYEAPv+/QD//foAcDsBADwz5ADtyboAeDUBAHk4AQBaT4QAkWpEAHs5BACigWQAfz0HAFRXQwBlLAIAyq2eAOzfzwBaNHwAnHJKAPz5+AD6/fsA+f7+AP76+wD+/PgAn3NfAO/l4QD+/fsA/f7+AHM2BQCLY0sA8+nbAHY2BQB2OAIAeTUCAHk6CABtVGcA6tnHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAim1tjAtFM1Q8VT1biQtaiolvRy2iZTJiJJcFKSxXC1qMIHCISCOOszS4NZ5zS29vCwJNt7e3t7e3t7e3t2xjjIkDlbe3t7e3tyK3t7dKdAqYqRC3t7ePt0hft7e3JZMvLosNbmGaaxyvhJ0duaOlh41YcXoTg7QoKwymoZC2e7tqeFwYdj5oCBYHOXenoEN9nDq6kQ9WSZS1RmdmOzE3TxoJgZsBsLGrIa0qJ34XlpmyshFeTKiuQgQGUxUAebKKiokfMCYSG1kZP1J8DqyMjIyMjKpQgpKfREGkUR6MjIyMjIyGQH9yYDgUNmRvjIyMjIyMC4pvaU51gIVvXYyMjAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=" rel="icon" type="image/x-icon" />	

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
var auto_refresh = setInterval(
function ()
{
$('#bomb').load('cartrefresh.php').fadeIn("slow");
}, 1000);</script>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Padhlebeta</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script>function redit()
    {
    window.location='index.php';
    } </script>
</head>
<!--/head-->

<body>

<div class="modal" id="myModal">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Cart</h4>
        </div>
        <div class="modal-body" id="cartitems">
       
       
		 </div>
      </div>
    </div>
</div>
	<header id="header"><!--header-->
		<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +91-9145166794 | +91-9730733026</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> cashcrop@gmail.com </a></li><div id="hi1"></div>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="padhlebeta" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right" >
							<ul class="nav navbar-nav">
								<li><a href="contact-us.php"><i class="fa fa-comment"></i> Contact</a></li>
								<li  data-toggle="modal" href="#myModal" id="cartc" onclick="javascript:$('#cartitems').load('cartdisplay.php').fadeIn();"><a><i class="fa fa-shopping-cart"></i> Cart <strong id="bomb"> </strong></a></li>
								<?php if(!empty($_SESSION['user1'])){?>
								<li class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-unlock"></i>
								<?php echo $_SESSION['user1'];?>
								</a>
								<div class="dropdown-menu">
								<form>
									<li><a>My Profile</a></li>
									<li><a>My Orders</a></li>
									<li><a href="logout.php" >LogOut</a></li>
								</form>
								</div>
								<?php } else {?></li>
								
								<li><a href="login.php"><i class="fa fa-lock"></i>Login</a></li><?php }?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header><!--/header-->
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form action="<?php $_php_self ?>" method="post">
							<input type="text" placeholder="Username" name="username" />
							<input type="password" name="pswd" placeholder="Password" required />
							
							<button type="submit" id="submit2" name="submit2" class="btn btn-default" value="submit2">Login</button>
						</form><div id="pp">
						</div>
											</div>
													<?php
					include 'cart_fns.php';
					function clean($string)
{

return preg_replace('/[^A-Za-z0-9\-]/',' ',$string);
}

$email="";
if(!empty($_POST['submit2']))
{
$submit2=$_POST['submit2'];
$username=clean((strip_tags($_POST['username'])));

$password=clean(strip_tags($_POST['pswd']));


	if($username  && $password)
	{
		$conn=db_connect();
		
		
		if($username)
		{
			$query=mysqli_query($conn,"SELECT * FROM cc_m_farmer WHERE fm_uname='$username'");
			$query1=mysqli_query($conn,"SELECT * FROM cc_m_farmer_details WHERE fm_uname='$username'");
			
		}
		
		$numrows=mysqli_num_rows($query);
		if($numrows!=0)
		{
			while($row=mysqli_fetch_assoc($query))
			{
				$row1=mysqli_fetch_assoc($query1);
				$dbusername=$row['fm_uname'];
				$dbpassword=$row['fm_pswd'];
				$dbuser=$row1['fm_fname'];
				$status=$row['fm_active_ind'];
				
				
			}
			if(($username==$dbusername && $password==$dbpassword) && $status='Y')
			{
				//if (!isset($_SESSION)) { session_start();}
				//if(!isset($_SESSION['user']))
				//{
				$_SESSION['username']=$dbusername;
				$_SESSION['user1']=$dbuser;
                                
                              // }
                               // header("Refresh: 0;url='index.php'");
				
				
				echo '<script type="text/javascript">'
  					 , 'redit();'
  					 ,'document.getElementById("pp").innerHTML =" You have Successfully logged in";'
  					 , '</script>';
				//header("location:index.php");
				//exit();
				
			
			}
			else
			{
				echo "Password incorret";
  				echo $status.$username.$password;	  
				
			}
		}
		else
		{
			echo "The Username doesnt exist or Enter correct email Please.";
			
		}
	}
	else
	{
		echo "Incomplete Fields.....";
		
	}
	}

?>
					<!--/login form-->
				</div>
		
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New Farmer Signup! </h2>
						<form action="<?php $_php_self ?>" method="post">
							<input type="text" name="fname" placeholder="Fisrt Name" value="<?php if(!empty($_POST['fname'])) echo $_POST['fname']; ?>" required />
							<input type="text" name="lname" placeholder="Last Name" value="<?php if(!empty($_POST['lname'])) echo $_POST['lname']; ?>"/>
						
							<input type="text" name="username1" placeholder="Username" value="<?php if(!empty($_POST['username1'])) echo $_POST['username1']; ?>"  maxlength="25" required />
							<input type="email" name="email1" placeholder="Email Address" value="<?php if(!empty($_POST['email1'])) echo $_POST['email1']; ?>" required  />
							<input type="password" name="pswd1" placeholder="Password" minlength="6" maxlength="25" value="<?php if(!empty($POST['pswd1'])) ?>" required  />
							<input type="password" name="cpswd" placeholder="Confirm Passowd" value="<?php if(!empty($POST['cpswd']))  ?>" required  />
							<input type="text" name="address" placeholder="Address" value="<?php if(!empty($_POST['address'])) echo $_POST['address']; ?>" required  />
							<input type="text" name="city" placeholder="City" value="<?php if(!empty($_POST['city'])) echo $_POST['city']; ?>" required />
							<input type="text" name="district" placeholder="District" value="<?php if(!empty($_POST['district'])) echo $_POST['district']; ?>" required />
							<input type="text" name="state" placeholder="State" value="<?php if(!empty($_POST['state']))echo $_POST['state']; ?>" required />
							<input type="number" name="pin" placeholder="Pincode" maxlength="6" value="<?php if(!empty($_POST['pin']))echo $_POST['pin']; ?>" required  />
							<input type="number" name="phone" placeholder="Phone Number" maxlength="10" value="<?php if(!empty($_POST['phone']))echo $_POST['phone']; ?>" required  />
							<input type="text" name="bank" placeholder="Bank Name" maxlength="20" value="<?php if(!empty($_POST['bank_name']))echo $_POST['bank_name']; ?>" required  />
							<input type="text" name="branch" placeholder="Branch Name" maxlength="20" value="<?php if(!empty($_POST['branch_name']))echo $_POST['branch_name']; ?>" required  />
							<input type="text" name="ifsc" placeholder="IFSC Code" maxlength="16" value="<?php if(!empty($_POST['ifsc']))echo $_POST['ifsc']; ?>" required  />
							<input type="number" name="account" placeholder="Account Number" maxlength="20" value="<?php if(!empty($_POST['account']))echo $_POST['account']; ?>" required  />
							
							<button type="submit" id="submit1" name="submit1" class="btn btn-default" value="submit">Signup</button>
						</form>
					</div>
					<?php

						

if(!empty($_POST['submit1']))
{
$submit1=$_POST['submit1'];
$fname=clean(strip_tags($_POST['fname']));
$lname=clean(strip_tags($_POST['lname']));
//echo $college;
$email1=strip_tags($_POST['email1']);
//echo $email1;
$username1=clean(strtolower(strip_tags($_POST['username1'])));
$confirmpassword=clean(strip_tags($_POST['cpswd']));
$password1=clean(strip_tags($_POST['pswd1']));
$address=clean(strip_tags($_POST['address']));
$city=clean(strip_tags($_POST['city']));
$state=clean(strip_tags($_POST['state']));
$pin=clean(strip_tags($_POST['pin']));
$phone=clean(strip_tags($_POST['phone']));
$bank=clean(strip_tags($_POST['bank']));
$branch=clean(strip_tags($_POST['branch']));
$ifsc=clean(strip_tags($_POST['ifsc']));
$account=clean(strip_tags($_POST['account']));

		$conn=db_connect();
		$query="SELECT fm_uname FROM cc_m_farmer WHERE fm_uname='$username1'";
		//echo $query;`
		$namecheck=mysql_query($query);
		
		$count=mysql_num_rows($namecheck);

		if($count!=0)
		{
		die("Username already exists <u><h3><a href='login.php'>Try Again</a></h3>			</u>");			

		}
		else
		{	if(strlen($password1)>6 && strlen($password1)<26){
			if($password1==$confirmpassword)
				{
				if(strlen($pin)!=6)
				{
					die("Pin should be of 6 Characters.");
				}
				if(strlen($phone)!=10)
				{
					die("Phone Number should be of 10 or 8 Characters.".strlen($phone));
				}
				$sql = "INSERT INTO `cc_m_farmer_details` ('fm_address','fm_city','fm_state','fm_pincode','fm_uname','fm_fname','fm_lname','fm_email','fm_phone','fm_bank_name','fm_branch_name','fm_ifsc_code','fm_account_no')
				VALUES ('$address, '$city','$state','$pin','$username1','$fname','$lname','$email1','$phone','$bank','$branch','$ifsc','$account');";
				
				$sql1=  "INSERT INTO `cc_m_farmer` ('fm_uname','fm_pswd','fm_active_ind')
				VALUES ('$username1','$password1','N');";
				//echo $sql;
				if (mysql_query($sql)&&mysql_query($sql1))
  					{
					
					echo "Congratulations! You have Successfully Registered!";
					unset($_POST);
					
					
					}
				else{
  					echo " You have not registered <u><h3><a href='login.php'>Try Again</a></h3></u>";
  					}
				}
				else
				{
					die("Password does not match");
				}
				}
				else{
					die("Password should be of more than 6 and less 25 characters.");
				}
				
				
			}

}	





?>
					<!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	<footer id="footer"><!--Footer-->
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2016 CashCrop.com | All rights reserved.</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>

</body>
</html>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            