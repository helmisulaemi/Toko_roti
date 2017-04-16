<?php
$tgl = date('d - F - Y');

@$cari_kd = mysql_query("SELECT max(kd_jenis)as kode from tbl_jenis");
@$tm_cari = mysql_fetch_array($cari_kd);
@$kode = substr($tm_cari['kode'],3,2);
@$tambah = $kode + 1;
	if($tambah < 10){
		$id = "JBR0".$tambah;
	} else {
		$id = "JBR".$tambah;
	}
	@$cek = mysql_num_rows(mysql_query("SELECT * FROM tbl_jenis where jenis='$_POST[jenisbr]'"));
	if(isset($_POST['simpan'])){
		if($cek > 0){
			echo "<script>alert('Data sudah Ada !');document.location.href='?menu=jenisbr'</script>";
		}else{
			$field = array('kd_jenis'=>$id,'jenis'=>$_POST['jenisbr']);
			$perintah->simpan("tbl_jenis",$field,"?menu=jenisbr");
		}
	}
	
	if(isset($_GET['edit'])){
		$edit = $perintah->edit("tbl_jenis","kd_jenis = '$_GET[id]'");
	}
	if(isset($_POST['ubah'])){
		$field = array('jenis'=>$_POST['jenisbr']);
		$perintah->update("tbl_jenis",$field,"kd_jenis = '$_GET[id]'","?menu=edtjnprdk");
	}

?>
<div class="alert alert-warning" role="alert">
	<a href=""><span class="glyphicon glyphicon-home"></span> Home</a> 
 			   <i class="icon-angle-right"></i>  Produk 
  			   <i class="icon-angle-right"></i>  Jenis Produk
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
	<h2> Form Input Jenis Barang </h2>
    <hr>
    <form method="post">
		<table class="table">
        	<tr>
            	<td>Kode Jenis</td>
                <td>:</td>
                <td><input type="text" name="kdjenisbr" class="form-control" disabled="disabled" 
                value="<?php if(@$_GET['id']==''){
								echo @$id;
							 }else{
								echo @$edit[0];   } ?>" required></td>
            </tr>
            <tr>
            	<td>Jenis Barang</td>
                <td>:</td>
                <td><input type="text" name="jenisbr" class="form-control" value="<?php echo @$edit[1] ?>" required></td>
            </tr>
            <tr>
            	<td></td>
                <td></td>
                <td>
                <?php if(@$_GET['id']==''){?>
                	<input type="submit" name="simpan" class="btn btn-warning" value="SIMPAN" >
                	<a href="?menu=edtjnprdk" class="btn btn-warning" >Lihat Jenis Barang</a>
                <?php } else { ?>
                	<input type="submit" name="ubah" class="btn btn-warning" value="UPDATE" >
                	<a href="?menu=edtjnprdk" class="btn btn-warning" onclick="return confirm('Batalkan Perubahan ?')">Batal</a>
                <?php } ?>
                </td>
            </tr>
        </table>
    </form>