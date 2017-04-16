<?php
$tgl = date('d - F - Y');
?>
<div class="alert alert-warning" role="alert">
	<a href=""><span class="glyphicon glyphicon-home"></span> Home</a> 
 			   <i class="icon-angle-right"></i>  Transaksi 
  			   <i class="icon-angle-right"></i>  Detail Transaksi
               <div class="right">
	<?php echo $tgl ?>,      <span id="clock"></span>
</div>
</div>  
<script type="text/javascript">
    var detik = <?php echo date('s'); ?>;
    var menit = <?php echo date('i'); ?>;
    var jam   = <?php echo date('H'); ?>;
</script>
<script src="../../style/js/clock.js"></script>

	<h2> Detail Data Transaksi </h2>
    <hr>
    <table class="table table-striped">
    	<tr class="alert-warning" style="font-weight:bold;">
			<td></td>
            <td>Kode Barang</td>
            <td>Nama Barang</td>
            <td>Jumlah Beli</td>
            <td>Subtotal</td>               
         </tr>
                    <?php
						$no = 0;
						
                		$sql = mysql_query("SELECT * FROM tbl_transaksi where kd_transaksi ='$_GET[kd_transaksi]' ORDER BY kd_transaksi DESC");
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
						$hitung = mysql_query("SELECT kd_barang,SUM(subtotal)as total from tbl_transaksi where kd_transaksi='$_GET[kd_transaksi]'");
						$total = mysql_fetch_array($hitung); 
					?>
                    <tr bgcolor="#ECECEC">
                    	<td></td>
                        <td></td>
                    	<td>Total</td>
                        <td>:</td>
                        <td><?php 
						
						echo "Rp. ".number_format($total['total'],0,",",".")?></td>
                    </tr>
                    </table>
                    	<a href="?menu=transaksi" class="btn btn-warning">Kembali</a>
                   
