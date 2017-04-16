<?php
$tgl = date('d - F - Y');

if(isset($_POST['ubah'])){
	$foto = $_FILES['foto'];
	$upload = $perintah->upload($foto,"foto");
	if(empty($_FILES['foto']['name']) or $_FILES['foto']['name']==100){
		echo "<script>alert('Masukan Foto !!!')</script>";
	}else{
		$field = array('foto'=>$upload);
		$perintah->update("tbl_admin",$field,"username = '$_SESSION[username]'","index.php?menu=tambahbr");
	}
	
}
?>
<div class="alert alert-warning" role="alert">
	<a href=""><span class="glyphicon glyphicon-home"></span> Home</a> 
 			   <i class="icon-angle-right"></i>  Setting
  			   <i class="icon-angle-right"></i>  Ganti Gambar
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
	<h2> Ganti Gambar </h2>
    <hr>
	<form method="post" enctype="multipart/form-data">
    	<table class="table">
        	<tr>
            	<td>Pilih Gambar</td>
                <td>:</td>
                <td><input type="file" name="foto"></td>
            </tr>
            <tr>
            	<td></td>
                <td></td>
                <td><input type="submit" name="ubah" value="GANTI GAMBAR" class="btn btn-warning"></td>
            </tr>
        </table>
    </form>