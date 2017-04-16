<?php
$tgl = date('d - F - Y');
$tkm = date('m-d-Y');
?>
<div class="alert alert-warning" role="alert">
	<a href=""><span class="glyphicon glyphicon-home"></span> Home</a> 
 			   <i class="icon-angle-right"></i>  Transaksi
  			   <i class="icon-angle-right"></i>  Data Sudah Bayar
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

	<h2> Data Transaksi Sudah Bayar</h2>
    <hr>
    <a href="?menu=transaksi" class="btn btn-warning">Data yang belum bayar</a>
    <hr />
     <form method="post">
      <table width="30%">
      		<tr>
    			<td><input type="text" name="cari" placeholder="Cari Nama atau Kode Transaksi" class="form-controll"/></td>
                <td><a href="index.php?menu=transaksiterbayar" class="btn btn-warning"><i class="icon-refresh"></i></a></td>
            </tr>
     </table>
     </form><br />
	<table class="table table-striped">
    	<tr class="alert-warning" style="font-weight:bold;">
			<td></td>
            <td>Nama</td>
            <td width="150">Alamat</td>
            <td>Kode Transaksi</td>
            <td>Tanggal Transaksi</td>
            <td>Total + Ongkir</td>
            <td>Pembayaran</td>
            <td>Tanggal Kirim</td>
            <td></td>
        </tr>
         <?php
			$no = 0;
			if(isset($_POST['cari'])){		  
				$sql = mysql_query("SELECT * FROM qw_transaksi where kd_transaksi like '%$_POST[cari]%' and pembayaran = 'Sudah Bayar' or nama like '%$_POST[cari]%' and pembayaran = 'Sudah Bayar' ORDER BY kd_transaksi DESC");
			}else{
         	$sql = mysql_query("SELECT * FROM qw_transaksi where pembayaran = 'Sudah Bayar' ORDER BY kd_transaksi DESC");
			}
			while($data = mysql_fetch_array($sql)){
				$no++;    
		 ?>
         <tr>
         	<td><?php echo $no ?></td>
            <td><?php echo $data[2] ?></td>
            <td><?php $al = mysql_fetch_array(mysql_query("Select * from tbl_pembeli where nama='$data[2]'")); echo $al['alamat']?></td>
            <td><a href="?menu=transaksiterbayar=details_transaksi&kd_transaksi=<?php echo $data[0]?>"><?php echo $data[0] ?></a></td>
            <td><?php echo $data[3] ?></td>
            <td><?php $ongkir = mysql_fetch_array(mysql_query("Select ongkos from tbl_ongkir where kota = '$data[5]'")); echo "Rp. ".number_format($data[8]+$ongkir['ongkos'],0,",",".") ?></td>
            <td><?php echo $data[6] ?></td>
            <td><?php echo $data[7] ?></td>
            <td><div class="btn-group">
            	<a href="?menu=transaksiterbayar&blmbayar&kd_transaksi=<?php echo $data[0]?>" class="btn btn-warning">Belum Bayar</a>
            	<a href="?menu=transaksiterbayar&kirim&kd_transaksi=<?php echo $data[0]?>" class="btn btn-danger">Kirim</a></div>
               
            </td>
         </tr>
         <?php }
		  
		 	if(isset($_GET['blmbayar'])){
				mysql_query("update tbl_transaksi set pembayaran='Tunggu' where kd_transaksi = '$_GET[kd_transaksi]'");
				echo "<script>alert('Click Ok untuk konfirmasi !!!');document.location.href='?menu=transaksi'</script>";
			}
			if(isset($_GET['kirim'])){
				mysql_query("update tbl_transaksi set tgl_kirim='$tkm' where kd_transaksi = '$_GET[kd_transaksi]'");
				echo "<script>alert('Click Ok untuk konfirmasi !!!');document.location.href='?menu=transaksiterbayar'</script>";
			}
			
		 ?>
    </table>