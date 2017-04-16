<?php
$tgl = date('d - F - Y');

	if(isset($_GET['edit'])){
		@$edit = $perintah->edit("qw_barang","kd_barang = '$_GET[id]'");
	}
	@$tempat="../../page/web/images/";
	
	@$table ="tbl_barang";
	@$alamat ="?menu=listbr";
	@$where = "kd_barang = '$_GET[id]'";
	@$cari_kd = mysql_query("SELECT max(kd_barang)as kode from tbl_barang");
	@$tm_cari = mysql_fetch_array($cari_kd);
	@$kode = substr($tm_cari['kode'],2,3);
	@$tambah = $kode+1;
	@$cek = mysql_num_rows(mysql_query("SELECT * FROM tbl_barang where nama_barang = '$_POST[nmbr]' or kd_jenis = '$_POST[jenisbr]'"));
	if($tambah < 10){
		@$id = "BR00".$tambah;
	} elseif($tambah < 100){
		@$id = "BR0".$tambah;
	} else {
		@$id = "BR".$tambah;
	}
	if(isset($_POST['simpan'])){
		if($cek > 0){
			echo"<script>alert('Data sudah Ada !');document.location.href='?menu=tambahbr'</script>";
		}else{
			@$foto = $_FILES['foto'];
			@$upload = $perintah->upload($foto,$tempat);
			@$field	=	array('kd_barang'=>$_POST['kdbr'],
						  'kd_jenis'=>$_POST['jenisbr'],
						  'nama_barang'=>$_POST['nmbr'],
						  'detail'=>$_POST['detailbr'],
				    	  'harga'=>$_POST['hargabr'],
						  'stock'=>$_POST['stockbr'],
						  'diskon'=>$_POST['diskonbr'],
						  'tgl_kadaluarsa'=>$_POST['tglbr'],
					      'foto'=>$upload);
			$perintah->simpan($table,$field,"?menu=tambahbr");
		}
	}
	if(isset($_POST['ubah'])){
		@$foto = $_FILES['foto'];
		@$upload = $perintah->upload($foto,$tempat);
		if(empty($_FILES['foto']['name'])){
			@$field = array('kd_barang'=>$_POST['kdbr'],
					  'kd_jenis'=>$_POST['jenisbr'],
					  'nama_barang'=>$_POST['nmbr'],
					  'detail'=>$_POST['detailbr'],
				      'harga'=>$_POST['hargabr'],
					  'stock'=>$_POST['stockbr'],
					  'diskon'=>$_POST['diskonbr'],
					  'tgl_kadaluarsa'=>$_POST['tglbr'],
					);
	    	$perintah->update($table,$field,$where,$alamat);				
		} else {
			@$field = array('kd_barang'=>$_POST['kdbr'],
					  'kd_jenis'=>$_POST['jenisbr'],
					  'nama_barang'=>$_POST['nmbr'],
					  'detail'=>$_POST['detailbr'],
				      'harga'=>$_POST['hargabr'],
					  'stock'=>$_POST['stockbr'],
					  'diskon'=>$_POST['diskonbr'],
					  'tgl_kadaluarsa'=>$_POST['tglbr'],
				      'foto'=>$upload
					);
			$perintah->update($table,$field,$where,$alamat);
		}
	}


?>
<div class="alert alert-warning" role="alert">
	<a href=""><span class="glyphicon glyphicon-home"></span> Home</a> 
 			   <i class="icon-angle-right"></i>  Produk 
  			   <i class="icon-angle-right"></i>  Tambah Produk
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
	<h2> Form Input Barang </h2>
    <hr>
    <form method="post" enctype="multipart/form-data">
    	<table class="table">
        	<tr>
            	<td>Kode Barang</td>
                <td>:</td>
                <td><input type="text" name="kdbr" class="form-control"  value="<?php if(@$_GET['id']==''){echo @$id;}else{echo $edit[0];} ?>" 
                 	required ></td>
            </tr>
            <tr>
            	<td>Nama Barang</td>
                <td>:</td>
                <td><input type="text" name="nmbr" class="form-control" value="<?php echo @$edit[2] ?>"  required ></td>
            </tr>
            <tr>
            	<td>Jenis Barang</td>
                <td>:</td>
                <td><select name="jenisbr" class="form-control">
                	<option value="<?php echo $edit[1] ?>"><?php echo @$edit[9] ?></option>
                    <?php
                    $sql = mysql_query("SELECT * FROM tbl_jenis Order BY jenis");
					while($data = mysql_fetch_array($sql)){
					?>
                    <option value="<?php echo $data[0]?>"><?php echo $data[1]?></option>
                    <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
            	<td>Detail Barang</td>
                <td>:</td>
                <td><textarea name="detailbr" class="form-control" required><?php echo @$edit[3] ?></textarea></td>
            </tr>
             <tr>
            	<td>Harga</td>
                <td>:</td>
                <td><input type="number" name="hargabr"  class="form-control" value="<?php echo $edit[4] ?>"  required ></td>
            </tr>
             <tr>
            	<td>Stock Barang</td>
                <td>:</td>
                <td><input type="number" name="stockbr" class="form-control" value="<?php echo $edit[5] ?>"  required ></td>
            </tr>
            <tr>
            	<td>Diskon</td>
                <td>:</td>
                <td><input type="number" name="diskonbr" class="form-control" value="<?php echo $edit[6] ?>"  required ></td>
            </tr>
            <tr>
            	<td>Tanggal Kadaluarsa</td>
                <td>:</td>
                <td><input type="date" name="tglbr" class="form-control" value="<?php echo $edit[7] ?>" placeholder="mm/dd/yyyy"  required ></td>
            </tr>
            <tr>
            	<td>Image</td>
                <td>:</td>
                <td><input type="file" name="foto" class="form-control" ></td>
            </tr>
             <tr>
            	<td></td>
                <td></td>
                <td>
                <?php if(@$_GET['id'] == ''){ ?>
                <input type="submit" name="simpan" class="btn btn-warning" value="SIMPAN" >
                <a href="?menu=edtprdk" class="btn btn-warning">Lihat Barang</a>
                <?php } else { ?>
                <input type="submit" name="ubah" class="btn btn-warning" value="UPDATE" >
                <a href="?menu=edtprdk" class="btn btn-warning" onclick="return confirm('Batalkan perubahan ?')">Batal</a>
                <?php } ?>
                </td>
            </tr>
        </table>
    </form>
    