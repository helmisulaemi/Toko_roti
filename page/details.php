<?php
if(empty($_SESSION['nama_pengguna'])){
	echo "<script>alert('Silahkan Login Terlebih Dahulu !!!');document.location.href='?menu=login'</script>";
}
?>
<div class="content details-page">
			<!---start-product-details--->
			<div class="product-details">
				<div class="wrap">
					<ul class="product-head">
						<li><a href="#">Home</a> <span>::</span></li>
						<li class="active-page"><a href="#">Product Page</a></li>
						<div class="clear"> </div>
					</ul>
				<!----details-product-slider--->
				<!-- Include the Etalage files -->
					<link rel="stylesheet" href="page/web/css/etalage.css">
					<script src="page/web/js/jquery.etalage.min.js"></script>
				<!-- Include the Etalage files -->
				<script>
						jQuery(document).ready(function($){
			
							$('#etalage').etalage({
								thumb_image_width: 300,
								thumb_image_height: 400,
								source_image_width: 900,
								source_image_height: 1000,
								show_hint: true,
								click_callback: function(image_anchor, instance_id){
									alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
								}
							});
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

					});
				</script>
                <?php
					@$sql = mysql_query("SELECT * FROM tbl_barang where nama_barang = '$_GET[produk]'");
					$data = mysql_fetch_array($sql);
                ?>
				<!----//details-product-slider--->
				<div class="details-left">
                
					<div class="details-left-slider">
						<ul id="etalage">
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="page/web/images/<?php echo $data[8]?>" />
									<img class="etalage_source_image" src="page/web/images/<?php echo $data[8]?>" />
								</a>
							</li>
							
						</ul>
					</div>
					<div class="details-left-info">
						<div class="details-right-head">
						<h1><?php echo $data[2] ?></h1>
						<p class="product-detail-info"><?php echo $data[3]?> .</p>
						<div class="product-more-details">
							<ul class="price-avl">
								<li class="price"><span>Rp. <?php echo number_format($data[4])?></span><label>
                                Rp. <?php $hasil = $data[4]*$data[6]/100; $hasilpotong = $data[4]-$hasil; echo  number_format($hasilpotong)?></label></li>
								<li class="stock"><i>In stock</i></li>
								<div class="clear"> </div>
							</ul>
							<ul class="prosuct-qty">
								<span>Quantity:</span>
								<form method="post">
                                <select name="jb" required>
									<option></option>
                                    <?php 
										
										$jumlah = $data['stock'];
										for($a= 1; $a<=$jumlah; $a++){			
									?>
									<option><?php echo $a ?></option>
                                    <?php } ?>
								</select>
							</ul>
							<input type="submit" name="chart" value="add to cart" />
							</form>
                            <?php
							
								@$field = array('kd_barang'=>$data[0],
											   'id_session'=>$_SESSION['nama_pengguna'],
											   'nama_barang'=>$_GET['produk'],
											   'harga'=>$hasilpotong,
											   'jumlah_beli'=>$_POST['jb'],
											   'status'=>'1');
								@$alamat = "index.php?menu=chart";
								@$sql = mysql_query("SELECT * FROM tbl_barang_keluar where kd_barang = '$data[0]' and status = '1' and id_session = '$_SESSION[nama_pengguna]'");
								@$cek = mysql_num_rows($sql);
                            	if(isset($_POST['chart'])){
									if($_SESSION['nama_pengguna']==''){
										echo "<script>alert('Silahkan Login Terlebih Dahulu !!!');document.location.href='?menu=login'</script>";
									}else{
									if($cek > 0){
										mysql_query("update tbl_barang_keluar set jumlah_beli = jumlah_beli + '$_POST[jb]' where 
										kd_barang = '$data[0]'");
										mysql_query("update tbl_barang set stock = stock - '$_POST[jb]' where 
										kd_barang = '$data[0]'");
										echo"<script>document.location.href='index.php?menu=chart'</script>";
									}else{
										$perintah->simpan('tbl_barang_keluar',$field,$alamat);
									}
									}
								}
							?>
							</div>
                            </div>
					</div>
					</div>
					<div class="clear"> </div>
				</div>
                </div>