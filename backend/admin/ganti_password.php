<?php
$tgl = date('d - F - Y');


$tampil = mysql_fetch_array(mysql_query("SELECT * FROM tbl_admin WHERE username = '$_SESSION[username]'"));
if(isset($_POST['simpan'])){
$field = array('password'=>md5(trim($_POST['upb'])));	
	if(md5(trim($_POST['pl'])) == $tampil['password'] and $_POST['pb'] == $_POST['upb']){
		$perintah->update("tbl_admin",$field,"username = '$_SESSION[username]'","index.php?menu=tambahbr");
	} else {
		echo "<script>alert('Ganti Password Gagal Cek dengan benar dan ulangi !!!');</script>";
	}
}
?>
<div class="alert alert-warning" role="alert">
	<a href=""><span class="glyphicon glyphicon-home"></span> Home</a> 
 			   <i class="icon-angle-right"></i>  Setting
  			   <i class="icon-angle-right"></i>  Ganti Password
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
	<h2> Ganti Password </h2>
    <hr>

<form method="post">
	<table class="table">
    	<tr>
        	<td>Password Lama</td>
            <td>:</td>
            <td><input type="password" name="pl" class="form-control" required></td>
        </tr>
        <tr>
        	<td>Password Baru</td>
            <td>:</td>
            <td><input type="text" name="pb" class="form-control" required></td>
        </tr>
        <tr>
        	<td>Ulangi Password Baru</td>
            <td>:</td>
            <td><input type="text" name="upb" class="form-control" required></td>
        </tr>
        <tr>
        	<td></td>
            <td></td>
            <td><input type="submit" name="simpan" value="SIMPAN" class="btn btn-warning"></td>
        </tr>
    </table>
</form>