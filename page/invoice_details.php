<link href="page/web/css/chart.css" rel='stylesheet' type='text/css' />
<div class="content"><div  class="chart-page">
		<h3>Detail Transaksi</h3>
        <br>
             	<table class="table">
                	<tr class="tr" bgcolor=" #f7e1b5" style="color:#8a6d3b;">
                    	<td></td>
                        <td>Kode Barang</td>
                        <td>Nama Barang</td>
                        <td>Jumlah Beli</td>
                        <td>Subtotal</td>
                        
                    </tr>
                    <?php
						$no = 0;
						$ongkir = mysql_fetch_array(mysql_query("Select ongkos from tbl_ongkir where kota = '$_SESSION[kota]'"));
                		$sql = mysql_query("SELECT * FROM tbl_transaksi where kd_pembeli = '$_SESSION[kd_pembeli]' and kd_transaksi ='$_GET[kd_transaksi]' ORDER BY kd_transaksi DESC");
						while($data = mysql_fetch_array($sql)){
							$no++;    
					?>
                    <tr>
                    	<td><?php echo $no ?></td>
                        <td><?php echo $data['kd_barang'] ?></td>
                        <td><?php $dataa = mysql_fetch_array(mysql_query("SELECT nama_barang from tbl_barang where kd_barang = '$data[2]'"));echo $dataa['nama_barang']?></td>
                        <td><?php echo $data['qty']?></td>
                        <td><?php echo "Rp. ".number_format($data['subtotal'],0,",",".") ?></td>
                        
                    </tr>
                    <?php }
						$hitung = mysql_query("SELECT kd_barang,SUM(subtotal)as total from tbl_transaksi where  kd_pembeli = '$_SESSION[kd_pembeli]' and kd_transaksi='$_GET[kd_transaksi]'");
						$total = mysql_fetch_array($hitung); 
					?>
                    <tr bgcolor="#ECECEC">
                    	<td colspan="3" align="right">Ongkir</td>
                        <td>:</td>
                        <td><?php $ongkir = mysql_fetch_array(mysql_query("Select ongkos from tbl_ongkir where kota = '$_SESSION[kota]'")); 
						echo "Rp. ".number_format($ongkir['ongkos'],0,",",".")?></td>
                        </td>
                    </tr>
                    <tr bgcolor="#ECECEC">
                    	<td colspan="3" align="right">Total </td>
                        <td>:</td>
                        <td><?php echo "Rp. ".number_format($total['total']+$ongkir['ongkos'],0,",",".")?></td>
                    </tr>
				</table>
</div></div>
<br /><br /><br /><br /><br /><br /><br />