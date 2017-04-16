<div class="content product-box-main">
	<div class="wrap">
				<div class="content-left">
					<div class="content-left-top-brands">
						<h3>Categories</h3>
						<ul>
                        	<li><a href="index.php?menu=produk">All</a></li>
                        <?php
                        	$sql = mysql_query("SELECT jenis from tbl_jenis");
							while($tampung = mysql_fetch_array($sql)){
						?>
							<li><a href="index.php?menu=produk&jenis=<?php echo $tampung['jenis']?>"><?php echo $tampung['jenis']?></a></li>
                         <?php } ?>
						</ul>
					</div>
				</div>
				<?php
					if(isset($_POST['tcari'])){
						$hitung = mysql_query("SELECT * FROM qw_barang where nama_barang like '%$_POST[tcari]%' and stock !=''");
					} elseif(@$_GET['jenis']==''){ 
						$hitung = mysql_query("SELECT * FROM tbl_barang where stock !=''");
					} else {
						$hitung = mysql_query("SELECT * FROM qw_barang where jenis = '$_GET[jenis]' and stock !=''");
					}
				?>
				<div class="content-right product-box">
					<div class="product-box-head">
							<div class="product-box-head-left">
                            <?php if(isset($_POST['tcari'])){?>
                            	<h3>Result for <?php echo $_POST['tcari'] ?><span> (<?php echo mysql_num_rows($hitung) ?>)</span></h3>
                            <?php } else { ?>
								<h3>Products <span>(<?php echo mysql_num_rows($hitung) ?>)</span></h3>
                            <?php } ?>
							</div>
							<div class="clear"> </div>
					</div>
					<div class="product-grids">
						<!--- start-rate---->
							<script src="web/js/jstarbox.js"></script>
							<link rel="stylesheet" href="web/css/jstarbox.css" type="text/css" media="screen" charset="utf-8" />
							<script type="text/javascript">
								jQuery(function() {
									jQuery('.starbox').each(function() {
										var starbox = jQuery(this);
										starbox.starbox({
											average: starbox.attr('data-start-value'),
											changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
											ghosting: starbox.hasClass('ghosting'),
											autoUpdateAverage: starbox.hasClass('autoupdate'),
											buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
											stars: starbox.attr('data-star-count') || 5
										}).bind('starbox-value-changed', function(event, value) {
											if(starbox.hasClass('random')) {
												var val = Math.random();
												starbox.next().text(' '+val);
												return val;
											} 
										})
									});
								});
							</script>
							<!---//End-rate---->
                            <?php 
							 	if(isset($_POST['tcari'])) {
									$sql = mysql_query("SELECT  * FROM qw_barang where nama_barang like '%$_POST[tcari]%' and stock !='' ORDER BY 
														kd_barang DESC");
								} elseif(@$_GET['jenis']==''){
									$sql = mysql_query("SELECT * FROM tbl_barang where stock !='' ORDER BY kd_barang DESC");
								} else {
									$sql = mysql_query("SELECT * FROM qw_barang where jenis = '$_GET[jenis]' and stock !='' ORDER BY kd_barang DESC");
								}
									while($data = mysql_fetch_array($sql)){
							?>
                            <div class="product-grid fade last-grid"  onclick="location.href='index.php?menu=details&produk=<?php echo $data[2]?>';">
							<div class="product-grid-head">
								<ul class="grid-social">
									<li><a class="facebook" href="#"><span> </span></a></li>
									<li><a class="twitter" href="#"><span> </span></a></li>
									<li><a class="googlep" href="#"><span> </span></a></li>
									<div class="clear"> </div>
								</ul>
							</div>
							<div class="product-pic">
							<a href="index.php?menu=details&produk=<?php echo $data[2]?>"><img src="page/web/images/<?php echo $data[8]?>" height="155"
                                  title="<?php echo $data[2] ?>" /></a>
								<p>
								<a href="#"><?php echo $data[2]?> (<?php echo $data[5]?>)</a>
								<span><?php echo substr($data[3],0,20)." ..."?></span>
								</p>
							</div>
							<div class="product-info">
								<div class="product-info-cust">
									<a href="index.php?menu=details&produk=<?php echo $data[2]?>">Rp. <?php 
									$hasil = $data[4]*$data[6]/100; $hasilpotong = $data[4]-$hasil; echo  number_format($hasilpotong);
									?></a>
								</div>
								<div class="product-info-price">
									<a href="index.php?menu=details&produk=<?php echo $data[2]?>">Details</a>
								</div>
                                
								<div class="clear"> </div>
							</div>
                            
							<div class="more-product-info">
								<span> </span>
							</div>
						</div>
                        
                        <?php } ?>
						<div class="clear"> </div>
                        </div>
					<!----start-load-more-products---->
					<div class="loadmore-products">
						<a href="#">Loadmore</a>
					</div>
					<!----//End-load-more-products---->
				</div>
					<div class="clear"> </div>
			</div>
		</div>
							