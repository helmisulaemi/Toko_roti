<link href="page/web/css/chart.css" rel='stylesheet' type='text/css' />				
<div class="content"><div class="chart-page">
		<h3>Pembelanjaan</h3>
        <br>
             	<table class="table">
                	<tr class="tr" bgcolor=" #f7e1b5" style="color:#8a6d3b;">
                    	<td></td>
                        <td>Nama barang</td>
                        <td>Harga</td>
                        <td>Jumlah Beli</td>
                        <td>Sub total</td>
                        <td align="center">Opsi</td>
                    </tr>
                    <?php
						$cari_kd = mysql_query("SELECT max(kd_transaksi)as kode from tbl_transaksi");
						$tm_cari = mysql_fetch_array($cari_kd);
						$kode = substr($tm_cari['kode'],2,3);
						$tambah = $kode+1;
						if($tambah < 10){
							$id = "TR00".$tambah;
						} elseif($tambah < 100){
							$id = "TR0".$tambah;
						} else {
							$id = "TR".$tambah;
						}
						$no = 0;
                    	@$a = $perintah->tampil("tbl_barang_keluar WHERE id_session = '$_SESSION[nama_pengguna]' and status='1'");
						if($a == ''){
							echo "<tr><td colspan='6' align='center'>Keranjang Masih Kosong</td></tr>";
						} else {
							foreach($a as $b){
							$no++;
					?>
                    <tr>
                    	<td><?php echo $no ?></td>
                        <td><?php echo $b[2]?></td>
                        <td>Rp. <?php echo number_format($b[3],0,",",".")?></td>
                        <td><?php echo $b[4]?></td>
                        <td>Rp. <?php $tt = $b[3]*$b[4]; echo number_format($tt,0,",",".")?></td>
                        <td align="center">
                        	<a href="?menu=chart&hapus&barang=<?php echo $b[0]?>" class="btn btn-danger">Hapus</a></td>
                    </tr>
                    <?php
					if(isset($_POST['checkout'])){
						if($a == ''){
							echo "<script>alert('Keranjang Masih kosong');document.location.href='?menu=chart'</script>";
						}else{
							mysql_query("INSERT INTO tbl_transaksi VALUES ('$id','$_SESSION[kd_pembeli]','$b[0]','$b[4]','$tt','$tgl','Tunggu','Belum dikirim')" );
							mysql_query("update tbl_barang_keluar set status = '0' where id_session = '$_SESSION[nama_pengguna]'");
							echo "<script>alert('Transaksi Berhasil');document.location.href='?menu=checkout&id=$id'</script>";
						}
					}

					
				} 
			} ?>
                </table>
                <br />
                <table class="table tebal">
                	<tr>
                    	<td>Ongkir</td>
                        <td>:</td>
                        <td><?php @$ongkir = mysql_fetch_array(mysql_query("Select ongkos from tbl_ongkir where kota = '$_SESSION[kota]'")); 
						echo "Rp. ".number_format($ongkir['ongkos'],0,",",".")?></td>
                        <td></td>
                    </tr>
                	<tr>
                    	<td>Total</td>
                        <td>:</td>
                        <td>Rp. <?php @$total = mysql_fetch_array(mysql_query("select id_session ,sum(harga*jumlah_beli)as total from tbl_barang_keluar where status='1' and id_session='$_SESSION[nama_pengguna]'"));
						;
						echo number_format($total['total']+$ongkir['ongkos'],0,",",".");?></td>
                        <td><form method="post">
                        		<input type="submit" name="checkout" value="Check Out" class="btn btn-success">
                            
                            <a href="index.php?menu=produk" class="btn btn-danger">Continue Shopping</a>
                            </form>
                        </td>
                    </tr>
                </table>
                <?php
                	if(isset($_GET['hapus'])){
						$perintah->hapus("tbl_barang_keluar","kd_barang = '$_GET[barang]' and id_session='$_SESSION[nama_pengguna]'and status='1'","?menu=chart");
					}
					

				?>
                </div>
   </div>
<div class="clear"> </div>