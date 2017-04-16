<?php
$tgl = date('d - F - Y');
	
		if(isset($_GET['edit'])){
			$edit = $perintah->edit("tbl_pembeli","kd_pembeli = '$_GET[id]'");
		}
		if(isset($_POST['ubah'])){
			$field = array( 'nama'=>$_POST['nama'],
							'jk'=>$_POST['jk'],
							'alamat'=>$_POST['alamat'],
							'kota'=>$_POST['kota'],
							'kode_pos'=>$_POST['kp'],
							'no_hp'=>$_POST['nh']);
			$perintah->update("tbl_pembeli",$field,"kd_pembeli = '$_GET[id]'","?menu=pelanggandt");
		}

?>
<div class="alert alert-warning" role="alert">
	<a href=""><span class="glyphicon glyphicon-home"></span> Home</a> 
 			   <i class="icon-angle-right"></i>  Pelanggan 
  			   <i class="icon-angle-right"></i>  Data Pelanggan
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
	<h2> Edit Data Pelanggan </h2>
    <hr>
    <form method="post" >
    	<table class="table">
        	<tr>
            	<td>Kode Pelanggan</td>
                <td>:</td>
                <td><input type="text" name="kd" class="form-control" value="<?php echo $edit[0] ?>" disabled="disabled" required ></td>
            </tr>
            <tr>
            	<td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" class="form-control" value="<?php echo $edit[1] ?>"  required ></td>
            </tr>
             <tr>
            	<td>Jenis Kelamin</td>
                <td>:</td>
                <td><select name="jk" class="form-control" required>
                		<option value="<?php echo $edit[2]?>"><?php echo $edit[2]?></option>
                        <option value="L">L</option>
                        <option value="P">P</option>
                    </select>
                </td>
            </tr>
             <tr>
            	<td>Alamat</td>
                <td>:</td>
                <td><textarea name="alamat" class="form-control" required><?php echo $edit[3] ?></textarea></td>
            </tr>
            <tr>
            	<td>Kota</td>
                <td>:</td>
                <td><input type="text" name="kota" class="form-control" value="<?php echo $edit[4] ?>"  required ></td>
            </tr>
            <tr>
            	<td>Kode Pos</td>
                <td>:</td>
                <td><input type="text" name="kp" class="form-control" value="<?php echo $edit[5] ?>" placeholder="mm/dd/yyyy"  required ></td>
            </tr>
            <tr>
            	<td>No Hp</td>
                <td>:</td>
                <td><input type="text" name="nh" class="form-control" value="<?php echo $edit[6]?>" ></td>
            </tr>
             <tr>
            	<td></td>
                <td></td>
                <td>
                <?php if($_GET['id'] == ''){ ?>
                <input type="submit" name="simpan" class="btn btn-warning" value="SIMPAN" >
                <a href="?menu=pelanggandt" class="btn btn-warning">Lihat Data</a>
                <?php } else { ?>
                <input type="submit" name="ubah" class="btn btn-warning" value="UPDATE" >
                <a href="?menu=pelanggandt" class="btn btn-warning" onclick="return confirm('Batalkan perubahan ?')">Batal</a>
                <?php } ?>
                </td>
            </tr>
        </table>
    </form>
    