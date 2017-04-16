<?php
$tgl = date('d - F - Y');
?>
<div class="alert alert-warning" role="alert">
	<a href=""><span class="glyphicon glyphicon-home"></span> Home</a> 
 			   <i class="icon-angle-right"></i>  Pelanggan 
  			   <i class="icon-angle-right"></i>  Data Produk
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

	<h2> Data Produk 
    </h2>
    <hr>
    <form method="post">
      <table width="20%">
      		<tr>
    			<td><input type="text" name="cari" placeholder="Cari Produk" class="form-controll"/></td>
                <td><a href="index.php?menu=edtprdk" class="btn btn-warning"><i class="icon-refresh"></i></a></td>
            </tr>
     </table>
     </form><br />
	<table class="table table-striped">
    	
      
    	<tr class="alert-warning" style="font-weight:bold;">
        	<td></td>
            <td>Image</td>
            <td>Kode Barang</td>
            <td>Nama Produk</td>
            <td width="250">Detail</td>
            <td>Harga</td>
            <td>Stock</td>
            <td>Diskon</td>
            <td>Tanggal Kadaluarsa</td>
            <td>Aksi</td>
        </tr>
        <?php
		if(isset($_POST['cari'])){
			$cari = "where nama_barang like '%$_POST[cari]%' or kd_barang like '%$_POST[cari]%'";
		}
		$no = 0;
		@$a = $perintah->tampil("tbl_barang $cari ORDER BY kd_barang DESC");
		if($a == ''){
			echo "<tr><td colspan = '10' align='center'><strong>No Record</strong></td></tr>";
		} else {
			foreach($a as $data){
				$no++;
		?>
        <tr>
        	<td><?php echo $no ?></td>
            <td><img src="../../page/web/images/<?php echo $data['foto']?>" width="100" height="50"/></td>
            <td><?php echo $data[0] ?></td>
            <td><?php echo $data[2] ?></td>
            <td><?php echo $data[3] ?></td>
            <td><?php echo $data[4] ?></td>
            <td><?php echo $data[5] ?></td>
            <td><?php echo $data[6]."%" ?></td>
            <td><?php echo $data[7] ?></td>
            <td><div class="btn-group">
            		<a href="?menu=tambahbr&edit&id=<?php echo $data[0] ?>" class="btn btn-warning"><i class="icon-pencil"></i></a>
            		<a href="?menu=edtprdk&hapus&id=<?php echo $data[0]?>" class="btn btn-danger" 
                       onclick="return confirm('Hapus <?php echo $data[2] ?> ?')"><i class="icon-trash"></i></a>
            	</div>
           </td>
        </tr>
        <?php }
		}
		
		if(isset($_GET['hapus'])){
			$perintah->hapus("tbl_barang","kd_barang = '$_GET[id]'","?menu=edtprdk");
		}
		?>
    </table>