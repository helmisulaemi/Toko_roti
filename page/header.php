<!---start-wrap---->
			<!---start-header---->
			<div class="header">
				<div class="top-header">
					<div class="wrap">
						<div class="top-header-left">
							<ul>
								<!---cart-tonggle-script---->
								<script type="text/javascript">
									$(function(){
									    var $cart = $('#cart');
									        $('#clickme').click(function(e) {
									         e.stopPropagation();
									       if ($cart.is(":hidden")) {
									           $cart.slideDown("slow");
									       } else {
									           $cart.slideUp("slow");
									       }
									    });
									    $(document.body).click(function () {
									       if ($cart.not(":hidden")) {
									           $cart.slideUp("slow");
									       } 
									    });
									    });
								</script>
								<!---//cart-tonggle-script---->
								<li><a class="cart" href="#"><span id="clickme"> </span></a></li>
								<!---start-cart-bag---->
								<div id="cart">
                                 
								 <?php
								 
									$no = 0;
                    				$a = $perintah->tampil("tbl_barang_keluar WHERE id_session = '$_SESSION[nama_pengguna]' and status='1'");
									if($a == ''){
										echo " Your Cart is Empty <span>(0)</span>";
									} else {
										foreach($a as $b){
											$no++;
									?>
                    				<ul>
                    					<li><?php echo $no ?></li>
                        				<li><?php echo $b[2]?></li>
                        				<li><a href="?menu=chart" style="color:#fff;text-decoration:underline;">Detail</a></li>
                    				</ul>
                    				<?php } } ?>
                                
                                </div>
								<!---start-cart-bag---->
								
							</ul>
						</div>
						<div class="top-header-right">
							<ul>
                            <?php if(@$_SESSION['nama_pengguna']=='' and @$_SESSION['kd_pembeli']==''){?>
								<li><a href="index.php?menu=login">Login</a><span> </span></li>
								<li><a href="index.php?menu=register">Register</a></li>
                            <?php } else { ?>
                            	<li><a href="index.php?menu=editaccount"><?php echo $tampil[1] ;?></a><span> </span></li>
                                <li><a href="page/logout.php">Logout</a></li>
                            <?php } ?>
							</ul>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<!----start-mid-head---->
				<div class="mid-header">
					<div class="wrap">
                    <?php if(@$_GET['menu']=='produk' or @$_GET['menu']==''){?>
						<div class="mid-grid-left">
                        	
							<form method="post">
								<input type="text" name="tcari" placeholder="Sreach Produk" />
                                
							</form>
						</div>
                    <?php } ?>
						<div class="mid-grid-right">
							<br /><br />
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<!----//End-mid-head---->
				<!----start-bottom-header---->
				<div class="header-bottom">
					<div class="wrap">
					<!-- start header menu -->
							<ul class="megamenu skyblue" >
                            <?php if(@$_GET['menu']==''){ ?>
								<li class="active"><a class="color4" style="color:#FFF;" href="index.php">Home</a>
								</li>				
                                <?php } else {?>
                                <li ><a class="color4" href="index.php">Home</a>
								</li>	
                                <?php } ?>
                            <?php if(@$_GET['menu']=='produk'){?>     
									<li class="active"><a class="color5" style="color:#FFF;" href="index.php?menu=produk">Produk</a>
									</li>
                            <?php } else {?>
                            		<li><a class="color5" href="index.php?menu=produk">Produk</a>
									</li>
                            <?php } ?> 
                            <?php if(@$_GET['menu']=='chart'){?>        
									<li class="active"><a class="color6" style="color:#FFF;" href="index.php?menu=chart">Chart</a>
									</li>
                            <?php } else { ?>
                            		<li><a class="color6" href="index.php?menu=chart">Chart</a>
									</li>
                            <?php } ?>
                                    <?php if(@$_SESSION['nama_pengguna']==''){?>
                           			<?php } else { ?>  
                                    <?php if(@$_GET['menu']=='invoice'){?>      
                                    <li class="active"><a class="color6" style="color:#FFF;" href="index.php?menu=invoice">Invoice</a>
									</li>
                                    <?php } else {?>
                                    <li><a class="color6" href="index.php?menu=invoice">Invoice</a>
									</li>
                                    <?php } ?>
                                    <?php } ?>
                                    
                                    <?php if(@$_GET['menu']=='contact'){?>
									<li class="active"><a class="color7" style="color:#FFF;" href="index.php?menu=contact">Contact Us</a>
									</li>
                                    <?php } else {?>
                                    <li><a class="color6" href="index.php?menu=contact">Contact Us</a>
									</li>
                                    <?php } ?>
                           
                                    
									
							</ul>

					</div>
				</div>
				</div>
				<!----//End-bottom-header---->
			<!---//End-header---->
