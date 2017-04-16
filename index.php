<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
		<title>Toko Sari Roti</title>
		<link href="page/web/css/style.css" rel='stylesheet' type='text/css' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!----webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!----//webfonts---->
		<!----start-alert-scroller---->
		<script src="page/web/js/jquery.min.js"></script>
		<script type="text/javascript" src="page/web/js/jquery.easy-ticker.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#demo').hide();
			$('.vticker').easyTicker();
		});
		</script>
		<!----start-alert-scroller---->
		<!-- start menu -->
		<link href="page/web/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
		<script type="text/javascript" src="page/web/js/megamenu.js"></script>
		<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
		<script src="page/web/js/menu_jquery.js"></script>
		<!-- //End menu -->
		<!---slider---->
		<link rel="stylesheet" href="page/web/css/slippry.css">
		<script src="page/web/js/jquery-ui.js" type="text/javascript"></script>
		<script src="page/web/js/scripts-f0e4e0c2.js" type="text/javascript"></script>
		<script>
			  jQuery('#jquery-demo').slippry({
			  // general elements & wrapper
			  slippryWrapper: '<div class="sy-box jquery-demo" />', // wrapper to wrap everything, including pager
			  // options
			  adaptiveHeight: false, // height of the sliders adapts to current slide
			  useCSS: false, // true, false -> fallback to js if no browser support
			  autoHover: false,
			  transition: 'fade'
			});
		</script>
		<!----start-pricerage-seletion---->
		<script type="text/javascript" src="page/web/js/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="page/web/css/jquery-ui.css">
		<script type='text/javascript'>//<![CDATA[ 
			$(window).load(function(){
			 $( "#slider-range" ).slider({
			            range: true,
			            min: 0,
			            max: 500,
			            values: [ 100, 400 ],
			            slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			            }
			 });
			$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
			
			});//]]>  
		</script>
		<!----//End-pricerage-seletion---->
		<!---move-top-top---->
		<script type="text/javascript" src="page/web/js/move-top.js"></script>
		<script type="text/javascript" src="page/web/js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
		<!---//move-top-top---->
        <?php 
			date_default_timezone_set('Asia/Jakarta');
			@$tgl = date('Y-m-d H:i:s');
			@session_start();
			include "config/koneksi.php";
			include "page/controllers.php";
			
			$perintah = new oop();
			
			@$sql = mysql_query("SELECT * FROM tbl_pembeli where nama_pengguna = '$_SESSION[nama_pengguna]'");
			$tampil = mysql_fetch_array($sql);
		?>
	</head>
	<body>
        <?php include "page/header.php"; ?>
        
        <?php
			if(@$_GET['menu']==''){
					include "page/products.php";
					
			} else {
				switch (@$_GET['menu']){
					case "produk";
					include "page/products.php";
					break;
					
					case "login";
					include "page/login.php";
					break;
					
					case "register";
					include "page/register.php";
					break;
					
					case "editaccount";
					include "page/edit_account.php";
					break;
					
					case "details";
					include "page/details.php";
					break;
					
					case "contact";
					include "page/contact.php";
					break;
					
					case "chart";
					include "page/chart.php";
					break;
					
					case "invoice";
					include "page/invoice.php";
					break;
					
					case "invoice_details";
					include "page/invoice_details.php";
					break;
					
					case "checkout";
					include "page/checkout.php";
					break;
				
				}
			}
			
		 ?>
      	<?php include "page/footer.php"; ?>
    </body>
    </html>