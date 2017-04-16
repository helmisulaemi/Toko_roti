<?php
$tgl = date('d - F - Y');
	@$cek = mysql_num_rows(mysql_query("SELECT * FROM tbl_ongkir where kota = '$_POST[kota]'"));
	if(isset($_POST['simpan'])){
		if($cek > 0){
			echo"<script>alert('Data sudah Ada !');document.location.href='?menu=ongkir'</script>";
		}else{
			$field = array('kota'=>$_POST['kota'],'ongkos'=>$_POST['ongkos']);
			$perintah->simpan("tbl_ongkir",$field,"?menu=ongkir");
		}
	}
	
	if(isset($_GET['edit'])){
		@$edit = $perintah->edit("tbl_ongkir","kota = '$_GET[id]'");
	}
	if(isset($_POST['ubah'])){
		$field = array('kota'=>$_POST['kota'],'ongkos'=>$_POST['ongkos']);
		$perintah->update("tbl_ongkir",$field,"kota = '$_GET[id]'","?menu=ongkir");
	}
?>
<div class="alert alert-warning" role="alert">
	<a href=""><span class="glyphicon glyphicon-home"></span> Home</a> 
 			   <i class="icon-angle-right"></i>  Ongkos Kirim 
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
	<h2> Ongkos Kirim </h2>
    <hr>
    <form method="post">
		<table class="table">
        	<tr>
            	<td>Kota</td>
                <td>:</td>
                <td><input type="text" name="kota" class="form-control" value="<?php echo @$edit[0]?>" required></td>
            </tr>
            <tr>
            	<td>Ongkos</td>
                <td>:</td>
                <td><input type="number" name="ongkos" class="form-control" value="<?php echo @$edit[1]?>" required></td>
            </tr>
            <tr>
            	<td></td>
                <td></td>
                <td>
                <?php if(@$_GET['id']==''){?>
                	<input type="submit" name="simpan" class="btn btn-warning" value="SIMPAN" >
                <?php } else { ?>
                	<input type="submit" name="ubah" class="btn btn-warning" value="UPDATE" >
                	<a href="?menu=ongkir" class="btn btn-warning" onclick="return confirm('Batalkan Perubahan ?')">Batal</a>
                <?php } ?>
                </td>
            </tr>
        </table>
    </form>
    <hr>
    <table class="table">
    	<tr>
        	<td></td>
            <td>Kota</td>
            <td>Ongkos</td>
            <td>Opsi</td>
        </tr>
        <?php
			$no =0;
        	$a = $perintah->tampil("tbl_ongkir");
			if($a==''){
				echo "<tr><td colspan='3' align='center'>No Record</td></tr>";
			}else{
				foreach($a as $r){
					$no++;
		?>
        <tr>
        	<td><?php echo $no?></td>
            <td><?php echo $r[0]?></td>
            <td><?php echo "Rp. ".number_format($r[1],0,",",".")?></td>
            <td><div class="btn-group">
            		<a href="?menu=ongkir&edit&id=<?php echo $r[0]?>" class="btn btn-warning"><i class="icon-pencil"></i></a>
            		<a href="?menu=ongkir&hapus&id=<?php echo $r[0]?>" class="btn btn-danger" 
                       onclick="return confirm('Hapus <?php echo $r[0] ?> ?')"><i class="icon-trash"></i></a>
            	</div></td>
        </tr>
        <?php } }
		
			if(isset($_GET['hapus'])){
				$perintah->hapus("tbl_ongkir","kota = '$_GET[id]'","?menu=ongkir");
			}
		?>
    </table>