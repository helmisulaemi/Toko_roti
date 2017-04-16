<link href="page/web/css/chart.css" rel='stylesheet' type='text/css' />
<div class="content"><div  class="chart-page">
		<h3>Selamat , Transaksi Berhasil Dilakukanan</h3><br>
        <?php
			$ongkir = mysql_fetch_array(mysql_query("Select ongkos from tbl_ongkir where kota = '$_SESSION[kota]'"));
        	$sql = mysql_query("SELECT * FROM qw_transaksi where kd_transaksi = '$_GET[id]' and nama = '$tampil[1]'");
			$data = mysql_fetch_array($sql);
		?>
        <h3>Dengan Kode Transaksi : <?php echo $data[0] ?></h3><br>
        <h3>Total Harga : Rp. <?php echo number_format($data['total']+$ongkir['ongkos'],0,",",".")?></h3>
        <br>
        <hr width="80%" style="float:left;border:thin solid #CCC;"><br>
        <p>silahkan transfer uang ke</p><br>
        <?php $rek = mysql_fetch_array(mysql_query("SELECT * FROM tbl_rekening where status='1'"));?>
        <table class="table" style="margin-left:4%;">
        	<tr>		
            	<td><?php echo $rek[0]?></td>
            </tr>
            <tr>
                <td><?php echo $rek[1]?></td>
            </tr>
            <tr>    
                <td><?php echo $rek[2]?></td>
            </tr>
        </table><br>
        <hr width="80%" style="float:left;border:thin solid #CCC;"><br>
        <p>Langkah Selanjutnya : </p><br> 
        <table class="table" style="margin-left:4%;">
        	<tr>
            	<td>1.</td>
                <td>Silahkan Transfer Sesuai dengan Total Transaksi</td>
            </tr>
            <tr>
            	<td>2.</td>
                <td>Konfirmasi lewat sms/telp ke no 0215 - 0000</td>
            </tr>
            <tr>
            	<td>3.</td>
                <td>Cek Status Pembayaran dan Pengiriman di halaman invoice</td>
            </tr>
        </table> 
	</div>
</div>
<br /><br /><br />
