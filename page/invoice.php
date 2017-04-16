<link href="page/web/css/chart.css" rel='stylesheet' type='text/css' />
<div class="content"><div  class="chart-page">
		<h3>History Transaksi</h3>
        <br>
             	<table class="table">
                	<tr class="tr" bgcolor=" #f7e1b5" style="color:#8a6d3b;">
                    	<td></td>
                        <td>Nama</td>
                        <td>Kode Transaksi</td>
                        <td>Tanggal Transaksi</td>
                        <td>Total</td>
                        <td>Pembayaran</td>
                        <td>Tanggal Kirim</td>
                    </tr>
                    <?php
						
						$no = 0;
                		$sql = mysql_query("SELECT * FROM qw_transaksi where kd_pembeli = '$_SESSION[kd_pembeli]' ORDER BY kd_transaksi DESC");
						while($data = mysql_fetch_array($sql)){
							$no++;    
					?>
                    <tr>
                    	<td><?php echo $no ?></td>
                        <td><?php echo $data[2] ?></td>
                        <td><a href="?menu=invoice_details&kd_transaksi=<?php echo $data[0]?>"><?php echo $data[0] ?></a></td>
                        <td><?php echo $data[3] ?></td>
                        <td><?php $ongkir = mysql_fetch_array(mysql_query("Select ongkos from tbl_ongkir where kota = '$_SESSION[kota]'"));echo "Rp. ".number_format($data[8]+$ongkir['ongkos'],0,",",".") ?></td>
                        <td><?php echo $data[6] ?></td>
                        <td><?php echo $data[7] ?></td>
                    </tr>
                    <?php } ?>
				</table>
</div></div>
<br /><br /><br /><br /><br /><br /><br />