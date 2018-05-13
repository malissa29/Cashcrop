                                                                                                <html>
<head>
<?php
//ini_set(session.save_path, '/home/sidd2211/tmp');
session_start();
//include 'db_connect.php';


ini_set('display_errors',1); 
error_reporting(E_ALL); 

//if (!isset($_SESSION)) { session_start();$_SESSION['user1']=""; }
//if(isset($_SESSION['cart']))
  //unset($_SESSION['cart']);
if(!isset($_SESSION['cart']))
{
	$_SESSION['cart']=array();
	$_SESSION['total_items'] = 0;
	$_SESSION['total_price']='0.00';
	
}
//print_r($_SESSION['cart']);
//echo $_SESSION['user1'];
	include 'cart_fns.php';
	if(!empty($_GET['isbn']))
	{
	$qty=$_GET['qty'];
	$isbn=$_GET['isbn'];
	
	$add_item=add_to_cart($isbn,$qty);
	 
	//echo $add_item;
	
	}
	//if(empty($GET['isbn']))
	foreach($_SESSION['cart'] as $id => $qty):
								$product = find_product($id);
								 $_SESSION['total_price']+=$product['pprice'] * $qty;
								 endforeach; 
	
?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home | Cashcrop</title>
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
    <link href="data:image/x-icon;base64,AAABAAEAEBAAAAEACABoBQAAFgAAACgAAAAQAAAAIAAAAAEACAAAAAAAAAEAAAAAAAAAAAAAAAEAAAAAAABLOugASDrxAPX2+QDu39AA6+PcAHAuCQD5/fwAcysJAD8+yAD9/fwA/v7/AP/+/wDPwqgAdzQJAEIyKABNQrkAdjoJAJFmTABMQmAAeTgMAEwvgQBGMuwAT0LCAGlgwQDw18sA7dvOAPj96wBPQYoAmXVVAGsyBAD7//oA/fr9APz9/QDy5OAAdTcBAHY4BAB5NwEAdzoBADZC8ABcSbQASD3zAJhxUwDz+fsARFXhAOvj1QDt4tIA9P/7APf8+wBUKkcA7+TYAHE0AgD/+/gAcjUFAHM3AgDrv80A4NHNAGtxKADLsKIA7d/TAGRXlwCNXDoA9/75APn5/AD9+PkA/Pn8AK9+gwD6/vkAbDYJAFNCjwD8/PwAyMOuAP7//AB1NwMA4tDLAHg3AwB/UDIAOEPsAHg6DACzqWsAt5d9AI10VQCEVzUAwLigAPn09wCKXkEA/vvxAPz7+gD9/voAcDkBAODSwAD9//0A/v/9AIlpRwD///0ANTn8AHg6BABiWgoAfTkKAHw+BwD09fIA9fjyAGkwAgBZT7cA9fb+AG0wAgD4+f4Al3xcAHIwAgBwNwUA/v/+AHI8AgD///4AjWZIAHc2AgCifVYAdzcFAOfSwQDd28oAg2xsAOHd0AB9Nw4AxK2cAH85CwCDPQUAQEL0AJdvUQBFPP0A6t7cAPz78wBkOW4AWlxQAL2hlAB1LAkA/v/2APv//wD+/vwAdDQGAP3//wD+//8AejADAP///wDz5uIAeDYDAHc5AwB5PAMAPznsAGGYEQCJUjIA+ProAHAyAQC7nJgAbzYEAPv+/QD//foAcDsBADwz5ADtyboAeDUBAHk4AQBaT4QAkWpEAHs5BACigWQAfz0HAFRXQwBlLAIAyq2eAOzfzwBaNHwAnHJKAPz5+AD6/fsA+f7+AP76+wD+/PgAn3NfAO/l4QD+/fsA/f7+AHM2BQCLY0sA8+nbAHY2BQB2OAIAeTUCAHk6CABtVGcA6tnHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAim1tjAtFM1Q8VT1biQtaiolvRy2iZTJiJJcFKSxXC1qMIHCISCOOszS4NZ5zS29vCwJNt7e3t7e3t7e3t2xjjIkDlbe3t7e3tyK3t7dKdAqYqRC3t7ePt0hft7e3JZMvLosNbmGaaxyvhJ0duaOlh41YcXoTg7QoKwymoZC2e7tqeFwYdj5oCBYHOXenoEN9nDq6kQ9WSZS1RmdmOzE3TxoJgZsBsLGrIa0qJ34XlpmyshFeTKiuQgQGUxUAebKKiokfMCYSG1kZP1J8DqyMjIyMjKpQgpKfREGkUR6MjIyMjIyGQH9yYDgUNmRvjIyMjIyMC4pvaU51gIVvXYyMjAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA=" rel="icon" type="image/x-icon" />	

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>
	
	function buygoods()
	{
	if (confirm("Confirm Your Order !") == true) {
		$.ajax({                                      
    url: 'order.php',     	//the script to call to get data          

   
	//you can insert url argumnets here to pass to   api.php
                                   //for example "id=5&parent=6"
  
  success: function(data)          //on recieve of reply
    {
  

document.getElementById("cartitems").innerHTML =data;

	}
     });
		}
		else {
        alert("Okay take your time and Order Soon....");
		}
	}
	/*else{
    document.getElementById("cartitems").innerHTML = "You must <a href='login.php'> Login </a> First";
	}*/
	function cartupdate()
	{
		$('#cartitems').load('cartdisplay.php').fadeIn();
	}
	var auto_refresh = setInterval(
function ()
{
$('#bomb').load('cartrefresh.php').fadeIn("slow");
}, 1000);
function myAddcart(isbn)
	{
	
	var isbn1=isbn;
	var qty1=isbn1+"qty";
	var qty=$("#"+qty1).val();
	 
	
	
	//alert(qty+"bhaad"+isbn1);
$.ajax({                                      
    url: 'index.php',     	//the script to call to get data          

   data: "isbn="+isbn1+"&qty="+qty,
	//you can insert url argumnets here to pass to   api.php
                                   //for example "id=5&parent=6"
  
  success: function(data)          //on recieve of reply
    {
  
//document.getElementById('hi').innerHTML =+data;
//$('#cartitems').fadeOut('slow').load('#cartitems').fadeIn('slow');
alert("Product Successfully added to the cart");
var container=document.getElementById("cartitems");
var content = container.innerHTML;
container.innerHTML=content;
	}
     });
	}
	
	function myFarmer(fm_uname)
	{
	
	var fm=fm_uname;
	//var qty1=isbn1+"qty";
	//var qty=$("#"+qty1).val();
	 
	
	
	//alert(qty+"bhaad"+isbn1);
$.ajax({                                      
    url: 'prodsearch.php',     	//the script to call to get data          

   data: "text="+fm,
	//you can insert url argumnets here to pass to   api.php
                                   //for example "id=5&parent=6"
  
  success: function(data)          //on recieve of reply
    {
  
//document.getElementById('hi').innerHTML =+data;
//$('#cartitems').fadeOut('slow').load('#cartitems').fadeIn('slow');
document.getElementById('items').innerHTML ='<h2 class="title text-center">Features Items</h2>'+data;

	}
     });
	}
	
	//document.onclick = function(){alert("hello hello");}
	function proddhoond(id)
	{
	
	
		//alert("id is"+id);
		if(!id.localeCompare("cat1subcat1")|| !id.localeCompare("cat1") )
		{
			var para = document.getElementById('cat1');
			var mai = para.firstChild.nodeValue;
			var st=$("#cat1subcat1").val();
			//var sem=$("#eSem").val();
			//alert(st+"box");
		}
		if(!id.localeCompare("cat2")|| !id.localeCompare("cat2subcat1"))
		{
			var para = document.getElementById('cat2');
			var mai = para.firstChild.nodeValue;
			var st=$("#cat2.subcat1").val();
			//var sem=$("#esSem").val();
			//alert(st+sem);
		}
		/*if(!id.localeCompare("bstream")|| !id.localeCompare("bSem")|| !id.localeCompare("bmain"))
		{
			var para = document.getElementById('bmain');
			var mai = para.firstChild.nodeValue;
			var st=$("#bstream").val();
			var sem=$("#bSem").val();
		}
		if(!id.localeCompare("cstream")|| !id.localeCompare("cSem")|| !id.localeCompare("cmain"))
		{
			var para = document.getElementById('cmain');
			var mai = para.firstChild.nodeValue;
			var st=$("#cstream").val();
			var sem=$("#cSem").val();
		}
		if(!id.localeCompare("novelsstream") || !id.localeCompare("novelsmain"))
		{
			var para = document.getElementById('novelsmain');
			var mai = para.firstChild.nodeValue;
			var st=$("#novelsstream").val();
			var sem="";
		}
		if(!id.localeCompare("medstream")|| !id.localeCompare("medyear")|| !id.localeCompare("medicalmain"))
		{
			var para = document.getElementById('medicalmain');
			var mai = para.firstChild.nodeValue;
			var st=$("#medstream").val();
			var sem=$("#medyear").val();
		}
		if(!id.localeCompare("otherstream") || !id.localeCompare("othersmain"))
		{
			var para = document.getElementById('othersmain');
			var mai = para.firstChild.nodeValue;
			var st=$("#othersstream").val();
			var sem="";
		}
	*/
	//alert(st+sem);
	
	$.ajax({                                      
    url: 'prodfind.php',     	//the script to call to get data          

   data: "cat="+mai+"&subcat="+st,                        //you can insert url argumnets here to pass to   api.php
                                   //for example "id=5&parent=6"
  
  success: function(data)          //on recieve of reply
    {
	
     
document.getElementById('items').innerHTML ='<h2 class="title text-center">Features Items</h2>'+data;

//alert();
	}
     });
	}
	 $(document).ready(function () {
       $('#search').keyup(function () { //alert("fu");
	   var text=$("#search").val();
	   
	   $.ajax({
		 url: 'prodsearch.php',     	//the script to call to get data          

		data: "text="+text,                        //you can insert url argumnets here to pass to   api.php
                                   //for example "id=5&parent=6"
       

		success: function(data)          //on recieve of reply
    {
    
document.getElementById('items').innerHTML ='<h2 class="title text-center">Features Items</h2>'+data;


	}
     }); });
   });
	
	</script>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

