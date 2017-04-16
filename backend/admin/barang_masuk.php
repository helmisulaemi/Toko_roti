<?php
$tgl = date('d - F - Y');
$tgl_masuk = date('Y-m-d');
?>
<div class="alert alert-warning" role="alert">
	<a href=""><span class="glyphicon glyphicon-home"></span> Home</a> 
 			   <i class="icon-angle-right"></i>  Produk 
  			   <i class="icon-angle-right"></i>  Barang Masuk
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

	<h2>Input Barang Masuk </h2>
    <hr>
    <form method="post">
    	<table class="table">
    		<tr style="border-bottom:1px solid #CCC;">
            	<td align="center">Pilih Barang</td>
                <td>:</td>
                <td>
                <?php 
					if(!empty($_GET['barang'])){
						$isi = mysql_fetch_array(mysql_query("SELECT nama_barang from tbl_barang where nama_barang = '$_GET[barang]'"));
					}
				?>
                <select name="pilih" class="form-control" required>
                	<option value="<?php echo $isi['nama_barang']?>"><?php echo @$isi['nama_barang']?></option>
                	<option value=""></option>
                    <?php
                    	$sql = mysql_query("SELECT nama_barang FROM tbl_barang ORDER BY kd_barang DESC");
						while($data = mysql_fetch_array($sql)){
					?>
                    <option value="<?php echo $data['nama_barang'] ?>"><?php echo $data['nama_barang']?></option>
                    <?php } ?>
                </select>
                </td>
                <td><input type="submit" name="tampilkan" value="TAMPILKAN" class="btn btn-warning"></td>
            </tr>
    	</table>
    </form>
    <?php
	
    	if(isset($_POST['tampilkan'])){
			echo"<script>document.location.href='index.php?menu=brmasuk&barang=$_POST[pilih]'</script>";
		}
		@$record = mysql_fetch_array(mysql_query("SELECT * From tbl_barang where nama_barang = '$_GET[barang]'"));
		if(!empty($_GET['barang'])){
	?>
    <form method="post">
    	<table class="table">
        	<tr>
            	<td>Kode Barang</td>
                <td>:</td>
                <td><input type="text" name="kd_barang" class="form-control" value="<?php echo $record[0] ?>" disabled></td>
            </tr>
            <tr>
            	<td>Nama Barang</td>
                <td>:</td>
                <td><input type="text" name="nama_barang" class="form-control" value="<?php echo $record[2]?>" disabled></td>
            </tr>
            <tr>
            	<td>Stock Yang Tersedia</td>
                <td>:</td>
                <td><input type="text" name="stock" class="form-control" value="<?php echo $record[5]?>" disabled></td>
            </tr>
            <tr>
            	<td>Jumlah Masuk</td>
                <td>:</td>
                <td><input type="number" name="jumlah" class="form-control" value="" required></td>
            </tr>
            <tr>
            	<td></td>
                <td></td>
                <td>
                	<input type="submit" name="simpan" value="SIMPAN" class="btn btn-warning">
                    <a href="?menu=brmasuk" class="btn btn-warning">Batalkan</a>
                </td>
            </tr>
        </table>
    </form>
	<?php } 
		
		if(isset($_POST['simpan'])){
			$field = array('kd_barang'=>$record[0],
						   'nama'=>$record[2],
						   'jumlah_masuk'=>$_POST['jumlah'],
						   'tanggal_masuk'=>$tgl_masuk);
			$perintah->simpan("tbl_barang_masuk",$field,"?menu=brmasuk");
		}
	?>