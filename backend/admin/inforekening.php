<?php
$tgl = date('d - F - Y');
	@$cek = mysql_num_rows(mysql_query("SELECT * FROM tbl_rekening where status='1'"));
	if(isset($_POST['simpan'])){
		$field = array('atas_nama'=>$_POST['an'],'nama_bank'=>$_POST['nb'],'no_rekening'=>$_POST['nr'],'status'=>'0');
		$alamat = "?menu=inforekening";
 		$perintah->simpan("tbl_rekening",$field,$alamat);
	}
    if(isset($_POST['ubah'])){
        @$cekstatus = mysql_fetch_array(mysql_query("select * from tbl_rekening where atas_nama = '$_GET[id]'"));
        if($cekstatus['status']=='0'){
            $field = array('atas_nama'=>$_POST['an'],'nama_bank'=>$_POST['nb'],'no_rekening'=>$_POST['nr'],'status'=>'0');
        }else{
            $field = array('atas_nama'=>$_POST['an'],'nama_bank'=>$_POST['nb'],'no_rekening'=>$_POST['nr'],'status'=>'1');
        }
        $alamat = "?menu=inforekening";
        $perintah->update("tbl_rekening",$field,"atas_nama = '$_GET[id]'",$alamat);
    }
	if(isset($_GET['edit'])){
		@$edit = $perintah->edit("tbl_rekening","atas_nama = '$_GET[id]'");
	}
	if(isset($_GET['hapus'])){
		$edit = $perintah->hapus("tbl_rekening","atas_nama = '$_GET[id]'","?menu=inforekening");
	}
	if(isset($_GET['status'])){
		$field = array('status'=>'0');
		$perintah->update("tbl_rekening",$field,"atas_nama = '$_GET[nama]'","?menu=inforekening");
	}
	if(isset($_GET['statusnon'])){
		if($cek >0){
			echo"<script>alert('Non-Aktifkan terlebih dahulu status yang masih aktif !');</script>";
		}else{
		$field = array('status'=>'1');
		$perintah->update("tbl_rekening",$field,"atas_nama = '$_GET[nama]'","?menu=inforekening");
		}
	}
	
?>
<div class="alert alert-warning" role="alert">
	<a href=""><span class="glyphicon glyphicon-home"></span> Home</a> 
 			   <i class="icon-angle-right"></i>  Info Rekening 
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
	<h2> Info Rekening </h2>
    <hr>
    <form method="post">
    <table class="table">
    	<tr>
        	<td>Atas Nama</td>
            <td>:</td>
            <td><input type="text" name="an" class="form-control" value="<?php echo @$edit[0] ?>" required></td>
        </tr>
        <tr>
        	<td>Nama Bank</td>
            <td>:</td>
            <td><input type="text" name="nb" class="form-control" value="<?php echo @$edit[1] ?>" required></td>
        </tr>
        <tr>
        	<td>No Rekening</td>
            <td>:</td>
            <td><input type="number" name="nr" class="form-control" value="<?php echo @$edit[2] ?>"  required></td>
        </tr>
        <tr>
        	<td></td>
            <td></td>
            <td>
            	<?php if(@$_GET['id']==''){?>
            		<input type="submit" name="simpan" value="SIMPAN" class="btn btn-warning">
                <?php }else{ ?>
                	<input type="submit" name="ubah" value="UPDATE" class="btn btn-warning">
                    <a href="?menu=inforekening" class="btn btn-warning" onclick="return confirm('Batalkan Pembaruan')">BATAL</a>
                <?php } ?>
            </td>
        </tr>
    </table>
    </form>
    <hr>
    <table class="table">
    	<tr class="alert-warning" style="font-weight:bold;">
        	<td></td>
            <td>Atas Nama</td>
            <td>Nama Bank</td>
            <td>No Rekening</td>
            <td>Status</td>
            <td></td>
        </tr>
        <?php
        	$no=0;
			$a = $perintah->tampil("tbl_rekening ORDER BY status DESC");
			if($a == ''){
				echo "<tr><td colspan='5' align='center'><strong>No Record</strong></td></tr>";
			} else {
				foreach($a as $r){
					$no++;
		?>
        <tr>
        	<td><?php echo $no ?></td>
            <td><?php echo $r[0] ?></td>
            <td><?php echo $r[1] ?></td>
            <td><?php echo $r[2] ?></td>
            <?php if($r['status']=='1'){?>
            <td><a href="?menu=inforekening&status&nama=<?php echo $r[0] ?>" class="btn btn-warning">Aktif</a></td>
            <?php }else{?>
            <td><a href="?menu=inforekening&statusnon&nama=<?php echo $r[0] ?>" class="btn btn-warning">Non-Aktif</a></td>
            <?php } ?>
            <td>
            	<a href="?menu=inforekening&edit&id=<?php echo $r[0]?>" class="btn btn-warning"><i class="icon-pencil"></i></a>
                <a href="?menu=inforekening&hapus&id=<?php echo $r[0]?>" class="btn btn-danger" 
                onclick="return confirm('Hapus <?php echo $r[0]?>')"><i class="icon-trash"></i></a>
            </td>
        </tr>
        <?php } } ?>
    </table>