</head>
<body>                       
                            <!--cart popup header-->
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

<!--end cart-->
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +91-9975710110 | +91-9145166794</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> cashcropem2@gmail.com </a></li><div id="hi1"></div>
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
							<a href="index.php"><img src="images/home/logo.png" alt="cashcrop" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right" >
							<ul class="nav navbar-nav">
								<li><a href="contact-us.php"><i class="fa fa-comment"></i> Contact</a></li>
								<li  data-toggle="modal" href="#myModal" id="cartc" onclick="javascript:$('#cartitems').load('cartdisplay.php').fadeIn();"><a><i class="fa fa-shopping-cart"></i> Cart <strong id="bomb"> </strong></a></li>
								<?php if(!empty($_SESSION['user'])){?>
								<li class="dropdown">
								<a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="fa fa-unlock"></i>
								<?php echo $_SESSION['user'];?>
								</a>
								<div class="dropdown-menu">
								<form>
									<!--<li><a>My Profile</a></li>
									<li><a>My Orders</a></li>-->
									<li><a href="logout.php" >LogOut</a></li>
								</form>
								</div>
								<?php } else {?></li>
								
								<li><a href="login.php"><i class="fa fa-lock"></i>Login</a></li><?php }?>
							<li><a href="login_farmer.php"><i class="fa fa-lock"></i>Farmer Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
</header>
</body>
</html>
                            
                            
                            
                            
                            
                            
                            
                            
                            