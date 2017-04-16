<?php
$tgl = date('d - F - Y');
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

	<h2> Data Pelanggan </h2>
    <hr>
         <form method="post">
      <table width="30%">
      		<tr>
    			<td><input type="text" name="cari" placeholder="Cari Pelanggan " class="form-controll"/></td>
                <td><a href="index.php?menu=pelanggandt" class="btn btn-warning"><i class="icon-refresh"></i></a></td>
            </tr>
     </table>
     </form><br />
	<table class="table table-striped">
    	<tr class="alert-warning" style="font-weight:bold;">
        	<td></td>
            <td>Kode Pembeli</td>
            <td>Nama</td>
            <td>Jk</td>
            <td>No Hp</td>
            <td>Alamat</td>
                   </tr>
        <?php
		if(isset($_POST['cari'])){
			$cari = "where kd_pembeli like '%$_POST[cari]%' or nama like '%$_POST[cari]%'";
		}
		$no = 0; 
		@$a = $perintah->tampil("tbl_pembeli $cari ORDER BY kd_pembeli DESC");
		if($a == ''){
			echo "<tr><td colspan = '6' align='center'><strong>No Record</strong></td></tr>";
		} else {
			foreach($a as $data){
				$no++;
		?>
        <tr>
        	<td><?php echo $no ?></td>
            <td><?php echo $data[0] ?></td>
            <td><?php echo $data[1] ?></td>
            <td><?php echo $data[2] ?></td>
            <td><?php echo $data[6] ?></td>
            <td><?php echo $data[3] ?></td>
           
        </tr>
        <?php }
		}
		?>
    </table>